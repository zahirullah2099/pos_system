<?php include('include/header.php');
include('sidebar.php');
include('include/config.php');



// code for find values using id
if (isset($_GET['edit_id'])) {
    $edit_id = $_GET['edit_id'];


    $query = "SELECT * FROM `inventory` WHERE `product_id` = '$edit_id'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    }
}
?>

<div class="col-md-9 mt-2 p-5" style="margin-left:250px">
    <h2 class="text-success text-decoration-underline">Update Product</h2>
    <form method="POST" id="formData">
        <div class="row">
            <div class="col-md-6 shadow-lg">
                <div class="form-group mb-3">
                    <label for="product_id" class="form-label"><b>Product ID</b></label>
                    <input type="text" class="form-control" id="product_id" name="product_id" value="<?php echo $row['product_id']; ?>" required>
                </div>
                <div class="form-group mb-3">
                    <label for="product_name" class="form-label"><b>Product Name</b></label>
                    <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo $row['product_name']; ?>" required>
                </div>
                <div class="form-group mb-3">
                    <label for="price" class="form-label"><b>Price</b></label>
                    <input type="number" class="form-control" id="price" name="price" value="<?php echo $row['price']; ?>" required>
                </div>
                <div class="form-group mb-3">
                    <label for="quantity" class="form-label"><b>Quantity</b></label>
                    <input type="number" class="form-control" id="quantity" name="quantity" value="<?php echo $row['quantity']; ?>" required>
                </div>
                <div class="form-group mb-3">
                    <label for="reorder_level" class="form-label"><b>Reorder Level</b></label>
                    <input type="number" class="form-control" id="reorder_level" name="reorder_level" value="<?php echo $row['reorder_level']; ?>" required>
                </div>

                <button type="submit" id="updateBtn" class="btn btn-success float-end mb-2">Update</button>
            </div>
        </div>
    </form>

</div>



<!-- code for updating the product -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $reorder_level = $_POST['reorder_level'];

     
    $sql = "UPDATE `inventory` SET 
            `product_name` = '$product_name', 
            `price` = '$price', 
            `quantity` = '$quantity', 
            `reorder_level` = '$reorder_level' 
            WHERE `product_id` = '$id'";

    
    if (mysqli_query($conn, $sql)) {
        echo 1; 
        header('location:products.php');
    } else {
        echo 0; // Error response
    }
}
?>


<?php include('include/footer.php'); ?>
<script src="js/products.js"></script>