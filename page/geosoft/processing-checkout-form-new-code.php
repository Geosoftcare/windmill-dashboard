<?php
include('dbconnection-string.php');

if (isset($_POST['btnSubmitCheckoutNote'])) {

    $currMonthOfTheYear = date("F");

    $txtPlannedTimeIn = mysqli_real_escape_string($conn, $_POST['txtPlannedTimeIn']);
    $txtPlannedTimeOut = mysqli_real_escape_string($conn, $_POST['txtPlannedTimeOut']);
    $txtCareCalls = mysqli_real_escape_string($conn, $_POST['txtCareCalls']);
    $txtCurrentCareCall = mysqli_real_escape_string($conn, $_POST['txtCurrentCareCall']);
    $txtCompanyId = mysqli_real_escape_string($conn, $_POST['txtCompanyId']);
    $txtTaskId = mysqli_real_escape_string($conn, $_POST['txtTaskId']);
    $user_special_Id = mysqli_real_escape_string($conn, $_POST['txtCarerId']);
    $txtCurrentTime = mysqli_real_escape_string($conn, $_POST['txtCurrentTime']);
    $txtClientIdCode = mysqli_real_escape_string($conn, $_POST['txtClientIdCode']);
    $bgChange = "rgba(39, 174, 96,1.0)";
    $status = "Completed";
    $txtWordedPayRate = mysqli_real_escape_string($conn, $_POST['txtWordedPayRate']);
    $txtCareCallTime = mysqli_real_escape_string($conn, $_POST['txtCareCallTime']);
    $txtClientCareCall = mysqli_real_escape_string($conn, $_POST['txtClientCareCall']);
    $txtcurrMonth = $currMonthOfTheYear;

    $myCheck = "SELECT * FROM tbl_daily_shift_records WHERE checkinout_Id = '$txtTaskId' AND col_carer_Id = '$user_special_Id' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ";
    $myCheckres = mysqli_query($conn, $myCheck);
    $countRes = mysqli_num_rows($myCheckres);

    if ($countRes != 0) {
        $sql1 = mysqli_query($conn, "UPDATE `tbl_daily_shift_records` SET `shift_end_time` = '$txtCurrentTime', `planned_timeIn` = '$txtPlannedTimeIn', `planned_timeOut` = '$txtPlannedTimeOut', `col_company_Id` = '$txtCompanyId', `col_call_status` = '$status', `col_carecall_rate` = '$txtWordedPayRate', `col_worked_time` = '$txtCareCallTime' WHERE checkinout_Id = '$txtTaskId' ");
        if ($sql1) {
            $UpdateSql = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `timeline_colour` = '$bgChange', `bgChange` = '$bgChange', `call_status` = '$status', `currMonths` = '$txtcurrMonth' WHERE (userId = '$txtClientCareCall') ");
            if ($UpdateSql) {
                $SqlUpdateTaskTBL = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `med_colours` = '#000', `col_fifo` = '' WHERE uryyToeSS4 = '$txtClientIdCode' ");
                if ($SqlUpdateTaskTBL) {
                    $SqlUpdateTaskTBL = mysqli_query($conn, "UPDATE `tbl_clients_task_records` SET `task_colours` = '#000', `col_fifo` = '' WHERE uryyToeSS4 = '$txtClientIdCode' ");
                    if ($SqlUpdateTaskTBL) {
                        $sql_check_last_client = mysqli_query($conn, "SELECT * FROM tbl_schedule_calls WHERE (first_carer_Id = '" . $_SESSION['usr_carerId'] . "' AND Clientshift_Date = '$today' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ORDER BY userId DESC LIMIT 1 ");
                        $row_check_last_client = mysqli_fetch_array($sql_check_last_client);
                        $holdLastVisitId = $row_check_last_client['userId'];
                        echo $holdLastVisitId;
                        echo $txtClientCareCall;
                        if ($holdLastVisitId == $txtClientCareCall) {
                            $update_today_schedule = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `col_fifo` = '' WHERE (first_carer_Id = '" . $_SESSION['usr_carerId'] . "' AND Clientshift_Date = '$today' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                            if ($update_today_schedule) {
                                header("Location: ./dashboard");
                            }
                        } else {
                            $myCheck_order = mysqli_query($conn, "SELECT * FROM tbl_schedule_calls WHERE (col_fifo != '' AND first_carer_Id = '" . $_SESSION['usr_carerId'] . "' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                            $row_order = mysqli_fetch_array($myCheck_order);
                            $get_orderNumber = $row_order['col_fifo'];
                            $countRes_order = mysqli_num_rows($myCheck_order);
                            if ($countRes_order != 0) {
                                $txtCalcOrderNumber = $get_orderNumber + 1;
                                $update_today_drop01 = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `col_fifo` = '$txtCalcOrderNumber' WHERE userId = '$txtClientCareCall' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ");
                                if ($update_today_drop01) {
                                    header("Location: ./dashboard");
                                }
                            } else {
                                $update_today_drop02 = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `col_fifo` = '1' WHERE userId = '$txtClientCareCall' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ");
                                if ($update_today_drop02) {
                                    header("Location: ./dashboard");
                                }
                            }
                        }
                    }
                }
            }
        }
    } else {
        $sql2 = mysqli_query($conn, "UPDATE `tbl_daily_shift_records` SET `secEnd_time` = '$txtCurrentTime', `planned_timeIn` = '$txtPlannedTimeIn', `planned_timeOut` = '$txtPlannedTimeOut', `col_company_Id` = '$txtCompanyId', `col_call_status` = '$status', `col_carecall_rate` = '$txtWordedPayRate', `col_worked_time` = '$txtCareCallTime' WHERE checkinout_Id = '$txtTaskId' ");
        if ($sql2) {
            $UpdateSql2 = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `timeline_colour` = '$bgChange', `bgChange` = '$bgChange', `call_status` = '$status', `currMonths` = '$txtcurrMonth' WHERE (userId = '$txtClientCareCall') ");
            if ($UpdateSql2) {
                $SqlUpdateTaskTBL2 = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `med_colours` = '#000', `col_fifo` = '' WHERE uryyToeSS4 = '$txtClientIdCode' ");
                if ($SqlUpdateTaskTBL2) {
                    $SqlUpdateTaskTBL2 = mysqli_query($conn, "UPDATE `tbl_clients_task_records` SET `task_colours` = '#000', `col_fifo` = '' WHERE uryyToeSS4 = '$txtClientIdCode' ");
                    if ($SqlUpdateTaskTBL) {
                        $sql_check_last_client = mysqli_query($conn, "SELECT * FROM tbl_schedule_calls WHERE (first_carer_Id = '" . $_SESSION['usr_carerId'] . "' AND Clientshift_Date = '$today' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ORDER BY userId DESC LIMIT 1 ");
                        $row_check_last_client = mysqli_fetch_array($sql_check_last_client);
                        $holdVisitId = $row_check_last_client['userId'];
                        if ($holdVisitId == $txtClientCareCall) {
                            $update_today_schedule = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `col_fifo` = '' WHERE first_carer_Id = '" . $_SESSION['usr_carerId'] . "' AND Clientshift_Date = '$today' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ");
                            if ($update_today_schedule) {
                                header("Location: ./dashboard");
                            }
                        } else {
                            $myCheck_order = mysqli_query($conn, "SELECT * FROM tbl_schedule_calls WHERE (col_fifo != '' AND first_carer_Id = '" . $_SESSION['usr_carerId'] . "' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                            $row_order = mysqli_fetch_array($myCheck_order);
                            $get_orderNumber = $row_order['col_fifo'];
                            $countRes_order = mysqli_num_rows($myCheck_order);
                            if ($countRes_order != 0) {
                                $txtCalcOrderNumber = $get_orderNumber + 1;
                                $update_today_drop01 = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `col_fifo` = '$txtCalcOrderNumber' WHERE userId = '$txtClientCareCall' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ");
                                if ($update_today_drop01) {
                                    header("Location: ./dashboard");
                                }
                            } else {
                                $update_today_drop02 = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `col_fifo` = '1' WHERE userId = '$txtClientCareCall' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ");
                                if ($update_today_drop02) {
                                    header("Location: ./dashboard");
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
