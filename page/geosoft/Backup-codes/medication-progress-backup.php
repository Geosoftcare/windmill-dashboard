<?php

include('header-contents.php');
if (isset($_GET['uryyToeSS4'])) {
    $uryyToeSS4 = $_GET['uryyToeSS4'];
}
$sel_task_data = mysqli_query($conn, "SELECT * FROM tbl_general_client_form WHERE uryyToeSS4='$uryyToeSS4' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ");
while ($display_client_data = mysqli_fetch_array($sel_task_data)) {
    $client_firstName = $display_client_data['client_first_name'];
    $client_lastName = $display_client_data['client_last_name'];
}
?>


<div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen}">
    <main class="h-full pb-16 overflow-y-auto">

        <div style="margin-top: -10px;" class="container px-2 mx-auto grid">
            <!--<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Medication
            </h2>-->

            <div style="margin-top: 20px;" class="grid gap-6 mb-8 md:grid-cols-2">
                <div class="min-w-0 p-2 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                    <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                        Care call <br><small><span></span><?php echo $client_firstName . ' ' . $client_lastName; ?> Medication(s)</small>
                    </h4>


                    <hr>

                    <div style="margin-top: -20px;" class="flex mb-4 font-semibold text-gray-600 dark:text-gray-300 items-center p-2 bg-white dark:bg-gray-800">
                        <div style='width:100%; height:auto;display:block;'>

                            <?php
                            $echomyTime = date("H");
                            $echoCurDay = date("l");


                            //-------------------Breakfast time start here---------------------
                            if ($echomyTime >= 00 and $echomyTime < 10.59) {
                                if ($echoCurDay == 'Monday') {
                                    $sel_client_med_result = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call1='Breakfast' AND monday='$echoCurDay' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    while ($get_client_med_row = mysqli_fetch_array($sel_client_med_result)) {
                                        $get_certain_med_Id = $get_client_med_row['med_Id'];

                                        $sel_client_med_checker = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (med_Id='$get_certain_med_Id' AND client_endMed >= '$today' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        while ($display_client_med_row = mysqli_fetch_array($sel_client_med_checker)) {
                                            $get_cehck_med_Id = $display_client_med_row['med_Id'];
                                            echo "
                                        <a href='./medication-report-form?client_med_Id=" . $get_client_med_row['client_med_Id'] . "' style='text-decoration:none;'>
                                            <hr>
                                            <div style='width: 100%; height:auto; padding:12px; color:" . $get_client_med_row['med_colours'] . ";'>
                                                <span class='text-gray-600 dark:text-gray-300'>" . $get_client_med_row['med_name'] . "
                                                <br>
                                                <span class='text-gray-600 dark:text-gray-300' style='size:12px;'><strong>--" . $get_client_med_row['med_package'] . "--</strong></span></span>
                                                <span class='text-gray-600 dark:text-gray-300' style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                <br>
                                                <span style='font-size: 13px;'>" . $get_client_med_row['visibility'] . "</span>
                                            </div>
                                        </a>

                                        ";
                                        }
                                    }
                                } else if ($echoCurDay == 'Tuesday') {
                                    $sel_client_med_result = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call1='Breakfast' AND tuesday='$echoCurDay' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    while ($get_client_med_row = mysqli_fetch_array($sel_client_med_result)) {
                                        $get_certain_med_Id = $get_client_med_row['med_Id'];

                                        $sel_client_med_checker = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (med_Id='$get_certain_med_Id' AND client_endMed >= '$today' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        while ($display_client_med_row = mysqli_fetch_array($sel_client_med_checker)) {
                                            $get_cehck_med_Id = $display_client_med_row['med_Id'];
                                            echo "
                                        <a href='./medication-report-form?client_med_Id=" . $get_client_med_row['client_med_Id'] . "' style='text-decoration:none;'>
                                            <hr>
                                            <div style='width: 100%; height:auto; padding:12px; color:" . $get_client_med_row['med_colours'] . ";'>
                                                <span class='text-gray-600 dark:text-gray-300'>" . $get_client_med_row['med_name'] . "
                                                <br>
                                                <span class='text-gray-600 dark:text-gray-300' style='size:12px;'><strong>--" . $get_client_med_row['med_package'] . "--</strong></span></span>
                                                <span class='text-gray-600 dark:text-gray-300' style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                <br>
                                                <span style='font-size: 13px;'>" . $get_client_med_row['visibility'] . "</span>
                                            </div>
                                        </a>

                                        ";
                                        }
                                    }
                                } else if ($echoCurDay == 'Wednesday') {
                                    $sel_client_med_result = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call1='Breakfast' AND wednesday='$echoCurDay' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    while ($get_client_med_row = mysqli_fetch_array($sel_client_med_result)) {
                                        $get_certain_med_Id = $get_client_med_row['med_Id'];

                                        $sel_client_med_checker = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (med_Id='$get_certain_med_Id' AND client_endMed >= '$today' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        while ($display_client_med_row = mysqli_fetch_array($sel_client_med_checker)) {
                                            $get_cehck_med_Id = $display_client_med_row['med_Id'];
                                            echo "
                                        <a href='./medication-report-form?client_med_Id=" . $get_client_med_row['client_med_Id'] . "' style='text-decoration:none;'>
                                            <hr>
                                            <div style='width: 100%; height:auto; padding:12px; color:" . $get_client_med_row['med_colours'] . ";'>
                                                <span class='text-gray-600 dark:text-gray-300'>" . $get_client_med_row['med_name'] . "
                                                <br>
                                                <span class='text-gray-600 dark:text-gray-300' style='size:12px;'><strong>--" . $get_client_med_row['med_package'] . "--</strong></span></span>
                                                <span class='text-gray-600 dark:text-gray-300' style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                <br>
                                                <span style='font-size: 13px;'>" . $get_client_med_row['visibility'] . "</span>
                                            </div>
                                        </a>

                                        ";
                                        }
                                    }
                                } else if ($echoCurDay == 'Thursday') {
                                    $sel_client_med_result = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call1='Breakfast' AND thursday='$echoCurDay' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    while ($get_client_med_row = mysqli_fetch_array($sel_client_med_result)) {
                                        $get_certain_med_Id = $get_client_med_row['med_Id'];

                                        $sel_client_med_checker = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (med_Id='$get_certain_med_Id' AND client_endMed >= '$today' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        while ($display_client_med_row = mysqli_fetch_array($sel_client_med_checker)) {
                                            $get_cehck_med_Id = $display_client_med_row['med_Id'];
                                            echo "
                                        <a href='./medication-report-form?client_med_Id=" . $get_client_med_row['client_med_Id'] . "' style='text-decoration:none;'>
                                            <hr>
                                            <div style='width: 100%; height:auto; padding:12px; color:" . $get_client_med_row['med_colours'] . ";'>
                                                <span class='text-gray-600 dark:text-gray-300'>" . $get_client_med_row['med_name'] . "
                                                <br>
                                                <span class='text-gray-600 dark:text-gray-300' style='size:12px;'><strong>--" . $get_client_med_row['med_package'] . "--</strong></span></span>
                                                <span class='text-gray-600 dark:text-gray-300' style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                <br>
                                                <span style='font-size: 13px;'>" . $get_client_med_row['visibility'] . "</span>
                                            </div>
                                        </a>

                                        ";
                                        }
                                    }
                                } else if ($echoCurDay == 'Friday') {
                                    $sel_client_med_result = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call1='Breakfast' AND friday='$echoCurDay' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    while ($get_client_med_row = mysqli_fetch_array($sel_client_med_result)) {
                                        $get_certain_med_Id = $get_client_med_row['med_Id'];

                                        $sel_client_med_checker = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (med_Id='$get_certain_med_Id' AND client_endMed >= '$today' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        while ($display_client_med_row = mysqli_fetch_array($sel_client_med_checker)) {
                                            $get_cehck_med_Id = $display_client_med_row['med_Id'];
                                            echo "
                                        <a href='./medication-report-form?client_med_Id=" . $get_client_med_row['client_med_Id'] . "' style='text-decoration:none;'>
                                            <hr>
                                            <div style='width: 100%; height:auto; padding:12px; color:" . $get_client_med_row['med_colours'] . ";'>
                                                <span class='text-gray-600 dark:text-gray-300'>" . $get_client_med_row['med_name'] . "
                                                <br>
                                                <span class='text-gray-600 dark:text-gray-300' style='size:12px;'><strong>--" . $get_client_med_row['med_package'] . "--</strong></span></span>
                                                <span class='text-gray-600 dark:text-gray-300' style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                <br>
                                                <span style='font-size: 13px;'>" . $get_client_med_row['visibility'] . "</span>
                                            </div>
                                        </a>

                                        ";
                                        }
                                    }
                                } else if ($echoCurDay == 'Saturday') {
                                    $sel_client_med_result = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call1='Breakfast' AND saturday='$echoCurDay' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    while ($get_client_med_row = mysqli_fetch_array($sel_client_med_result)) {
                                        $get_certain_med_Id = $get_client_med_row['med_Id'];

                                        $sel_client_med_checker = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (med_Id='$get_certain_med_Id' AND client_endMed >= '$today' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        while ($display_client_med_row = mysqli_fetch_array($sel_client_med_checker)) {
                                            $get_cehck_med_Id = $display_client_med_row['med_Id'];
                                            echo "
                                        <a href='./medication-report-form?client_med_Id=" . $get_client_med_row['client_med_Id'] . "' style='text-decoration:none;'>
                                            <hr>
                                            <div style='width: 100%; height:auto; padding:12px; color:" . $get_client_med_row['med_colours'] . ";'>
                                                <span class='text-gray-600 dark:text-gray-300'>" . $get_client_med_row['med_name'] . "
                                                <br>
                                                <span class='text-gray-600 dark:text-gray-300' style='size:12px;'><strong>--" . $get_client_med_row['med_package'] . "--</strong></span></span>
                                                <span class='text-gray-600 dark:text-gray-300' style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                <br>
                                                <span style='font-size: 13px;'>" . $get_client_med_row['visibility'] . "</span>
                                            </div>
                                        </a>

                                        ";
                                        }
                                    }
                                } else if ($echoCurDay == 'Sunday') {
                                    $sel_client_med_result = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call1='Breakfast' AND sunday='$echoCurDay' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    while ($get_client_med_row = mysqli_fetch_array($sel_client_med_result)) {
                                        $get_certain_med_Id = $get_client_med_row['med_Id'];

                                        $sel_client_med_checker = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (med_Id='$get_certain_med_Id' AND client_endMed >= '$today' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        while ($display_client_med_row = mysqli_fetch_array($sel_client_med_checker)) {
                                            $get_cehck_med_Id = $display_client_med_row['med_Id'];
                                            echo "
                                        <a href='./medication-report-form?client_med_Id=" . $get_client_med_row['client_med_Id'] . "' style='text-decoration:none;'>
                                            <hr>
                                            <div style='width: 100%; height:auto; padding:12px; color:" . $get_client_med_row['med_colours'] . ";'>
                                                <span class='text-gray-600 dark:text-gray-300'>" . $get_client_med_row['med_name'] . "
                                                <br>
                                                <span class='text-gray-600 dark:text-gray-300' style='size:12px;'><strong>--" . $get_client_med_row['med_package'] . "--</strong></span></span>
                                                <span class='text-gray-600 dark:text-gray-300' style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                <br>
                                                <span style='font-size: 13px;'>" . $get_client_med_row['visibility'] . "</span>
                                            </div>
                                        </a>

                                        ";
                                        }
                                    }
                                }    //-------------------Lunch time start here---------------------
                            } else if ($echomyTime >= 11 and $echomyTime < 14.59) {
                                if ($echoCurDay == 'Monday') {
                                    $sel_client_med_result = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call2='Lunch' AND monday='$echoCurDay' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    while ($get_client_med_row = mysqli_fetch_array($sel_client_med_result)) {
                                        $get_certain_med_Id = $get_client_med_row['med_Id'];

                                        $sel_client_med_checker = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (med_Id='$get_certain_med_Id' AND client_endMed >= '$today' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        while ($display_client_med_row = mysqli_fetch_array($sel_client_med_checker)) {
                                            $get_cehck_med_Id = $display_client_med_row['med_Id'];
                                            echo "
                                        <a href='./medication-report-form?client_med_Id=" . $get_client_med_row['client_med_Id'] . "' style='text-decoration:none;'>
                                            <hr>
                                            <div style='width: 100%; height:auto; padding:12px; color:" . $get_client_med_row['med_colours'] . ";'>
                                                <span class='text-gray-600 dark:text-gray-300'>" . $get_client_med_row['med_name'] . "
                                                <br>
                                                <span class='text-gray-600 dark:text-gray-300' style='size:12px;'><strong>--" . $get_client_med_row['med_package'] . "--</strong></span></span>
                                                <span class='text-gray-600 dark:text-gray-300' style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                <br>
                                                <span style='font-size: 13px;'>" . $get_client_med_row['visibility'] . "</span>
                                            </div>
                                        </a>

                                        ";
                                        }
                                    }
                                } else if ($echoCurDay == 'Tuesday') {
                                    $sel_client_med_result = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call2='Lunch' AND tuesday='$echoCurDay' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    while ($get_client_med_row = mysqli_fetch_array($sel_client_med_result)) {
                                        $get_certain_med_Id = $get_client_med_row['med_Id'];

                                        $sel_client_med_checker = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (med_Id='$get_certain_med_Id' AND client_endMed >= '$today' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        while ($display_client_med_row = mysqli_fetch_array($sel_client_med_checker)) {
                                            $get_cehck_med_Id = $display_client_med_row['med_Id'];
                                            echo "
                                       <a href='./medication-report-form?client_med_Id=" . $get_client_med_row['client_med_Id'] . "' style='text-decoration:none;'>
                                            <hr>
                                            <div style='width: 100%; height:auto; padding:12px; color:" . $get_client_med_row['med_colours'] . ";'>
                                                <span class='text-gray-600 dark:text-gray-300'>" . $get_client_med_row['med_name'] . "
                                                <br>
                                                <span class='text-gray-600 dark:text-gray-300' style='size:12px;'><strong>--" . $get_client_med_row['med_package'] . "--</strong></span></span>
                                                <span class='text-gray-600 dark:text-gray-300' style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                <br>
                                                <span style='font-size: 13px;'>" . $get_client_med_row['visibility'] . "</span>
                                            </div>
                                        </a>

                                        ";
                                        }
                                    }
                                } else if ($echoCurDay == 'Wednesday') {
                                    $sel_client_med_result = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call2='Lunch' AND wednesday='$echoCurDay' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    while ($get_client_med_row = mysqli_fetch_array($sel_client_med_result)) {
                                        $get_certain_med_Id = $get_client_med_row['med_Id'];

                                        $sel_client_med_checker = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (med_Id='$get_certain_med_Id' AND client_endMed >= '$today' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        while ($display_client_med_row = mysqli_fetch_array($sel_client_med_checker)) {
                                            $get_cehck_med_Id = $display_client_med_row['med_Id'];
                                            echo "
                                        <a href='./medication-report-form?client_med_Id=" . $get_client_med_row['client_med_Id'] . "' style='text-decoration:none;'>
                                            <hr>
                                            <div style='width: 100%; height:auto; padding:12px; color:" . $get_client_med_row['med_colours'] . ";'>
                                                <span class='text-gray-600 dark:text-gray-300'>" . $get_client_med_row['med_name'] . "
                                                <br>
                                                <span class='text-gray-600 dark:text-gray-300' style='size:12px;'><strong>--" . $get_client_med_row['med_package'] . "--</strong></span></span>
                                                <span class='text-gray-600 dark:text-gray-300' style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                <br>
                                                <span style='font-size: 13px;'>" . $get_client_med_row['visibility'] . "</span>
                                            </div>
                                        </a>

                                        ";
                                        }
                                    }
                                } else if ($echoCurDay == 'Thursday') {
                                    $sel_client_med_result = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call2='Lunch' AND thursday='$echoCurDay' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    while ($get_client_med_row = mysqli_fetch_array($sel_client_med_result)) {
                                        $get_certain_med_Id = $get_client_med_row['med_Id'];

                                        $sel_client_med_checker = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (med_Id='$get_certain_med_Id' AND client_endMed >= '$today' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        while ($display_client_med_row = mysqli_fetch_array($sel_client_med_checker)) {
                                            $get_cehck_med_Id = $display_client_med_row['med_Id'];
                                            echo "
                                        <a href='./medication-report-form?client_med_Id=" . $get_client_med_row['client_med_Id'] . "' style='text-decoration:none;'>
                                            <hr>
                                            <div style='width: 100%; height:auto; padding:12px; color:" . $get_client_med_row['med_colours'] . ";'>
                                                <span class='text-gray-600 dark:text-gray-300'>" . $get_client_med_row['med_name'] . "
                                                <br>
                                                <span class='text-gray-600 dark:text-gray-300' style='size:12px;'><strong>--" . $get_client_med_row['med_package'] . "--</strong></span></span>
                                                <span class='text-gray-600 dark:text-gray-300' style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                <br>
                                                <span style='font-size: 13px;'>" . $get_client_med_row['visibility'] . "</span>
                                            </div>
                                        </a>

                                        ";
                                        }
                                    }
                                } else if ($echoCurDay == 'Friday') {
                                    $sel_client_med_result = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call2='Lunch' AND friday='$echoCurDay' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    while ($get_client_med_row = mysqli_fetch_array($sel_client_med_result)) {
                                        $get_certain_med_Id = $get_client_med_row['med_Id'];

                                        $sel_client_med_checker = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (med_Id='$get_certain_med_Id' AND client_endMed >= '$today' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        while ($display_client_med_row = mysqli_fetch_array($sel_client_med_checker)) {
                                            $get_cehck_med_Id = $display_client_med_row['med_Id'];
                                            echo "
                                        <a href='./medication-report-form?client_med_Id=" . $get_client_med_row['client_med_Id'] . "' style='text-decoration:none;'>
                                            <hr>
                                            <div style='width: 100%; height:auto; padding:12px; color:" . $get_client_med_row['med_colours'] . ";'>
                                                <span class='text-gray-600 dark:text-gray-300'>" . $get_client_med_row['med_name'] . "
                                                <br>
                                                <span class='text-gray-600 dark:text-gray-300' style='size:12px;'><strong>--" . $get_client_med_row['med_package'] . "--</strong></span></span>
                                                <span class='text-gray-600 dark:text-gray-300' style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                <br>
                                                <span style='font-size: 13px;'>" . $get_client_med_row['visibility'] . "</span>
                                            </div>
                                        </a>

                                        ";
                                        }
                                    }
                                } else if ($echoCurDay == 'Saturday') {
                                    $sel_client_med_result = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call2='Lunch' AND saturday='$echoCurDay' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    while ($get_client_med_row = mysqli_fetch_array($sel_client_med_result)) {
                                        $get_certain_med_Id = $get_client_med_row['med_Id'];

                                        $sel_client_med_checker = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (med_Id='$get_certain_med_Id' AND client_endMed >= '$today' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        while ($display_client_med_row = mysqli_fetch_array($sel_client_med_checker)) {
                                            $get_cehck_med_Id = $display_client_med_row['med_Id'];
                                            echo "
                                       <a href='./medication-report-form?client_med_Id=" . $get_client_med_row['client_med_Id'] . "' style='text-decoration:none;'>
                                            <hr>
                                            <div style='width: 100%; height:auto; padding:12px; color:" . $get_client_med_row['med_colours'] . ";'>
                                                <span class='text-gray-600 dark:text-gray-300'>" . $get_client_med_row['med_name'] . "
                                                <br>
                                                <span class='text-gray-600 dark:text-gray-300' style='size:12px;'><strong>--" . $get_client_med_row['med_package'] . "--</strong></span></span>
                                                <span class='text-gray-600 dark:text-gray-300' style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                <br>
                                                <span style='font-size: 13px;'>" . $get_client_med_row['visibility'] . "</span>
                                            </div>
                                        </a>

                                        ";
                                        }
                                    }
                                } else if ($echoCurDay == 'Sunday') {
                                    $sel_client_med_result = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call2='Lunch' AND sunday='$echoCurDay' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    while ($get_client_med_row = mysqli_fetch_array($sel_client_med_result)) {
                                        $get_certain_med_Id = $get_client_med_row['med_Id'];

                                        $sel_client_med_checker = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (med_Id='$get_certain_med_Id' AND client_endMed >= '$today' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        while ($display_client_med_row = mysqli_fetch_array($sel_client_med_checker)) {
                                            $get_cehck_med_Id = $display_client_med_row['med_Id'];
                                            echo "
                                        <a href='./medication-report-form?client_med_Id=" . $get_client_med_row['client_med_Id'] . "' style='text-decoration:none;'>
                                            <hr>
                                            <div style='width: 100%; height:auto; padding:12px; color:" . $get_client_med_row['med_colours'] . ";'>
                                                <span class='text-gray-600 dark:text-gray-300'>" . $get_client_med_row['med_name'] . "
                                                <br>
                                                <span class='text-gray-600 dark:text-gray-300' style='size:12px;'><strong>--" . $get_client_med_row['med_package'] . "--</strong></span></span>
                                                <span class='text-gray-600 dark:text-gray-300' style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                <br>
                                                <span style='font-size: 13px;'>" . $get_client_med_row['visibility'] . "</span>
                                            </div>
                                        </a>

                                        ";
                                        }
                                    }
                                }    //-------------------Tea time start here---------------------
                            } else if ($echomyTime >= 15 and $echomyTime < 17.59) {
                                if ($echoCurDay == 'Monday') {
                                    $sel_client_med_result = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call3='Tea' AND monday='$echoCurDay' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    while ($get_client_med_row = mysqli_fetch_array($sel_client_med_result)) {
                                        $get_certain_med_Id = $get_client_med_row['med_Id'];

                                        $sel_client_med_checker = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (med_Id='$get_certain_med_Id' AND client_endMed >= '$today' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        while ($display_client_med_row = mysqli_fetch_array($sel_client_med_checker)) {
                                            $get_cehck_med_Id = $display_client_med_row['med_Id'];
                                            echo "
                                        <a href='./medication-report-form?client_med_Id=" . $get_client_med_row['client_med_Id'] . "' style='text-decoration:none;'>
                                            <hr>
                                            <div style='width: 100%; height:auto; padding:12px; color:" . $get_client_med_row['med_colours'] . ";'>
                                                <span class='text-gray-600 dark:text-gray-300'>" . $get_client_med_row['med_name'] . "
                                                <br>
                                                <span class='text-gray-600 dark:text-gray-300' style='size:12px;'><strong>--" . $get_client_med_row['med_package'] . "--</strong></span></span>
                                                <span class='text-gray-600 dark:text-gray-300' style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                <br>
                                                <span style='font-size: 13px;'>" . $get_client_med_row['visibility'] . "</span>
                                            </div>
                                        </a>

                                        ";
                                        }
                                    }
                                } else if ($echoCurDay == 'Tuesday') {
                                    $sel_client_med_result = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call3='Tea' AND tuesday='$echoCurDay' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    while ($get_client_med_row = mysqli_fetch_array($sel_client_med_result)) {
                                        $get_certain_med_Id = $get_client_med_row['med_Id'];

                                        $sel_client_med_checker = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (med_Id='$get_certain_med_Id' AND client_endMed >= '$today' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        while ($display_client_med_row = mysqli_fetch_array($sel_client_med_checker)) {
                                            $get_cehck_med_Id = $display_client_med_row['med_Id'];
                                            echo "
                                       <a href='./medication-report-form?client_med_Id=" . $get_client_med_row['client_med_Id'] . "' style='text-decoration:none;'>
                                            <hr>
                                            <div style='width: 100%; height:auto; padding:12px; color:" . $get_client_med_row['med_colours'] . ";'>
                                                <span class='text-gray-600 dark:text-gray-300'>" . $get_client_med_row['med_name'] . "
                                                <br>
                                                <span class='text-gray-600 dark:text-gray-300' style='size:12px;'><strong>--" . $get_client_med_row['med_package'] . "--</strong></span></span>
                                                <span class='text-gray-600 dark:text-gray-300' style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                <br>
                                                <span style='font-size: 13px;'>" . $get_client_med_row['visibility'] . "</span>
                                            </div>
                                        </a>

                                        ";
                                        }
                                    }
                                } else if ($echoCurDay == 'Wednesday') {
                                    $sel_client_med_result = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call3='Tea' AND wednesday='$echoCurDay' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    while ($get_client_med_row = mysqli_fetch_array($sel_client_med_result)) {
                                        $get_certain_med_Id = $get_client_med_row['med_Id'];

                                        $sel_client_med_checker = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (med_Id='$get_certain_med_Id' AND client_endMed >= '$today' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        while ($display_client_med_row = mysqli_fetch_array($sel_client_med_checker)) {
                                            $get_cehck_med_Id = $display_client_med_row['med_Id'];
                                            echo "
                                        <a href='./medication-report-form?client_med_Id=" . $get_client_med_row['client_med_Id'] . "' style='text-decoration:none;'>
                                            <hr>
                                            <div style='width: 100%; height:auto; padding:12px; color:" . $get_client_med_row['med_colours'] . ";'>
                                                <span class='text-gray-600 dark:text-gray-300'>" . $get_client_med_row['med_name'] . "
                                                <br>
                                                <span class='text-gray-600 dark:text-gray-300' style='size:12px;'><strong>--" . $get_client_med_row['med_package'] . "--</strong></span></span>
                                                <span class='text-gray-600 dark:text-gray-300' style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                <br>
                                                <span style='font-size: 13px;'>" . $get_client_med_row['visibility'] . "</span>
                                            </div>
                                        </a>

                                        ";
                                        }
                                    }
                                } else if ($echoCurDay == 'Thursday') {
                                    $sel_client_med_result = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call3='Tea' AND thursday='$echoCurDay' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    while ($get_client_med_row = mysqli_fetch_array($sel_client_med_result)) {
                                        $get_certain_med_Id = $get_client_med_row['med_Id'];

                                        $sel_client_med_checker = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (med_Id='$get_certain_med_Id' AND client_endMed >= '$today' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        while ($display_client_med_row = mysqli_fetch_array($sel_client_med_checker)) {
                                            $get_cehck_med_Id = $display_client_med_row['med_Id'];
                                            echo "
                                        <a href='./medication-report-form?client_med_Id=" . $get_client_med_row['client_med_Id'] . "' style='text-decoration:none;'>
                                            <hr>
                                            <div style='width: 100%; height:auto; padding:12px; color:" . $get_client_med_row['med_colours'] . ";'>
                                                <span class='text-gray-600 dark:text-gray-300'>" . $get_client_med_row['med_name'] . "
                                                <br>
                                                <span class='text-gray-600 dark:text-gray-300' style='size:12px;'><strong>--" . $get_client_med_row['med_package'] . "--</strong></span></span>
                                                <span class='text-gray-600 dark:text-gray-300' style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                <br>
                                                <span style='font-size: 13px;'>" . $get_client_med_row['visibility'] . "</span>
                                            </div>
                                        </a>

                                        ";
                                        }
                                    }
                                } else if ($echoCurDay == 'Friday') {
                                    $sel_client_med_result = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call3='Tea' AND friday='$echoCurDay' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    while ($get_client_med_row = mysqli_fetch_array($sel_client_med_result)) {
                                        $get_certain_med_Id = $get_client_med_row['med_Id'];

                                        $sel_client_med_checker = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (med_Id='$get_certain_med_Id' AND client_endMed >= '$today' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        while ($display_client_med_row = mysqli_fetch_array($sel_client_med_checker)) {
                                            $get_cehck_med_Id = $display_client_med_row['med_Id'];
                                            echo "
                                       <a href='./medication-report-form?client_med_Id=" . $get_client_med_row['client_med_Id'] . "' style='text-decoration:none;'>
                                            <hr>
                                            <div style='width: 100%; height:auto; padding:12px; color:" . $get_client_med_row['med_colours'] . ";'>
                                                <span class='text-gray-600 dark:text-gray-300'>" . $get_client_med_row['med_name'] . "
                                                <br>
                                                <span class='text-gray-600 dark:text-gray-300' style='size:12px;'><strong>--" . $get_client_med_row['med_package'] . "--</strong></span></span>
                                                <span class='text-gray-600 dark:text-gray-300' style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                <br>
                                                <span style='font-size: 13px;'>" . $get_client_med_row['visibility'] . "</span>
                                            </div>
                                        </a>

                                        ";
                                        }
                                    }
                                } else if ($echoCurDay == 'Saturday') {
                                    $sel_client_med_result = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call3='Tea' AND saturday='$echoCurDay' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    while ($get_client_med_row = mysqli_fetch_array($sel_client_med_result)) {
                                        $get_certain_med_Id = $get_client_med_row['med_Id'];

                                        $sel_client_med_checker = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (med_Id='$get_certain_med_Id' AND client_endMed >= '$today' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        while ($display_client_med_row = mysqli_fetch_array($sel_client_med_checker)) {
                                            $get_cehck_med_Id = $display_client_med_row['med_Id'];
                                            echo "
                                       <a href='./medication-report-form?client_med_Id=" . $get_client_med_row['client_med_Id'] . "' style='text-decoration:none;'>
                                            <hr>
                                            <div style='width: 100%; height:auto; padding:12px; color:" . $get_client_med_row['med_colours'] . ";'>
                                                <span class='text-gray-600 dark:text-gray-300'>" . $get_client_med_row['med_name'] . "
                                                <br>
                                                <span class='text-gray-600 dark:text-gray-300' style='size:12px;'><strong>--" . $get_client_med_row['med_package'] . "--</strong></span></span>
                                                <span class='text-gray-600 dark:text-gray-300' style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                <br>
                                                <span style='font-size: 13px;'>" . $get_client_med_row['visibility'] . "</span>
                                            </div>
                                        </a>

                                        ";
                                        }
                                    }
                                } else if ($echoCurDay == 'Sunday') {
                                    $sel_client_med_result = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call3='Tea' AND sunday='$echoCurDay' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    while ($get_client_med_row = mysqli_fetch_array($sel_client_med_result)) {
                                        $get_certain_med_Id = $get_client_med_row['med_Id'];

                                        $sel_client_med_checker = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (med_Id='$get_certain_med_Id' AND client_endMed >= '$today' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        while ($display_client_med_row = mysqli_fetch_array($sel_client_med_checker)) {
                                            $get_cehck_med_Id = $display_client_med_row['med_Id'];
                                            echo "
                                        <a href='./medication-report-form?client_med_Id=" . $get_client_med_row['client_med_Id'] . "' style='text-decoration:none;'>
                                            <hr>
                                            <div style='width: 100%; height:auto; padding:12px; color:" . $get_client_med_row['med_colours'] . ";'>
                                                <span class='text-gray-600 dark:text-gray-300'>" . $get_client_med_row['med_name'] . "
                                                <br>
                                                <span class='text-gray-600 dark:text-gray-300' style='size:12px;'><strong>--" . $get_client_med_row['med_package'] . "--</strong></span></span>
                                                <span class='text-gray-600 dark:text-gray-300' style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                <br>
                                                <span style='font-size: 13px;'>" . $get_client_med_row['visibility'] . "</span>
                                            </div>
                                        </a>

                                        ";
                                        }
                                    }
                                }      //-------------------Bed time start here---------------------
                            } else if ($echomyTime >= 18 and $echomyTime < 23.59) {
                                if ($echoCurDay == 'Monday') {
                                    $sel_client_med_result = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call4='Bed' AND monday='$echoCurDay' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    while ($get_client_med_row = mysqli_fetch_array($sel_client_med_result)) {
                                        $get_certain_med_Id = $get_client_med_row['med_Id'];

                                        $sel_client_med_checker = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (med_Id='$get_certain_med_Id' AND client_endMed >= '$today' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        while ($display_client_med_row = mysqli_fetch_array($sel_client_med_checker)) {
                                            $get_cehck_med_Id = $display_client_med_row['med_Id'];
                                            echo "
                                        <a href='./medication-report-form?client_med_Id=" . $get_client_med_row['client_med_Id'] . "' style='text-decoration:none;'>
                                            <hr>
                                            <div style='width: 100%; height:auto; padding:12px; color:" . $get_client_med_row['med_colours'] . ";'>
                                                <span class='text-gray-600 dark:text-gray-300'>" . $get_client_med_row['med_name'] . "
                                                <br>
                                                <span class='text-gray-600 dark:text-gray-300' style='size:12px;'><strong>--" . $get_client_med_row['med_package'] . "--</strong></span></span>
                                                <span class='text-gray-600 dark:text-gray-300' style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                <br>
                                                <span style='font-size: 13px;'>" . $get_client_med_row['visibility'] . "</span>
                                            </div>
                                        </a>

                                        ";
                                        }
                                    }
                                } else if ($echoCurDay == 'Tuesday') {
                                    $sel_client_med_result = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call4='Bed' AND tuesday='$echoCurDay' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    while ($get_client_med_row = mysqli_fetch_array($sel_client_med_result)) {
                                        $get_certain_med_Id = $get_client_med_row['med_Id'];

                                        $sel_client_med_checker = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (med_Id='$get_certain_med_Id' AND client_endMed >= '$today' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        while ($display_client_med_row = mysqli_fetch_array($sel_client_med_checker)) {
                                            $get_cehck_med_Id = $display_client_med_row['med_Id'];
                                            echo "
                                       <a href='./medication-report-form?client_med_Id=" . $get_client_med_row['client_med_Id'] . "' style='text-decoration:none;'>
                                            <hr>
                                            <div style='width: 100%; height:auto; padding:12px; color:" . $get_client_med_row['med_colours'] . ";'>
                                                <span class='text-gray-600 dark:text-gray-300'>" . $get_client_med_row['med_name'] . "
                                                <br>
                                                <span class='text-gray-600 dark:text-gray-300' style='size:12px;'><strong>--" . $get_client_med_row['med_package'] . "--</strong></span></span>
                                                <span class='text-gray-600 dark:text-gray-300' style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                <br>
                                                <span style='font-size: 13px;'>" . $get_client_med_row['visibility'] . "</span>
                                            </div>
                                        </a>

                                        ";
                                        }
                                    }
                                } else if ($echoCurDay == 'Wednesday') {
                                    $sel_client_med_result = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call4='Bed' AND wednesday='$echoCurDay' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    while ($get_client_med_row = mysqli_fetch_array($sel_client_med_result)) {
                                        $get_certain_med_Id = $get_client_med_row['med_Id'];

                                        $sel_client_med_checker = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (med_Id='$get_certain_med_Id' AND client_endMed >= '$today' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        while ($display_client_med_row = mysqli_fetch_array($sel_client_med_checker)) {
                                            $get_cehck_med_Id = $display_client_med_row['med_Id'];
                                            echo "
                                        <a href='./medication-report-form?client_med_Id=" . $get_client_med_row['client_med_Id'] . "' style='text-decoration:none;'>
                                            <hr>
                                            <div style='width: 100%; height:auto; padding:12px; color:" . $get_client_med_row['med_colours'] . ";'>
                                                <span class='text-gray-600 dark:text-gray-300'>" . $get_client_med_row['med_name'] . "
                                                <br>
                                                <span class='text-gray-600 dark:text-gray-300' style='size:12px;'><strong>--" . $get_client_med_row['med_package'] . "--</strong></span></span>
                                                <span class='text-gray-600 dark:text-gray-300' style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                <br>
                                                <span style='font-size: 13px;'>" . $get_client_med_row['visibility'] . "</span>
                                            </div>
                                        </a>

                                        ";
                                        }
                                    }
                                } else if ($echoCurDay == 'Thursday') {
                                    $sel_client_med_result = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call4='Bed' AND thursday='$echoCurDay' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    while ($get_client_med_row = mysqli_fetch_array($sel_client_med_result)) {
                                        $get_certain_med_Id = $get_client_med_row['med_Id'];

                                        $sel_client_med_checker = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (med_Id='$get_certain_med_Id' AND client_endMed >= '$today' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        while ($display_client_med_row = mysqli_fetch_array($sel_client_med_checker)) {
                                            $get_cehck_med_Id = $display_client_med_row['med_Id'];
                                            echo "
                                       <a href='./medication-report-form?client_med_Id=" . $get_client_med_row['client_med_Id'] . "' style='text-decoration:none;'>
                                            <hr>
                                            <div style='width: 100%; height:auto; padding:12px; color:" . $get_client_med_row['med_colours'] . ";'>
                                                <span class='text-gray-600 dark:text-gray-300'>" . $get_client_med_row['med_name'] . "
                                                <br>
                                                <span class='text-gray-600 dark:text-gray-300' style='size:12px;'><strong>--" . $get_client_med_row['med_package'] . "--</strong></span></span>
                                                <span class='text-gray-600 dark:text-gray-300' style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                <br>
                                                <span style='font-size: 13px;'>" . $get_client_med_row['visibility'] . "</span>
                                            </div>
                                        </a>

                                        ";
                                        }
                                    }
                                } else if ($echoCurDay == 'Friday') {
                                    $sel_client_med_result = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call4='Bed' AND friday='$echoCurDay' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    while ($get_client_med_row = mysqli_fetch_array($sel_client_med_result)) {
                                        $get_certain_med_Id = $get_client_med_row['med_Id'];

                                        $sel_client_med_checker = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (med_Id='$get_certain_med_Id' AND client_endMed >= '$today' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        while ($display_client_med_row = mysqli_fetch_array($sel_client_med_checker)) {
                                            $get_cehck_med_Id = $display_client_med_row['med_Id'];
                                            echo "
                                        <a href='./medication-report-form?client_med_Id=" . $get_client_med_row['client_med_Id'] . "' style='text-decoration:none;'>
                                            <hr>
                                            <div style='width: 100%; height:auto; padding:12px; color:" . $get_client_med_row['med_colours'] . ";'>
                                                <span class='text-gray-600 dark:text-gray-300'>" . $get_client_med_row['med_name'] . "
                                                <br>
                                                <span class='text-gray-600 dark:text-gray-300' style='size:12px;'><strong>--" . $get_client_med_row['med_package'] . "--</strong></span></span>
                                                <span class='text-gray-600 dark:text-gray-300' style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                <br>
                                                <span style='font-size: 13px;'>" . $get_client_med_row['visibility'] . "</span>
                                            </div>
                                        </a>

                                        ";
                                        }
                                    }
                                } else if ($echoCurDay == 'Saturday') {
                                    $sel_client_med_result = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call4='Bed' AND saturday='$echoCurDay' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    while ($get_client_med_row = mysqli_fetch_array($sel_client_med_result)) {
                                        $get_certain_med_Id = $get_client_med_row['med_Id'];

                                        $sel_client_med_checker = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (med_Id='$get_certain_med_Id' AND client_endMed >= '$today' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        while ($display_client_med_row = mysqli_fetch_array($sel_client_med_checker)) {
                                            $get_cehck_med_Id = $display_client_med_row['med_Id'];
                                            echo "
                                        <a href='./medication-report-form?client_med_Id=" . $get_client_med_row['client_med_Id'] . "' style='text-decoration:none;'>
                                            <hr>
                                            <div style='width: 100%; height:auto; padding:12px; color:" . $get_client_med_row['med_colours'] . ";'>
                                                <span class='text-gray-600 dark:text-gray-300'>" . $get_client_med_row['med_name'] . "
                                                <br>
                                                <span class='text-gray-600 dark:text-gray-300' style='size:12px;'><strong>--" . $get_client_med_row['med_package'] . "--</strong></span></span>
                                                <span class='text-gray-600 dark:text-gray-300' style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                <br>
                                                <span style='font-size: 13px;'>" . $get_client_med_row['visibility'] . "</span>
                                            </div>
                                        </a>

                                        ";
                                        }
                                    }
                                } else if ($echoCurDay == 'Sunday') {
                                    $sel_client_med_result = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call4='Bed' AND sunday='$echoCurDay' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                    while ($get_client_med_row = mysqli_fetch_array($sel_client_med_result)) {
                                        $get_certain_med_Id = $get_client_med_row['med_Id'];

                                        $sel_client_med_checker = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (med_Id='$get_certain_med_Id' AND client_endMed >= '$today' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                        while ($display_client_med_row = mysqli_fetch_array($sel_client_med_checker)) {
                                            $get_cehck_med_Id = $display_client_med_row['med_Id'];
                                            echo "
                                        <a href='./medication-report-form?client_med_Id=" . $get_client_med_row['client_med_Id'] . "' style='text-decoration:none;'>
                                            <hr>
                                            <div style='width: 100%; height:auto; padding:12px; color:" . $get_client_med_row['med_colours'] . ";'>
                                                <span class='text-gray-600 dark:text-gray-300'>" . $get_client_med_row['med_name'] . "
                                                <br>
                                                <span class='text-gray-600 dark:text-gray-300' style='size:12px;'><strong>--" . $get_client_med_row['med_package'] . "--</strong></span></span>
                                                <span class='text-gray-600 dark:text-gray-300' style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                <br>
                                                <span style='font-size: 13px;'>" . $get_client_med_row['visibility'] . "</span>
                                            </div>
                                        </a>

                                        ";
                                        }
                                    }
                                }
                            } ?>


                            <br>

                            <a href="./processing-client-meds-status-check?uryyToeSS4=<?php echo $uryyToeSS4; ?>" style="text-decoration:none;">
                                <button type="submit" style="margin-bottom:8px;width:auto; height:50px; text-align:right; padding:15px; font-size:16px;" class="flex text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
                                    Continue
                                </button>
                            </a>

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