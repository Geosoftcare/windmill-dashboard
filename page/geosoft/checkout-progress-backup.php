<?php
include('header-contents.php');
$sel_task_data = mysqli_query($conn, "SELECT * FROM tbl_care_calls WHERE (col_carer_Id = '" . $_SESSION['usr_carerId'] . "' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ORDER BY userId DESC LIMIT 1");
$display_client_data = mysqli_fetch_array($sel_task_data, MYSQLI_ASSOC);
$getclientnames = $display_client_data['col_client_name'];
$getCareCallDate = $display_client_data['col_shift_date'];
$getCareCallName = $display_client_data['col_care_call'];
$getClientSpecialId = $display_client_data['uryyToeSS4'];
$getCarerSpecialId = $display_client_data['col_carer_Id'];
$getCompanySpecialId = $display_client_data['col_company_Id'];
?>

<div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen}">
    <main class="h-full pb-16 overflow-y-auto">

        <div style="margin-top: -10px;" class="container px-2 mx-auto grid">
            <!--<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Task
            </h2>-->

            <div style="margin-top: 30px;" class="grid gap-6 mb-8 md:grid-cols-2">
                <div class="min-w-0 p-2 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                    <h3 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                        Confirm tasks
                        <br>
                        <small style="font-size:16px;">
                            <?php
                            echo "--" . $getclientnames . "--";
                            ?>
                        </small>
                    </h3>
                    <hr>
                    <h5 class="my-6 font-semibold text-gray-700 dark:text-gray-200">
                        If you are convince with your report! Kindly click the button below to submit report and check out.
                    </h5>

                    <hr>

                    <div style="margin-top: -20px;" class="flex mb-4 font-semibold text-gray-600 dark:text-gray-300 items-center p-2 bg-white dark:bg-gray-800">
                        <div style='width:100%; height:auto;display:block;'>


                            <form action="./processing-check-out-form" method="post" enctype="multipart/form-data" autocomplete="off">

                                <input type="hidden" value="<?php echo "" . $getCareCallName . ""; ?>" name="txtClientCareCallName" />

                                <?php
                                $sel_get_client_data_result = mysqli_query($conn, "SELECT * FROM tbl_schedule_calls WHERE (uryyToeSS4='$getClientSpecialId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ORDER BY userId DESC LIMIT 1 ");
                                while ($get_data_row_result = mysqli_fetch_array($sel_get_client_data_result)) {

                                    $sel_get_client_data_checker = mysqli_query($conn, "SELECT * FROM tbl_daily_shift_records WHERE (col_care_call='$getCareCallName' AND uryyToeSS4='$getClientSpecialId' AND shift_date='$today' AND col_carer_Id = '$getCarerSpecialId') ORDER BY userId DESC LIMIT 1 ");
                                    while ($get_data_row_checker = mysqli_fetch_array($sel_get_client_data_checker)) {
                                ?>

                                        <input type="hidden" value="<?php echo "" . $get_data_row_checker['checkinout_Id'] . ""; ?>" name="txtTaskId" />
                                        <input type="hidden" value="<?php echo "" . $get_data_row_checker['client_name'] . ""; ?>" name="" />
                                        <input type="hidden" value="<?php echo "" . $get_data_row_checker['col_care_call'] . ""; ?>" name="" />
                                        <input type="hidden" value="<?php echo "" . $get_data_row_checker['col_confirm_call_Id'] . ""; ?>" name="" />
                                        <input type="hidden" value="<?php date_default_timezone_set('Europe/London');
                                                                    $sTime = date("H:i");
                                                                    print $sTime; ?>" name="txtCurrentTime" />

                                        <hr>
                                        <div style='width: 100%; height:auto; padding:12px; color:rgba(22, 160, 133,1.0);'>
                                            <span>Check in</span>
                                            <span style='float:right; font-size:25px; color:rgba(22, 160, 133,1.0);'></span>
                                            <br>
                                            <?php $checkedInTime = date('M d, Y', strtotime("" . $get_data_row_checker['shift_date'] . "")); ?>
                                            <span style='font-size: 16px;'><span style='float:right; font-size:14px;'><?php echo "" . $checkedInTime . " " . $get_data_row_checker['shift_start_time'] . ""; ?></span></span>
                                            <br>
                                        </div>

                                        <a href='./tasks-progress?uryyToeSS4=<?php echo "" . $get_data_row_checker['uryyToeSS4'] . "";
                                                                            }
                                                                        } ?>' style='text-decoration:none;'>
                                            <hr>
                                            <div style='width: 100%; height:auto; padding:12px; color:rgba(22, 160, 133,1.0);'>
                                                <span>View tasks activities</span>
                                                <span style='float:right; font-size:25px; color:rgba(22, 160, 133,1.0);'>></span>
                                                <br>
                                                <span style='font-size: 16px;'>Done</span>
                                            </div>
                                        </a>

                                        <!--<a href='./medication-progress?uryyToeSS4=<?php // echo "" . $get_data_row_checker['uryyToeSS4'] . ""; 
                                                                                        ?>' style='text-decoration:none;'>
                                            <hr>
                                            <div style='width: 100%; height:auto; padding:12px; color:rgba(22, 160, 133,1.0);'>
                                                <span>Medications activitie</span>
                                                <span style='float:right; font-size:25px; color:rgba(22, 160, 133,1.0);'>></span>
                                                <br>
                                                <span style='font-size: 16px;'>Done</span>
                                            </div>
                                        </a>-->
                                        <?php
                                        date_default_timezone_set('Europe/London');
                                        $sTime = date("H:ia");
                                        ?>

                                        <hr>
                                        <div style='width: 100%; height:auto; padding:12px; color:rgba(231, 76, 60,.9);'>
                                            <span>Check out</span>
                                            <span style='float:right; font-size:25px; color:white;'>></span>
                                            <br>
                                            <span style='font-size: 16px;'>Not yet<span style='float:right; font-size:14px;'><?php echo $currentDate . " " . $cureTimeCount; ?></span></span>
                                        </div>

                                        <br>



                                        <?php
                                        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                        $result = mysqli_query($conn, "SELECT * FROM tbl_schedule_calls WHERE (uryyToeSS4='$getClientSpecialId' AND care_calls ='$getCareCallName' AND Clientshift_Date = '$today' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "
                                                        <input type='hidden' value='" . $row['userId'] . "' name='txtCurrentCareCall' />
                                                        <input type='hidden' value='" . $row['uryyToeSS4'] . "' name='txtClientIdCode' />
                                                        <input type='hidden' value='" . $row['dateTime_in'] . "' name='txtPlannedTimeIn' />
                                                        <input type='hidden' value='" . $row['dateTime_out'] . "' name='txtPlannedTimeOut' />
                                                        <input type='hidden' value='" . $row['care_calls'] . "' name='txtCareCalls' />
                                                        <input type='hidden' value='" . $row['col_company_Id'] . "' name='txtCompanyId' />
                                                            ";

                                            $result = mysqli_query($conn, "SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(`dateTime_out`, `dateTime_in`)))) AS total_worked_hours FROM `tbl_schedule_calls` WHERE (uryyToeSS4='$getClientSpecialId' AND care_calls ='$getCareCallName' AND Clientshift_Date = '$today' AND first_carer_Id = '" . $_SESSION['usr_carerId'] . "') ");
                                            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                            $total_hours = $row['total_worked_hours'];

                                            $time = strtotime($total_hours);
                                            $round = 60;
                                            $rounded = round($time / $round) * $round;
                                            $displayCurHour = date("H:i", $rounded);

                                            if ($displayCurHour == '00:15') {
                                                //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                                $payRateResult = mysqli_query($conn, "SELECT * FROM tbl_general_team_form WHERE (team_email_address='" . $_SESSION['usr_email'] . "' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                                while ($row_of_payRate = mysqli_fetch_array($payRateResult)) {
                                                    $varHoldCarerPayRate = $row_of_payRate['col_pay_rate'];
                                                    $new_width = (15 / 100) * $varHoldCarerPayRate;

                                                    echo "
                                                                <input type='hidden' value='$new_width' name='txtWordedPayRate' />
                                                                ";
                                                }
                                                echo "
                                                            <input type='hidden' value='$displayCurHour' name='txtCareCallTime' />
                                                            ";
                                                //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                            } else if ($displayCurHour == '00:30') {
                                                ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                                $payRateResult = mysqli_query($conn, "SELECT * FROM tbl_general_team_form WHERE (team_email_address='" . $_SESSION['usr_email'] . "' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                                while ($row_of_payRate = mysqli_fetch_array($payRateResult)) {
                                                    $varHoldCarerPayRate = $row_of_payRate['col_pay_rate'];
                                                    $new_width = (50 / 100) * $varHoldCarerPayRate;

                                                    echo "
                                                                <input type='hidden' value='$new_width' name='txtWordedPayRate' />
                                                                ";
                                                }
                                                echo "
                                                            <input type='hidden' value='$displayCurHour' name='txtCareCallTime' />
                                                            ";
                                                //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                            } else if ($displayCurHour == '00:45') {
                                                ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                                $payRateResult = mysqli_query($conn, "SELECT * FROM tbl_general_team_form WHERE (team_email_address='" . $_SESSION['usr_email'] . "' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                                while ($row_of_payRate = mysqli_fetch_array($payRateResult)) {
                                                    $varHoldCarerPayRate = $row_of_payRate['col_pay_rate'];
                                                    $new_width = (85 / 100) * $varHoldCarerPayRate;

                                                    echo "
                                                                <input type='hidden' value='$new_width' name='txtWordedPayRate' />
                                                                ";
                                                }
                                                echo "
                                                            <input type='hidden' value='$displayCurHour' name='txtCareCallTime' />
                                                            ";
                                                //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                            } else if ($displayCurHour == '01:00') {
                                                ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                                $payRateResult = mysqli_query($conn, "SELECT * FROM tbl_general_team_form WHERE (team_email_address='" . $_SESSION['usr_email'] . "' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                                while ($row_of_payRate = mysqli_fetch_array($payRateResult)) {
                                                    $varHoldCarerPayRate = $row_of_payRate['col_pay_rate'];
                                                    echo "
                                                                <input type='hidden' value='$varHoldCarerPayRate' name='txtWordedPayRate' />
                                                                ";
                                                }
                                                echo "
                                                            <input type='hidden' value='$displayCurHour' name='txtCareCallTime' />
                                                            ";
                                                //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                            }
                                            $sel_client_careNumber_result = mysqli_query($conn, "SELECT * FROM tbl_care_calls WHERE (uryyToeSS4='$getClientSpecialId' AND col_care_call ='$getCareCallName' AND col_shift_date = '$today' AND col_carer_Id = '" . $_SESSION['usr_carerId'] . "') ");
                                            while ($sel_client_rowAreaDate = mysqli_fetch_array($sel_client_careNumber_result)) {
                                                $display_client_carecall = $sel_client_rowAreaDate['col_client_Id'];
                                                echo "<input type='hidden' value='$display_client_carecall' name='txtClientCareCall' />";
                                            }
                                        } ?>


                                        <?php
                                        $result = mysqli_query($conn, "SELECT * FROM tbl_goesoft_carers_account WHERE (user_email_address='" . $_SESSION['usr_email'] . "' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        while ($row = mysqli_fetch_array($result)) { ?>

                                            <input type="hidden" value="<?php echo "" . $row['user_special_Id'] . "";
                                                                    } ?>" name="txtCarerId" />

                                            <button name="btnSubmitCheckoutNote" type='submit' style='margin-bottom:8px;width:auto; height:50px; text-align:right; padding:15px; font-size:16px;' class='flex text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue'>
                                                Check out
                                            </button>

                            </form>
                        </div>
                    </div>
                </div>



                <div class=" min-w-0 p-4 text-white bg-purple-600 rounded-lg shadow-xs">
                    <h4 class="mb-4 font-semibold">
                        Important notice
                    </h4>
                    <p>
                        All task/medication are important and it is required of you to fill in the information appropriately.
                    </p>
                    <br>
                    <hr>
                </div>
            </div>
        </div>

        <?php include('footer-contents.php'); ?>