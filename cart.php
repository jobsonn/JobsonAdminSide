<?php

$servername = "localhost";
$username = "karanjobanputra";
$password = "qwerty123";
$dbname="karanjobanputra";

$conn = new mysqli($servername,$username,$password,$dbname);
$user_id=$_GET["email"];
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$response = array();

$sql = "select * from cart JOIN products on cart.product_id=products.product_id where customer_id='$user_id'";

$res = $conn->query($sql);

if($res->num_rows>0)
{
    $response["products"] = array();
    while($row= $res->fetch_assoc())
    {
        $login = array();
        $login["product_id"] = $row["product_id"];
        $login["category"] = $row["category"];
        $login["brand_name"] = $row["brand_name"];
        $login["size"] = $row["size"];
        $login["price"] = $row["price"];
        $login["image_url"]=$row["image_url"];
        array_push($response["products"],$login);
    }
    echo json_encode($response);
}


?>