<?php

if($_SESSION['StudentSession'] > 0){

  $query_student = "SELECT * FROM student LEFT JOIN gebruiker ON gebruiker.GebruikerID = student.GebruikerID WHERE gebruiker.GebruikerID = ".$_SESSION["GebruikerID"]."";
  $statement_student = $connect->prepare($query_student);
  $statement_student->execute();
  $result_student = $statement_student->fetchAll();

  $query_class_student = 'SELECT * FROM klas k LEFT JOIN student s ON k.KlasID = s.KlasID WHERE s.KlasID = '.$result_student['0']['KlasID'].'';
  $statement_class_student = $connect->prepare($query_class_student);
  $statement_class_student->execute();
  $result_class_student = $statement_class_student->fetchAll();

  $query_mentor = 'SELECT d.* FROM docent d LEFT JOIN klas k ON d.DocentID = k.DocentID WHERE k.DocentID = '.$result_class_student["0"]["DocentID"].'';
  $statement_mentor = $connect->prepare($query_mentor);
  $statement_mentor->execute();
  $result_mentor = $statement_mentor->fetchAll();

  $result_student["0"]["StudentGeboortedatum"] = date("d-m-Y", strtotime($result_student["0"]["StudentGeboortedatum"]));

  $GebruikerVoornaam = $result_student["0"]["StudentVoornaam"];
}

?>
