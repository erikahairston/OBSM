 
 <div class="timeline animated">
 <?php 
    //i reversed through the array in order to get most recent posts on top of the page
    foreach (array_reverse($usersuploads) as $usersupload)
    {
?> 
        <div class="timeline-row">
            <div class="timeline-time">
              <small> <?php echo($usersupload["timestamp"]) ?> </small> 
              <p10> <?php echo($usersupload["firstname"]) ?> </p10>
            </div>
            <div class="timeline-icon">
                <?php 
                    //show appropirate icon per category upload
                    if($usersupload["category"] == "forsoul") 
                    {
                        printf("<div class=\"bg-info\"> 
                        <i class=\"fa fa-camera\"></i> 
                                </div>");  
                    } else if($usersupload["category"] == "class")  {
                        printf("<div class=\"bg-primary\"> 
                                <i class=\"fa fa-pencil\"></i>
                                </div>");
                    } else if($usersupload["category"] =="book")  {
                        printf("<div class=\"bg-warning\"> 
                                <i class=\"fa fa-quote-right\"></i> 
                                </div>");
                    //category == event
                    } else {
                        printf("<div class=\"bg-primary\"> 
                                <i class=\"fa fa-video-camera\"></i> 
                                </div>");
                    }
                ?>
            </div>
            <div class="panel timeline-content">
              <div class="panel-body">
                <h2> <?php echo($usersupload["title"]) ?> </h2>
                
                <!--If there's an image or video, print it -->
                <?php if(!empty($usersupload["img_url"]))
                    {
                        printf("<img class=\"img-responsive\" src=\"%s\">", ($usersupload["img_url"])); 
                    } if(!empty($usersupload["video_url"])) {
                        
                        printf("<div class='video-container'>");
                            printf("<iframe width=\"420\" height=\"315\" src=\"%s\" 
                            frameborder=\"0\" allowfullscreen></iframe> </div>", ($usersupload["video_url"]));
                            
                            
                          //  "<iframe allowfullscreen=\"\" frameborder=\"0\" 
                        //mozallowfullscreen=\"\" src=\"%s\" webkitallowfullscreen=\"\"> </iframe> </div>", ($usersupload["video_url"])); 
                    }
                ?>
        
                <p><?php echo($usersupload["description"]) ?> </p>
              </div>
            </div>
        </div>
<?php 
    } ?>
      

  