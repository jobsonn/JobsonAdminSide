<?php
$servername = "localhost";
$username = "karanjobanputra";
$password = "qwerty123";
$dbname="karanjobanputra";
$response["success"] = 1;
$conn = new mysqli($servername,$username,$password,$dbname);
$order_id="";
$user_id =$_GET["email"];
$mobile = $_GET["mobile"];
$address = $_GET["address"];
$name = $_GET["name"];
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}
else
{

    $sql = "SELECT * FROM cart WHERE customer_id='$user_id'";
    $res = $conn->query($sql);
    if($res)
    {
        $sql = "INSERT INTO orders (customer_id,shipping_address,mobile_number,date)VALUES ('$user_id','$address','$mobile',CURTIME())";
        $result=$conn->query($sql);
        if($result)
        {
            $sql = "SELECT order_id FROM orders  WHERE customer_id='$user_id' ORDER BY order_id DESC LIMIT 1";
            $r = $conn->query($sql);

            if($r)
            {
                $row = $r->fetch_assoc();
                $order_id = $row["order_id"];
            }

            while ($row=$res->fetch_assoc())
            {
                $sql = "INSERT INTO order_products VALUES ('$order_id',".$row["product_id"].")";
                echo $sql;
                if(!($conn->query($sql)))
                {
                    $response["success"]=0;
                    break;
                }
            }

            $sql = "DELETE FROM cart WHERE customer_id='$user_id'";
            $conn->query($sql);
        }
        else $response["success"]=0;
    }
    else $response["success"]=2;

    if($response["success"]==1)
    {
        header('Location:mail.php?email='.$user_id.'&order_id='.$order_id);
    }
}

echo $response["success"];
?>
