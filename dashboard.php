<?php
 include('include/header.php');
 include('include/config.php');
include('sidebar.php');
include('navbar.php');
// Check if the admin is logged in
if (!isset($_SESSION['is_admin_login'])) {
    // Redirect to login page if admin is not logged in
    header('Location: index.php');
    exit;
}


$sql = "SELECT * FROM `products`";
$result = mysqli_query($conn,$sql);
$total_products = mysqli_num_rows($result);

$sql = "SELECT * FROM `orders`";
$result = mysqli_query($conn,$sql);
$total_orders = mysqli_num_rows($result);

$sql = "SELECT COUNT(*) AS total_less_products FROM `inventory` WHERE quantity < reorder_level";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$total_less_products = $row['total_less_products'];  

 


?>

<div class="col-md-9 mt-3 h-100 align-items-center" style="margin-left:250px">
    <div class="row justify-content-center  align-items-lg-center">
        <div class="col-md-5 m-3 py-5  shadow-lg  rounded text-dark fw-bold" >
            <div class="text-center">
                <div class="card-body">
                    <h5>Total Products</h5>
                    <p><?php echo $total_products; ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-5 m-3 py-5  shadow-lg rounded text-dark fw-bold" >
            <div class="text-center">
                <div class="card-body">
                    <h5>Orders</h5>
                    <p><?php echo $total_orders; ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center align-items-lg-center">
        <div class="col-md-5 m-3 py-5  shadow-lg rounded text-dark fw-bold" >
            <div class="text-center">
                <div class="card-body">
                    <h5>Low Stock Alerts</h5>
                    <p><?php echo $total_less_products ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-5 m-3 py-5  shadow-lg rounded text-dark fw-bold">
            <div class="text-center">
                <div class="card-body">
                    <h5>Recent Orders</h5>
                    <p>View Latest Orders</p>
                </div>
            </div>
        </div>
    </div>

</div>

<?php include('include/footer.php'); ?>