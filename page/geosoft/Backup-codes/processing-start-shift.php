<?php

include('dbconnection-string.php');

if (isset($_POST['btnStartShift'])) {

    //Get user and client latitude and longitude which result to comparison in disatnce to know if carer point A is closer to 
    //client point B
    $txtStart = mysqli_real_escape_string($conn, $_POST['txtStart']);
    $txtStartDate = mysqli_real_escape_string($conn, $_POST['txtStartDate']);
    $txtStartTime = mysqli_real_escape_string($conn, $_POST['txtStartTime']);
    $txtEndTime = "Null";
    $txtClientName = mysqli_real_escape_string($conn, $_POST['txtClientName']);
    $txtClientId = mysqli_real_escape_string($conn, $_POST['txtClientId']);
    $txtClientArea = mysqli_real_escape_string($conn, $_POST['txtClientArea']);

    $txtClientAddLi1 = mysqli_real_escape_string($conn, $_POST['txtClientAddLi1']);
    $txtClientAddLi2 = mysqli_real_escape_string($conn, $_POST['txtClientAddLi2']);
    $txtClientCity = mysqli_real_escape_string($conn, $_POST['txtClientCity']);
    $txtClientPostCode = mysqli_real_escape_string($conn, $_POST['txtClientPostCode']);

    $txtCarerName = mysqli_real_escape_string($conn, $_POST['txtCarerName']);
    $txtTaskNote = "Null";
    $txtCarerId = mysqli_real_escape_string($conn, $_POST['txtCarerId']);

    $timeSheetDate = mysqli_real_escape_string($conn, $_POST['txtTimeSheetDate']);
    $txtColAreaId = mysqli_real_escape_string($conn, $_POST['txtColAreaId']);
    $txtcompanyId = mysqli_real_escape_string($conn, $_POST['txtcompanyId']);
    $txtClientSpecialUserId = mysqli_real_escape_string($conn, $_POST['txtClientSpecialUserId']);

    $txtClientCheckOutId = mysqli_real_escape_string($conn, $_POST['txtCheckOutId']);
    $txtDistance = mysqli_real_escape_string($conn, $_POST['txtDistance']);
    $txtCareCallId = mysqli_real_escape_string($conn, $_POST['txtCareCallId']);

    $txtVariousCareCalls = mysqli_real_escape_string($conn, $_POST['txtVariousCareCalls']);
    $txtVariosStatusNumber = mysqli_real_escape_string($conn, $_POST['txtVariosStatusNumber']);
    $txtCareCallsStartTime = mysqli_real_escape_string($conn, $_POST['txtCareCallsStartTime']);
    $txtCareCallsEndTime = mysqli_real_escape_string($conn, $_POST['txtCareCallsEndTime']);
    $txtFirstCarerIdPin = mysqli_real_escape_string($conn, $_POST['txtFirstCarerIdPin']);
    $txtClientCareCallsDate = mysqli_real_escape_string($conn, $_POST['txtClientCareCallsDate']);

    $myCareCallId = hash('sha256', $txtCareCallId);
    $txtCheckOutId = hash('sha256', $txtClientCheckOutId);

    $careCallTimeIn = strtotime($txtCareCallsStartTime);

    $currentStartTime = (new DateTime($txtCareCallsStartTime))->modify('+1 day');
    $currentEndTime = (new DateTime($txtCareCallsStartTime))->modify('+1 day');

    $startTimeMor = new DateTime('00:00');
    $endTimeMor = (new DateTime('10:59'))->modify('+1 day');

    $startTimeLun = new DateTime('11:00');
    $endTimeLun = (new DateTime('13:59'))->modify('+1 day');

    $startTimeTea = new DateTime('14:00');
    $endTimeTea = (new DateTime('17:59'))->modify('+1 day');

    $startTimeBed = new DateTime('18:00');
    $endTimeBed = (new DateTime('22:59'))->modify('+1 day');

    $CurrentDeviceTime = date("H:i");
    $dateConvertion = date('Y-m-d', strtotime($txtStartDate));

    $bgChange = "rgba(25, 42, 86,1.0)";
    $status = "Not completed";

    //if ($txtDistance <= '20') {
    if ($txtStartDate == $today) {
        //if the client care call data is equal to today's date and client care call is Same as the client care call id then it will be updated
        $myCheck = "SELECT * FROM tbl_daily_shift_records WHERE (shift_date = '$today' AND shift_end_time = 'Null' AND col_carer_Id = '$txtFirstCarerIdPin' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ";
        $myCheckres = mysqli_query($conn, $myCheck);
        $countRes = mysqli_num_rows($myCheckres);

        if ($countRes != 0) {
            require_once('./checking-task-for-ongoing-call.php');
            //header("Location: ./ongoing-care-call?uryyToeSS4=$txtClientId");
        } else {
            $myCheck = "SELECT * FROM tbl_daily_shift_records WHERE (shift_date = '$today' AND col_care_call = '$txtVariousCareCalls' AND uryyToeSS4 = '$txtClientId' AND col_carer_Id = '$txtFirstCarerIdPin') ";
            $myCheckres = mysqli_query($conn, $myCheck);
            $countRes = mysqli_num_rows($myCheckres);
            if ($countRes != 0) {
                //Check if all tasks and meds has been updated if yes then go to checkout page if no then go to tasks-progress page
                require_once('./processing-client-task-status-check.php');

                //header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
            } else {
                $queryInsNewData = mysqli_query($conn, "INSERT INTO tbl_daily_shift_records (shift_status, shift_date, shift_start_time, shift_end_time, client_name, uryyToeSS4, col_care_call, client_group, carer_Name, task_note, col_carer_Id, timesheet_date, col_area_Id, col_confirm_call_Id, col_company_Id, checkinout_Id, col_care_call_Id) 
                VALUES('" . $txtStart . "', '" . $dateConvertion . "', '" . $txtStartTime . "', '" . $txtEndTime . "', '" . $txtClientName . "', '" . $txtClientId . "', '" . $txtVariousCareCalls . "', '" . $txtClientArea . "', '" . $txtCarerName . "', '" . $txtTaskNote . "', '" . $txtCarerId . "', '" . $timeSheetDate . "', '" . $txtColAreaId . "', '" . $txtClientSpecialUserId . "', '" . $txtcompanyId . "', '" . $txtCheckOutId . "', '" . $myCareCallId . "') ");

                if ($queryInsNewData) {
                    $Update_rota_status_Sql = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `timeline_colour` = '$bgChange', `bgChange` = '$bgChange', `call_status` = '$status' WHERE (userId = '$txtClientSpecialUserId') ");
                    if ($Update_rota_status_Sql) {
                        $myCheck = "SELECT * FROM tbl_care_calls WHERE col_shift_date = '$today' AND col_care_call = '$txtVariousCareCalls' AND uryyToeSS4 = '$txtcompanyId' ";
                        $myCheckres = mysqli_query($conn, $myCheck);
                        $countRes = mysqli_num_rows($myCheckres);
                        if ($countRes != 0) {
                            require_once('./processing-client-task-status-check.php');
                            //header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                        } else {
                            $InsCareCallNumber = mysqli_query($conn, "INSERT INTO tbl_care_calls (col_client_Id, col_client_name, col_shift_date, col_care_call, uryyToeSS4, col_carer_Id, col_company_Id) VALUES('" . $txtClientSpecialUserId . "', '" . $txtClientName . "', '" . $dateConvertion . "', '" . $txtVariousCareCalls . "', '" . $txtClientId . "', '" . $txtCarerId . "', '$txtcompanyId') ");
                            if ($InsCareCallNumber) {
                                require_once('./processing-client-task-status-check.php');
                                //header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                            }
                        }
                    }
                }
            }
        }
    } else {
        header('Location: ./care-call-day-alert');
    }
    //}
} else {
    echo "Possible error occur" . mysqli_error($conn);
}
