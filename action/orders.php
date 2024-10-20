<?php

include('../include/config.php');

// Join orders and products table to calculate total price
$sql = "SELECT o.order_id, o.seller_id, o.product_id, o.quantity, o.order_date, 
         o.status
        FROM `orders` o
        JOIN `products` p ON o.product_id = p.product_id";
        
$result = mysqli_query($conn, $sql);

$orderTable = '<thead class="table-dark">
            <tr>
                <th>Order ID</th>
                <th>customer ID</th>
                <th>Product ID</th>
                <th>Quantity</th>
                <th>Order Date</th> 
                <th>Details</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>';

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $orderTable .= '<tr>
                    <th>' . $row['order_id'] . '</th>
                    <th>' . $row['seller_id'] . '</th>
                    <th>' . $row['product_id'] . '</th>
                    <td>' . $row['quantity'] . '</td>
                    <td>' . $row['order_date'] . '</td> 
                    <td>
                          <button class="btn btn-secondary text-white text-decoration-none" id="order_details" data-id="'.$row['seller_id'].'">view details</button>
                    </td>
                    <td>
                        <button class="btn btn-warning">Edit</button>
                        <button class="btn btn-danger">Delete</button>
                    </td>
                </tr>';

    }
} else {
    $orderTable .= '<tr><td colspan="8">No orders found</td></tr>';
}

$orderTable .= '</tbody>';

echo $orderTable;
 




?>