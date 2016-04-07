<?php

    // configuration
    require("../includes/config.php"); 
    
    // get user's registration info
    $rows = CS50::query("SELECT * FROM users WHERE id = ?", $_SESSION["id"]);
    if ($rows === false)
    {
        apologize("Can't find your name.");
    }
    $firstname = $rows[0]["firstname"];
    $school = $rows[0]["school"];


    // render home page, passing in name and school
    render("home.php", ["firstname" => $firstname, "school" => $school, "title" => "Our Black Student Movement"]);

?>
