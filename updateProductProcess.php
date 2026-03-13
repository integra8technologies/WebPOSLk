<?php
include "connection.php";

$id = $_POST["id"];
$name = $_POST["n"];
$cost = $_POST["c"];
$sell = $_POST["s"];
$qty = $_POST["q"];
$status = $_POST["st"];

if(empty($name)) { echo "Please enter product name."; }
else if(empty($cost)) { echo "Please enter cost price."; }
else {
    // Basic Update
    Database::iud("UPDATE `product` SET `product_name`='$name', `cost_price`='$cost', 
                  `selling_price`='$sell', `stock_qty`='$qty', `status`='$status' 
                  WHERE `product_id`='$id'");

    // Image Handling (Optional)
    if(isset($_FILES["i"])) {
        $allowed_exts = ["image/jpeg", "image/png", "image/svg+xml"];
        $file = $_FILES["i"];
        if(in_array($file["type"], $allowed_exts)) {
            $new_path = "assets/products/" . $id . "_" . uniqid() . ".png";
            move_uploaded_file($file["tmp_name"], $new_path);
            Database::iud("UPDATE `product` SET `path`='$new_path' WHERE `product_id`='$id'");
        }
    }

    echo "success";
}
?>