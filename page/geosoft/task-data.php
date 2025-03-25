<?php
include_once('dbconnection-string.php');

if (isset($_GET['uryyToeSS4'])) {
    $uryyToeSS4 = $_GET['uryyToeSS4'];
}

$sel_client_careCall_result = mysqli_query($conn, "SELECT * FROM tbl_care_calls WHERE (uryyToeSS4='$uryyToeSS4' 
AND col_carer_Id = '" . $_SESSION['usr_carerId'] . "' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') 
ORDER BY userId DESC LIMIT 1 ");
$row_client_carecalls = mysqli_fetch_array($sel_client_careCall_result, MYSQLI_ASSOC);
$clientSpecialId = $row_client_carecalls['uryyToeSS4'];
$clientCurCallCalls = $row_client_carecalls['col_care_call'];

$sel_task_data = mysqli_query($conn, "SELECT * FROM tbl_general_client_form WHERE uryyToeSS4='$uryyToeSS4' 
AND col_company_Id = '" . $_SESSION['usr_compId'] . "' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ");
while ($display_client_data = mysqli_fetch_array($sel_task_data)) {
    $client_firstName = $display_client_data['client_first_name'];
    $client_lastName = $display_client_data['client_last_name'];
}
?>

<div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen}">
    <main class="h-full pb-16 overflow-y-auto">
        <div style="margin-top: -10px;" class="container px-2 mx-auto grid">
            <div style="margin-top: 30px;" class="grid gap-6 mb-8 md:grid-cols-2">
                <div class="min-w-0 p-2 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                    <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                        Care call <br><small><span></span><?php echo $client_firstName . ' ' . $client_lastName; ?> Task</small>
                    </h4>
                    <div style="margin-top: -20px;" class="flex mb-4 font-semibold text-gray-600 dark:text-gray-300 items-center p-2 dark:bg-gray-800">
                        <div style='width:100%; height:auto;display:block;'>
                            <hr>
                            <div style="font-size: 20px; color:rgba(22, 160, 133,1.0);" class="mb-2 font-semibold text-gray-600 dark:text-gray-300">
                                <br>
                                Meds
                            </div>
                            <?php include_once('medication-progress.php'); ?>
                            <hr>
                            <div style="font-size: 20px; color:rgba(22, 160, 133,1.0);" class="mb-2 font-semibold text-gray-600 dark:text-gray-300">
                                <br>
                                Tasks
                            </div>
                            <?php
                            $echoCurDay = date("l");
                            //Task progress for the client begin here
                            //-------------------Breakfast time start here---------------------
                            $sel_task_data_result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE (uryyToeSS4='$uryyToeSS4' 
                            AND (care_call1='$clientCurCallCalls' OR care_call2='$clientCurCallCalls' 
                            OR care_call3='$clientCurCallCalls' OR care_call4='$clientCurCallCalls' OR extra_call1='$clientCurCallCalls' 
                            OR extra_call2='$clientCurCallCalls' OR extra_call3='$clientCurCallCalls' OR extra_call4='$clientCurCallCalls') 
                            AND (col_occurence <= '$today' OR visibility = '$today' AND task_endDate > '$today') AND (monday='$echoCurDay' 
                            OR tuesday='$echoCurDay' OR wednesday='$echoCurDay' OR thursday='$echoCurDay' OR friday='$echoCurDay' OR saturday='$echoCurDay' 
                            OR sunday='$echoCurDay') 
                            AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ORDER BY col_fifo ASC ");
                            while ($display_task_data_row = mysqli_fetch_array($sel_task_data_result)) {
                                $get_certain_task_Id = $display_task_data_row['client_Id'];
                                $get_client_task_status = $display_task_data_row['client_task_Id'];

                                $check_task_data_result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE (client_Id='$get_certain_task_Id' 
                                AND (care_call1='$clientCurCallCalls' OR care_call2='$clientCurCallCalls' 
                                OR care_call3='$clientCurCallCalls' OR care_call4='$clientCurCallCalls' OR extra_call1='$clientCurCallCalls' 
                                OR extra_call2='$clientCurCallCalls' OR extra_call3='$clientCurCallCalls' OR extra_call4='$clientCurCallCalls') 
                                AND (task_endDate >= '$today' OR task_endDate = '') AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                                while ($display_taskCheck_data_row = mysqli_fetch_array($check_task_data_result)) {
                                    $get_cehck_task_Id = $display_taskCheck_data_row['client_Id'];
                                    $check_care_status = mysqli_query($conn, "SELECT * FROM tbl_finished_tasks WHERE (uryyToeSS4='$uryyToeSS4' 
                                    AND care_calls = '$clientCurCallCalls' AND task_date = '$today' AND task_SpecialId = '$get_client_task_status') ");
                                    $care_call_status_Res = mysqli_num_rows($check_care_status);

                                    if ($care_call_status_Res != 0) {
                                        echo "
                                            <a class='text-gray-600 dark:text-gray-300' href='./task-report-form?client_task_Id=" . $display_task_data_row['client_task_Id'] . "' style='text-decoration:none;'>
                                                <hr>
                                                <div style='width: 100%; height:auto; padding:12px; color:" . $display_task_data_row['task_colours'] . ";'>
                                                    <span class='text-gray-600 dark:text-gray-300'>" . $display_task_data_row['client_taskName'] . "</span>
                                                    <span class='text-gray-600 dark:text-gray-300' style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                    <br>
                                                    <span style='font-size: 13px; color:rgba(39, 174, 96,1.0);'>Updated</span>
                                                </div>
                                            </a>
                                            ";
                                    } else {
                                        echo "
                                            <a class='text-gray-600 dark:text-gray-300' href='./task-report-form?client_task_Id=" . $display_task_data_row['client_task_Id'] . "' style='text-decoration:none;'>
                                                <hr>
                                                <div style='width: 100%; height:auto; padding:12px; color:" . $display_task_data_row['task_colours'] . ";'>
                                                    <span class='text-gray-600 dark:text-gray-300'>" . $display_task_data_row['client_taskName'] . "</span>
                                                    <span class='text-gray-600 dark:text-gray-300' style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                    <br>
                                                    <span style='font-size: 13px;'>Not updated</span>
                                                </div>
                                            </a>
                                            ";
                                    }
                                }
                            }
                            ?>

                            <br>
                            <form action="./processing-checking-task-completion" autocomplete="off" method="POST" enctype="multipart/form-data">
                                <input type="hidden" value="<?php echo $clientSpecialId; ?>" name="txtClientSpecialIds">
                                <input type="hidden" value="<?php echo $clientCurCallCalls; ?>" name="txtVariousCareCalls">
                                <button type="submit" name="btnCheckTaskandMedsCompletion" style="width: 150px; height:60px; 
                                border:none; background-color:rgba(95, 39, 205,.9); color:white; border-radius:10px; cursor:pointer;">
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