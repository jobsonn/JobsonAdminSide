<?php
session_start();
$servername = "localhost";
$username = "karanjobanputra";
$password = "qwerty123";
$dbname="karanjobanputra";

$conn = new mysqli($servername,$username,$password,$dbname);

if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
    session_destroy();
}

$current_password = addslashes($_POST["current_password"]);

$check_password = "select password from admin where username='admin' AND password = '$current_password'";
$res = $conn->query($check_password);
if( $res && $res->num_rows == 1) {
    $new_password = addslashes($_POST["new_password"]);
    $confirm_password = addslashes($_POST["confirm_password"]);

    if ($new_password == $confirm_password) {
        $update_password = "update admin set password='$new_password' where username='admin'";
        $res = $conn->query($update_password);

        if (!$res) {
            echo "<script> alert('Could Not Change The Password. Please Try Again.'); window.location.href='ChangePassword.html';</script>";
        } else {
            echo "<script> alert('The Password Changed Successfully!'); window.location.href='ChangePassword.html';</script>";
            session_destroy();
        }
    }
    else {
        echo "<script> alert('The Passwords Do Not Match.'); window.location.href='ChangePassword.html';</script>";
        session_destroy();
    }
}

else
{
    echo "<script> alert('The Current Password is Wrong'); window.location.href='ChangePassword.html';</script>";
    session_destroy();
}
exit;

?>