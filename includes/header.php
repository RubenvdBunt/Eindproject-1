<?php
session_start();
include_once "includes/conn.php";
include_once "includes/login_check.php";
if(isset($_SESSION["email"])){
//    echo '<h3>Login succesvol' .$_SESSION["email"]. '</h3>';
}else{
    header("Location: login.php");
    exit();
}
//    if(isset($_SESSION["DocentID"]) || isset($_SESSION["GebruikerID"]) ){
//        echo "gelukt";
//    }else{
//        echo "niet gelukt";
//    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Eindproject leerjaar 2</title>
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href="css/style-responsive.css" rel="stylesheet"/>
    <link href="css/font-awesome.css" rel="stylesheet" />
    <link href="css/jquery-ui.css" rel="stylesheet" />
    <link href="css/bootstrap.min.css" rel="stylesheet" />
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
