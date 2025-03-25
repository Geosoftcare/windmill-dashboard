<?php

if (isset($_POST['btnSubmitMedNote'])) {
    include_once('dbconnection-string.php');

    $txtClientSpecialIds = mysqli_real_escape_string($conn, $_POST['txtClientSpecialIds']);
    $txtCurerCall = mysqli_real_escape_string($conn, $_POST['txtVariousCareCalls']);
    $txtClientCompanyId = mysqli_real_escape_string($conn, $_POST['txtClientCompanyId']);
    $txtTaskNote = mysqli_real_escape_string($conn, $_POST['txtTaskNote']);
    $txtCarerId = mysqli_real_escape_string($conn, $_POST['txtCarerId']);
    $txtMiles = mysqli_real_escape_string($conn, $_POST['txtMiles']);
    $txtCarerMileage = mysqli_real_escape_string($conn, $_POST['txtCarerMileage']);

    $mileageResult = $txtMiles * $txtCarerMileage;
    $totalMileage = number_format((float)$mileageResult, 2, '.', '');



    if ($txtCurerCall == 'Morning' or $txtCurerCall == 'Morning') {
        $sqlUpdate_finish_carecall = mysqli_query($conn, "UPDATE `tbl_daily_shift_records` SET `task_note` = '$txtTaskNote', `col_mileage` = '$totalMileage' WHERE (`shift_date` = '$today' AND `col_carer_Id` = '$txtCarerId' AND `col_care_call` = 'Morning') ORDER BY userId DESC LIMIT 1 ");
        if ($sqlUpdate_finish_carecall) {
            $sqlUpdate_med_fifo = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_fifo` = '' WHERE (`uryyToeSS4` = '$txtClientSpecialIds' AND `care_call1` = 'Morning')");
            if ($sqlUpdate_med_fifo) {
                $sqlUpdate_task_fifo = mysqli_query($conn, "UPDATE `tbl_clients_task_records` SET `col_fifo` = '' WHERE (`uryyToeSS4` = '$txtClientSpecialIds' AND `care_call1` = 'Morning')");
                if ($sqlUpdate_task_fifo) {
                    header("Location: ./check-out-progress?uryyToeSS4=$txtClientSpecialIds");
                }
            }
        } else {
            header("Location: ./check-out-progress?uryyToeSS4=$txtClientSpecialIds");
        }
    } else if ($txtCurerCall == 'Lunch') {
        $sqlUpdate_finish_carecall = mysqli_query($conn, "UPDATE `tbl_daily_shift_records` SET `task_note` = '$txtTaskNote', `col_mileage` = '$totalMileage' WHERE (`shift_date` = '$today' AND `col_carer_Id` = '$txtCarerId' AND `col_care_call` = '$txtCurerCall') ORDER BY userId DESC LIMIT 1");
        if ($sqlUpdate_finish_carecall) {
            $sqlUpdate_med_fifo = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_fifo` = '' WHERE (`uryyToeSS4` = '$txtClientSpecialIds' AND `care_call2` = '$txtCurerCall')");
            if ($sqlUpdate_med_fifo) {
                $sqlUpdate_task_fifo = mysqli_query($conn, "UPDATE `tbl_clients_task_records` SET `col_fifo` = '' WHERE (`uryyToeSS4` = '$txtClientSpecialIds' AND `care_call2` = '$txtCurerCall')");
                if ($sqlUpdate_task_fifo) {
                    header("Location: ./check-out-progress?uryyToeSS4=$txtClientSpecialIds");
                }
            }
        } else {
            header("Location: ./check-out-progress?uryyToeSS4=$txtClientSpecialIds");
        }
    } else if ($txtCurerCall == 'Tea') {
        $sqlUpdate_finish_carecall = mysqli_query($conn, "UPDATE `tbl_daily_shift_records` SET `task_note` = '$txtTaskNote', `col_mileage` = '$totalMileage' WHERE (`shift_date` = '$today' AND `col_carer_Id` = '$txtCarerId' AND `col_care_call` = '$txtCurerCall') ORDER BY userId DESC LIMIT 1 ");
        if ($sqlUpdate_finish_carecall) {
            $sqlUpdate_med_fifo = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_fifo` = '' WHERE (`uryyToeSS4` = '$txtClientSpecialIds' AND `care_call3` = '$txtCurerCall')");
            if ($sqlUpdate_med_fifo) {
                $sqlUpdate_task_fifo = mysqli_query($conn, "UPDATE `tbl_clients_task_records` SET `col_fifo` = '' WHERE (`uryyToeSS4` = '$txtClientSpecialIds' AND `care_call3` = '$txtCurerCall')");
                if ($sqlUpdate_task_fifo) {
                    header("Location: ./check-out-progress?uryyToeSS4=$txtClientSpecialIds");
                }
            }
        } else {
            header("Location: ./check-out-progress?uryyToeSS4=$txtClientSpecialIds");
        }
    } else if ($txtCurerCall == 'Bed') {
        $sqlUpdate_finish_carecall = mysqli_query($conn, "UPDATE `tbl_daily_shift_records` SET `task_note` = '$txtTaskNote', `col_mileage` = '$totalMileage' WHERE (`shift_date` = '$today' AND `col_carer_Id` = '$txtCarerId' AND `col_care_call` = '$txtCurerCall') ORDER BY userId DESC LIMIT 1 ");
        if ($sqlUpdate_finish_carecall) {
            $sqlUpdate_med_fifo = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_fifo` = '' WHERE (`uryyToeSS4` = '$txtClientSpecialIds' AND `care_call4` = '$txtCurerCall')");
            if ($sqlUpdate_med_fifo) {
                $sqlUpdate_task_fifo = mysqli_query($conn, "UPDATE `tbl_clients_task_records` SET `col_fifo` = '' WHERE (`uryyToeSS4` = '$txtClientSpecialIds' AND `care_call4` = '$txtCurerCall')");
                if ($sqlUpdate_task_fifo) {
                    header("Location: ./check-out-progress?uryyToeSS4=$txtClientSpecialIds");
                }
            }
        } else {
            header("Location: ./check-out-progress?uryyToeSS4=$txtClientSpecialIds");
        }
    } else if ($txtCurerCall == 'EM morning call') {
        $sqlUpdate_finish_carecall = mysqli_query($conn, "UPDATE `tbl_daily_shift_records` SET `task_note` = '$txtTaskNote', `col_mileage` = '$totalMileage' WHERE (`shift_date` = '$today' AND `col_carer_Id` = '$txtCarerId' AND `col_care_call` = '$txtCurerCall') ORDER BY userId DESC LIMIT 1 ");
        if ($sqlUpdate_finish_carecall) {
            $sqlUpdate_med_fifo = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_fifo` = '' WHERE (`uryyToeSS4` = '$txtClientSpecialIds' AND `extra_call1` = '$txtCurerCall')");
            if ($sqlUpdate_med_fifo) {
                $sqlUpdate_task_fifo = mysqli_query($conn, "UPDATE `tbl_clients_task_records` SET `col_fifo` = '' WHERE (`uryyToeSS4` = '$txtClientSpecialIds' AND `extra_call1` = '$txtCurerCall')");
                if ($sqlUpdate_task_fifo) {
                    header("Location: ./check-out-progress?uryyToeSS4=$txtClientSpecialIds");
                }
            }
        } else {
            header("Location: ./check-out-progress?uryyToeSS4=$txtClientSpecialIds");
        }
    } else if ($txtCurerCall == 'EL lunch call') {
        $sqlUpdate_finish_carecall = mysqli_query($conn, "UPDATE `tbl_daily_shift_records` SET `task_note` = '$txtTaskNote', `col_mileage` = '$totalMileage' WHERE (`shift_date` = '$today' AND `col_carer_Id` = '$txtCarerId' AND `col_care_call` = '$txtCurerCall') ORDER BY userId DESC LIMIT 1 ");
        if ($sqlUpdate_finish_carecall) {
            $sqlUpdate_med_fifo = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_fifo` = '' WHERE (`uryyToeSS4` = '$txtClientSpecialIds' AND `extra_call2` = '$txtCurerCall')");
            if ($sqlUpdate_med_fifo) {
                $sqlUpdate_task_fifo = mysqli_query($conn, "UPDATE `tbl_clients_task_records` SET `col_fifo` = '' WHERE (`uryyToeSS4` = '$txtClientSpecialIds' AND `extra_call2` = '$txtCurerCall')");
                if ($sqlUpdate_task_fifo) {
                    header("Location: ./check-out-progress?uryyToeSS4=$txtClientSpecialIds");
                }
            }
        } else {
            header("Location: ./check-out-progress?uryyToeSS4=$txtClientSpecialIds");
        }
    } else if ($txtCurerCall == 'ET tea call') {
        $sqlUpdate_finish_carecall = mysqli_query($conn, "UPDATE `tbl_daily_shift_records` SET `task_note` = '$txtTaskNote', `col_mileage` = '$totalMileage' WHERE (`shift_date` = '$today' AND `col_carer_Id` = '$txtCarerId' AND `col_care_call` = '$txtCurerCall') ORDER BY userId DESC LIMIT 1 ");
        if ($sqlUpdate_finish_carecall) {
            $sqlUpdate_med_fifo = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_fifo` = '' WHERE (`uryyToeSS4` = '$txtClientSpecialIds' AND `extra_call3` = '$txtCurerCall')");
            if ($sqlUpdate_med_fifo) {
                $sqlUpdate_task_fifo = mysqli_query($conn, "UPDATE `tbl_clients_task_records` SET `col_fifo` = '' WHERE (`uryyToeSS4` = '$txtClientSpecialIds' AND `extra_call3` = '$txtCurerCall')");
                if ($sqlUpdate_task_fifo) {
                    header("Location: ./check-out-progress?uryyToeSS4=$txtClientSpecialIds");
                }
            }
        } else {
            header("Location: ./check-out-progress?uryyToeSS4=$txtClientSpecialIds");
        }
    } else if ($txtCurerCall == 'EB bed call') {
        $sqlUpdate_finish_carecall = mysqli_query($conn, "UPDATE `tbl_daily_shift_records` SET `task_note` = '$txtTaskNote', `col_mileage` = '$totalMileage' WHERE (`shift_date` = '$today' AND `col_carer_Id` = '$txtCarerId' AND `col_care_call` = '$txtCurerCall') ORDER BY userId DESC LIMIT 1 ");
        if ($sqlUpdate_finish_carecall) {
            $sqlUpdate_med_fifo = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_fifo` = '' WHERE (`uryyToeSS4` = '$txtClientSpecialIds' AND `extra_call4` = '$txtCurerCall')");
            if ($sqlUpdate_med_fifo) {
                $sqlUpdate_task_fifo = mysqli_query($conn, "UPDATE `tbl_clients_task_records` SET `col_fifo` = '' WHERE (`uryyToeSS4` = '$txtClientSpecialIds' AND `extra_call4` = '$txtCurerCall')");
                if ($sqlUpdate_task_fifo) {
                    header("Location: ./check-out-progress?uryyToeSS4=$txtClientSpecialIds");
                }
            }
        } else {
            header("Location: ./check-out-progress?uryyToeSS4=$txtClientSpecialIds");
        }
    }
}
