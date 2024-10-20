
<?php
include('../include/config.php');

if (!isset($_SESSION)) {
  session_start();
}

// if(!isset($_SESSION['is_admin_login'])){
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['email'];
    $password = $_POST['password']; 

    $sql = "SELECT * FROM `admin` WHERE `email` = '$email' AND `password` = '$password'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_num_rows($result);
    if ($row > 0) {

      $_SESSION['is_admin_login'] = true;
      $_SESSION['admin_email'] = $email; 
      echo 1;
    } else { 
      echo 0;
    }
  } 

 

?>

 