<?php

    include_once "conn.php";

    $error = '';
    if(isset($_POST['login'])){

        $email = $conn->real_escape_string($_POST['email']);
        $password = $conn->real_escape_string($_POST['password']);

        $sql = $conn->query("SELECT GebruikerID, GebruikerWachtwoord, FROM gebruiker WEHERE GebruikerEmail='$email'");
        if($sql->num_rows > 0){
            z
        }

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
<!---->
<!--include_once "conn.php";-->
<!---->
<!--if(isset($_POST['login'])) {-->
<!---->
<!--    $email = $conn->real_escape_string($_POST['email']);-->
<!--    $password = $conn->real_escape_string($_POST['password']);-->
<!---->
<!--    $sql = $conn->query("SELECT `GebruikerID`, `GebruikerWachtwoord` FROM `gebruiker` WEHERE `GebruikerEmail` = '$email'");-->
<!--    echo $sql;-->
<!--    if ($sql->num_rows > 0) {-->
<!--        $data = $sql->fetch_array();-->
<!--        if (password_verify($password, $data['GebruikerWachtwoord'])) {-->
<!--            echo "goedzo";-->
<!--        } else {-->
<!--            echo "nee";-->
<!--        }-->
<!--    }else{-->
<!--        echo "neenee";-->
<!--    }-->
<!--}-->