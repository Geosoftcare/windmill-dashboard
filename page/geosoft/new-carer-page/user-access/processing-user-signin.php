<?php
include('dbconnection-string.php');
$error = false;

if (isset($_POST['btncarerLogin'])) {

  $pass = mysqli_real_escape_string($conn, $_POST['txtPassword']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);
  // prevent sql injections / clear user invalid inputs

  if (empty($pass)) {
    $error = true;
    $passError = "Please enter your password.";
  }

  // if there's no error, continue to login
  if (!$error) {

    $password = hash('sha256', $pass); // password hashing using SHA256

    $result = mysqli_query($conn, "SELECT user_email_address FROM tbl_goesoft_carers_account WHERE user_password='$password' ");
    while ($colRows = mysqli_fetch_array($result)) {
      $collectMyEmail = $colRows['user_email_address'];


      if ($colRows) {

        $res = mysqli_query($conn, "SELECT user_email_address, user_password FROM tbl_goesoft_carers_account WHERE user_email_address='$collectMyEmail' ");
        $row = mysqli_fetch_array($res);
        $count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row

        if ($count == 1 && $row['user_password'] == $password) {
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
}
