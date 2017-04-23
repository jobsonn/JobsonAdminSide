<?php

session_start();
$servername = "localhost";
$username = "karanjobanputra";
$password = "qwerty123";
$dbname="karanjobanputra";

$conn = new mysqli($servername,$username,$password,$dbname);

$respone["success"] = 0;

if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
    $respone["success"] = 0;
}
else
{
        $respone["success"] = 1;
}



echo json_encode($respone);

exit;

?>
