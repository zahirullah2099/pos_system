
$(document).ready(function() { 
    function inventoryData(){
       $.ajax({
           url: 'action/inventory.php',
           type: 'GET', 
           success: function(response) { 
               $('#inventory_data').html(response);
               $('#inventory_data').DataTable({
                "pageLength": 5,  
            });
           },
           error: function() {
               $('#inventory_data').html('<tr><td colspan="3">Failed to fetch inventory.</td></tr>');
           }
       });
    }
    inventoryData();
   }); 