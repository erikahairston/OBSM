<?php

    // configuration
    require("../includes/config.php");
    
    //print every link out from forsoul uploads
    
    // get all forsoul uploads
    $usersuploads = CS50::query("SELECT * FROM upload WHERE category = ?", "forsoul");
    if ($usersuploads == false)
    {
        apologize("No one has uploaded under forsoul.");
    }

    
    // render soulful uploads
    render("souls_view.php", ["usersuploads" => $usersuploads, "title" => "Gives Me Life"]);

?>
  

