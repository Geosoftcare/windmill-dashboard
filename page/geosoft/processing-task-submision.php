<?php

if (isset($_POST['btnSubmitTaskNote'])) {
    include_once('dbconnection-string.php');

    $txtTaskName = mysqli_real_escape_string($conn, $_POST['txtTaskName']);
    $txtTaskDate = mysqli_real_escape_string($conn, $_POST['txtTaskDate']);
    $txtTaskTimeIn = mysqli_real_escape_string($conn, $_POST['txtTaskTimeIn']);
    $txtTask_IdNo = mysqli_real_escape_string($conn, $_POST['txtTask_IdNo']);
    $txtTask_Date = mysqli_real_escape_string($conn, $_POST['txtTask_Date']);
    $txtTaskNoteYesOp = mysqli_real_escape_string($conn, $_POST['txtTaskNoteYesOp']);
    $txtTaskId = mysqli_real_escape_string($conn, $_POST['txtTaskId']);

    $txtClientId = mysqli_real_escape_string($conn, $_POST['txtClientId']);
    $txtClientCompId = mysqli_real_escape_string($conn, $_POST['txtClientCompId']);
    $txtCarerEmail = mysqli_real_escape_string($conn, $_POST['txtCarerEmail']);
    $txtTask = "Task";
    $task_colours = "#000";
    $txtTaskStatus = "Updated";
    $txtVisibility = "Not updated";

    $txtDosage = "Null";
    $txtCarerName = mysqli_real_escape_string($conn, $_POST['txtCarerName']);
    $mycheckNObox = mysqli_real_escape_string($conn, $_POST['txtcheckNObox']);
    $txtTaskNoteNoOp = mysqli_real_escape_string($conn, $_POST['txtTaskNoteNoOp']);
    $mycheckYesbox = mysqli_real_escape_string($conn, $_POST['txtcheckYesbox']);

    $txtClientCareCallId = mysqli_real_escape_string($conn, $_POST['txtClientCareCallId']);
    $txtCurerCall = mysqli_real_escape_string($conn, $_POST['txtCurerCall']);
    $CurrentDeviceTime = date("H");
    $CurrentDayInName = date("l");

    //if ($txtDistance <= '80') {
    //if the client care call data is equal to today's date and client care call is Same as the client care call id then it will be updated
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Database query to update the client care call data for breakfast
    $myCheck = "SELECT * FROM tbl_finished_tasks WHERE (task_SpecialId = '$txtTaskId' AND task_date = '$today' AND care_calls = '$txtCurerCall' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ";
    $myCheckres = mysqli_query($conn, $myCheck);
    $countRes = mysqli_num_rows($myCheckres);
    if ($countRes != 0) {
        if ($mycheckNObox) {
            if ($txtTaskNoteNoOp == '') {
                header("Location: ./reason-for-no-option?uryyToeSS4=$txtClientId");
            } else {
                $sqlUpdate_finish_task = mysqli_query($conn, "UPDATE `tbl_finished_tasks` SET `task_name` = '$txtTaskName', `task_date` = '$txtTaskDate', `task_timeIn` = '$txtTaskTimeIn', `task_note` = '$txtTaskNoteNoOp', `task_SpecialId` = '$txtTaskId', `uryyToeSS4` = '$txtClientId', `team_1email` = '$txtCarerEmail', `category` = '$txtTask', `col_dosage` = '$txtDosage', `col_carername` = '$txtCarerName', `col_outcome` = '$mycheckNObox', 
                `care_calls` = '$txtCurerCall', `care_call_days` = '$CurrentDayInName', `col_task_status` = '$txtTaskStatus', `col_care_call_Id` = '$txtClientCareCallId' WHERE (`task_SpecialId` = '$txtTaskId' AND `care_calls` = '$txtCurerCall' AND `task_date` = '$txtTaskDate' AND `col_company_Id` = '$txtClientCompId') ");
                if ($sqlUpdate_finish_task) {
                    header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                }
            }
        } else if ($mycheckYesbox) {
            $sqlUpdate_finish_task = mysqli_query($conn, "UPDATE `tbl_finished_tasks` SET `task_name` = '$txtTaskName', `task_date` = '$txtTaskDate', `task_timeIn` = '$txtTaskTimeIn', `task_note` = '$txtTaskNoteYesOp', `task_SpecialId` = '$txtTaskId', `uryyToeSS4` = '$txtClientId', `team_1email` = '$txtCarerEmail', `category` = '$txtTask', `col_dosage` = '$txtDosage', `col_carername` = '$txtCarerName', `col_outcome` = '$mycheckYesbox', 
                `care_calls` = '$txtCurerCall', `care_call_days` = '$CurrentDayInName', `col_task_status` = '$txtTaskStatus', `col_care_call_Id` = '$txtClientCareCallId' WHERE (`task_SpecialId` = '$txtTaskId' AND `care_calls` = '$txtCurerCall' AND `task_date` = '$txtTaskDate' AND `col_company_Id` = '$txtClientCompId') ");
            if ($sqlUpdate_finish_task) {
                header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
            }
        } else {
            header("Location: ./go-back-history");
        }
    } else {
        if ($mycheckNObox) {
            if ($txtTaskNoteNoOp == '') {
                header("Location: ./reason-for-no-option?uryyToeSS4=$txtClientId");
            } else {
                $queryIns = mysqli_query($conn, "INSERT INTO tbl_finished_tasks (task_name, task_date, task_timeIn, task_note, task_SpecialId, uryyToeSS4, team_1email, category, col_dosage, col_carername, col_outcome, care_calls, care_call_days, col_task_status, col_care_call_Id, col_company_Id) 
                    VALUES('" . $txtTaskName . "', '" . $txtTaskDate . "', '" . $txtTaskTimeIn . "', '" . $txtTaskNoteNoOp . "', '" . $txtTaskId . "', '" . $txtClientId . "', '" . $txtCarerEmail . "', '" . $txtTask . "', '" . $txtDosage . "', '" . $txtCarerName . "', '" . $mycheckNObox . "', '" . $txtCurerCall . "', '" . $CurrentDayInName . "', '" . $txtTaskStatus . "', '" . $txtClientCareCallId . "', '" . $txtClientCompId . "' ) ");
                if ($queryIns != 0) {
                    $myCheck_order = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE (uryyToeSS4 = '$txtClientId' AND (care_call1='$clientCurCallCalls' OR care_call1='Breakfast' OR care_call2='$clientCurCallCalls' OR care_call3='$clientCurCallCalls' OR care_call4='$clientCurCallCalls' OR extra_call1='$clientCurCallCalls' OR extra_call2='$clientCurCallCalls' OR extra_call3='$clientCurCallCalls' OR extra_call4='$clientCurCallCalls') 
                    AND col_fifo != '' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ORDER BY client_Id DESC LIMIT 1");
                    $row_order = mysqli_fetch_array($myCheck_order);
                    $get_orderNumber = $row_order['col_fifo'];
                    $countRes_order = mysqli_num_rows($myCheck_order);

                    if ($countRes_order != 0) {
                        $txtCalcOrderNumber = 1;
                        $sqlUpdate2 = mysqli_query($conn, "UPDATE `tbl_clients_task_records` SET `task_colours` = '$task_colours', `visibility` = '$today', `col_fifo` = '$txtCalcOrderNumber' WHERE col_taskId = '$txtTaskId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ");
                        if ($sqlUpdate2) {
                            $myCheck_periodtwo = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE (client_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                            $row_periodtwo = mysqli_fetch_array($myCheck_periodtwo);
                            $get_occurence = $row_periodtwo['col_occurence'];
                            $get_periodone = $row_periodtwo['col_period_one'];
                            $get_periodtwo = $row_periodtwo['col_period_two'];
                            $countRes_order = mysqli_num_rows($myCheck_periodtwo);

                            if ($get_periodtwo == 'Daily') {
                                header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                            } else if ($get_periodtwo == 'Monthly') {
                                $time = strtotime($get_occurence);
                                $final_Month = date("Y-m-d", strtotime('+1 Month', $time));
                                $sql_update_periodonetime = mysqli_query($conn, "UPDATE `tbl_clients_task_records` SET `col_occurence` = '$final_Month' WHERE (client_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')  ");
                                if ($sql_update_periodonetime) {
                                    header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                }
                            } else if ($get_periodtwo == 'Days') {
                                $time = strtotime($get_occurence);
                                $get_days_multi = '+ ' . $get_periodone . ' ' . $get_periodtwo;
                                $final_Days = date("Y-m-d", strtotime($get_days_multi, $time));
                                $sql_update_periodDays = mysqli_query($conn, "UPDATE `tbl_clients_task_records` SET `col_occurence` = '$final_Days' WHERE (client_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                if ($sql_update_periodDays) {
                                    header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                }
                            } else if ($get_periodtwo == 'Weeks') {
                                $myCheck_periodtwo = mysqli_query($conn, "SELECT CONCAT(monday, tuesday, wednesday, thursday, friday, saturday, sunday) AS WHOLECOLUMN FROM tbl_clients_task_records WHERE (client_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                $get_myCheck_periodtwo = mysqli_fetch_array($myCheck_periodtwo);
                                $myCheck_periodtwo = $get_myCheck_periodtwo['WHOLECOLUMN'];

                                $sql = mysqli_query($conn, "SELECT GROUP_CONCAT(care_call_days SEPARATOR '') AS WHOLEROW FROM tbl_finished_meds WHERE (`task_SpecialId` = '$txtTaskId' AND med_date = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                $row_sql = mysqli_fetch_array($sql);
                                $myCheck_period = $row_sql['WHOLEROW'];
                                if ($myCheck_periodtwo == $myCheck_period) {
                                    $time = strtotime($get_occurence);
                                    $get_Weeks_multi = '+' . $get_periodone . ' Week';
                                    $final_Weeks = date("Y-m-d", strtotime($get_Weeks_multi, $time));
                                    $sql_update_periodWeeks = mysqli_query($conn, "UPDATE `tbl_clients_task_records` SET `col_occurence` = '$final_Weeks' WHERE (`client_client_Id` = '$txtTaskId' AND col_occurence = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    if ($sql_update_periodWeeks) {
                                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                    }
                                } else {
                                    header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                }
                            }
                        }
                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                    } else {
                        $txtCalcOrderNumber = 1;
                        $sqlUpdate_order = mysqli_query($conn, "UPDATE `tbl_clients_task_records` SET `task_colours` = '$task_colours', `visibility` = '$today', `col_fifo` = '$txtCalcOrderNumber' WHERE col_taskId = '$txtTaskId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ");
                        if ($sqlUpdate_order) {
                            $myCheck_periodtwo = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE (client_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                            $row_periodtwo = mysqli_fetch_array($myCheck_periodtwo);
                            $get_occurence = $row_periodtwo['col_occurence'];
                            $get_periodone = $row_periodtwo['col_period_one'];
                            $get_periodtwo = $row_periodtwo['col_period_two'];
                            $countRes_order = mysqli_num_rows($myCheck_periodtwo);
                            if ($get_periodtwo == 'Daily') {
                                header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                            } else if ($get_periodtwo == 'Monthly') {
                                $time = strtotime($get_occurence);
                                $final_Month = date("Y-m-d", strtotime('+1 Month', $time));
                                $sql_update_periodonetime = mysqli_query($conn, "UPDATE `tbl_clients_task_records` SET `col_occurence` = '$final_Month' WHERE (client_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')  ");
                                if ($sql_update_periodonetime) {
                                    header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                }
                            } else if ($get_periodtwo == 'Days') {
                                $time = strtotime($get_occurence);
                                $get_days_multi = '+ ' . $get_periodone . ' ' . $get_periodtwo;
                                $final_Days = date("Y-m-d", strtotime($get_days_multi, $time));
                                $sql_update_periodDays = mysqli_query($conn, "UPDATE `tbl_clients_task_records` SET `col_occurence` = '$final_Days' WHERE (client_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                if ($sql_update_periodDays) {
                                    header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                }
                            } else if ($get_periodtwo == 'Weeks') {
                                $myCheck_periodtwo = mysqli_query($conn, "SELECT CONCAT(monday, tuesday, wednesday, thursday, friday, saturday, sunday) AS WHOLECOLUMN FROM tbl_clients_task_records WHERE (client_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                $get_myCheck_periodtwo = mysqli_fetch_array($myCheck_periodtwo);
                                $myCheck_periodtwo = $get_myCheck_periodtwo['WHOLECOLUMN'];

                                $sql = mysqli_query($conn, "SELECT GROUP_CONCAT(care_call_days SEPARATOR '') AS WHOLEROW FROM tbl_finished_meds WHERE (`task_SpecialId` = '$txtTaskId' AND med_date = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                $row_sql = mysqli_fetch_array($sql);
                                $myCheck_period = $row_sql['WHOLEROW'];
                                if ($myCheck_periodtwo == $myCheck_period) {
                                    $time = strtotime($get_occurence);
                                    $get_Weeks_multi = '+' . $get_periodone . ' Week';
                                    $final_Weeks = date("Y-m-d", strtotime($get_Weeks_multi, $time));
                                    $sql_update_periodWeeks = mysqli_query($conn, "UPDATE `tbl_clients_task_records` SET `col_occurence` = '$final_Weeks' WHERE (`client_client_Id` = '$txtTaskId' AND col_occurence = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    if ($sql_update_periodWeeks) {
                                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                    }
                                } else {
                                    header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                }
                            }
                        }
                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                    }
                }
            }
        } else if ($mycheckYesbox) {
            $queryIns2 = mysqli_query($conn, "INSERT INTO tbl_finished_tasks (task_name, task_date, task_timeIn, task_note, task_SpecialId, uryyToeSS4, team_1email, category, col_dosage, col_carername, col_outcome, care_calls, care_call_days, col_task_status, col_care_call_Id, col_company_Id) 
                VALUES('" . $txtTaskName . "', '" . $txtTaskDate . "', '" . $txtTaskTimeIn . "', '" . $txtTaskNoteYesOp . "', '" . $txtTaskId . "', '" . $txtClientId . "', '" . $txtCarerEmail . "', '" . $txtTask . "', '" . $txtDosage . "', '" . $txtCarerName . "', '" . $mycheckYesbox . "', '" . $txtCurerCall . "', '" . $CurrentDayInName . "', '" . $txtTaskStatus . "', '" . $txtClientCareCallId . "', '" . $txtClientCompId . "' ) ");
            if ($queryIns2) {
                $myCheck_order = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE (uryyToeSS4 = '$txtClientId' AND (care_call1='$clientCurCallCalls' OR care_call1='Breakfast' OR care_call2='$clientCurCallCalls' OR care_call3='$clientCurCallCalls' OR care_call4='$clientCurCallCalls' OR extra_call1='$clientCurCallCalls' OR extra_call2='$clientCurCallCalls' OR extra_call3='$clientCurCallCalls' OR extra_call4='$clientCurCallCalls') 
                AND col_fifo != '' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ORDER BY client_Id DESC LIMIT 1");
                $row_order = mysqli_fetch_array($myCheck_order);
                $get_orderNumber = $row_order['col_fifo'];
                $countRes_order = mysqli_num_rows($myCheck_order);

                if ($countRes_order != 0) {
                    $txtCalcOrderNumber = 1;
                    $sqlUpdate2 = mysqli_query($conn, "UPDATE `tbl_clients_task_records` SET `task_colours` = '$task_colours', `visibility` = '$today', `col_fifo` = '$txtCalcOrderNumber' WHERE col_taskId = '$txtTaskId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ");
                    if ($sqlUpdate2) {
                        $myCheck_periodtwo = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE (client_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                        $row_periodtwo = mysqli_fetch_array($myCheck_periodtwo);
                        $get_occurence = $row_periodtwo['col_occurence'];
                        $get_periodone = $row_periodtwo['col_period_one'];
                        $get_periodtwo = $row_periodtwo['col_period_two'];
                        $countRes_order = mysqli_num_rows($myCheck_periodtwo);
                        if ($get_periodtwo == 'Daily') {
                            header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                        } else if ($get_periodtwo == 'Monthly') {
                            $time = strtotime($get_occurence);
                            $final_Month = date("Y-m-d", strtotime('+1 Month', $time));
                            $sql_update_periodonetime = mysqli_query($conn, "UPDATE `tbl_clients_task_records` SET `col_occurence` = '$final_Month' WHERE (client_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')  ");
                            if ($sql_update_periodonetime) {
                                header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                            }
                        } else if ($get_periodtwo == 'Days') {
                            $time = strtotime($get_occurence);
                            $get_days_multi = '+ ' . $get_periodone . ' ' . $get_periodtwo;
                            $final_Days = date("Y-m-d", strtotime($get_days_multi, $time));
                            $sql_update_periodDays = mysqli_query($conn, "UPDATE `tbl_clients_task_records` SET `col_occurence` = '$final_Days' WHERE (client_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                            if ($sql_update_periodDays) {
                                header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                            }
                        } else if ($get_periodtwo == 'Weeks') {
                            $myCheck_periodtwo = mysqli_query($conn, "SELECT CONCAT(monday, tuesday, wednesday, thursday, friday, saturday, sunday) AS WHOLECOLUMN FROM tbl_clients_task_records WHERE (client_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                            $get_myCheck_periodtwo = mysqli_fetch_array($myCheck_periodtwo);
                            $myCheck_periodtwo = $get_myCheck_periodtwo['WHOLECOLUMN'];

                            $sql = mysqli_query($conn, "SELECT GROUP_CONCAT(care_call_days SEPARATOR '') AS WHOLEROW FROM tbl_finished_meds WHERE (`task_SpecialId` = '$txtTaskId' AND med_date = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                            $row_sql = mysqli_fetch_array($sql);
                            $myCheck_period = $row_sql['WHOLEROW'];
                            if ($myCheck_periodtwo == $myCheck_period) {
                                $time = strtotime($get_occurence);
                                $get_Weeks_multi = '+' . $get_periodone . ' Week';
                                $final_Weeks = date("Y-m-d", strtotime($get_Weeks_multi, $time));
                                $sql_update_periodWeeks = mysqli_query($conn, "UPDATE `tbl_clients_task_records` SET `col_occurence` = '$final_Weeks' WHERE (`client_client_Id` = '$txtTaskId' AND col_occurence = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                if ($sql_update_periodWeeks) {
                                    header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                }
                            } else {
                                header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                            }
                        }
                    }
                    header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                } else {
                    $txtCalcOrderNumber = 1;
                    $sqlUpdate_order = mysqli_query($conn, "UPDATE `tbl_clients_task_records` SET `task_colours` = '$task_colours', `visibility` = '$today', `col_fifo` = '$txtCalcOrderNumber' WHERE col_taskId = '$txtTaskId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ");
                    if ($sqlUpdate_order) {
                        $myCheck_periodtwo = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE (client_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                        $row_periodtwo = mysqli_fetch_array($myCheck_periodtwo);
                        $get_occurence = $row_periodtwo['col_occurence'];
                        $get_periodone = $row_periodtwo['col_period_one'];
                        $get_periodtwo = $row_periodtwo['col_period_two'];
                        $countRes_order = mysqli_num_rows($myCheck_periodtwo);
                        if ($get_periodtwo == 'Daily') {
                            header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                        } else if ($get_periodtwo == 'Monthly') {
                            $time = strtotime($get_occurence);
                            $final_Month = date("Y-m-d", strtotime('+1 Month', $time));
                            $sql_update_periodonetime = mysqli_query($conn, "UPDATE `tbl_clients_task_records` SET `col_occurence` = '$final_Month' WHERE (client_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')  ");
                            if ($sql_update_periodonetime) {
                                header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                            }
                        } else if ($get_periodtwo == 'Days') {
                            $time = strtotime($get_occurence);
                            $get_days_multi = '+ ' . $get_periodone . ' ' . $get_periodtwo;
                            $final_Days = date("Y-m-d", strtotime($get_days_multi, $time));
                            $sql_update_periodDays = mysqli_query($conn, "UPDATE `tbl_clients_task_records` SET `col_occurence` = '$final_Days' WHERE (client_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                            if ($sql_update_periodDays) {
                                header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                            }
                        } else if ($get_periodtwo == 'Weeks') {
                            $myCheck_periodtwo = mysqli_query($conn, "SELECT CONCAT(monday, tuesday, wednesday, thursday, friday, saturday, sunday) AS WHOLECOLUMN FROM tbl_clients_task_records WHERE (client_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                            $get_myCheck_periodtwo = mysqli_fetch_array($myCheck_periodtwo);
                            $myCheck_periodtwo = $get_myCheck_periodtwo['WHOLECOLUMN'];

                            $sql = mysqli_query($conn, "SELECT GROUP_CONCAT(care_call_days SEPARATOR '') AS WHOLEROW FROM tbl_finished_meds WHERE (`task_SpecialId` = '$txtTaskId' AND med_date = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                            $row_sql = mysqli_fetch_array($sql);
                            $myCheck_period = $row_sql['WHOLEROW'];
                            if ($myCheck_periodtwo == $myCheck_period) {
                                $time = strtotime($get_occurence);
                                $get_Weeks_multi = '+' . $get_periodone . ' Week';
                                $final_Weeks = date("Y-m-d", strtotime($get_Weeks_multi, $time));
                                $sql_update_periodWeeks = mysqli_query($conn, "UPDATE `tbl_clients_task_records` SET `col_occurence` = '$final_Weeks' WHERE (`client_client_Id` = '$txtTaskId' AND col_occurence = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                if ($sql_update_periodWeeks) {
                                    header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                }
                            } else {
                                header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                            }
                        }
                    }
                    header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                }
            }
        } else {
            header("Location: ./go-back-history");
        }
    }
}
