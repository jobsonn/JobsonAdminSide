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
$response = array();
$pid = $_GET["pid"];

$sql = "select * from products where product_id='$pid'";

$res = $conn->query($sql);

if($res->num_rows>0)
{
    $row = $res->fetch_assoc();
        $login = array();
        $login["size"] = $row["size"];
        $login["price"] = $row["price"];
        $login["image_url"]=$row["image_url"];
        $login["description"]=$row["description"];
}

echo json_encode($login);



?>
