<?php
include ("includes/header.php");
 ?>
<!DOCTYPE html>
<html>
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
                            </div>
                        </div>
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