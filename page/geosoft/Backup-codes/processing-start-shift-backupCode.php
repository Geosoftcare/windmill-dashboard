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

    $txtCheckOutId = mysqli_real_escape_string($conn, $_POST['txtCheckOutId']);
    $txtDistance = mysqli_real_escape_string($conn, $_POST['txtDistance']);
    $txtCareCallId = mysqli_real_escape_string($conn, $_POST['txtCareCallId']);


    $txtVariousCareCalls = mysqli_real_escape_string($conn, $_POST['txtVariousCareCalls']);
    $txtVariosStatusNumber = mysqli_real_escape_string($conn, $_POST['txtVariosStatusNumber']);
    $txtCareCallsStartTime = mysqli_real_escape_string($conn, $_POST['txtCareCallsStartTime']);
    $txtCareCallsEndTime = mysqli_real_escape_string($conn, $_POST['txtCareCallsEndTime']);
    $txtFirstCarerIdPin = mysqli_real_escape_string($conn, $_POST['txtFirstCarerIdPin']);
    $txtClientCareCallsDate = mysqli_real_escape_string($conn, $_POST['txtClientCareCallsDate']);

    $myCareCallId = hash('sha256', $txtCareCallId);

    $careCallTimeIn = strtotime($txtCareCallsStartTime);
    echo $careCallTimeIn . "<br><br>";
    echo $txtCareCallsStartTime . "<br><br>";

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

    $CurrentDeviceTime = date("H");
    echo $CurrentDeviceTime . "<br><br>";

    //if ($txtDistance <= '80') {
    //if the client care call data is equal to today's date and client care call is Same as the client care call id then it will be updated
    if ($currentStartTime >= $startTimeMor && $currentEndTime <= $endTimeMor) {
        if ($CurrentDeviceTime <= 00 and $CurrentDeviceTime > 10.59) {
            header("Location: ./latecall-alert");
        } else {
            $myCheck = "SELECT * FROM tbl_schedule_calls WHERE userId = '$txtClientSpecialUserId' AND call_status = 'Completed' AND Clientshift_Date = '$today' ";
            $myCheckres = mysqli_query($conn, $myCheck);
            $countRes = mysqli_num_rows($myCheckres);

            if ($countRes) {
                $myCheckuserId = "SELECT * FROM tbl_daily_shift_records WHERE col_confirm_call_Id = '$txtClientSpecialUserId' AND col_call_status = 'Completed' AND Carer_userId = '" . $_SESSION['usr_carerId'] . "' ";
                $myCheckresStatus = mysqli_query($conn, $myCheckuserId);
                $countCheckStatusRes = mysqli_num_rows($myCheckresStatus);
                if ($countCheckStatusRes) {
                    header('Location: ./dashboard');
                } else {
                    header('Location: ./check-out-progress?uryyToeSS4=$txtClientId');
                }
            } else {
                $queryInsNewData = mysqli_query($conn, "INSERT INTO tbl_daily_shift_records (shift_status, shift_date, shift_start_time, shift_end_time, client_name, uryyToeSS4, client_group, carer_Name, task_note, Carer_userId, timesheet_date, col_area_Id, col_confirm_call_Id, col_company_Id, checkinout_Id, col_care_call_Id) 
        VALUES('" . $txtStart . "', '" . $txtStartDate . "', '" . $txtStartTime . "', '" . $txtEndTime . "', '" . $txtClientName . "', '" . $txtClientId . "', '" . $txtClientArea . "', '" . $txtCarerName . "', '" . $txtTaskNote . "', '" . $txtCarerId . "', '" . $timeSheetDate . "', '" . $txtColAreaId . "', '" . $txtClientSpecialUserId . "', '" . $txtcompanyId . "', '" . $txtCheckOutId . "', '" . $myCareCallId . "') ");
                if ($queryInsNewData) {
                    $InsCareCallNumber = mysqli_query($conn, "INSERT INTO tbl_care_call_number (col_client_Id, uryyToeSS4, col_care_call, col_shift_date, col_carer_Id) VALUES('" . $txtVariosStatusNumber . "', '" . $txtClientId . "', '" . $txtVariousCareCalls . "', '" . $today . "', '" . $_SESSION['usr_email'] . "') ");
                    if ($InsCareCallNumber) {
                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                    }
                }
            }
        }
    } else if ($currentStartTime >= $startTimeLun && $currentEndTime <= $endTimeLun) {
        if ($CurrentDeviceTime <= 11 and $CurrentDeviceTime > 13.59) {
            header("Location: ./latecall-alert");
        } else {
            $myCheck = "SELECT * FROM tbl_schedule_calls WHERE userId = '$txtClientSpecialUserId' AND call_status = 'Completed' AND Clientshift_Date = '$today' ";
            $myCheckres = mysqli_query($conn, $myCheck);
            $countRes = mysqli_num_rows($myCheckres);

            if ($countRes) {
                $myCheckuserId = "SELECT * FROM tbl_daily_shift_records WHERE col_confirm_call_Id = '$txtClientSpecialUserId' AND col_call_status = 'Completed' AND Carer_userId = '" . $_SESSION['usr_carerId'] . "' ";
                $myCheckresStatus = mysqli_query($conn, $myCheckuserId);
                $countCheckStatusRes = mysqli_num_rows($myCheckresStatus);
                if ($countCheckStatusRes) {
                    header('Location: ./dashboard');
                } else {
                    header('Location: ./check-out-progress?uryyToeSS4=$txtClientId');
                }
            } else {
                $queryInsNewData = mysqli_query($conn, "INSERT INTO tbl_daily_shift_records (shift_status, shift_date, shift_start_time, shift_end_time, client_name, uryyToeSS4, client_group, carer_Name, task_note, Carer_userId, timesheet_date, col_area_Id, col_confirm_call_Id, col_company_Id, checkinout_Id, col_care_call_Id) 
        VALUES('" . $txtStart . "', '" . $txtStartDate . "', '" . $txtStartTime . "', '" . $txtEndTime . "', '" . $txtClientName . "', '" . $txtClientId . "', '" . $txtClientArea . "', '" . $txtCarerName . "', '" . $txtTaskNote . "', '" . $txtCarerId . "', '" . $timeSheetDate . "', '" . $txtColAreaId . "', '" . $txtClientSpecialUserId . "', '" . $txtcompanyId . "', '" . $txtCheckOutId . "', '" . $myCareCallId . "') ");
                if ($queryInsNewData) {
                    $InsCareCallNumber = mysqli_query($conn, "INSERT INTO tbl_care_call_number (col_client_Id, uryyToeSS4, col_care_call, col_shift_date, col_carer_Id) VALUES('" . $txtVariosStatusNumber . "', '" . $txtClientId . "', '" . $txtVariousCareCalls . "', '" . $today . "', '" . $_SESSION['usr_email'] . "') ");
                    if ($InsCareCallNumber) {
                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                    }
                }
            }
        }
    } else if ($currentStartTime >= $startTimeTea && $currentEndTime <= $endTimeTea) {
        if ($CurrentDeviceTime <= 14 and $CurrentDeviceTime > 17.59) {
            header("Location: ./latecall-alert");
        } else {
            $myCheck = "SELECT * FROM tbl_schedule_calls WHERE userId = '$txtClientSpecialUserId' AND call_status = 'Completed' AND Clientshift_Date = '$today' ";
            $myCheckres = mysqli_query($conn, $myCheck);
            $countRes = mysqli_num_rows($myCheckres);

            if ($countRes) {
                $myCheckuserId = "SELECT * FROM tbl_daily_shift_records WHERE col_confirm_call_Id = '$txtClientSpecialUserId' AND col_call_status = 'Completed' AND Carer_userId = '" . $_SESSION['usr_carerId'] . "' ";
                $myCheckresStatus = mysqli_query($conn, $myCheckuserId);
                $countCheckStatusRes = mysqli_num_rows($myCheckresStatus);
                if ($countCheckStatusRes) {
                    header('Location: ./dashboard');
                } else {
                    header('Location: ./check-out-progress?uryyToeSS4=$txtClientId');
                }
            } else {
                $queryInsNewData = mysqli_query($conn, "INSERT INTO tbl_daily_shift_records (shift_status, shift_date, shift_start_time, shift_end_time, client_name, uryyToeSS4, client_group, carer_Name, task_note, Carer_userId, timesheet_date, col_area_Id, col_confirm_call_Id, col_company_Id, checkinout_Id, col_care_call_Id) 
        VALUES('" . $txtStart . "', '" . $txtStartDate . "', '" . $txtStartTime . "', '" . $txtEndTime . "', '" . $txtClientName . "', '" . $txtClientId . "', '" . $txtClientArea . "', '" . $txtCarerName . "', '" . $txtTaskNote . "', '" . $txtCarerId . "', '" . $timeSheetDate . "', '" . $txtColAreaId . "', '" . $txtClientSpecialUserId . "', '" . $txtcompanyId . "', '" . $txtCheckOutId . "', '" . $myCareCallId . "') ");
                if ($queryInsNewData) {
                    $InsCareCallNumber = mysqli_query($conn, "INSERT INTO tbl_care_call_number (col_client_Id, uryyToeSS4, col_care_call, col_shift_date, col_carer_Id) VALUES('" . $txtVariosStatusNumber . "', '" . $txtClientId . "', '" . $txtVariousCareCalls . "', '" . $today . "', '" . $_SESSION['usr_email'] . "') ");
                    if ($InsCareCallNumber) {
                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                    }
                }
            }
        }
    } else if ($currentStartTime >= $startTimeBed && $currentEndTime <= $endTimeBed) {
        if ($CurrentDeviceTime <= 18 and $CurrentDeviceTime > 22.59) {
            header("Location: ./latecall-alert");
        } else {
            $myCheck = "SELECT * FROM tbl_schedule_calls WHERE userId = '$txtClientSpecialUserId' AND call_status = 'Completed' AND Clientshift_Date = '$today' ";
            $myCheckres = mysqli_query($conn, $myCheck);
            $countRes = mysqli_num_rows($myCheckres);

            if ($countRes) {
                $myCheckuserId = "SELECT * FROM tbl_daily_shift_records WHERE col_confirm_call_Id = '$txtClientSpecialUserId' AND col_call_status = 'Completed' AND Carer_userId = '" . $_SESSION['usr_carerId'] . "' ";
                $myCheckresStatus = mysqli_query($conn, $myCheckuserId);
                $countCheckStatusRes = mysqli_num_rows($myCheckresStatus);
                if ($countCheckStatusRes) {
                    header('Location: ./dashboard');
                } else {
                    header('Location: ./check-out-progress?uryyToeSS4=$txtClientId');
                }
            } else {
                $queryInsNewData = mysqli_query($conn, "INSERT INTO tbl_daily_shift_records (shift_status, shift_date, shift_start_time, shift_end_time, client_name, uryyToeSS4, client_group, carer_Name, task_note, Carer_userId, timesheet_date, col_area_Id, col_confirm_call_Id, col_company_Id, checkinout_Id, col_care_call_Id) 
        VALUES('" . $txtStart . "', '" . $txtStartDate . "', '" . $txtStartTime . "', '" . $txtEndTime . "', '" . $txtClientName . "', '" . $txtClientId . "', '" . $txtClientArea . "', '" . $txtCarerName . "', '" . $txtTaskNote . "', '" . $txtCarerId . "', '" . $timeSheetDate . "', '" . $txtColAreaId . "', '" . $txtClientSpecialUserId . "', '" . $txtcompanyId . "', '" . $txtCheckOutId . "', '" . $myCareCallId . "') ");
                if ($queryInsNewData) {
                    $InsCareCallNumber = mysqli_query($conn, "INSERT INTO tbl_care_call_number (col_client_Id, uryyToeSS4, col_care_call, col_shift_date, col_carer_Id) VALUES('" . $txtVariosStatusNumber . "', '" . $txtClientId . "', '" . $txtVariousCareCalls . "', '" . $today . "', '" . $_SESSION['usr_email'] . "') ");
                    if ($InsCareCallNumber) {
                        header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
                    }
                }
            }
        }
    } else {
        header("Location: ./latecall-alert");
    }


    //}
} else {
} ?>

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

                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2424.039849580655!2d-2.1380394064193693!3d52.5869727592829!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48709b9b316ad329%3A0xe352fd6790e08e54!2s<?php echo $txtClientAddLi1; ?>%20<?php echo $txtClientAddLi2; ?>%2C%<?php echo $txtClientCity; ?>%20<?php echo $txtClientPostCode; ?>!5e0!3m2!1sen!2suk!4v1712322921451!5m2!1sen!2suk" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                <div style="width: 100%; height:auto; padding:22px; margin-top:20px;">
                    <h4>Distance too great</h4>
                    <hr>
                    <a href="./dashboard">
                        <button class="btn btn-primary">Go back</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>