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
    echo '<table style="text-align:center;margin-left:10%" cellpadding="5" valign="bottom">
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
                <td></td>
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
                <td style="text-align:right">
                <input type="image" src="delete.png" name="username" style="outline-width:0" onClick="if(confirm(\'Press OK to remove the product.\')) window.location.href=\'deleteproduct.php?product_id='.$row['product_id'].' \'">
                </td>
                </tr>';
        }
    }
    echo '</table>';

}
$conn->close();
?>