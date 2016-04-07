<?php

    // configuration
    require("../includes/config.php"); 
    
      /**
       * Helper Fxn
     * Checks  email user puts in to register by ensuring it's a valid
     * USA or Canadian univeristy email address
     */

    function checkedu($schoolemail)
    {
        //check if valid email address (http://php.net/manual/en/filter.examples.validation.php)
        if(filter_var($schoolemail, FILTER_VALIDATE_EMAIL))
        {
            //extract domain name to cross-check with the database
            $mailDomain = substr(strrchr($schoolemail, "@"), 1);
            
            //query the database for that email's domain
            $rows = CS50::query("SELECT domain FROM schools WHERE domain = ?", $mailDomain);
           
            if(count($rows) != 1)
            {
                return false;
            }
            return true;
        }
        
        return false;
    }
    
    function yearformat($classyear)
    {
        //check if valid class year format
        
        if(intval($classyear) != 0)
        {
            $num_length = strlen($classyear);
            if($num_length == 4) {
                // Pass
                return true;
            } else {
                // Fail
                return false;
            }
        }
        
        return false;
    }
   
   
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate inputs
        if (empty($_POST["firstname"]) or empty($_POST["lastname"]))
        {
            apologize("You must provide a first name and lastname.");
        }
        else if (empty($_POST["school"]))
        {
            apologize("You must provide the school you attend.");
        }
        else if ((empty($_POST["classyear"]) or !yearformat($_POST["classyear"])))
        {
            apologize("You must provide a class year in the format XXXX (ex. 2015).");
        }
       
        
        //check if user put a valid USA or Canadian university email
        else if (empty($_POST["schoolemail"]) or !checkedu($_POST["schoolemail"]))
        {
            apologize("You must provide a valid USA or Canadian University email.");
        }
        
        else if (empty($_POST["password"]))
        {
            apologize("You must provide a password.");
        }
        else if (empty($_POST["confirmation"]) || $_POST["password"] != $_POST["confirmation"])
        {
            apologize("Those passwords did not match.");
        }

        // try to register user
        $rows = CS50::query("INSERT IGNORE INTO users (firstname, lastname, schoolemail, hash, school, year)
        VALUES(?, ?, ?, ?, ?, ?)",
            $_POST["firstname"], $_POST["lastname"], $_POST["schoolemail"], 
            password_hash($_POST["password"], PASSWORD_DEFAULT), $_POST["school"], $_POST["classyear"]
        );
        if ($rows !== 1)
        {
            apologize("That email appears to already have an account.");
        }

        // get new user's ID
        $rows = CS50::query("SELECT LAST_INSERT_ID() AS id");
        if (count($rows) !== 1)
        {
            apologize("Can't find your ID.");
        }
        $id = $rows[0]["id"];

        // log user in
        $_SESSION["id"] = $id;

        // redirect to portfolio
        redirect("/");
    }
    else
    {
        // else render form
        render("register_form.php", ["title" => "Register"]);
    }

?>
