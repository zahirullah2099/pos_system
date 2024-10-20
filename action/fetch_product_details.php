<?php
include('../include/config.php');
if($_SERVER["REQUEST_METHOD"] == 'POST' && isset($_POST['product_id'])){
    $product_id = $_POST['product_id']; 

    $sql = "SELECT `price`,`quantity` FROM `inventory` WHERE `product_id` = '$product_id'";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        echo json_encode(['success' => true, 'price' => $row['price'], 'quantity' => $row['quantity']]);
    }else{
        echo json_encode(['success' => false]);
    }
}


// if($_SERVER["REQUEST_METHOD"] == 'POST' && isset($_POST['product_id'])){
//     $product_ID = $_POST['product_id']; 

//     $sql = "SELECT `price`,`quantity` FROM `inventory` WHERE `product_id` = '$product_ID'";
//     $result = mysqli_query($conn,$sql);
//     if(mysqli_num_rows($result) > 0){
//         $row = mysqli_fetch_assoc($result);
//         echo json_encode(['success' => true, 'price' => $row['price'], 'quantity' => $row['quantity']]);
//     }else{
//         echo json_encode(['success' => false]);
//     }
// }

?>