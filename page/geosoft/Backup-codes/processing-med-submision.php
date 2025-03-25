<?php

if (isset($_POST['btnSubmitMedNote'])) {
    include_once('dbconnection-string.php');

    $txtTaskName = mysqli_real_escape_string($conn, $_POST['txtTaskName']);
    $txtTaskDate = mysqli_real_escape_string($conn, $_POST['txtTaskDate']);
    $txtTaskTimeIn = mysqli_real_escape_string($conn, $_POST['txtTaskTimeIn']);
    $txtTask_IdNo = mysqli_real_escape_string($conn, $_POST['txtTask_IdNo']);
    $txtTaskNoteYesOp = mysqli_real_escape_string($conn, $_POST['txtTaskNoteYesOp']);
    $txtTaskId = mysqli_real_escape_string($conn, $_POST['txtTaskId']);

    $txtClientId = mysqli_real_escape_string($conn, $_POST['txtClientId']);
    $txtClientCompId = mysqli_real_escape_string($conn, $_POST['txtClientCompId']);
    $txtCarerEmail = mysqli_real_escape_string($conn, $_POST['txtCarerEmail']);
    $txtTask = "Medication";
    $med_colours = "#000";
    $txtVisibility = "Not updated";
    $txtTaskStatus = "Updated";

    $txtcare_call1 = "Breakfast";
    $txtcare_call2 = "Lunch";
    $txtcare_call3 = "Tea";
    $txtcare_call4 = "Bed";

    $txtcare_call5 = "EM morning call";
    $txtcare_call6 = "EL morning call";
    $txtcare_call7 = "ET morning call";
    $txtcare_call8 = "EB morning call";

    $txtDosage = mysqli_real_escape_string($conn, $_POST['txtDosage']);
    $txtCarerName = mysqli_real_escape_string($conn, $_POST['txtCarerName']);
    $mycheckNObox = mysqli_real_escape_string($conn, $_POST['txtcheckNObox']);
    $txtTaskNoteNoOp = mysqli_real_escape_string($conn, $_POST['txtTaskNoteNoOp']);
    $mycheckYesbox = mysqli_real_escape_string($conn, $_POST['txtcheckYesbox']);

    $txtClientCareCallId = mysqli_real_escape_string($conn, $_POST['txtClientCareCallId']);
    $txtCurerCall = mysqli_real_escape_string($conn, $_POST['txtCurerCall']);
    $CurrentDeviceTime = date("H");
    $CurrentDayInName = date("l");


    if ($txtCurerCall == 'Morning' or $txtCurerCall == 'Breakfast') {
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //Database query to update the client care call data for breakfast
        $myCheck = "SELECT * FROM tbl_finished_meds WHERE (task_SpecialId = '$txtTaskId' AND med_date = '$today' AND care_calls = '$txtcare_call1' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ";
        $myCheckres = mysqli_query($conn, $myCheck);
        $countRes = mysqli_num_rows($myCheckres);
        if ($countRes) {
            if ($mycheckNObox) {
                if ($txtTaskNoteNoOp == '') {
                    header("Location: ./reason-for-no-option?uryyToeSS4=$txtClientId");
                } else {
                    $sqlUpdate_finish_task = mysqli_query($conn, "UPDATE `tbl_finished_meds` SET `task_name` = '$txtTaskName', `med_date` = '$today', `task_timeIn` = '$txtTaskTimeIn', `task_note` = '$txtTaskNoteNoOp', `task_SpecialId` = '$txtTaskId', `uryyToeSS4` = '$txtClientId', `team_1email` = '$txtCarerEmail', `category` = '$txtTask', `col_dosage` = '$txtDosage', `col_carername` = '$txtCarerName', `col_outcome` = '$mycheckNObox', 
                `care_calls` = '$txtcare_call1', `care_call_days` = '$CurrentDayInName', `col_task_status` = '$txtTaskStatus', `col_care_call_Id` = '$txtClientCareCallId' WHERE (`task_SpecialId` = '$txtTaskId' AND `care_calls` = '$txtcare_call1' AND `med_date` = '$today' AND `col_company_Id` = '$txtClientCompId') ");
                    if ($sqlUpdate_finish_task) {
                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                    }
                }
            } else if ($mycheckYesbox) {
                $sqlUpdate_finish_task = mysqli_query($conn, "UPDATE `tbl_finished_meds` SET `task_name` = '$txtTaskName', `med_date` = '$today', `task_timeIn` = '$txtTaskTimeIn', `task_note` = '$txtTaskNoteYesOp', `task_SpecialId` = '$txtTaskId', `uryyToeSS4` = '$txtClientId', `team_1email` = '$txtCarerEmail', `category` = '$txtTask', `col_dosage` = '$txtDosage', `col_carername` = '$txtCarerName', `col_outcome` = '$mycheckYesbox', 
                `care_calls` = '$txtcare_call1', `care_call_days` = '$CurrentDayInName', `col_task_status` = '$txtTaskStatus', `col_care_call_Id` = '$txtClientCareCallId' WHERE (`task_SpecialId` = '$txtTaskId' AND `care_calls` = '$txtcare_call1' AND `med_date` = '$today' AND `col_company_Id` = '$txtClientCompId') ");
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
                    $queryIns = mysqli_query($conn, "INSERT INTO tbl_finished_meds (task_name, med_date, task_timeIn, task_note, task_SpecialId, uryyToeSS4, team_1email, category, col_dosage, col_carername, col_outcome, care_calls, care_call_days, col_task_status, col_care_call_Id, col_company_Id) 
                    VALUES('" . $txtTaskName . "', '" . $today . "', '" . $txtTaskTimeIn . "', '" . $txtTaskNoteNoOp . "', '" . $txtTaskId . "', '" . $txtClientId . "', '" . $txtCarerEmail . "', '" . $txtTask . "', '" . $txtDosage . "', '" . $txtCarerName . "', '" . $mycheckNObox . "', '" . $txtcare_call1 . "', '" . $CurrentDayInName . "', '" . $txtTaskStatus . "', '" . $txtClientCareCallId . "', '" . $txtClientCompId . "' ) ");
                    if ($queryIns) {
                        $myCheck_order = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4 = '$txtClientId' AND care_call1 = '$txtcare_call1' AND col_fifo != '' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ORDER BY med_Id DESC LIMIT 1");
                        $row_order = mysqli_fetch_array($myCheck_order);
                        $get_orderNumber = $row_order['col_fifo'];
                        $countRes_order = mysqli_num_rows($myCheck_order);
                        if ($countRes_order != 0) {
                            $txtCalcOrderNumber = $get_orderNumber + 1;
                            $sqlUpdate2 = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `med_colours` = '$med_colours', `visibility` = '$txtVisibility', `col_fifo` = '$txtCalcOrderNumber' WHERE client_med_Id = '$txtTaskId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ");
                            if ($sqlUpdate2) {
                                $myCheck_periodtwo = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
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
                                    $sql_update_periodonetime = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Month' WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')  ");
                                    if ($sql_update_periodonetime) {
                                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                    }
                                } else if ($get_periodtwo == 'Days') {
                                    $time = strtotime($get_occurence);
                                    $get_days_multi = '+ ' . $get_periodone . ' ' . $get_periodtwo;
                                    $final_Days = date("Y-m-d", strtotime($get_days_multi, $time));
                                    $sql_update_periodDays = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Days' WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    if ($sql_update_periodDays) {
                                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                    }
                                } else if ($get_periodtwo == 'Weeks') {
                                    $myCheck_periodtwo = mysqli_query($conn, "SELECT CONCAT(monday, tuesday, wednesday, thursday, friday, saturday, sunday) AS WHOLECOLUMN FROM tbl_clients_medication_records WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    $get_myCheck_periodtwo = mysqli_fetch_array($myCheck_periodtwo);
                                    $myCheck_periodtwo = $get_myCheck_periodtwo['WHOLECOLUMN'];

                                    $sql = mysqli_query($conn, "SELECT GROUP_CONCAT(care_call_days SEPARATOR '') AS WHOLEROW FROM tbl_finished_meds WHERE (`task_SpecialId` = '$txtTaskId' AND med_date = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    $row_sql = mysqli_fetch_array($sql);
                                    $myCheck_period = $row_sql['WHOLEROW'];
                                    if ($myCheck_periodtwo == $myCheck_period) {
                                        $time = strtotime($get_occurence);
                                        $get_Weeks_multi = '+' . $get_periodone . ' Week';
                                        $final_Weeks = date("Y-m-d", strtotime($get_Weeks_multi, $time));
                                        $sql_update_periodWeeks = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Weeks' WHERE (`client_med_Id` = '$txtTaskId' AND col_occurence = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        if ($sql_update_periodWeeks) {
                                            header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                        }
                                    } else {
                                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                    }
                                }
                            }
                            //header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                        } else {
                            $txtCalcOrderNumber = $get_orderNumber + 1;
                            $sqlUpdate_order = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `med_colours` = '$med_colours', `visibility` = '$txtVisibility', `col_fifo` = '$txtCalcOrderNumber' WHERE client_med_Id = '$txtTaskId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ");
                            if ($sqlUpdate_order) {
                                $myCheck_periodtwo = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
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
                                    $sql_update_periodonetime = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Month' WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')  ");
                                    if ($sql_update_periodonetime) {
                                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                    }
                                } else if ($get_periodtwo == 'Days') {
                                    $time = strtotime($get_occurence);
                                    $get_days_multi = '+ ' . $get_periodone . ' ' . $get_periodtwo;
                                    $final_Days = date("Y-m-d", strtotime($get_days_multi, $time));
                                    $sql_update_periodDays = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Days' WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    if ($sql_update_periodDays) {
                                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                    }
                                } else if ($get_periodtwo == 'Weeks') {
                                    $myCheck_periodtwo = mysqli_query($conn, "SELECT CONCAT(monday, tuesday, wednesday, thursday, friday, saturday, sunday) AS WHOLECOLUMN FROM tbl_clients_medication_records WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    $get_myCheck_periodtwo = mysqli_fetch_array($myCheck_periodtwo);
                                    $myCheck_periodtwo = $get_myCheck_periodtwo['WHOLECOLUMN'];

                                    $sql = mysqli_query($conn, "SELECT GROUP_CONCAT(care_call_days SEPARATOR '') AS WHOLEROW FROM tbl_finished_meds WHERE (`task_SpecialId` = '$txtTaskId' AND med_date = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    $row_sql = mysqli_fetch_array($sql);
                                    $myCheck_period = $row_sql['WHOLEROW'];
                                    if ($myCheck_periodtwo == $myCheck_period) {
                                        $time = strtotime($get_occurence);
                                        $get_Weeks_multi = '+' . $get_periodone . ' Week';
                                        $final_Weeks = date("Y-m-d", strtotime($get_Weeks_multi, $time));
                                        $sql_update_periodWeeks = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Weeks' WHERE (`client_med_Id` = '$txtTaskId' AND col_occurence = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        if ($sql_update_periodWeeks) {
                                            header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                        }
                                    } else {
                                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                    }
                                }
                            }
                            //header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                        }
                    }
                }
            } else if ($mycheckYesbox) {
                $queryIns2 = mysqli_query($conn, "INSERT INTO tbl_finished_meds (task_name, med_date, task_timeIn, task_note, task_SpecialId, uryyToeSS4, team_1email, category, col_dosage, col_carername, col_outcome, care_calls, care_call_days, col_task_status, col_care_call_Id, col_company_Id) 
                    VALUES('" . $txtTaskName . "', '" . $today . "', '" . $txtTaskTimeIn . "', '" . $txtTaskNoteYesOp . "', '" . $txtTaskId . "', '" . $txtClientId . "', '" . $txtCarerEmail . "', '" . $txtTask . "', '" . $txtDosage . "', '" . $txtCarerName . "', '" . $mycheckYesbox . "', '" . $txtcare_call1 . "', '" . $CurrentDayInName . "', '" . $txtTaskStatus . "', '" . $txtClientCareCallId . "', '" . $txtClientCompId . "' ) ");
                if ($queryIns2) {
                    $myCheck_order = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4 = '$txtClientId' AND care_call1 = '$txtcare_call1' AND col_fifo != '' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ORDER BY med_Id DESC LIMIT 1");
                    $row_order = mysqli_fetch_array($myCheck_order);
                    $get_orderNumber = $row_order['col_fifo'];
                    $countRes_order = mysqli_num_rows($myCheck_order);
                    if ($countRes_order != 0) {
                        $txtCalcOrderNumber = $get_orderNumber + 1;
                        $sqlUpdate2 = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `med_colours` = '$med_colours', `visibility` = '$txtVisibility', `col_fifo` = '$txtCalcOrderNumber' WHERE client_med_Id = '$txtTaskId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ");
                        if ($sqlUpdate2) {
                            $myCheck_periodtwo = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
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
                                $sql_update_periodonetime = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Month' WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')  ");
                                if ($sql_update_periodonetime) {
                                    header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                }
                            } else if ($get_periodtwo == 'Days') {
                                $time = strtotime($get_occurence);
                                $get_days_multi = '+ ' . $get_periodone . ' ' . $get_periodtwo;
                                $final_Days = date("Y-m-d", strtotime($get_days_multi, $time));
                                $sql_update_periodDays = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Days' WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                if ($sql_update_periodDays) {
                                    header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                }
                            } else if ($get_periodtwo == 'Weeks') {
                                $myCheck_periodtwo = mysqli_query($conn, "SELECT CONCAT(monday, tuesday, wednesday, thursday, friday, saturday, sunday) AS WHOLECOLUMN FROM tbl_clients_medication_records WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                $get_myCheck_periodtwo = mysqli_fetch_array($myCheck_periodtwo);
                                $myCheck_periodtwo = $get_myCheck_periodtwo['WHOLECOLUMN'];

                                $sql = mysqli_query($conn, "SELECT GROUP_CONCAT(care_call_days SEPARATOR '') AS WHOLEROW FROM tbl_finished_meds WHERE (`task_SpecialId` = '$txtTaskId' AND med_date = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                $row_sql = mysqli_fetch_array($sql);
                                $myCheck_period = $row_sql['WHOLEROW'];
                                if ($myCheck_periodtwo == $myCheck_period) {
                                    $time = strtotime($get_occurence);
                                    $get_Weeks_multi = '+' . $get_periodone . ' Week';
                                    $final_Weeks = date("Y-m-d", strtotime($get_Weeks_multi, $time));
                                    $sql_update_periodWeeks = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Weeks' WHERE (`client_med_Id` = '$txtTaskId' AND col_occurence = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    if ($sql_update_periodWeeks) {
                                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                    }
                                } else {
                                    header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                }
                            }
                        }
                        //header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                    } else {
                        $txtCalcOrderNumber = $get_orderNumber + 1;
                        $sqlUpdate_order = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `med_colours` = '$med_colours', `visibility` = '$txtVisibility', `col_fifo` = '$txtCalcOrderNumber' WHERE client_med_Id = '$txtTaskId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ");
                        if ($sqlUpdate_order) {
                            $myCheck_periodtwo = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
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
                                $sql_update_periodonetime = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Month' WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')  ");
                                if ($sql_update_periodonetime) {
                                    header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                }
                            } else if ($get_periodtwo == 'Days') {
                                $time = strtotime($get_occurence);
                                $get_days_multi = '+ ' . $get_periodone . ' ' . $get_periodtwo;
                                $final_Days = date("Y-m-d", strtotime($get_days_multi, $time));
                                $sql_update_periodDays = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Days' WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                if ($sql_update_periodDays) {
                                    header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                }
                            } else if ($get_periodtwo == 'Weeks') {
                                $myCheck_periodtwo = mysqli_query($conn, "SELECT CONCAT(monday, tuesday, wednesday, thursday, friday, saturday, sunday) AS WHOLECOLUMN FROM tbl_clients_medication_records WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                $get_myCheck_periodtwo = mysqli_fetch_array($myCheck_periodtwo);
                                $myCheck_periodtwo = $get_myCheck_periodtwo['WHOLECOLUMN'];

                                $sql = mysqli_query($conn, "SELECT GROUP_CONCAT(care_call_days SEPARATOR '') AS WHOLEROW FROM tbl_finished_meds WHERE (`task_SpecialId` = '$txtTaskId' AND med_date = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                $row_sql = mysqli_fetch_array($sql);
                                $myCheck_period = $row_sql['WHOLEROW'];
                                if ($myCheck_periodtwo == $myCheck_period) {
                                    $time = strtotime($get_occurence);
                                    $get_Weeks_multi = '+' . $get_periodone . ' Week';
                                    $final_Weeks = date("Y-m-d", strtotime($get_Weeks_multi, $time));
                                    $sql_update_periodWeeks = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Weeks' WHERE (`client_med_Id` = '$txtTaskId' AND col_occurence = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    if ($sql_update_periodWeeks) {
                                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                    }
                                } else {
                                    header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                }
                            }
                        }
                        //header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                    }
                }
            } else {
                header("Location: ./go-back-history");
            }
        }
    } else if ($txtCurerCall == 'Lunch') {
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //Database query to update the client care call data for breakfast
        $myCheck = "SELECT * FROM tbl_finished_meds WHERE (task_SpecialId = '$txtTaskId' AND med_date = '$today' AND care_calls = '$txtcare_call2' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ";
        $myCheckres = mysqli_query($conn, $myCheck);
        $countRes = mysqli_num_rows($myCheckres);
        if ($countRes) {
            if ($mycheckNObox) {
                if ($txtTaskNoteNoOp == '') {
                    header("Location: ./reason-for-no-option?uryyToeSS4=$txtClientId");
                } else {
                    $sqlUpdate_finish_task = mysqli_query($conn, "UPDATE `tbl_finished_meds` SET `task_name` = '$txtTaskName', `med_date` = '$today', `task_timeIn` = '$txtTaskTimeIn', `task_note` = '$txtTaskNoteNoOp', `task_SpecialId` = '$txtTaskId', `uryyToeSS4` = '$txtClientId', `team_1email` = '$txtCarerEmail', `category` = '$txtTask', `col_dosage` = '$txtDosage', `col_carername` = '$txtCarerName', `col_outcome` = '$mycheckNObox', 
                `care_calls` = '$txtcare_call2', `care_call_days` = '$CurrentDayInName', `col_task_status` = '$txtTaskStatus', `col_care_call_Id` = '$txtClientCareCallId' WHERE (`task_SpecialId` = '$txtTaskId' AND `care_calls` = '$txtcare_call2' AND `med_date` = '$today' AND `col_company_Id` = '$txtClientCompId') ");
                    if ($sqlUpdate_finish_task) {
                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                    }
                }
            } else if ($mycheckYesbox) {
                $sqlUpdate_finish_task = mysqli_query($conn, "UPDATE `tbl_finished_meds` SET `task_name` = '$txtTaskName', `med_date` = '$today', `task_timeIn` = '$txtTaskTimeIn', `task_note` = '$txtTaskNoteYesOp', `task_SpecialId` = '$txtTaskId', `uryyToeSS4` = '$txtClientId', `team_1email` = '$txtCarerEmail', `category` = '$txtTask', `col_dosage` = '$txtDosage', `col_carername` = '$txtCarerName', `col_outcome` = '$mycheckYesbox', 
                `care_calls` = '$txtcare_call2', `care_call_days` = '$CurrentDayInName', `col_task_status` = '$txtTaskStatus', `col_care_call_Id` = '$txtClientCareCallId' WHERE (`task_SpecialId` = '$txtTaskId' AND `care_calls` = '$txtcare_call2' AND `med_date` = '$today' AND `col_company_Id` = '$txtClientCompId') ");
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
                    $queryIns = mysqli_query($conn, "INSERT INTO tbl_finished_meds (task_name, med_date, task_timeIn, task_note, task_SpecialId, uryyToeSS4, team_1email, category, col_dosage, col_carername, col_outcome, care_calls, care_call_days, col_task_status, col_care_call_Id, col_company_Id) 
                    VALUES('" . $txtTaskName . "', '" . $today . "', '" . $txtTaskTimeIn . "', '" . $txtTaskNoteNoOp . "', '" . $txtTaskId . "', '" . $txtClientId . "', '" . $txtCarerEmail . "', '" . $txtTask . "', '" . $txtDosage . "', '" . $txtCarerName . "', '" . $mycheckNObox . "', '" . $txtcare_call2 . "', '" . $CurrentDayInName . "', '" . $txtTaskStatus . "', '" . $txtClientCareCallId . "', '" . $txtClientCompId . "' ) ");
                    if ($queryIns != 0) {
                        $myCheck_order = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4 = '$txtClientId' AND care_call2 = '$txtcare_call2' AND col_fifo != '' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ORDER BY med_Id DESC LIMIT 1");
                        $row_order = mysqli_fetch_array($myCheck_order);
                        $get_orderNumber = $row_order['col_fifo'];
                        $countRes_order = mysqli_num_rows($myCheck_order);
                        if ($countRes_order != 0) {
                            $txtCalcOrderNumber = $get_orderNumber + 1;
                            $sqlUpdate2 = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `med_colours` = '$med_colours', `visibility` = '$txtVisibility', `col_fifo` = '$txtCalcOrderNumber' WHERE client_med_Id = '$txtTaskId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ");
                            if ($sqlUpdate2) {
                                $myCheck_periodtwo = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
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
                                    $sql_update_periodonetime = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Month' WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')  ");
                                    if ($sql_update_periodonetime) {
                                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                    }
                                } else if ($get_periodtwo == 'Days') {
                                    $time = strtotime($get_occurence);
                                    $get_days_multi = '+ ' . $get_periodone . ' ' . $get_periodtwo;
                                    $final_Days = date("Y-m-d", strtotime($get_days_multi, $time));
                                    $sql_update_periodDays = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Days' WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    if ($sql_update_periodDays) {
                                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                    }
                                } else if ($get_periodtwo == 'Weeks') {
                                    $myCheck_periodtwo = mysqli_query($conn, "SELECT CONCAT(monday, tuesday, wednesday, thursday, friday, saturday, sunday) AS WHOLECOLUMN FROM tbl_clients_medication_records WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    $get_myCheck_periodtwo = mysqli_fetch_array($myCheck_periodtwo);
                                    $myCheck_periodtwo = $get_myCheck_periodtwo['WHOLECOLUMN'];

                                    $sql = mysqli_query($conn, "SELECT GROUP_CONCAT(care_call_days SEPARATOR '') AS WHOLEROW FROM tbl_finished_meds WHERE (`task_SpecialId` = '$txtTaskId' AND med_date = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    $row_sql = mysqli_fetch_array($sql);
                                    $myCheck_period = $row_sql['WHOLEROW'];
                                    if ($myCheck_periodtwo == $myCheck_period) {
                                        $time = strtotime($get_occurence);
                                        $get_Weeks_multi = '+' . $get_periodone . ' Week';
                                        $final_Weeks = date("Y-m-d", strtotime($get_Weeks_multi, $time));
                                        $sql_update_periodWeeks = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Weeks' WHERE (`client_med_Id` = '$txtTaskId' AND col_occurence = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        if ($sql_update_periodWeeks) {
                                            header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                        }
                                    } else {
                                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                    }
                                }
                            }
                            //header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                        } else {
                            $txtCalcOrderNumber = $get_orderNumber + 1;
                            $sqlUpdate_order = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `med_colours` = '$med_colours', `visibility` = '$txtVisibility', `col_fifo` = '$txtCalcOrderNumber' WHERE client_med_Id = '$txtTaskId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ");
                            if ($sqlUpdate_order) {
                                $myCheck_periodtwo = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
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
                                    $sql_update_periodonetime = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Month' WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')  ");
                                    if ($sql_update_periodonetime) {
                                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                    }
                                } else if ($get_periodtwo == 'Days') {
                                    $time = strtotime($get_occurence);
                                    $get_days_multi = '+ ' . $get_periodone . ' ' . $get_periodtwo;
                                    $final_Days = date("Y-m-d", strtotime($get_days_multi, $time));
                                    $sql_update_periodDays = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Days' WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    if ($sql_update_periodDays) {
                                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                    }
                                } else if ($get_periodtwo == 'Weeks') {
                                    $myCheck_periodtwo = mysqli_query($conn, "SELECT CONCAT(monday, tuesday, wednesday, thursday, friday, saturday, sunday) AS WHOLECOLUMN FROM tbl_clients_medication_records WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    $get_myCheck_periodtwo = mysqli_fetch_array($myCheck_periodtwo);
                                    $myCheck_periodtwo = $get_myCheck_periodtwo['WHOLECOLUMN'];

                                    $sql = mysqli_query($conn, "SELECT GROUP_CONCAT(care_call_days SEPARATOR '') AS WHOLEROW FROM tbl_finished_meds WHERE (`task_SpecialId` = '$txtTaskId' AND med_date = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    $row_sql = mysqli_fetch_array($sql);
                                    $myCheck_period = $row_sql['WHOLEROW'];
                                    if ($myCheck_periodtwo == $myCheck_period) {
                                        $time = strtotime($get_occurence);
                                        $get_Weeks_multi = '+' . $get_periodone . ' Week';
                                        $final_Weeks = date("Y-m-d", strtotime($get_Weeks_multi, $time));
                                        $sql_update_periodWeeks = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Weeks' WHERE (`client_med_Id` = '$txtTaskId' AND col_occurence = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        if ($sql_update_periodWeeks) {
                                            header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                        }
                                    } else {
                                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                    }
                                }
                            }
                            //header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                        }
                    }
                }
            } else if ($mycheckYesbox) {
                $queryIns2 = mysqli_query($conn, "INSERT INTO tbl_finished_meds (task_name, med_date, task_timeIn, task_note, task_SpecialId, uryyToeSS4, team_1email, category, col_dosage, col_carername, col_outcome, care_calls, care_call_days, col_task_status, col_care_call_Id, col_company_Id) 
                    VALUES('" . $txtTaskName . "', '" . $today . "', '" . $txtTaskTimeIn . "', '" . $txtTaskNoteYesOp . "', '" . $txtTaskId . "', '" . $txtClientId . "', '" . $txtCarerEmail . "', '" . $txtTask . "', '" . $txtDosage . "', '" . $txtCarerName . "', '" . $mycheckYesbox . "', '" . $txtcare_call2 . "', '" . $CurrentDayInName . "', '" . $txtTaskStatus . "', '" . $txtClientCareCallId . "', '" . $txtClientCompId . "' ) ");
                if ($queryIns2 != 0) {
                    $myCheck_order = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4 = '$txtClientId' AND care_call2 = '$txtcare_call2' AND col_fifo != '' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ORDER BY med_Id DESC LIMIT 1");
                    $row_order = mysqli_fetch_array($myCheck_order);
                    $get_orderNumber = $row_order['col_fifo'];
                    $countRes_order = mysqli_num_rows($myCheck_order);
                    if ($countRes_order != 0) {
                        $txtCalcOrderNumber = $get_orderNumber + 1;
                        $sqlUpdate2 = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `med_colours` = '$med_colours', `visibility` = '$txtVisibility', `col_fifo` = '$txtCalcOrderNumber' WHERE client_med_Id = '$txtTaskId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ");
                        if ($sqlUpdate2) {
                            $myCheck_periodtwo = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
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
                                $sql_update_periodonetime = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Month' WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')  ");
                                if ($sql_update_periodonetime) {
                                    header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                }
                            } else if ($get_periodtwo == 'Days') {
                                $time = strtotime($get_occurence);
                                $get_days_multi = '+ ' . $get_periodone . ' ' . $get_periodtwo;
                                $final_Days = date("Y-m-d", strtotime($get_days_multi, $time));
                                $sql_update_periodDays = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Days' WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                if ($sql_update_periodDays) {
                                    header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                }
                            } else if ($get_periodtwo == 'Weeks') {
                                $myCheck_periodtwo = mysqli_query($conn, "SELECT CONCAT(monday, tuesday, wednesday, thursday, friday, saturday, sunday) AS WHOLECOLUMN FROM tbl_clients_medication_records WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                $get_myCheck_periodtwo = mysqli_fetch_array($myCheck_periodtwo);
                                $myCheck_periodtwo = $get_myCheck_periodtwo['WHOLECOLUMN'];

                                $sql = mysqli_query($conn, "SELECT GROUP_CONCAT(care_call_days SEPARATOR '') AS WHOLEROW FROM tbl_finished_meds WHERE (`task_SpecialId` = '$txtTaskId' AND med_date = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                $row_sql = mysqli_fetch_array($sql);
                                $myCheck_period = $row_sql['WHOLEROW'];
                                if ($myCheck_periodtwo == $myCheck_period) {
                                    $time = strtotime($get_occurence);
                                    $get_Weeks_multi = '+' . $get_periodone . ' Week';
                                    $final_Weeks = date("Y-m-d", strtotime($get_Weeks_multi, $time));
                                    $sql_update_periodWeeks = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Weeks' WHERE (`client_med_Id` = '$txtTaskId' AND col_occurence = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    if ($sql_update_periodWeeks) {
                                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                    }
                                } else {
                                    header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                }
                            }
                        }
                        //header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                    } else {
                        $txtCalcOrderNumber = $get_orderNumber + 1;
                        $sqlUpdate_order = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `med_colours` = '$med_colours', `visibility` = '$txtVisibility', `col_fifo` = '$txtCalcOrderNumber' WHERE client_med_Id = '$txtTaskId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ");
                        if ($sqlUpdate_order) {
                            $myCheck_periodtwo = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
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
                                $sql_update_periodonetime = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Month' WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')  ");
                                if ($sql_update_periodonetime) {
                                    header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                }
                            } else if ($get_periodtwo == 'Days') {
                                $time = strtotime($get_occurence);
                                $get_days_multi = '+ ' . $get_periodone . ' ' . $get_periodtwo;
                                $final_Days = date("Y-m-d", strtotime($get_days_multi, $time));
                                $sql_update_periodDays = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Days' WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                if ($sql_update_periodDays) {
                                    header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                }
                            } else if ($get_periodtwo == 'Weeks') {
                                $myCheck_periodtwo = mysqli_query($conn, "SELECT CONCAT(monday, tuesday, wednesday, thursday, friday, saturday, sunday) AS WHOLECOLUMN FROM tbl_clients_medication_records WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                $get_myCheck_periodtwo = mysqli_fetch_array($myCheck_periodtwo);
                                $myCheck_periodtwo = $get_myCheck_periodtwo['WHOLECOLUMN'];

                                $sql = mysqli_query($conn, "SELECT GROUP_CONCAT(care_call_days SEPARATOR '') AS WHOLEROW FROM tbl_finished_meds WHERE (`task_SpecialId` = '$txtTaskId' AND med_date = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                $row_sql = mysqli_fetch_array($sql);
                                $myCheck_period = $row_sql['WHOLEROW'];
                                if ($myCheck_periodtwo == $myCheck_period) {
                                    $time = strtotime($get_occurence);
                                    $get_Weeks_multi = '+' . $get_periodone . ' Week';
                                    $final_Weeks = date("Y-m-d", strtotime($get_Weeks_multi, $time));
                                    $sql_update_periodWeeks = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Weeks' WHERE (`client_med_Id` = '$txtTaskId' AND col_occurence = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    if ($sql_update_periodWeeks) {
                                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                    }
                                } else {
                                    header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                }
                            }
                        }
                        //header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                    }
                } else {
                    header("Location: ./go-back-history");
                }
            }
        }
    } else if ($txtCurerCall == 'Tea') {
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //Database query to update the client care call data for breakfast
        $myCheck = "SELECT * FROM tbl_finished_meds WHERE (task_SpecialId = '$txtTaskId' AND med_date = '$today' AND care_calls = '$txtcare_call3' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ";
        $myCheckres = mysqli_query($conn, $myCheck);
        $countRes = mysqli_num_rows($myCheckres);
        if ($countRes) {
            if ($mycheckNObox) {
                if ($txtTaskNoteNoOp == '') {
                    header("Location: ./reason-for-no-option?uryyToeSS4=$txtClientId");
                } else {
                    $sqlUpdate_finish_task = mysqli_query($conn, "UPDATE `tbl_finished_meds` SET `task_name` = '$txtTaskName', `med_date` = '$today', `task_timeIn` = '$txtTaskTimeIn', `task_note` = '$txtTaskNoteNoOp', `task_SpecialId` = '$txtTaskId', `uryyToeSS4` = '$txtClientId', `team_1email` = '$txtCarerEmail', `category` = '$txtTask', `col_dosage` = '$txtDosage', `col_carername` = '$txtCarerName', `col_outcome` = '$mycheckNObox', 
                `care_calls` = '$txtcare_call3', `care_call_days` = '$CurrentDayInName', `col_task_status` = '$txtTaskStatus', `col_care_call_Id` = '$txtClientCareCallId' WHERE (`task_SpecialId` = '$txtTaskId' AND `care_calls` = '$txtcare_call3' AND `med_date` = '$today' AND `col_company_Id` = '$txtClientCompId') ");
                    if ($sqlUpdate_finish_task) {
                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                    }
                }
            } else if ($mycheckYesbox) {
                $sqlUpdate_finish_task = mysqli_query($conn, "UPDATE `tbl_finished_meds` SET `task_name` = '$txtTaskName', `med_date` = '$today', `task_timeIn` = '$txtTaskTimeIn', `task_note` = '$txtTaskNoteYesOp', `task_SpecialId` = '$txtTaskId', `uryyToeSS4` = '$txtClientId', `team_1email` = '$txtCarerEmail', `category` = '$txtTask', `col_dosage` = '$txtDosage', `col_carername` = '$txtCarerName', `col_outcome` = '$mycheckYesbox', 
                `care_calls` = '$txtcare_call3', `care_call_days` = '$CurrentDayInName', `col_task_status` = '$txtTaskStatus', `col_care_call_Id` = '$txtClientCareCallId' WHERE (`task_SpecialId` = '$txtTaskId' AND `care_calls` = '$txtcare_call3' AND `med_date` = '$today' AND `col_company_Id` = '$txtClientCompId') ");
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
                    $queryIns = mysqli_query($conn, "INSERT INTO tbl_finished_meds (task_name, med_date, task_timeIn, task_note, task_SpecialId, uryyToeSS4, team_1email, category, col_dosage, col_carername, col_outcome, care_calls, care_call_days, col_task_status, col_care_call_Id, col_company_Id) 
                    VALUES('" . $txtTaskName . "', '" . $today . "', '" . $txtTaskTimeIn . "', '" . $txtTaskNoteNoOp . "', '" . $txtTaskId . "', '" . $txtClientId . "', '" . $txtCarerEmail . "', '" . $txtTask . "', '" . $txtDosage . "', '" . $txtCarerName . "', '" . $mycheckNObox . "', '" . $txtcare_call3 . "', '" . $CurrentDayInName . "', '" . $txtTaskStatus . "', '" . $txtClientCareCallId . "', '" . $txtClientCompId . "' ) ");
                    if ($queryIns != 0) {
                        $myCheck_order = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4 = '$txtClientId' AND care_call3 = '$txtcare_call3' AND col_fifo != '' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ORDER BY med_Id DESC LIMIT 1");
                        $row_order = mysqli_fetch_array($myCheck_order);
                        $get_orderNumber = $row_order['col_fifo'];
                        $countRes_order = mysqli_num_rows($myCheck_order);
                        if ($countRes_order != 0) {
                            $txtCalcOrderNumber = $get_orderNumber + 1;
                            $sqlUpdate2 = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `med_colours` = '$med_colours', `visibility` = '$txtVisibility', `col_fifo` = '$txtCalcOrderNumber' WHERE client_med_Id = '$txtTaskId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ");
                            if ($sqlUpdate2) {
                                $myCheck_periodtwo = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
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
                                    $sql_update_periodonetime = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Month' WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')  ");
                                    if ($sql_update_periodonetime) {
                                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                    }
                                } else if ($get_periodtwo == 'Days') {
                                    $time = strtotime($get_occurence);
                                    $get_days_multi = '+ ' . $get_periodone . ' ' . $get_periodtwo;
                                    $final_Days = date("Y-m-d", strtotime($get_days_multi, $time));
                                    $sql_update_periodDays = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Days' WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    if ($sql_update_periodDays) {
                                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                    }
                                } else if ($get_periodtwo == 'Weeks') {
                                    $myCheck_periodtwo = mysqli_query($conn, "SELECT CONCAT(monday, tuesday, wednesday, thursday, friday, saturday, sunday) AS WHOLECOLUMN FROM tbl_clients_medication_records WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    $get_myCheck_periodtwo = mysqli_fetch_array($myCheck_periodtwo);
                                    $myCheck_periodtwo = $get_myCheck_periodtwo['WHOLECOLUMN'];

                                    $sql = mysqli_query($conn, "SELECT GROUP_CONCAT(care_call_days SEPARATOR '') AS WHOLEROW FROM tbl_finished_meds WHERE (`task_SpecialId` = '$txtTaskId' AND med_date = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    $row_sql = mysqli_fetch_array($sql);
                                    $myCheck_period = $row_sql['WHOLEROW'];
                                    if ($myCheck_periodtwo == $myCheck_period) {
                                        $time = strtotime($get_occurence);
                                        $get_Weeks_multi = '+' . $get_periodone . ' Week';
                                        $final_Weeks = date("Y-m-d", strtotime($get_Weeks_multi, $time));
                                        $sql_update_periodWeeks = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Weeks' WHERE (`client_med_Id` = '$txtTaskId' AND col_occurence = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        if ($sql_update_periodWeeks) {
                                            header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                        }
                                    } else {
                                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                    }
                                }
                            }
                            //header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                        } else {
                            $txtCalcOrderNumber = $get_orderNumber + 1;
                            $sqlUpdate_order = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `med_colours` = '$med_colours', `visibility` = '$txtVisibility', `col_fifo` = '$txtCalcOrderNumber' WHERE client_med_Id = '$txtTaskId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ");
                            if ($sqlUpdate_order) {
                                $myCheck_periodtwo = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
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
                                    $sql_update_periodonetime = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Month' WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')  ");
                                    if ($sql_update_periodonetime) {
                                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                    }
                                } else if ($get_periodtwo == 'Days') {
                                    $time = strtotime($get_occurence);
                                    $get_days_multi = '+ ' . $get_periodone . ' ' . $get_periodtwo;
                                    $final_Days = date("Y-m-d", strtotime($get_days_multi, $time));
                                    $sql_update_periodDays = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Days' WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    if ($sql_update_periodDays) {
                                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                    }
                                } else if ($get_periodtwo == 'Weeks') {
                                    $myCheck_periodtwo = mysqli_query($conn, "SELECT CONCAT(monday, tuesday, wednesday, thursday, friday, saturday, sunday) AS WHOLECOLUMN FROM tbl_clients_medication_records WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    $get_myCheck_periodtwo = mysqli_fetch_array($myCheck_periodtwo);
                                    $myCheck_periodtwo = $get_myCheck_periodtwo['WHOLECOLUMN'];

                                    $sql = mysqli_query($conn, "SELECT GROUP_CONCAT(care_call_days SEPARATOR '') AS WHOLEROW FROM tbl_finished_meds WHERE (`task_SpecialId` = '$txtTaskId' AND med_date = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    $row_sql = mysqli_fetch_array($sql);
                                    $myCheck_period = $row_sql['WHOLEROW'];
                                    if ($myCheck_periodtwo == $myCheck_period) {
                                        $time = strtotime($get_occurence);
                                        $get_Weeks_multi = '+' . $get_periodone . ' Week';
                                        $final_Weeks = date("Y-m-d", strtotime($get_Weeks_multi, $time));
                                        $sql_update_periodWeeks = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Weeks' WHERE (`client_med_Id` = '$txtTaskId' AND col_occurence = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        if ($sql_update_periodWeeks) {
                                            header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                        }
                                    } else {
                                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                    }
                                }
                            }
                            //header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                        }
                    }
                }
            } else if ($mycheckYesbox) {
                $queryIns2 = mysqli_query($conn, "INSERT INTO tbl_finished_meds (task_name, med_date, task_timeIn, task_note, task_SpecialId, uryyToeSS4, team_1email, category, col_dosage, col_carername, col_outcome, care_calls, care_call_days, col_task_status, col_care_call_Id, col_company_Id) 
                    VALUES('" . $txtTaskName . "', '" . $today . "', '" . $txtTaskTimeIn . "', '" . $txtTaskNoteYesOp . "', '" . $txtTaskId . "', '" . $txtClientId . "', '" . $txtCarerEmail . "', '" . $txtTask . "', '" . $txtDosage . "', '" . $txtCarerName . "', '" . $mycheckYesbox . "', '" . $txtcare_call3 . "', '" . $CurrentDayInName . "', '" . $txtTaskStatus . "', '" . $txtClientCareCallId . "', '" . $txtClientCompId . "' ) ");
                if ($queryIns2 != 0) {
                    $myCheck_order = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4 = '$txtClientId' AND care_call3 = '$txtcare_call3' AND col_fifo != '' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ORDER BY med_Id DESC LIMIT 1");
                    $row_order = mysqli_fetch_array($myCheck_order);
                    $get_orderNumber = $row_order['col_fifo'];
                    $countRes_order = mysqli_num_rows($myCheck_order);
                    if ($countRes_order != 0) {
                        $txtCalcOrderNumber = $get_orderNumber + 1;
                        $sqlUpdate2 = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `med_colours` = '$med_colours', `visibility` = '$txtVisibility', `col_fifo` = '$txtCalcOrderNumber' WHERE client_med_Id = '$txtTaskId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ");
                        if ($sqlUpdate2) {
                            $myCheck_periodtwo = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
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
                                $sql_update_periodonetime = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Month' WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')  ");
                                if ($sql_update_periodonetime) {
                                    header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                }
                            } else if ($get_periodtwo == 'Days') {
                                $time = strtotime($get_occurence);
                                $get_days_multi = '+ ' . $get_periodone . ' ' . $get_periodtwo;
                                $final_Days = date("Y-m-d", strtotime($get_days_multi, $time));
                                $sql_update_periodDays = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Days' WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                if ($sql_update_periodDays) {
                                    header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                }
                            } else if ($get_periodtwo == 'Weeks') {
                                $myCheck_periodtwo = mysqli_query($conn, "SELECT CONCAT(monday, tuesday, wednesday, thursday, friday, saturday, sunday) AS WHOLECOLUMN FROM tbl_clients_medication_records WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                $get_myCheck_periodtwo = mysqli_fetch_array($myCheck_periodtwo);
                                $myCheck_periodtwo = $get_myCheck_periodtwo['WHOLECOLUMN'];

                                $sql = mysqli_query($conn, "SELECT GROUP_CONCAT(care_call_days SEPARATOR '') AS WHOLEROW FROM tbl_finished_meds WHERE (`task_SpecialId` = '$txtTaskId' AND med_date = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                $row_sql = mysqli_fetch_array($sql);
                                $myCheck_period = $row_sql['WHOLEROW'];
                                if ($myCheck_periodtwo == $myCheck_period) {
                                    $time = strtotime($get_occurence);
                                    $get_Weeks_multi = '+' . $get_periodone . ' Week';
                                    $final_Weeks = date("Y-m-d", strtotime($get_Weeks_multi, $time));
                                    $sql_update_periodWeeks = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Weeks' WHERE (`client_med_Id` = '$txtTaskId' AND col_occurence = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    if ($sql_update_periodWeeks) {
                                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                    }
                                } else {
                                    header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                }
                            }
                        }
                        //header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                    } else {
                        $txtCalcOrderNumber = $get_orderNumber + 1;
                        $$sqlUpdate_order = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `med_colours` = '$med_colours', `visibility` = '$txtVisibility', `col_fifo` = '$txtCalcOrderNumber' WHERE client_med_Id = '$txtTaskId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ");
                        if ($sqlUpdate_order) {
                            $myCheck_periodtwo = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
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
                                $sql_update_periodonetime = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Month' WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')  ");
                                if ($sql_update_periodonetime) {
                                    header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                }
                            } else if ($get_periodtwo == 'Days') {
                                $time = strtotime($get_occurence);
                                $get_days_multi = '+ ' . $get_periodone . ' ' . $get_periodtwo;
                                $final_Days = date("Y-m-d", strtotime($get_days_multi, $time));
                                $sql_update_periodDays = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Days' WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                if ($sql_update_periodDays) {
                                    header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                }
                            } else if ($get_periodtwo == 'Weeks') {
                                $myCheck_periodtwo = mysqli_query($conn, "SELECT CONCAT(monday, tuesday, wednesday, thursday, friday, saturday, sunday) AS WHOLECOLUMN FROM tbl_clients_medication_records WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                $get_myCheck_periodtwo = mysqli_fetch_array($myCheck_periodtwo);
                                $myCheck_periodtwo = $get_myCheck_periodtwo['WHOLECOLUMN'];

                                $sql = mysqli_query($conn, "SELECT GROUP_CONCAT(care_call_days SEPARATOR '') AS WHOLEROW FROM tbl_finished_meds WHERE (`task_SpecialId` = '$txtTaskId' AND med_date = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                $row_sql = mysqli_fetch_array($sql);
                                $myCheck_period = $row_sql['WHOLEROW'];
                                if ($myCheck_periodtwo == $myCheck_period) {
                                    $time = strtotime($get_occurence);
                                    $get_Weeks_multi = '+' . $get_periodone . ' Week';
                                    $final_Weeks = date("Y-m-d", strtotime($get_Weeks_multi, $time));
                                    $sql_update_periodWeeks = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Weeks' WHERE (`client_med_Id` = '$txtTaskId' AND col_occurence = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    if ($sql_update_periodWeeks) {
                                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                    }
                                } else {
                                    header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                }
                            }
                        }
                        //header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                    }
                } else {
                    header("Location: ./go-back-history");
                }
            }
        }
    } else if ($txtCurerCall == 'Bed') {
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //Database query to update the client care call data for breakfast
        $myCheck = "SELECT * FROM tbl_finished_meds WHERE (task_SpecialId = '$txtTaskId' AND med_date = '$today' AND care_calls = '$txtcare_call4' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ";
        $myCheckres = mysqli_query($conn, $myCheck);
        $countRes = mysqli_num_rows($myCheckres);
        if ($countRes) {
            if ($mycheckNObox) {
                if ($txtTaskNoteNoOp == '') {
                    header("Location: ./reason-for-no-option?uryyToeSS4=$txtClientId");
                } else {
                    $sqlUpdate_finish_task = mysqli_query($conn, "UPDATE `tbl_finished_meds` SET `task_name` = '$txtTaskName', `med_date` = '$today', `task_timeIn` = '$txtTaskTimeIn', `task_note` = '$txtTaskNoteNoOp', `task_SpecialId` = '$txtTaskId', `uryyToeSS4` = '$txtClientId', `team_1email` = '$txtCarerEmail', `category` = '$txtTask', `col_dosage` = '$txtDosage', `col_carername` = '$txtCarerName', `col_outcome` = '$mycheckNObox', 
                `care_calls` = '$txtcare_call4', `care_call_days` = '$CurrentDayInName', `col_task_status` = '$txtTaskStatus', `col_care_call_Id` = '$txtClientCareCallId' WHERE (`task_SpecialId` = '$txtTaskId' AND `care_calls` = '$txtcare_call4' AND `med_date` = '$today' AND `col_company_Id` = '$txtClientCompId') ");
                    if ($sqlUpdate_finish_task) {
                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                    }
                }
            } else if ($mycheckYesbox) {
                $sqlUpdate_finish_task = mysqli_query($conn, "UPDATE `tbl_finished_meds` SET `task_name` = '$txtTaskName', `med_date` = '$today', `task_timeIn` = '$txtTaskTimeIn', `task_note` = '$txtTaskNoteYesOp', `task_SpecialId` = '$txtTaskId', `uryyToeSS4` = '$txtClientId', `team_1email` = '$txtCarerEmail', `category` = '$txtTask', `col_dosage` = '$txtDosage', `col_carername` = '$txtCarerName', `col_outcome` = '$mycheckYesbox', 
                `care_calls` = '$txtcare_call4', `care_call_days` = '$CurrentDayInName', `col_task_status` = '$txtTaskStatus', `col_care_call_Id` = '$txtClientCareCallId' WHERE (`task_SpecialId` = '$txtTaskId' AND `care_calls` = '$txtcare_call4' AND `med_date` = '$today' AND `col_company_Id` = '$txtClientCompId') ");
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
                    $queryIns = mysqli_query($conn, "INSERT INTO tbl_finished_meds (task_name, med_date, task_timeIn, task_note, task_SpecialId, uryyToeSS4, team_1email, category, col_dosage, col_carername, col_outcome, care_calls, care_call_days, col_task_status, col_care_call_Id, col_company_Id) 
                    VALUES('" . $txtTaskName . "', '" . $today . "', '" . $txtTaskTimeIn . "', '" . $txtTaskNoteNoOp . "', '" . $txtTaskId . "', '" . $txtClientId . "', '" . $txtCarerEmail . "', '" . $txtTask . "', '" . $txtDosage . "', '" . $txtCarerName . "', '" . $mycheckNObox . "', '" . $txtcare_call4 . "', '" . $CurrentDayInName . "', '" . $txtTaskStatus . "', '" . $txtClientCareCallId . "', '" . $txtClientCompId . "' ) ");
                    if ($queryIns != 0) {
                        $myCheck_order = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4 = '$txtClientId' AND care_call4 = '$txtcare_call4' AND col_fifo != '' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ORDER BY med_Id DESC LIMIT 1");
                        $row_order = mysqli_fetch_array($myCheck_order);
                        $get_orderNumber = $row_order['col_fifo'];
                        $countRes_order = mysqli_num_rows($myCheck_order);
                        if ($countRes_order != 0) {
                            $txtCalcOrderNumber = $get_orderNumber + 1;
                            $sqlUpdate2 = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `med_colours` = '$med_colours', `visibility` = '$txtVisibility', `col_fifo` = '$txtCalcOrderNumber' WHERE client_med_Id = '$txtTaskId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ");
                            if ($sqlUpdate2) {
                                $myCheck_periodtwo = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
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
                                    $sql_update_periodonetime = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Month' WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')  ");
                                    if ($sql_update_periodonetime) {
                                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                    }
                                } else if ($get_periodtwo == 'Days') {
                                    $time = strtotime($get_occurence);
                                    $get_days_multi = '+ ' . $get_periodone . ' ' . $get_periodtwo;
                                    $final_Days = date("Y-m-d", strtotime($get_days_multi, $time));
                                    $sql_update_periodDays = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Days' WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    if ($sql_update_periodDays) {
                                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                    }
                                } else if ($get_periodtwo == 'Weeks') {
                                    $myCheck_periodtwo = mysqli_query($conn, "SELECT CONCAT(monday, tuesday, wednesday, thursday, friday, saturday, sunday) AS WHOLECOLUMN FROM tbl_clients_medication_records WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    $get_myCheck_periodtwo = mysqli_fetch_array($myCheck_periodtwo);
                                    $myCheck_periodtwo = $get_myCheck_periodtwo['WHOLECOLUMN'];

                                    $sql = mysqli_query($conn, "SELECT GROUP_CONCAT(care_call_days SEPARATOR '') AS WHOLEROW FROM tbl_finished_meds WHERE (`task_SpecialId` = '$txtTaskId' AND med_date = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    $row_sql = mysqli_fetch_array($sql);
                                    $myCheck_period = $row_sql['WHOLEROW'];
                                    if ($myCheck_periodtwo == $myCheck_period) {
                                        $time = strtotime($get_occurence);
                                        $get_Weeks_multi = '+' . $get_periodone . ' Week';
                                        $final_Weeks = date("Y-m-d", strtotime($get_Weeks_multi, $time));
                                        $sql_update_periodWeeks = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Weeks' WHERE (`client_med_Id` = '$txtTaskId' AND col_occurence = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        if ($sql_update_periodWeeks) {
                                            header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                        }
                                    } else {
                                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                    }
                                }
                            }
                            //header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                        } else {
                            $txtCalcOrderNumber = $get_orderNumber + 1;
                            $sqlUpdate_order = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `med_colours` = '$med_colours', `visibility` = '$txtVisibility', `col_fifo` = '$txtCalcOrderNumber' WHERE client_med_Id = '$txtTaskId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ");
                            if ($sqlUpdate_order) {
                                $myCheck_periodtwo = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
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
                                    $sql_update_periodonetime = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Month' WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')  ");
                                    if ($sql_update_periodonetime) {
                                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                    }
                                } else if ($get_periodtwo == 'Days') {
                                    $time = strtotime($get_occurence);
                                    $get_days_multi = '+ ' . $get_periodone . ' ' . $get_periodtwo;
                                    $final_Days = date("Y-m-d", strtotime($get_days_multi, $time));
                                    $sql_update_periodDays = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Days' WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    if ($sql_update_periodDays) {
                                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                    }
                                } else if ($get_periodtwo == 'Weeks') {
                                    $myCheck_periodtwo = mysqli_query($conn, "SELECT CONCAT(monday, tuesday, wednesday, thursday, friday, saturday, sunday) AS WHOLECOLUMN FROM tbl_clients_medication_records WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    $get_myCheck_periodtwo = mysqli_fetch_array($myCheck_periodtwo);
                                    $myCheck_periodtwo = $get_myCheck_periodtwo['WHOLECOLUMN'];

                                    $sql = mysqli_query($conn, "SELECT GROUP_CONCAT(care_call_days SEPARATOR '') AS WHOLEROW FROM tbl_finished_meds WHERE (`task_SpecialId` = '$txtTaskId' AND med_date = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    $row_sql = mysqli_fetch_array($sql);
                                    $myCheck_period = $row_sql['WHOLEROW'];
                                    if ($myCheck_periodtwo == $myCheck_period) {
                                        $time = strtotime($get_occurence);
                                        $get_Weeks_multi = '+' . $get_periodone . ' Week';
                                        $final_Weeks = date("Y-m-d", strtotime($get_Weeks_multi, $time));
                                        $sql_update_periodWeeks = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Weeks' WHERE (`client_med_Id` = '$txtTaskId' AND col_occurence = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        if ($sql_update_periodWeeks) {
                                            header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                        }
                                    } else {
                                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                    }
                                }
                            }
                            //header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                        }
                    }
                }
            } else if ($mycheckYesbox) {
                $queryIns2 = mysqli_query($conn, "INSERT INTO tbl_finished_meds (task_name, med_date, task_timeIn, task_note, task_SpecialId, uryyToeSS4, team_1email, category, col_dosage, col_carername, col_outcome, care_calls, care_call_days, col_task_status, col_care_call_Id, col_company_Id) 
                    VALUES('" . $txtTaskName . "', '" . $today . "', '" . $txtTaskTimeIn . "', '" . $txtTaskNoteYesOp . "', '" . $txtTaskId . "', '" . $txtClientId . "', '" . $txtCarerEmail . "', '" . $txtTask . "', '" . $txtDosage . "', '" . $txtCarerName . "', '" . $mycheckYesbox . "', '" . $txtcare_call4 . "', '" . $CurrentDayInName . "', '" . $txtTaskStatus . "', '" . $txtClientCareCallId . "', '" . $txtClientCompId . "' ) ");
                if ($queryIns2 != 0) {
                    $myCheck_order = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4 = '$txtClientId' AND care_call4 = '$txtcare_call4' AND col_fifo != '' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ORDER BY med_Id DESC LIMIT 1");
                    $row_order = mysqli_fetch_array($myCheck_order);
                    $get_orderNumber = $row_order['col_fifo'];
                    $countRes_order = mysqli_num_rows($myCheck_order);
                    if ($countRes_order != 0) {
                        $txtCalcOrderNumber = $get_orderNumber + 1;
                        $sqlUpdate2 = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `med_colours` = '$med_colours', `visibility` = '$txtVisibility', `col_fifo` = '$txtCalcOrderNumber' WHERE client_med_Id = '$txtTaskId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ");
                        if ($sqlUpdate2) {
                            $myCheck_periodtwo = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
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
                                $sql_update_periodonetime = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Month' WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')  ");
                                if ($sql_update_periodonetime) {
                                    header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                }
                            } else if ($get_periodtwo == 'Days') {
                                $time = strtotime($get_occurence);
                                $get_days_multi = '+ ' . $get_periodone . ' ' . $get_periodtwo;
                                $final_Days = date("Y-m-d", strtotime($get_days_multi, $time));
                                $sql_update_periodDays = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Days' WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                if ($sql_update_periodDays) {
                                    header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                }
                            } else if ($get_periodtwo == 'Weeks') {
                                $myCheck_periodtwo = mysqli_query($conn, "SELECT CONCAT(monday, tuesday, wednesday, thursday, friday, saturday, sunday) AS WHOLECOLUMN FROM tbl_clients_medication_records WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                $get_myCheck_periodtwo = mysqli_fetch_array($myCheck_periodtwo);
                                $myCheck_periodtwo = $get_myCheck_periodtwo['WHOLECOLUMN'];

                                $sql = mysqli_query($conn, "SELECT GROUP_CONCAT(care_call_days SEPARATOR '') AS WHOLEROW FROM tbl_finished_meds WHERE (`task_SpecialId` = '$txtTaskId' AND med_date = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                $row_sql = mysqli_fetch_array($sql);
                                $myCheck_period = $row_sql['WHOLEROW'];
                                if ($myCheck_periodtwo == $myCheck_period) {
                                    $time = strtotime($get_occurence);
                                    $get_Weeks_multi = '+' . $get_periodone . ' Week';
                                    $final_Weeks = date("Y-m-d", strtotime($get_Weeks_multi, $time));
                                    $sql_update_periodWeeks = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Weeks' WHERE (`client_med_Id` = '$txtTaskId' AND col_occurence = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    if ($sql_update_periodWeeks) {
                                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                    }
                                } else {
                                    header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                }
                            }
                        }
                        //header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                    } else {
                        $txtCalcOrderNumber = $get_orderNumber + 1;
                        $sqlUpdate_order = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `med_colours` = '$med_colours', `visibility` = '$txtVisibility', `col_fifo` = '$txtCalcOrderNumber' WHERE client_med_Id = '$txtTaskId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ");
                        if ($sqlUpdate_order) {
                            $myCheck_periodtwo = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
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
                                $sql_update_periodonetime = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Month' WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')  ");
                                if ($sql_update_periodonetime) {
                                    header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                }
                            } else if ($get_periodtwo == 'Days') {
                                $time = strtotime($get_occurence);
                                $get_days_multi = '+ ' . $get_periodone . ' ' . $get_periodtwo;
                                $final_Days = date("Y-m-d", strtotime($get_days_multi, $time));
                                $sql_update_periodDays = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Days' WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                if ($sql_update_periodDays) {
                                    header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                }
                            } else if ($get_periodtwo == 'Weeks') {
                                $myCheck_periodtwo = mysqli_query($conn, "SELECT CONCAT(monday, tuesday, wednesday, thursday, friday, saturday, sunday) AS WHOLECOLUMN FROM tbl_clients_medication_records WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                $get_myCheck_periodtwo = mysqli_fetch_array($myCheck_periodtwo);
                                $myCheck_periodtwo = $get_myCheck_periodtwo['WHOLECOLUMN'];

                                $sql = mysqli_query($conn, "SELECT GROUP_CONCAT(care_call_days SEPARATOR '') AS WHOLEROW FROM tbl_finished_meds WHERE (`task_SpecialId` = '$txtTaskId' AND med_date = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                $row_sql = mysqli_fetch_array($sql);
                                $myCheck_period = $row_sql['WHOLEROW'];
                                if ($myCheck_periodtwo == $myCheck_period) {
                                    $time = strtotime($get_occurence);
                                    $get_Weeks_multi = '+' . $get_periodone . ' Week';
                                    $final_Weeks = date("Y-m-d", strtotime($get_Weeks_multi, $time));
                                    $sql_update_periodWeeks = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Weeks' WHERE (`client_med_Id` = '$txtTaskId' AND col_occurence = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    if ($sql_update_periodWeeks) {
                                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                    }
                                } else {
                                    header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                }
                            }
                        }
                        //header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                    }
                }
            } else {
                header("Location: ./go-back-history");
            }
        }
    } else if ($txtCurerCall == 'Extra morning call') {
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //Database query to update the client care call data for breakfast
        $myCheck = "SELECT * FROM tbl_finished_meds WHERE (task_SpecialId = '$txtTaskId' AND med_date = '$today' AND care_calls = '$txtcare_call5' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ";
        $myCheckres = mysqli_query($conn, $myCheck);
        $countRes = mysqli_num_rows($myCheckres);
        if ($countRes) {
            if ($mycheckNObox) {
                if ($txtTaskNoteNoOp == '') {
                    header("Location: ./reason-for-no-option?uryyToeSS4=$txtClientId");
                } else {
                    $sqlUpdate_finish_task = mysqli_query($conn, "UPDATE `tbl_finished_meds` SET `task_name` = '$txtTaskName', `med_date` = '$today', `task_timeIn` = '$txtTaskTimeIn', `task_note` = '$txtTaskNoteNoOp', `task_SpecialId` = '$txtTaskId', `uryyToeSS4` = '$txtClientId', `team_1email` = '$txtCarerEmail', `category` = '$txtTask', `col_dosage` = '$txtDosage', `col_carername` = '$txtCarerName', `col_outcome` = '$mycheckNObox', 
                `care_calls` = '$txtcare_call5', `care_call_days` = '$CurrentDayInName', `col_task_status` = '$txtTaskStatus', `col_care_call_Id` = '$txtClientCareCallId' WHERE (`task_SpecialId` = '$txtTaskId' AND `care_calls` = '$txtcare_call4' AND `med_date` = '$today' AND `col_company_Id` = '$txtClientCompId') ");
                    if ($sqlUpdate_finish_task) {
                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                    }
                }
            } else if ($mycheckYesbox) {
                $sqlUpdate_finish_task = mysqli_query($conn, "UPDATE `tbl_finished_meds` SET `task_name` = '$txtTaskName', `med_date` = '$today', `task_timeIn` = '$txtTaskTimeIn', `task_note` = '$txtTaskNoteYesOp', `task_SpecialId` = '$txtTaskId', `uryyToeSS4` = '$txtClientId', `team_1email` = '$txtCarerEmail', `category` = '$txtTask', `col_dosage` = '$txtDosage', `col_carername` = '$txtCarerName', `col_outcome` = '$mycheckYesbox', 
                `care_calls` = '$txtcare_call5', `care_call_days` = '$CurrentDayInName', `col_task_status` = '$txtTaskStatus', `col_care_call_Id` = '$txtClientCareCallId' WHERE (`task_SpecialId` = '$txtTaskId' AND `care_calls` = '$txtcare_call4' AND `med_date` = '$today' AND `col_company_Id` = '$txtClientCompId') ");
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
                    $queryIns = mysqli_query($conn, "INSERT INTO tbl_finished_meds (task_name, med_date, task_timeIn, task_note, task_SpecialId, uryyToeSS4, team_1email, category, col_dosage, col_carername, col_outcome, care_calls, care_call_days, col_task_status, col_care_call_Id, col_company_Id) 
                    VALUES('" . $txtTaskName . "', '" . $today . "', '" . $txtTaskTimeIn . "', '" . $txtTaskNoteNoOp . "', '" . $txtTaskId . "', '" . $txtClientId . "', '" . $txtCarerEmail . "', '" . $txtTask . "', '" . $txtDosage . "', '" . $txtCarerName . "', '" . $mycheckNObox . "', '" . $txtcare_call5 . "', '" . $CurrentDayInName . "', '" . $txtTaskStatus . "', '" . $txtClientCareCallId . "', '" . $txtClientCompId . "' ) ");
                    if ($queryIns != 0) {
                        $myCheck_order = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4 = '$txtClientId' AND extra_call1 = '$txtcare_call5' AND col_fifo != '' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ORDER BY med_Id DESC LIMIT 1");
                        $row_order = mysqli_fetch_array($myCheck_order);
                        $get_orderNumber = $row_order['col_fifo'];
                        $countRes_order = mysqli_num_rows($myCheck_order);
                        if ($countRes_order != 0) {
                            $txtCalcOrderNumber = $get_orderNumber + 1;
                            $sqlUpdate2 = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `med_colours` = '$med_colours', `visibility` = '$txtVisibility', `col_fifo` = '$txtCalcOrderNumber' WHERE client_med_Id = '$txtTaskId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ");
                            if ($sqlUpdate2) {
                                $myCheck_periodtwo = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
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
                                    $sql_update_periodonetime = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Month' WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')  ");
                                    if ($sql_update_periodonetime) {
                                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                    }
                                } else if ($get_periodtwo == 'Days') {
                                    $time = strtotime($get_occurence);
                                    $get_days_multi = '+ ' . $get_periodone . ' ' . $get_periodtwo;
                                    $final_Days = date("Y-m-d", strtotime($get_days_multi, $time));
                                    $sql_update_periodDays = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Days' WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    if ($sql_update_periodDays) {
                                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                    }
                                } else if ($get_periodtwo == 'Weeks') {
                                    $myCheck_periodtwo = mysqli_query($conn, "SELECT CONCAT(monday, tuesday, wednesday, thursday, friday, saturday, sunday) AS WHOLECOLUMN FROM tbl_clients_medication_records WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    $get_myCheck_periodtwo = mysqli_fetch_array($myCheck_periodtwo);
                                    $myCheck_periodtwo = $get_myCheck_periodtwo['WHOLECOLUMN'];

                                    $sql = mysqli_query($conn, "SELECT GROUP_CONCAT(care_call_days SEPARATOR '') AS WHOLEROW FROM tbl_finished_meds WHERE (`task_SpecialId` = '$txtTaskId' AND med_date = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    $row_sql = mysqli_fetch_array($sql);
                                    $myCheck_period = $row_sql['WHOLEROW'];
                                    if ($myCheck_periodtwo == $myCheck_period) {
                                        $time = strtotime($get_occurence);
                                        $get_Weeks_multi = '+' . $get_periodone . ' Week';
                                        $final_Weeks = date("Y-m-d", strtotime($get_Weeks_multi, $time));
                                        $sql_update_periodWeeks = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Weeks' WHERE (`client_med_Id` = '$txtTaskId' AND col_occurence = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        if ($sql_update_periodWeeks) {
                                            header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                        }
                                    } else {
                                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                    }
                                }
                            }
                            //header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                        } else {
                            $txtCalcOrderNumber = $get_orderNumber + 1;
                            $sqlUpdate_order = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `med_colours` = '$med_colours', `visibility` = '$txtVisibility', `col_fifo` = '$txtCalcOrderNumber' WHERE client_med_Id = '$txtTaskId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ");
                            if ($sqlUpdate_order) {
                                $myCheck_periodtwo = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
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
                                    $sql_update_periodonetime = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Month' WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')  ");
                                    if ($sql_update_periodonetime) {
                                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                    }
                                } else if ($get_periodtwo == 'Days') {
                                    $time = strtotime($get_occurence);
                                    $get_days_multi = '+ ' . $get_periodone . ' ' . $get_periodtwo;
                                    $final_Days = date("Y-m-d", strtotime($get_days_multi, $time));
                                    $sql_update_periodDays = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Days' WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    if ($sql_update_periodDays) {
                                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                    }
                                } else if ($get_periodtwo == 'Weeks') {
                                    $myCheck_periodtwo = mysqli_query($conn, "SELECT CONCAT(monday, tuesday, wednesday, thursday, friday, saturday, sunday) AS WHOLECOLUMN FROM tbl_clients_medication_records WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    $get_myCheck_periodtwo = mysqli_fetch_array($myCheck_periodtwo);
                                    $myCheck_periodtwo = $get_myCheck_periodtwo['WHOLECOLUMN'];

                                    $sql = mysqli_query($conn, "SELECT GROUP_CONCAT(care_call_days SEPARATOR '') AS WHOLEROW FROM tbl_finished_meds WHERE (`task_SpecialId` = '$txtTaskId' AND med_date = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    $row_sql = mysqli_fetch_array($sql);
                                    $myCheck_period = $row_sql['WHOLEROW'];
                                    if ($myCheck_periodtwo == $myCheck_period) {
                                        $time = strtotime($get_occurence);
                                        $get_Weeks_multi = '+' . $get_periodone . ' Week';
                                        $final_Weeks = date("Y-m-d", strtotime($get_Weeks_multi, $time));
                                        $sql_update_periodWeeks = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Weeks' WHERE (`client_med_Id` = '$txtTaskId' AND col_occurence = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        if ($sql_update_periodWeeks) {
                                            header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                        }
                                    } else {
                                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                    }
                                }
                            }
                            //header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                        }
                    }
                }
            } else if ($mycheckYesbox) {
                $queryIns2 = mysqli_query($conn, "INSERT INTO tbl_finished_meds (task_name, med_date, task_timeIn, task_note, task_SpecialId, uryyToeSS4, team_1email, category, col_dosage, col_carername, col_outcome, care_calls, care_call_days, col_task_status, col_care_call_Id, col_company_Id) 
                    VALUES('" . $txtTaskName . "', '" . $today . "', '" . $txtTaskTimeIn . "', '" . $txtTaskNoteYesOp . "', '" . $txtTaskId . "', '" . $txtClientId . "', '" . $txtCarerEmail . "', '" . $txtTask . "', '" . $txtDosage . "', '" . $txtCarerName . "', '" . $mycheckYesbox . "', '" . $txtcare_call5 . "', '" . $CurrentDayInName . "', '" . $txtTaskStatus . "', '" . $txtClientCareCallId . "', '" . $txtClientCompId . "' ) ");
                if ($queryIns2 != 0) {
                    $myCheck_order = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4 = '$txtClientId' AND extra_call1 = '$txtcare_call5' AND col_fifo != '' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ORDER BY med_Id DESC LIMIT 1");
                    $row_order = mysqli_fetch_array($myCheck_order);
                    $get_orderNumber = $row_order['col_fifo'];
                    $countRes_order = mysqli_num_rows($myCheck_order);
                    if ($countRes_order != 0) {
                        $txtCalcOrderNumber = $get_orderNumber + 1;
                        $sqlUpdate2 = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `med_colours` = '$med_colours', `visibility` = '$txtVisibility', `col_fifo` = '$txtCalcOrderNumber' WHERE client_med_Id = '$txtTaskId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ");
                        if ($sqlUpdate2) {
                            $myCheck_periodtwo = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
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
                                $sql_update_periodonetime = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Month' WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')  ");
                                if ($sql_update_periodonetime) {
                                    header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                }
                            } else if ($get_periodtwo == 'Days') {
                                $time = strtotime($get_occurence);
                                $get_days_multi = '+ ' . $get_periodone . ' ' . $get_periodtwo;
                                $final_Days = date("Y-m-d", strtotime($get_days_multi, $time));
                                $sql_update_periodDays = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Days' WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                if ($sql_update_periodDays) {
                                    header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                }
                            } else if ($get_periodtwo == 'Weeks') {
                                $myCheck_periodtwo = mysqli_query($conn, "SELECT CONCAT(monday, tuesday, wednesday, thursday, friday, saturday, sunday) AS WHOLECOLUMN FROM tbl_clients_medication_records WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                $get_myCheck_periodtwo = mysqli_fetch_array($myCheck_periodtwo);
                                $myCheck_periodtwo = $get_myCheck_periodtwo['WHOLECOLUMN'];

                                $sql = mysqli_query($conn, "SELECT GROUP_CONCAT(care_call_days SEPARATOR '') AS WHOLEROW FROM tbl_finished_meds WHERE (`task_SpecialId` = '$txtTaskId' AND med_date = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                $row_sql = mysqli_fetch_array($sql);
                                $myCheck_period = $row_sql['WHOLEROW'];
                                if ($myCheck_periodtwo == $myCheck_period) {
                                    $time = strtotime($get_occurence);
                                    $get_Weeks_multi = '+' . $get_periodone . ' Week';
                                    $final_Weeks = date("Y-m-d", strtotime($get_Weeks_multi, $time));
                                    $sql_update_periodWeeks = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Weeks' WHERE (`client_med_Id` = '$txtTaskId' AND col_occurence = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    if ($sql_update_periodWeeks) {
                                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                    }
                                } else {
                                    header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                }
                            }
                        }
                        //header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                    } else {
                        $txtCalcOrderNumber = $get_orderNumber + 1;
                        $sqlUpdate_order = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `med_colours` = '$med_colours', `visibility` = '$txtVisibility', `col_fifo` = '$txtCalcOrderNumber' WHERE client_med_Id = '$txtTaskId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ");
                        if ($sqlUpdate_order) {
                            $myCheck_periodtwo = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
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
                                $sql_update_periodonetime = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Month' WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')  ");
                                if ($sql_update_periodonetime) {
                                    header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                }
                            } else if ($get_periodtwo == 'Days') {
                                $time = strtotime($get_occurence);
                                $get_days_multi = '+ ' . $get_periodone . ' ' . $get_periodtwo;
                                $final_Days = date("Y-m-d", strtotime($get_days_multi, $time));
                                $sql_update_periodDays = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Days' WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                if ($sql_update_periodDays) {
                                    header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                }
                            } else if ($get_periodtwo == 'Weeks') {
                                $myCheck_periodtwo = mysqli_query($conn, "SELECT CONCAT(monday, tuesday, wednesday, thursday, friday, saturday, sunday) AS WHOLECOLUMN FROM tbl_clients_medication_records WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                $get_myCheck_periodtwo = mysqli_fetch_array($myCheck_periodtwo);
                                $myCheck_periodtwo = $get_myCheck_periodtwo['WHOLECOLUMN'];

                                $sql = mysqli_query($conn, "SELECT GROUP_CONCAT(care_call_days SEPARATOR '') AS WHOLEROW FROM tbl_finished_meds WHERE (`task_SpecialId` = '$txtTaskId' AND med_date = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                $row_sql = mysqli_fetch_array($sql);
                                $myCheck_period = $row_sql['WHOLEROW'];
                                if ($myCheck_periodtwo == $myCheck_period) {
                                    $time = strtotime($get_occurence);
                                    $get_Weeks_multi = '+' . $get_periodone . ' Week';
                                    $final_Weeks = date("Y-m-d", strtotime($get_Weeks_multi, $time));
                                    $sql_update_periodWeeks = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Weeks' WHERE (`client_med_Id` = '$txtTaskId' AND col_occurence = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    if ($sql_update_periodWeeks) {
                                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                    }
                                } else {
                                    header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                }
                            }
                        }
                        //header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                    }
                }
            } else {
                header("Location: ./go-back-history");
            }
        }
    } else if ($txtCurerCall == 'Extra lunch call') {
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //Database query to update the client care call data for breakfast
        $myCheck = "SELECT * FROM tbl_finished_meds WHERE (task_SpecialId = '$txtTaskId' AND med_date = '$today' AND care_calls = '$txtcare_call6' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ";
        $myCheckres = mysqli_query($conn, $myCheck);
        $countRes = mysqli_num_rows($myCheckres);
        if ($countRes) {
            if ($mycheckNObox) {
                if ($txtTaskNoteNoOp == '') {
                    header("Location: ./reason-for-no-option?uryyToeSS4=$txtClientId");
                } else {
                    $sqlUpdate_finish_task = mysqli_query($conn, "UPDATE `tbl_finished_meds` SET `task_name` = '$txtTaskName', `med_date` = '$today', `task_timeIn` = '$txtTaskTimeIn', `task_note` = '$txtTaskNoteNoOp', `task_SpecialId` = '$txtTaskId', `uryyToeSS4` = '$txtClientId', `team_1email` = '$txtCarerEmail', `category` = '$txtTask', `col_dosage` = '$txtDosage', `col_carername` = '$txtCarerName', `col_outcome` = '$mycheckNObox', 
                `care_calls` = '$txtcare_call6', `care_call_days` = '$CurrentDayInName', `col_task_status` = '$txtTaskStatus', `col_care_call_Id` = '$txtClientCareCallId' WHERE (`task_SpecialId` = '$txtTaskId' AND `care_calls` = '$txtcare_call4' AND `med_date` = '$today' AND `col_company_Id` = '$txtClientCompId') ");
                    if ($sqlUpdate_finish_task) {
                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                    }
                }
            } else if ($mycheckYesbox) {
                $sqlUpdate_finish_task = mysqli_query($conn, "UPDATE `tbl_finished_meds` SET `task_name` = '$txtTaskName', `med_date` = '$today', `task_timeIn` = '$txtTaskTimeIn', `task_note` = '$txtTaskNoteYesOp', `task_SpecialId` = '$txtTaskId', `uryyToeSS4` = '$txtClientId', `team_1email` = '$txtCarerEmail', `category` = '$txtTask', `col_dosage` = '$txtDosage', `col_carername` = '$txtCarerName', `col_outcome` = '$mycheckYesbox', 
                `care_calls` = '$txtcare_call6', `care_call_days` = '$CurrentDayInName', `col_task_status` = '$txtTaskStatus', `col_care_call_Id` = '$txtClientCareCallId' WHERE (`task_SpecialId` = '$txtTaskId' AND `care_calls` = '$txtcare_call4' AND `med_date` = '$today' AND `col_company_Id` = '$txtClientCompId') ");
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
                    $queryIns = mysqli_query($conn, "INSERT INTO tbl_finished_meds (task_name, med_date, task_timeIn, task_note, task_SpecialId, uryyToeSS4, team_1email, category, col_dosage, col_carername, col_outcome, care_calls, care_call_days, col_task_status, col_care_call_Id, col_company_Id) 
                    VALUES('" . $txtTaskName . "', '" . $today . "', '" . $txtTaskTimeIn . "', '" . $txtTaskNoteNoOp . "', '" . $txtTaskId . "', '" . $txtClientId . "', '" . $txtCarerEmail . "', '" . $txtTask . "', '" . $txtDosage . "', '" . $txtCarerName . "', '" . $mycheckNObox . "', '" . $txtcare_call6 . "', '" . $CurrentDayInName . "', '" . $txtTaskStatus . "', '" . $txtClientCareCallId . "', '" . $txtClientCompId . "' ) ");
                    if ($queryIns != 0) {
                        $myCheck_order = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4 = '$txtClientId' AND extra_call2 = '$txtcare_call6' AND col_fifo != '' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ORDER BY med_Id DESC LIMIT 1");
                        $row_order = mysqli_fetch_array($myCheck_order);
                        $get_orderNumber = $row_order['col_fifo'];
                        $countRes_order = mysqli_num_rows($myCheck_order);
                        if ($countRes_order != 0) {
                            $txtCalcOrderNumber = $get_orderNumber + 1;
                            $sqlUpdate2 = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `med_colours` = '$med_colours', `visibility` = '$txtVisibility', `col_fifo` = '$txtCalcOrderNumber' WHERE client_med_Id = '$txtTaskId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ");
                            if ($sqlUpdate2) {
                                $myCheck_periodtwo = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
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
                                    $sql_update_periodonetime = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Month' WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')  ");
                                    if ($sql_update_periodonetime) {
                                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                    }
                                } else if ($get_periodtwo == 'Days') {
                                    $time = strtotime($get_occurence);
                                    $get_days_multi = '+ ' . $get_periodone . ' ' . $get_periodtwo;
                                    $final_Days = date("Y-m-d", strtotime($get_days_multi, $time));
                                    $sql_update_periodDays = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Days' WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    if ($sql_update_periodDays) {
                                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                    }
                                } else if ($get_periodtwo == 'Weeks') {
                                    $myCheck_periodtwo = mysqli_query($conn, "SELECT CONCAT(monday, tuesday, wednesday, thursday, friday, saturday, sunday) AS WHOLECOLUMN FROM tbl_clients_medication_records WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    $get_myCheck_periodtwo = mysqli_fetch_array($myCheck_periodtwo);
                                    $myCheck_periodtwo = $get_myCheck_periodtwo['WHOLECOLUMN'];

                                    $sql = mysqli_query($conn, "SELECT GROUP_CONCAT(care_call_days SEPARATOR '') AS WHOLEROW FROM tbl_finished_meds WHERE (`task_SpecialId` = '$txtTaskId' AND med_date = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    $row_sql = mysqli_fetch_array($sql);
                                    $myCheck_period = $row_sql['WHOLEROW'];
                                    if ($myCheck_periodtwo == $myCheck_period) {
                                        $time = strtotime($get_occurence);
                                        $get_Weeks_multi = '+' . $get_periodone . ' Week';
                                        $final_Weeks = date("Y-m-d", strtotime($get_Weeks_multi, $time));
                                        $sql_update_periodWeeks = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Weeks' WHERE (`client_med_Id` = '$txtTaskId' AND col_occurence = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        if ($sql_update_periodWeeks) {
                                            header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                        }
                                    } else {
                                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                    }
                                }
                            }
                            //header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                        } else {
                            $txtCalcOrderNumber = $get_orderNumber + 1;
                            $sqlUpdate_order = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `med_colours` = '$med_colours', `visibility` = '$txtVisibility', `col_fifo` = '$txtCalcOrderNumber' WHERE client_med_Id = '$txtTaskId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ");
                            if ($sqlUpdate_order) {
                                $myCheck_periodtwo = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
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
                                    $sql_update_periodonetime = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Month' WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')  ");
                                    if ($sql_update_periodonetime) {
                                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                    }
                                } else if ($get_periodtwo == 'Days') {
                                    $time = strtotime($get_occurence);
                                    $get_days_multi = '+ ' . $get_periodone . ' ' . $get_periodtwo;
                                    $final_Days = date("Y-m-d", strtotime($get_days_multi, $time));
                                    $sql_update_periodDays = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Days' WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    if ($sql_update_periodDays) {
                                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                    }
                                } else if ($get_periodtwo == 'Weeks') {
                                    $myCheck_periodtwo = mysqli_query($conn, "SELECT CONCAT(monday, tuesday, wednesday, thursday, friday, saturday, sunday) AS WHOLECOLUMN FROM tbl_clients_medication_records WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    $get_myCheck_periodtwo = mysqli_fetch_array($myCheck_periodtwo);
                                    $myCheck_periodtwo = $get_myCheck_periodtwo['WHOLECOLUMN'];

                                    $sql = mysqli_query($conn, "SELECT GROUP_CONCAT(care_call_days SEPARATOR '') AS WHOLEROW FROM tbl_finished_meds WHERE (`task_SpecialId` = '$txtTaskId' AND med_date = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    $row_sql = mysqli_fetch_array($sql);
                                    $myCheck_period = $row_sql['WHOLEROW'];
                                    if ($myCheck_periodtwo == $myCheck_period) {
                                        $time = strtotime($get_occurence);
                                        $get_Weeks_multi = '+' . $get_periodone . ' Week';
                                        $final_Weeks = date("Y-m-d", strtotime($get_Weeks_multi, $time));
                                        $sql_update_periodWeeks = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Weeks' WHERE (`client_med_Id` = '$txtTaskId' AND col_occurence = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        if ($sql_update_periodWeeks) {
                                            header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                        }
                                    } else {
                                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                    }
                                }
                            }
                            //header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                        }
                    }
                }
            } else if ($mycheckYesbox) {
                $queryIns2 = mysqli_query($conn, "INSERT INTO tbl_finished_meds (task_name, med_date, task_timeIn, task_note, task_SpecialId, uryyToeSS4, team_1email, category, col_dosage, col_carername, col_outcome, care_calls, care_call_days, col_task_status, col_care_call_Id, col_company_Id) 
                    VALUES('" . $txtTaskName . "', '" . $today . "', '" . $txtTaskTimeIn . "', '" . $txtTaskNoteYesOp . "', '" . $txtTaskId . "', '" . $txtClientId . "', '" . $txtCarerEmail . "', '" . $txtTask . "', '" . $txtDosage . "', '" . $txtCarerName . "', '" . $mycheckYesbox . "', '" . $txtcare_call6 . "', '" . $CurrentDayInName . "', '" . $txtTaskStatus . "', '" . $txtClientCareCallId . "', '" . $txtClientCompId . "' ) ");
                if ($queryIns != 0) {
                    $myCheck_order = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4 = '$txtClientId' AND extra_call2 = '$txtcare_call6' AND col_fifo != '' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ORDER BY med_Id DESC LIMIT 1");
                    $row_order = mysqli_fetch_array($myCheck_order);
                    $get_orderNumber = $row_order['col_fifo'];
                    $countRes_order = mysqli_num_rows($myCheck_order);
                    if ($countRes_order != 0) {
                        $txtCalcOrderNumber = $get_orderNumber + 1;
                        $sqlUpdate2 = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `med_colours` = '$med_colours', `visibility` = '$txtVisibility', `col_fifo` = '$txtCalcOrderNumber' WHERE client_med_Id = '$txtTaskId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ");
                        if ($sqlUpdate2) {
                            $myCheck_periodtwo = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
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
                                $sql_update_periodonetime = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Month' WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')  ");
                                if ($sql_update_periodonetime) {
                                    header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                }
                            } else if ($get_periodtwo == 'Days') {
                                $time = strtotime($get_occurence);
                                $get_days_multi = '+ ' . $get_periodone . ' ' . $get_periodtwo;
                                $final_Days = date("Y-m-d", strtotime($get_days_multi, $time));
                                $sql_update_periodDays = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Days' WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                if ($sql_update_periodDays) {
                                    header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                }
                            } else if ($get_periodtwo == 'Weeks') {
                                $myCheck_periodtwo = mysqli_query($conn, "SELECT CONCAT(monday, tuesday, wednesday, thursday, friday, saturday, sunday) AS WHOLECOLUMN FROM tbl_clients_medication_records WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                $get_myCheck_periodtwo = mysqli_fetch_array($myCheck_periodtwo);
                                $myCheck_periodtwo = $get_myCheck_periodtwo['WHOLECOLUMN'];

                                $sql = mysqli_query($conn, "SELECT GROUP_CONCAT(care_call_days SEPARATOR '') AS WHOLEROW FROM tbl_finished_meds WHERE (`task_SpecialId` = '$txtTaskId' AND med_date = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                $row_sql = mysqli_fetch_array($sql);
                                $myCheck_period = $row_sql['WHOLEROW'];
                                if ($myCheck_periodtwo == $myCheck_period) {
                                    $time = strtotime($get_occurence);
                                    $get_Weeks_multi = '+' . $get_periodone . ' Week';
                                    $final_Weeks = date("Y-m-d", strtotime($get_Weeks_multi, $time));
                                    $sql_update_periodWeeks = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Weeks' WHERE (`client_med_Id` = '$txtTaskId' AND col_occurence = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    if ($sql_update_periodWeeks) {
                                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                    }
                                } else {
                                    header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                }
                            }
                        }
                        //header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                    } else {
                        $txtCalcOrderNumber = $get_orderNumber + 1;
                        $sqlUpdate_order = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `med_colours` = '$med_colours', `visibility` = '$txtVisibility', `col_fifo` = '$txtCalcOrderNumber' WHERE client_med_Id = '$txtTaskId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ");
                        if ($sqlUpdate_order) {
                            $myCheck_periodtwo = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
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
                                $sql_update_periodonetime = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Month' WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')  ");
                                if ($sql_update_periodonetime) {
                                    header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                }
                            } else if ($get_periodtwo == 'Days') {
                                $time = strtotime($get_occurence);
                                $get_days_multi = '+ ' . $get_periodone . ' ' . $get_periodtwo;
                                $final_Days = date("Y-m-d", strtotime($get_days_multi, $time));
                                $sql_update_periodDays = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Days' WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                if ($sql_update_periodDays) {
                                    header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                }
                            } else if ($get_periodtwo == 'Weeks') {
                                $myCheck_periodtwo = mysqli_query($conn, "SELECT CONCAT(monday, tuesday, wednesday, thursday, friday, saturday, sunday) AS WHOLECOLUMN FROM tbl_clients_medication_records WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                $get_myCheck_periodtwo = mysqli_fetch_array($myCheck_periodtwo);
                                $myCheck_periodtwo = $get_myCheck_periodtwo['WHOLECOLUMN'];

                                $sql = mysqli_query($conn, "SELECT GROUP_CONCAT(care_call_days SEPARATOR '') AS WHOLEROW FROM tbl_finished_meds WHERE (`task_SpecialId` = '$txtTaskId' AND med_date = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                $row_sql = mysqli_fetch_array($sql);
                                $myCheck_period = $row_sql['WHOLEROW'];
                                if ($myCheck_periodtwo == $myCheck_period) {
                                    $time = strtotime($get_occurence);
                                    $get_Weeks_multi = '+' . $get_periodone . ' Week';
                                    $final_Weeks = date("Y-m-d", strtotime($get_Weeks_multi, $time));
                                    $sql_update_periodWeeks = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Weeks' WHERE (`client_med_Id` = '$txtTaskId' AND col_occurence = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    if ($sql_update_periodWeeks) {
                                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                    }
                                } else {
                                    header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                }
                            }
                        }
                        //header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                    }
                }
            } else {
                header("Location: ./go-back-history");
            }
        }
    } else if ($txtCurerCall == 'Extra tea call') {
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //Database query to update the client care call data for breakfast
        $myCheck = "SELECT * FROM tbl_finished_meds WHERE (task_SpecialId = '$txtTaskId' AND med_date = '$today' AND care_calls = '$txtcare_call7' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ";
        $myCheckres = mysqli_query($conn, $myCheck);
        $countRes = mysqli_num_rows($myCheckres);
        if ($countRes) {
            if ($mycheckNObox) {
                if ($txtTaskNoteNoOp == '') {
                    header("Location: ./reason-for-no-option?uryyToeSS4=$txtClientId");
                } else {
                    $sqlUpdate_finish_task = mysqli_query($conn, "UPDATE `tbl_finished_meds` SET `task_name` = '$txtTaskName', `med_date` = '$today', `task_timeIn` = '$txtTaskTimeIn', `task_note` = '$txtTaskNoteNoOp', `task_SpecialId` = '$txtTaskId', `uryyToeSS4` = '$txtClientId', `team_1email` = '$txtCarerEmail', `category` = '$txtTask', `col_dosage` = '$txtDosage', `col_carername` = '$txtCarerName', `col_outcome` = '$mycheckNObox', 
                `care_calls` = '$txtcare_call7', `care_call_days` = '$CurrentDayInName', `col_task_status` = '$txtTaskStatus', `col_care_call_Id` = '$txtClientCareCallId' WHERE (`task_SpecialId` = '$txtTaskId' AND `care_calls` = '$txtcare_call4' AND `med_date` = '$today' AND `col_company_Id` = '$txtClientCompId') ");
                    if ($sqlUpdate_finish_task) {
                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                    }
                }
            } else if ($mycheckYesbox) {
                $sqlUpdate_finish_task = mysqli_query($conn, "UPDATE `tbl_finished_meds` SET `task_name` = '$txtTaskName', `med_date` = '$today', `task_timeIn` = '$txtTaskTimeIn', `task_note` = '$txtTaskNoteYesOp', `task_SpecialId` = '$txtTaskId', `uryyToeSS4` = '$txtClientId', `team_1email` = '$txtCarerEmail', `category` = '$txtTask', `col_dosage` = '$txtDosage', `col_carername` = '$txtCarerName', `col_outcome` = '$mycheckYesbox', 
                `care_calls` = '$txtcare_call7', `care_call_days` = '$CurrentDayInName', `col_task_status` = '$txtTaskStatus', `col_care_call_Id` = '$txtClientCareCallId' WHERE (`task_SpecialId` = '$txtTaskId' AND `care_calls` = '$txtcare_call4' AND `med_date` = '$today' AND `col_company_Id` = '$txtClientCompId') ");
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
                    $queryIns = mysqli_query($conn, "INSERT INTO tbl_finished_meds (task_name, med_date, task_timeIn, task_note, task_SpecialId, uryyToeSS4, team_1email, category, col_dosage, col_carername, col_outcome, care_calls, care_call_days, col_task_status, col_care_call_Id, col_company_Id) 
                    VALUES('" . $txtTaskName . "', '" . $today . "', '" . $txtTaskTimeIn . "', '" . $txtTaskNoteNoOp . "', '" . $txtTaskId . "', '" . $txtClientId . "', '" . $txtCarerEmail . "', '" . $txtTask . "', '" . $txtDosage . "', '" . $txtCarerName . "', '" . $mycheckNObox . "', '" . $txtcare_call7 . "', '" . $CurrentDayInName . "', '" . $txtTaskStatus . "', '" . $txtClientCareCallId . "', '" . $txtClientCompId . "' ) ");
                    if ($queryIns != 0) {
                        $myCheck_order = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4 = '$txtClientId' AND extra_call3 = '$txtcare_call7' AND col_fifo != '' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ORDER BY med_Id DESC LIMIT 1");
                        $row_order = mysqli_fetch_array($myCheck_order);
                        $get_orderNumber = $row_order['col_fifo'];
                        $countRes_order = mysqli_num_rows($myCheck_order);
                        if ($countRes_order != 0) {
                            $txtCalcOrderNumber = $get_orderNumber + 1;
                            $sqlUpdate2 = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `med_colours` = '$med_colours', `visibility` = '$txtVisibility', `col_fifo` = '$txtCalcOrderNumber' WHERE client_med_Id = '$txtTaskId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ");
                            if ($sqlUpdate2) {
                                $myCheck_periodtwo = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
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
                                    $sql_update_periodonetime = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Month' WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')  ");
                                    if ($sql_update_periodonetime) {
                                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                    }
                                } else if ($get_periodtwo == 'Days') {
                                    $time = strtotime($get_occurence);
                                    $get_days_multi = '+ ' . $get_periodone . ' ' . $get_periodtwo;
                                    $final_Days = date("Y-m-d", strtotime($get_days_multi, $time));
                                    $sql_update_periodDays = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Days' WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    if ($sql_update_periodDays) {
                                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                    }
                                } else if ($get_periodtwo == 'Weeks') {
                                    $myCheck_periodtwo = mysqli_query($conn, "SELECT CONCAT(monday, tuesday, wednesday, thursday, friday, saturday, sunday) AS WHOLECOLUMN FROM tbl_clients_medication_records WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    $get_myCheck_periodtwo = mysqli_fetch_array($myCheck_periodtwo);
                                    $myCheck_periodtwo = $get_myCheck_periodtwo['WHOLECOLUMN'];

                                    $sql = mysqli_query($conn, "SELECT GROUP_CONCAT(care_call_days SEPARATOR '') AS WHOLEROW FROM tbl_finished_meds WHERE (`task_SpecialId` = '$txtTaskId' AND med_date = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    $row_sql = mysqli_fetch_array($sql);
                                    $myCheck_period = $row_sql['WHOLEROW'];
                                    if ($myCheck_periodtwo == $myCheck_period) {
                                        $time = strtotime($get_occurence);
                                        $get_Weeks_multi = '+' . $get_periodone . ' Week';
                                        $final_Weeks = date("Y-m-d", strtotime($get_Weeks_multi, $time));
                                        $sql_update_periodWeeks = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Weeks' WHERE (`client_med_Id` = '$txtTaskId' AND col_occurence = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        if ($sql_update_periodWeeks) {
                                            header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                        }
                                    } else {
                                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                    }
                                }
                            }
                            //header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                        } else {
                            $txtCalcOrderNumber = $get_orderNumber + 1;
                            $sqlUpdate_order = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `med_colours` = '$med_colours', `visibility` = '$txtVisibility', `col_fifo` = '$txtCalcOrderNumber' WHERE client_med_Id = '$txtTaskId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ");
                            if ($sqlUpdate_order) {
                                $myCheck_periodtwo = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
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
                                    $sql_update_periodonetime = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Month' WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')  ");
                                    if ($sql_update_periodonetime) {
                                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                    }
                                } else if ($get_periodtwo == 'Days') {
                                    $time = strtotime($get_occurence);
                                    $get_days_multi = '+ ' . $get_periodone . ' ' . $get_periodtwo;
                                    $final_Days = date("Y-m-d", strtotime($get_days_multi, $time));
                                    $sql_update_periodDays = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Days' WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    if ($sql_update_periodDays) {
                                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                    }
                                } else if ($get_periodtwo == 'Weeks') {
                                    $myCheck_periodtwo = mysqli_query($conn, "SELECT CONCAT(monday, tuesday, wednesday, thursday, friday, saturday, sunday) AS WHOLECOLUMN FROM tbl_clients_medication_records WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    $get_myCheck_periodtwo = mysqli_fetch_array($myCheck_periodtwo);
                                    $myCheck_periodtwo = $get_myCheck_periodtwo['WHOLECOLUMN'];

                                    $sql = mysqli_query($conn, "SELECT GROUP_CONCAT(care_call_days SEPARATOR '') AS WHOLEROW FROM tbl_finished_meds WHERE (`task_SpecialId` = '$txtTaskId' AND med_date = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    $row_sql = mysqli_fetch_array($sql);
                                    $myCheck_period = $row_sql['WHOLEROW'];
                                    if ($myCheck_periodtwo == $myCheck_period) {
                                        $time = strtotime($get_occurence);
                                        $get_Weeks_multi = '+' . $get_periodone . ' Week';
                                        $final_Weeks = date("Y-m-d", strtotime($get_Weeks_multi, $time));
                                        $sql_update_periodWeeks = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Weeks' WHERE (`client_med_Id` = '$txtTaskId' AND col_occurence = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        if ($sql_update_periodWeeks) {
                                            header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                        }
                                    } else {
                                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                    }
                                }
                            }
                            //header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                        }
                    }
                }
            } else if ($mycheckYesbox) {
                $queryIns2 = mysqli_query($conn, "INSERT INTO tbl_finished_meds (task_name, med_date, task_timeIn, task_note, task_SpecialId, uryyToeSS4, team_1email, category, col_dosage, col_carername, col_outcome, care_calls, care_call_days, col_task_status, col_care_call_Id, col_company_Id) 
                    VALUES('" . $txtTaskName . "', '" . $today . "', '" . $txtTaskTimeIn . "', '" . $txtTaskNoteYesOp . "', '" . $txtTaskId . "', '" . $txtClientId . "', '" . $txtCarerEmail . "', '" . $txtTask . "', '" . $txtDosage . "', '" . $txtCarerName . "', '" . $mycheckYesbox . "', '" . $txtcare_call7 . "', '" . $CurrentDayInName . "', '" . $txtTaskStatus . "', '" . $txtClientCareCallId . "', '" . $txtClientCompId . "' ) ");
                if ($queryIns2 != 0) {
                    $myCheck_order = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4 = '$txtClientId' AND extra_call3 = '$txtcare_call7' AND col_fifo != '' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ORDER BY med_Id DESC LIMIT 1");
                    $row_order = mysqli_fetch_array($myCheck_order);
                    $get_orderNumber = $row_order['col_fifo'];
                    $countRes_order = mysqli_num_rows($myCheck_order);
                    if ($countRes_order != 0) {
                        $txtCalcOrderNumber = $get_orderNumber + 1;
                        $sqlUpdate2 = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `med_colours` = '$med_colours', `visibility` = '$txtVisibility', `col_fifo` = '$txtCalcOrderNumber' WHERE client_med_Id = '$txtTaskId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ");
                        if ($sqlUpdate2) {
                            $myCheck_periodtwo = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
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
                                $sql_update_periodonetime = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Month' WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')  ");
                                if ($sql_update_periodonetime) {
                                    header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                }
                            } else if ($get_periodtwo == 'Days') {
                                $time = strtotime($get_occurence);
                                $get_days_multi = '+ ' . $get_periodone . ' ' . $get_periodtwo;
                                $final_Days = date("Y-m-d", strtotime($get_days_multi, $time));
                                $sql_update_periodDays = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Days' WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                if ($sql_update_periodDays) {
                                    header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                }
                            } else if ($get_periodtwo == 'Weeks') {
                                $myCheck_periodtwo = mysqli_query($conn, "SELECT CONCAT(monday, tuesday, wednesday, thursday, friday, saturday, sunday) AS WHOLECOLUMN FROM tbl_clients_medication_records WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                $get_myCheck_periodtwo = mysqli_fetch_array($myCheck_periodtwo);
                                $myCheck_periodtwo = $get_myCheck_periodtwo['WHOLECOLUMN'];

                                $sql = mysqli_query($conn, "SELECT GROUP_CONCAT(care_call_days SEPARATOR '') AS WHOLEROW FROM tbl_finished_meds WHERE (`task_SpecialId` = '$txtTaskId' AND med_date = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                $row_sql = mysqli_fetch_array($sql);
                                $myCheck_period = $row_sql['WHOLEROW'];
                                if ($myCheck_periodtwo == $myCheck_period) {
                                    $time = strtotime($get_occurence);
                                    $get_Weeks_multi = '+' . $get_periodone . ' Week';
                                    $final_Weeks = date("Y-m-d", strtotime($get_Weeks_multi, $time));
                                    $sql_update_periodWeeks = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Weeks' WHERE (`client_med_Id` = '$txtTaskId' AND col_occurence = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    if ($sql_update_periodWeeks) {
                                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                    }
                                } else {
                                    header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                }
                            }
                        }
                        //header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                    } else {
                        $txtCalcOrderNumber = $get_orderNumber + 1;
                        $sqlUpdate_order = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `med_colours` = '$med_colours', `visibility` = '$txtVisibility', `col_fifo` = '$txtCalcOrderNumber' WHERE client_med_Id = '$txtTaskId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ");
                        if ($sqlUpdate_order) {
                            $myCheck_periodtwo = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
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
                                $sql_update_periodonetime = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Month' WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')  ");
                                if ($sql_update_periodonetime) {
                                    header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                }
                            } else if ($get_periodtwo == 'Days') {
                                $time = strtotime($get_occurence);
                                $get_days_multi = '+ ' . $get_periodone . ' ' . $get_periodtwo;
                                $final_Days = date("Y-m-d", strtotime($get_days_multi, $time));
                                $sql_update_periodDays = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Days' WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                if ($sql_update_periodDays) {
                                    header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                }
                            } else if ($get_periodtwo == 'Weeks') {
                                $myCheck_periodtwo = mysqli_query($conn, "SELECT CONCAT(monday, tuesday, wednesday, thursday, friday, saturday, sunday) AS WHOLECOLUMN FROM tbl_clients_medication_records WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                $get_myCheck_periodtwo = mysqli_fetch_array($myCheck_periodtwo);
                                $myCheck_periodtwo = $get_myCheck_periodtwo['WHOLECOLUMN'];

                                $sql = mysqli_query($conn, "SELECT GROUP_CONCAT(care_call_days SEPARATOR '') AS WHOLEROW FROM tbl_finished_meds WHERE (`task_SpecialId` = '$txtTaskId' AND med_date = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                $row_sql = mysqli_fetch_array($sql);
                                $myCheck_period = $row_sql['WHOLEROW'];
                                if ($myCheck_periodtwo == $myCheck_period) {
                                    $time = strtotime($get_occurence);
                                    $get_Weeks_multi = '+' . $get_periodone . ' Week';
                                    $final_Weeks = date("Y-m-d", strtotime($get_Weeks_multi, $time));
                                    $sql_update_periodWeeks = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Weeks' WHERE (`client_med_Id` = '$txtTaskId' AND col_occurence = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    if ($sql_update_periodWeeks) {
                                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                    }
                                } else {
                                    header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                }
                            }
                        }
                        //header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                    }
                }
            } else {
                header("Location: ./go-back-history");
            }
        }
    } else if ($txtCurerCall == 'Extra bed call') {
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //Database query to update the client care call data for breakfast
        $myCheck = "SELECT * FROM tbl_finished_meds WHERE (task_SpecialId = '$txtTaskId' AND med_date = '$today' AND care_calls = '$txtcare_call8' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ";
        $myCheckres = mysqli_query($conn, $myCheck);
        $countRes = mysqli_num_rows($myCheckres);
        if ($countRes) {
            if ($mycheckNObox) {
                if ($txtTaskNoteNoOp == '') {
                    header("Location: ./reason-for-no-option?uryyToeSS4=$txtClientId");
                } else {
                    $sqlUpdate_finish_task = mysqli_query($conn, "UPDATE `tbl_finished_meds` SET `task_name` = '$txtTaskName', `med_date` = '$today', `task_timeIn` = '$txtTaskTimeIn', `task_note` = '$txtTaskNoteNoOp', `task_SpecialId` = '$txtTaskId', `uryyToeSS4` = '$txtClientId', `team_1email` = '$txtCarerEmail', `category` = '$txtTask', `col_dosage` = '$txtDosage', `col_carername` = '$txtCarerName', `col_outcome` = '$mycheckNObox', 
                `care_calls` = '$txtcare_call8', `care_call_days` = '$CurrentDayInName', `col_task_status` = '$txtTaskStatus', `col_care_call_Id` = '$txtClientCareCallId' WHERE (`task_SpecialId` = '$txtTaskId' AND `care_calls` = '$txtcare_call4' AND `med_date` = '$today' AND `col_company_Id` = '$txtClientCompId') ");
                    if ($sqlUpdate_finish_task) {
                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                    }
                }
            } else if ($mycheckYesbox) {
                $sqlUpdate_finish_task = mysqli_query($conn, "UPDATE `tbl_finished_meds` SET `task_name` = '$txtTaskName', `med_date` = '$today', `task_timeIn` = '$txtTaskTimeIn', `task_note` = '$txtTaskNoteYesOp', `task_SpecialId` = '$txtTaskId', `uryyToeSS4` = '$txtClientId', `team_1email` = '$txtCarerEmail', `category` = '$txtTask', `col_dosage` = '$txtDosage', `col_carername` = '$txtCarerName', `col_outcome` = '$mycheckYesbox', 
                `care_calls` = '$txtcare_call8', `care_call_days` = '$CurrentDayInName', `col_task_status` = '$txtTaskStatus', `col_care_call_Id` = '$txtClientCareCallId' WHERE (`task_SpecialId` = '$txtTaskId' AND `care_calls` = '$txtcare_call4' AND `med_date` = '$today' AND `col_company_Id` = '$txtClientCompId') ");
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
                    $queryIns = mysqli_query($conn, "INSERT INTO tbl_finished_meds (task_name, med_date, task_timeIn, task_note, task_SpecialId, uryyToeSS4, team_1email, category, col_dosage, col_carername, col_outcome, care_calls, care_call_days, col_task_status, col_care_call_Id, col_company_Id) 
                    VALUES('" . $txtTaskName . "', '" . $today . "', '" . $txtTaskTimeIn . "', '" . $txtTaskNoteNoOp . "', '" . $txtTaskId . "', '" . $txtClientId . "', '" . $txtCarerEmail . "', '" . $txtTask . "', '" . $txtDosage . "', '" . $txtCarerName . "', '" . $mycheckNObox . "', '" . $txtcare_call8 . "', '" . $CurrentDayInName . "', '" . $txtTaskStatus . "', '" . $txtClientCareCallId . "', '" . $txtClientCompId . "' ) ");
                    if ($queryIns != 0) {
                        $myCheck_order = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4 = '$txtClientId' AND extra_call4 = '$txtcare_call8' AND col_fifo != '' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ORDER BY med_Id DESC LIMIT 1");
                        $row_order = mysqli_fetch_array($myCheck_order);
                        $get_orderNumber = $row_order['col_fifo'];
                        $countRes_order = mysqli_num_rows($myCheck_order);
                        if ($countRes_order != 0) {
                            $txtCalcOrderNumber = $get_orderNumber + 1;
                            $sqlUpdate2 = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `med_colours` = '$med_colours', `visibility` = '$txtVisibility', `col_fifo` = '$txtCalcOrderNumber' WHERE client_med_Id = '$txtTaskId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ");
                            if ($sqlUpdate2) {
                                $myCheck_periodtwo = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
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
                                    $sql_update_periodonetime = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Month' WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')  ");
                                    if ($sql_update_periodonetime) {
                                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                    }
                                } else if ($get_periodtwo == 'Days') {
                                    $time = strtotime($get_occurence);
                                    $get_days_multi = '+ ' . $get_periodone . ' ' . $get_periodtwo;
                                    $final_Days = date("Y-m-d", strtotime($get_days_multi, $time));
                                    $sql_update_periodDays = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Days' WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    if ($sql_update_periodDays) {
                                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                    }
                                } else if ($get_periodtwo == 'Weeks') {
                                    $myCheck_periodtwo = mysqli_query($conn, "SELECT CONCAT(monday, tuesday, wednesday, thursday, friday, saturday, sunday) AS WHOLECOLUMN FROM tbl_clients_medication_records WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    $get_myCheck_periodtwo = mysqli_fetch_array($myCheck_periodtwo);
                                    $myCheck_periodtwo = $get_myCheck_periodtwo['WHOLECOLUMN'];

                                    $sql = mysqli_query($conn, "SELECT GROUP_CONCAT(care_call_days SEPARATOR '') AS WHOLEROW FROM tbl_finished_meds WHERE (`task_SpecialId` = '$txtTaskId' AND med_date = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    $row_sql = mysqli_fetch_array($sql);
                                    $myCheck_period = $row_sql['WHOLEROW'];
                                    if ($myCheck_periodtwo == $myCheck_period) {
                                        $time = strtotime($get_occurence);
                                        $get_Weeks_multi = '+' . $get_periodone . ' Week';
                                        $final_Weeks = date("Y-m-d", strtotime($get_Weeks_multi, $time));
                                        $sql_update_periodWeeks = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Weeks' WHERE (`client_med_Id` = '$txtTaskId' AND col_occurence = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        if ($sql_update_periodWeeks) {
                                            header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                        }
                                    } else {
                                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                    }
                                }
                            }
                            //header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                        } else {
                            $txtCalcOrderNumber = $get_orderNumber + 1;
                            $sqlUpdate_order = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `med_colours` = '$med_colours', `visibility` = '$txtVisibility', `col_fifo` = '$txtCalcOrderNumber' WHERE client_med_Id = '$txtTaskId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ");
                            if ($sqlUpdate_order) {
                                $myCheck_periodtwo = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
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
                                    $sql_update_periodonetime = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Month' WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')  ");
                                    if ($sql_update_periodonetime) {
                                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                    }
                                } else if ($get_periodtwo == 'Days') {
                                    $time = strtotime($get_occurence);
                                    $get_days_multi = '+ ' . $get_periodone . ' ' . $get_periodtwo;
                                    $final_Days = date("Y-m-d", strtotime($get_days_multi, $time));
                                    $sql_update_periodDays = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Days' WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    if ($sql_update_periodDays) {
                                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                    }
                                } else if ($get_periodtwo == 'Weeks') {
                                    $myCheck_periodtwo = mysqli_query($conn, "SELECT CONCAT(monday, tuesday, wednesday, thursday, friday, saturday, sunday) AS WHOLECOLUMN FROM tbl_clients_medication_records WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    $get_myCheck_periodtwo = mysqli_fetch_array($myCheck_periodtwo);
                                    $myCheck_periodtwo = $get_myCheck_periodtwo['WHOLECOLUMN'];

                                    $sql = mysqli_query($conn, "SELECT GROUP_CONCAT(care_call_days SEPARATOR '') AS WHOLEROW FROM tbl_finished_meds WHERE (`task_SpecialId` = '$txtTaskId' AND med_date = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    $row_sql = mysqli_fetch_array($sql);
                                    $myCheck_period = $row_sql['WHOLEROW'];
                                    if ($myCheck_periodtwo == $myCheck_period) {
                                        $time = strtotime($get_occurence);
                                        $get_Weeks_multi = '+' . $get_periodone . ' Week';
                                        $final_Weeks = date("Y-m-d", strtotime($get_Weeks_multi, $time));
                                        $sql_update_periodWeeks = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Weeks' WHERE (`client_med_Id` = '$txtTaskId' AND col_occurence = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        if ($sql_update_periodWeeks) {
                                            header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                        }
                                    } else {
                                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                    }
                                }
                            }
                            //header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                        }
                    }
                }
            } else if ($mycheckYesbox) {
                $queryIns2 = mysqli_query($conn, "INSERT INTO tbl_finished_meds (task_name, med_date, task_timeIn, task_note, task_SpecialId, uryyToeSS4, team_1email, category, col_dosage, col_carername, col_outcome, care_calls, care_call_days, col_task_status, col_care_call_Id, col_company_Id) 
                    VALUES('" . $txtTaskName . "', '" . $today . "', '" . $txtTaskTimeIn . "', '" . $txtTaskNoteYesOp . "', '" . $txtTaskId . "', '" . $txtClientId . "', '" . $txtCarerEmail . "', '" . $txtTask . "', '" . $txtDosage . "', '" . $txtCarerName . "', '" . $mycheckYesbox . "', '" . $txtcare_call8 . "', '" . $CurrentDayInName . "', '" . $txtTaskStatus . "', '" . $txtClientCareCallId . "', '" . $txtClientCompId . "' ) ");
                if ($queryIns2 != 0) {
                    $myCheck_order = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4 = '$txtClientId' AND extra_call4 = '$txtcare_call8' AND col_fifo != '' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ORDER BY med_Id DESC LIMIT 1");
                    $row_order = mysqli_fetch_array($myCheck_order);
                    $get_orderNumber = $row_order['col_fifo'];
                    $countRes_order = mysqli_num_rows($myCheck_order);
                    if ($countRes_order != 0) {
                        $txtCalcOrderNumber = $get_orderNumber + 1;
                        $sqlUpdate2 = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `med_colours` = '$med_colours', `visibility` = '$txtVisibility', `col_fifo` = '$txtCalcOrderNumber' WHERE client_med_Id = '$txtTaskId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ");
                        if ($sqlUpdate2) {
                            $myCheck_periodtwo = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
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
                                $sql_update_periodonetime = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Month' WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')  ");
                                if ($sql_update_periodonetime) {
                                    header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                }
                            } else if ($get_periodtwo == 'Days') {
                                $time = strtotime($get_occurence);
                                $get_days_multi = '+ ' . $get_periodone . ' ' . $get_periodtwo;
                                $final_Days = date("Y-m-d", strtotime($get_days_multi, $time));
                                $sql_update_periodDays = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Days' WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                if ($sql_update_periodDays) {
                                    header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                }
                            } else if ($get_periodtwo == 'Weeks') {
                                $myCheck_periodtwo = mysqli_query($conn, "SELECT CONCAT(monday, tuesday, wednesday, thursday, friday, saturday, sunday) AS WHOLECOLUMN FROM tbl_clients_medication_records WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                $get_myCheck_periodtwo = mysqli_fetch_array($myCheck_periodtwo);
                                $myCheck_periodtwo = $get_myCheck_periodtwo['WHOLECOLUMN'];

                                $sql = mysqli_query($conn, "SELECT GROUP_CONCAT(care_call_days SEPARATOR '') AS WHOLEROW FROM tbl_finished_meds WHERE (`task_SpecialId` = '$txtTaskId' AND med_date = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                $row_sql = mysqli_fetch_array($sql);
                                $myCheck_period = $row_sql['WHOLEROW'];
                                if ($myCheck_periodtwo == $myCheck_period) {
                                    $time = strtotime($get_occurence);
                                    $get_Weeks_multi = '+' . $get_periodone . ' Week';
                                    $final_Weeks = date("Y-m-d", strtotime($get_Weeks_multi, $time));
                                    $sql_update_periodWeeks = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Weeks' WHERE (`client_med_Id` = '$txtTaskId' AND col_occurence = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    if ($sql_update_periodWeeks) {
                                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                    }
                                } else {
                                    header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                }
                            }
                        }
                        //header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                    } else {
                        $txtCalcOrderNumber = $get_orderNumber + 1;
                        $sqlUpdate_order = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `med_colours` = '$med_colours', `visibility` = '$txtVisibility', `col_fifo` = '$txtCalcOrderNumber' WHERE client_med_Id = '$txtTaskId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ");
                        if ($sqlUpdate_order) {
                            $myCheck_periodtwo = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
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
                                $sql_update_periodonetime = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Month' WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')  ");
                                if ($sql_update_periodonetime) {
                                    header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                }
                            } else if ($get_periodtwo == 'Days') {
                                $time = strtotime($get_occurence);
                                $get_days_multi = '+ ' . $get_periodone . ' ' . $get_periodtwo;
                                $final_Days = date("Y-m-d", strtotime($get_days_multi, $time));
                                $sql_update_periodDays = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Days' WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                if ($sql_update_periodDays) {
                                    header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                }
                            } else if ($get_periodtwo == 'Weeks') {
                                $myCheck_periodtwo = mysqli_query($conn, "SELECT CONCAT(monday, tuesday, wednesday, thursday, friday, saturday, sunday) AS WHOLECOLUMN FROM tbl_clients_medication_records WHERE (med_Id = '$txtTask_IdNo' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                $get_myCheck_periodtwo = mysqli_fetch_array($myCheck_periodtwo);
                                $myCheck_periodtwo = $get_myCheck_periodtwo['WHOLECOLUMN'];

                                $sql = mysqli_query($conn, "SELECT GROUP_CONCAT(care_call_days SEPARATOR '') AS WHOLEROW FROM tbl_finished_meds WHERE (`task_SpecialId` = '$txtTaskId' AND med_date = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                $row_sql = mysqli_fetch_array($sql);
                                $myCheck_period = $row_sql['WHOLEROW'];
                                if ($myCheck_periodtwo == $myCheck_period) {
                                    $time = strtotime($get_occurence);
                                    $get_Weeks_multi = '+' . $get_periodone . ' Week';
                                    $final_Weeks = date("Y-m-d", strtotime($get_Weeks_multi, $time));
                                    $sql_update_periodWeeks = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_occurence` = '$final_Weeks' WHERE (`client_med_Id` = '$txtTaskId' AND col_occurence = '$get_occurence' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    if ($sql_update_periodWeeks) {
                                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                    }
                                } else {
                                    header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                }
                            }
                        }
                        //header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                    }
                }
            } else {
                header("Location: ./go-back-history");
            }
        }
    }
}
