<?php

include('dbconnection-string.php');

if (isset($_POST['btnSubmitVerifyform'])) {

    $myCredential = mysqli_real_escape_string($conn, $_POST['myCredential']);
    $verificationTXT = mysqli_real_escape_string($conn, $_POST['verificationTXT']);

    $sql = mysqli_query($conn, "UPDATE `tbl_goesoft_carers_account` SET `loginPin` = '$verificationTXT' WHERE VNumber = '$myCredential' ");
    if ($sql) {
        header("Location: ./index");
    }
}
