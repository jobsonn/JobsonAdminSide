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

$sql = "select * from products";

$res = $conn->query($sql);

if($res->num_rows > 0)
{
    echo '<table style="padding:3%;margin-left: 10%;text-align:center" cellpadding="10" valign="bottom">
            <tr style="border: none">
                <th style="color: blue;font-family: \'Lato Black\', sans-serif;border: none;border-bottom: solid 1px blue">
                    Id
                </th>
                <th style="color: blue;font-family: \'Lato Black\', sans-serif;border: none;border-bottom: solid 1px blue">
                    Category
                </th>
                <th style="color: blue;font-family: \'Lato Black\', sans-serif;border: none;border-bottom: solid 1px blue">
                    Brand
                </th>
                <th style="color: blue;font-family: \'Lato Black\', sans-serif;border: none;border-bottom: solid 1px blue">
                    Size
                </th>
                <th style="color: blue;font-family: \'Lato Black\', sans-serif;border: none;border-bottom: solid 1px blue">
                    Price
                </th>
            </tr>';

    while ($row = $res->fetch_assoc())
    {
        if (!empty($row))
        {
            echo '<tr style="border: none"><td style="font-family:\'Lato Black\', sans-serif">'
                .$row['product_id'].
                '</td>
                <td style="font-family:\'Lato Black\', sans-serif;">'
                .$row['category'].
                '</td>
                <td style="font-family:\'Lato Black\', sans-serif;">'
                .$row['brand_name'].
                '</td>
                <td style="font-family:\'Lato Black\', sans-serif;">'
                .$row['size'].
                '<td style="font-family:\'Lato Black\', sans-serif;">'
                .$row['price'].
                '
                </tr>';
        }
    }
    echo '</table>';

}
$conn->close();
?>