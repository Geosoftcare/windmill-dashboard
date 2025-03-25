<?php

if (isset($_POST['btnDeleteRun'])) {

    include('dbconnections.php');
    $RunSpecialId = mysqli_real_escape_string($conn, $_POST['RunSpecialId']);

    $sql_delete_run_name = mysqli_query($conn, "DELETE FROM tbl_client_runs WHERE run_ids = '" . $RunSpecialId . "' AND col_company_Id = '" . $_SESSION['usr_compId'] . "'");
    if ($sql_delete_run_name) {
        $sql_delete_mange_run = mysqli_query($conn, "DELETE FROM tbl_manage_runs WHERE run_area_nameId = '" . $RunSpecialId . "' AND col_company_Id = '" . $_SESSION['usr_compId'] . "'");
        if ($sql_delete_mange_run) {
            if ($sql_delete_run_name) {
                header('Location: ./manage-runs');
            }
        }
    }
}
