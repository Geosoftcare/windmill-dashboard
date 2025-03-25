<?php
include('dbconnection-string.php');
if (isset($_POST['btnContinue'])) {
  $email = mysqli_real_escape_string($conn, $_POST['txt_myEmail']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);

  if (empty($email)) {
    $error = true;
    $emailError = "Please enter your email address.";
  } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error = true;
    $emailError = "Please enter valid email address.";
  }

  $final_str = strtolower($email);
  $check_carer_email = mysqli_query($conn, "SELECT * FROM tbl_goesoft_carers_account 
  WHERE user_email_address = '$final_str' ");
  $row_check = mysqli_fetch_array($check_carer_email);
  $count_carer_email = mysqli_num_rows($check_carer_email);
  if ($count_carer_email == 1) {
    $_SESSION['usr_email'] = $row_check['user_email_address'];
    echo "
        <script type='text/javascript'>
          $(document).ready(function() {
            $('#popupAlertlog').show();
          });
        </script>";
  } else {
    $res = mysqli_query($conn, "SELECT * FROM tbl_general_team_form 
    WHERE team_email_address = '$final_str' ");
    $row = mysqli_fetch_array($res);
    $count = mysqli_num_rows($res);

    if ($count == 1 && $row['team_email_address'] == $final_str) {
      $_SESSION['usr_email'] = $row['team_email_address'];
      header("Location: ./create-pin");
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
