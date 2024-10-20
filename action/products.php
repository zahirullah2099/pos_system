<?php

include('../include/config.php');
$sql = "SELECT * FROM `inventory`";
$result = mysqli_query($conn, $sql);

$productTable = '<thead class="table-dark">
                    <tr>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Price</th> 
                        <th>Actions</th>
                    </tr>
                 </thead><tbody>';

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $productTable .= '<tr>
                            <th>' . $row['product_id'] . '</th>
                            <td>' . $row['product_name'] . '</td>
                            <td>' . $row['price'] . '</td> 
                            <td> <a href="product_edit.php?edit_id=' . $row['product_id'] . '" class="btn btn-warning" id="edit_btn">Edit</a>
                                <button  class="btn btn-danger" data-id="'.$row['product_id'].'" id="delete_btn">Delete</a>
                            </td>
                        </tr>';
                       
    }
    // <a <a href="product_delete.php?delete_id=' . $row['product_id'] . '" class="btn btn-danger update_btn" id="update_btn">Delete</a>
} else {
    $productTable .= '<tr><td colspan="3">No products found</td></tr>';
}

$productTable .= '</tbody>';

echo $productTable;



// CODE FOR ADDING NEW PRODUCT
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $reorder_level = $_POST['reorder_level'];
    $last_updated = $_POST['last_updated'];

    $product_sql = "INSERT INTO products (product_name, price, quantity) 
                    VALUES ('$product_name', '$price', '$quantity')";

    if (mysqli_query($conn, $product_sql)) {
        $last_product_id = mysqli_insert_id($conn);

        $inventory_sql = "INSERT INTO inventory (product_id, product_name, price, quantity, reorder_level, last_updated) VALUES ('$last_product_id', '$product_name', '$price', '$quantity', '$reorder_level', '$last_updated')";

        if (mysqli_query($conn, $inventory_sql)) {
            echo 1;
        } else {
            echo 0;
        }
    } else {
        echo 0;
    }
}



// code for updating products

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $reorder_level = $_POST['reorder_level'];

    $sql = "UPDATE SET `inventory` (`product_name`,`price`,`quantity`,`reorder_level`) VALUES ('$product_name','$price','$quantity','$reorder_level')";

    if(mysqli_query($conn,$sql)){
        echo 1;
    }else{
        echo 0;
    }
}



?>