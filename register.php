<?php
    include_once "includes/conn.php";
    if(isset($_POST['email'])){
        $email = mysqli_real_escape_string($_POST['email']);
        $password1 = mysqli_real_escape_string($_POST['password1']);
        $password2 = $_POST['password2'];


    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Registreren</title>
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
                <h2>Registreer</h2>
                <form action="" method="post">
                    <input type="email" class="ggg" name="email" placeholder="E-mail:" required="">
                    <input type="password" class="ggg" name="password1" placeholder="Wachtwoord:" required="">
                    <input type="password" class="ggg" name="password2" placeholder="Wachtwoord herhalen:" required="">
                    <div class="clearfix"></div>
                    <input type="submit" value="Registreer" name="register">
                    <!--                    echo password_hash("WACHTWOORD", PASSWORD_DEFAULT);-->
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
