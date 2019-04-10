<?php

    include_once "conn.php";

    $error = '';
    if(isset($_POST['login'])){
        if(empty($_POST['email']) || empty($_POST['password'])){
            $error = "Vul alle vlden in.";
            echo $error;
        }
        else{
            $email = $_POST['email'];
            $password = $_POST['password'];

            $query = mysqli_query($conn, "SELECT * FROM gebruiker WHERE GebruikerWachtwoord='$password' AND GebruikerEmail='$email'");

            $rows = mysqli_num_rows($query);
            if($rows == 1){
                session_start();
                $_SESSION['email'] = $email;
                header("Location: ../index.php?login=succes");
                exit();
            }
            else{
                header("Location: ../login.php?error");
                exit();
                $error = "Ongeldige combinatie.";
                echo $error;
            }
            mysqli_close($conn);
        }
    }
?>