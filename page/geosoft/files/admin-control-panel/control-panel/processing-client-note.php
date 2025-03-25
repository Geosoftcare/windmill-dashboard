<?php

if (isset($_POST['btnSubmitClientNote'])) {

    include('dbconnections.php');

    $txtClientSpecialId = mysqli_real_escape_string($conn, $_REQUEST['txtClientSpecialId']);
    $txtDateOfNote = mysqli_real_escape_string($conn, $_REQUEST['txtDateOfNote']);
    $txtTimeOfNote = mysqli_real_escape_string($conn, $_REQUEST['txtTimeOfNote']);
    $txtClientNote = mysqli_real_escape_string($conn, $_REQUEST['txtClientNote']);
    $txtCompanyId = mysqli_real_escape_string($conn, $_REQUEST['txtCompanyId']);

    $queryIns = mysqli_query($conn, "INSERT INTO tbl_client_notes (uryyToeSS4, dateof_note, timeof_note, client_note, col_company_Id) 
    VALUES('" . $txtClientSpecialId . "', '" . $txtDateOfNote . "', '" . $txtTimeOfNote . "', '" . $txtClientNote . "', '" . $txtCompanyId . "') ");
    if ($queryIns) {
        header("Location: ./client-notes?uryyToeSS4=$txtClientSpecialId");

        unset($txtClientSpecialId);
        unset($txtDateOfNote);
        unset($txtTimeOfNote);
        unset($txtClientNote);
        unset($txtCompanyId);
    }
}
