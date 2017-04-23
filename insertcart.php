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
$userid = $_GET["userid"];
$pid = $_GET["pid"];

$sql = "insert into cart VALUES ('$userid',$pid)";

$res = $conn->query($sql);
if($res)
    $response["success"]=1;
else $response["success"]=0;;

echo $response["success"];
?>
