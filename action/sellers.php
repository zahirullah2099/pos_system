<?php

include('../include/config.php');

// Join orders and products table to calculate total price
$sql = "SELECT * FROM `sellers`";
        
$result = mysqli_query($conn, $sql);

$sellerTable = '<table class="table table-bordered text-center">
        <thead class="table-dark">
            <tr> 
                <th>Seller ID</th> 
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th> 
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>';

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $sellerTable .= '<tr> 
                    <th>' . $row['seller_id'] . '</th>
                    <th>' . $row['seller_name'] . '</th>
                    <td>' . $row['email'] . '</td>
                    <td>' . $row['phone'] . '</td>  
                    <td>
                        <button class="btn btn-warning">Edit</button>
                        <button class="btn btn-danger">Delete</button>
                    </td>
                </tr>';

    }
} else {
    $sellerTable .= '<tr><td colspan="8">No orders found</td></tr>';
}

$sellerTable .= '</tbody></table>';

echo $sellerTable;

// Close the database connection
mysqli_close($conn);
