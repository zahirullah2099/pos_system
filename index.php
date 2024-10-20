<?php include('include/header.php');

?>

  <body class="w100 vh-100" style="background-color:whitesmoke">

    <div class="container w-100 h-100">
      <div class="row justify-content-center align-content-center">
        <div class="col-md-4 bg-light rounded py-4 mt-5 shadow-lg">
          <div class="login-form">
            <h2 class="text-center text-black fw-bolder"><i class="bi bi-archive-fill text-black"></i>&nbsp;Distribution <br>Management System</h2>
            <form action="" id="formData">
                <div class="mb-3">
                    <label for="email" class="form-label text-secondary fw-bold">Email address</label>
                    <input type="email"  name="email" class="form-control" id="email" placeholder="Enter email">
                    <small class="text-danger" id="emailErrorMsg"></small>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label text-secondary fw-bold">Password</label>
                    <input type="password"  name="password" class="form-control" id="password" placeholder="Enter password">
                    <small class="text-danger" id="passwordErrorMsg"></small>
                </div>
                <div>
                <button type="submit" name="submit" id="submit" class="btn btn-dark fw-bold w-100">Login</button>
                </div>
                <div class="msg" id="res"></div>
            </form>
        </div>
        </div>
      </div>
    </div>
    <?php include('include/footer.php'); ?>
    <script src="js/admin_login.js"></script>