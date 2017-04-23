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

    $user = addslashes($_POST["username"]);
    $pass = addslashes($_POST["password"]);
$sql = "select username,password from admin where username='$user' && password='$pass'";
$res = $conn->query($sql);

if($res->num_rows == 1)
{
    if($_POST["username"] == 'admin')
	header('Location: admin.html');
    else header('Location: user_admin.html');
    session_destroy();
  exit();
}
else
{
    echo "<script> alert('The Username or Password is Incorrect!');window.location.href='index.html';</script>";
    session_destroy();
  exit();
}

?>
