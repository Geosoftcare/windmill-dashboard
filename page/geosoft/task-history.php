<?php include("header-contents.php"); ?>


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
    <div class="containerbox">
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





<main class="h-full overflow-y-auto">
    <div class="container px-4 mx-auto grid">
        <br />

        <?php
        if (isset($_GET['col_care_call_Id'])) {
            $Mycare_call_Id = $_GET['col_care_call_Id'];
        ?>
            <a href="./medication-history?col_care_call_Id=<?php echo $Mycare_call_Id;
                                                        } ?>" style="text-decoration: none;">
                <input type="submit" name="btnSelectQueryByDate" value="Meds history" style="background-color:rgba(22, 160, 133,1.0); margin-top:-30px; margin-bottom:15px; color:white; border:none; border-radius:5px; cursor:pointer; font-size:15px; padding:8px; width:130px; height:55px;">
            </a>
            <br>
            <!-- Cards -->
            <div class="grid gap-6 mb-8 md:grid-cols-4 xl:grid-cols-4">
                <?php
                if (isset($_GET['col_care_call_Id'])) {
                    $Mycare_call_Id = $_GET['col_care_call_Id'];

                    $result = mysqli_query($conn, "SELECT * FROM tbl_finished_tasks WHERE (col_care_call_Id='$Mycare_call_Id') ORDER BY task_Id DESC ");
                    while ($rowAreaDate = mysqli_fetch_array($result)) {
                        $taskDate = date('d M, Y', strtotime("" . $rowAreaDate['dateTime'] . ""));
                        $taskTime = date('h:i', strtotime("" . $rowAreaDate['dateTime'] . ""));
                        echo "
                        <div style='margin-top: -30px; box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;' class='shadow-sm p-3 mb-5 bg-body flex mb-4 font-semibold text-gray-600 dark:text-gray-300 items-center dark:bg-gray-800'>
                            <a class='inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100' href=''>
                                <div style='width:100%;'>
                                    <p id='body-Base-txt' class='mb-2 text-md font-medium' style='font-size:20px;'><span>" . $rowAreaDate['task_name'] . " </span></p>
                                    <hr>
                                    <p id='body-Base-txt' class='mb-2 text-md font-medium' style='font-size:18px;'>
                                    " . $rowAreaDate['task_note'] . "
                                    </p>
                                        <span style='color:rgba(39, 174, 96,1.0); font-size:15px; padding:4px 7px 0px 0px; float:right;'>
                                            " . $taskDate . " | " . $taskTime . "
                                        </span>
                                </div>
                            </a>
                        </div>
                        ";
                    }
                }
                ?>
            </div>

    </div>
    <?php include("footer-contents.php"); ?>