<?php
include "connection.php";
session_start();

if (isset($_SESSION["a"]) && isset($_POST["cid"])) {
    $cid = $_POST["cid"];

    // Check if any products are using this category first (Optional but Recommended)
    $check_rs = Database::search("SELECT * FROM `product` WHERE `category_id` = '".$cid."'");
    
    if ($check_rs->num_rows > 0) {
        echo "Cannot delete. There are products linked to this category.";
    } else {
        // Perform deletion
        Database::iud("DELETE FROM `category` WHERE `id` = '".$cid."'");
        echo "success";
    }

} else {
    echo "Authentication failed or ID missing.";
}
?>