<?php
include("../include/config.php");
// delete
if (isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];
    $sql = "DELETE FROM `inventory` WHERE `product_id` = '$delete_id'";
    if (mysqli_query($conn, $sql)) {
        echo json_encode(['success' => true, "messege" => "product deleted successfully!"]);  
    } else {
        echo json_encode(['success' => false, "messege" => "product deleted failed!"]);  
    }
    
    }

?>