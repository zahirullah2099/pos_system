$(document).ready(function () {
  function productsData() {
    $.ajax({
      url: "action/products.php",
      type: "GET",
      success: function (response) {
        $("#table_data").html(response);
        $('#table_data').DataTable({
          "pageLength": 5,  
      });
     
      },
      error: function () {
        $("#table_data").html(
          '<tr><td colspan="3">Failed to fetch products.</td></tr>');
      },
    });
  }
  productsData();
 
  

  //  adding products into product and inventory table

  $("#submitBtn").click(function (e) {
    e.preventDefault(); // Prevent form submission

    // Capture form data using jQuery
    var formData = {
      product_name: $("#product_name").val(),
      price: $("#price").val(),
      quantity: $("#quantity").val(),
      reorder_level: $("#reorder_level").val(),
      last_updated: $("#last_updated").val(),
    };

   
    $.ajax({
      url: "action/products.php",  
      type: "POST",
      data: formData,
      success: function (response) { 
        if(response){
          $("#addProduct").modal('hide');
          productsData();
        }
      },
    });
  });


  // code for product deletion
  $(document).on('click',"#delete_btn",function(){
    var delete_id = $(this).attr("data-id");

    $.ajax({
        url:"action/product_delete.php",
        type:"post",
        data: {delete_id:delete_id},
        dataType:"json",
        success:function(data){
            if(data.success){  
                $("#response").html("<div class='alert alert-success'>'<b>'" + data.messege + "</b></div>");
                setTimeout(() => {
                  $("#response").fadeOut();
                }, 3000); 
            }
        }
    })
}) 

 



});

 
