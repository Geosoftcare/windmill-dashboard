<?php
include('header-contents.php');
if (isset($_GET['uryyToeSS4'])) {
    $uryyToeSS4 = $_GET['uryyToeSS4'];
}
$sel_task_data = mysqli_query($conn, "SELECT * FROM tbl_care_calls WHERE (uryyToeSS4 = '$uryyToeSS4' 
AND col_carer_Id = '" . $_SESSION['usr_carerId'] . "' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') 
ORDER BY userId DESC LIMIT 1");
$display_client_data = mysqli_fetch_array($sel_task_data, MYSQLI_ASSOC);
$getclientnames = $display_client_data['col_client_name'];
$getCareCallDate = $display_client_data['col_shift_date'];
$getCareCallName = $display_client_data['col_care_call'];
$getClientSpecialId = $display_client_data['uryyToeSS4'];
$getCarerSpecialId = $display_client_data['col_carer_Id'];
$varClientIdNumber = $display_client_data['col_client_Id'];
$getCompanySpecialId = $display_client_data['col_company_Id'];

//This is the time for the logic hour
//The month is not big logs
?>

<div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen}">
    <main class="h-full pb-16 overflow-y-auto">
        <div style="margin-top: -10px;" class="container px-2 mx-auto grid">
            <div style="margin-top: 30px;" class="grid gap-6 mb-8 md:grid-cols-2">
                <div class="min-w-0 p-2 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                    <h3 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                        Confirm tasks
                        <br>
                        <small style="font-size:16px;">
                            <?php echo "--" . $getclientnames . "--"; ?>
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
                                $sel_get_client_data_result = mysqli_query($conn, "SELECT * FROM tbl_schedule_calls 
                                WHERE (Clientshift_Date = '$today' AND first_carer_Id = '$getCarerSpecialId' 
                                AND care_calls = '$getCareCallName' AND uryyToeSS4='$getClientSpecialId' 
                                AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ORDER BY userId DESC LIMIT 1 ");
                                while ($get_data_row_result = mysqli_fetch_array($sel_get_client_data_result)) {
                                    $varCurrentCareCallId  = $get_data_row_result['userId'];
                                    $varCurrentCareCallDTI  = $get_data_row_result['dateTime_in'];
                                    $varCurrentCareCallDTO  = $get_data_row_result['dateTime_out'];

                                    $sel_get_client_data_checker = mysqli_query($conn, "SELECT * FROM tbl_daily_shift_records 
                                    WHERE (col_care_call='$getCareCallName' AND uryyToeSS4='$getClientSpecialId' AND shift_date='$today' 
                                    AND col_carer_Id = '$getCarerSpecialId') ORDER BY userId DESC LIMIT 1 ");
                                    while ($get_data_row_checker = mysqli_fetch_array($sel_get_client_data_checker)) {
                                ?>

                                        <input type="hidden" value="<?php echo "" . $get_data_row_checker['col_care_call_Id'] . ""; ?>" name="txtTaskId" />
                                        <input type="hidden" value="<?php echo "" . $get_data_row_checker['client_name'] . ""; ?>" name="" />
                                        <input type="hidden" value="<?php echo "" . $get_data_row_checker['col_care_call'] . ""; ?>" name="" />
                                        <input type="hidden" value="<?php echo "" . $get_data_row_checker['col_care_call_Id'] . ""; ?>" name="" />
                                        <input type="hidden" value="<?php print $sTime; ?>" name="txtCurrentTime" />
                                        <hr>
                                        <div style='width: 100%; height:auto; padding:12px; color:rgba(22, 160, 133,1.0);'>
                                            <span>Check in</span>
                                            <span style='float:right; font-size:25px; color:rgba(22, 160, 133,1.0);'></span>
                                            <br>
                                            <?php $checkedInTime = date('M d, Y', strtotime("" . $get_data_row_checker['shift_date'] . "")); ?>
                                            <span style='font-size: 16px;'><span style='float:right; font-size:12px;'><?php echo "" . $checkedInTime . " " . $get_data_row_checker['shift_start_time'] . ""; ?></span></span>
                                            <br>
                                        </div>

                                        <a href='./tasks-progress?uryyToeSS4=<?php echo "" . $get_data_row_checker['uryyToeSS4'] . "";
                                                                            }
                                                                        } ?>' style='text-decoration:none;'>
                                            <hr>
                                            <div style='width: 100%; height:auto; padding:12px; color:rgba(22, 160, 133,1.0);'>
                                                <span>View tasks</span>
                                                <span style='float:right; font-size:25px; color:rgba(22, 160, 133,1.0);'>></span>
                                                <br>
                                                <span style='font-size: 16px;'>Done</span>
                                            </div>
                                        </a>
                                        <?php
                                        date_default_timezone_set('Europe/London');
                                        $sTime = date("H:ia");
                                        ?>
                                        <hr>
                                        <div style='width: 100%; height:auto; padding:12px; color:rgba(231, 76, 60,.9);'>
                                            <span>Check out</span>
                                            <span style='float:right; font-size:25px; color:white;'>></span>
                                            <br>
                                            <span style='font-size: 16px;'>Not yet<span style='float:right; font-size:12px;'>
                                                    <?php echo $currentDate . " " . $cureTimeCount; ?></span>
                                            </span>
                                        </div>
                                        <br>

                                        <?php
                                        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                        $sql_get_carer_pay_rate = mysqli_query($conn, "SELECT * FROM `tbl_general_team_form`
                                        WHERE (uryyTteamoeSS4 = '$getCarerSpecialId' AND `col_company_Id` = '" . $_SESSION['usr_compId'] . "') ");
                                        $row_get_carer_pay_rate = mysqli_fetch_array($sql_get_carer_pay_rate, MYSQLI_ASSOC);
                                        $varCarerPayRate = $row_get_carer_pay_rate['col_pay_rate'];
                                        $varCarerMileage = $row_get_carer_pay_rate['col_mileage'];
                                        //$varCarerMileageRate = $row_get_carer_pay_rate['col_mileage_rate'];

                                        //This is the main calculation of the carer pay rate

                                        $sql_get_worked_time = mysqli_query($conn, "SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(`dateTime_out`, `dateTime_in`)))) AS total_worked_hours FROM `tbl_schedule_calls`
                                        WHERE (userId = '$varClientIdNumber' AND `col_company_Id` = '" . $_SESSION['usr_compId'] . "') ORDER BY userId DESC LIMIT 1");
                                        $row_get_worked_time = mysqli_fetch_array($sql_get_worked_time, MYSQLI_ASSOC);
                                        $total_hours = $row_get_worked_time['total_worked_hours'];
                                        $time = strtotime($total_hours);
                                        $round = 60;
                                        $rounded = round($time / $round) * $round;
                                        $displayCurHour = date("H", $rounded);
                                        $displayCurMint = date("i", $rounded);
                                        $varWorkedHour = $displayCurHour . ':' . $displayCurMint;

                                        //This is the calculation of the pay rate
                                        //Get the total hours worked and then multiply it by the pay rate and then add the mileage
                                        //to get the total pay || This is the calculatuion of the carer pay rate

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
                                        $hourlyRate = $varCarerPayRate; // Hourly rate in currency units

                                        $totalPay = calculatePay($hoursWorked, $minutesWorked, $hourlyRate);
                                        $varWorkedRate = number_format((float)$totalPay, 2, '.', '');
                                        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                        ?>
                                        <input type='hidden' value='<?php echo $varCurrentCareCallId; ?>' name='txtCareCallId' />
                                        <input type='hidden' value='<?php echo $getClientSpecialId; ?>' name='txtClientIdCode' />
                                        <input type='hidden' value='<?php echo $varCurrentCareCallDTI; ?>' name='txtPlannedTimeIn' />
                                        <input type='hidden' value='<?php echo $varCurrentCareCallDTO; ?>' name='txtPlannedTimeOut' />
                                        <input type='hidden' value='<?php echo $getCareCallName; ?>' name='txtCareCalls' />
                                        <input type='hidden' value='<?php echo $getCompanySpecialId; ?>' name='txtCompanyId' />
                                        <input type='hidden' value='<?php echo $varWorkedHour; ?>' name='txtCareCallTime' />
                                        <input type='hidden' value='<?php echo $varWorkedRate; ?>' name='txtWorkedPayRate' />
                                        <input type='hidden' value='<?php echo $varCarerMileage; ?>' name='txtCarerMileage' />
                                        <input type="hidden" value="<?php echo $getCarerSpecialId; ?>" name="txtCarerId" />
                                        <button type="submit" name="btnSubmitCheckoutNote" style="width: 150px; height:60px; 
                                        border:none; background-color:rgba(95, 39, 205,.9); color:white; border-radius:10px; cursor:pointer;">
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