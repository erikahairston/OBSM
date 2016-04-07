<body>
  <h1>Welcome back, <?php print($firstname)?>!</h1>
  
  <h3> Recently at <?php print($school)?>....</h3>
  

  <!-- adds latest $school contributions events -->
  <?php
  
   /**
     * RendersHome view, passing in values.
     */
    function renderhome($view, $values = [])
    {
        // if view exists, render it
        if (file_exists("../views/{$view}"))
        {
            // extract variables into local scope
            extract($values);

            // render view (between header and footer)
            require("../views/{$view}");
            require("../views/footer.php");
            exit;
        }

        // else err
        else
        {
            trigger_error("Invalid view: {$view}", E_USER_ERROR);
        }
    }
      
    //query for all things your school uploaded
    $usersuploads = CS50::query("SELECT * FROM upload WHERE school = ?", $school);
    if ($usersuploads != false)
    {
        renderhome("souls_view.php", ["usersuploads" => $usersuploads, "title" => "Our Voices"]);
    }
    
        // render soulful uploads
        
        ?>
</body>
