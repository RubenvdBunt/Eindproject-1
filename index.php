<?php
session_start();
include_once "includes/conn.php";
include_once "includes/login_check.php";

if(isset($_SESSION["email"])){
//    echo '<h3>Login succesvol' .$_SESSION["email"]. '</h3>';
}else{
    header("Location: login.php");
    exit();
}

//    if(isset($_SESSION["DocentID"]) || isset($_SESSION["GebruikerID"]) ){
//        echo "gelukt";
//    }else{
//        echo "niet gelukt";
//    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Welkom!</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" >
        <link href="css/style.css" rel='stylesheet' type='text/css' />
        <link href="css/style-responsive.css" rel="stylesheet"/>
        <link href="css/font-awesome.css" rel="stylesheet">
    </head>
    <body>
        <section id="container">
            <?php
                include_once "includes/logo.php";
                include_once "includes/navbar.php";
            ?>
            </header>
            <?php
                include_once "includes/sidebar.php";
            ?>

            <section id="main-content">
                <section class="wrapper">
                    <div class="wthree-font-awesome">
                        <div class="grid_3 grid_4 w3_agileits_icons_page">
                            <div class="icons">
                                <?php
                                if($_SESSION["BeheerderSession"] > 0){ ?>
                                    <h2 class="titel">Welkom beheerder!</h2>
                                <?php }else if($_SESSION["DocentSession"] > 0){ ?>
                                    <h2 class="titel">Welkom docent!</h2>
                                <?php }else if($_SESSION["StudentSession"] > 0) { ?>
                                    <h2 class="titel">Welkom student!</h2>
                                <?php }else{
                                    echo"Welkom!";
                                }
                                ?>

                            </div>
                        </div>
                        <p>hallo</p>
                        <?php
                            echo $_SESSION["BeheerderSession"];
                        ?>

                    </div>
                </section>
                <?php
                 include("includes/footer.php");
                 ?>
            </section>
            <?php
                include_once "includes/script.php";
            ?>
        </section>
    </body>
</html>
