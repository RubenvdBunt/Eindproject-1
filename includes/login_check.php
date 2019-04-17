<?php

include_once "conn.php";
$output = "";

if(isset($_POST['login'])) {

    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);

    $salted = "afurwhfiudncmisdcjsducjw383wjfwesjn".$password."srgjnvisciwecose";

    $hashed = hash('sha512', $salted);
//        echo $hashed;

    $sql = "SELECT * FROM gebruiker WHERE GebruikerEmail ='$email' AND GebruikerWachtwoord = '$hashed'";
    $result = mysqli_query($conn, $sql) or die("foute sql");

    if(mysqli_num_rows($result) > 0){
        session_start();
        $_SESSION['email'] = $email;
        header('Location: ../index.php');
        exit();
    }else{
        header('Location: ../login.php');
        exit();
    }
}else{
    echo "jammer man";
}

?>