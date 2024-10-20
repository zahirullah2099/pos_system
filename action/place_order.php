<?php

include('../include/config.php');  

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
    $customer_id = $_POST['customer_id'];
    $date = $_POST['date'];
    $product_ids = $_POST['product_id'];  
    $product_prices = $_POST['product_price'];  
    $quantities = $_POST['quantity'];  
    $total_order_prices = $_POST['total_order_price'];  
    $grand_total = $_POST['grand_total'];
    $paid_amount = $_POST['paid_amount'];
    $remaining_amount = $_POST['remaining_amount'];
    $description = $_POST['description']; 

    foreach ($product_ids as $index => $product_id) {
        $quantity = $quantities[$index];
        $total_price = $total_order_prices[$index];

     
        $insert_order_query = "INSERT INTO orders (seller_id, product_id, quantity, order_date, total_amount) 
                               VALUES ('$customer_id', '$product_id', '$quantity', '$date', '$total_price')";
        mysqli_query($conn, $insert_order_query);
    }
    
    $last_order_id = mysqli_insert_id($conn);

    
    $insert_customer_payment = "INSERT INTO `customer_payment` (`order_id`, `seller_id`, `description`, `total_amount`, `paid_amount`, `remaining_amount`, `date`) 
     VALUES ('$last_order_id', '$customer_id', '$description', '$grand_total', '$paid_amount', '$remaining_amount', '$date')";
    
    
    if (mysqli_query($conn, $insert_customer_payment)) {
        echo json_encode(['success' => true, 'message' => 'Order and payment placed successfully.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'There was an error processing the order.']);
    }
}

?>



























// include('../include/config.php');

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
// $customerId = $_POST['customer_id'];
// $productId = $_POST['product_id'];
// $quantity = $_POST['quantity'];
// $totalOrderPrice = $_POST['total_order_price'];
// $paid_amount = $_POST['paid_amount'];
// $Remaining_amount = $_POST['remaining_amount'];
// $description = $_POST['description'];
// $date = $_POST['date'];

// $sql = "INSERT INTO orders (`seller_id`, `product_id`, `quantity`, `total_amount`) VALUES ('$customerId','$productId' , '$quantity', '$totalOrderPrice')";


// if (mysqli_query($conn, $sql)) {
// $last_order_id = mysqli_insert_id($conn);
// $sql2 = "INSERT INTO `customer_payment` (`order_id`,`seller_id`,`description`,`total_amount`,`paid_amount`,`remaining_amount`,`date`) VALUES ('$last_order_id','$customerId','$description','$totalOrderPrice','$paid_amount','$Remaining_amount','$date')";

// if(mysqli_query($conn,$sql2)){

// echo json_encode(['success' => true, "messege" => "Order and payment placed successfully"]);
// } else {
// echo json_encode(['success' => false, "messege" => "Order placed, but payment insertion failed"]);
// }

// } else {
// echo json_encode(['success' => false, "message" => "Order insertion failed"]);
// }
// }
?>