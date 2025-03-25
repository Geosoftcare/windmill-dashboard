<?php
include_once('dbconnection-string.php');
if (isset($_POST['uryyToeSS4'])) {
    $uryyToeSS4 = $_POST['uryyToeSS4'];
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

$finmed_ids = [];
$result = $conn->query("SELECT task_SpecialId FROM tbl_finished_meds WHERE (uryyToeSS4='$uryyToeSS4' AND med_date='$today' 
AND care_calls='$clientCurCallCalls' AND care_call_days='$echoCurDay' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $finmed_ids[] = $row["task_SpecialId"];
    }
}

$fintask_ids = [];
$result = $conn->query("SELECT task_SpecialId FROM tbl_finished_tasks WHERE (uryyToeSS4='$uryyToeSS4' AND task_date='$today'
AND care_calls='$clientCurCallCalls' AND care_call_days='$echoCurDay' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $fintask_ids[] = $row["task_SpecialId"];
    }
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
                            <div style="font-size: 20px; color:rgba(22, 160, 133,1.0); margin-top:10px;" class="mb-2 font-semibold text-gray-600 dark:text-gray-300">
                                Activities
                            </div>
                            <?php
                            $echoCurDay = date("l");
                            //Task progress for the client begin here
                            //-------------------Breakfast time start here---------------------
                            $sql = "
                                SELECT med_name AS name, col_taskId AS taskIds, med_colours AS bgColor, col_fifo, uryyToeSS4, col_path, 'medicine' AS type FROM tbl_clients_medication_records
                                WHERE (uryyToeSS4='$uryyToeSS4' AND (care_call1='$clientCurCallCalls' || care_call2='$clientCurCallCalls' 
                                || care_call3='$clientCurCallCalls' || care_call4='$clientCurCallCalls' || extra_call1='$clientCurCallCalls' 
                                || extra_call2='$clientCurCallCalls' || extra_call3='$clientCurCallCalls' || extra_call4='$clientCurCallCalls') 
                                AND (monday='$echoCurDay' || tuesday='$echoCurDay' || wednesday='$echoCurDay' || thursday='$echoCurDay' || friday='$echoCurDay' 
                                || saturday='$echoCurDay' || sunday='$echoCurDay') AND col_company_Id = '" . $_SESSION['usr_compId'] . "')
                                UNION ALL
                                SELECT client_taskName AS name, col_taskId AS taskIds, task_colours AS bgColor, col_fifo, uryyToeSS4, col_path, 'task' AS type  FROM tbl_clients_task_records
                                WHERE (uryyToeSS4='$uryyToeSS4' AND (care_call1='$clientCurCallCalls' || care_call2='$clientCurCallCalls' 
                                || care_call3='$clientCurCallCalls' || care_call4='$clientCurCallCalls' || extra_call1='$clientCurCallCalls' 
                                || extra_call2='$clientCurCallCalls' || extra_call3='$clientCurCallCalls' || extra_call4='$clientCurCallCalls') 
                                AND (monday='$echoCurDay' || tuesday='$echoCurDay' || wednesday='$echoCurDay' || thursday='$echoCurDay' || friday='$echoCurDay' 
                                || saturday='$echoCurDay' || sunday='$echoCurDay') AND col_company_Id = '" . $_SESSION['usr_compId'] . "')
                                ORDER BY col_fifo ASC, name ASC";

                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $status = "";
                                    if ($row["type"] == "medicine" && in_array($row["taskIds"], $finmed_ids)) {
                                        $status = "Updated";
                                    } elseif ($row["type"] == "task" && in_array($row["taskIds"], $fintask_ids)) {
                                        $status = "Updated";
                                    }
                                    if ($status == "Updated") {
                                        echo "
                                        <a class='text-gray-600 dark:text-gray-300' href='./" . $row["col_path"] . "?col_taskId=" . $row["taskIds"] . "' style='text-decoration:none;'>
                                                <hr>
                                                <div style='width: 100%; height:auto; padding:12px; color:" . $row["bgColor"] . ";'>
                                                    <span class='text-gray-600 dark:text-gray-300'>" . $row["name"] . "
                                                    <span class='text-gray-600 dark:text-gray-300' style='font-size:12px;'> </span></span>
                                                    <span class='text-gray-600 dark:text-gray-300' style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                    <br>
                                                    <span style='font-size: 13px; color:rgba(39, 174, 96,1.0);'>" . $status . "</span>
                                                </div>
                                            </a>
                                        ";
                                    } else {
                                        echo "
                                        <a class='text-gray-600 dark:text-gray-300' href='./" . $row["col_path"] . "?col_taskId=" . $row["taskIds"] . "' style='text-decoration:none;'>
                                                <hr>
                                                <div style='width: 100%; height:auto; padding:12px; color:" . $row["bgColor"] . ";'>
                                                    <span class='text-gray-600 dark:text-gray-300'>" . $row["name"] . "
                                                    <span class='text-gray-600 dark:text-gray-300' style='font-size:12px;'> </span></span>
                                                    <span class='text-gray-600 dark:text-gray-300' style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                                    <br>
                                                    <span style='font-size: 13px; color:#000;'>Not updated</span>
                                                </div>
                                            </a>
                                        ";
                                    }
                                }
                            } else {
                                echo "0 results";
                            }

                            $conn->close();
                            ?>

                            <br>
                            <form action=" ./processing-checking-task-completion" autocomplete="off" method="POST" enctype="multipart/form-data">
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

        <?php include('footer-contents.php'); ?>