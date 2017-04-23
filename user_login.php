<?php
/**
 * Created by PhpStorm.
 * User: Karan Jobanputra
 * Date: 05-10-2016
 * Time: 10:41 AM
 */

$servername = "localhost";
$username = "karanjobanputra";
$password = "qwerty123";
$dbname="karanjobanputra";
$response["success"] = 0;
$conn = new mysqli($servername,$username,$password,$dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user = $_GET["username"];
$pass = $_GET["password"];

$check_query = "select username from user_login where username='$user' and password='$pass'";

if(($conn->query($check_query) ->num_rows)== 1)
{
    $response["success"]=1;
}


echo $response["success"];

?>