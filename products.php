<?php include('include/header.php');
include('sidebar.php');



include('include/config.php');
include('navbar.php');
// Check if the admin is logged in
if (!isset($_SESSION['is_admin_login'])) {
    // Redirect to login page if admin is not logged in
    header('Location: index.php');
    exit;
}
 
?>
<div class="col-md-9" style="margin-left: 250px;">
    <div class="row">
        <div class="col-12">
            <h2 class="text-center text-bg-primary rounded py-1 mt-1 fw-bolder text-decoration-underline">Manage Products</h2>
            <div id="messege"></div>
            <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addProduct">Add New Product</button>
            <div id="response"></div>
             <div id="data">
                <table class="table table-bordered text-center myTable" id="table_data">
                   

                </table>

            </div>
        </div>
    </div>
</div>

<!-- modal for adding new product -->

<!-- Modal -->
<div class="modal fade" id="addProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" id="formData">
                    <div class="row">
                        <!-- Left side fields -->
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="product_name" class="form-label">Product Name:</label>
                                <input type="text" class="form-control" id="product_name" name="product_name" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="price" class="form-label">Price:</label>
                                <input type="number" class="form-control" id="price" name="price" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="quantity" class="form-label">Quantity:</label>
                                <input type="number" class="form-control" id="quantity" name="quantity" required>
                            </div>
                        </div>

                        <!-- Right side fields -->
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="reorder_level" class="form-label">Reorder Level:</label>
                                <input type="number" class="form-control" id="reorder_level" name="reorder_level" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="last_updated" class="form-label">Last Updated:</label>
                                <input type="date" class="form-control" id="last_updated" name="last_updated" value="<?php echo date('Y-m-d'); ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <button type="submit" id="submitBtn" class="btn btn-success float-end">Add Product</button>
                </form>
            </div>


        </div>
    </div>
</div>
<!-- modal for adding new product end -->

<!-- modal for editing product start -->
 

<!-- Modal -->
<div class="modal fade" id="edit_btn" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


<!-- modal for editing product end -->









<?php include('include/footer.php'); ?>
<script src="js/products.js"></script>
 