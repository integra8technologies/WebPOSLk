<?php
include "connection.php";

$pid = $_POST["pid"];
$pname = $_POST["pname"];
$cat = $_POST["cat"];
$basePrice = $_POST["basePrice"]; 
$costPrice = $_POST["costPrice"]; 
$qty = $_POST["qty"];            

// Validation
if (empty($pid)) {
    echo "Please enter product ID";
} elseif (empty($pname)) {
    echo "Please enter product name";
} elseif ($cat == "0") {
    echo "Please select product category";
} elseif (!is_numeric($basePrice) || $basePrice < 0) {
    echo "Invalid cost price";
} elseif (!is_numeric($costPrice) || $costPrice < 0) {
    echo "Invalid selling price";
} elseif (!is_numeric($qty) || $qty < 0) {
    echo "Invalid quantity";
} elseif (!isset($_FILES["image"])) {
    echo "Please select an image";
} else {
    // Duplicate check
    $rs = Database::search("SELECT * FROM `product` WHERE `product_id` = '$pid' OR `product_name` = '$pname'");
    if ($rs->num_rows > 0) {
        echo "Product ID or Name already exists.";
    } else {
        $image = $_FILES["image"];
        $allowed_types = ["image/jpeg", "image/png", "image/webp"];
        
        if (!in_array($image["type"], $allowed_types)) {
            echo "Please upload a valid image (JPG, PNG, or WEBP).";
        } else {
            // Folder Setup
            $dir = "Resources/ProductImg/";
            if (!file_exists($dir)) {
                mkdir($dir, 0777, true);
            }

            // Get proper extension
            $ext = pathinfo($image["name"], PATHINFO_EXTENSION);
            $fileName = $dir . uniqid("img_") . "." . $ext;

            if (move_uploaded_file($image["tmp_name"], $fileName)) {
                // Database Insertion
                Database::iud("INSERT INTO `product` (`product_id`, `product_name`, `category_id`, `cost_price`, `selling_price`, `stock_qty`, `path`, `status`) 
                VALUES ('$pid', '$pname', '$cat', '$basePrice', '$costPrice', '$qty', '$fileName', '1')");
                
                echo "Success";
            } else {
                echo "Failed to upload image.";
            }
        }
    }
}
?>