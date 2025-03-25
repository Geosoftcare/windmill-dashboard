<?php

if (isset($_POST['btnScheduleRuns'])) {

    include('dbconnections.php');

    $txtFirstCarerId = mysqli_real_escape_string($conn, $_REQUEST['txtFirstCarer']);
    $txtSecondCarerId = mysqli_real_escape_string($conn, $_REQUEST['txtSecondCarer']);
    $txtClientGroup = mysqli_real_escape_string($conn, $_REQUEST['txtClientGroup']);

    $txtHalfDay = mysqli_real_escape_string($conn, $_REQUEST['txtHalfDay']);
    $txtLateCalls = mysqli_real_escape_string($conn, $_REQUEST['txtLateCalls']);
    $txtSupportCalls = mysqli_real_escape_string($conn, $_REQUEST['txtSupportCalls']);
    $txtAllDay = mysqli_real_escape_string($conn, $_REQUEST['txtAllDay']);

    $txtShiftDate = mysqli_real_escape_string($conn, $_REQUEST['txtShiftDate']);

    $clientResource = mysqli_real_escape_string($conn, $_REQUEST['clientResource']);
    $carecalls_Id = mysqli_real_escape_string($conn, $_REQUEST['carecallID']);

    $attemptone = mysqli_real_escape_string($conn, $_REQUEST['firstAttempId']);
    $attempttwo = mysqli_real_escape_string($conn, $_REQUEST['weekoneId']);
    $attemptthree = mysqli_real_escape_string($conn, $_REQUEST['weektwoId']);


    $firstAttempId = hash('sha256', $attemptone);
    $weekoneId = hash('sha256', $attempttwo);
    $weektwoId = hash('sha256', $attemptthree);


    $timelineColour = "#34495e";
    $righttoDisplay = "True";
    $status = "Action needed";
    $bgChange = 'rgba(44, 62, 80,.5)';


    $txtNextWeeksTrue = mysqli_real_escape_string($conn, $_REQUEST['txtNextWeeksTrue']);
    $txtNexttwoWeeksTrue = mysqli_real_escape_string($conn, $_REQUEST['txtNexttwoWeeksTrue']);


    $oneWeekInterval = date("Y-m-d", strtotime($txtShiftDate . "+7 day"));
    $twoWeekInterval = date("Y-m-d", strtotime($txtShiftDate . "+14 day"));


    $sel_firstcarer_Name = mysqli_query($conn, "SELECT * FROM tbl_goesoft_carers_account WHERE user_special_Id = '$txtFirstCarerId' ");
    while ($row = mysqli_fetch_array($sel_firstcarer_Name)) {
        $db_workerNames = $row['user_fullname'];
    }


    $sel_secondcarer_Name = mysqli_query($conn, "SELECT * FROM tbl_goesoft_carers_account WHERE user_special_Id = '$txtSecondCarerId' ");
    while ($row = mysqli_fetch_array($sel_secondcarer_Name)) {
        $db_workerNames2 = $row['user_fullname'];
    }


    $myCheck = "SELECT * FROM tbl_schedule_calls WHERE client_area = '$txtClientGroup' AND `Clientshift_Date` = '$txtShiftDate' ";
    $myCheckres = mysqli_query($conn, $myCheck);
    $countRes = mysqli_num_rows($myCheckres);

    if ($countRes != 0) {

        if ($txtHalfDay) {
            $updateMysqlTable = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `first_carer`= '$db_workerNames', `second_carer`= '$db_workerNames2', `first_carer_Id`= '$txtFirstCarerId', `second_carer_Id`= '$txtSecondCarerId', `Clientshift_Date`= '$txtShiftDate', `client_resource`= '$clientResource', `timeline_colour`= '$timelineColour', `rightTo_display`= '$righttoDisplay', `bgChange` = '$bgChange', `call_status` = 'Action needed' WHERE care_calls = 'Morning' AND `col_area_Id` = '$txtClientGroup' ");
            if ($updateMysqlTable) {
                $updatelunchColumn = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `first_carer`= '$db_workerNames', `second_carer`= '$db_workerNames2', `first_carer_Id`= '$txtFirstCarerId', `second_carer_Id`= '$txtSecondCarerId', `Clientshift_Date`= '$txtShiftDate', `client_resource`= '$clientResource', `timeline_colour`= '$timelineColour', `rightTo_display`= '$righttoDisplay', `call_status` = '$status', `bgChange` = '$bgChange', `call_status` = 'Action needed' WHERE care_calls = 'Lunch' AND `col_area_Id` = '$txtClientGroup' ");
                if ($updatelunchColumn) {
                    if ($txtNextWeeksTrue) { //if one weeek check box checked is true then insert double

                        $updateMysqlTable40 = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `first_carer`= '$db_workerNames', `second_carer`= '$db_workerNames2', `first_carer_Id`= '$txtFirstCarerId', `second_carer_Id`= '$txtSecondCarerId', `Clientshift_Date`= '$txtShiftDate', `client_resource`= '$clientResource', `timeline_colour`= '$timelineColour', `rightTo_display`= '$righttoDisplay', `bgChange` = '$bgChange', `call_status` = 'Action needed' WHERE care_calls = 'Morning' AND `col_area_Id` = '$txtClientGroup' AND `Clientshift_Date` = '$txtNextWeeksTrue' ");
                        if ($updateMysqlTable40) {
                            $updatelunchColumn40 = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `first_carer`= '$db_workerNames', `second_carer`= '$db_workerNames2', `first_carer_Id`= '$txtFirstCarerId', `second_carer_Id`= '$txtSecondCarerId', `Clientshift_Date`= '$txtShiftDate', `client_resource`= '$clientResource', `timeline_colour`= '$timelineColour', `rightTo_display`= '$righttoDisplay', `bgChange` = '$bgChange', `call_status` = 'Action needed' WHERE care_calls = 'Lunch' AND `col_area_Id` = '$txtClientGroup' AND `Clientshift_Date` = '$txtNextWeeksTrue' ");
                            if ($updatelunchColumn40) {
                                header("Location: ./success-page");
                            } else {
                                header("Location: ./not-successful-page");
                            }
                        }
                    } else if ($txtNexttwoWeeksTrue) { //if halfday checkbox checked is true then do this

                        $updateMysqlTable40 = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `first_carer`= '$db_workerNames', `second_carer`= '$db_workerNames2', `first_carer_Id`= '$txtFirstCarerId', `second_carer_Id`= '$txtSecondCarerId', `Clientshift_Date`= '$txtShiftDate', `client_resource`= '$clientResource', `timeline_colour`= '$timelineColour', `rightTo_display`= '$righttoDisplay', `bgChange` = '$bgChange', `call_status` = 'Action needed' WHERE care_calls = 'Morning' AND `col_area_Id` = '$txtClientGroup' AND `Clientshift_Date` = '$txtNexttwoWeeksTrue' ");
                        if ($updateMysqlTable40) {
                            $updatelunchColumn40 = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `first_carer`= '$db_workerNames', `second_carer`= '$db_workerNames2', `first_carer_Id`= '$txtFirstCarerId', `second_carer_Id`= '$txtSecondCarerId', `Clientshift_Date`= '$txtShiftDate', `client_resource`= '$clientResource', `timeline_colour`= '$timelineColour', `rightTo_display`= '$righttoDisplay', `bgChange` = '$bgChange', `call_status` = 'Action needed' WHERE care_calls = 'Lunch' AND `col_area_Id` = '$txtClientGroup' AND `Clientshift_Date` = '$txtNexttwoWeeksTrue' ");
                            if ($updatelunchColumn40) {
                                header("Location: ./success-page");
                            } else {
                                header("Location: ./not-successful-page");
                            }
                        }
                    } else { //if halfday checkbox checked is true then do this
                        header("Location: ./success-page");
                    }
                }
            } else {
                header("Location: ./not-successful-page");
            }
        } else if ($txtLateCalls) {
            $updateMysqlTable2 = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `first_carer`= '$db_workerNames', `second_carer`= '$db_workerNames2', `first_carer_Id`= '$txtFirstCarerId', `second_carer_Id`= '$txtSecondCarerId', `Clientshift_Date`= '$txtShiftDate', `client_resource`= '$clientResource', `timeline_colour`= '$timelineColour', `rightTo_display`= '$righttoDisplay', `bgChange` = '$bgChange', `call_status` = 'Action needed' WHERE care_calls = 'Tea' AND `col_area_Id` = '$txtClientGroup' ");
            if ($updateMysqlTable2) {
                $updatelunchColumn2 = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `first_carer`= '$db_workerNames', `second_carer`= '$db_workerNames2', `first_carer_Id`= '$txtFirstCarerId', `second_carer_Id`= '$txtSecondCarerId', `Clientshift_Date`= '$txtShiftDate', `client_resource`= '$clientResource', `timeline_colour`= '$timelineColour', `rightTo_display`= '$righttoDisplay', `bgChange` = '$bgChange', `call_status` = 'Action needed' WHERE care_calls = 'Bed' AND `col_area_Id` = '$txtClientGroup' ");
                if ($updatelunchColumn2) {
                    if ($txtNextWeeksTrue) { //if one weeek check box checked is true then insert double

                        $updateMysqlTable40 = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `first_carer`= '$db_workerNames', `second_carer`= '$db_workerNames2', `first_carer_Id`= '$txtFirstCarerId', `second_carer_Id`= '$txtSecondCarerId', `Clientshift_Date`= '$txtShiftDate', `client_resource`= '$clientResource', `timeline_colour`= '$timelineColour', `rightTo_display`= '$righttoDisplay', `bgChange` = '$bgChange', `call_status` = 'Action needed' WHERE care_calls = 'Tea' AND `col_area_Id` = '$txtClientGroup' AND `Clientshift_Date` = '$txtNextWeeksTrue' ");
                        if ($updateMysqlTable40) {
                            $updatelunchColumn40 = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `first_carer`= '$db_workerNames', `second_carer`= '$db_workerNames2', `first_carer_Id`= '$txtFirstCarerId', `second_carer_Id`= '$txtSecondCarerId', `Clientshift_Date`= '$txtShiftDate', `client_resource`= '$clientResource', `timeline_colour`= '$timelineColour', `rightTo_display`= '$righttoDisplay', `bgChange` = '$bgChange', `call_status` = 'Action needed' WHERE care_calls = 'Bed' AND `col_area_Id` = '$txtClientGroup' AND `Clientshift_Date` = '$txtNextWeeksTrue' ");
                            if ($updatelunchColumn40) {
                                header("Location: ./success-page");
                            } else {
                                header("Location: ./not-successful-page");
                            }
                        }
                    } else if ($txtNexttwoWeeksTrue) { //if halfday checkbox checked is true then do this

                        $updateMysqlTable40 = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `first_carer`= '$db_workerNames', `second_carer`= '$db_workerNames2', `first_carer_Id`= '$txtFirstCarerId', `second_carer_Id`= '$txtSecondCarerId', `Clientshift_Date`= '$txtShiftDate', `client_resource`= '$clientResource', `timeline_colour`= '$timelineColour', `rightTo_display`= '$righttoDisplay', `bgChange` = '$bgChange', `call_status` = 'Action needed' WHERE care_calls = 'Tea' AND `col_area_Id` = '$txtClientGroup' AND `Clientshift_Date` = '$txtNexttwoWeeksTrue' ");
                        if ($updateMysqlTable40) {
                            $updatelunchColumn40 = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `first_carer`= '$db_workerNames', `second_carer`= '$db_workerNames2', `first_carer_Id`= '$txtFirstCarerId', `second_carer_Id`= '$txtSecondCarerId', `Clientshift_Date`= '$txtShiftDate', `client_resource`= '$clientResource', `timeline_colour`= '$timelineColour', `rightTo_display`= '$righttoDisplay', `bgChange` = '$bgChange', `call_status` = 'Action needed' WHERE care_calls = 'Bed' AND `col_area_Id` = '$txtClientGroup' AND `Clientshift_Date` = '$txtNexttwoWeeksTrue' ");
                            if ($updatelunchColumn40) {
                                header("Location: ./success-page");
                            } else {
                                header("Location: ./not-successful-page");
                            }
                        }
                    } else { //if halfday checkbox checked is true then do this
                        header("Location: ./success-page");
                    }
                }
            } else {
                header("Location: ./not-successful-page");
            }
        } //else if ($txtSupportCalls) {
        //$updateMysqlTable0 = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `first_carer`= '$db_workerNames', `second_carer`= '$db_workerNames2', `first_carer_Id`= '$txtFirstCarerId', `second_carer_Id`= '$txtSecondCarerId', `Clientshift_Date`= '$txtShiftDate', `client_resource`= '$clientResource', `timeline_colour`= '$timelineColour', `rightTo_display`= '$righttoDisplay', `call_status` = '$status', `bgChange` = '$bgChange', `call_status` = 'Action needed' WHERE care_calls = 'Tea' AND `col_area_Id` = '$txtClientGroup' ");
        //if ($updateMysqlTable0) {
        // header("Location: ./success-page");
        // } else {
        //  header("Location: ./not-successful-page");
        //}
    } else if ($txtAllDay) {
        $updateMysqlTable3 = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `first_carer`= '$db_workerNames', `second_carer`= '$db_workerNames2', `first_carer_Id`= '$txtFirstCarerId', `second_carer_Id`= '$txtSecondCarerId', `Clientshift_Date`= '$txtShiftDate', `client_resource`= '$clientResource', `timeline_colour`= '$timelineColour', `rightTo_display`= '$righttoDisplay', `call_status` = '$status', `bgChange` = '$bgChange', `call_status` = 'Action needed' WHERE `col_area_Id` = '$txtClientGroup' ");
        if ($updateMysqlTable3) {
            if ($txtNextWeeksTrue) { //if one weeek check box checked is true then insert double

                $updateMysqlTable40 = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `first_carer`= '$db_workerNames', `second_carer`= '$db_workerNames2', `first_carer_Id`= '$txtFirstCarerId', `second_carer_Id`= '$txtSecondCarerId', `Clientshift_Date`= '$txtShiftDate', `client_resource`= '$clientResource', `timeline_colour`= '$timelineColour', `rightTo_display`= '$righttoDisplay', `call_status` = '$status', `bgChange` = '$bgChange', `call_status` = 'Action needed' WHERE `col_area_Id` = '$txtClientGroup' AND `Clientshift_Date` = '$txtNextWeeksTrue' ");
                if ($updateMysqlTable40) {

                    header("Location: ./success-page");
                } else {
                    header("Location: ./not-successful-page");
                }
            } else if ($txtNexttwoWeeksTrue) { //if halfday checkbox checked is true then do this

                $updateMysqlTable40 = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `first_carer`= '$db_workerNames', `second_carer`= '$db_workerNames2', `first_carer_Id`= '$txtFirstCarerId', `second_carer_Id`= '$txtSecondCarerId', `Clientshift_Date`= '$txtShiftDate', `client_resource`= '$clientResource', `timeline_colour`= '$timelineColour', `rightTo_display`= '$righttoDisplay', `call_status` = '$status', `bgChange` = '$bgChange', `call_status` = 'Action needed' WHERE `col_area_Id` = '$txtClientGroup' AND `Clientshift_Date` = '$txtNexttwoWeeksTrue' ");
                if ($updateMysqlTable40) {

                    header("Location: ./success-page");
                } else {
                    header("Location: ./not-successful-page");
                }
            } else { //if halfday checkbox checked is true then do this
                header("Location: ./success-page");
            }
        } else {
            header("Location: ./not-successful-page");
        }
    }
} else {

    $CopyClient_timeDetailssql = mysqli_query($conn, "INSERT INTO tbl_schedule_calls (client_name, client_area, col_area_city, col_area_Id, uryyToeSS4, care_calls, Clientshift_Date, dateTime_in, dateTime_out, col_company_Id, col_weekly_routine) SELECT client_name, client_area, col_client_city, run_area_nameId, uryyToeSS4, care_calls, '$txtShiftDate', dateTime_in, dateTime_out, col_company_Id, '$firstAttempId' FROM tbl_manage_runs WHERE run_area_nameId = '$txtClientGroup' ");

    if ($CopyClient_timeDetailssql) {

        if ($txtHalfDay) {  //if half day checkbox checked is true then do this
            $updateMysqlTable4 = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `first_carer`= '$db_workerNames', `second_carer`= '$db_workerNames2', `first_carer_Id`= '$txtFirstCarerId', `second_carer_Id`= '$txtSecondCarerId', `Clientshift_Date`= '$txtShiftDate', `client_resource`= '$clientResource', `timeline_colour`= '$timelineColour', `rightTo_display`= '$righttoDisplay', `call_status` = '$status', `bgChange` = '$bgChange', `call_status` = 'Action needed' WHERE care_calls = 'Morning' AND `col_area_Id` = '$txtClientGroup' AND `col_weekly_routine` = '$firstAttempId' ");
            if ($updateMysqlTable4) {
                $updateMyRoasterView = mysqli_query($conn, "UPDATE `tbl_goesoft_users` SET `myviewArea`= 'General' WHERE `user_email_address` = '" . $_SESSION['usr_email'] . "' ");
                if ($updateMyRoasterView) {
                    $updatelunchColumn4 = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `first_carer`= '$db_workerNames', `second_carer`= '$db_workerNames2', `first_carer_Id`= '$txtFirstCarerId', `second_carer_Id`= '$txtSecondCarerId', `Clientshift_Date`= '$txtShiftDate', `client_resource`= '$clientResource', `timeline_colour`= '$timelineColour', `rightTo_display`= '$righttoDisplay', `call_status` = '$status', `bgChange` = '$bgChange', `call_status` = 'Action needed' WHERE care_calls = 'Lunch' AND `col_area_Id` = '$txtClientGroup' AND `col_weekly_routine` = '$firstAttempId' ");
                    if ($updatelunchColumn4) {

                        if ($txtNextWeeksTrue) { //if one weeek check box checked is true then insert double

                            $insertOneWeekSQL = mysqli_query($conn, "INSERT INTO tbl_schedule_calls (client_name, client_area, col_area_city, col_area_Id, uryyToeSS4, care_calls, Clientshift_Date, dateTime_in, dateTime_out, col_company_Id, col_weekly_routine) SELECT client_name, client_area, col_client_city, run_area_nameId, uryyToeSS4, care_calls, '$oneWeekInterval', dateTime_in, dateTime_out, col_company_Id, '$weekoneId' FROM tbl_manage_runs WHERE run_area_nameId = '$txtClientGroup' ");

                            if ($insertOneWeekSQL) {
                                $updateMysqlTable40 = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `first_carer`= '$db_workerNames', `second_carer`= '$db_workerNames2', `first_carer_Id`= '$txtFirstCarerId', `second_carer_Id`= '$txtSecondCarerId', `client_resource`= '$clientResource', `timeline_colour`= '$timelineColour', `rightTo_display`= '$righttoDisplay', `call_status` = '$status', `bgChange` = '$bgChange', `call_status` = 'Action needed' WHERE care_calls = 'Morning' AND `col_area_Id` = '$txtClientGroup' AND `col_weekly_routine` = '$weekoneId' ");
                                if ($updateMysqlTable40) {
                                    $updateMyRoasterView0 = mysqli_query($conn, "UPDATE `tbl_goesoft_users` SET `myviewArea`= 'General' WHERE `user_email_address` = '" . $_SESSION['usr_email'] . "' ");
                                    if ($updateMyRoasterView0) {
                                        $updatelunchColumn40 = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `first_carer`= '$db_workerNames', `second_carer`= '$db_workerNames2', `first_carer_Id`= '$txtFirstCarerId', `second_carer_Id`= '$txtSecondCarerId', `client_resource`= '$clientResource', `timeline_colour`= '$timelineColour', `rightTo_display`= '$righttoDisplay', `call_status` = '$status', `bgChange` = '$bgChange', `call_status` = 'Action needed' WHERE care_calls = 'Lunch' AND `col_area_Id` = '$txtClientGroup' AND `col_weekly_routine` = '$weekoneId' ");
                                        if ($updatelunchColumn40) {
                                            header("Location: ./success-page");
                                        }
                                    }
                                } else {
                                    header("Location: ./not-successful-page");
                                }
                            }
                        } else if ($txtNexttwoWeeksTrue) { //if halfday checkbox checked is true then do this

                            $insertOneWeekSQL = mysqli_query($conn, "INSERT INTO tbl_schedule_calls (client_name, client_area, col_area_city, col_area_Id, uryyToeSS4, care_calls, Clientshift_Date, dateTime_in, dateTime_out, col_company_Id, col_weekly_routine) SELECT client_name, client_area, col_client_city, run_area_nameId, uryyToeSS4, care_calls, '$twoWeekInterval', dateTime_in, dateTime_out, col_company_Id, '$weektwoId' FROM tbl_manage_runs WHERE run_area_nameId = '$txtClientGroup' ");

                            if ($insertOneWeekSQL) {
                                $updateMysqlTable40 = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `first_carer`= '$db_workerNames', `second_carer`= '$db_workerNames2', `first_carer_Id`= '$txtFirstCarerId', `second_carer_Id`= '$txtSecondCarerId', `client_resource`= '$clientResource', `timeline_colour`= '$timelineColour', `rightTo_display`= '$righttoDisplay', `call_status` = '$status', `bgChange` = '$bgChange', `call_status` = 'Action needed' WHERE care_calls = 'Morning' AND `col_area_Id` = '$txtClientGroup' AND `col_weekly_routine` = '$weektwoId' ");
                                if ($updateMysqlTable40) {
                                    $updateMyRoasterView0 = mysqli_query($conn, "UPDATE `tbl_goesoft_users` SET `myviewArea`= 'General' WHERE `user_email_address` = '" . $_SESSION['usr_email'] . "' ");
                                    if ($updateMyRoasterView0) {
                                        $updatelunchColumn40 = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `first_carer`= '$db_workerNames', `second_carer`= '$db_workerNames2', `first_carer_Id`= '$txtFirstCarerId', `second_carer_Id`= '$txtSecondCarerId', `client_resource`= '$clientResource', `timeline_colour`= '$timelineColour', `rightTo_display`= '$righttoDisplay', `call_status` = '$status', `bgChange` = '$bgChange', `call_status` = 'Action needed' WHERE care_calls = 'Lunch' AND `col_area_Id` = '$txtClientGroup' AND `col_weekly_routine` = '$weektwoId' ");
                                        if ($updatelunchColumn40) {
                                            header("Location: ./success-page");
                                        }
                                    }
                                } else {
                                    header("Location: ./not-successful-page");
                                }
                            }
                        } else { //if halfday checkbox checked is true then do this
                            header("Location: ./success-page");
                        }
                    }
                }
            } else {
                header("Location: ./not-successful-page");
            }
        }
        if ($txtLateCalls) { //if latecall checkbox checked is true then do this
            $updateMysqlTable4 = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `first_carer`= '$db_workerNames', `second_carer`= '$db_workerNames2', `first_carer_Id`= '$txtFirstCarerId', `second_carer_Id`= '$txtSecondCarerId', `Clientshift_Date`= '$txtShiftDate', `client_resource`= '$clientResource', `timeline_colour`= '$timelineColour', `rightTo_display`= '$righttoDisplay', `call_status` = '$status', `bgChange` = '$bgChange', `call_status` = 'Action needed' WHERE care_calls = 'Tea' AND `col_area_Id` = '$txtClientGroup' AND `col_weekly_routine` = '$firstAttempId' ");
            if ($updateMysqlTable4) {
                $updateMyRoasterView = mysqli_query($conn, "UPDATE `tbl_goesoft_users` SET `myviewArea`= 'General' WHERE `user_email_address` = '" . $_SESSION['usr_email'] . "' ");
                if ($updateMyRoasterView) {
                    $updatelunchColumn4 = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `first_carer`= '$db_workerNames', `second_carer`= '$db_workerNames2', `first_carer_Id`= '$txtFirstCarerId', `second_carer_Id`= '$txtSecondCarerId', `Clientshift_Date`= '$txtShiftDate', `client_resource`= '$clientResource', `timeline_colour`= '$timelineColour', `rightTo_display`= '$righttoDisplay', `call_status` = '$status', `bgChange` = '$bgChange', `call_status` = 'Action needed' WHERE care_calls = 'Bed' AND `col_area_Id` = '$txtClientGroup' AND `col_weekly_routine` = '$firstAttempId' ");
                    if ($updatelunchColumn4) {

                        if ($txtNextWeeksTrue) { //if one weeek check box checked is true then insert double

                            $insertOneWeekSQL = mysqli_query($conn, "INSERT INTO tbl_schedule_calls (client_name, client_area, col_area_city, col_area_Id, uryyToeSS4, care_calls, Clientshift_Date, dateTime_in, dateTime_out, col_company_Id, col_weekly_routine) SELECT client_name, client_area, col_client_city, run_area_nameId, uryyToeSS4, care_calls, '$oneWeekInterval', dateTime_in, dateTime_out, col_company_Id, '$weekoneId' FROM tbl_manage_runs WHERE run_area_nameId = '$txtClientGroup' ");

                            if ($insertOneWeekSQL) {
                                $updateMysqlTable40 = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `first_carer`= '$db_workerNames', `second_carer`= '$db_workerNames2', `first_carer_Id`= '$txtFirstCarerId', `second_carer_Id`= '$txtSecondCarerId', `client_resource`= '$clientResource', `timeline_colour`= '$timelineColour', `rightTo_display`= '$righttoDisplay', `call_status` = '$status', `bgChange` = '$bgChange', `call_status` = 'Action needed' WHERE care_calls = 'Tea' AND `col_area_Id` = '$txtClientGroup' AND `col_weekly_routine` = '$weekoneId' ");
                                if ($updateMysqlTable40) {
                                    $updateMyRoasterView0 = mysqli_query($conn, "UPDATE `tbl_goesoft_users` SET `myviewArea`= 'General' WHERE `user_email_address` = '" . $_SESSION['usr_email'] . "' ");
                                    if ($updateMyRoasterView0) {
                                        $updatelunchColumn40 = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `first_carer`= '$db_workerNames', `second_carer`= '$db_workerNames2', `first_carer_Id`= '$txtFirstCarerId', `second_carer_Id`= '$txtSecondCarerId', `client_resource`= '$clientResource', `timeline_colour`= '$timelineColour', `rightTo_display`= '$righttoDisplay', `call_status` = '$status', `bgChange` = '$bgChange', `call_status` = 'Action needed' WHERE care_calls = 'Bed' AND `col_area_Id` = '$txtClientGroup' AND `col_weekly_routine` = '$weekoneId' ");
                                        if ($updatelunchColumn40) {
                                            header("Location: ./success-page");
                                        }
                                    }
                                } else {
                                    header("Location: ./not-successful-page");
                                }
                            }
                        } else if ($txtNexttwoWeeksTrue) { //if halfday checkbox checked is true then do this

                            $insertOneWeekSQL = mysqli_query($conn, "INSERT INTO tbl_schedule_calls (client_name, client_area, col_area_city, col_area_Id, uryyToeSS4, care_calls, Clientshift_Date, dateTime_in, dateTime_out, col_company_Id, col_weekly_routine) SELECT client_name, client_area, col_client_city, run_area_nameId, uryyToeSS4, care_calls, '$twoWeekInterval', dateTime_in, dateTime_out, col_company_Id, '$weektwoId' FROM tbl_manage_runs WHERE run_area_nameId = '$txtClientGroup' ");

                            if ($insertOneWeekSQL) {
                                $updateMysqlTable40 = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `first_carer`= '$db_workerNames', `second_carer`= '$db_workerNames2', `first_carer_Id`= '$txtFirstCarerId', `second_carer_Id`= '$txtSecondCarerId', `client_resource`= '$clientResource', `timeline_colour`= '$timelineColour', `rightTo_display`= '$righttoDisplay', `call_status` = '$status', `bgChange` = '$bgChange', `call_status` = 'Action needed' WHERE care_calls = 'Tea' AND `col_area_Id` = '$txtClientGroup' AND `col_weekly_routine` = '$weektwoId' ");
                                if ($updateMysqlTable40) {
                                    $updateMyRoasterView0 = mysqli_query($conn, "UPDATE `tbl_goesoft_users` SET `myviewArea`= 'General' WHERE `user_email_address` = '" . $_SESSION['usr_email'] . "' ");
                                    if ($updateMyRoasterView0) {
                                        $updatelunchColumn40 = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `first_carer`= '$db_workerNames', `second_carer`= '$db_workerNames2', `first_carer_Id`= '$txtFirstCarerId', `second_carer_Id`= '$txtSecondCarerId', `client_resource`= '$clientResource', `timeline_colour`= '$timelineColour', `rightTo_display`= '$righttoDisplay', `call_status` = '$status', `bgChange` = '$bgChange', `call_status` = 'Action needed' WHERE care_calls = 'Bed' AND `col_area_Id` = '$txtClientGroup' AND `col_weekly_routine` = '$weektwoId' ");
                                        if ($updatelunchColumn40) {
                                            header("Location: ./success-page");
                                        }
                                    }
                                } else {
                                    header("Location: ./not-successful-page");
                                }
                            }
                        } else {
                            header("Location: ./success-page");
                        }
                    }
                }
            } else {
                header("Location: ./not-successful-page");
            }
        } //else if ($txtSupportCalls) { //if halfday checkbox checked is true then do this
        //$updateMysqlTable0 = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `first_carer`= '$db_workerNames', `second_carer`= '$db_workerNames2', `first_carer_Id`= '$txtFirstCarerId', `second_carer_Id`= '$txtSecondCarerId', `Clientshift_Date`= '$txtShiftDate', `client_resource`= '$clientResource', `timeline_colour`= '$timelineColour', `rightTo_display`= '$righttoDisplay', `bgChange` = '$bgChange', `call_status` = 'Action needed' WHERE care_calls = 'Support-work' AND `col_area_Id` = '$txtClientGroup' ");
        // if ($updateMysqlTable0) {
        //$updateMyRoasterView = mysqli_query($conn, "UPDATE `tbl_goesoft_users` SET `myviewArea`= 'General' WHERE `user_email_address` = '" . $_SESSION['usr_email'] . "' ");
        //header("Location: ./success-page");
        //} else {
        //header("Location: ./not-successful-page");
        //}
        //}
        else if ($txtAllDay) {
            $updateMysqlTable6 = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `first_carer`= '$db_workerNames', `second_carer`= '$db_workerNames2', `first_carer_Id`= '$txtFirstCarerId', `second_carer_Id`= '$txtSecondCarerId', `client_resource`= '$clientResource', `timeline_colour`= '$timelineColour', `rightTo_display`= '$righttoDisplay', `bgChange` = '$bgChange', `call_status` = 'Action needed' WHERE `col_area_Id` = '$txtClientGroup' ");
            if ($updateMysqlTable6) {
                $updateMyRoasterView = mysqli_query($conn, "UPDATE `tbl_goesoft_users` SET `myviewArea`= 'General' WHERE `user_email_address` = '" . $_SESSION['usr_email'] . "' ");
                if ($updateMyRoasterView) {
                    if ($txtNextWeeksTrue) { //if one weeek check box checked is true then insert double

                        $insertOneWeekSQL = mysqli_query($conn, "INSERT INTO tbl_schedule_calls (client_name, client_area, col_area_city, col_area_Id, uryyToeSS4, care_calls, Clientshift_Date, dateTime_in, dateTime_out, col_company_Id, col_weekly_routine) SELECT client_name, client_area, col_client_city, run_area_nameId, uryyToeSS4, care_calls, '$oneWeekInterval', dateTime_in, dateTime_out, col_company_Id, '$weekoneId' FROM tbl_manage_runs WHERE run_area_nameId = '$txtClientGroup' ");

                        if ($insertOneWeekSQL) {
                            $updateMysqlTable40 = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `first_carer`= '$db_workerNames', `second_carer`= '$db_workerNames2', `first_carer_Id`= '$txtFirstCarerId', `second_carer_Id`= '$txtSecondCarerId', `client_resource`= '$clientResource', `timeline_colour`= '$timelineColour', `rightTo_display`= '$righttoDisplay', `bgChange` = '$bgChange', `call_status` = 'Action needed' WHERE `col_area_Id` = '$txtClientGroup' AND `col_weekly_routine` = '$weekoneId' ");
                            if ($updateMysqlTable40) {
                                $updateMyRoasterView0 = mysqli_query($conn, "UPDATE `tbl_goesoft_users` SET `myviewArea`= 'General' WHERE `user_email_address` = '" . $_SESSION['usr_email'] . "' ");
                                if ($updateMyRoasterView0) {
                                    header("Location: ./success-page");
                                }
                            } else {
                                header("Location: ./not-successful-page");
                            }
                        }
                    } else if ($txtNexttwoWeeksTrue) { //if halfday checkbox checked is true then do this

                        $insertOneWeekSQL = mysqli_query($conn, "INSERT INTO tbl_schedule_calls (client_name, client_area, col_area_city, col_area_Id, uryyToeSS4, care_calls, Clientshift_Date, dateTime_in, dateTime_out, col_company_Id, col_weekly_routine) SELECT client_name, client_area, col_client_city, run_area_nameId, uryyToeSS4, care_calls, '$twoWeekInterval', dateTime_in, dateTime_out, col_company_Id, '$weektwoId' FROM tbl_manage_runs WHERE run_area_nameId = '$txtClientGroup' ");

                        if ($insertOneWeekSQL) {
                            $updateMysqlTable40 = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `first_carer`= '$db_workerNames', `second_carer`= '$db_workerNames2', `first_carer_Id`= '$txtFirstCarerId', `second_carer_Id`= '$txtSecondCarerId', `client_resource`= '$clientResource', `timeline_colour`= '$timelineColour', `rightTo_display`= '$righttoDisplay', `bgChange` = '$bgChange', `call_status` = 'Action needed' WHERE `col_area_Id` = '$txtClientGroup' AND `col_weekly_routine` = '$weektwoId' ");
                            if ($updateMysqlTable40) {
                                $updateMyRoasterView0 = mysqli_query($conn, "UPDATE `tbl_goesoft_users` SET `myviewArea`= 'General' WHERE `user_email_address` = '" . $_SESSION['usr_email'] . "' ");
                                if ($updateMyRoasterView0) {
                                    header("Location: ./success-page");
                                }
                            } else {
                                header("Location: ./not-successful-page");
                            }
                        }
                    } else { //if halfday checkbox checked is true then do this
                        header("Location: ./success-page");
                    }
                }
            } else {
                header("Location: ./not-successful-page");
            }
        }
    }
}
