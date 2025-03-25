<?php
include('db-connect.php');
session_start();
$error = false;

//check if form is submitted
if (isset($_POST['btnChangePassword'])) {

    $pass = mysqli_real_escape_string($conn, $_REQUEST['myPassword']);
    $pass = strip_tags($pass);
    $pass = htmlspecialchars($pass);

    $myCPassword = mysqli_real_escape_string($conn, $_REQUEST['myCPassword']);
    $myCPassword = strip_tags($myCPassword);
    $myCPassword = htmlspecialchars($myCPassword);

    if ($pass == $myCPassword) {
        $myPass = hash('sha256', $pass);
        $queryIns = mysqli_query($conn, "UPDATE `tbl_goesoft_users` SET `user_password`='$myPass' 
        WHERE user_email_address = '" . $_SESSION['usr_email'] . "' ");
        if ($queryIns) {
            header("Location: ./auth-normal-logout");
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
