<?php


include('dbconnection-string.php');

if (isset($_POST['btnOfficiallyCert'])) {

    $txtClientId2 = mysqli_real_escape_string($conn, $_POST['txtClientId2']);
    $txtCarerEmail2 = mysqli_real_escape_string($conn, $_POST['txtCarerEmail2']);
    $txtOfficiallyCert = "Officially certified";

    $sql = mysqli_query($conn, "UPDATE `tbl_goesoft_carers_account` SET `care_plan_status` = '$txtOfficiallyCert' WHERE user_email_address = '$txtCarerEmail2' ");
    if ($sql) {
        header("Location: ./care-plan?uryyToeSS4=$txtClientId2");
    }
}
