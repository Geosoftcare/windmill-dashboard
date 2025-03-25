<?php
if (isset($_POST['btnScheduleRuns'])) {
    include('dbconnections.php');

    $txtFirstCarer = mysqli_real_escape_string($conn, trim($_REQUEST['txtFirstCarer']));
    $txtFirstCarerId = mysqli_real_escape_string($conn, $_REQUEST['txtFirstCarerId']);
    $txtClientGroup = mysqli_real_escape_string($conn, $_REQUEST['txtClientGroup']);

    $txtShiftDate = mysqli_real_escape_string($conn, $_REQUEST['txtShiftDate']);
    $txtRotaDateInDay = mysqli_real_escape_string($conn, $_REQUEST['txtRotaDateInDay']);
    $txtRunNameArea = mysqli_real_escape_string($conn, $_REQUEST['txtRunNameArea']);
    $txtRunNameCity = mysqli_real_escape_string($conn, $_REQUEST['txtRunNameCity']);

    $carecalls_Id = mysqli_real_escape_string($conn, $_REQUEST['carecallID']);
    $txtCurCarerId = mysqli_real_escape_string($conn, $_REQUEST['txtCurCarerId']);
    $txtRunName = mysqli_real_escape_string($conn, $_REQUEST['txtRunName']);
    $txtRunNameId = mysqli_real_escape_string($conn, $_REQUEST['txtRunNameId']);

    $attemptone = mysqli_real_escape_string($conn, $_REQUEST['firstAttempId']);
    $attempttwo = mysqli_real_escape_string($conn, $_REQUEST['weekoneId']);
    $attemptthree = mysqli_real_escape_string($conn, $_REQUEST['weektwoId']);

    $firstAttempId = hash('sha256', $attemptone);
    $weekoneId = hash('sha256', $attempttwo);
    $weektwoId = hash('sha256', $attemptthree);

    $timelineColour = "#34495e";
    $righttoDisplay = "True";
    $status = "Scheduled";
    $bgChange = 'rgba(44, 62, 80,.5)';

    $txtNextWeeksTrue = mysqli_real_escape_string($conn, $_REQUEST['txtNextWeeksTrue']);
    $txtNexttwoWeeksTrue = mysqli_real_escape_string($conn, $_REQUEST['txtNexttwoWeeksTrue']);

    $oneWeekInterval = date("Y-m-d", strtotime($txtShiftDate . "+7 day"));
    $twoWeekInterval = date("Y-m-d", strtotime($txtShiftDate . "+14 day"));

    $txtPayCarer = "True";
    $txtInvoice = "True";
    $txtVisitColorCode = "rgba(255, 255, 255,1.0)";


    $sel_firstcarer_Name = mysqli_query($conn, "SELECT * FROM tbl_general_team_form WHERE (uryyTteamoeSS4 = '$txtFirstCarerId' 
    AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
    $row = mysqli_fetch_array($sel_firstcarer_Name, MYSQLI_ASSOC);
    $db_workerNames = $row['team_first_name'] . " " . $row['team_last_name'];
    $db_firstCarerWorkRes = $row['col_team_resource'];

    $sql_get_firstcall_timein = mysqli_query($conn, "SELECT MIN(dateTime_in) AS callTimeIn FROM tbl_manage_runs 
    WHERE (run_area_nameId = '$txtRunNameId' AND col_right_to_display = 'True' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') 
    ORDER BY userId ASC LIMIT 1 ");
    $row_get_firstcall_timein = mysqli_fetch_array($sql_get_firstcall_timein, MYSQLI_ASSOC);
    $varFirstCallTimeIn = $row_get_firstcall_timein['callTimeIn'];

    $sql_get_lastcall_timeout = mysqli_query($conn, "SELECT MAX(dateTime_out) AS callTimeOUt FROM tbl_manage_runs 
    WHERE (run_area_nameId = '$txtRunNameId' AND col_right_to_display = 'True' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') 
    ORDER BY userId DESC LIMIT 1 ");
    $row_get_lastcall_timeout = mysqli_fetch_array($sql_get_lastcall_timeout, MYSQLI_ASSOC);
    $varLastCallTimeOut = $row_get_lastcall_timeout['callTimeOUt'];

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Check if it's one week if that's is true then get all the one week information and add it up

    $todayDay = date("l", strtotime($txtShiftDate));
    if ($txtRotaDateInDay == $todayDay) {
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        if ($txtNextWeeksTrue) {
            //Check if it's one week if that's is true then get all the one week information and add it up
            $myCheck = "SELECT * FROM tbl_schedule_calls WHERE col_area_Id = '$txtClientGroup' AND `Clientshift_Date` = '$txtShiftDate' ";
            $myCheckres = mysqli_query($conn, $myCheck);
            $countRes = mysqli_num_rows($myCheckres);
            if ($countRes != 0) {
                //If this care call already exist the date selected then redirect to already exist page
                $sql_change_run_carer01 = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `first_carer`= '$db_workerNames', `first_carer_Id`= '$txtFirstCarerId', `team_resource`= '$db_firstCarerWorkRes' WHERE (col_area_Id = '$txtClientGroup' AND Clientshift_Date = '$txtShiftDate') ");
                if ($sql_change_run_carer01) {
                    $sql_change_run_carer02 = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `first_carer`= '$db_workerNames', `first_carer_Id`= '$txtFirstCarerId', `team_resource`= '$db_firstCarerWorkRes' WHERE (col_area_Id = '$txtClientGroup' AND Clientshift_Date = '$oneWeekInterval') ");
                    if ($sql_change_run_carer02) {
                        header("Location: ./roster/schedule-run-756473-00499-99553-85006?txtDate=$txtShiftDate");
                    }
                }
            } else {
                //If this care call dosen't exist on the date selected then insert a new care call
                $CopyClient_timeDetail = mysqli_query($conn, "INSERT INTO tbl_schedule_calls (client_name, client_area, col_area_city, col_area_Id, uryyToeSS4, first_carer, first_carer_Id, care_calls, dateTime_in, dateTime_out, col_required_carers, Clientshift_Date, team_resource, timeline_colour, rightTo_display, call_status, bgChange, col_period_one, col_period_two, col_pay_status, col_invoice_status, col_company_Id, col_weekly_routine) 
                SELECT client_name, client_area, col_client_city, run_area_nameId, uryyToeSS4, '$db_workerNames', '$txtFirstCarerId', care_calls, dateTime_in, dateTime_out, col_required_carers, '$txtShiftDate', '$db_firstCarerWorkRes', '$timelineColour', '$righttoDisplay', '$status', '$bgChange',  col_period_one, col_period_two, '$txtPayCarer', '$txtInvoice', col_company_Id, '$firstAttempId' FROM tbl_manage_runs WHERE 
                (run_area_nameId = '$txtClientGroup' AND (col_startDate <= '$txtShiftDate' AND col_occurence != '$txtShiftDate' AND col_endDate >= '$txtShiftDate' OR col_endDate = '') AND col_right_to_display = '$righttoDisplay' AND (col_monday = '$todayDay' OR col_tuesday = '$todayDay' OR col_wednesday = '$todayDay' OR col_thursday = '$todayDay' OR col_friday = '$todayDay' OR col_saturday = '$todayDay' OR col_sunday = '$todayDay')) ");
                if ($CopyClient_timeDetail) {
                    $CopyClient_timeDetailRun = mysqli_query($conn, "INSERT INTO tbl_schedule_calls (client_name, client_area, col_area_city, col_area_Id, uryyToeSS4, first_carer, first_carer_Id, care_calls, dateTime_in, dateTime_out, col_required_carers, Clientshift_Date, team_resource, timeline_colour, rightTo_display, call_status, bgChange, col_period_one, col_period_two, col_pay_status, col_invoice_status, col_company_Id, col_weekly_routine) 
                    VALUE('$txtRunName','$txtRunNameArea','$txtRunNameCity','$txtRunNameId','Null','$txtFirstCarer','$txtFirstCarerId','Care run','$varFirstCallTimeIn','$varLastCallTimeOut','Null','$txtShiftDate','$db_firstCarerWorkRes','rgba(200, 214, 229,1.0)','True','Progressive','rgba(200, 214, 229,1.0)','Null','Null','Null','Null','" . $_SESSION['usr_compId'] . "','Null') ");
                    if ($CopyClient_timeDetailRun) {
                        //Insert data for next week (repeat routine)
                        $firstCarer_nextWeek = mysqli_query($conn, "INSERT INTO tbl_schedule_calls (client_name, client_area, col_area_city, col_area_Id, uryyToeSS4, first_carer, first_carer_Id, care_calls, dateTime_in, dateTime_out, col_required_carers, Clientshift_Date, team_resource, timeline_colour, rightTo_display, call_status, bgChange, col_period_one, col_period_two, col_pay_status, col_invoice_status, col_company_Id, col_weekly_routine) 
                        SELECT client_name, client_area, col_client_city, run_area_nameId, uryyToeSS4, '$db_workerNames', '$txtFirstCarerId', care_calls, dateTime_in, dateTime_out, col_required_carers, '$oneWeekInterval', '$db_firstCarerWorkRes', '$timelineColour', '$righttoDisplay', '$status', '$bgChange',  col_period_one, col_period_two, '$txtPayCarer', '$txtInvoice', col_company_Id, '$firstAttempId' FROM tbl_manage_runs 
                        WHERE (run_area_nameId = '$txtClientGroup' AND (col_startDate <= '$txtShiftDate' AND col_occurence != '$txtShiftDate' AND col_endDate >= '$txtShiftDate' OR col_endDate = '') AND col_right_to_display = '$righttoDisplay' AND (col_monday = '$todayDay' OR col_tuesday = '$todayDay' OR col_wednesday = '$todayDay' OR col_thursday = '$todayDay' OR col_friday = '$todayDay' OR col_saturday = '$todayDay' OR col_sunday = '$todayDay')) ");
                        if ($firstCarer_nextWeek) {
                            $firstCarer_nextWeekRun = mysqli_query($conn, "INSERT INTO tbl_schedule_calls (client_name, client_area, col_area_city, col_area_Id, uryyToeSS4, first_carer, first_carer_Id, care_calls, dateTime_in, dateTime_out, col_required_carers, Clientshift_Date, team_resource, timeline_colour, rightTo_display, call_status, bgChange, col_period_one, col_period_two, col_pay_status, col_invoice_status, col_company_Id, col_weekly_routine) 
                            VALUE('$txtRunName','$txtRunNameArea','$txtRunNameCity','$txtRunNameId','Null','$txtFirstCarer','$txtFirstCarerId','Care run','$varFirstCallTimeIn','$varLastCallTimeOut','Null','$oneWeekInterval','$db_firstCarerWorkRes','rgba(200, 214, 229,1.0)','True','Progressive','rgba(200, 214, 229,1.0)','Null','Null','Null','Null','" . $_SESSION['usr_compId'] . "','Null') ");
                            if ($firstCarer_nextWeekRun) {
                                header("Location: ./roster/schedule-run-756473-00499-99553-85006?txtDate=$txtShiftDate");
                            }
                        }
                    }
                }
            }
        } else if ($txtNexttwoWeeksTrue) {
            //Check if it's one week if that's is true then get all the one week information and add it up
            $myCheck = "SELECT * FROM tbl_schedule_calls WHERE col_area_Id = '$txtClientGroup' AND `Clientshift_Date` = '$txtShiftDate' ";
            $myCheckres = mysqli_query($conn, $myCheck);
            $countRes = mysqli_num_rows($myCheckres);
            if ($countRes != 0) {
                //If this care call already exist the date selected then redirect to already exist page
                $sql_change_run_carer01 = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `first_carer`= '$db_workerNames', `first_carer_Id`= '$txtFirstCarerId', `team_resource`= '$db_firstCarerWorkRes' WHERE (col_area_Id = '$txtClientGroup' AND Clientshift_Date = '$txtShiftDate') ");
                if ($sql_change_run_carer01) {
                    $sql_change_run_carer02 = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `first_carer`= '$db_workerNames', `first_carer_Id`= '$txtFirstCarerId', `team_resource`= '$db_firstCarerWorkRes' WHERE (col_area_Id = '$txtClientGroup' AND Clientshift_Date = '$twoWeekInterval') ");
                    if ($sql_change_run_carer02) {
                        header("Location: ./roster/schedule-run-756473-00499-99553-85006?txtDate=$txtShiftDate");
                    }
                }
            } else {
                //If this care call dosen't exist on the date selected then insert a new care call
                $CopyClient_timeDetail = mysqli_query($conn, "INSERT INTO tbl_schedule_calls (client_name, client_area, col_area_city, col_area_Id, uryyToeSS4, first_carer, first_carer_Id, care_calls, dateTime_in, dateTime_out, col_required_carers, Clientshift_Date, team_resource, timeline_colour, rightTo_display, call_status, bgChange,  col_period_one, col_period_two, col_pay_status, col_invoice_status, col_company_Id, col_weekly_routine) 
                SELECT client_name, client_area, col_client_city, run_area_nameId, uryyToeSS4, '$db_workerNames', '$txtFirstCarerId', care_calls, dateTime_in, dateTime_out, col_required_carers, '$txtShiftDate', '$db_firstCarerWorkRes', '$timelineColour', '$righttoDisplay', '$status', '$bgChange',  col_period_one, col_period_two, '$txtPayCarer', '$txtInvoice', col_company_Id, '$firstAttempId' FROM tbl_manage_runs 
                WHERE (run_area_nameId = '$txtClientGroup' AND (col_startDate <= '$txtShiftDate' AND col_occurence != '$txtShiftDate' AND col_endDate >= '$txtShiftDate' OR col_endDate = '') AND col_right_to_display = '$righttoDisplay' AND (col_monday = '$todayDay' OR col_tuesday = '$todayDay' OR col_wednesday = '$todayDay' OR col_thursday = '$todayDay' OR col_friday = '$todayDay' OR col_saturday = '$todayDay' OR col_sunday = '$todayDay')) ");
                if ($CopyClient_timeDetail) {
                    $CopyClient_timeDetailRun = mysqli_query($conn, "INSERT INTO tbl_schedule_calls (client_name, client_area, col_area_city, col_area_Id, uryyToeSS4, first_carer, first_carer_Id, care_calls, dateTime_in, dateTime_out, col_required_carers, Clientshift_Date, team_resource, timeline_colour, rightTo_display, call_status, bgChange, col_period_one, col_period_two, col_pay_status, col_invoice_status, col_company_Id, col_weekly_routine) 
                    VALUE('$txtRunName','$txtRunNameArea','$txtRunNameCity','$txtRunNameId','Null','$txtFirstCarer','$txtFirstCarerId','Care run','$varFirstCallTimeIn','$varLastCallTimeOut','Null','$txtShiftDate','$db_firstCarerWorkRes','rgba(200, 214, 229,1.0)','True','Progressive','rgba(200, 214, 229,1.0)','Null','Null','Null','Null','" . $_SESSION['usr_compId'] . "','Null') ");
                    if ($CopyClient_timeDetailRun) {
                        //Insert data for next week (repeat routine)
                        $firstCarer_nexTwotWeek = mysqli_query($conn, "INSERT INTO tbl_schedule_calls (client_name, client_area, col_area_city, col_area_Id, uryyToeSS4, first_carer, first_carer_Id, care_calls, dateTime_in, dateTime_out, col_required_carers, Clientshift_Date, team_resource, timeline_colour, rightTo_display, call_status, bgChange,  col_period_one, col_period_two, col_pay_status, col_invoice_status, col_company_Id, col_weekly_routine) 
                        SELECT client_name, client_area, col_client_city, run_area_nameId, uryyToeSS4, '$db_workerNames', '$txtFirstCarerId', care_calls, dateTime_in, dateTime_out, col_required_carers, '$twoWeekInterval', '$db_firstCarerWorkRes', '$timelineColour', '$righttoDisplay', '$status', '$bgChange',  col_period_one, col_period_two, '$txtPayCarer', '$txtInvoice', col_company_Id, '$firstAttempId' FROM tbl_manage_runs 
                        WHERE (run_area_nameId = '$txtClientGroup' AND (col_startDate <= '$txtShiftDate' AND col_occurence != '$txtShiftDate' AND col_endDate >= '$txtShiftDate' OR col_endDate = '') AND col_right_to_display = '$righttoDisplay' AND (col_monday = '$todayDay' OR col_tuesday = '$todayDay' OR col_wednesday = '$todayDay' OR col_thursday = '$todayDay' OR col_friday = '$todayDay' OR col_saturday = '$todayDay' OR col_sunday = '$todayDay')) ");
                        if ($firstCarer_nexTwotWeek) {
                            $firstCarer_nextTwoWeekRun = mysqli_query($conn, "INSERT INTO tbl_schedule_calls (client_name, client_area, col_area_city, col_area_Id, uryyToeSS4, first_carer, first_carer_Id, care_calls, dateTime_in, dateTime_out, col_required_carers, Clientshift_Date, team_resource, timeline_colour, rightTo_display, call_status, bgChange, col_period_one, col_period_two, col_pay_status, col_invoice_status, col_company_Id, col_weekly_routine) 
                            VALUE('$txtRunName','$txtRunNameArea','$txtRunNameCity','$txtRunNameId','Null','$txtFirstCarer','$txtFirstCarerId','Care run','$varFirstCallTimeIn','$varLastCallTimeOut','Null','$twoWeekInterval','$db_firstCarerWorkRes','rgba(200, 214, 229,1.0)','True','Progressive','rgba(200, 214, 229,1.0)','Null','Null','Null','Null','" . $_SESSION['usr_compId'] . "','Null') ");
                            if ($firstCarer_nextTwoWeekRun) {
                                header("Location: ./roster/schedule-run-756473-00499-99553-85006?txtDate=$txtShiftDate");
                            }
                        }
                    }
                }
            }
        } else {
            $myCheck = "SELECT * FROM tbl_schedule_calls WHERE col_area_Id = '$txtClientGroup' AND `Clientshift_Date` = '$txtShiftDate' ";
            $myCheckres = mysqli_query($conn, $myCheck);
            $countRes = mysqli_num_rows($myCheckres);
            if ($countRes != 0) {
                //If this care call already exist with the date selected then update the carer and the carer work resource
                $sql_change_run_carer = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `first_carer`= '$db_workerNames', `first_carer_Id`= '$txtFirstCarerId', `team_resource`= '$db_firstCarerWorkRes' WHERE (col_area_Id = '$txtClientGroup' AND Clientshift_Date = '$txtShiftDate') ");
                if ($sql_change_run_carer) {
                    header("Location: ./roster/schedule-run-756473-00499-99553-85006?txtDate=$txtShiftDate");
                }
            } else {
                //if next and next two week checkbox is not checked then insert a new care call
                $CopyClient_timeDetail = mysqli_query($conn, "INSERT INTO tbl_schedule_calls (client_name, client_area, col_area_city, col_area_Id, uryyToeSS4, first_carer, first_carer_Id, care_calls, dateTime_in, dateTime_out, col_required_carers, Clientshift_Date, team_resource, timeline_colour, col_visitColor_code, rightTo_display, call_status, bgChange, col_period_one, col_period_two, col_pay_status, col_invoice_status, col_company_Id, col_weekly_routine) 
                SELECT client_name, client_area, col_client_city, run_area_nameId, uryyToeSS4, '$db_workerNames', '$txtFirstCarerId', care_calls, dateTime_in, dateTime_out, col_required_carers, '$txtShiftDate', '$db_firstCarerWorkRes', '$timelineColour', '$txtVisitColorCode', '$righttoDisplay', '$status', '$bgChange', col_period_one, col_period_two, '$txtPayCarer', '$txtInvoice', col_company_Id, '$firstAttempId' FROM tbl_manage_runs 
                WHERE (run_area_nameId = '$txtClientGroup' AND (col_startDate <= '$txtShiftDate' AND col_occurence != '$txtShiftDate' AND col_endDate >= '$txtShiftDate' OR col_endDate = '') AND col_right_to_display = '$righttoDisplay' AND (col_monday = '$todayDay' OR col_tuesday = '$todayDay' OR col_wednesday = '$todayDay' OR col_thursday = '$todayDay' OR col_friday = '$todayDay' OR col_saturday = '$todayDay' OR col_sunday = '$todayDay')) ");
                if ($CopyClient_timeDetail) {
                    $CopyClient_timeDetail2 = mysqli_query($conn, "INSERT INTO tbl_schedule_calls (client_name, client_area, col_area_city, col_area_Id, uryyToeSS4, first_carer, first_carer_Id, care_calls, dateTime_in, dateTime_out, col_required_carers, Clientshift_Date, team_resource, timeline_colour, rightTo_display, call_status, bgChange, col_period_one, col_period_two, col_pay_status, col_invoice_status, col_company_Id, col_weekly_routine) 
                    VALUE('$txtRunName','$txtRunNameArea','$txtRunNameCity','$txtRunNameId','Null','$txtFirstCarer','$txtFirstCarerId','Care run','$varFirstCallTimeIn','$varLastCallTimeOut','Null','$txtShiftDate','$db_firstCarerWorkRes','rgba(200, 214, 229,1.0)','True','Progressive','rgba(200, 214, 229,1.0)','Null','Null','Null','Null','" . $_SESSION['usr_compId'] . "','Null') ");
                    if ($CopyClient_timeDetail2) {
                        header("Location: ./roster/schedule-run-756473-00499-99553-85006?txtDate=$txtShiftDate");
                    }
                }
            }
        }
    }
}
