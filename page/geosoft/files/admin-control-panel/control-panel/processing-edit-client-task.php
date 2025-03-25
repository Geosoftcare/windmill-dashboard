<?php

if (isset($_POST['btnEditClientTask'])) {
    include('dbconnections.php');

    $txtTaskId =  mysqli_real_escape_string($conn, $_POST['txtTaskId']);
    $txttxtClientSpcialId =  mysqli_real_escape_string($conn, $_POST['txtClientSocialId']);
    $txtTask =  mysqli_real_escape_string($conn, $_POST['txtTask']);
    $txtTaskDetails =  mysqli_real_escape_string($conn, $_POST['txtTaskDetails']);

    $txtMorning = mysqli_real_escape_string($conn, $_REQUEST['txtMorning']);
    $txtLunch = mysqli_real_escape_string($conn, $_REQUEST['txtLunch']);
    $txtTea = mysqli_real_escape_string($conn, $_REQUEST['txtTea']);
    $txtBed = mysqli_real_escape_string($conn, $_REQUEST['txtBed']);

    $txtExM = mysqli_real_escape_string($conn, $_REQUEST['txtEM']);
    $txtExL = mysqli_real_escape_string($conn, $_REQUEST['txtEL']);
    $txtExT = mysqli_real_escape_string($conn, $_REQUEST['txtET']);
    $txtExB = mysqli_real_escape_string($conn, $_REQUEST['txtEB']);

    $txtMonday = mysqli_real_escape_string($conn, $_REQUEST['txtMonday']);
    $txtTuesday = mysqli_real_escape_string($conn, $_REQUEST['txtTuesday']);
    $txtWednesday = mysqli_real_escape_string($conn, $_REQUEST['txtWednesday']);
    $txtThursday = mysqli_real_escape_string($conn, $_REQUEST['txtThursday']);
    $txtFriday = mysqli_real_escape_string($conn, $_REQUEST['txtFriday']);
    $txtSaturday = mysqli_real_escape_string($conn, $_REQUEST['txtSaturday']);
    $txtSunday = mysqli_real_escape_string($conn, $_REQUEST['txtSunday']);
    $txtStarts = mysqli_real_escape_string($conn, $_REQUEST['txtStarts']);
    $txtEnd = mysqli_real_escape_string($conn, $_REQUEST['txtEnd']);

    $txtPeriod = mysqli_real_escape_string($conn, $_REQUEST['txtPeriod']);
    $txtPeriodCategory = mysqli_real_escape_string($conn, $_REQUEST['txtPeriodCategory']);

    $clickDisplayDaily = mysqli_real_escape_string($conn, $_REQUEST['clickDisplayDaily']);
    $clickDisplayOneTime = mysqli_real_escape_string($conn, $_REQUEST['clickDisplayOneTime']);
    $clickDisplayCustom = mysqli_real_escape_string($conn, $_REQUEST['clickDisplayCustom']);


    if ($clickDisplayDaily) {
        $client_data_insertionQuery = mysqli_query($conn, "UPDATE `tbl_clients_task_records` SET `client_taskName` = '$txtTask', `client_task_details` = '$txtTaskDetails', `care_call1`= '$txtMorning', `care_call2`= '$txtLunch', `care_call3`= '$txtTea', `care_call4`= '$txtBed', `extra_call1`= '$txtExM', `extra_call2`= '$txtExL', `extra_call3`= '$txtExT', `extra_call4`= '$txtExB', `monday` = '$txtMonday', `tuesday` = '$txtTuesday', `wednesday` = '$txtWednesday', `thursday` = '$txtThursday', `friday` = '$txtFriday'
	 , `saturday` = '$txtSaturday', `sunday` = '$txtSunday', `task_startDate` = '$txtStarts', `task_endDate` = '$txtEnd', `col_occurence` = '$txtStarts', `col_period_two` = 'Daily' WHERE client_Id = '$txtTaskId' ");
        if ($client_data_insertionQuery) {
            header("Location: ./client-task?uryyToeSS4=$txttxtClientSpcialId");
        } else {
        }
    } else if ($clickDisplayOneTime) {
        $client_data_insertionQuery = mysqli_query($conn, "UPDATE `tbl_clients_task_records` SET `client_taskName` = '$txtTask', `client_task_details` = '$txtTaskDetails',`care_call1`= '$txtMorning', `care_call2`= '$txtLunch', `care_call3`= '$txtTea', `care_call4`= '$txtBed', `extra_call1`= '$txtExM', `extra_call2`= '$txtExL', `extra_call3`= '$txtExT', `extra_call4`= '$txtExB', `monday` = '$txtMonday', `tuesday` = '$txtTuesday', `wednesday` = '$txtWednesday', `thursday` = '$txtThursday', `friday` = '$txtFriday'
        , `saturday` = '$txtSaturday', `sunday` = '$txtSunday', `task_startDate` = '$txtStarts', `task_endDate` = '$txtEnd', `col_occurence` = '$txtStarts', `col_period_two` = 'Monthly' WHERE client_Id = '$txtTaskId' ");
        if ($client_data_insertionQuery) {
            header("Location: ./client-task?uryyToeSS4=$txttxtClientSpcialId");
        } else {
        }
    } else if ($clickDisplayCustom) {
        $client_data_insertionQuery = mysqli_query($conn, "UPDATE `tbl_clients_task_records` SET `client_taskName` = '$txtTask', `client_task_details` = '$txtTaskDetails',`care_call1`= '$txtMorning', `care_call2`= '$txtLunch', `care_call3`= '$txtTea', `care_call4`= '$txtBed', `extra_call1`= '$txtExM', `extra_call2`= '$txtExL', `extra_call3`= '$txtExT', `extra_call4`= '$txtExB', `monday` = '$txtMonday', `tuesday` = '$txtTuesday', `wednesday` = '$txtWednesday', `thursday` = '$txtThursday', `friday` = '$txtFriday'
        , `saturday` = '$txtSaturday', `sunday` = '$txtSunday', `task_startDate` = '$txtStarts', `task_endDate` = '$txtEnd', `col_occurence` = '$txtStarts', `col_period_one` = '$txtPeriod', `col_period_two` = '$txtPeriodCategory' WHERE client_Id = '$txtTaskId' ");
        if ($client_data_insertionQuery) {
            header("Location: ./client-task?uryyToeSS4=$txttxtClientSpcialId");
        } else {
        }
    }
}
