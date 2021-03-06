<?php
    $GebruikerVoornaam = "";

    session_start();
    include_once "includes/conn.php";
    include_once "includes/login_check.php";
    include_once "includes/index-student.php";
    include_once "includes/index-docent.php";

    if(isset($_SESSION["email"])){

    }else{
        header("Location: login.php");
        exit();
    }


    if($_SESSION['BeheerderSession'] > 0){
      $GebruikerVoornaam = $_SESSION["email"];
    }
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
                    </div>
                    <br>
                    <?php
                      if($_SESSION["DocentSession"] > 0){
                        $title_box_one = "Klassen";
                        $title_box_two = "Profiel";

                        $data_box_two = "
                        <table class='table table-striped table-bordered'>
                        	<tr>
                        		<th>Voornaam</th>
                            <td>".$result_class_docent_info["0"]["DocentVoornaam"]."</td>
                          </tr>
                          <tr>
                        		<th>Achternaam</th>
                            <td>".$result_class_docent_info["0"]["DocentAchternaam"]."</td>
                          </tr>
                          <tr>
                        		<th>Tussenvoegsel</th>
                            <td>".$result_class_docent_info["0"]["DocentEmail"]."</td>
                          </tr>
                        </table>";

                      }else if($_SESSION["StudentSession"] > 0){
                        $title_box_one = "Profiel";
                        $title_box_two = "".$result_class_student['0']['KlasNaam']."";
                        $data_box_one = "
                        <table class='table table-striped table-bordered'>
                        	<tr>
                        		<th>Voornaam</th>
                            <td>".$result_student["0"]["StudentVoornaam"]."</td>
                          </tr>
                          <tr>
                        		<th>Achternaam</th>
                            <td>".$result_student["0"]["StudentAchternaam"]."</td>
                          </tr>
                          <tr>
                        		<th>Tussenvoegsel</th>
                            <td>".$result_student["0"]["StudentTussenvoegsel"]."</td>
                          </tr>
                          <tr>
                        		<th>Adres</th>
                            <td>".$result_student["0"]["StudentAdres"]."</td>
                          </tr>
                          <tr>
                        		<th>Plaats</th>
                            <td>".$result_student["0"]["StudentPlaats"]."</td>
                          </tr>
                          <tr>
                        		<th>Postcode</th>
                            <td>".$result_student["0"]["StudentPostcode"]."</td>
                          </tr>
                          <tr>
                        		<th>Geboortedatum</th>
                            <td>".$result_student["0"]["StudentGeboortedatum"]."</td>
                          </tr>
                          <tr>
                        		<th>Email</th>
                            <td>".$result_student["0"]["StudentEmail"]."</td>
                          </tr>
                          <tr>
                        		<th>Klas</th>
                            <td>".$result_class_student["0"]["KlasNaam"]."</td>
                          </tr>
                        </table>";
                      }

                      if($_SESSION["StudentSession"] > 0 || $_SESSION["DocentSession"] > 0){
                        echo "<div class='triple_box'>
                                <div class='wthree-font-awesome single_box'>
                                  <div class='title_single_box'>
                                    <p>".$title_box_one." <i class='fa fa-chevron-down' aria-hidden'true'></i></p>
                                  </div>
                                <div class='data_single_box'>
                                  ";
                                  if($_SESSION["StudentSession"] > 0){
                                      echo $data_box_one;
                                    }
                                  else if($_SESSION["DocentSession"] > 0){
                                    echo "<table class='table table-striped table-bordered'>";
                                          foreach($result_class_docent as $row){
                                            echo"<tr>
                                                  <th><a href='klassen_overzicht.php' style='color: #808080;'>".$row["KlasNaam"]."</a></th>
                                                  <td>".$row["DocentVoornaam"]." ".$row["DocentAchternaam"]."</td>
                                                </tr>";
                                          }
                                        echo "</table>";
                                        }

                                  echo "</div>
                                </div>
                                <div class='wthree-font-awesome single_box'>
                                  <div class='title_single_box'>
                                    <p>".$title_box_two." <i class='fa fa-chevron-down' aria-hidden='true'></i></p>
                                  </div>
                                  <div class='data_single_box'>
                                  ";
                                  if($_SESSION["StudentSession"] > 0){
                                    echo "<table class='table table-striped table-bordered'>
                                            <tr>
                                              <th>Mentor</th>
                                              <td>".$result_mentor["0"]["DocentVoornaam"]." ".$result_mentor["0"]["DocentAchternaam"]."</td>
                                            </tr>
                                          </table>

                                          <table class='table table-striped table-bordered'>
                                            <tr>
                                              <th>Studenten</th>
                                            </tr>";
                                            foreach($result_class_student as $row)
                                          	{
                                              echo "<tr>
                                                		  <td>".$row["StudentVoornaam"]." ".$row["StudentAchternaam"]."</td>
                                                    </tr>";
                                          	}
                                          echo "</table>";
                                        }
                                    else if($_SESSION["DocentSession"] > 0){
                                          echo $data_box_two;
                                        }
                            echo "</div>
                                </div>";
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
