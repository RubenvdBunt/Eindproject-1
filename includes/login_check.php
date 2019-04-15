<?php
    include_once "conn.php";

    if(isset($_POST['login'])){

        $email = $conn->real_escape_string($_POST['email']);
        $password = $conn->real_escape_string($_POST['password']);

        $sql = $conn->query("SELECT GebruikerID, GebruikerWachtwoord, FROM gebruiker WEHERE GebruikerEmail='$email'");
        if($sql->num_rows > 0){
            $data = $sql->fetch_array();
            if(password_verify($password, $data['GebruikerWachtwoord'])){
                echo "goedzo";
            }else{
                echo "neenee";
            }
        }else{
            echo "neenee";
        }