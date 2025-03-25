<?php

session_start();

if (isset($_POST['btnDeactivateAdmin'])) {

    include('dbconnections.php');

    $adminSpecialId =  mysqli_real_escape_string($conn, $_POST['adminSpecialId']);
    $verification =  "Deactivated";
    $deactivatebtn =  "disabled";
    $activatebtn =  "0";

    $sql = mysqli_query($conn, "UPDATE `tbl_goesoft_users` SET `verification_code` = '$verification', `status1` = '$deactivatebtn', `status2` = '$activatebtn' WHERE user_special_Id = '$adminSpecialId' ");


    if ($sql) {

        header("Location: ./administrator-list");
    } else {
    }
}
