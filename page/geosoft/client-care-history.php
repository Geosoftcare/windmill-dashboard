<?php
include("header-contents.php");
$sel_dist_att = mysqli_query($conn, "SELECT * FROM tbl_goesoft_carers_account WHERE user_email_address = '" . $_SESSION['usr_email'] . "' AND user_special_Id != '' ");
while ($att_rw = mysqli_fetch_array($sel_dist_att)) {
    $worker_specialId = $att_rw['user_special_Id'];
    $worker_companyId = $att_rw['col_company_Id'];

    $result_total_hour = mysqli_query($conn, "SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(`dateTime_out`, `dateTime_in`)))) AS total_worked_hours FROM `tbl_schedule_calls` WHERE first_carer_Id = '" . $_SESSION['usr_carerId'] . "' AND Clientshift_Date = '$today' ");
    $row_sel_total_hour = mysqli_fetch_array($result_total_hour, MYSQLI_ASSOC);
    $total_hours = $row_sel_total_hour['total_worked_hours'];

    $time = strtotime($total_hours);
    $round = 60;
    $rounded = round($time / $round) * $round;
    $displayCurHour = date("H:i", $rounded);

    $dt = $today; // Define the date string
    $firstDateofMonth = date("Y-m-01", strtotime($dt));
    $lastDateofMonth = date("Y-m-t", strtotime($dt));
?>


    <div style="width: 100%; height:auto; color:white; border-bottom:3px solid rgba(95, 39, 205,1.0); background-color:rgba(39, 60, 117,1.0); padding:12px; font-size:16px;">
        <table style="border: none; width:100%;">
            <tr>
                <td style="border: none;" valign="bottom">
                    <form style="margin-top: 5px;" action="./care-calls-by-date" method="GET" enctype="multipart/form-data" autocomplete="off">
                        <div style="padding: 0px 0px 20px 5px; width:100%;">
                            <input type="date" value="<?php echo $txtDateQueryInput ?>" onchange='this.form.submit()' name="QueryDate" style="width: 150px; height:45px; background-color:inherit; border:none; font-size:18px; font-weight:600;" required />
                        </div>
                    </form>
                </td>
                <td>
                    <span style="font-weight: 600; font-size:18px;">History</span>
                </td>
            </tr>
        </table>
        <hr style="background-color:#000;margin-top: -12px; ">
        <br>
        <div class="containerbox">
            <div class="content">
                <table>
                    <tr>
                        <?php
                        $sel_carer_carecall_result = mysqli_query($conn, "SELECT * FROM tbl_schedule_calls WHERE (Clientshift_Date >= '$firstDateofMonth' AND Clientshift_Date <= '$lastDateofMonth' AND first_carer_Id = '$worker_specialId' AND col_company_Id = '$worker_companyId') GROUP BY Clientshift_Date ");
                        while ($trans = mysqli_fetch_array($sel_carer_carecall_result)) {
                            $ScdateOfCareCalls = "" . $trans['Clientshift_Date'] . "";
                            $dateOfCareCalls = date('d', strtotime("" . $trans['Clientshift_Date'] . ""));
                            echo "
                                <td style='padding:0px 10px 0px 0px;'>
                                <a href='./care-calls-by-date?txtSelectDate=$ScdateOfCareCalls&btnSelectQueryByDate=Filter' style='text-decoration:none;'>
                                    <div style='width:35px; height:36px; border-radius:100%; background-color:rgba(25, 42, 86,1.0); color:white; padding:7px;'>
                                    $dateOfCareCalls
                                    </div>
                                </a>
                                </td>
                            ";
                        } ?>
                    </tr>
                </table>
            </div>
        </div>
    </div>


    <div style="background-color: rgba(189, 195, 199,.3); width:100%; height:40px; border-bottom:2px solid rgba(189, 195, 199,.5); padding: 5px;">
        <table>
            <tr>
                <td style="border: none;">
                    <a href="javascript:window.location.href=window.location.href">
                        <img src="./assets/img/refresh-ccw.svg" style="height: 15px; width:15px;" alt="">
                    </a>
                </td>
                <td id='body-Base-txt' style="border: none; font-size:16px; color:rgba(44, 62, 80,.9); font-weight:600;">
                    <a id='body-Base-txt' href="javascript:window.location.href=window.location.href">
                        &nbsp;Refresh
                    </a>
                </td>
                <td style="width: 25px;"></td>
                <td style="border: none;"></td>
                <td style="border: none; font-size:16px; color:rgba(44, 62, 80,.9); font-weight:600;"></td>
            </tr>
        </table>
    </div>


    <main class="h-full overflow-y-auto">
        <div class="container px-4 mx-auto grid">
            <!-- Cards -->
            <div class="grid gap-6 mb-8 md:grid-cols-4 xl:grid-cols-4">
            <?php
            if (isset($_GET['uryyToeSS4'])) {
                $uryyToeSS4 = $_GET['uryyToeSS4'];
                $result = mysqli_query($conn, "SELECT * FROM tbl_daily_shift_records WHERE uryyToeSS4='$uryyToeSS4' ORDER BY userId DESC ");
                while ($rowAreaDate = mysqli_fetch_array($result)) {
                    echo "
                        <div style='margin-bottom: -30px; margin-top: 20px; box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;' class='shadow-sm p-3 mb-5 bg-body flex mb-4 font-semibold text-gray-600 dark:text-gray-300 items-center dark:bg-gray-800'>
                            <a class='inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100' href='./task-history?col_care_call_Id=" . $rowAreaDate['col_care_call_Id'] . "'>
                            <div style='width:100%;'>
                            <p id='body-Base-txt' class='mb-2 text-md font-medium' style='font-size:20px;'>
                            <span style='padding:4px 7px 0px 0px;'><img style=' width: 15px; height:15px; color:rgba(39, 174, 96,1.0);' src='./assets/img/users.svg' alt=''></span>
                                <span>" . $rowAreaDate['client_name'] . "</span>
                                </p>
                                <hr>
                                <p style='font-size:12px;' class='text-sm font-semibold text-gray-700 dark:text-gray-200'>
                                    <table>
                                        <tr>
                                            <td>
                                                <img style='width: 15px; height:15px; color:rgba(39, 174, 96,1.0);' src='./assets/img/clock.svg' alt=''>
                                            </td>
                                            <td>
                                                <span style='font-size:15px;padding:4px 7px 0px 0px;'>Planned time</span>
                                                <br>
                                                <span style='font-size:16px;padding:4px 7px 0px 0px;'>
                                                " . $rowAreaDate['planned_timeIn'] . " - " . $rowAreaDate['planned_timeOut'] . "
                                                </span>
                                            </td>
                                            <td> &nbsp; | &nbsp; </td>
                                            <td>
                                                <img style='width: 15px; height:15px; color:rgba(39, 174, 96,1.0);' src='./assets/img/clock.svg' alt=''>
                                            </td>
                                            <td>
                                                <span style='font-size:16px;padding:4px 7px 0px 0px;'>Actual time</span>
                                                <br>
                                                <span style='color:rgba(39, 174, 96,1.0);font-size:15px;padding:4px 7px 0px 0px;'>
                                                " . $rowAreaDate['shift_start_time'] . " - " . $rowAreaDate['shift_end_time'] . "
                                                </span>
                                            </td>
                                        </tr>
                                    </table>
                                        <Br>
                                    <span style='float:right; padding:3px 16px 3px 16px; font-size:15px;'>" . $rowAreaDate['shift_date'] . "</span>
                                </p>
                                </div> 
                            </a>
                        </div>
                    ";
                }
            }
        }
            ?>
            </div>
        </div>



        <?php include("footer-contents.php"); ?>