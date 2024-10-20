$(document).ready(() => {
  $("#submit").on("click", (e) => {
    e.preventDefault(); 
     
    $("#emailErrorMsg").html("");
    $("#passwordErrorMsg").html("");

    var email = $("#email").val();
    var password = $("#password").val(); 
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; 
    // Validation
    if (email === "") {
      $("#emailErrorMsg").html("Email should not be empty");
    } else if (!emailPattern.test(email)) {
      $("#emailErrorMsg").html("Please enter a valid email address");
    } else if (password === "") {
      $("#passwordErrorMsg").html("Password should not be empty");
    } else {
      // Perform AJAX if validation passes
      $.ajax({
        url: "action/login.php",
        type: "POST",
        data: { email: email, password: password },
        success: function (data) {
          if (data == 1) {
            $("#res").html('<div class="spinner-border text-success mt-1" role="status"></div>');
            setTimeout(() => {
              // window.location.href = '../dashboard.php';
              window.location.href = 'dashboard.php';

            }, 1000);
          } else if (data == 0) {
            $("#formData").trigger("reset");
            $("#res").html("<div class='alert alert-danger p-2 rounded mr-2 my-2 w-100'>Wrong Credentials!</div>");
            $("#res").fadeOut(5000);
          }
        },
      });
    }
  });
});
