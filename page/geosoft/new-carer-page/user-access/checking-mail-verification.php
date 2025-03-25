<?php
session_start();

$error = false;

if (isset($_POST['btnVerifyPin'])) {

    // prevent sql injections/ clear user invalid inputs
    $txtCarerPinCode = mysqli_real_escape_string($conn, $_POST['txtCarerPin']);
    $txtCarerPinCode = strip_tags($txtCarerPinCode);
    $txtCarerPinCode = htmlspecialchars($txtCarerPinCode);

    // if there's no error, continue to login
    if (!$error) {

        $res = mysqli_query($conn, "SELECT VNumber FROM tbl_goesoft_carers_account WHERE VNumber='$txtCarerPinCode' ");
        $row = mysqli_fetch_array($res);
        $count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row

        if ($count == 1 && $row['VNumber'] == $txtCarerPinCode) {
            $_SESSION['usr_id'] = $row['userId'];
            $_SESSION['usr_txtCarerPinCode'] = $row['VNumber'];

            $updateSQL = mysqli_query($conn, "UPDATE tbl_goesoft_carers_account SET `verification_code` = 'Active' WHERE VNumber='$txtCarerPinCode' ");

            header("Location: ./index");
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
