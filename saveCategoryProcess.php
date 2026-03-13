<?php
include "connection.php";

$name = $_POST["name"];

if (empty($name)) {
    echo "Please enter a category name";
} elseif (strlen($name) > 45) {
    echo "Category name must be less than 45 characters";
} else {
    // Check if category name already exists
    $rs = Database::search("SELECT * FROM `category` WHERE `name` = '$name'");
    
    if ($rs->num_rows > 0) {
        echo "This category already exists";
    } else {
        // Insert only the name. 'id' is handled by AUTO_INCREMENT.
        Database::iud("INSERT INTO `category` (`name`) VALUES ('$name')");
        echo "Success";
    }
}
?>