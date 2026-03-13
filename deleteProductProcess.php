<?php
include "connection.php";

if(isset($_POST["id"])) {
    $pid = $_POST["id"];

    // Check if product exists
    $product_rs = Database::search("SELECT * FROM `product` WHERE `product_id`='".$pid."'");
    
    if($product_rs->num_rows == 1) {
        // Delete the product
        Database::iud("DELETE FROM `product` WHERE `product_id`='".$pid."'");
        echo "success";
    } else {
        echo "Product not found.";
    }
} else {
    echo "Something went wrong. Please try again.";
}
?>