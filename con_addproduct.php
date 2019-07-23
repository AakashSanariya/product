<?php
    extract($_POST);
    $data = $_POST;
    include_once("database.php");
    for($count=0;$count<count($_POST['productName']);$count++){
        $productName = $_POST['productName'][$count];
        $sku = $_POST['sku'][$count];
        $batchDate = $_POST['batchDate'][$count];
        $price = $_POST['price'][$count];
        $sql = "INSERT INTO products (productName, sku, batchDate, price) VALUE ('$productName','$sku', '$batchDate', '$price')";
        $result = mysqli_query($con, $sql);
    }
    if ($result == "1"){
        header("location: index.php");
    }
    else{
        echo "!Opps some error occurs";
    }
?>