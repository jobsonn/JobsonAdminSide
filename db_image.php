<?php

$servername = "localhost";
$username = "karanjobanputra";
$password = "qwerty123";
$dbname="karanjobanputra";

$conn = new mysqli($servername,$username,$password,$dbname);

if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}

$sql ='select image from tp where id=1';

$res = $conn->query($sql);
$result = $res->fetch_assoc();
header('content-type: image/jpeg');
echo base64_decode($result['image']);
?>
