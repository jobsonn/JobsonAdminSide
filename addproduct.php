<?php
    session_start();
    $servername = "localhost";
    $username = "karanjobanputra";
    $password = "qwerty123";
    $dbname="karanjobanputra";

    $conn = new mysqli($servername,$username,$password,$dbname);

    $product_id = $_POST["product_id"];
    $category = addslashes($_POST["category"]);
    $brand_name = addslashes($_POST["brand_name"]);
    $size = addslashes($_POST["size"]);
    $price = $_POST["price"];
    $description = addslashes($_POST["description"]);
    $image_url = addslashes($_POST["image_url"]);

    $sql = "insert into products VALUES ($product_id,'$category','$brand_name','$size',$price,'$description','$image_url')";

    $res = $conn->query($sql);

    if($res)
    {
        echo "<script> alert('Product Added Successfully.');window.location.href='Products.html';</script>";
    }

    else
    {
        echo "<script> alert('Could Not Add The Product. Please Try Again!');window.location.href='Products.html';</script>";
    }

    session_destroy();
    exit;
?>