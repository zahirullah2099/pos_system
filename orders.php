<?php include('include/header.php'); 
include('sidebar.php');
 
include('navbar.php');
// Check if the admin is logged in
if (!isset($_SESSION['is_admin_login'])) {
    // Redirect to login page if admin is not logged in
    header('Location: index.php');
    exit;
}
 
?>
<div class="col-md-9" style="margin-left:250px">
    <div class="row">
        <div class="col-12"> 
        <h2 class="text-center text-bg-primary py-1 rounded mt-2 fw-bolder text-decoration-underline">Orders<i class="bi bi-cart-check-fill mx-2"></i></h2>
            <div id="orders_data">
            <table class="table table-bordered text-center" id="table_data">

            </table>
            </div>
            <h2 class="text-center text-bg-success py-1 rounded text-decoration-underline fw-bold">order detials <i class="bi bi-arrow-down-circle-fill mx-2"></i></h2>
            <div class="orders_details">
            <table class='table table-striped table-bordered text-center' id="orders_details">

            </table>
            </div>
</div>

    </div>
</div>
<?php include('include/footer.php'); ?>
<script src="js/orders.js"></script>