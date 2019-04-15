<?php
include ("includes/header.php");
 ?>

 <link rel="stylesheet" href="css/docenten.css" >
        <section class="wrapper">
            <div class="wthree-font-awesome">
                <div class="grid_3 grid_4 w3_agileits_icons_page">
                    <div class="icons">
                        <h2 class="titel">Docenten</h2>
                        <a href="docenten_t.php">Docent Toevoegen</a>
                        <table class="klassen">
                            <tr>
                                <td>Voornaam</td>
                                <td>Achternaam</td>
                                <td>Email</td>
                                <td>Mentor van klas</td>
                                <td>Foto</td>
                                <td>Actie</td>
                            </tr>
                            <?php

                            $sql = "SELECT * FROM docent";
                            $result = $conn-> query($sql);

                            if($result-> num_rows > 0){
                                While($row = $result-> fetch_assoc()){
                                    echo "<tr><td>" . $row["DocentVoornaam"] . "</td><td>" . $row["DocentAchternaam"] . "</td><td>" . $row["DocentEmail"] . "</td><td></td><td> <input type='button' name='bewerken' value='Bewerken'><input type='button' value='Verwijderen'> </td></tr>";
                                }
                                echo "</table>";
                            }else{
                                echo "0 result";
                            }

                            ?>
                            <div class="pop-up">
                              <span>POPUP</span>
                            </div>
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
