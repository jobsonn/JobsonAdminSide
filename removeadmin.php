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

if(strcmp($_GET["username"],"admin")==0)
{
    echo "<script> alert('Cannot remove the admin!'); window.location.href = 'viewadmins.php'; </script>";
    exit;
}
$user = addslashes($_GET["username"]);

$check_query = "select username from admin where username='$user'";

if(($conn->query($check_query) ->num_rows) == 0)
{
    echo "<script> alert('Username does not exist.'); window.location.href = 'viewadmins.php'; </script>";
    session_destroy();
    exit;
}



$sql = "delete from admin where username='$user'";

$res = $conn->query($sql);
if($res)
{
    echo "<script> alert('Admin Removed Successfully!');window.location.href='viewadmins.php';</script>";
}
else
{
    echo "<script> alert('Could not add the admin.Please Try Again');window.location.href='viewadmins.php';</script>";
}
$conn->close();
session_destroy();
exit;
?>