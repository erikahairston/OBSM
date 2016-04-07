<div class="directions">
    <h4>You will not receive spam emails from the site. <br> We ask for school email for security purposes only. </h3>
    <p2> *Fill out every field.</p2>
</div>

<form action="register.php" method="post">
    <fieldset>
        <div class="form-group">
            First Name: <input autocomplete="off" autofocus class="form-control" name="firstname" placeholder="First Name" type="text"/>
        </div>
        <div class="form-group">
            Last Name: <input autocomplete="off" autofocus class="form-control" name="lastname" placeholder="Last Name" type="text"/>
        </div>
        <div class="form-group">
            Your University: <input autocomplete="off" autofocus class="form-control" name="school" placeholder="Yale" type="text"/>
        </div>
        <div class="form-group">
            Class Year: <input autocomplete="off" autofocus class="form-control" name="classyear" placeholder="Class Year (ex. 2018)" type="text"/>
        </div>
        <div class="form-group">
            School Email: <input autocomplete="off" autofocus class="form-control" name="schoolemail" placeholder="School Email" type="email"/>
        </div>
        <div class="form-group">
           Password: <input class="form-control" name="password" placeholder="Password" type="password"/>
        </div>
        <div class="form-group">
           Confirm: <input class="form-control" name="confirmation" placeholder="Password (again)" type="password"/>
        </div>
        <div class="form-group">
            <button class="btn btn-default" type="submit">Register</button>
        </div>
    </fieldset>
</form>
<div class="register">
    or <a href="login.php">log in</a>
</div>
