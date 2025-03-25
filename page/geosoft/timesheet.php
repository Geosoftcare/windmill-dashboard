<?php
include("header-contents.php");
$sel_dist_att = mysqli_query($conn, "SELECT * FROM tbl_goesoft_carers_account 
WHERE user_email_address = '" . $_SESSION['usr_email'] . "' AND user_special_Id != '' ");
while ($att_rw = mysqli_fetch_array($sel_dist_att)) {
    $worker_specialId = $att_rw['user_special_Id'];
    $worker_companyId = $att_rw['col_company_Id'];
}
?>


<div style="width: 100%; height:auto; color:white; border-bottom:3px solid rgba(95, 39, 205,1.0); background-color:rgba(39, 60, 117,1.0); padding:12px; font-size:16px;">
    <table style="border: none; width:100%;">
        <tr>
            <td style="border: none;" valign="bottom">
                <form style="margin-top: 5px;" action="./timesheet-by-date" method="GET" enctype="multipart/form-data" autocomplete="off">
                    <div style="padding: 0px 0px 20px 5px; width:100%;">
                        <input type="date" value="<?php echo $today ?>" onchange='this.form.submit()' name="QueryDate" style="width: 150px; height:45px; background-color:inherit; border:none; font-size:18px; font-weight:600;" required />
                    </div>
                </form>
            </td>
            <td>
                <span style="font-weight: 600; font-size:18px;">Timesheet</span>
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
                    $sel_carer_carecall_result = mysqli_query($conn, "SELECT * FROM tbl_schedule_calls 
                    WHERE (Clientshift_Date >= '$firstDateofMonth' AND Clientshift_Date <= '$lastDateofMonth' 
                    AND first_carer_Id = '$worker_specialId' AND col_company_Id = '$worker_companyId') GROUP BY Clientshift_Date ");
                    while ($trans = mysqli_fetch_array($sel_carer_carecall_result)) {
                        $ScdateOfCareCalls = "" . $trans['Clientshift_Date'] . "";
                        $dateOfCareCalls = date('d', strtotime("" . $trans['Clientshift_Date'] . ""));
                        if ($today == $ScdateOfCareCalls) {
                            echo "
                            <td style='padding:0px 10px 0px 0px;'>
                            <a href='./care-calls-by-date?QueryDate=$ScdateOfCareCalls' style='text-decoration:none;'>
                                <div style='width:35px; height:36px; text-align:center; border-radius:100%; background-color:green; color:white; padding:7px;'>
                                $dateOfCareCalls
                                </div>
                            </a>
                            </td>
                            ";
                        } else {
                            echo "
                            <td style='padding:0px 10px 0px 0px;'>
                            <a href='./care-calls-by-date?QueryDate=$ScdateOfCareCalls' style='text-decoration:none;'>
                                <div style='width:35px; height:36px; text-align:center; border-radius:100%; background-color:rgba(25, 42, 86,1.0); color:white; padding:7px;'>
                                $dateOfCareCalls
                                </div>
                            </a>
                            </td>
                            ";
                        }
                    } ?>
                </tr>
            </table>
        </div>
    </div>
</div>
<div class='text-sm font-semibold text-gray-700 dark:text-gray-200' style="background-color: rgba(189, 195, 199,.3); width:100%; height:40px; border-bottom:2px solid rgba(189, 195, 199,.5); padding: 5px;">
    <table>
        <tr>
            <td style="border: none;">
                <a href="javascript:window.location.href=window.location.href">
                    <img src="./assets/img/refresh-ccw.svg" style="height: 15px; width:15px;" alt="">
                </a>
            </td>
            <td style="border: none; font-size:16px; font-weight:600;">
                <a href="javascript:window.location.href=window.location.href">
                    &nbsp;Refresh
                </a>
            </td>
            <td style="width: 25px;"></td>
            <td style="border: none;">
                <img src="./assets/img/bell.svg" style="height: 15px; width:15px;" alt="">
            </td>
            <td style="border: none; font-size:16px; font-weight:600;">
                Be on time!
            </td>
        </tr>
    </table>
</div>
<main class="h-full overflow-y-auto">
    <!-- New Table -->
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <h3 class='text-gray-700 dark:text-gray-400' style="padding: 22px;"><strong>Timesheet</strong></h3>
            <hr>
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th style="font-size: 13px;" class="px-4 py-3">Client</th>
                        <th style="font-size: 13px;" class="px-4 py-3">Time in</th>
                        <th style="font-size: 13px;" class="px-4 py-3">Time out</th>
                        <th style="font-size: 13px;" class="px-4 py-3">Pay</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    <?php
                    $sqlSelection = mysqli_query($conn, "SELECT * FROM tbl_daily_shift_records WHERE (`timesheet_date` >= '$first_day_this_month' AND `timesheet_date` <= '$last_day_this_month' 
                    AND col_visit_status = 'True' AND col_call_status = 'Completed' AND col_carer_Id = '" . $_SESSION['usr_carerId'] . "') ");
                    while ($rowResult = mysqli_fetch_array($sqlSelection)) {
                    ?>
                        <tr class='text-gray-700 dark:text-gray-400'>
                            <td style="font-size: 13px;" class='px-4 py-3'>
                                <div class='flex items-center text-sm'>
                                    <!-- Avatar with inset shadow -->
                                    <div class='relative hidden w-8 h-8 mr-3 rounded-full md:block'>
                                        <img class='object-cover w-full h-full rounded-full' src='./assets/img/user_icons.png' alt='' loading='lazy' />
                                        <div class='absolute inset-0 rounded-full shadow-inner' aria-hidden='true'></div>
                                    </div>
                                    <div>
                                        <p style="font-size: 13px;" class='font-semibold'><?php echo $rowResult['client_name']; ?></p>
                                        <p class='text-sm text-gray-600 dark:text-gray-400'>
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td style="font-size: 13px;" class='px-4 py-3 text-sm'>
                                <?php echo $rowResult['planned_timeIn']; ?>
                            </td>
                            <td style="font-size: 13px;" class='px-4 py-3 text-sm'>
                                <?php echo $rowResult['planned_timeOut']; ?>
                            </td>
                            <td style="font-size: 13px;" class='px-4 py-3 text-sm'>
                                <?php echo '£' . $rowResult['col_carecall_rate']; ?>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <h3 class='text-gray-700 dark:text-gray-400' style="padding: 22px;"><strong>
                    <?php
                    $sql_total_hour = mysqli_query($conn, "SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(`planned_timeOut`, `planned_timeIn`)))) 
                    AS total_worked_hours FROM `tbl_daily_shift_records` WHERE (shift_date >= '$first_day_this_month' 
                    AND shift_date <= '$last_day_this_month' AND col_carer_Id = '" . $_SESSION['usr_carerId'] . "' 
                    AND `col_company_Id` = '" . $_SESSION['usr_compId'] . "') ");
                    $row_total_hour = mysqli_fetch_array($sql_total_hour, MYSQLI_ASSOC);
                    $total_hours = $row_total_hour['total_worked_hours'];
                    list($hours, $minutes, $seconds) = explode(':', $total_hours);
                    $total_seconds = $hours * 3600 + $minutes * 60 + $seconds; // Outputs: 9045
                    $hours = floor($total_seconds / 3600);
                    $minutes = floor(($total_seconds % 3600) / 60);
                    $seconds = $total_seconds % 60;
                    $formatted_Carertime = sprintf('%02d:%02d', $hours, $minutes, $seconds);

                    $sql_total_balance = mysqli_query($conn, "SELECT SUM(`col_carecall_rate`) AS total_payment FROM `tbl_daily_shift_records` 
                    WHERE (shift_date >= '$first_day_this_month' AND shift_date <= '$last_day_this_month' 
                    AND col_carer_Id = '" . $_SESSION['usr_carerId'] . "' AND `col_company_Id` = '" . $_SESSION['usr_compId'] . "') ");
                    $row_total_balance = mysqli_fetch_array($sql_total_balance, MYSQLI_ASSOC);
                    $total_clientPayment = number_format((float)$row_total_balance['total_payment'], 2, '.', '');
                    ?>

                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">Total hours</th>
                                <th class="px-4 py-3">Total pay</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            <tr class='text-gray-700 dark:text-gray-400'>
                                <td class='px-4 py-3 text-sm'>
                                    <h3 style="font-weight: 600; font-size:18px;">
                                        <?php print $formatted_Carertime . 'hr'; ?>
                                    </h3>
                                </td>
                                <td class='px-4 py-3 text-sm'>
                                    <h3 style="font-weight: 600; font-size:18px;">
                                        <?php print '£' . $total_clientPayment; ?>
                                    </h3>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </strong></h3>
        </div>

    </div>
    <?php include("footer-contents.php"); ?>