<?php

    // configuration
    require("../includes/config.php"); 
    
     // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
            //timeline of all X schools' uploads
    
        //query for all things you've uploaded
        $usersuploads = CS50::query("SELECT * FROM upload WHERE school = ?", $_POST["school"]);
        if ($usersuploads == false)
        {
            apologize("This school has no uploads yet.");
        }
    
        // render soulful uploads
        render("souls_view.php", ["usersuploads" => $usersuploads, "title" => "Our Voices"]);
    }
    
    render("ourvoices_searchform.php", [ "title" => "Our Voices"]);
    
    

?>