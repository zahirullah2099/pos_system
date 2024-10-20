
$(document).ready(function() { 
    function sellersData(){
       $.ajax({
           url: 'action/sellers.php',
           type: 'GET', 
           success: function(response) { 
               console.log(response);
               $('#sellers_data').html(response);
           },
           error: function() {
               $('#sellers_data').html('<tr><td colspan="3">Failed to fetch sellers.</td></tr>');
           }
       });
    }
    sellersData();
   }); 