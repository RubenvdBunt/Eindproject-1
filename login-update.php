<?php
    session_start();
    include_once "includes/login_check.php";

    if(isset($_POST['update'])){
      if($_POST['update-password'] == $_POST['hupdate-password']){
        $password = $conn->real_escape_string($_POST['update-password']);
        $salted = "afurwhfiudncmisdcjsducjw383wjfwesjn".$password."srgjnvisciwecose";
        $hashed = hash('sha512', $salted);

        $GebruikerID = $_SESSION['GebruikerID'];
        $stmt = $connect->prepare("UPDATE gebruiker SET GebruikerWachtwoord='".$hashed."', EersteLogin=0 WHERE GebruikerID = '".$GebruikerID."'");
        $stmt->execute();    // Execute de voorbereide query.
        echo "<script type='text/javascript'>alert('Wachtwoord geupdate!');</script>";
        header('Location: index.php');
        exit();
      } else {
        echo "<script type='text/javascript'>alert('Wachtwoorden komen niet overeen.');</script>";
      }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Update</title>
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
                <h2>Voer je nieuwe wachtwoord in.</h2>
                <form action="login-update.php" method="post">
                    <input type="password" class="ggg" name="update-password" placeholder="Nieuw wachtwoord" required="">
                    <input type="password" class="ggg" name="hupdate-password" placeholder="Herhaal wachtwoord" required="">
                    <div class="clearfix"></div>
                    <input type="submit" class="submit" value="Update" name="update">
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
