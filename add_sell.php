 <?php
    include('include/header.php');
    include('sidebar.php');
    include('include/config.php');

    include('navbar.php');
    // Check if the admin is logged in
    if (!isset($_SESSION['is_admin_login'])) {
        // Redirect to login page if admin is not logged in
        header('Location: index.php');
        exit;
    }

    // fetching some data from inventory table to show it in dropdowns and input feilds


    ?>
 <div class="col-md-9" style="margin-left:250px">
     <div class="row">
         <div class="col-12">
             <h2 class="text-center text-bg-primary py-1 rounded mt-2 fw-bolder text-decoration-underline">add sell</h2>
             <div id="response"></div>
             <form method="POST" id="orderForm">
                 <!-- -------------------row 1 start ------------------- -->
                 <div class="row my-5">

                     <div class="col-md-3">
                         <label for="customer"><b>Select Customer:</b></label>
                         <select id="customer" name="customer_id" class="form-select" required>
                             <option value="" disabled selected>Select Customer</option>
                             <!-- Dynamically load customer options from the database -->
                             <?php
                                $sql = "SELECT * FROM `sellers`";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {

                                    echo " <option value='" . $row['seller_id'] . "'>" . $row['seller_id'] . " : " . $row['seller_name'] . "</option>";
                                }
                                ?>
                         </select>
                     </div>
                     <div class="col-md-3">
                         <label for="product_price"><b>Date:</b></label>
                         <input type="date" class="form-control" id="date" name="date" value="<?php echo date('Y-m-d'); ?>" readonly>
                     </div>
                 </div>
                 <!-- -------------------row 1 end ------------------- -->
                 <hr>
                 <!-- -------------------row 2 start ------------------- -->
                 <div class="row mb-3" id="container">
                     <div class="col-md-3">
                         <label for="product"><b>Select Product:</b></label>
                         <select id="product" name="product_id[]" class="form-select" required>
                             <option value="" disabled selected>Select Product</option>
                             <!-- Dynamically load product options from the database -->
                             <?php
                                $sql = "SELECT * FROM `inventory`";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {

                                        echo " <option value='" . $row['product_id'] . "'>" . $row['product_id'] . " : " . $row['product_name'] . "</option>";
                                    }
                                }
                                ?>
                             <!-- More product options -->
                         </select>
                     </div>
                     <div class="col-md-2">
                         <label for="product_price"><b>Product Price:</b></label>
                         <input type="text" class="form-control" id="product_price" name="product_price[]" value=" " readonly>
                     </div>

                     <div class="col-md-2">
                         <label for="quantity"><b>Quantity:</b></label>
                         <input type="number" class="form-control" id="quantity" name="quantity[]" required>
                     </div>

                     <div class="col-md-2">
                         <label for="stock_quantity"><b>Stock Quantity:</b></label>
                         <input type="text" class="form-control" id="stock_quantity" name="stock_quantity[]" value=" " readonly>
                     </div>

                     <div class="col-md-2">
                         <label for="total_order_price"><b>Total Order Price:</b></label>
                         <input type="text" class="form-control" id="total_order_price" name="total_order_price[]" value=" " readonly>
                     </div>

                     <div class="col-md-1">
                         <button class="btn btn-primary" id="add_btn"><i class="bi bi-plus-circle"></i></button>
                     </div>
                 </div>
                 <!-- -------------------row 2 end ------------------- -->
                 <hr>
                 <!-- --------------- row 3 start ---------------- -->
                 <div class="row mt-3 shadow">
                     <div class="col-md-3">
                         <label for="grand_total"><b>Grand total:</b></label>
                         <input type="number" class="form-control" id="grand_total" name="grand_total" value=" ">
                     </div>
                     <div class="col-md-3">
                         <label for="product_price"><b>Paid Amount:</b></label>
                         <input type="number" class="form-control" id="paid_amount" name="paid_amount" value=" ">
                     </div>
                     <div class="col-md-3">
                         <label for="product_price"><b>Remaining Amount:</b></label>
                         <input type="number" class="form-control" id="remaining_amount" name="remaining_amount" value=" ">
                     </div>
                     <div class="col-md-3">
                         <label for="product_price"><b>Description:</b></label>
                         <textarea name="description" id="description" class="form-control"></textarea>
                     </div>

                 </div>
                 <!-- --------------- row 3 end ---------------- -->

                 <button type="submit" id="place_order" class="btn btn-success float-end">Place Order</button>
             </form>

         </div>

     </div>
 </div>








 <?php
    include('include/footer.php');
    ?>

 <script>
     $(document).ready(() => {

         // CHANGE EVENT FOR PRODUCT DETAILS LIKE PRICE AND STOCK QUANTITY
         $("#container").on('change', "#product", function() {
             var product_id = $(this).val();
             $.ajax({
                 url: 'action/fetch_product_details.php', // The PHP file that fetches product details
                 type: 'POST',
                 data: {
                     product_id: product_id
                 },
                 dataType: 'json',
                 success: function(data) {
                     $("#product_price").val(data.price);
                     $("#stock_quantity").val(data.quantity);
                     $("#quantity").on("blur", function() {

                         var order_quantity = $("#quantity").val();
                         var total_order_price = order_quantity * data.price;
                         $("#total_order_price").val(total_order_price);
                     })

                 }
             })
         })


         // ------------------- click event on place order button-------------------
         $('#orderForm').on('submit', function(event) {
             event.preventDefault();

             var formData = $(this).serialize();
             console.log(formData);
             $.ajax({
                 url: 'action/place_order.php',
                 type: 'POST',
                 dataType: 'JSON',
                 data: formData,
                 success: function(response) {
                     if (response.success) {
                         $("#response").html("<div class='alert alert-success'><b>" + response.messege + "</b></div>");
                         $("#response").fadeOut(3000);
                         $('#orderForm')[0].reset();
                        }
                        
                    } 
             });
         });



         //  -------------- code for getting grand total and remaining amount ----------------
         $("#paid_amount").on("blur", function() {
             var paid_amount = $(this).val();
             var grand_total = $("#grand_total").val();
             var remaining_amount = grand_total - paid_amount;
             $("#remaining_amount").val(remaining_amount);
         })




         //  ----------------CODE FOR INSERTING NEW ROW ------------------------- 
         $('#add_btn').on('click', function(e) {
             e.preventDefault(); // Prevent form submission

             // Clone the row and clear the input values
             var newRow = `
        <div class="row my-3" id="dynamic_row">
            <div class="col-md-3"> 
                <label for="product"><b>Select Product:</b></label>
                <select id="p_product" name="product_id[]" class="form-select" required>
                    <option value="" disabled selected>Select Product</option>
                    <?php
                    $sql = "SELECT * FROM `inventory`";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='" . $row['product_id'] . "'>" . $row['product_id'] . " : " . $row['product_name'] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>

            <div class="col-md-2"> 
                <label for="product_price"><b>Product Price:</b></label>
                <input type="text" class="form-control" id="p_price" name="product_price[]" value=" " readonly>
            </div>

            <div class="col-md-2">
                <label for="quantity"><b>Quantity:</b></label>
                <input type="number" class="form-control" id="p_quantity" name="quantity[]" required>
            </div>

            <div class="col-md-2">
                <label for="stock_quantity"><b>Stock Quantity:</b></label>
                <input type="text" class="form-control" id="p_stock_quantity" name="stock_quantity[]" value=" " readonly>
            </div>

            <div class="col-md-2">
                <label for="total_order_price"><b>Total Order Price:</b></label>
                <input type="text"  class="form-control" id="p_total_order_price" name="total_order_price[]" value=" " readonly>
            </div>

            <div class="col-md-1">
                <button class="btn btn-danger remove-btn"><i class="bi bi-dash-circle"></i></button>
            </div>
        </div>`;

             // -------------------Append the new row inside the container-------------------------
             $('#container').append(newRow);
         });

         //-------------------- Event delegation to handle remove button dynamically---------------------
         $(document).on('click', '.remove-btn', function(e) {
             e.preventDefault();
             $(this).closest('.row').remove();
         });



         // -------------------Handle change event for dynamically added product select elements--------------
         $("#container").on('change', "select[name='product_id[]']", function() {
             var row = $(this).closest('.row'); // Get the closest row for the selected product
             var product_id = $(this).val();

             $.ajax({
                 url: 'action/fetch_product_details.php', // The PHP file that fetches product details
                 type: 'POST',
                 data: {
                     product_id: product_id
                 },
                 dataType: 'json',
                 success: function(data) {
                     row.find("input[name='product_price[]']").val(data.price);
                     row.find("input[name='stock_quantity[]']").val(data.quantity);

                     //--------------- Handle quantity change and calculate total order price------------
                     row.find("input[name='quantity[]']").on("blur", function() {
                         var order_quantity = $(this).val();
                         var total_order_price = order_quantity * data.price;
                         row.find("input[name='total_order_price[]']").val(total_order_price);
                         calculateGrandTotal();
                     });
                 }
             });
         });

        //  --------------- for calculating total products grand total ---------------------
         function calculateGrandTotal() {
             var grandTotal = 0;
             $("input[name='total_order_price[]']").each(function() {
                 var totalOrderPrice = parseFloat($(this).val()) || 0; // Convert to float, fallback to 0 if invalid
                 console.log("Total Order Price for this row: ", totalOrderPrice); // Log each row's total
                 grandTotal += totalOrderPrice;
             });

             // Update the grand total field
             $("#grand_total").val(grandTotal.toFixed(2));
         }



     })
 </script>