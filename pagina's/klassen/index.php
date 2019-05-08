<?php
include ("../../includes/header.php");
 ?>
<!DOCTYPE html>
<html>
    <body>
        <section id="container">
            <?php
            include_once "../../includes/logo.php";
            include_once "../../includes/navbar.php";
            ?>
            </header>
            <?php
            include_once "../../includes/sidebar.php";
            ?>

            <section id="main-content">
                <section class="wrapper">
                    <div class="wthree-font-awesome">
                        <div class="grid_3 grid_4 w3_agileits_icons_page">
                            <div class="icons">
                                <h2 class="titel">Klassen</h2>
                                <select>
                                    <option>Klas selecteren</option>
                                </select>
                                <button>Klas Toevoegen</button>
                                <table class="klassen">
                                    <tr>
                                        <td>Klasnaam</td>
                                        <td>Leerlingen</td>
                                        <td>Mentor</td>
                                        <td>Actie</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Ruben</td>
                                        <td>Ed van den Berg</td>
                                        <td>
                                            <button>Bewerken</button>
                                            <button>Verwijderen</button>
                                        </td>
                                    </tr>
                                </table>
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
