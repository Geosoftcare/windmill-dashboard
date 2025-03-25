<?php
include('dbconnection-string.php');

$error = false;

if (isset($_POST['btnContinue'])) {

    // prevent sql injections/ clear user invalid inputs
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

    // if there's no error, continue to login
    if (!$error) {

        $res = mysqli_query($conn, "SELECT * FROM tbl_general_team_form WHERE team_email_address = '$email' ");
        $row = mysqli_fetch_array($res);
        $count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row

        if ($count == 1 && $row['team_email_address'] == $email) {
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
    } else {
        echo "
      <script type='text/javascript'>
      $(document).ready(function() {
        $('#popupAlert2').show();
      });
    </script>";
    }
}
