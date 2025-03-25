<?php
session_start();
ob_start();

if (isset($_POST['btnChangeClientRun'])) {
    include('dbconnections.php');

    $txtRunAreaId =  mysqli_real_escape_string($conn, $_POST['txtRunAreaId']);
    $txtClientId =  mysqli_real_escape_string($conn, $_POST['txtClientId']);
    $txtDateChange =  mysqli_real_escape_string($conn, $_POST['txtDateChange']);
    $txtClientRunName =  mysqli_real_escape_string($conn, $_POST['txtClientRunName']);

    $sql_change_client_run = mysqli_query($conn, "UPDATE `tbl_manage_runs` SET `run_area_nameId` = '$txtRunAreaId', `col_run_name` = '$txtClientRunName' WHERE userId = '$txtClientId' ");
    if ($sql_change_client_run) {
        header("Location: ./roster/schedule-run-756473-00499-99553-85006?txtDate=$txtDateChange");
    } else {
    }
}
