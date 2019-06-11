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

    $stmt = $conn->prepare("SELECT GebruikerID, DocentSession, StudentSession, BeheerderSession, EersteLogin FROM gebruiker WHERE GebruikerEmail = '$email' LIMIT 1");
    $stmt->bind_result($GebruikerID, $DocentSession, $StudentSession, $BeheerderSession, $EersteLogin);
    $stmt->execute();
    $stmt->store_result();

    $stmt->fetch();

    if(mysqli_num_rows($result) > 0 && $EersteLogin == 1){
      session_start();
      $_SESSION['email'] = $email;
      $_SESSION['DocentSession'] = $DocentSession;
      $_SESSION['StudentSession'] = $StudentSession;
      $_SESSION['BeheerderSession'] = $BeheerderSession;
      $_SESSION['GebruikerID'] = $GebruikerID;
      header('location: ../login-update.php');
      exit();
    } elseif(mysqli_num_rows($result) > 0 && $EersteLogin != 1){
      session_start();
      $_SESSION['email'] = $email;
      $_SESSION['DocentSession'] = $DocentSession;
      $_SESSION['StudentSession'] = $StudentSession;
      $_SESSION['BeheerderSession'] = $BeheerderSession;
      $_SESSION['GebruikerID'] = $GebruikerID;
      header('Location: ../index.php');
      exit();
    }
    else{
        header('Location: ../login.php?error=fout');
        exit();
    }
  } else{
//    echo "Er is iets fout gegaan met het inloggen.";
}

?>
