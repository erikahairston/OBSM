<!-- I never use the file uploads for the project, HOWEVER, in the future, I'd like users to be able to upload content
    from their laptops-->
<?php

    // configuration
    require("../includes/config.php"); 


    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        
        //check to see if the file was successfully uploaded by looking at the file size.
        //If it's larger than zero byte then we can assume that the file is uploaded successfully.
        if(isset($_POST['submit'])  && $_FILES['fileToUpload']['size'] > 0)
        {
            
            //PHP saves the uploaded file with a temporary name & save  name in $_FILES['fileToUpload']['tmp_name']
            $fileName = $_FILES['fileToUpload']['name'];
            $tmpName  = $_FILES['fileToUpload']['tmp_name'];
            $fileSize = $_FILES['fileToUpload']['size'];
            $fileType = $_FILES['fileToUpload']['type'];
            $uploadOk = 1;

            $fp      = fopen($tmpName, 'r');
            $content = fread($fp, filesize($tmpName));
            
            //addslashes() to escape the content. Using addslashes() to the file 
            //name is also recommended because you never know what the file name would be.
            $content = addslashes($content);
            fclose($fp);
            
            if(!get_magic_quotes_gpc())
            {
                $fileName = addslashes($fileName);
            }
            
            
            //check max size of file (1GB ==MAX_SIZE)
            if ($_FILES["fileToUpload"]["size"] > 1000000) 
            {
                $uploadOk = 0;
            }
            
            //if I have time, check file type (don't accept )
            
            if ($uploadOk == 0) {
                apologize("Sorry, your file was too big and was not uploaded.");
            // if everything is ok, try to upload file
            } else {
                
                // get user's school
                $rows = CS50::query("SELECT school FROM users WHERE id = ?", $_SESSION["id"]);
                if (count($rows) != 1)
                {
                    apologize("Query error. Did you register with your school");
                }
                $school = $rows[0]["school"];
                //read the content of this file and insert the content to database
            
                CS50::query("INSERT INTO uploads (user_id, school, name, size, type, content) VALUES(?, ?, ?, ?, ?, ?)",
                $_SESSION["id"], $school, $fileName, $fileSize, $fileType, $content);
           
                // render quote
                render("upload_success.php", ["filename"=>$fileName,"title" => "Upload"]);
            }
        }
     
        apologize("Couldn't upload");   
        
    }
    else
    {
        // else render form
        render("contribute_form.php", ["title" => "Upload"]);
    }

?>
