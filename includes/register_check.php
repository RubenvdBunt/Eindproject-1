<?php
if(isset($_POST['register'])){
    require "conn.php";

    $email = $_POST['email'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];

    if (empty($email) || empty($password1) || empty($password2)){
        header("Location: ../register.php?error=emptyfields&email=".$email);
        exit();
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: ../register.php?error=invalidemail");
        exit();
    }
    elseif (!preg_match("/↑[a-zA-Z0-9]*$/")){
        header("Location: ../register.php?error=invalidemail=".$email);
        exit();
    }
    else if($password1 !== $password2){
        header("Location: ../register.php?error=passwordcheckemail=".$email);
        exit();
    }
}