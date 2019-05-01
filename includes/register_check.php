<?php
    if(isset($_POST['register'])){
        require "includes/conn.php";

        $name = $_POST['gebruikersnaam'];
        $email = $_POST['email'];
        $password1 = $_POST['password1'];
        $password2 = $_POST['password2'];
    }