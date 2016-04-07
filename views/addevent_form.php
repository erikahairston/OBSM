<div class="directions">
    <h4>Stay in the loop. (upcoming/past events, annoucements, call to actions) </h4>
    <p3>Only one video or picture per post. If you upload video, copy & paste the url from "Embed" option on Youtube. </p3>
</div>
<form action="addevent.php" method="post">
    <fieldset>
        <div class="form-group">
            Post Title: (*required)   <input autocomplete="off" autofocus class="form-control" name="title" placeholder="Title" type="text"/>
        </div>
        <div class="form-group">
            Youtube Embed Link:  <input autocomplete="off" autofocus class="form-control" name="video_url" placeholder="Link for EMBED " type="text"/>   
        </div>
        <div class="form-group">
        Image or Gif Link:  <input autocomplete="off" autofocus class="form-control" name="img_url" placeholder="...jpeg" type="text"/>        
        </div>
        <div class="form-group">
             Details:*  <input style="width:300px" autocomplete="off" autofocus class="form-control" name="description" placeholder="Details" type="text"/>
        </div>
        <div class="form-group">
            <button class="button" type="submit">Bless!</button>
        </div>
    </fieldset>
</form>

