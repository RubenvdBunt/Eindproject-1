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
    <title>Hallo</title>
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
                        <h2 class="titel">Docenten</h2>
                        <button>Klas Toevoegen</button>
                        <table class="klassen">
                            <tr>
                                <td>Voornaam</td>
                                <td>Achternaam</td>
                                <td>Mentor van klas</td>
                                <td>Email</td>
                                <td>Actie</td>
                            </tr>
                            <?php

                            $sql = "SELECT DocentVoornaam, DocentAchternaam, MentorKlas, DocentEmail FROM docent";
                            $result = $conn-> query($sql);

                            if($result-> num_rows > 0){
                                While($row = $result-> fetch_assoc()){
                                    echo "<tr><td>" . $row["DocentVoornaam"] . "</td><td>" . $row["DocentAchternaam"] . "</td><td>" . $row["MentorKlas"] . "</td><td>" . $row["DocentEmail"] . "</td><td> <input type='button' value='Bewerken'><input type='button' value='Verwijderen'> </td></tr>";
                                }
                                echo "</table>";
                            }else{
                                echo "0 result";
                            }

                            ?>



<!--                            <tr>-->
<!--                                <td>Ed</td>-->
<!--                                <td>van den Berg</td>-->
<!--                                <td>1</td>-->
<!--                                <td>-->
<!--                                    <button>Bewerken</button>-->
<!--                                    <button>Verwijderen</button>-->
<!--                                </td>-->
<!--                            </tr>-->
<!--                        </table>-->
                    </div>
                </div>
            </div>
        </section>

        <!-- footer -->
        <section class="footer">
            <div class="footer">
                <div class="wthree-copyright">
                    <p>© Ruben van de Bunt 2019</p>
                </div>
            </div>
        </section>
    </section>
    <?php
    include_once "includes/script.php";
    ?>
</section>
</body>
</html>