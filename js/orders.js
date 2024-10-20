$(document).ready(()=>{
 
    function ordersData(){
       $.ajax({
           url: 'action/orders.php',
           type: 'GET', 
           success: function(response) {  
               $('#table_data').html(response);
               $('#table_data').DataTable({
                "pageLength": 5,  
            });
           },
           error: function() {
               $('#table_data').html('<tr><td colspan="3">Failed to fetch orders.</td></tr>');
           }
       });
    }
    ordersData(); 
 
    

//    order details
   $(document).on("click","#order_details",function(){
    var seller_id = $(this).attr('data-id');
    
    $.ajax({
        url:'action/order_details.php',
        type:'post',
        data:{seller_id:seller_id},
        success:function(data){
            $("#orders_details").html(data);
            $('#orders_details').DataTable({
                "pageLength": 5,  
            });
        }
    })
   })
})