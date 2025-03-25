<?php
include("header-contents.php");

$sel_dist_att = mysqli_query($conn, "SELECT * FROM tbl_goesoft_carers_account WHERE user_email_address = '" . $_SESSION['usr_email'] . "' AND user_special_Id != '' ");
while ($att_rw = mysqli_fetch_array($sel_dist_att)) {
    $worker_specialId = $att_rw['user_special_Id'];

    $result_total_hour = mysqli_query($conn, "SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(`dateTime_out`, `dateTime_in`)))) AS total_worked_hours FROM `tbl_schedule_calls` WHERE first_carer_Id = '" . $_SESSION['usr_carerId'] . "' AND Clientshift_Date = '$today' ");
    $row_sel_total_hour = mysqli_fetch_array($result_total_hour, MYSQLI_ASSOC);

    $total_hours = $row_sel_total_hour['total_worked_hours'];

    $time = strtotime($total_hours);
    $round = 60;
    $rounded = round($time / $round) * $round;
    $displayCurHour = date("H:i", $rounded);


?>

    <main class="h-full overflow-y-auto">
        <div class="container px-4 mx-auto grid">
            <br />

            <!-- CTA -->
            <a class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple" href=" ">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                    <span><?php echo $currentDate; ?></span>
                </div>
                <span>
                    <?php
                    echo $displayCurHour . " hr";
                    ?>
                </span>
            </a>

            <form action="./care-calls-by-date" method="GET" enctype="multipart/form-data" autocomplete="off">
                <div style="padding: 0px 0px 20px 5px; margin-top:-20px;">
                    <input class='text-sm font-semibold text-gray-700 dark:text-gray-200' type="date" value="<?php echo $today ?>" name="txtSelectDate" style="width: 200px; height:45px; background-color:inherit; border-bottom:1px solid rgba(39, 174, 96,.2);" required />
                    <input type="submit" name="btnSelectQueryByDate" value="Filter" style="background-color:rgba(22, 160, 133,1.0); color:white; border:none; border-radius:5px; cursor:pointer; font-size:15px; padding:8px; width:60px; height:45px;">
                </div>
            </form>

            <br>
            <!-- Cards -->
            <div style=" margin-top:-25px;" class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
                <?php
                $sel_carer_carecall_result = mysqli_query($conn, "SELECT MAX(first_carer_Id), client_name, dateTime_in, dateTime_out, userId, uryyToeSS4, bgChange, Clientshift_Date, call_status FROM tbl_schedule_calls WHERE (Clientshift_Date = '$today'
        AND first_carer_Id = '$worker_specialId') GROUP BY dateTime_in ASC ");

                while ($trans = mysqli_fetch_array($sel_carer_carecall_result)) {
                    echo "
            <div style='box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;' class='shadow-sm p-3 bg-body flex mb-0 font-semibold text-gray-600 dark:text-gray-300 items-center dark:bg-gray-800'>
              <a class='inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100' href='./care-plan?userId=" . $trans['userId'] . "'>
                <div class='p-2 mr-4 text-white-500 bg-white-100 rounded-full dark:text-white-100 dark:bg-white-500'>
                  <img src='assets/img/client-user.webp' style='width: 50px; height:40px;' alt=''>
                </div>
                <div style='width:100%;'>
                <br>
                  <p id='body-Base-txt' class='mb-2 text-md font-medium' style='font-size:20px;'>
                  " . $trans['client_name'] . "
                  </p>
                  <p style='font-size:14px;' class='text-sm font-semibold text-gray-700 dark:text-gray-200'>
                    <span> " . $trans['dateTime_in'] . " -  " . $trans['dateTime_out'] . "</span>
                    <br>
                    <span style='float:right; background-color:" . $trans['bgChange'] . "; color:white; padding:3px 16px 3px 16px; border-radius:50px; font-size:12px;'>" . $trans['call_status'] . "</span>
                  </p>
                </div>
              </a>
            </div>
            <div style='width:width:100%; height:60px; text-align:center; margin-top:-25px; margin-bottom:-25px; border-left:1px solid green; padding:23px;'>
            <table style='margin-top:-22px;' class='table table-condensed'>
              <tr>
                <td>
                  <img src='./assets/img/suv-car-icon-png-0.png' style='width: 50px; height:50px;' alt=''>
                </td>
                <td>
                  <span style='font-size:15px;color:rgba(52, 73, 94,.5);'><strong> &nbsp; &nbsp; &nbsp; &nbsp; Travel hour " . $trans['dateTime_out'] . "</strong></span>
                  <br>
                  <span style='font-size:15px;color:rgba(52, 73, 94,.5);'> &nbsp; &nbsp; &nbsp; &nbsp; Driving is required</span>
                </td>
              </tr>
            </table>
          </div>
            ";
                }
                ?>

            </div>
            <br><br>
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
                        $result2 = mysqli_query($conn, "SELECT * FROM tbl_schedule_calls WHERE first_carer_Id = '$worker_specialId' OR second_carer_Id = '$worker_specialId' 
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
                        }
                    } ?>
                        </tbody>
                    </table>
                </div>


                <div style="height: 50px;"></div>
            </div>
            <?php include("footer-contents.php"); ?>