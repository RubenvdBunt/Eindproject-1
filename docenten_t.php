<?php
include ("includes/header.php");
 ?>
 <link rel="stylesheet" href="css/docenten.css" >
    <section class="wrapper">
        <div class="wthree-font-awesome">
            <div class="grid_3 grid_4 w3_agileits_icons_page">
                <div class="icons">
                    <h2 class="titel">Docent toevoegen</h2>
                    <a href="docenten.php">Annuleren</a><br/><br/><br/>
                    <div class="inputs">
                      <form method="post" action="docenten_t.php">
                        <span>Voornaam: <input type="text" name="docent_voor" required/></span><br/><br/>
                        <span>Achternaam: <input type="text" name="docent_achter" required/></span><br/><br/>
                        <span>Email: <input type="email" name="docent_email" required/></span><br/><br/>
                        <button type="submit" name="submit">Voeg toe</button>
                      </form>

                      <?php

                        if(isset($_POST['submit'])){
                          $sFirstName = $_POST['docent_voor'];
                          $sSecondName = $_POST['docent_achter'];
                          $sEmail = $_POST['docent_email'];

                          $sql = "INSERT INTO `docent`(`DocentID`, `DocentVoornaam`, `DocentAchternaam`, `DocentEmail`) VALUES ('', '$sFirstName', '$sSecondName', '$sEmail')";
                          $result = $conn-> query($sql);
                        }else{
                            echo "";
                        }
                      ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
 include("includes/footer.php");
 ?>
