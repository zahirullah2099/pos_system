<?php
include('include/config.php');
 if(isset($_GET['delete_id'])){
    $delete_id = $_GET['delete_id'];
    $sql = "DELETE FROM `inventory` WHERE `product_id` = '$delete_id'";
    if(mysqli_query($conn,$sql)){
        header('location:products.php');
    }
 }
?>