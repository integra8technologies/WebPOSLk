<?php
include "connection.php";
session_start();

if (isset($_SESSION["a"]) && isset($_POST["cartData"])) {
    $inv = $_POST["inv"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $subtotal = $_POST["subtotal"];
    $total = $_POST["total"];
    
    $cart = json_decode($_POST["cartData"], true);

    foreach ($cart as $item) {
        $name = $item['name'];
        $count = (int)$item['qty'];
        
        // 1. Record the transaction
        Database::iud("INSERT INTO `invoice` (`inv`, `date`, `time`, `product_name`, `count`, `subtotal`, `total`) 
        VALUES ('".$inv."', '".$date."', '".$time."', '".$name."', '".$count."', '".$subtotal."', '".$total."')");

        // 2. Update stock and check if status needs to be 0
        // Logic: Set status = 0 IF the new stock_qty is 0 or less
        Database::iud("UPDATE `product` 
                       SET `stock_qty` = `stock_qty` - ".$count.",
                           `status` = IF(`stock_qty` - ".$count." <= 0, 0, 1)
                       WHERE `product_name` = '".$name."'");
    }

    echo "success";
} else {
    echo "error";
}
?>