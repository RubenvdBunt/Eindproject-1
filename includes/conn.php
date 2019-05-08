<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbName = "eindopdracht";

$conn = mysqli_connect("localhost","root","","eindopdracht");
$connect = new PDO("mysql:host=localhost;dbname=eindopdracht", "root", "");

// Check connection
if (mysqli_connect_errno())
{
    echo "Connectie mislukt" . mysqli_connect_error();
}else{
//     echo "Gelukt ";
}
?>
