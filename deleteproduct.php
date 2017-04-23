<?php
session_start();
$servername = "localhost";
$username = "karanjobanputra";
$password = "qwerty123";
$dbname="karanjobanputra";

$conn = new mysqli($servername,$username,$password,$dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$product_id = addslashes($_GET["product_id"]);

$sql = "delete from products where product_id='$product_id'";

$res = $conn->query($sql);
if($res)
{
    echo "<script> alert('Product Removed Successfully!');window.location.href='viewproducts_admin.php';</script>";
}
else
{
    echo "<script> alert('Could not remove the admin.Please Try Again');window.location.href='viewproducts_admin.php';</script>";
}
$conn->close();
session_destroy();
exit;
?>