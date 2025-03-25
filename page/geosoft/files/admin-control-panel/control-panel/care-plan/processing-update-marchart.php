<?php

if (isset($_POST['btnUpdateMarChart'])) {

    include('dbconnections.php');

    $txtClientId =  mysqli_real_escape_string($conn, $_POST['txtClientId']);
    $txtClientMedId =  mysqli_real_escape_string($conn, $_POST['txtClientMedId']);
    $txtMarchartNote =  mysqli_real_escape_string($conn, $_POST['txtMarchartNote']);
    $txtOutcome =  mysqli_real_escape_string($conn, $_POST['txtOutcome']);

    $sqlresult = mysqli_query($conn, "UPDATE `tbl_finished_meds` SET `task_note` = '$txtMarchartNote', `col_outcome` = '$txtOutcome' WHERE med_Id = '$txtClientMedId' ");

    if ($sqlresult) {
        header("Location: ./view-marchart?uryyToeSS4=$txtClientId");
    } else {
    }
}
