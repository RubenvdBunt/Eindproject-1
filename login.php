<?php
    include_once "includes/conn.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Log in</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="css/bootstrap.min.css" >
        <link href="css/style.css" rel='stylesheet' type='text/css' />
        <link href="css/style-responsive.css" rel="stylesheet"/>
        <link rel="stylesheet" href="css/font.css" type="text/css"/>
        <link href="css/font-awesome.css" rel="stylesheet">
        <script src="js/jquery2.0.3.min.js"></script>
    </head>
    <body>
        <div class="log-w3">
            <div class="w3layouts-main">
                <h2>Inloggen</h2>
                <form action="includes/login_check.php" method="post">
                    <input type="email" class="ggg" name="email" placeholder="E-marandomil" required="">
                    <input type="password" class="ggg" name="password" placeholder="Wachtwoord" required="">
                    <div class="clearfix"></div>
                    <input type="submit" value="Log in" name="login">
                </form>
            </div>
        </div>
        <script src="js/bootstrap.js"></script>
        <script src="js/jquery.dcjqaccordion.2.7.js"></script>
        <script src="js/scripts.js"></script>
        <script src="js/jquery.slimscroll.js"></script>
        <script src="js/jquery.nicescroll.js"></script>
        <script src="js/jquery.scrollTo.js"></script>
    </body>
</html>
