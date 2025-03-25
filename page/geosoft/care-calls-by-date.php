<?php
include("header-panel.php");
if (isset($_GET['QueryDate'])) {
    $txtDateQueryInput = mysqli_real_escape_string($conn, $_GET['QueryDate']);
    $myDayView = date("D, d M", strtotime($txtDateQueryInput));

    $sel_dist_att = mysqli_query($conn, "SELECT * FROM tbl_goesoft_carers_account 
    WHERE user_email_address = '" . $_SESSION['usr_email'] . "' AND user_special_Id != '' ");
    while ($att_rw = mysqli_fetch_array($sel_dist_att)) {
        $worker_specialId = $att_rw['user_special_Id'];
        $worker_companyId = $att_rw['col_company_Id'];

        $sql_total_hour = mysqli_query($conn, "SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(`dateTime_out`, `dateTime_in`)))) AS total_worked_hours 
        FROM `tbl_schedule_calls` WHERE (first_carer_Id = '$worker_specialId' AND rightTo_display = 'True' AND Clientshift_Date = '$txtDateQueryInput' 
        AND uryyToeSS4 != 'Null' AND `col_company_Id` = '$worker_companyId')");
        if (!$sql_total_hour) {
            die("Query Failed: " . mysqli_error($conn));
        }
        $row_total_hour = mysqli_fetch_array($sql_total_hour, MYSQLI_ASSOC);
        $total_hours = $row_total_hour['total_worked_hours'] ?? '00:00:00';

        $time_parts = explode(':', $total_hours);
        if (count($time_parts) === 3) {
            list($hours, $minutes, $seconds) = $time_parts;
        } else {
            $hours = 0;
            $minutes = 0;
            $seconds = 0;
        }
        $hours = (int)$hours;
        $minutes = (int)$minutes;
        $seconds = (int)$seconds;

        $total_seconds = $hours * 3600 + $minutes * 60 + $seconds;

        $hours = floor($total_seconds / 3600);
        $minutes = floor(($total_seconds % 3600) / 60);
        $formatted_Carertime = sprintf('%02d:%02d', $hours, $minutes);
        $dt = $today;
        $firstDateofMonth = date("Y-m-01", strtotime($dt));
        $lastDateofMonth = date("Y-m-t", strtotime($dt));
        include("sub-header.php");
?>




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
                        <?php echo $myDayView; ?>
                    </td>
                </tr>
            </table>
        </div>


        <main class="h-full overflow-y-auto">
            <div class="container px-4 mx-auto grid">
                <br />
                <!-- Cards -->
                <div style=" margin-top:-10px;" class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
            <?php
            if (isset($conn, $txtDateQueryInput, $worker_specialId, $worker_companyId)) {
                // Prepare SQL query using prepared statements
                $query = "
        SELECT 
            c.userId, 
            c.first_carer_Id, 
            c.client_name, 
            c.Clientshift_Date, 
            c.col_occurence, 
            c.dateTime_in, 
            c.dateTime_out, 
            c.call_status, 
            c.bgChange, 
            c.rightTo_display, 
            c.col_required_carers, 
            c.uryyToeSS4 
        FROM tbl_schedule_calls c 
        LEFT JOIN tbl_cancelled_call a 
            ON c.uryyToeSS4 = a.col_client_Id 
            AND c.care_calls = a.col_care_call 
            AND CURDATE() = a.col_date 
        WHERE 
            c.Clientshift_Date = ? 
            AND a.col_client_Id IS NULL 
            AND c.first_carer_Id = ? 
            AND c.uryyToeSS4 != 'NULL' 
            AND c.rightTo_display = 'True' 
            AND c.col_company_Id = ? 
        ORDER BY c.dateTime_in ASC";

                // Prepare the statement
                if ($stmt = mysqli_prepare($conn, $query)) {
                    // Bind parameters
                    mysqli_stmt_bind_param($stmt, "sss", $txtDateQueryInput, $worker_specialId, $worker_companyId);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);

                    if (mysqli_num_rows($result) > 0) {
                        while ($trans = mysqli_fetch_assoc($result)) {
                            $userId = htmlspecialchars($trans['userId']);
                            $clientName = htmlspecialchars($trans['client_name']);
                            $dateTimeIn = htmlspecialchars($trans['dateTime_in']);
                            $dateTimeOut = htmlspecialchars($trans['dateTime_out']);
                            $callStatus = htmlspecialchars($trans['call_status']);
                            $bgChange = htmlspecialchars($trans['bgChange']);

                            echo "
                    <div style='box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px; border-top-right-radius:15px; border-top:4px solid $bgChange;' 
                        class='shadow-sm p-3 bg-body flex mb-0 font-semibold text-gray-600 dark:text-gray-300 items-center dark:bg-gray-800'>
                        <a class='inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100' 
                           href='./checking-visit-status?userId=$userId'>
                            <div class='p-2 mr-4 text-white-500 bg-white-100 rounded-full dark:text-white-100 dark:bg-white-500'>
                                <img src='assets/img/client-user.webp' style='width: 50px; height:40px;' alt='Client'>
                            </div>
                            <div style='width:100%;'>
                                <br>
                                <p id='body-Base-txt' class='mb-2 text-md font-medium' style='font-size:20px;'>
                                    $clientName
                                </p>
                                <p style='font-size:14px;' class='text-sm font-semibold text-gray-700 dark:text-gray-200'>
                                    <span> $dateTimeIn - $dateTimeOut </span>
                                    <br>
                                    <span style='float:right; background-color:$bgChange; color:white; padding:3px 16px; border-radius:50px; font-size:12px;'>
                                        $callStatus
                                    </span>
                                </p>
                            </div>
                        </a>
                    </div>";
                        }
                    } else {
                        echo "
                <div style='width: 100%; text-align:center; justify-content:center; align-items:center; padding:33px;'>
                    <h1 id='noVisitBox'>No <br>Visits</h1>
                </div>";
                    }

                    // Close the statement
                    mysqli_stmt_close($stmt);
                } else {
                    echo "Error preparing the query.";
                }
            } else {
                echo "Database connection or required variables not set.";
            }
        }
    }
            ?>


                </div>

                <?php include("footer-contents.php"); ?>