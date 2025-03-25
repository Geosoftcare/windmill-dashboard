<?php include('header-contents.php'); ?>


<div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen}">
    <main class="h-full pb-16 overflow-y-auto">

        <div style="margin-top: -10px;" class="container px-2 mx-auto grid">
            <!--<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Task
            </h2>-->

            <div style="margin-top: 30px;" class="grid gap-6 mb-8 md:grid-cols-2">
                <div class="min-w-0 p-2 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                    <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                        Daily task
                    </h4>

                    <hr>

                    <div style="margin-top: -20px;" class="flex mb-4 font-semibold text-gray-600 dark:text-gray-300 items-center p-2 bg-white dark:bg-gray-800">
                        <div style='width:100%; height:auto;display:block;'>

                            <?php

                            if (isset($_GET['uryyToeSS4'])) {
                                $uryyToeSS4 = $_GET['uryyToeSS4'];

                                $echomyTime = (int)date("H:I");
                                $echoCurDay = date("l");

                                //-------------------Breakfast time start here---------------------
                                if ($echomyTime > 06 and $echomyTime < 11) {
                                    if ($echoCurDay == 'Monday') {
                                        $result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE uryyToeSS4='$uryyToeSS4' AND care_call1='Breakfast' AND monday='$echoCurDay' ");
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "
                                        <a href='./task-report-form?client_task_Id=" . $row['client_task_Id'] . "' style='text-decoration:none;'>
                                            <hr>
                                            <div style='width: 100%; height:auto; padding:12px; background-color:" . $row['task_colours'] . ";'>
                                                <span>" . $row['client_taskName'] . "</span>
                                                <span style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                <br>
                                                <span style='font-size: 13px;'>" . $row['visibility'] . "</span>
                                            </div>
                                        </a>

                                        ";
                                        }
                                    } else if ($echoCurDay == 'Tuesday') {
                                        $result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE uryyToeSS4='$uryyToeSS4' AND care_call1='Breakfast' AND tuesday='$echoCurDay' ");
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "
                                        <a href='./task-report-form?client_task_Id=" . $row['client_task_Id'] . "' style='text-decoration:none;'>
                                            <hr>
                                            <div style='width: 100%; height:auto; padding:12px; background-color:" . $row['task_colours'] . ";'>
                                                <span>" . $row['client_taskName'] . "</span>
                                                <span style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                <br>
                                                <span style='font-size: 13px;'>" . $row['visibility'] . "</span>
                                            </div>
                                        </a>

                                        ";
                                        }
                                    } else if ($echoCurDay == 'Wednesday') {
                                        $result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE uryyToeSS4='$uryyToeSS4' AND care_call1='Breakfast' AND wednesday='$echoCurDay' ");
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "
                                        <a href='./task-report-form?client_task_Id=" . $row['client_task_Id'] . "' style='text-decoration:none;'>
                                            <hr>
                                            <div style='width: 100%; height:auto; padding:12px; background-color:" . $row['task_colours'] . ";'>
                                                <span>" . $row['client_taskName'] . "</span>
                                                <span style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                <br>
                                                <span style='font-size: 13px;'>" . $row['visibility'] . "</span>
                                            </div>
                                        </a>

                                        ";
                                        }
                                    } else if ($echoCurDay == 'Thursday') {
                                        $result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE uryyToeSS4='$uryyToeSS4' AND care_call1='Breakfast' AND thursday='$echoCurDay' ");
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "
                                        <a href='./task-report-form?client_task_Id=" . $row['client_task_Id'] . "' style='text-decoration:none;'>
                                            <hr>
                                            <div style='width: 100%; height:auto; padding:12px; background-color:" . $row['task_colours'] . ";'>
                                                <span>" . $row['client_taskName'] . "</span>
                                                <span style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                <br>
                                                <span style='font-size: 13px;'>" . $row['visibility'] . "</span>
                                            </div>
                                        </a>

                                        ";
                                        }
                                    } else if ($echoCurDay == 'Friday') {
                                        $result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE uryyToeSS4='$uryyToeSS4' AND care_call1='Breakfast' AND friday='$echoCurDay' ");
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "
                                        <a href='./task-report-form?client_task_Id=" . $row['client_task_Id'] . "' style='text-decoration:none;'>
                                            <hr>
                                            <div style='width: 100%; height:auto; padding:12px; background-color:" . $row['task_colours'] . ";'>
                                                <span>" . $row['client_taskName'] . "</span>
                                                <span style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                <br>
                                                <span style='font-size: 13px;'>" . $row['visibility'] . "</span>
                                            </div>
                                        </a>

                                        ";
                                        }
                                    } else if ($echoCurDay == 'Saturday') {
                                        $result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE uryyToeSS4='$uryyToeSS4' AND care_call1='Breakfast' AND saturday='$echoCurDay' ");
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "
                                        <a href='./task-report-form?client_task_Id=" . $row['client_task_Id'] . "' style='text-decoration:none;'>
                                            <hr>
                                            <div style='width: 100%; height:auto; padding:12px; background-color:" . $row['task_colours'] . ";'>
                                                <span>" . $row['client_taskName'] . "</span>
                                                <span style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                <br>
                                                <span style='font-size: 13px;'>" . $row['visibility'] . "</span>
                                            </div>
                                        </a>

                                        ";
                                        }
                                    } else if ($echoCurDay == 'Sunday') {
                                        $result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE uryyToeSS4='$uryyToeSS4' AND care_call1='Breakfast' AND sunday='$echoCurDay' ");
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "
                                        <a href='./task-report-form?client_task_Id=" . $row['client_task_Id'] . "' style='text-decoration:none;'>
                                            <hr>
                                            <div style='width: 100%; height:auto; padding:12px; background-color:" . $row['task_colours'] . ";'>
                                                <span>" . $row['client_taskName'] . "</span>
                                                <span style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                <br>
                                                <span style='font-size: 13px;'>" . $row['visibility'] . "</span>
                                            </div>
                                        </a>

                                        ";
                                        }
                                    }   //-------------------Lunch time start here---------------------
                                } else if ($echomyTime > 11 and $echomyTime < 14) {
                                    if ($echoCurDay == 'Monday') {
                                        $result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE uryyToeSS4='$uryyToeSS4' AND care_call2='Lunch' AND monday='$echoCurDay' ");
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "
                                        <a href='./task-report-form?client_task_Id=" . $row['client_task_Id'] . "' style='text-decoration:none;'>
                                            <hr>
                                            <div style='width: 100%; height:auto; padding:12px; background-color:" . $row['task_colours'] . ";'>
                                                <span>" . $row['client_taskName'] . "</span>
                                                <span style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                <br>
                                                <span style='font-size: 13px;'>" . $row['visibility'] . "</span>
                                            </div>
                                        </a>

                                        ";
                                        }
                                    } else if ($echoCurDay == 'Tuesday') {
                                        $result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE uryyToeSS4='$uryyToeSS4' AND care_call2='Lunch' AND tuesday='$echoCurDay' ");
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "
                                        <a href='./task-report-form?client_task_Id=" . $row['client_task_Id'] . "' style='text-decoration:none;'>
                                            <hr>
                                            <div style='width: 100%; height:auto; padding:12px; background-color:" . $row['task_colours'] . ";'>
                                                <span>" . $row['client_taskName'] . "</span>
                                                <span style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                <br>
                                                <span style='font-size: 13px;'>" . $row['visibility'] . "</span>
                                            </div>
                                        </a>

                                        ";
                                        }
                                    } else if ($echoCurDay == 'Wednesday') {
                                        $result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE uryyToeSS4='$uryyToeSS4' AND care_call2='Lunch' AND wednesday='$echoCurDay' ");
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "
                                        <a href='./task-report-form?client_task_Id=" . $row['client_task_Id'] . "' style='text-decoration:none;'>
                                            <hr>
                                            <div style='width: 100%; height:auto; padding:12px; background-color:" . $row['task_colours'] . ";'>
                                                <span>" . $row['client_taskName'] . "</span>
                                                <span style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                <br>
                                                <span style='font-size: 13px;'>" . $row['visibility'] . "</span>
                                            </div>
                                        </a>

                                        ";
                                        }
                                    } else if ($echoCurDay == 'Thursday') {
                                        $result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE uryyToeSS4='$uryyToeSS4' AND care_call2='Lunch' AND thursday='$echoCurDay' ");
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "
                                        <a href='./task-report-form?client_task_Id=" . $row['client_task_Id'] . "' style='text-decoration:none;'>
                                            <hr>
                                            <div style='width: 100%; height:auto; padding:12px; background-color:" . $row['task_colours'] . ";'>
                                                <span>" . $row['client_taskName'] . "</span>
                                                <span style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                <br>
                                                <span style='font-size: 13px;'>" . $row['visibility'] . "</span>
                                            </div>
                                        </a>

                                        ";
                                        }
                                    } else if ($echoCurDay == 'Friday') {
                                        $result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE uryyToeSS4='$uryyToeSS4' AND care_call2='Lunch' AND friday='$echoCurDay' ");
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "
                                        <a href='./task-report-form?client_task_Id=" . $row['client_task_Id'] . "' style='text-decoration:none;'>
                                            <hr>
                                            <div style='width: 100%; height:auto; padding:12px; background-color:" . $row['task_colours'] . ";'>
                                                <span>" . $row['client_taskName'] . "</span>
                                                <span style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                <br>
                                                <span style='font-size: 13px;'>" . $row['visibility'] . "</span>
                                            </div>
                                        </a>

                                        ";
                                        }
                                    } else if ($echoCurDay == 'Saturday') {
                                        $result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE uryyToeSS4='$uryyToeSS4' AND care_call2='Lunch' AND saturday='$echoCurDay' ");
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "
                                        <a href='./task-report-form?client_task_Id=" . $row['client_task_Id'] . "' style='text-decoration:none;'>
                                            <hr>
                                            <div style='width: 100%; height:auto; padding:12px; background-color:" . $row['task_colours'] . ";'>
                                                <span>" . $row['client_taskName'] . "</span>
                                                <span style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                <br>
                                                <span style='font-size: 13px;'>" . $row['visibility'] . "</span>
                                            </div>
                                        </a>

                                        ";
                                        }
                                    } else if ($echoCurDay == 'Sunday') {
                                        $result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE uryyToeSS4='$uryyToeSS4' AND care_call2='Lunch' AND sunday='$echoCurDay' ");
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "
                                        <a href='./task-report-form?client_task_Id=" . $row['client_task_Id'] . "' style='text-decoration:none;'>
                                            <hr>
                                            <div style='width: 100%; height:auto; padding:12px; background-color:" . $row['task_colours'] . ";'>
                                                <span>" . $row['client_taskName'] . "</span>
                                                <span style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                <br>
                                                <span style='font-size: 13px;'>" . $row['visibility'] . "</span>
                                            </div>
                                        </a>

                                        ";
                                        }
                                    }               //-------------------Tea time start here---------------------
                                } else if ($echomyTime > 14 and $echomyTime < 18) {
                                    if ($echoCurDay == 'Monday') {
                                        $result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE uryyToeSS4='$uryyToeSS4' AND care_call3='Tea' AND monday='$echoCurDay' ");
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "
                                        <a href='./task-report-form?client_task_Id=" . $row['client_task_Id'] . "' style='text-decoration:none;'>
                                            <hr>
                                            <div style='width: 100%; height:auto; padding:12px; background-color:" . $row['task_colours'] . ";'>
                                                <span>" . $row['client_taskName'] . "</span>
                                                <span style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                <br>
                                                <span style='font-size: 13px;'>" . $row['visibility'] . "</span>
                                            </div>
                                        </a>

                                        ";
                                        }
                                    } else if ($echoCurDay == 'Tuesday') {
                                        $result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE uryyToeSS4='$uryyToeSS4' AND care_call3='Tea' AND tuesday='$echoCurDay' ");
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "
                                        <a href='./task-report-form?client_task_Id=" . $row['client_task_Id'] . "' style='text-decoration:none;'>
                                            <hr>
                                            <div style='width: 100%; height:auto; padding:12px; background-color:" . $row['task_colours'] . ";'>
                                                <span>" . $row['client_taskName'] . "</span>
                                                <span style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                <br>
                                                <span style='font-size: 13px;'>" . $row['visibility'] . "</span>
                                            </div>
                                        </a>

                                        ";
                                        }
                                    } else if ($echoCurDay == 'Wednesday') {
                                        $result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE uryyToeSS4='$uryyToeSS4' AND care_call3='Tea' AND wednesday='$echoCurDay' ");
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "
                                        <a href='./task-report-form?client_task_Id=" . $row['client_task_Id'] . "' style='text-decoration:none;'>
                                            <hr>
                                            <div style='width: 100%; height:auto; padding:12px; background-color:" . $row['task_colours'] . ";'>
                                                <span>" . $row['client_taskName'] . "</span>
                                                <span style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                <br>
                                                <span style='font-size: 13px;'>" . $row['visibility'] . "</span>
                                            </div>
                                        </a>

                                        ";
                                        }
                                    } else if ($echoCurDay == 'Thursday') {
                                        $result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE uryyToeSS4='$uryyToeSS4' AND care_call3='Tea' AND thursday='$echoCurDay' ");
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "
                                        <a href='./task-report-form?client_task_Id=" . $row['client_task_Id'] . "' style='text-decoration:none;'>
                                            <hr>
                                            <div style='width: 100%; height:auto; padding:12px; background-color:" . $row['task_colours'] . ";'>
                                                <span>" . $row['client_taskName'] . "</span>
                                                <span style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                <br>
                                                <span style='font-size: 13px;'>" . $row['visibility'] . "</span>
                                            </div>
                                        </a>

                                        ";
                                        }
                                    } else if ($echoCurDay == 'Friday') {
                                        $result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE uryyToeSS4='$uryyToeSS4' AND care_call3='Tea' AND friday='$echoCurDay' ");
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "
                                        <a href='./task-report-form?client_task_Id=" . $row['client_task_Id'] . "' style='text-decoration:none;'>
                                            <hr>
                                            <div style='width: 100%; height:auto; padding:12px; background-color:" . $row['task_colours'] . ";'>
                                                <span>" . $row['client_taskName'] . "</span>
                                                <span style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                <br>
                                                <span style='font-size: 13px;'>" . $row['visibility'] . "</span>
                                            </div>
                                        </a>

                                        ";
                                        }
                                    } else if ($echoCurDay == 'Saturday') {
                                        $result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE uryyToeSS4='$uryyToeSS4' AND care_call3='Tea' AND saturday='$echoCurDay' ");
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "
                                        <a href='./task-report-form?client_task_Id=" . $row['client_task_Id'] . "' style='text-decoration:none;'>
                                            <hr>
                                            <div style='width: 100%; height:auto; padding:12px; background-color:" . $row['task_colours'] . ";'>
                                                <span>" . $row['client_taskName'] . "</span>
                                                <span style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                <br>
                                                <span style='font-size: 13px;'>" . $row['visibility'] . "</span>
                                            </div>
                                        </a>

                                        ";
                                        }
                                    } else if ($echoCurDay == 'Sunday') {
                                        $result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE uryyToeSS4='$uryyToeSS4' AND care_call3='Tea' AND sunday='$echoCurDay' ");
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "
                                        <a href='./task-report-form?client_task_Id=" . $row['client_task_Id'] . "' style='text-decoration:none;'>
                                            <hr>
                                            <div style='width: 100%; height:auto; padding:12px; background-color:" . $row['task_colours'] . ";'>
                                                <span>" . $row['client_taskName'] . "</span>
                                                <span style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                <br>
                                                <span style='font-size: 13px;'>" . $row['visibility'] . "</span>
                                            </div>
                                        </a>

                                        ";
                                        }
                                    }           //-------------------Bed time start here---------------------
                                } else if ($echomyTime > 18 and $echomyTime < 23) {
                                    if ($echoCurDay == 'Monday') {
                                        $result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE uryyToeSS4='$uryyToeSS4' AND care_call4='Bed' AND monday='$echoCurDay' ");
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "
                                        <a href='./task-report-form?client_task_Id=" . $row['client_task_Id'] . "' style='text-decoration:none;'>
                                            <hr>
                                            <div style='width: 100%; height:auto; padding:12px; background-color:" . $row['task_colours'] . ";'>
                                                <span>" . $row['client_taskName'] . "</span>
                                                <span style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                <br>
                                                <span style='font-size: 13px;'>" . $row['visibility'] . "</span>
                                            </div>
                                        </a>

                                        ";
                                        }
                                    } else if ($echoCurDay == 'Tuesday') {
                                        $result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE uryyToeSS4='$uryyToeSS4' AND care_call4='Bed' AND tuesday='$echoCurDay' ");
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "
                                        <a href='./task-report-form?client_task_Id=" . $row['client_task_Id'] . "' style='text-decoration:none;'>
                                            <hr>
                                            <div style='width: 100%; height:auto; padding:12px; background-color:" . $row['task_colours'] . ";'>
                                                <span>" . $row['client_taskName'] . "</span>
                                                <span style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                <br>
                                                <span style='font-size: 13px;'>" . $row['visibility'] . "</span>
                                            </div>
                                        </a>

                                        ";
                                        }
                                    } else if ($echoCurDay == 'Wednesday') {
                                        $result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE uryyToeSS4='$uryyToeSS4' AND care_call4='Bed' AND wednesday='$echoCurDay' ");
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "
                                        <a href='./task-report-form?client_task_Id=" . $row['client_task_Id'] . "' style='text-decoration:none;'>
                                            <hr>
                                            <div style='width: 100%; height:auto; padding:12px; background-color:" . $row['task_colours'] . ";'>
                                                <span>" . $row['client_taskName'] . "</span>
                                                <span style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                <br>
                                                <span style='font-size: 13px;'>" . $row['visibility'] . "</span>
                                            </div>
                                        </a>

                                        ";
                                        }
                                    } else if ($echoCurDay == 'Thursday') {
                                        $result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE uryyToeSS4='$uryyToeSS4' AND care_call4='Bed' AND thursday='$echoCurDay' ");
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "
                                        <a href='./task-report-form?client_task_Id=" . $row['client_task_Id'] . "' style='text-decoration:none;'>
                                            <hr>
                                            <div style='width: 100%; height:auto; padding:12px; background-color:" . $row['task_colours'] . ";'>
                                                <span>" . $row['client_taskName'] . "</span>
                                                <span style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                <br>
                                                <span style='font-size: 13px;'>" . $row['visibility'] . "</span>
                                            </div>
                                        </a>

                                        ";
                                        }
                                    } else if ($echoCurDay == 'Friday') {
                                        $result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE uryyToeSS4='$uryyToeSS4' AND care_call4='Bed' AND friday='$echoCurDay' ");
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "
                                        <a href='./task-report-form?client_task_Id=" . $row['client_task_Id'] . "' style='text-decoration:none;'>
                                            <hr>
                                            <div style='width: 100%; height:auto; padding:12px; background-color:" . $row['task_colours'] . ";'>
                                                <span>" . $row['client_taskName'] . "</span>
                                                <span style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                <br>
                                                <span style='font-size: 13px;'>" . $row['visibility'] . "</span>
                                            </div>
                                        </a>

                                        ";
                                        }
                                    } else if ($echoCurDay == 'Saturday') {
                                        $result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE uryyToeSS4='$uryyToeSS4' AND care_call4='Bed' AND saturday='$echoCurDay' ");
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "
                                        <a href='./task-report-form?client_task_Id=" . $row['client_task_Id'] . "' style='text-decoration:none;'>
                                            <hr>
                                            <div style='width: 100%; height:auto; padding:12px; background-color:" . $row['task_colours'] . ";'>
                                                <span>" . $row['client_taskName'] . "</span>
                                                <span style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                <br>
                                                <span style='font-size: 13px;'>" . $row['visibility'] . "</span>
                                            </div>
                                        </a>

                                        ";
                                        }
                                    } else if ($echoCurDay == 'Sunday') {
                                        $result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE uryyToeSS4='$uryyToeSS4' AND care_call4='Bed' AND sunday='$echoCurDay' ");
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "
                                        <a href='./task-report-form?client_task_Id=" . $row['client_task_Id'] . "' style='text-decoration:none;'>
                                            <hr>
                                            <div style='width: 100%; height:auto; padding:12px; background-color:" . $row['task_colours'] . ";'>
                                                <span>" . $row['client_taskName'] . "</span>
                                                <span style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                <br>
                                                <span style='font-size: 13px;'>" . $row['visibility'] . "</span>
                                            </div>
                                        </a>

                                        ";
                                        }
                                    }
                                }
                            } ?>


                            <br>


                            <?php
                            if (isset($_GET['uryyToeSS4'])) {
                                $uryyToeSS4 = $_GET['uryyToeSS4'];

                                $result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE uryyToeSS4='$uryyToeSS4' ORDER BY client_Id DESC LIMIT 1 ");
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "
                                    <a href='./medication-progress?uryyToeSS4=" . $row['uryyToeSS4'] . "' style='text-decoration:none;'>      
                                        <button type='submit' style='margin-bottom:8px;width:auto; height:50px; text-align:right; padding:15px; font-size:16px;' class='flex text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue'>
                                            Continue
                                        </button>
                                    </a>
";
                                }
                            } ?>
                        </div>

                    </div>
                </div>



                <div class="min-w-0 p-4 text-white bg-purple-600 rounded-lg shadow-xs">
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