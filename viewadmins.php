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

$sql = "select username from admin";

$res = $conn->query($sql);

if($res->num_rows > 0)
{
    echo '<table style="padding-bottom: 2%;margin-left: 10%">
            <tr style="border: none">
                <th style="color: blue;padding-bottom:2%;text-align:left;font-family: \'Lato Black\', sans-serif;font-size: 125%;border: none;border-bottom: solid 1px blue" colspan="2"">
                    Username
                </th>
            </tr>';

        while ($row = $res->fetch_assoc())
        {
            if (!empty($row))
            {
                echo '<tr style="border: none">
                   <td style="font-family:\'Lato Black\', sans-serif;padding-top:10px;font-size:110%;">'.$row['username'].'</td>
                <td style="text-align:right;width:100%">
                <input type="image" src="delete.png" name="username" style="outline-width:0" onClick="if(confirm(\'Press OK to remove the admin.\')) window.location.href=\'removeadmin.php?username='.$row['username'].' \'">
                </td>
                </tr>';
            }
        }
        echo '</table>';

}
    $conn->close();
?>