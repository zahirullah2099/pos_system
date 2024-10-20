<?php

include('../include/config.php');

// Join orders and products table to calculate total price
$sql = "SELECT * FROM `inventory`";
        
$result = mysqli_query($conn, $sql);

$inventoryTable = '<thead class="table-dark">
            <tr> 
                <th>Inventory ID</th> 
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Reorder level</th> 
                <th>Last Updated</th>  
            </tr>
        </thead>
        <tbody>';

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $inventoryTable .= '<tr> 
                    <th>' . $row['inventory_id'] . '</th>
                    <th>' . $row['product_id'] . '</th>
                    <th>' . $row['product_name'] . '</th>
                    <td>' . $row['quantity'] . '</td>
                    <td>' . $row['reorder_level'] . '</td>  
                    <td>' . $row['last_updated'] . '</td>  
                </tr>';

    }
} else {
    $inventoryTable .= '<tr><td colspan="8">No orders found</td></tr>';
}

$inventoryTable .= '</tbody>';

echo $inventoryTable;

// Close the database connection
mysqli_close($conn);
