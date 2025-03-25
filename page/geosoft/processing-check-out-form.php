<?php

if (isset($_POST['btnSubmitCheckoutNote'])) {
    include('dbconnection-string.php');

    $currMonthOfTheYear = date("F");
    $txtPlannedTimeIn = mysqli_real_escape_string($conn, $_POST['txtPlannedTimeIn']);
    $txtPlannedTimeOut = mysqli_real_escape_string($conn, $_POST['txtPlannedTimeOut']);
    $txtCareCalls = mysqli_real_escape_string($conn, $_POST['txtCareCalls']);
    $txtCompanyId = mysqli_real_escape_string($conn, $_POST['txtCompanyId']);
    $txtTaskId = mysqli_real_escape_string($conn, $_POST['txtTaskId']);
    $user_special_Id = mysqli_real_escape_string($conn, $_POST['txtCarerId']);
    $txtCurrentTime = mysqli_real_escape_string($conn, $_POST['txtCurrentTime']);
    $txtClientIdCode = mysqli_real_escape_string($conn, $_POST['txtClientIdCode']);
    $bgChange = "rgba(39, 174, 96,1.0)";
    $status = "Completed";
    $txtWorkedPayRate = mysqli_real_escape_string($conn, $_POST['txtWorkedPayRate']);
    $txtCarerMileage = mysqli_real_escape_string($conn, $_POST['txtCarerMileage']);
    $txtCareCallTime = mysqli_real_escape_string($conn, $_POST['txtCareCallTime']);
    $txtCareCallId = mysqli_real_escape_string($conn, $_POST['txtCareCallId']);
    $txtcurrMonth = $currMonthOfTheYear;

    $generalVisibility = 'Null';

    $sql_get_manageRun_client_Id = mysqli_query($conn, "SELECT uryyToeSS4,care_calls,userId FROM tbl_manage_runs 
    WHERE (uryyToeSS4 = '$txtClientIdCode' AND care_calls = '$txtCareCalls' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
    $row_get_manageRunId = mysqli_fetch_array($sql_get_manageRun_client_Id);
    $hold_managerunId = $row_get_manageRunId['userId'];

    $myCheck_periodtwo = mysqli_query($conn, "SELECT * FROM tbl_schedule_calls WHERE (first_carer_Id = '$user_special_Id' AND uryyToeSS4 = '$txtClientIdCode' AND care_calls = '$txtCareCalls' AND Clientshift_Date = '$today' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
    $row_periodtwo = mysqli_fetch_array($myCheck_periodtwo);
    $get_occurence = $row_periodtwo['col_occurence'];
    $get_periodone = $row_periodtwo['col_period_one'];
    $get_periodtwo = $row_periodtwo['col_period_two'];
    $countRes_order = mysqli_num_rows($myCheck_periodtwo);

    if ($get_periodtwo == 'Daily') {
        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $myCheck = "SELECT * FROM tbl_daily_shift_records WHERE (col_care_call_Id = '$txtTaskId' AND col_carer_Id = '$user_special_Id' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ";
        $myCheckres = mysqli_query($conn, $myCheck);
        $countRes = mysqli_num_rows($myCheckres);
        if ($countRes != 0) {
            $sql1 = mysqli_query($conn, "UPDATE `tbl_daily_shift_records` SET `shift_end_time` = '$txtCurrentTime', `planned_timeIn` = '$txtPlannedTimeIn', `planned_timeOut` = '$txtPlannedTimeOut', `col_company_Id` = '$txtCompanyId', `col_call_status` = '$status', `col_carecall_rate` = '$txtWorkedPayRate', `col_worked_time` = '$txtCareCallTime' 
            WHERE (col_care_call_Id = '$txtTaskId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
            if ($sql1) {
                $UpdateSql = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `timeline_colour` = '$bgChange', `bgChange` = '$bgChange', `call_status` = '$status', `currMonths` = '$txtcurrMonth' WHERE (userId = '$txtCareCallId') ");
                if ($UpdateSql) {
                    $result_finCareCalls = mysqli_query($conn, "SELECT * FROM tbl_daily_shift_records WHERE (col_carer_Id='$user_special_Id' AND shift_date = '$today') ");
                    $rowcount_finCareCalls = mysqli_num_rows($result_finCareCalls);
                    //echo $rowcount_finCareCalls . "<br><Br>";
                    $result_schedCareCalls = mysqli_query($conn, "SELECT * FROM tbl_schedule_calls WHERE (first_carer_Id='$user_special_Id' AND Clientshift_Date = '$today') ");
                    $rowcount_schedCareCalls = mysqli_num_rows($result_schedCareCalls);
                    //echo $rowcount_schedCareCalls . "<br><Br>";
                    if ($rowcount_finCareCalls == $rowcount_schedCareCalls) {
                        $sql_get_client_Id = mysqli_query($conn, "SELECT uryyToeSS4 FROM tbl_schedule_calls WHERE (first_carer_Id = '$user_special_Id' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                        while ($row_get_client_Id = mysqli_fetch_array($sql_get_client_Id)) {
                            $get_hold_clients = $row_get_client_Id['uryyToeSS4'];
                            if ($row_get_client_Id != 0) {
                                $sql_update_client_med_vis = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `visibility` = '$generalVisibility' WHERE (uryyToeSS4 = '$get_hold_clients' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')  ");
                                if ($sql_update_client_med_vis != 0) {
                                    $sql_update_client_task_vis = mysqli_query($conn, "UPDATE `tbl_clients_task_records` SET `visibility` = '$generalVisibility' WHERE (uryyToeSS4 = '$get_hold_clients' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')  ");
                                    if ($sql_update_client_task_vis) {
                                        header("Location: ./dashboard");
                                    }
                                }
                            }
                        }
                    } else {
                        header("Location: ./dashboard");
                    }
                }
            }
        } else {
            $sql2 = mysqli_query($conn, "UPDATE `tbl_daily_shift_records` SET `shift_end_time` = '$txtCurrentTime', `planned_timeIn` = '$txtPlannedTimeIn', `planned_timeOut` = '$txtPlannedTimeOut', `col_company_Id` = '$txtCompanyId', `col_call_status` = '$status', `col_carecall_rate` = '$txtWorkedPayRate', `col_worked_time` = '$txtCareCallTime' 
            WHERE (col_care_call_Id = '$txtTaskId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
            if ($sql2) {
                $UpdateSql2 = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `timeline_colour` = '$bgChange', `bgChange` = '$bgChange', `call_status` = '$status', `currMonths` = '$txtcurrMonth' WHERE (userId = '$txtCareCallId') ");
                if ($UpdateSql2) {
                    $result_finCareCalls = mysqli_query($conn, "SELECT * FROM tbl_daily_shift_records WHERE (col_carer_Id='$user_special_Id' AND shift_date = '$today') ");
                    $rowcount_finCareCalls = mysqli_num_rows($result_finCareCalls);
                    //echo $rowcount_finCareCalls . "<br><Br>";
                    $result_schedCareCalls = mysqli_query($conn, "SELECT * FROM tbl_schedule_calls WHERE (first_carer_Id='$user_special_Id' AND Clientshift_Date = '$today') ");
                    $rowcount_schedCareCalls = mysqli_num_rows($result_schedCareCalls);
                    //echo $rowcount_schedCareCalls . "<br><Br>";
                    if ($rowcount_finCareCalls == $rowcount_schedCareCalls) {
                        $sql_get_client_Id = mysqli_query($conn, "SELECT uryyToeSS4 FROM tbl_schedule_calls WHERE (first_carer_Id = '$user_special_Id' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                        while ($row_get_client_Id = mysqli_fetch_array($sql_get_client_Id)) {
                            $get_hold_clients = $row_get_client_Id['uryyToeSS4'];
                            if ($row_get_client_Id != 0) {
                                $sql_update_client_med_vis = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `visibility` = '$generalVisibility' WHERE (uryyToeSS4 = '$get_hold_clients' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')  ");
                                if ($sql_update_client_med_vis != 0) {
                                    $sql_update_client_task_vis = mysqli_query($conn, "UPDATE `tbl_clients_task_records` SET `visibility` = '$generalVisibility' WHERE (uryyToeSS4 = '$get_hold_clients' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')  ");
                                    if ($sql_update_client_task_vis) {
                                        header("Location: ./dashboard");
                                    }
                                }
                            }
                        }
                    } else {
                        header("Location: ./dashboard");
                    }
                }
            }
        }
    } else if ($get_periodtwo == 'Monthly') {
        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $time = strtotime($get_occurence);
        $final_Month = date("Y-m-d", strtotime('+1 Month', $time));

        $myCheck = "SELECT * FROM tbl_daily_shift_records WHERE (col_care_call_Id = '$txtTaskId' AND col_carer_Id = '$user_special_Id' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ";
        $myCheckres = mysqli_query($conn, $myCheck);
        $countRes = mysqli_num_rows($myCheckres);
        if ($countRes != 0) {
            $sql1 = mysqli_query($conn, "UPDATE `tbl_daily_shift_records` SET `shift_end_time` = '$txtCurrentTime', `planned_timeIn` = '$txtPlannedTimeIn', `planned_timeOut` = '$txtPlannedTimeOut', `col_company_Id` = '$txtCompanyId', `col_call_status` = '$status', `col_carecall_rate` = '$txtWorkedPayRate', `col_worked_time` = '$txtCareCallTime' 
            WHERE (col_care_call_Id = '$txtTaskId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
            if ($sql1) {
                $UpdateSql = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `timeline_colour` = '$bgChange', `bgChange` = '$bgChange', `call_status` = '$status', `currMonths` = '$txtcurrMonth' WHERE (userId = '$txtCareCallId') ");
                if ($UpdateSql) {
                    ///////////////////////////////////////////////////////////
                    //this is to update the manage run and schedule run date to once every month for the visit that hav that month occurence
                    ///////////////////////////////////////////////////////////
                    $sql_update_periodonetime_sch = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `Clientshift_Date` = '$final_Month', `col_occurence` = '$today' WHERE (uryyToeSS4 = '$txtClientIdCode' AND care_calls = '$txtCareCalls' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')  ");
                    if ($sql_update_periodonetime_sch) {
                        $sql_update_periodonetime_mR = mysqli_query($conn, "UPDATE `tbl_manage_runs` SET `col_startDate` = '$final_Month' WHERE (userId = '$hold_managerunId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')  ");

                        if ($sql_update_periodonetime_mR) {
                            $result_finCareCalls = mysqli_query($conn, "SELECT * FROM tbl_daily_shift_records WHERE (col_carer_Id='$user_special_Id' AND shift_date = '$today') ");
                            $rowcount_finCareCalls = mysqli_num_rows($result_finCareCalls);
                            //echo $rowcount_finCareCalls . "<br><Br>";
                            $result_schedCareCalls = mysqli_query($conn, "SELECT * FROM tbl_schedule_calls WHERE (first_carer_Id='$user_special_Id' AND Clientshift_Date = '$today') ");
                            $rowcount_schedCareCalls = mysqli_num_rows($result_schedCareCalls);
                            //echo $rowcount_schedCareCalls . "<br><Br>";
                            if ($rowcount_finCareCalls == $rowcount_schedCareCalls) {
                                $sql_get_client_Id = mysqli_query($conn, "SELECT uryyToeSS4 FROM tbl_schedule_calls WHERE (first_carer_Id = '$user_special_Id' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                while ($row_get_client_Id = mysqli_fetch_array($sql_get_client_Id)) {
                                    $get_hold_clients = $row_get_client_Id['uryyToeSS4'];
                                    if ($row_get_client_Id != 0) {
                                        $sql_update_client_med_vis = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `visibility` = '$generalVisibility' WHERE (uryyToeSS4 = '$get_hold_clients' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')  ");
                                        if ($sql_update_client_med_vis != 0) {
                                            $sql_update_client_task_vis = mysqli_query($conn, "UPDATE `tbl_clients_task_records` SET `visibility` = '$generalVisibility' WHERE (uryyToeSS4 = '$get_hold_clients' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')  ");
                                            if ($sql_update_client_task_vis) {
                                                header("Location: ./dashboard");
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    } else {
                        header("Location: ./dashboard");
                    }
                }
            }
        } else {
            $sql2 = mysqli_query($conn, "UPDATE `tbl_daily_shift_records` SET `shift_end_time` = '$txtCurrentTime', `planned_timeIn` = '$txtPlannedTimeIn', `planned_timeOut` = '$txtPlannedTimeOut', `col_company_Id` = '$txtCompanyId', `col_call_status` = '$status', `col_carecall_rate` = '$txtWorkedPayRate', `col_worked_time` = '$txtCareCallTime' 
            WHERE (col_care_call_Id = '$txtTaskId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
            if ($sql2) {
                $UpdateSql2 = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `timeline_colour` = '$bgChange', `bgChange` = '$bgChange', `call_status` = '$status', `currMonths` = '$txtcurrMonth' WHERE (userId = '$txtCareCallId') ");
                if ($UpdateSql2) {

                    $sql_update_periodonetime_sch = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `Clientshift_Date` = '$final_Month', `col_occurence` = '$today' WHERE (uryyToeSS4 = '$txtClientIdCode' AND care_calls = '$txtCareCalls' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')  ");
                    if ($sql_update_periodonetime_sch) {
                        $sql_update_periodonetime_mR = mysqli_query($conn, "UPDATE `tbl_manage_runs` SET `col_startDate` = '$final_Month' WHERE (userId = '$hold_managerunId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')  ");

                        if ($sql_update_periodonetime_mR) {
                            $result_finCareCalls = mysqli_query($conn, "SELECT * FROM tbl_daily_shift_records WHERE (col_carer_Id='$user_special_Id' AND shift_date = '$today') ");
                            $rowcount_finCareCalls = mysqli_num_rows($result_finCareCalls);
                            //echo $rowcount_finCareCalls . "<br><Br>";
                            $result_schedCareCalls = mysqli_query($conn, "SELECT * FROM tbl_schedule_calls WHERE (first_carer_Id='$user_special_Id' AND Clientshift_Date = '$today') ");
                            $rowcount_schedCareCalls = mysqli_num_rows($result_schedCareCalls);
                            //echo $rowcount_schedCareCalls . "<br><Br>";
                            if ($rowcount_finCareCalls == $rowcount_schedCareCalls) {
                                $sql_get_client_Id = mysqli_query($conn, "SELECT uryyToeSS4 FROM tbl_schedule_calls WHERE (first_carer_Id = '$user_special_Id' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                while ($row_get_client_Id = mysqli_fetch_array($sql_get_client_Id)) {
                                    $get_hold_clients = $row_get_client_Id['uryyToeSS4'];
                                    if ($row_get_client_Id != 0) {
                                        $sql_update_client_med_vis = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `visibility` = '$generalVisibility' WHERE (uryyToeSS4 = '$get_hold_clients' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')  ");
                                        if ($sql_update_client_med_vis != 0) {
                                            $sql_update_client_task_vis = mysqli_query($conn, "UPDATE `tbl_clients_task_records` SET `visibility` = '$generalVisibility' WHERE (uryyToeSS4 = '$get_hold_clients' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')  ");
                                            if ($sql_update_client_task_vis) {
                                                header("Location: ./dashboard");
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    } else {
                        header("Location: ./dashboard");
                    }
                }
            }
        }
    } else if ($get_periodtwo == 'Days') {
        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $time = strtotime($get_occurence);
        $get_days_multi = '+ ' . $get_periodone . ' Days';
        $final_Days = date("Y-m-d", strtotime($get_days_multi, $time));

        $myCheck = "SELECT * FROM tbl_daily_shift_records WHERE (col_care_call_Id = '$txtTaskId' AND col_carer_Id = '$user_special_Id' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ";
        $myCheckres = mysqli_query($conn, $myCheck);
        $countRes = mysqli_num_rows($myCheckres);
        if ($countRes != 0) {
            $sql1 = mysqli_query($conn, "UPDATE `tbl_daily_shift_records` SET `shift_end_time` = '$txtCurrentTime', `planned_timeIn` = '$txtPlannedTimeIn', `planned_timeOut` = '$txtPlannedTimeOut', `col_company_Id` = '$txtCompanyId', `col_call_status` = '$status', `col_carecall_rate` = '$txtWorkedPayRate', `col_worked_time` = '$txtCareCallTime' 
            WHERE (col_care_call_Id = '$txtTaskId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
            if ($sql1) {
                $UpdateSql = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `timeline_colour` = '$bgChange', `bgChange` = '$bgChange', `call_status` = '$status', `currMonths` = '$txtcurrMonth' WHERE (userId = '$txtCareCallId') ");
                if ($UpdateSql) {
                    ///////////////////////////////////////////////////////////
                    //this is to update the manage run and schedule run date to once every month for the visit that hav that month occurence
                    ///////////////////////////////////////////////////////////
                    $sql_update_periodonetime_sch = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `Clientshift_Date` = '$final_Days', `col_occurence` = '$today' WHERE (uryyToeSS4 = '$txtClientIdCode' AND care_calls = '$txtCareCalls' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')  ");
                    if ($sql_update_periodonetime_sch) {
                        $sql_update_periodonetime_mR = mysqli_query($conn, "UPDATE `tbl_manage_runs` SET `col_startDate` = '$final_Days' WHERE (userId = '$hold_managerunId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')  ");

                        if ($sql_update_periodonetime_mR) {
                            $result_finCareCalls = mysqli_query($conn, "SELECT * FROM tbl_daily_shift_records WHERE (col_carer_Id='$user_special_Id' AND shift_date = '$today') ");
                            $rowcount_finCareCalls = mysqli_num_rows($result_finCareCalls);
                            //echo $rowcount_finCareCalls . "<br><Br>";
                            $result_schedCareCalls = mysqli_query($conn, "SELECT * FROM tbl_schedule_calls WHERE (first_carer_Id='$user_special_Id' AND col_occurence = '$today') ");
                            $rowcount_schedCareCalls = mysqli_num_rows($result_schedCareCalls);
                            //echo $rowcount_schedCareCalls . "<br><Br>";
                            if ($rowcount_finCareCalls == $rowcount_schedCareCalls) {
                                $sql_get_client_Id = mysqli_query($conn, "SELECT uryyToeSS4 FROM tbl_schedule_calls WHERE (first_carer_Id = '$user_special_Id' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                while ($row_get_client_Id = mysqli_fetch_array($sql_get_client_Id)) {
                                    $get_hold_clients = $row_get_client_Id['uryyToeSS4'];
                                    if ($row_get_client_Id != 0) {
                                        $sql_update_client_med_vis = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `visibility` = '$generalVisibility' WHERE (uryyToeSS4 = '$get_hold_clients' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')  ");
                                        if ($sql_update_client_med_vis != 0) {
                                            $sql_update_client_task_vis = mysqli_query($conn, "UPDATE `tbl_clients_task_records` SET `visibility` = '$generalVisibility' WHERE (uryyToeSS4 = '$get_hold_clients' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')  ");
                                            if ($sql_update_client_task_vis) {
                                                header("Location: ./dashboard");
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    } else {
                        header("Location: ./dashboard");
                    }
                }
            }
        } else {
            $sql2 = mysqli_query($conn, "UPDATE `tbl_daily_shift_records` SET `shift_end_time` = '$txtCurrentTime', `planned_timeIn` = '$txtPlannedTimeIn', `planned_timeOut` = '$txtPlannedTimeOut', `col_company_Id` = '$txtCompanyId', `col_call_status` = '$status', `col_carecall_rate` = '$txtWorkedPayRate', `col_worked_time` = '$txtCareCallTime' 
            WHERE (col_care_call_Id = '$txtTaskId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
            if ($sql2) {
                $UpdateSql2 = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `timeline_colour` = '$bgChange', `bgChange` = '$bgChange', `call_status` = '$status', `currMonths` = '$txtcurrMonth' WHERE (userId = '$txtCareCallId') ");
                if ($UpdateSql2) {

                    $sql_update_periodonetime_sch = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `Clientshift_Date` = '$final_Days', `col_occurence` = '$today' WHERE (uryyToeSS4 = '$txtClientIdCode' AND care_calls = '$txtCareCalls' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')  ");
                    if ($sql_update_periodonetime_sch) {
                        $sql_update_periodonetime_mR = mysqli_query($conn, "UPDATE `tbl_manage_runs` SET `col_startDate` = '$final_Days' WHERE (userId = '$hold_managerunId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')  ");

                        if ($sql_update_periodonetime_mR) {
                            $result_finCareCalls = mysqli_query($conn, "SELECT * FROM tbl_daily_shift_records WHERE (col_carer_Id='$user_special_Id' AND shift_date = '$today') ");
                            $rowcount_finCareCalls = mysqli_num_rows($result_finCareCalls);
                            //echo $rowcount_finCareCalls . "<br><Br>";
                            $result_schedCareCalls = mysqli_query($conn, "SELECT * FROM tbl_schedule_calls WHERE (first_carer_Id='$user_special_Id' AND col_occurence = '$today') ");
                            $rowcount_schedCareCalls = mysqli_num_rows($result_schedCareCalls);
                            //echo $rowcount_schedCareCalls . "<br><Br>";
                            if ($rowcount_finCareCalls == $rowcount_schedCareCalls) {
                                $sql_get_client_Id = mysqli_query($conn, "SELECT uryyToeSS4 FROM tbl_schedule_calls WHERE (first_carer_Id = '$user_special_Id' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                while ($row_get_client_Id = mysqli_fetch_array($sql_get_client_Id)) {
                                    $get_hold_clients = $row_get_client_Id['uryyToeSS4'];
                                    if ($row_get_client_Id != 0) {
                                        $sql_update_client_med_vis = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `visibility` = '$generalVisibility' WHERE (uryyToeSS4 = '$get_hold_clients' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')  ");
                                        if ($sql_update_client_med_vis != 0) {
                                            $sql_update_client_task_vis = mysqli_query($conn, "UPDATE `tbl_clients_task_records` SET `visibility` = '$generalVisibility' WHERE (uryyToeSS4 = '$get_hold_clients' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')  ");
                                            if ($sql_update_client_task_vis) {
                                                header("Location: ./dashboard");
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    } else {
                        header("Location: ./dashboard");
                    }
                }
            }
        }
    } else if ($get_periodtwo == 'Weeks') {
        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $time = strtotime($get_occurence);
        $get_Weeks_multi = '+' . $get_periodone . ' Weeks';
        $final_Weeks = date("Y-m-d", strtotime($get_Weeks_multi, $time));

        $myCheck = "SELECT * FROM tbl_daily_shift_records WHERE (col_care_call_Id = '$txtTaskId' AND col_carer_Id = '$user_special_Id' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ";
        $myCheckres = mysqli_query($conn, $myCheck);
        $countRes = mysqli_num_rows($myCheckres);
        if ($countRes != 0) {
            $sql1 = mysqli_query($conn, "UPDATE `tbl_daily_shift_records` SET `shift_end_time` = '$txtCurrentTime', `planned_timeIn` = '$txtPlannedTimeIn', `planned_timeOut` = '$txtPlannedTimeOut', `col_company_Id` = '$txtCompanyId', `col_call_status` = '$status', `col_carecall_rate` = '$txtWorkedPayRate', `col_worked_time` = '$txtCareCallTime' 
            WHERE (col_care_call_Id = '$txtTaskId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
            if ($sql1) {
                $UpdateSql = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `timeline_colour` = '$bgChange', `bgChange` = '$bgChange', `call_status` = '$status', `currMonths` = '$txtcurrMonth' WHERE (userId = '$txtCareCallId') ");
                if ($UpdateSql) {
                    ///////////////////////////////////////////////////////////
                    //this is to update the manage run and schedule run date to once every month for the visit that hav that month occurence
                    ///////////////////////////////////////////////////////////
                    $sql_update_periodonetime_sch = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `Clientshift_Date` = '$final_Weeks', `col_occurence` = '$today' WHERE (uryyToeSS4 = '$txtClientIdCode' AND care_calls = '$txtCareCalls' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')  ");
                    if ($sql_update_periodonetime_sch) {
                        $sql_update_periodonetime_mR = mysqli_query($conn, "UPDATE `tbl_manage_runs` SET `col_startDate` = '$final_Weeks' WHERE (userId = '$hold_managerunId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')  ");

                        if ($sql_update_periodonetime_mR) {
                            $result_finCareCalls = mysqli_query($conn, "SELECT * FROM tbl_daily_shift_records WHERE (col_carer_Id='$user_special_Id' AND shift_date = '$today') ");
                            $rowcount_finCareCalls = mysqli_num_rows($result_finCareCalls);
                            //echo $rowcount_finCareCalls . "<br><Br>";
                            $result_schedCareCalls = mysqli_query($conn, "SELECT * FROM tbl_schedule_calls WHERE (first_carer_Id='$user_special_Id' AND col_occurence = '$today') ");
                            $rowcount_schedCareCalls = mysqli_num_rows($result_schedCareCalls);
                            //echo $rowcount_schedCareCalls . "<br><Br>";
                            if ($rowcount_finCareCalls == $rowcount_schedCareCalls) {
                                $sql_get_client_Id = mysqli_query($conn, "SELECT uryyToeSS4 FROM tbl_schedule_calls WHERE (first_carer_Id = '$user_special_Id' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                while ($row_get_client_Id = mysqli_fetch_array($sql_get_client_Id)) {
                                    $get_hold_clients = $row_get_client_Id['uryyToeSS4'];
                                    if ($row_get_client_Id != 0) {
                                        $sql_update_client_med_vis = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `visibility` = '$generalVisibility' WHERE (uryyToeSS4 = '$get_hold_clients' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')  ");
                                        if ($sql_update_client_med_vis != 0) {
                                            $sql_update_client_task_vis = mysqli_query($conn, "UPDATE `tbl_clients_task_records` SET `visibility` = '$generalVisibility' WHERE (uryyToeSS4 = '$get_hold_clients' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')  ");
                                            if ($sql_update_client_task_vis) {
                                                header("Location: ./dashboard");
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    } else {
                        header("Location: ./dashboard");
                    }
                }
            }
        } else {
            $sql2 = mysqli_query($conn, "UPDATE `tbl_daily_shift_records` SET `shift_end_time` = '$txtCurrentTime', `planned_timeIn` = '$txtPlannedTimeIn', `planned_timeOut` = '$txtPlannedTimeOut', `col_company_Id` = '$txtCompanyId', `col_call_status` = '$status', `col_carecall_rate` = '$txtWorkedPayRate', `col_worked_time` = '$txtCareCallTime' 
            WHERE (col_care_call_Id = '$txtTaskId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
            if ($sql2) {
                $UpdateSql2 = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `timeline_colour` = '$bgChange', `bgChange` = '$bgChange', `call_status` = '$status', `currMonths` = '$txtcurrMonth' WHERE (userId = '$txtCareCallId') ");
                if ($UpdateSql2) {

                    $sql_update_periodonetime_sch = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `Clientshift_Date` = '$final_Weeks', `col_occurence` = '$today' WHERE (uryyToeSS4 = '$txtClientIdCode' AND care_calls = '$txtCareCalls' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')  ");
                    if ($sql_update_periodonetime_sch) {
                        $sql_update_periodonetime_mR = mysqli_query($conn, "UPDATE `tbl_manage_runs` SET `col_startDate` = '$final_Weeks' WHERE (userId = '$hold_managerunId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')  ");

                        if ($sql_update_periodonetime_mR) {
                            $result_finCareCalls = mysqli_query($conn, "SELECT * FROM tbl_daily_shift_records WHERE (col_carer_Id='$user_special_Id' AND shift_date = '$today') ");
                            $rowcount_finCareCalls = mysqli_num_rows($result_finCareCalls);
                            //echo $rowcount_finCareCalls . "<br><Br>";
                            $result_schedCareCalls = mysqli_query($conn, "SELECT * FROM tbl_schedule_calls WHERE (first_carer_Id='$user_special_Id' AND col_occurence = '$today') ");
                            $rowcount_schedCareCalls = mysqli_num_rows($result_schedCareCalls);
                            //echo $rowcount_schedCareCalls . "<br><Br>";
                            if ($rowcount_finCareCalls == $rowcount_schedCareCalls) {
                                $sql_get_client_Id = mysqli_query($conn, "SELECT uryyToeSS4 FROM tbl_schedule_calls WHERE (first_carer_Id = '$user_special_Id' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                while ($row_get_client_Id = mysqli_fetch_array($sql_get_client_Id)) {
                                    $get_hold_clients = $row_get_client_Id['uryyToeSS4'];
                                    if ($row_get_client_Id != 0) {
                                        $sql_update_client_med_vis = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `visibility` = '$generalVisibility' WHERE (uryyToeSS4 = '$get_hold_clients' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')  ");
                                        if ($sql_update_client_med_vis != 0) {
                                            $sql_update_client_task_vis = mysqli_query($conn, "UPDATE `tbl_clients_task_records` SET `visibility` = '$generalVisibility' WHERE (uryyToeSS4 = '$get_hold_clients' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')  ");
                                            if ($sql_update_client_task_vis) {
                                                header("Location: ./dashboard");
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    } else {
                        header("Location: ./dashboard");
                    }
                }
            }
        }
    } else {
        header("Location: ./dashboard");
    }
}
