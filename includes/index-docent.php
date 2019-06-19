<?php

if($_SESSION['DocentSession'] > 0){
  // $query_class = "SELECT * FROM klas";
  // $statement_class = $connect->prepare($query_class);
  // $statement_class->execute();
  // $result_class = $statement_class->fetchAll();

  $query_class_docent = "SELECT * FROM klas k LEFT JOIN docent d ON k.DocentID = d.DocentID";
  $statement_class_docent = $connect->prepare($query_class_docent);
  $statement_class_docent->execute();
  $result_class_docent = $statement_class_docent->fetchAll();

}
?>
