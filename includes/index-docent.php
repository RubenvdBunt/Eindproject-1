<?php

<<<<<<< HEAD
if($_SESSION['DocentSession'] > 0){
  $query_docent = "SELECT * FROM docent LEFT JOIN gebruiker ON gebruiker.GebruikerID = docent.GebruikerID WHERE gebruiker.GebruikerID = ".$_SESSION["GebruikerID"]."";
  $statement_docent = $connect->prepare($query_docent);
  $statement_docent->execute();
  $result_docent = $statement_docent->fetchAll();
  print_r($result_docent);
  echo "<br>";

  $query_class_id = 'SELECT * FROM klas k LEFT JOIN docent d ON k.DocentID = d.DocentID WHERE k.DocentID = '.$result_docent['0']['DocentID'].'';
  $statement_class_id = $connect->prepare($query_class_id);
  $statement_class_id->execute();
  $result_class_id = $statement_class_id->fetchAll();
  print_r($result_class_id);
  echo "<br>";

  $query_class_docent = 'SELECT * FROM klas k LEFT JOIN docent d ON k.KlasID = d.KlasID WHERE d.KlasID = '.$result_class_id['0']['KlasID'].'';
  $statement_class_docent = $connect->prepare($query_class_docent);
  $statement_class_docent->execute();
  $result_class_docent = $statement_class_docent->fetchAll();
  print_r($result_class_docent);
  echo "<br>";

  $query_mentor = 'SELECT d.* FROM docent d LEFT JOIN klas k ON d.DocentID = k.DocentID WHERE k.DocentID = '.$result_class_docent["0"]["DocentID"].'';
  $statement_mentor = $connect->prepare($query_mentor);
  $statement_mentor->execute();
  $result_mentor = $statement_mentor->fetchAll();
  print_r($result_mentor);
  echo "<br>";

  $result_docent["0"]["StudentGeboortedatum"] = date("d-m-Y", strtotime($result_docent["0"]["StudentGeboortedatum"]));

  $GebruikerVoornaam = $result_docent["0"]["DocentVoornaam"];
}
?>
=======
if($_SESSION['DocentSession'] > 0) {

    //Haalt eigen informatie van docent op.
    $query_docent = "SELECT DocentVoornaam, DocentAchternaam, DocentEmail FROM docent WHERE DocentID = 2";
    $statement_docent = $connect->prepare($query_docent);
    $statement_docent->execute();
    $result_docent = $statement_docent->fetchAll();

    //Haalt alle studenten op.
    $query_studenten = "SELECT StudentVoornaam, StudentTussenvoegsel, StudentAchternaam  FROM student";
    $statement_studenten = $connect->prepare($query_studenten);
    $statement_studenten->execute();
    $result_studenten = $statement_studenten->fetchAll();

    $GebruikerVoornaam = $result_docent["0"]["DocentVoornaam"];

}
>>>>>>> 503d93d168fdddbf8dc1607f33b4d1f655f3631d
