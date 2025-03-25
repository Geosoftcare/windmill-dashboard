<?php
session_start();
include('db-connect.php');
if ((!empty($_SESSION['usr_email']))) {
  header("Location: ./dashboard");
}

$error = false;

if (isset($_POST['btnSubmitform'])) {
  // prevent sql injections/ clear user invalid inputs
  $email = mysqli_real_escape_string($conn, $_POST['myEmail']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);

  $pass = mysqli_real_escape_string($conn, $_POST['myPassword']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);
  // prevent sql injections / clear user invalid inputs

  if (empty($email)) {
    $error = true;
    $emailError = "Please enter your email address.";
  } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error = true;
    $emailError = "Please enter valid email address.";
  }

  if (empty($pass)) {
    $error = true;
    $passError = "Please enter your password.";
  }

  // if there's no error, continue to login
  if (!$error) {

    $password = hash('sha256', $pass); // password hashing using SHA256

    $res = mysqli_query($conn, "SELECT my_city, col_company_Id, user_email_address, user_password FROM tbl_goesoft_users 
    WHERE user_email_address='$email' ");
    $row = mysqli_fetch_array($res);
    $count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row

    if ($count == 1 && $row['user_password'] == $password) {
      $_SESSION['usr_compId'] = $row['col_company_Id'];
      $_SESSION['usr_email'] = $row['user_email_address'];
      $_SESSION['usr_city'] = $row['my_city'];
      header("Location: ./checking-email-verification");
    } else {
      echo "
      <script type='text/javascript'>
      $(document).ready(function() {
        $('#popupAlert').show();
      });
    </script>";
    }
  }
}
