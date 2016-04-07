<!DOCTYPE html>

<html>

    <head>

        <!-- http://getbootstrap.com/ -->
        <link href="/css/bootstrap.min.css" rel="stylesheet"/>

        <link href="/css/styles.css" rel="stylesheet"/>

        <meta content="initial-scale=1, width=device-width" name="viewport"/>

        <?php if (isset($title)): ?>
            <title>OBSM: <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>Our Black Student Movement</title>
        <?php endif ?>

        <!-- https://jquery.com/ -->
        <script src="/js/jquery-1.11.3.min.js"></script>

        <!-- http://getbootstrap.com/ -->
        <script src="/js/bootstrap.min.js"></script>
        
        <link href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" media="all" rel="stylesheet">
        <link href="https://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" media="all" rel="stylesheet">
        <link href="css/styles.css" media="all" rel="stylesheet">
    
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.1/modernizr.min.js"></script>
        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">

        <script src="/js/scripts.js"></script>

    </head>

    <body>

        <div class="container">

            <div id="top">
                <div class="bringhome">
                    
                    <h10> Our <a href="/"><img class ="fist" alt="OBSM" src="http://i.imgur.com/yFWCUv0.jpg"/></a> Voices</h10>
                    
                </div>
                <?php if (!empty($_SESSION["id"])): ?>
                    <ul class="nav nav-pills">
                        <li><a href="mymoves.php">My Moves & Voice</a></li>
                        <li><a href="contribute.php">Contribute</a></li>
                        <li><a href="soul.php">Gives Me Life</a></li>
                        <li><a href="allschools.php">Our Voices</a></li>
                        <li><a href="logout.php"><strong>Log Out</strong></a></li>
                    </ul>
                <?php endif ?>
            </div>

            <div id="middle">
