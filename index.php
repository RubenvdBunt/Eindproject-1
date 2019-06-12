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


$stmt_info_docent = $conn->prepare("SELECT DocentVoornaam FROM docent LEFT JOIN gebruiker ON gebruiker.GebruikerID = docent.GebruikerID WHERE GebruikerEmail = '".$_SESSION["email"]."'");
$stmt_info_docent->execute();    // Execute de voorbereide query.
$stmt_info_docent->bind_result($GebruikerVoornaam);
// $stmt_info_docent->store_result();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="author" content="Ruben van de Bunt & Joey Akse">
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
                                if($_SESSION["BeheerderSession"] > 0){
                                   echo"<h2 class='titel'>Welkom ".$GebruikerVoornaam."!</h2>";
                                 }else if($_SESSION["DocentSession"] > 0){
                                   echo"<h2 class='titel'>Welkom ".$GebruikerVoornaam."!</h2>";
                                 }else if($_SESSION["StudentSession"] > 0) {
                                   echo"<h2 class='titel'>Welkom ".$GebruikerVoornaam."!</h2>";
                                 }else{
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
                    <br>
                    <?php
                      if($_SESSION["DocentSession"] > 0){
                        $title_box_one = "docent";
                        $title_box_two = "box_twee";
                        $title_box_three = "box_drie";
                      }else if($_SESSION["StudentSession"] > 0){
                        $title_box_one = "student";
                        $title_box_two = "box_twee";
                      }

                      if($_SESSION["StudentSession"] > 0 || $_SESSION["DocentSession"] > 0){
                        echo "<div class='triple_box'>
                                <div class='wthree-font-awesome single_box'>
                                  <div class='title_single_box'>
                                    <p>".$title_box_one." <i class='fa fa-chevron-down' aria-hidden'true'></i></p>
                                  </div>
                                <div class='data_single_box'>
                                  <p>data</p>
                                </div>
                              </div>
                              <div class='wthree-font-awesome single_box'>
                                <div class='title_single_box'>
                                  <p>".$title_box_two." <i class='fa fa-chevron-down' aria-hidden='true'></i></p>
                                </div>
                                <div class='data_single_box'>
                                  <p>data</p>
                                </div>
                              </div>";
                        if($_SESSION["DocentSession"] > 0){
                        echo "<div class='wthree-font-awesome single_box'>
                                <div class='title_single_box'>
                                  <p>".$title_box_three." <i class='fa fa-chevron-down' aria-hidden='true'></i></p>
                                </div>
                                <div class='data_single_box'>
                                  <p>data</p>
                                </div>
                              </div>
                            </div>";
                        }
                      }


                    ?>


                </section>
                <?php
                 include("includes/footer.php");
                 ?>
            </section>
            <?php
                include_once "includes/script.php";
            ?>
            <script>
              $( document ).ready(function() {
                $(".data_single_box").hide();
              });

              $(".title_single_box").click(function(){
                console.log("click");
                $(this).siblings(".data_single_box").slideToggle();
                $(this).parent().toggleClass("hauto");
                $(this).children().children().toggleClass("rotate");
              });
            </script>
        </section>
    </body>
</html>
