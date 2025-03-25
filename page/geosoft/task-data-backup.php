<?php
include('dbconnection-string.php');
if (isset($_GET['uryyToeSS4'])) {
    $uryyToeSS4 = $_GET['uryyToeSS4'];

    echo $uryyToeSS4;
}

$sel_client_careCall_result = mysqli_query($conn, "SELECT * FROM tbl_care_calls WHERE (uryyToeSS4='$uryyToeSS4' AND col_carer_Id = '" . $_SESSION['usr_carerId'] . "' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ORDER BY userId DESC LIMIT 1 ");
$row_client_carecalls = mysqli_fetch_array($sel_client_careCall_result, MYSQLI_ASSOC);
$clientSpecialId = $row_client_carecalls['uryyToeSS4'];
$clientCurCallCalls = $row_client_carecalls['col_care_call'];


$sel_task_data = mysqli_query($conn, "SELECT * FROM tbl_general_client_form WHERE uryyToeSS4='$uryyToeSS4' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ");
while ($display_client_data = mysqli_fetch_array($sel_task_data)) {
    $client_firstName = $display_client_data['client_first_name'];
    $client_lastName = $display_client_data['client_last_name'];
}
?>

<div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen}">
    <main class="h-full pb-16 overflow-y-auto">

        <div style="margin-top: -10px;" class="container px-2 mx-auto grid">
            <!--<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Task
            </h2>-->

            <div style="margin-top: 30px;" class="grid gap-6 mb-8 md:grid-cols-2">
                <div class="min-w-0 p-2 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                    <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                        Care call <br><small><span></span><?php echo $client_firstName . ' ' . $client_lastName; ?> Task</small>
                    </h4>

                    <div style="margin-top: -20px;" class="flex mb-4 font-semibold text-gray-600 dark:text-gray-300 items-center p-2 dark:bg-gray-800">
                        <div style='width:100%; height:auto;display:block;'>
                            <hr>
                            <div style="font-size: 20px;" class="mb-2 font-semibold text-gray-600 dark:text-gray-300">
                                <br>
                                Medication(s)
                            </div>
                            <?php
                            include_once('medication-progress.php');
                            ?>

                            <hr>
                            <div style="font-size: 20px;" class="mb-2 font-semibold text-gray-600 dark:text-gray-300">
                                <br>
                                Task(s)
                            </div>
                            <?php
                            //Task progress for the client begin here
                            //-------------------Breakfast time start here---------------------
                            if ($clientCurCallCalls == 'Morning' or $clientCurCallCalls == 'Breakfast') {
                                if ($echoCurDay == 'Monday') {
                                    $sel_task_data_result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call1='Breakfast' AND monday='$echoCurDay' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    while ($display_task_data_row = mysqli_fetch_array($sel_task_data_result)) {
                                        $get_certain_task_Id = $display_task_data_row['client_Id'];

                                        $check_task_data_result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE (client_Id='$get_certain_task_Id' AND care_call1='Breakfast' AND task_endDate >= '$today' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        while ($display_taskCheck_data_row = mysqli_fetch_array($check_task_data_result)) {
                                            $get_cehck_task_Id = $display_taskCheck_data_row['client_Id'];
                                            echo "
                                            <a class='text-gray-600 dark:text-gray-300' href='./task-report-form?client_task_Id=" . $display_task_data_row['client_task_Id'] . "' style='text-decoration:none;'>
                                                <hr>
                                                <div style='width: 100%; height:auto; padding:12px; color:" . $display_task_data_row['task_colours'] . ";'>
                                                    <span class='text-gray-600 dark:text-gray-300' style='font-size:18px;'>" . $display_task_data_row['client_taskName'] . "</span>
                                                    <span class='text-gray-600 dark:text-gray-300' style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                    <br>
                                                     <span style='font-size: 13px;'>" . $display_task_data_row['visibility'] . "</span>
                                                </div>
                                            </a>
                                            ";
                                        }
                                    }
                                } else if ($echoCurDay == 'Tuesday') {
                                    $sel_task_data_result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call1='Breakfast' AND tuesday='$echoCurDay' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    while ($display_task_data_row = mysqli_fetch_array($sel_task_data_result)) {
                                        $get_certain_task_Id = $display_task_data_row['client_Id'];

                                        $check_task_data_result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE (client_Id='$get_certain_task_Id' AND care_call1='Breakfast' AND task_endDate >= '$today' AND care_call1='Breakfast' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        while ($display_taskCheck_data_row = mysqli_fetch_array($check_task_data_result)) {
                                            $get_cehck_task_Id = $display_taskCheck_data_row['client_Id'];
                                            echo "
                                        <a class='text-gray-600 dark:text-gray-300' href='./task-report-form?client_task_Id=" . $display_task_data_row['client_task_Id'] . "' style='text-decoration:none;'>
                                                <hr>
                                                <div style='width: 100%; height:auto; padding:12px; color:" . $display_task_data_row['task_colours'] . ";'>
                                                    <span class='text-gray-600 dark:text-gray-300'>" . $display_task_data_row['client_taskName'] . "</span>
                                                    <span class='text-gray-600 dark:text-gray-300' style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                    <br>
                                                     <span style='font-size: 13px;'>" . $display_task_data_row['visibility'] . "</span>
                                                </div>
                                            </a>
                                        ";
                                        }
                                    }
                                } else if ($echoCurDay == 'Wednesday') {
                                    $sel_task_data_result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call1='Breakfast' AND wednesday='$echoCurDay' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    while ($display_task_data_row = mysqli_fetch_array($sel_task_data_result)) {
                                        $get_certain_task_Id = $display_task_data_row['client_Id'];

                                        $check_task_data_result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE (client_Id='$get_certain_task_Id' AND care_call1='Breakfast' AND task_endDate >= '$today' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        while ($display_taskCheck_data_row = mysqli_fetch_array($check_task_data_result)) {
                                            $get_cehck_task_Id = $display_taskCheck_data_row['client_Id'];
                                            echo "
                                        <a class='text-gray-600 dark:text-gray-300' href='./task-report-form?client_task_Id=" . $display_task_data_row['client_task_Id'] . "' style='text-decoration:none;'>
                                                <hr>
                                                <div style='width: 100%; height:auto; padding:12px; color:" . $display_task_data_row['task_colours'] . ";'>
                                                    <span class='text-gray-600 dark:text-gray-300'>" . $display_task_data_row['client_taskName'] . "</span>
                                                    <span class='text-gray-600 dark:text-gray-300' style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                    <br>
                                                     <span style='font-size: 13px;'>" . $display_task_data_row['visibility'] . "</span>
                                                </div>
                                            </a>
                                        ";
                                        }
                                    }
                                } else if ($echoCurDay == 'Thursday') {
                                    $sel_task_data_result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call1='Breakfast' AND thursday='$echoCurDay' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    while ($display_task_data_row = mysqli_fetch_array($sel_task_data_result)) {
                                        $get_certain_task_Id = $display_task_data_row['client_Id'];

                                        $check_task_data_result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE (client_Id='$get_certain_task_Id' AND care_call1='Breakfast' AND task_endDate >= '$today' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        while ($display_taskCheck_data_row = mysqli_fetch_array($check_task_data_result)) {
                                            $get_cehck_task_Id = $display_taskCheck_data_row['client_Id'];
                                            echo "
                                                <a class='text-gray-600 dark:text-gray-300' href='./task-report-form?client_task_Id=" . $display_task_data_row['client_task_Id'] . "' style='text-decoration:none;'>
                                                <hr>
                                                <div style='width: 100%; height:auto; padding:12px; color:" . $display_task_data_row['task_colours'] . ";'>
                                                    <span class='text-gray-600 dark:text-gray-300'>" . $display_task_data_row['client_taskName'] . "</span>
                                                    <span class='text-gray-600 dark:text-gray-300' style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                    <br>
                                                     <span style='font-size: 13px;'>" . $display_task_data_row['visibility'] . "</span>
                                                </div>
                                            </a>

                                        ";
                                        }
                                    }
                                } else if ($echoCurDay == 'Friday') {
                                    $sel_task_data_result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call1='Breakfast' AND friday='$echoCurDay' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    while ($display_task_data_row = mysqli_fetch_array($sel_task_data_result)) {
                                        $get_certain_task_Id = $display_task_data_row['client_Id'];

                                        $check_task_data_result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE (client_Id='$get_certain_task_Id' AND care_call1='Breakfast' AND task_endDate >= '$today' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        while ($display_taskCheck_data_row = mysqli_fetch_array($check_task_data_result)) {
                                            $get_cehck_task_Id = $display_taskCheck_data_row['client_Id'];
                                            echo "
                                        <a class='text-gray-600 dark:text-gray-300' href='./task-report-form?client_task_Id=" . $display_task_data_row['client_task_Id'] . "' style='text-decoration:none;'>
                                                <hr>
                                                <div style='width: 100%; height:auto; padding:12px; color:" . $display_task_data_row['task_colours'] . ";'>
                                                    <span class='text-gray-600 dark:text-gray-300'>" . $display_task_data_row['client_taskName'] . "</span>
                                                    <span class='text-gray-600 dark:text-gray-300' style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                    <br>
                                                     <span style='font-size: 13px;'>" . $display_task_data_row['visibility'] . "</span>
                                                </div>
                                            </a>

                                        ";
                                        }
                                    }
                                } else if ($echoCurDay == 'Saturday') {
                                    $sel_task_data_result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call1='Breakfast' AND saturday='$echoCurDay' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    while ($display_task_data_row = mysqli_fetch_array($sel_task_data_result)) {
                                        $get_certain_task_Id = $display_task_data_row['client_Id'];

                                        $check_task_data_result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE (client_Id='$get_certain_task_Id' AND care_call1='Breakfast' AND task_endDate >= '$today' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        while ($display_taskCheck_data_row = mysqli_fetch_array($check_task_data_result)) {
                                            $get_cehck_task_Id = $display_taskCheck_data_row['client_Id'];
                                            echo "
                                        <a class='text-gray-600 dark:text-gray-300' href='./task-report-form?client_task_Id=" . $display_task_data_row['client_task_Id'] . "' style='text-decoration:none;'>
                                                <hr>
                                                <div style='width: 100%; height:auto; padding:12px; color:" . $display_task_data_row['task_colours'] . ";'>
                                                    <span class='text-gray-600 dark:text-gray-300'>" . $display_task_data_row['client_taskName'] . "</span>
                                                    <span class='text-gray-600 dark:text-gray-300' style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                    <br>
                                                     <span style='font-size: 13px;'>" . $display_task_data_row['visibility'] . "</span>
                                                </div>
                                            </a>

                                        ";
                                        }
                                    }
                                } else if ($echoCurDay == 'Sunday') {
                                    $sel_task_data_result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call1='Breakfast' AND sunday='$echoCurDay' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    while ($display_task_data_row = mysqli_fetch_array($sel_task_data_result)) {
                                        $get_certain_task_Id = $display_task_data_row['client_Id'];

                                        $check_task_data_result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE (client_Id='$get_certain_task_Id' AND care_call1='Breakfast' AND task_endDate >= '$today' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        while ($display_taskCheck_data_row = mysqli_fetch_array($check_task_data_result)) {
                                            $get_cehck_task_Id = $display_taskCheck_data_row['client_Id'];
                                            echo "
                                        <a class='text-gray-600 dark:text-gray-300' href='./task-report-form?client_task_Id=" . $display_task_data_row['client_task_Id'] . "' style='text-decoration:none;'>
                                                <hr>
                                                <div style='width: 100%; height:auto; padding:12px; color:" . $display_task_data_row['task_colours'] . ";'>
                                                    <span class='text-gray-600 dark:text-gray-300'>" . $display_task_data_row['client_taskName'] . "</span>
                                                    <span class='text-gray-600 dark:text-gray-300' style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                    <br>
                                                     <span style='font-size: 13px;'>" . $display_task_data_row['visibility'] . "</span>
                                                </div>
                                            </a>

                                        ";
                                        }
                                    }
                                }   //-------------------Lunch time start here---------------------
                            } else if ($clientCurCallCalls == 'Lunch') {
                                if ($echoCurDay == 'Monday') {
                                    $sel_task_data_result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call2='Lunch' AND monday='$echoCurDay' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    while ($display_task_data_row = mysqli_fetch_array($sel_task_data_result)) {
                                        $get_certain_task_Id = $display_task_data_row['client_Id'];

                                        $check_task_data_result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE (client_Id='$get_certain_task_Id' AND care_call2='Lunch' AND task_endDate >= '$today' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        while ($display_taskCheck_data_row = mysqli_fetch_array($check_task_data_result)) {
                                            $get_cehck_task_Id = $display_taskCheck_data_row['client_Id'];
                                            echo "
                                            <a class='text-gray-600 dark:text-gray-300' href='./task-report-form?client_task_Id=" . $display_task_data_row['client_task_Id'] . "' style='text-decoration:none;'>
                                                <hr>
                                                <div style='width: 100%; height:auto; padding:12px; color:" . $display_task_data_row['task_colours'] . ";'>
                                                    <span class='text-gray-600 dark:text-gray-300'>" . $display_task_data_row['client_taskName'] . "</span>
                                                    <span class='text-gray-600 dark:text-gray-300' style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                    <br>
                                                     <span style='font-size: 13px;'>" . $display_task_data_row['visibility'] . "</span>
                                                </div>
                                            </a>

                                        ";
                                        }
                                    }
                                } else if ($echoCurDay == 'Tuesday') {
                                    $sel_task_data_result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call2='Lunch' AND tuesday='$echoCurDay' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    while ($display_task_data_row = mysqli_fetch_array($sel_task_data_result)) {
                                        $get_certain_task_Id = $display_task_data_row['client_Id'];

                                        $check_task_data_result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE (client_Id='$get_certain_task_Id' AND care_call2='Lunch' AND task_endDate >= '$today' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        while ($display_taskCheck_data_row = mysqli_fetch_array($check_task_data_result)) {
                                            $get_cehck_task_Id = $display_taskCheck_data_row['client_Id'];
                                            echo "
                                            <a class='text-gray-600 dark:text-gray-300' href='./task-report-form?client_task_Id=" . $display_task_data_row['client_task_Id'] . "' style='text-decoration:none;'>
                                                <hr>
                                                <div style='width: 100%; height:auto; padding:12px; color:" . $display_task_data_row['task_colours'] . ";'>
                                                    <span class='text-gray-600 dark:text-gray-300'>" . $display_task_data_row['client_taskName'] . "</span>
                                                    <span class='text-gray-600 dark:text-gray-300' style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                    <br>
                                                     <span style='font-size: 13px;'>" . $display_task_data_row['visibility'] . "</span>
                                                </div>
                                            </a>
                                        ";
                                        }
                                    }
                                } else if ($echoCurDay == 'Wednesday') {
                                    $sel_task_data_result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call2='Lunch' AND wednesday='$echoCurDay' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    while ($display_task_data_row = mysqli_fetch_array($sel_task_data_result)) {
                                        $get_certain_task_Id = $display_task_data_row['client_Id'];

                                        $check_task_data_result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE (client_Id='$get_certain_task_Id' AND care_call2='Lunch' AND task_endDate >= '$today' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        while ($display_taskCheck_data_row = mysqli_fetch_array($check_task_data_result)) {
                                            $get_cehck_task_Id = $display_taskCheck_data_row['client_Id'];
                                            echo "
                                        <a class='text-gray-600 dark:text-gray-300' href='./task-report-form?client_task_Id=" . $display_task_data_row['client_task_Id'] . "' style='text-decoration:none;'>
                                                <hr>
                                                <div style='width: 100%; height:auto; padding:12px; color:" . $display_task_data_row['task_colours'] . ";'>
                                                    <span class='text-gray-600 dark:text-gray-300'>" . $display_task_data_row['client_taskName'] . "</span>
                                                    <span class='text-gray-600 dark:text-gray-300' style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                    <br>
                                                     <span style='font-size: 13px;'>" . $display_task_data_row['visibility'] . "</span>
                                                </div>
                                            </a>

                                        ";
                                        }
                                    }
                                } else if ($echoCurDay == 'Thursday') {
                                    $sel_task_data_result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call2='Lunch' AND thursday='$echoCurDay' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    while ($display_task_data_row = mysqli_fetch_array($sel_task_data_result)) {
                                        $get_certain_task_Id = $display_task_data_row['client_Id'];

                                        $check_task_data_result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE (client_Id='$get_certain_task_Id' AND care_call2='Lunch' AND task_endDate >= '$today' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        while ($display_taskCheck_data_row = mysqli_fetch_array($check_task_data_result)) {
                                            $get_cehck_task_Id = $display_taskCheck_data_row['client_Id'];
                                            echo "
                                        <a class='text-gray-600 dark:text-gray-300' href='./task-report-form?client_task_Id=" . $display_task_data_row['client_task_Id'] . "' style='text-decoration:none;'>
                                                <hr>
                                                <div style='width: 100%; height:auto; padding:12px; color:" . $display_task_data_row['task_colours'] . ";'>
                                                    <span class='text-gray-600 dark:text-gray-300'>" . $display_task_data_row['client_taskName'] . "</span>
                                                    <span class='text-gray-600 dark:text-gray-300' style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                    <br>
                                                     <span style='font-size: 13px;'>" . $display_task_data_row['visibility'] . "</span>
                                                </div>
                                            </a>

                                        ";
                                        }
                                    }
                                } else if ($echoCurDay == 'Friday') {
                                    $sel_task_data_result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call2='Lunch' AND friday='$echoCurDay' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    while ($display_task_data_row = mysqli_fetch_array($sel_task_data_result)) {
                                        $get_certain_task_Id = $display_task_data_row['client_Id'];

                                        $check_task_data_result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE (client_Id='$get_certain_task_Id' AND care_call2='Lunch' AND task_endDate >= '$today' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        while ($display_taskCheck_data_row = mysqli_fetch_array($check_task_data_result)) {
                                            $get_cehck_task_Id = $display_taskCheck_data_row['client_Id'];
                                            echo "
                                        <a class='text-gray-600 dark:text-gray-300' href='./task-report-form?client_task_Id=" . $display_task_data_row['client_task_Id'] . "' style='text-decoration:none;'>
                                                <hr>
                                                <div style='width: 100%; height:auto; padding:12px; color:" . $display_task_data_row['task_colours'] . ";'>
                                                    <span class='text-gray-600 dark:text-gray-300'>" . $display_task_data_row['client_taskName'] . "</span>
                                                    <span class='text-gray-600 dark:text-gray-300' style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                    <br>
                                                     <span style='font-size: 13px;'>" . $display_task_data_row['visibility'] . "</span>
                                                </div>
                                            </a>

                                        ";
                                        }
                                    }
                                } else if ($echoCurDay == 'Saturday') {
                                    $sel_task_data_result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call2='Lunch' AND saturday='$echoCurDay' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    while ($display_task_data_row = mysqli_fetch_array($sel_task_data_result)) {
                                        $get_certain_task_Id = $display_task_data_row['client_Id'];

                                        $check_task_data_result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE (client_Id='$get_certain_task_Id' AND care_call2='Lunch' AND task_endDate >= '$today' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        while ($display_taskCheck_data_row = mysqli_fetch_array($check_task_data_result)) {
                                            $get_cehck_task_Id = $display_taskCheck_data_row['client_Id'];
                                            echo "
                                        <a class='text-gray-600 dark:text-gray-300' href='./task-report-form?client_task_Id=" . $display_task_data_row['client_task_Id'] . "' style='text-decoration:none;'>
                                                <hr>
                                                <div style='width: 100%; height:auto; padding:12px; color:" . $display_task_data_row['task_colours'] . ";'>
                                                    <span class='text-gray-600 dark:text-gray-300'>" . $display_task_data_row['client_taskName'] . "</span>
                                                    <span class='text-gray-600 dark:text-gray-300' style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                    <br>
                                                     <span style='font-size: 13px;'>" . $display_task_data_row['visibility'] . "</span>
                                                </div>
                                            </a>

                                        ";
                                        }
                                    }
                                } else if ($echoCurDay == 'Sunday') {
                                    $sel_task_data_result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call2='Lunch' AND sunday='$echoCurDay' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    while ($display_task_data_row = mysqli_fetch_array($sel_task_data_result)) {
                                        $get_certain_task_Id = $display_task_data_row['client_Id'];

                                        $check_task_data_result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE (client_Id='$get_certain_task_Id' AND care_call2='Lunch' AND task_endDate >= '$today' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        while ($display_taskCheck_data_row = mysqli_fetch_array($check_task_data_result)) {
                                            $get_cehck_task_Id = $display_taskCheck_data_row['client_Id'];
                                            echo "
                                        <a class='text-gray-600 dark:text-gray-300' href='./task-report-form?client_task_Id=" . $display_task_data_row['client_task_Id'] . "' style='text-decoration:none;'>
                                                <hr>
                                                <div style='width: 100%; height:auto; padding:12px; color:" . $display_task_data_row['task_colours'] . ";'>
                                                    <span class='text-gray-600 dark:text-gray-300'>" . $display_task_data_row['client_taskName'] . "</span>
                                                    <span class='text-gray-600 dark:text-gray-300' style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                    <br>
                                                     <span style='font-size: 13px;'>" . $display_task_data_row['visibility'] . "</span>
                                                </div>
                                            </a>

                                        ";
                                        }
                                    }
                                }               //-------------------Tea call code start here---------------------
                            } else if ($clientCurCallCalls == 'Tea') {
                                if ($echoCurDay == 'Monday') {
                                    $sel_task_data_result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call3='Tea' AND monday='$echoCurDay' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    while ($display_task_data_row = mysqli_fetch_array($sel_task_data_result)) {
                                        $get_certain_task_Id = $display_task_data_row['client_Id'];

                                        $check_task_data_result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE (client_Id='$get_certain_task_Id' AND care_call3='Tea' AND task_endDate >= '$today' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        while ($display_taskCheck_data_row = mysqli_fetch_array($check_task_data_result)) {
                                            $get_cehck_task_Id = $display_taskCheck_data_row['client_Id'];
                                            echo "
                                        <a class='text-gray-600 dark:text-gray-300' href='./task-report-form?client_task_Id=" . $display_task_data_row['client_task_Id'] . "' style='text-decoration:none;'>
                                                <hr>
                                                <div style='width: 100%; height:auto; padding:12px; color:" . $display_task_data_row['task_colours'] . ";'>
                                                    <span class='text-gray-600 dark:text-gray-300'>" . $display_task_data_row['client_taskName'] . "</span>
                                                    <span class='text-gray-600 dark:text-gray-300' style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                    <br>
                                                     <span style='font-size: 13px;'>" . $display_task_data_row['visibility'] . "</span>
                                                </div>
                                            </a>

                                        ";
                                        }
                                    }
                                } else if ($echoCurDay == 'Tuesday') {
                                    $sel_task_data_result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call3='Tea' AND tuesday='$echoCurDay' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    while ($display_task_data_row = mysqli_fetch_array($sel_task_data_result)) {
                                        $get_certain_task_Id = $display_task_data_row['client_Id'];

                                        $check_task_data_result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE (client_Id='$get_certain_task_Id' AND care_call3='Tea' AND care_call3='Tea' AND task_endDate >= '$today' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        while ($display_taskCheck_data_row = mysqli_fetch_array($check_task_data_result)) {
                                            $get_cehck_task_Id = $display_taskCheck_data_row['client_Id'];
                                            echo "
                                        <a class='text-gray-600 dark:text-gray-300' href='./task-report-form?client_task_Id=" . $display_task_data_row['client_task_Id'] . "' style='text-decoration:none;'>
                                                <hr>
                                                <div style='width: 100%; height:auto; padding:12px; color:" . $display_task_data_row['task_colours'] . ";'>
                                                    <span class='text-gray-600 dark:text-gray-300'>" . $display_task_data_row['client_taskName'] . "</span>
                                                    <span class='text-gray-600 dark:text-gray-300' style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                    <br>
                                                     <span style='font-size: 13px;'>" . $display_task_data_row['visibility'] . "</span>
                                                </div>
                                            </a>

                                        ";
                                        }
                                    }
                                } else if ($echoCurDay == 'Wednesday') {
                                    $sel_task_data_result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call3='Tea' AND wednesday='$echoCurDay' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    while ($display_task_data_row = mysqli_fetch_array($sel_task_data_result)) {
                                        $get_certain_task_Id = $display_task_data_row['client_Id'];

                                        $check_task_data_result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE (client_Id='$get_certain_task_Id' AND care_call3='Tea' AND task_endDate >= '$today' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        while ($display_taskCheck_data_row = mysqli_fetch_array($check_task_data_result)) {
                                            $get_cehck_task_Id = $display_taskCheck_data_row['client_Id'];
                                            echo "
                                        <a class='text-gray-600 dark:text-gray-300' href='./task-report-form?client_task_Id=" . $display_task_data_row['client_task_Id'] . "' style='text-decoration:none;'>
                                                <hr>
                                                <div style='width: 100%; height:auto; padding:12px; color:" . $display_task_data_row['task_colours'] . ";'>
                                                    <span class='text-gray-600 dark:text-gray-300'>" . $display_task_data_row['client_taskName'] . "</span>
                                                    <span class='text-gray-600 dark:text-gray-300' style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                    <br>
                                                     <span style='font-size: 13px;'>" . $display_task_data_row['visibility'] . "</span>
                                                </div>
                                            </a>

                                        ";
                                        }
                                    }
                                } else if ($echoCurDay == 'Thursday') {
                                    $sel_task_data_result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call3='Tea' AND thursday='$echoCurDay' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    while ($display_task_data_row = mysqli_fetch_array($sel_task_data_result)) {
                                        $get_certain_task_Id = $display_task_data_row['client_Id'];

                                        $check_task_data_result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE (client_Id='$get_certain_task_Id' AND care_call3='Tea' AND task_endDate >= '$today' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        while ($display_taskCheck_data_row = mysqli_fetch_array($check_task_data_result)) {
                                            $get_cehck_task_Id = $display_taskCheck_data_row['client_Id'];
                                            echo "
                                            <a class='text-gray-600 dark:text-gray-300' href='./task-report-form?client_task_Id=" . $display_task_data_row['client_task_Id'] . "' style='text-decoration:none;'>
                                                <hr>
                                                <div style='width: 100%; height:auto; padding:12px; color:" . $display_task_data_row['task_colours'] . ";'>
                                                    <span class='text-gray-600 dark:text-gray-300'>" . $display_task_data_row['client_taskName'] . "</span>
                                                    <span class='text-gray-600 dark:text-gray-300' style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                    <br>
                                                     <span style='font-size: 13px;'>" . $display_task_data_row['visibility'] . "</span>
                                                </div>
                                            </a>

                                        ";
                                        }
                                    }
                                } else if ($echoCurDay == 'Friday') {
                                    $sel_task_data_result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call3='Tea' AND friday='$echoCurDay' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    while ($display_task_data_row = mysqli_fetch_array($sel_task_data_result)) {
                                        $get_certain_task_Id = $display_task_data_row['client_Id'];

                                        $check_task_data_result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE (client_Id='$get_certain_task_Id' AND care_call3='Tea' AND task_endDate >= '$today' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        while ($display_taskCheck_data_row = mysqli_fetch_array($check_task_data_result)) {
                                            $get_cehck_task_Id = $display_taskCheck_data_row['client_Id'];
                                            echo "
                                        <a class='text-gray-600 dark:text-gray-300' href='./task-report-form?client_task_Id=" . $display_task_data_row['client_task_Id'] . "' style='text-decoration:none;'>
                                                <hr>
                                                <div style='width: 100%; height:auto; padding:12px; color:" . $display_task_data_row['task_colours'] . ";'>
                                                    <span class='text-gray-600 dark:text-gray-300'>" . $display_task_data_row['client_taskName'] . "</span>
                                                    <span class='text-gray-600 dark:text-gray-300' style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                    <br>
                                                     <span style='font-size: 13px;'>" . $display_task_data_row['visibility'] . "</span>
                                                </div>
                                            </a>

                                        ";
                                        }
                                    }
                                } else if ($echoCurDay == 'Saturday') {
                                    $sel_task_data_result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call3='Tea' AND saturday='$echoCurDay' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    while ($display_task_data_row = mysqli_fetch_array($sel_task_data_result)) {
                                        $get_certain_task_Id = $display_task_data_row['client_Id'];

                                        $check_task_data_result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE (client_Id='$get_certain_task_Id' AND care_call3='Tea' AND task_endDate >= '$today' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        while ($display_taskCheck_data_row = mysqli_fetch_array($check_task_data_result)) {
                                            $get_cehck_task_Id = $display_taskCheck_data_row['client_Id'];
                                            echo "
                                        <a class='text-gray-600 dark:text-gray-300' href='./task-report-form?client_task_Id=" . $display_task_data_row['client_task_Id'] . "' style='text-decoration:none;'>
                                                <hr>
                                                <div style='width: 100%; height:auto; padding:12px; color:" . $display_task_data_row['task_colours'] . ";'>
                                                    <span class='text-gray-600 dark:text-gray-300'>" . $display_task_data_row['client_taskName'] . "</span>
                                                    <span class='text-gray-600 dark:text-gray-300' style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                    <br>
                                                     <span style='font-size: 13px;'>" . $display_task_data_row['visibility'] . "</span>
                                                </div>
                                            </a>

                                        ";
                                        }
                                    }
                                } else if ($echoCurDay == 'Sunday') {
                                    $sel_task_data_result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call3='Tea' AND sunday='$echoCurDay' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    while ($display_task_data_row = mysqli_fetch_array($sel_task_data_result)) {
                                        $get_certain_task_Id = $display_task_data_row['client_Id'];

                                        $check_task_data_result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE (client_Id='$get_certain_task_Id' AND care_call3='Tea' AND task_endDate >= '$today' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        while ($display_taskCheck_data_row = mysqli_fetch_array($check_task_data_result)) {
                                            $get_cehck_task_Id = $display_taskCheck_data_row['client_Id'];
                                            echo "
                                        <a class='text-gray-600 dark:text-gray-300' href='./task-report-form?client_task_Id=" . $display_task_data_row['client_task_Id'] . "' style='text-decoration:none;'>
                                                <hr>
                                                <div style='width: 100%; height:auto; padding:12px; color:" . $display_task_data_row['task_colours'] . ";'>
                                                    <span class='text-gray-600 dark:text-gray-300'>" . $display_task_data_row['client_taskName'] . "</span>
                                                    <span class='text-gray-600 dark:text-gray-300' style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                    <br>
                                                     <span style='font-size: 13px;'>" . $display_task_data_row['visibility'] . "</span>
                                                </div>
                                            </a>

                                        ";
                                        }
                                    }
                                }           //-------------------Bed time start here---------------------
                            } else if ($clientCurCallCalls == 'Bed') {
                                if ($echoCurDay == 'Monday') {
                                    $sel_task_data_result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call4='Bed' AND monday='$echoCurDay' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    while ($display_task_data_row = mysqli_fetch_array($sel_task_data_result)) {
                                        $get_certain_task_Id = $display_task_data_row['client_Id'];

                                        $check_task_data_result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE (client_Id='$get_certain_task_Id' AND care_call4='Bed' AND task_endDate >= '$today' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        while ($display_taskCheck_data_row = mysqli_fetch_array($check_task_data_result)) {
                                            $get_cehck_task_Id = $display_taskCheck_data_row['client_Id'];
                                            echo "
                                        <a class='text-gray-600 dark:text-gray-300' href='./task-report-form?client_task_Id=" . $display_task_data_row['client_task_Id'] . "' style='text-decoration:none;'>
                                                <hr>
                                                <div style='width: 100%; height:auto; padding:12px; color:" . $display_task_data_row['task_colours'] . ";'>
                                                    <span class='text-gray-600 dark:text-gray-300'>" . $display_task_data_row['client_taskName'] . "</span>
                                                    <span class='text-gray-600 dark:text-gray-300' style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                    <br>
                                                     <span style='font-size: 13px;'>" . $display_task_data_row['visibility'] . "</span>
                                                </div>
                                            </a>

                                        ";
                                        }
                                    }
                                } else if ($echoCurDay == 'Tuesday') {
                                    $sel_task_data_result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call4='Bed' AND tuesday='$echoCurDay' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    while ($display_task_data_row = mysqli_fetch_array($sel_task_data_result)) {
                                        $get_certain_task_Id = $display_task_data_row['client_Id'];

                                        $check_task_data_result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE (client_Id='$get_certain_task_Id' AND care_call4='Bed' AND task_endDate >= '$today' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        while ($display_taskCheck_data_row = mysqli_fetch_array($check_task_data_result)) {
                                            $get_cehck_task_Id = $display_taskCheck_data_row['client_Id'];
                                            echo "
                                        <a class='text-gray-600 dark:text-gray-300' href='./task-report-form?client_task_Id=" . $display_task_data_row['client_task_Id'] . "' style='text-decoration:none;'>
                                                <hr>
                                                <div style='width: 100%; height:auto; padding:12px; color:" . $display_task_data_row['task_colours'] . ";'>
                                                    <span class='text-gray-600 dark:text-gray-300'>" . $display_task_data_row['client_taskName'] . "</span>
                                                    <span class='text-gray-600 dark:text-gray-300' style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                    <br>
                                                     <span style='font-size: 13px;'>" . $display_task_data_row['visibility'] . "</span>
                                                </div>
                                            </a>

                                        ";
                                        }
                                    }
                                } else if ($echoCurDay == 'Wednesday') {
                                    $sel_task_data_result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call4='Bed' AND wednesday='$echoCurDay' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    while ($display_task_data_row = mysqli_fetch_array($sel_task_data_result)) {
                                        $get_certain_task_Id = $display_task_data_row['client_Id'];

                                        $check_task_data_result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE (client_Id='$get_certain_task_Id' AND care_call4='Bed' AND task_endDate >= '$today' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        while ($display_taskCheck_data_row = mysqli_fetch_array($check_task_data_result)) {
                                            $get_cehck_task_Id = $display_taskCheck_data_row['client_Id'];
                                            echo "
                                            <a class='text-gray-600 dark:text-gray-300' href='./task-report-form?client_task_Id=" . $display_task_data_row['client_task_Id'] . "' style='text-decoration:none;'>
                                                <hr>
                                                <div style='width: 100%; height:auto; padding:12px; color:" . $display_task_data_row['task_colours'] . ";'>
                                                    <span class='text-gray-600 dark:text-gray-300'>" . $display_task_data_row['client_taskName'] . "</span>
                                                    <span class='text-gray-600 dark:text-gray-300' style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                    <br>
                                                     <span style='font-size: 13px;'>" . $display_task_data_row['visibility'] . "</span>
                                                </div>
                                            </a>

                                        ";
                                        }
                                    }
                                } else if ($echoCurDay == 'Thursday') {
                                    $sel_task_data_result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call4='Bed' AND thursday='$echoCurDay' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    while ($display_task_data_row = mysqli_fetch_array($sel_task_data_result)) {
                                        $get_certain_task_Id = $display_task_data_row['client_Id'];

                                        $check_task_data_result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE (client_Id='$get_certain_task_Id' AND care_call4='Bed' AND task_endDate >= '$today' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        while ($display_taskCheck_data_row = mysqli_fetch_array($check_task_data_result)) {
                                            $get_cehck_task_Id = $display_taskCheck_data_row['client_Id'];
                                            echo "
                                            <a href='./task-report-form?client_task_Id=" . $display_task_data_row['client_task_Id'] . "' style='text-decoration:none;'>
                                                <hr>
                                                <div style='width: 100%; height:auto; padding:12px; color:" . $display_task_data_row['task_colours'] . ";'>
                                                    <span class='text-gray-600 dark:text-gray-300'>" . $display_task_data_row['client_taskName'] . "</span>
                                                    <span class='text-gray-600 dark:text-gray-300' style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                    <br>
                                                     <span style='font-size: 13px;'>" . $display_task_data_row['visibility'] . "</span>
                                                </div>
                                            </a>

                                        ";
                                        }
                                    }
                                } else if ($echoCurDay == 'Friday') {
                                    $sel_task_data_result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call4='Bed' AND friday='$echoCurDay' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    while ($display_task_data_row = mysqli_fetch_array($sel_task_data_result)) {
                                        $get_certain_task_Id = $display_task_data_row['client_Id'];

                                        $check_task_data_result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE (client_Id='$get_certain_task_Id' AND care_call4='Bed' AND task_endDate >= '$today' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        while ($display_taskCheck_data_row = mysqli_fetch_array($check_task_data_result)) {
                                            $get_cehck_task_Id = $display_taskCheck_data_row['client_Id'];
                                            echo "
                                        <a class='text-gray-600 dark:text-gray-300' href='./task-report-form?client_task_Id=" . $display_task_data_row['client_task_Id'] . "' style='text-decoration:none;'>
                                                <hr>
                                                <div style='width: 100%; height:auto; padding:12px; color:" . $display_task_data_row['task_colours'] . ";'>
                                                    <span class='text-gray-600 dark:text-gray-300'>" . $display_task_data_row['client_taskName'] . "</span>
                                                    <span class='text-gray-600 dark:text-gray-300' style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                    <br>
                                                     <span style='font-size: 13px;'>" . $display_task_data_row['visibility'] . "</span>
                                                </div>
                                            </a>

                                        ";
                                        }
                                    }
                                } else if ($echoCurDay == 'Saturday') {
                                    $sel_task_data_result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call4='Bed' AND saturday='$echoCurDay' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    while ($display_task_data_row = mysqli_fetch_array($sel_task_data_result)) {
                                        $get_certain_task_Id = $display_task_data_row['client_Id'];

                                        $check_task_data_result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE (client_Id='$get_certain_task_Id' AND care_call4='Bed' AND task_endDate >= '$today' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        while ($display_taskCheck_data_row = mysqli_fetch_array($check_task_data_result)) {
                                            $get_cehck_task_Id = $display_taskCheck_data_row['client_Id'];
                                            echo "
                                            <a class='text-gray-600 dark:text-gray-300' href='./task-report-form?client_task_Id=" . $display_task_data_row['client_task_Id'] . "' style='text-decoration:none;'>
                                                <hr>
                                                <div style='width: 100%; height:auto; padding:12px; color:" . $display_task_data_row['task_colours'] . ";'>
                                                    <span class='text-gray-600 dark:text-gray-300'>" . $display_task_data_row['client_taskName'] . "</span>
                                                    <span class='text-gray-600 dark:text-gray-300' style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                    <br>
                                                     <span style='font-size: 13px;'>" . $display_task_data_row['visibility'] . "</span>
                                                </div>
                                            </a>

                                            ";
                                        }
                                    }
                                } else if ($echoCurDay == 'Sunday') {
                                    $sel_task_data_result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call4='Bed' AND sunday='$echoCurDay' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    while ($display_task_data_row = mysqli_fetch_array($sel_task_data_result)) {
                                        $get_certain_task_Id = $display_task_data_row['client_Id'];

                                        $check_task_data_result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE (client_Id='$get_certain_task_Id' AND care_call4='Bed' AND task_endDate >= '$today' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        while ($display_taskCheck_data_row = mysqli_fetch_array($check_task_data_result)) {
                                            $get_cehck_task_Id = $display_taskCheck_data_row['client_Id'];
                                            echo "
                                        <a class='text-gray-600 dark:text-gray-300' href='./task-report-form?client_task_Id=" . $display_task_data_row['client_task_Id'] . "' style='text-decoration:none;'>
                                                <hr>
                                                <div style='width: 100%; height:auto; padding:12px; color:" . $display_task_data_row['task_colours'] . ";'>
                                                    <span class='text-gray-600 dark:text-gray-300'>" . $display_task_data_row['client_taskName'] . "</span>
                                                    <span class='text-gray-600 dark:text-gray-300' style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                    <br>
                                                     <span style='font-size: 13px;'>" . $display_task_data_row['visibility'] . "</span>
                                                </div>
                                            </a>

                                        ";
                                        }
                                    }
                                }
                            } ?>


                            <br>

                            <form action="./processing-checking-task-completion" autocomplete="off" method="POST" enctype="multipart/form-data">
                                <input type="hidden" value="<?php echo $clientSpecialId; ?>" name="txtClientSpecialIds">
                                <input type="hidden" value="<?php echo $clientCurCallCalls; ?>" name="txtVariousCareCalls">

                                <button type="submit" name="btnCheckTaskandMedsCompletion" style="margin-bottom:8px;width:auto; height:50px; text-align:right; padding:15px; font-size:16px;" class="flex text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
                                    Continue
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


        <script>
            //// setTimeout(function() {
            //  window.location.reload();
            // }, 15000);
        </script>

        <?php include('footer-contents.php'); ?>