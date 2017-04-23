<?php
$servername = "localhost";
$username = "karanjobanputra";
$password = "qwerty123";
$dbname="karanjobanputra";
$response["success"] = 0;
$conn = new mysqli($servername,$username,$password,$dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else
{
    $pid = $_GET["pid"];
    $check = "select description from products where product_id=".$pid;

    $res = $conn->query($check);
    $res = $res->fetch_assoc();
    echo $res['description'];
}
?>