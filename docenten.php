<?php
include ("../../includes/header.php");
 ?>

 <link rel="stylesheet" href="../../css/docenten.css" >
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
                                    echo "<tr>
                                        <td>" . $row["DocentVoornaam"] . "</td><td>" . $row["DocentAchternaam"] . "</td>
                                        <td>" . $row["DocentEmail"] . "</td>
                                        <td>" . $row["KlasID"] ."</td>
                                        <td></td>
                                        <td> <form action='docenten.php' method='post'> <input id='" . $row["DocentID"] . "' type='button' onclick='popUp()' name='bewerken' value='Bewerken'><input type='button' value='Verwijderen'></form> </td>
                                        </tr>";
                                }
                                echo "</table>";
                            }else{
                                echo "0 result";
                            }

                            if(isset($_POST['bewerken'])){
                              $ID = $_GET['id'];
                              $sqlinput = "SELECT * FROM docent WHERE DocentID = ". $ID ."";
                              $resultinput = $conn-> query($sqlinput);
                              While($rowinput = $resultinput-> fetch_assoc()){
                                  echo "<div id='pop-up'>
                                      <span>Voornaam: <input type='text' value='" . $rowinput["DocentVoornaam"] . "'/></span><br/><br/>
                                      <span>Achternaam: <input type='text' value='" . $rowinput["DocentAchternaam"] . "'/></span><br/><br/>
                                      <span>Email: <input type='text' value='" . $rowinput["DocentEmail"] . "'/></span>
                                      </div>";
                              }
                            }
                            ?>
                            </div>
                        </div>
                    </div>
                </section>
                <?php
                    include("../../includes/footer.php");
                ?>
            </section>
            <?php
                include_once "../../includes/script.php";
            ?>
        </section>
    </body>
</html>
