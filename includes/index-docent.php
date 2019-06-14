<?php

if($_SESSION['DocentSession'] > 0) {

    //Haalt eigen informatie van docent op.
    $query_docent = "SELECT DocentVoornaam, DocentAchternaam, DocentEmail FROM docent WHERE DocentID = 2";
    $statement_docent = $connect->prepare($query_docent);
    $statement_docent->execute();
    $result_docent = $statement_docent->fetchAll();

    //Haalt alle studenten op.
    $query_studenten = "SELECT StudentVoornaam, StudentTussenvoegsel, StudentAchternaam  FROM student WHERE DocentIS = $DocentID";
    $statement_studenten = $connect->prepare($query_studenten);
    $statement_studenten->execute();
    $result_studenten = $statement_studenten->fetchAll();

    $GebruikerVoornaam = $result_docent["0"]["DocentVoornaam"];

}