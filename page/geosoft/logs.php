<?php
include("header-panel.php");
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
                <form style="margin-top: 5px;" action="./care-calls-by-date" method="GET" enctype="multipart/form-data" autocomplete="off">
                    <div style="padding: 0px 0px 20px 5px; width:100%;">
                        <input type="date" value="<?php echo $today ?>" onchange='this.form.submit()' name="QueryDate" style="width: 150px; height:45px; background-color:inherit; border:none; font-size:18px; font-weight:600;" required />
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
    <div class="content">
        <table>
            <tr>
                <?php
                $sel_carer_carecall_result = mysqli_query($conn, "SELECT * FROM tbl_schedule_calls WHERE (Clientshift_Date >= '$first_day_this_month' AND Clientshift_Date <= '$last_day_this_month' 
                    AND first_carer_Id = '" . $_SESSION['usr_carerId'] . "' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') GROUP BY Clientshift_Date ");
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
                Punctual
            </td>
            <td style="width: 25px;"></td>
            <td style="border: none;">
                <img src="./assets/img/calendar.svg" style="height: 15px; width:15px;" alt="">
            </td>
            <td style="border: none; font-size:16px; font-weight:600;">
                <?php echo $todayPart; ?>
            </td>
        </tr>
    </table>
</div>

<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<main class="h-full overflow-y-auto">
    <div class="container px-4 mx-auto grid">
        <br>
        <!-- New Table -->
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Client</th>
                            <th style="text-align: right;" class="px-4 py-3">Care logs</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">

                        <?php
                        $result2 = mysqli_query($conn, "SELECT * FROM tbl_daily_shift_records WHERE (col_carer_Id = '$worker_specialId' AND col_company_Id = '$worker_companyId') 
                        GROUP BY uryyToeSS4 ORDER BY userId DESC LIMIT 100");
                        while ($rows = mysqli_fetch_array($result2)) {
                            echo "
                            <tr class='text-gray-700 dark:text-gray-400'>
                            <td class='px-4 py-3'>
                                <div class='flex items-center text-sm'>
                                <!-- Avatar with inset shadow -->
                                <div class='relative hidden w-8 h-8 mr-3 rounded-full md:block'>
                                    <img class='object-cover w-full h-full rounded-full' src='./assets/img/user_icons.png' alt='' loading='lazy' />
                                    <div class='absolute inset-0 rounded-full shadow-inner' aria-hidden='true'></div>
                                </div>
                                <div>
                                    <p class='font-semibold'>" . $rows['client_name'] . "</p>
                                    <p class='text-sm text-gray-600 dark:text-gray-400'>
                                    </p>
                                </div>
                                </div>
                            </td>
                            <td class='px-4 py-3 text-sm'>
                            <a class='inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100' href='./client-care-history?uryyToeSS4=" . $rows['uryyToeSS4'] . "'>
                                <span class='px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100'>
                                    Logs
                                </span>
                            </a>
                            </td>
                            </tr>
                        ";
                        } ?>
                    </tbody>
                </table>
            </div>


            <div style="height: 50px;"></div>
        </div>
        <?php include("footer-contents.php"); ?>