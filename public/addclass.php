<?php

    // configuration
    require("../includes/config.php");
    
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        
        // validate submission
        if (empty($_POST["title"]))
        {
            apologize("You must provide class title.");
        }
        
        if (empty($_POST["author_prof"]))
        {
            apologize("You must provide a professor/author.");
        }
        
        $img = false;
        if(!empty($_POST["img_url"]))
        {
            $img = true;
        }
  
        $category = "class";
        
        // get user's school
        $rows = CS50::query("SELECT school, firstname FROM users WHERE id = ?", $_SESSION["id"]);
        if (count($rows) != 1)
        {
            apologize("Query error. Did you register with your school?");
        }
        $school = $rows[0]["school"];
        $firstname = $rows[0]["firstname"];
        
        //if they are adding an img, add imgurl into database
        if($img == 1)
        {
            // insert the content to database
            CS50::query("INSERT INTO upload (user_id, firstname, school, title, category, description, img_url, author_prof) VALUES(?, ?, ?, ?, ?, ?, ?, ?)",
                $_SESSION["id"], $firstname, $school, $_POST["title"], $category, $_POST["description"], $_POST["img_url"], $_POST["author_prof"]);
        } else {
            //if they did not add an img still allow them to upload
              
              // insert the content to database
            CS50::query("INSERT INTO upload (user_id, firstname, school, title, category, description, author_prof) VALUES(?, ?, ?, ?, ?, ?, ?)",
                $_SESSION["id"], $firstname, $school, $_POST["title"], $category, $_POST["description"], $_POST["author_prof"]);
            
        }
        
           
        // render quote
        render("upload_success.php", ["title" => "Upload"]);    
    } else {
        // else render form
        render("addclass_form.php", ["title" => "Suggest Class"]);
    }

?>

