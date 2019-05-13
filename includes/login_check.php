<?php

include_once "conn.php";
$output = "";

if(isset($_POST['login'])) {

    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);

    $salted = "afurwhfiudncmisdcjsducjw383wjfwesjn".$password."srgjnvisciwecose";

    $hashed = hash('sha512', $salted);

    $sql = "SELECT * FROM gebruiker WHERE GebruikerEmail ='$email' AND GebruikerWachtwoord = '$hashed'";
    $result = mysqli_query($conn, $sql) or die("foute sql");

    $stmt = $conn->prepare("SELECT DocentSession, StudentSession, BeheerderSession FROM gebruiker WHERE GebruikerEmail = '$email' LIMIT 1");
    $stmt->bind_result($DocentSession, $StudentSession, $BeheerderSession);
    $stmt->execute();    // Execute de voorbereide query.
    $stmt->store_result();

    // verkrijg variables van result.
//    $stmt->bind_result($DocentSession, $StudentSession, $BeheerderSession);
    $stmt->fetch();
    if(mysqli_num_rows($result) > 0){
        session_start();
        $_SESSION['email'] = $email;
        $_SESSION['DocentSession'] = $DocentSession;
        $_SESSION['StudentSession'] = $StudentSession;
        $_SESSION['BeheerderSession'] = $BeheerderSession;
        header('Location: ../index.php');
        exit();
    }else{
        header('Location: ../login.php');
        exit();
    }
}else{
//    echo "Er is iets fout gegaan met het inloggen.";
}

?>