<?php
session_start();

$error = false;

if (isset($_POST['btncarerLogin'])) {

  // prevent sql injections/ clear user invalid inputs
  $email = mysqli_real_escape_string($conn, $_POST['txtCarerEmail']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);

  $pass = mysqli_real_escape_string($conn, $_POST['txtCarerPassword']);
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

    $result = mysqli_query($conn, "SELECT user_email_address, user_password FROM tbl_goesoft_carers_account WHERE verification_code='Active'");
    $colRows = mysqli_fetch_array($result);
    if ($colRows) {

      $res = mysqli_query($conn, "SELECT user_email_address, user_password FROM tbl_goesoft_carers_account WHERE user_email_address='$email' ");
      $row = mysqli_fetch_array($res);
      $count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row

      if ($count == 1 && $row['user_password'] == $password) {
        $_SESSION['usr_id'] = $row['userId'];
        $_SESSION['usr_email'] = $row['user_email_address'];
        header("Location: ../dashboard");
      } else {
        echo "
      <script type='text/javascript'>
      $(document).ready(function() {
        $('#popupAlert').show();
      });
    </script>";
      }
    } else {
      echo "
      <script type='text/javascript'>
      $(document).ready(function() {
        $('#popupAlert2').show();
      });
    </script>";
    }
  }
}
