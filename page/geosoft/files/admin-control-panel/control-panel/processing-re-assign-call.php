<?php
if (isset($_POST['btnScheduleRuns'])) {
    include('dbconnections.php');

    $txtFirstCarerId = mysqli_real_escape_string($conn, $_REQUEST['txtCarerId']);
    $txtClientGroup = mysqli_real_escape_string($conn, $_REQUEST['txtClientGroup']);
    $txtCarerName = mysqli_real_escape_string($conn, $_REQUEST['txtCarerName']);
    $txtCarerResources = mysqli_real_escape_string($conn, $_REQUEST['txtCarerResources']);

    $txtShiftDate = mysqli_real_escape_string($conn, $_REQUEST['txtShiftDate']);
    $txtRotaDateInDay = mysqli_real_escape_string($conn, $_REQUEST['txtRotaDateInDay']);

    $carecalls_Id = mysqli_real_escape_string($conn, $_REQUEST['carecallID']);

    $attemptone = mysqli_real_escape_string($conn, $_REQUEST['firstAttempId']);
    $attempttwo = mysqli_real_escape_string($conn, $_REQUEST['weekoneId']);
    $attemptthree = mysqli_real_escape_string($conn, $_REQUEST['weektwoId']);
    $txtClientSpecId = mysqli_real_escape_string($conn, $_REQUEST['txtClientSpecId']);
    $txtCareCalls = mysqli_real_escape_string($conn, $_REQUEST['txtCareCalls']);

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

    $sel_firstcarer_Name = mysqli_query($conn, "SELECT * FROM tbl_general_team_form WHERE uryyTteamoeSS4 = '$txtFirstCarerId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ");
    while ($row = mysqli_fetch_array($sel_firstcarer_Name)) {
        $db_workerNames = $row['team_first_name'] . " " . $row['team_last_name'];
        $db_firstCarerWorkRes = $row['col_team_resource'];
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $myCheck = "SELECT * FROM tbl_schedule_calls WHERE (uryyToeSS4 = '$txtClientSpecId' AND care_calls = '$txtCareCalls' AND first_carer_Id = '$txtFirstCarerId' AND `Clientshift_Date` = '$txtShiftDate') ";
    $myCheckres = mysqli_query($conn, $myCheck);
    $countRes = mysqli_num_rows($myCheckres);
    if ($countRes != 0) {
        //If this care call already exist the date selected then redirect to already exist page
        $sql_change_run_carer = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `first_carer`= '$txtCarerName', `first_carer_Id`= '$txtFirstCarerId', `team_resource`= '$txtCarerResources' WHERE (uryyToeSS4 = '$txtClientSpecId' AND care_calls = '$txtCareCalls' AND first_carer_Id = '$txtFirstCarerId' AND `Clientshift_Date` = '$txtShiftDate') ");
        if ($sql_change_run_carer) {
            header("Location:  ./roster/schedule-run-756473-00499-99553-85006?txtDate=$txtShiftDate");
        }
    } else {
        //if next and next two week checkbox is not checked then insert a new care call
        $CopyClient_timeDetail = mysqli_query($conn, "INSERT INTO tbl_schedule_calls (client_name, client_area, col_area_city, col_area_Id, uryyToeSS4, first_carer, first_carer_Id, care_calls, dateTime_in, dateTime_out, col_required_carers, Clientshift_Date, team_resource, timeline_colour, rightTo_display, call_status, bgChange, col_occurence, col_period_one, col_period_two, col_company_Id, col_weekly_routine) 
            SELECT client_name, client_area, col_client_city, run_area_nameId, uryyToeSS4, '$txtCarerName', '$txtFirstCarerId', care_calls, dateTime_in, dateTime_out, col_required_carers, '$txtShiftDate', '$txtCarerResources', '$timelineColour', '$righttoDisplay', '$status', '$bgChange', col_occurence, col_period_one, col_period_two, col_company_Id, '$firstAttempId' FROM tbl_manage_runs WHERE (uryyToeSS4 = '$txtClientSpecId' AND care_calls = '$txtCareCalls' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ORDER BY userId DESC LIMIT 1 ");
        if ($CopyClient_timeDetail) {
            header("Location:  ./roster/schedule-run-756473-00499-99553-85006?txtDate=$txtShiftDate");
        }
    }
}
