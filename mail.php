<?php
require 'PHPMailerAutoload.php';

$email=$_GET["email"];
echo $email;

$order_id = $_GET["order_id"];
$mail = new PHPMailer;
$mail->SMTPDebug = 2;
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'jobsonindiapvtltd';                 // SMTP username
$mail->Password = 'BhavinKaranJobson';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->setFrom('karanthacker31@gmail.com', 'Jobson India Pvt. Ltd.'); // Add a recipien
$mail->addAddress($email, "Customer");

$mail->isHTML(true);                  // Set email format to HTML

$servername = "localhost";
$username = "karanjobanputra";
$password = "qwerty123";
$dbname="karanjobanputra";
$conn = new mysqli($servername,$username,$password,$dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM order_products JOIN products ON order_products.product_id=products.product_id WHERE order_id=$order_id";

$res = $conn->query($sql);
$mail->Subject = 'Order Placed!';
$table="";
if($res)
{
    $table = '<table>';
    while($row = $res->fetch_assoc())
    {
        $brand = $row["brand_name"];
        $category = $row["category"];
        $size = $row["size"];
        $price = $row["price"];

        $table .= '<tr><td>'.$brand.'</td><td>'.$category.'</td><td>'.$size.'</td><td>'.$price.'</td></tr>';
    }
    $table.='</table>';
}

$mail->Body= '<html><br> Dear Sir,<br><br> Your order has been received by us.'.
    '<br><br>We are happy to inform you that it has been confirmed and will be deliverd to you in 5-7 business days.<br><br>'.
    'Your Order Id is:'.$order_id.
    '<br><br>'.$table.'<br><br>'.
    'Happy Shopping at Jobson India Pvt. Ltd.<br><br>Thank You!<br><br><br>Karan Jobanputra,<br>CFO,CTO,<br>Jobson India Pvt. Ltd.</html>';
$mail->AltBody = 'Yeah! Your order has been placed';

if(!$mail->send())
{
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}
else
{
    echo 'Message has been sent';
}
?>