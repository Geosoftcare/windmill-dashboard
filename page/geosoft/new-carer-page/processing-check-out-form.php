<?php


include('dbconnection-string.php');

if (isset($_POST['btnSubmitCheckoutNote'])) {

    $currMonthOfTheYear = date("F");

    $txtCurrentCareCall = mysqli_real_escape_string($conn, $_POST['txtCurrentCareCall']);
    $txtTaskId = mysqli_real_escape_string($conn, $_POST['txtTaskId']);
    $user_special_Id = mysqli_real_escape_string($conn, $_POST['txtCarerId']);
    $txtCurrentTime = mysqli_real_escape_string($conn, $_POST['txtCurrentTime']);
    $txtClientIdCode = mysqli_real_escape_string($conn, $_POST['txtClientIdCode']);
    $bgChange = "rgba(39, 174, 96,1.0)";
    $status = "Completed";
    $txtcurrMonth = $currMonthOfTheYear;

    $myCheck = "SELECT * FROM tbl_daily_shift_records WHERE checkinout_Id = '$txtTaskId' AND firstCarer_userId = '$user_special_Id' ";
    $myCheckres = mysqli_query($conn, $myCheck);
    $countRes = mysqli_num_rows($myCheckres);

    if ($countRes != 0) {
        $sql1 = mysqli_query($conn, "UPDATE `tbl_daily_shift_records` SET `shift_end_time` = '$txtCurrentTime' WHERE checkinout_Id = '$txtTaskId' ");
        if ($sql1) {
            $UpdateSql = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `timeline_colour` = '$bgChange', `bgChange` = '$bgChange', `call_status` = '$status', `currMonths` = '$txtcurrMonth' WHERE userId = '$txtCurrentCareCall' ");
            if ($UpdateSql) {
                $SqlUpdateTaskTBL = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `visibility` = 'Not updated' WHERE uryyToeSS4 = '$txtClientIdCode' ");
                if ($SqlUpdateTaskTBL) {
                    $SqlUpdateTaskTBL = mysqli_query($conn, "UPDATE `tbl_clients_task_records` SET `visibility` = 'Not updated' WHERE uryyToeSS4 = '$txtClientIdCode' ");
                    header("Location: ./dashboard?uryyToeSS4=$txtClientId");
                }
            }
        }
    } else {
        $sql2 = mysqli_query($conn, "UPDATE `tbl_daily_shift_records` SET `secEnd_time` = '$txtCurrentTime' WHERE checkinout_Id = '$txtTaskId' ");
        if ($sql2) {
            $UpdateSql2 = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `timeline_colour` = '$bgChange', `bgChange` = '$bgChange', `call_status` = '$status', `currMonths` = '$txtcurrMonth' WHERE userId = '$txtCurrentCareCall' ");
            if ($UpdateSql2) {
                $SqlUpdateTaskTBL2 = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `visibility` = 'Not updated' WHERE uryyToeSS4 = '$txtClientIdCode' ");
                if ($SqlUpdateTaskTBL2) {
                    $SqlUpdateTaskTBL2 = mysqli_query($conn, "UPDATE `tbl_clients_task_records` SET `visibility` = 'Not updated' WHERE uryyToeSS4 = '$txtClientIdCode' ");
                    header("Location: ./dashboard?uryyToeSS4=$txtClientId");
                }
            }
        }
    }
}
