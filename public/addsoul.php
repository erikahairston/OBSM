<?php

    // configuration
    require("../includes/config.php");
    
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        
        // validate submission
        if (empty($_POST["title"]))
        {
            apologize("You must provide upload title.");
        }
        
        $img = false;
        $vid = false;
        if(!empty($_POST["img_url"]))
        {
            $img = true;
        }
        
        if (!empty($_POST["video_url"]))
        {
            $vid = true;
        }
        
        if($vid == 0 & $img == 0)
        {
             apologize(" $img You must provide content link. $vid "); 
        }
        
     
        $category = "forsoul";
        
        // get user's school
        $rows = CS50::query("SELECT school, firstname FROM users WHERE id = ?", $_SESSION["id"]);
        if (count($rows) != 1)
        {
            apologize("Query error. Did you register with your school");
        }
        $school = $rows[0]["school"];
        $firstname = $rows[0]["firstname"];
        
        //if they are adding an img, add imgurl into database
        if($img == 1)
        {
            // insert the content to database
            CS50::query("INSERT INTO upload (user_id, firstname, school, title, category, description, img_url) VALUES(?, ?, ?, ?, ?, ?, ?)",
                $_SESSION["id"], $firstname, $school, $_POST["title"], $category, $_POST["description"], $_POST["img_url"]);
        }
        
        else if($vid==1)
        {
            // insert the content to database
            CS50::query("INSERT INTO upload (user_id, firstname, school, title, category, description, video_url) VALUES(?, ?, ?, ?, ?, ?, ?)",
                $_SESSION["id"], $firstname, $school, $_POST["title"], $category, $_POST["description"], $_POST["video_url"]);
        }
           
        // render quote
        render("upload_success.php", ["title" => "Upload"]);    
    } else {
        // else render form
        render("addsoul_form.php", ["title" => "Upload"]);
    }

?>

