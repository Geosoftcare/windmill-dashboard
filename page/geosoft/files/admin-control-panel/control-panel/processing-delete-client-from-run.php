<?php
if (isset($_POST['btnDeleteClientList'])) {
    include('dbconnections.php');

    $txtUserId = mysqli_real_escape_string($conn, $_POST['txtUserId']);
    $txtRunSpecialId = mysqli_real_escape_string($conn, $_POST['txtRunSpecialId']);


    $txtClientSpecialId = mysqli_real_escape_string($conn, $_POST['txtClientSpecialId']);
    $txtcare_calls = mysqli_real_escape_string($conn, $_POST['txtcare_calls']);
    $txtRunSpecialId = mysqli_real_escape_string($conn, $_POST['txtRunSpecialId']);

    $sql_delete_client_visit_run = mysqli_query($conn, "DELETE FROM tbl_manage_runs WHERE (userId = '" . $txtUserId . "' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
    if ($sql_delete_client_visit_run) {
        $sql_delete_client_visit_rota = mysqli_query($conn, "DELETE FROM tbl_schedule_calls WHERE (uryyToeSS4 = '$txtClientSpecialId' AND Clientshift_Date >= '$today' AND care_calls = '$txtcare_calls' AND col_area_Id = '$txtRunSpecialId') ");
        if ($sql_delete_client_visit_rota) {
            header('Location: ./attach-clients?run_ids=' . $txtRunSpecialId . '');
        }
    }
}
