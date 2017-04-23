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

$check_query = "select username from admin where username='$user'";
if(($conn->query($check_query) ->num_rows)== 1)
{
    echo "<script> alert('Username already exists.'); window.location.href = 'addadmin.html'; </script>";
    session_destroy();
    exit;
}
$sql = "insert into admin VALUES ('$user','$pass')";

$res = $conn->query($sql);
$conn->close();

if($res)
echo "<script>
alert('Added the admin successfully!');
window.location.href='addadmin.html';
    
</script>";

else echo "<script> alert('Could Not Add The Admin. Please Try Again'); window.location.href = 'addadmin.html';</script>";
session_destroy();
exit;
?>