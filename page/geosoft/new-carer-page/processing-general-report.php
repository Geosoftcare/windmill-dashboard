<?php


include('dbconnection-string.php');

if (isset($_POST['btnSubmitGenNote'])) {

    $txtClientId = mysqli_real_escape_string($conn, $_POST['txtClientId']);
    $txtCurrentTime = mysqli_real_escape_string($conn, $_POST['txtCurrentTime']);
    $txtTaskId = mysqli_real_escape_string($conn, $_POST['txtTaskId']);
    $txtTaskNote = mysqli_real_escape_string($conn, $_POST['txtTaskNote']);
    $bgChange = "#16a085";

    $myCheck = "SELECT * FROM tbl_daily_shift_records WHERE checkinout_Id = '" . $txtTaskId . "' ";
    $myCheckres = mysqli_query($conn, $myCheck);
    $countRes = mysqli_num_rows($myCheckres);

    if ($countRes != 0) {
        $sql = mysqli_query($conn, "UPDATE `tbl_daily_shift_records` SET `task_note` = '$txtTaskNote' WHERE checkinout_Id = '$txtTaskId' ");
        if ($sql) {
            header("Location: ./check-out-progress?uryyToeSS4=$txtClientId");
        }
    }
}
