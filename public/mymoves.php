<?php

    // configuration
    require("../includes/config.php"); 
    
    //timeline of all my uploads
    
    //query for all things you've uploaded
    $usersuploads = CS50::query("SELECT * FROM upload WHERE user_id = ?", $_SESSION["id"]);
    if ($usersuploads == false)
    {
        apologize("You have no uploads yet.");
    }
    
  // render soulful uploads
    render("souls_view.php", ["usersuploads" => $usersuploads, "title" => "My Upload"]);
    

?>