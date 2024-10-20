 
<?php session_start(); ?>


<div class="col-md-9" style="margin-left:250px">
    <div class="row">
        <div class="col-md-12 mt-2 d-flex justify-content-between">
        <h4>welcom: <span class="text-success"><?php echo $_SESSION['admin_email']; ?></span></h4>
        <a class="btn btn-danger" href="action/logout.php"><i class="bi bi-box-arrow-left"></i>&nbsp;Logout</a>
        </div>
    </div>
</div>
 