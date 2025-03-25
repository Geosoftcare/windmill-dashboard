<?php

if (isset($_POST['btnAddNewRun'])) {
    //include('dbconnections.php');

    $txtAddNewRun = mysqli_real_escape_string($conn, $_REQUEST['txtAddNewRun']);
    $txtrunTown = mysqli_real_escape_string($conn, $_REQUEST['txtrunTown']);
    $NewRunId = mysqli_real_escape_string($conn, $_REQUEST['NewRunId']);
    $txtCompId = mysqli_real_escape_string($conn, $_REQUEST['txtCompId']);

    $myCheck = "SELECT * FROM tbl_client_runs WHERE run_name = '" . $txtAddNewRun . "' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ";
    $myCheckres = mysqli_query($conn, $myCheck);
    $countRes = mysqli_num_rows($myCheckres);
    if ($countRes != 0) {
        echo "
            <script type='text/javascript'>
            $(document).ready(function() {
                $('#popupAlert').show();
            });
            </script>";
    } else {
        $result_group_list = mysqli_query($conn, "SELECT * FROM tbl_group_list WHERE group_area = '$txtrunTown' ");
        $row_group_list = mysqli_fetch_array($result_group_list, MYSQLI_ASSOC);
        $count_group_list = mysqli_num_rows($result_group_list);
        $runGroupCity = $row_group_list['group_city'];


        if ($count_group_list != 0) {
            $sql_run_Id = "SELECT MAX(run_ids + 0) FROM tbl_client_runs";
            $result_run_Id = $conn->query($sql_run_Id);
            $row_run_Id = mysqli_fetch_array($result_run_Id);
            $hold_runs_Id = $row_run_Id['MAX(run_ids + 0)'];
            $count_runs_Id = mysqli_num_rows($result_run_Id);

            if ($count_runs_Id == 0) {
                $addnew_run_Id = 100944788 + 1;
                $queryIns = mysqli_query($conn, "INSERT INTO tbl_client_runs (run_name, run_town, col_run_city, run_ids, comp_location_view, col_company_Id) 
                VALUES('" . $txtAddNewRun . "', '" . $txtrunTown . "', '" . $runGroupCity . "', '" . $addnew_run_Id . "', '" . $compLocationCity . "', '" . $txtCompId . "') ");
                if ($queryIns) {
                    header("Location: ./attach-clients?run_ids=$addnew_run_Id");
                }
            } else {
                $result_location_view = mysqli_query($conn, "SELECT * FROM tbl_goesoft_users WHERE col_company_Id = '" . $_SESSION['usr_compId'] . "' ");
                $row_location_view = mysqli_fetch_array($result_location_view, MYSQLI_ASSOC);
                $compLocationCity = $row_location_view['my_city'];

                $increase_run_Id = $hold_runs_Id + 1;
                $queryIns = mysqli_query($conn, "INSERT INTO tbl_client_runs (run_name, run_town, col_run_city, run_ids, comp_location_view, col_company_Id) 
                VALUES('" . $txtAddNewRun . "', '" . $txtrunTown . "', '" . $runGroupCity . "', '" . $increase_run_Id . "', '" . $compLocationCity . "', '" . $txtCompId . "') ");
                if ($queryIns) {
                    header("Location: ./attach-clients?run_ids=$increase_run_Id");
                }
            }
        }
    }
}
