<?php
if(isset($_POST['register'])){
    require "conn.php";

    $name = $_POST['gebruikersnaam'];
    $email = $_POST['email'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];

    if (empty($name) || empty($email) || empty($password1) || empty($password2)){
        header("Location: ../register.php?error=emptyfields&gebruikerid=".$name."&email=".$email);
        exit();
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && (!preg_match("/[a-zA-Z0-9]*$/", $name)){

    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: ../register.php?error=invalidmail&gebruikerid=".$name);
        exit();
    }
    elseif (!preg_match("/[a-zA-Z0-9]*$/", $name)){
        header("Location: ../register.php?error=invalidgebruikerid&email=".$email);
        exit();
    }
}