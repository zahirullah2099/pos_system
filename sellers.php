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
        <h2 class="text-center mt-2 fw-bolder text-decoration-underline">Customers</h2>
            <div id="sellers_data">
                
            </div>
</div>

    </div>
</div>
<?php include('include/footer.php'); ?>
<script src="js/sellers.js"></script>