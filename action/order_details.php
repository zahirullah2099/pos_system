<!-- code for fetching order details -->
<?php
include('../include/config.php');
if(isset($_POST['seller_id'])){
    $seller_id = $_POST['seller_id'];
 

    $sql = "SELECT o.product_id, i.product_name, o.quantity, i.price, 
    (o.quantity * i.price) AS total_price
    FROM `inventory` i
    JOIN `orders` o ON i.product_id = o.product_id
    JOIN `sellers` s ON o.seller_id = s.seller_id
    WHERE o.seller_id = '$seller_id'";


    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)){ 

    // Display data in a table format
    
    echo "<thead class='table-success text-center'>
            <tr>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total Price</th>
            </tr>
          </thead>";
    echo "<tbody>";
    $grandTotal = 0;
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['product_id']}</td>
                <td>{$row['product_name']}</td>
                <td>{$row['quantity']}</td>
                <td>{$row['price']}</td>
                <td>{$row['total_price']}</td>
              </tr>";
              $grandTotal += $row['total_price'];
       
    }
    echo '<tr class="bg-dark text-light">
        <td class="text-primary fw-bold">Grand Total</td>
        <td></td>
        <td></td>
        <td></td>
        <td class="text-primary fw-bold">'.$grandTotal.'.00</td>
      </tr>';
    
    echo "</tbody>"; 
    }else{
        echo "<h3 class='alert alert-danger text-dark'>no order found for this customer!</h3>";
    }

}

?>