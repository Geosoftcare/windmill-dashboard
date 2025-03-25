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
    $postcode = mysqli_real_escape_string($conn, $_POST['txtClientPostCode']);
    $txtCarerName = mysqli_real_escape_string($conn, $_POST['txtCarerName']);
    $txtCarerPC = mysqli_real_escape_string($conn, $_POST['txtCarerPC']);
    $txtTaskNote = "Null";
    $txtCarerId = mysqli_real_escape_string($conn, $_POST['txtCarerId']);

    $timeSheetDate = mysqli_real_escape_string($conn, $_POST['txtTimeSheetDate']);
    $txtColAreaId = mysqli_real_escape_string($conn, $_POST['txtColAreaId']);
    $txtcompanyId = mysqli_real_escape_string($conn, $_POST['txtcompanyId']);
    $txtClientSpecialUserId = mysqli_real_escape_string($conn, $_POST['txtClientSpecialUserId']);

    $txtVariousCareCalls = mysqli_real_escape_string($conn, $_POST['txtVariousCareCalls']);
    $txtCareCallsStartTime = mysqli_real_escape_string($conn, $_POST['txtCareCallsStartTime']);
    $txtCareCallsEndTime = mysqli_real_escape_string($conn, $_POST['txtCareCallsEndTime']);
    $txtFirstCarerIdPin = mysqli_real_escape_string($conn, $_POST['txtFirstCarerIdPin']);
    $txtClientCareCallsDate = mysqli_real_escape_string($conn, $_POST['txtClientCareCallsDate']);

    $deviceLat = mysqli_real_escape_string($conn, $_POST['txtLatitude']);
    $deviceLon = mysqli_real_escape_string($conn, $_POST['txtLongitude']);

    $txtConformedVisit = 'Unconfirmed';

    $apiKey = "AIzaSyD6PMtd0Xclj8iUbXOzQFoSjYSFYLyiVyM";

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //This is to get the client funding, calculate the total hours worked and the total funding
    $sql_get_visit_funding = mysqli_query($conn, "SELECT * FROM `tbl_manage_runs` 
    WHERE (uryyToeSS4 = '$txtClientId' AND care_calls = '$txtVariousCareCalls' AND `col_company_Id` = '" . $_SESSION['usr_compId'] . "') ORDER BY userId DESC LIMIT 1 ");
    $row_get_visit_funding = mysqli_fetch_array($sql_get_visit_funding, MYSQLI_ASSOC);
    $varFundingName = $row_get_visit_funding['col_client_funding'];
    $varFundingRate = $row_get_visit_funding['col_funding_rate'];

    $result = mysqli_query($conn, "SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(`dateTime_out`, `dateTime_in`)))) AS total_worked_hours FROM `tbl_schedule_calls` 
    WHERE (userId = '$txtClientSpecialUserId' AND `col_company_Id` = '" . $_SESSION['usr_compId'] . "')");
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $total_hours = $row['total_worked_hours'];
    $time = strtotime($total_hours);
    $round = 60;
    $rounded = round($time / $round) * $round;
    $displayCurHour = date("H", $rounded);
    $displayCurMint = date("i", $rounded);

    function calculatePay($hours, $minutes, $hourlyRate)
    {
        // Convert minutes to hours
        $totalHours = $hours + ($minutes / 60);
        // Calculate total pay
        return $totalHours * $hourlyRate;
    }
    // Example usage:
    $hoursWorked = $displayCurHour; // Total hours worked
    $minutesWorked = $displayCurMint; // Total minutes worked
    $hourlyRate = $varFundingRate; // Hourly rate in currency units

    $totalPay = calculatePay($hoursWorked, $minutesWorked, $hourlyRate);
    $varClientWorkedRate = number_format((float)$totalPay, 2, '.', '');

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    $minDevicetimeCheck = date("H");
    $Devicetime = date("H:i");
    $deviceTimestamp = strtotime($Devicetime) + 60 * 60;
    $CurrentDeviceTime = date('H:i', $deviceTimestamp);

    $fsDeviceTime = strtotime($CurrentDeviceTime);
    $carecallStartTime = strtotime($txtCareCallsStartTime);

    $dateConvertion = date('Y-m-d', strtotime($txtStartDate));

    $bgChange = "rgba(25, 42, 86,1.0)";
    $status = "Not completed";
    $txtVisitStatus = "True";
    $txtConfirmedVisit = "Unconfirmed";

    //if ($curdistance < 60) {
    /////////////////////////////
    //Collect recent client postcode from, to calculate the distance to the next client postcodes e.g from wv1 4dj to wv6 5ab.
    ////////////////////////////

    $sql_get_recent_visit_pc = mysqli_query($conn, "SELECT * FROM tbl_daily_shift_records WHERE (shift_date = '$today' AND col_carer_Id = '$txtCarerId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ORDER BY userId DESC LIMIT 1");
    $row_get_recent_visit_pc = mysqli_fetch_array($sql_get_recent_visit_pc, MYSQLI_ASSOC);
    $prevClientPC = $row_get_recent_visit_pc['col_postcode'];
    $count_get_recent_visit_pc = mysqli_num_rows($sql_get_recent_visit_pc);
    if ($count_get_recent_visit_pc != 0) {
        //This is to get the carer miles travelled
        function getDistance($origin, $destination, $apiKey)
        {
            $origin = urlencode($origin);
            $destination = urlencode($destination);
            $url = "https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=$origin&destinations=$destination&key=$apiKey";
            $response = file_get_contents($url);
            $data = json_decode($response, true);
            if ($data['status'] == 'OK') {
                $distance = $data['rows'][0]['elements'][0]['distance']['text'];
                return $distance; // Return the distance value
            } else {
                return "Error: " . $data['status']; // Handle API errors
            }
        }
        $distanceMiles = getDistance($prevClientPC, $postcode, $apiKey);
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //Insertion code begins from here with other validations//
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //This code is to check if the time for this visit is greater than the current time. If so, it will redirect to the warning page.
        if ($txtStartDate == $today) {
            if ($carecallStartTime > $fsDeviceTime) {
                $_SESSION['uryyToeSS4'] = $txtClientId;
                $_SESSION['clientcarecalluserIdVar'] = $txtClientSpecialUserId;
                header("Location: ./warning-care-call-time?userId=$txtClientSpecialUserId");
            } else {
                //This is to check if this visit for today exist in the database. If it does, it will redirect to the warning page.
                $sql_check_today_visit = mysqli_query($conn, "SELECT * FROM tbl_daily_shift_records WHERE (shift_date = '$today' AND col_carer_Id = '$txtCarerId' AND uryyToeSS4 = '$txtClientId' AND col_care_call = '$txtVariousCareCalls' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ORDER BY userId DESC LIMIT 1");
                $count_check_today_visit = mysqli_num_rows($sql_check_today_visit);
                if ($count_check_today_visit != 0) {
                    header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                } else {
                    //This is to check if the current time and visit time is not too great a difference. If so, check for ongoing care call.
                    $_SESSION['uryyToeSS4'] = $txtClientId;
                    $_SESSION['clientcarecalluserIdVar'] = $txtClientSpecialUserId;
                    $sql_check_call_status = mysqli_query($conn, "SELECT * FROM tbl_daily_shift_records WHERE (shift_date = '$today' AND shift_end_time = 'Null' AND col_carer_Id = '" . $_SESSION['usr_carerId'] . "' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ORDER BY userId DESC LIMIT 1 ");
                    $row_check_call_status = mysqli_fetch_array($sql_check_call_status, MYSQLI_ASSOC);
                    $varClientId = $row_check_call_status['uryyToeSS4'];
                    $count_check_call_status = mysqli_num_rows($sql_check_call_status);
                    if ($count_check_call_status != 0) {
                        header("Location: ./ongoing-care-call?uryyToeSS4=$varClientId");
                    } else {
                        //if the care call has not started yet it will insert data and then it will be redirected to the ongoing care call page
                        $queryInsNewData = mysqli_query($conn, "INSERT INTO tbl_daily_shift_records (shift_status, shift_date, shift_start_time, shift_end_time, client_name, uryyToeSS4, col_care_call, client_group, carer_Name, task_note, col_carer_Id, timesheet_date, col_area_Id, col_company_Id, col_miles, col_client_rate, col_client_payer, col_visit_status, col_visit_confirmation, col_care_call_Id, col_postcode) 
                        VALUES('" . $txtStart . "', '" . $dateConvertion . "', '" . $txtStartTime . "', '" . $txtEndTime . "', '" . $txtClientName . "', '" . $txtClientId . "', '" . $txtVariousCareCalls . "', '" . $txtClientArea . "', '" . $txtCarerName . "', '" . $txtTaskNote . "', '" . $txtCarerId . "', '" . $timeSheetDate . "', '" . $txtColAreaId . "', '" . $txtcompanyId . "', '" . $distanceMiles . "', '" . $varClientWorkedRate . "', '" . $varFundingName . "', '" . $txtVisitStatus . "', '" . $txtConformedVisit . "', '" . $txtClientSpecialUserId . "', '" . $postcode . "') ");
                        if ($queryInsNewData) {
                            $Update_rota_status_Sql = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `timeline_colour` = '$bgChange', `bgChange` = '$bgChange', `call_status` = '$status' WHERE (userId = '$txtClientSpecialUserId') ");
                            if ($Update_rota_status_Sql) {
                                $myCheck = "SELECT * FROM tbl_care_calls WHERE col_shift_date = '$today' AND col_care_call = '$txtVariousCareCalls' AND uryyToeSS4 = '$txtcompanyId' ";
                                $myCheckres = mysqli_query($conn, $myCheck);
                                $countRes = mysqli_num_rows($myCheckres);
                                if ($countRes != 0) {
                                    header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                } else {
                                    $InsCareCallNumber = mysqli_query($conn, "INSERT INTO tbl_care_calls (col_client_Id, col_client_name, col_shift_date, col_care_call, uryyToeSS4, col_carer_Id, col_company_Id) 
                                    VALUES('" . $txtClientSpecialUserId . "', '" . $txtClientName . "', '" . $dateConvertion . "', '" . $txtVariousCareCalls . "', '" . $txtClientId . "', '" . $txtCarerId . "', '$txtcompanyId') ");
                                    if ($InsCareCallNumber) {
                                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                    }
                                }
                            }
                        }
                    }
                }
            }
        } else {
            header('Location: ./care-call-day-alert');
        }
    } else {
        /////////////////////////////
        //If there is no recent client postcode in table for today then select the carer postcode to calculate the next distance.
        //This actually works in the morning to the distance or mileage.
        ////////////////////////////
        //This is to get the carer miles travelled
        function getDistance($origin, $destination, $apiKey)
        {
            $origin = urlencode($origin);
            $destination = urlencode($destination);
            $url = "https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=$origin&destinations=$destination&key=$apiKey";
            $response = file_get_contents($url);
            $data = json_decode($response, true);
            if ($data['status'] == 'OK') {
                $distance = $data['rows'][0]['elements'][0]['distance']['text'];
                return $distance; // Return the distance value
            } else {
                return "Error: " . $data['status']; // Handle API errors
            }
        }
        $distanceMiles = getDistance($txtCarerPC, $postcode, $apiKey);
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //Insertion code begins from here with other validations//
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        if ($txtStartDate == $today) {
            if ($carecallStartTime > $fsDeviceTime) {
                $_SESSION['uryyToeSS4'] = $txtClientId;
                $_SESSION['clientcarecalluserIdVar'] = $txtClientSpecialUserId;
                header("Location: ./warning-care-call-time?userId=$txtClientSpecialUserId");
            } else {
                //This is to check if this visit for today exist in the database. If it does, it will redirect to the warning page.
                $sql_check_today_visit = mysqli_query($conn, "SELECT * FROM tbl_daily_shift_records WHERE (shift_date = '$today' AND col_carer_Id = '$txtCarerId' AND uryyToeSS4 = '$txtClientId' AND col_care_call = '$txtVariousCareCalls' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ORDER BY userId DESC LIMIT 1");
                $count_check_today_visit = mysqli_num_rows($sql_check_today_visit);
                if ($count_check_today_visit != 0) {
                    header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                } else {
                    $_SESSION['uryyToeSS4'] = $txtClientId;
                    $_SESSION['clientcarecalluserIdVar'] = $txtClientSpecialUserId;
                    $sql_check_call_status = mysqli_query($conn, "SELECT * FROM tbl_daily_shift_records WHERE (shift_date = '$today' AND shift_end_time = 'Null' AND col_carer_Id = '" . $_SESSION['usr_carerId'] . "' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ORDER BY userId DESC LIMIT 1 ");
                    $row_check_call_status = mysqli_fetch_array($sql_check_call_status, MYSQLI_ASSOC);
                    $varClientId = $row_check_call_status['uryyToeSS4'];
                    $count_check_call_status = mysqli_num_rows($sql_check_call_status);
                    if ($count_check_call_status != 0) {
                        header("Location: ./ongoing-care-call?uryyToeSS4=$varClientId");
                    } else {
                        $queryInsNewData = mysqli_query($conn, "INSERT INTO tbl_daily_shift_records (shift_status, shift_date, shift_start_time, shift_end_time, client_name, uryyToeSS4, col_care_call, client_group, carer_Name, task_note, col_carer_Id, timesheet_date, col_area_Id, col_company_Id, col_miles, col_client_rate, col_client_payer, col_visit_status, col_visit_confirmation, col_care_call_Id, col_postcode) 
                        VALUES('" . $txtStart . "', '" . $dateConvertion . "', '" . $txtStartTime . "', '" . $txtEndTime . "', '" . $txtClientName . "', '" . $txtClientId . "', '" . $txtVariousCareCalls . "', '" . $txtClientArea . "', '" . $txtCarerName . "', '" . $txtTaskNote . "', '" . $txtCarerId . "', '" . $timeSheetDate . "', '" . $txtColAreaId . "', '" . $txtcompanyId . "', '" . $distanceMiles . "', '" . $varClientWorkedRate . "', '" . $varFundingName . "', '" . $txtVisitStatus . "', '" . $txtConformedVisit . "', '" . $txtClientSpecialUserId . "', '" . $postcode . "') ");
                        if ($queryInsNewData) {
                            $Update_rota_status_Sql = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `timeline_colour` = '$bgChange', `bgChange` = '$bgChange', `call_status` = '$status' WHERE (userId = '$txtClientSpecialUserId') ");
                            if ($Update_rota_status_Sql) {
                                $myCheck = "SELECT * FROM tbl_care_calls WHERE col_shift_date = '$today' AND col_care_call = '$txtVariousCareCalls' AND uryyToeSS4 = '$txtcompanyId' ";
                                $myCheckres = mysqli_query($conn, $myCheck);
                                $countRes = mysqli_num_rows($myCheckres);
                                if ($countRes != 0) {
                                    header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                } else {
                                    $InsCareCallNumber = mysqli_query($conn, "INSERT INTO tbl_care_calls (col_client_Id, col_client_name, col_shift_date, col_care_call, uryyToeSS4, col_carer_Id, col_company_Id) 
                                    VALUES('" . $txtClientSpecialUserId . "', '" . $txtClientName . "', '" . $dateConvertion . "', '" . $txtVariousCareCalls . "', '" . $txtClientId . "', '" . $txtCarerId . "', '$txtcompanyId') ");
                                    if ($InsCareCallNumber) {
                                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                                    }
                                }
                            }
                        }
                    }
                }
            }
        } else {
            header('Location: ./care-call-day-alert');
        }
    }
    //} else {
    //Display distance too great and google map
    //}
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:image" content="assets/img/gsLogo.png" />
    <meta name="twitter:image" content="assets/img/gsLogo.png" />
    <link rel="icon" href="assets/img/gsLogo.png" />
    <!-- Logo icon -->
    <title><?php echo "" . $CompanyName . ""; ?></title>
    <link rel="icon" href="assets/img/gsLogo.png" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2424.039849580655!2d-2.1380394064193693!3d52.5869727592829!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48709b9b316ad329%3A0xe352fd6790e08e54!2s<?php echo $txtClientAddLi1; ?>%20<?php echo $txtClientAddLi2; ?>%2C%<?php echo $txtClientCity; ?>%20<?php echo $postcode; ?>!5e0!3m2!1sen!2suk!4v1712322921451!5m2!1sen!2suk" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <div style="width: 100%; height:auto; padding:22px; margin-top:10px;">
                    <h4>Distance too great</h4>
                    <hr>
                    <button onclick="history.back(-2);" class="btn btn-primary btn-lg">Go back</button>
                </div>
            </div>
        </div>
    </div>

</body>

</html>