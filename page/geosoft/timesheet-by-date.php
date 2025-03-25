<?php include("header-contents.php"); ?>

<main class="h-full overflow-y-auto">
    <?php
    if (isset($_GET['QueryDate'])) {
        $txtDateQueryInput = mysqli_real_escape_string($conn, $_GET['QueryDate']);
    ?>
        <!-- New Table -->
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <h3 class='text-gray-700 dark:text-gray-400' style="padding: 22px;"><strong>Timesheet</strong></h3>
                <form style="margin-top: 5px;" action="./timesheet-by-date" method="GET" enctype="multipart/form-data" autocomplete="off">
                    <div style="padding: 0px 0px 20px 25px; width:100%;">
                        <input type="date" value="<?php echo $today ?>" onchange='this.form.submit()' name="QueryDate" style="width: 150px; height:45px; background-color:inherit; border:none; font-size:18px; font-weight:600;" required />
                    </div>
                </form>
                <br>
                <hr>
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Client</th>
                            <th class="px-4 py-3">Time in</th>
                            <th class="px-4 py-3">Time out</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">

                        <?php
                        $sel_dist_att = mysqli_query($conn, "SELECT * FROM tbl_goesoft_carers_account WHERE user_email_address = '" . $_SESSION['usr_email'] . "' AND user_special_Id != '' ");
                        while ($att_rw = mysqli_fetch_array($sel_dist_att)) {
                            $worker_specialId = $att_rw['user_special_Id'];

                            $first_day_this_month = date('Y-m-01');
                            $last_day_this_month  = date('Y-m-t');
                            $sqlSelection = mysqli_query($conn, "SELECT * FROM tbl_daily_shift_records WHERE (`timesheet_date` = '$txtDateQueryInput' AND col_carer_Id = '$worker_specialId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                            while ($rowResult = mysqli_fetch_array($sqlSelection)) {
                        ?>
                                <tr class='text-gray-700 dark:text-gray-400'>
                                    <td class='px-4 py-3'>
                                        <div class='flex items-center text-sm'>
                                            <!-- Avatar with inset shadow -->
                                            <div class='relative hidden w-8 h-8 mr-3 rounded-full md:block'>
                                                <img class='object-cover w-full h-full rounded-full' src='./assets/img/user_icons.png' alt='' loading='lazy' />
                                                <div class='absolute inset-0 rounded-full shadow-inner' aria-hidden='true'></div>
                                            </div>
                                            <div>
                                                <p class='font-semibold'><?php echo $rowResult['client_name']; ?></p>
                                                <p class='text-sm text-gray-600 dark:text-gray-400'>
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class='px-4 py-3 text-sm'>
                                        <?php echo $rowResult['planned_timeIn']; ?>
                                    </td>
                                    <td class='px-4 py-3 text-sm'>
                                        <?php echo $rowResult['planned_timeOut']; ?>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                    </tbody>
                </table>
                <h3 class='text-gray-700 dark:text-gray-400' style="padding: 22px;"><strong>
                        <br>

                        <?php
                            $checking_carer_carecall = mysqli_query($conn, "SELECT * FROM `tbl_daily_shift_records` WHERE (`timesheet_date` = '$txtDateQueryInput' AND col_carer_Id = '$worker_specialId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                            $countcarer_carecalls = mysqli_num_rows($checking_carer_carecall);

                            $first_day_this_month = date('Y-m-01');
                            $last_day_this_month  = date('Y-m-t');
                            $result = mysqli_query($conn, "SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(`planned_timeOut`, `planned_timeIn`)))) AS total_worked_hours FROM `tbl_daily_shift_records` 
                            WHERE (`timesheet_date` = '$txtDateQueryInput' AND col_carer_Id = '$worker_specialId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                            $total_hours = $row['total_worked_hours'];

                            $time = strtotime($total_hours);
                            $round = 60;
                            $rounded = round($time / $round) * $round;


                        ?>
                        -----------------
                        <br>
                        <span style="font-weight: 600; font-size:18px;">
                        <?php
                            if ($countcarer_carecalls == 0) {
                                echo "00:00 hr";
                            } else {
                                echo date("H:i", $rounded) . " hr";
                            }
                        }
                        ?>
                        </span>
                        <br>
                        -----------------
                    </strong></h3>
            </div>

        </div>
    <?php } ?>
    <?php include("footer-contents.php"); ?>