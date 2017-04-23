<!DOCTYPE html>
<html>

</html>

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

$sql = "select * from orders";

$res = $conn->query($sql);

if($res->num_rows > 0)
{
    echo '<table style="text-align:center;margin-left: 2%" cellpadding="5" valign="bottom">
            <tr style="border: none;margin-top: 5%">
                <th style="color: blue;font-family: \'Lato Black\', sans-serif;border: none;border-bottom: solid 1px blue">
                   Order <br>Id
                </th>
                <th style="color: blue;font-family: \'Lato Black\', sans-serif;border: none;border-bottom: solid 1px blue">
                    Customer Id
                </th>
                <th style="color: blue;font-family: \'Lato Black\', sans-serif;border: none;border-bottom: solid 1px blue">
                    Shipping 
                    <br>Address
                </th>
                <th style="color: blue;font-family: \'Lato Black\', sans-serif;border: none;border-bottom: solid 1px blue">
                    Mobile No
                </th>
                <th style="color: blue;font-family: \'Lato Black\', sans-serif;border: none;border-bottom: solid 1px blue">
                    Date
                </th>
            </tr>';

    while ($row = $res->fetch_assoc())
    {
        if (!empty($row))
        {
            echo '<tr style="border: none"><td style="font-family:\'Lato Black\', sans-serif;">'
                .$row['order_id'].
                '</td>
                <td style="font-family:\'Lato Black\', sans-serif;">'
                .$row['customer_id'].
                '</td>
                <td style="font-family:\'Lato Black\', sans-serif;">'
                .$row['shipping_address'].
                '</td>
                <td style="font-family:\'Lato Black\', sans-serif;">'
                .$row['mobile_number'].
                '<td style="font-family:\'Lato Black\', sans-serif;">'
                .$row['date'].
                '
                </tr>';
        }
    }
    echo '</table>';

}
$conn->close();
?>