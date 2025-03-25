<?php
if (isset($_POST['btnCancelCareCall'])) {
    include('dbconnections.php');

    $txtClientName = mysqli_real_escape_string($conn, $_POST['txtClientName']);
    $txtClientCareCall = mysqli_real_escape_string($conn, $_POST['txtClientCareCall']);
    $txtClientId = mysqli_real_escape_string($conn, $_POST['txtClientId']);
    $txtDateOfVisit = mysqli_real_escape_string($conn, $_POST['txtDateOfVisit']);
    $txtTimeOfVisit = mysqli_real_escape_string($conn, $_POST['txtTimeOfVisit']);
    $txtCancellationby = mysqli_real_escape_string($conn, $_POST['txtCancellationby']);
    $txtClientReason = mysqli_real_escape_string($conn, $_POST['txtClientReason']);
    $txtPayCarer = mysqli_real_escape_string($conn, $_POST['txtPayCarer']);
    $txtDontPayCarer = mysqli_real_escape_string($conn, $_POST['txtDontPayCarer']);
    $txtInvoice = mysqli_real_escape_string($conn, $_POST['txtInvoice']);
    $txtDontInvoice = mysqli_real_escape_string($conn, $_POST['txtDontInvoice']);
    $txtcancelNote = mysqli_real_escape_string($conn, $_POST['txtcancelNote']);
    $careCallStatus = '#Cancelled';
    $careCallStatusColor = 'rgba(189, 195, 199,.6)';
    $varVisitColorCode = "rgba(189, 195, 199,1.0)";

    if ($txtPayCarer) {
        if ($txtInvoice) {
            $queryIns = mysqli_query($conn, "INSERT INTO tbl_cancelled_call (col_client_name, col_care_call, col_client_Id, col_date,  col_time, col_cancellation_by, col_reason, col_pay_status, col_invoice, col_note, col_company_Id) 
            VALUES('" . $txtClientName . "', '" . $txtClientCareCall . "', '" . $txtClientId . "', '" . $txtDateOfVisit . "', '" . $txtTimeOfVisit . "', '" . $txtCancellationby . "', '" . $txtClientReason . "', '" . $txtPayCarer . "', '" . $txtInvoice . "', '" . $txtcancelNote . "', '" . $_SESSION['usr_compId'] . "')");
            if ($queryIns) {
                $sqlUpdateRota = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `first_carer` = '$careCallStatus', `first_carer_Id` = '$careCallStatus',`team_resource` = '$careCallStatus',`timeline_colour` = '$careCallStatusColor' 
                WHERE (uryyToeSS4 = '$txtClientId' AND care_calls = '$txtClientCareCall' AND Clientshift_Date = '$txtDateOfVisit' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ORDER BY userId DESC LIMIT 1");
                if ($sqlUpdateRota) {
                    echo "<script>
                            window.history.go(-3);
                        </script>";
                    //header("Location: ./client-visit?uryyToeSS4=$txtClientId");
                }
            }
        } else if ($txtDontInvoice) {
            $queryIns = mysqli_query($conn, "INSERT INTO tbl_cancelled_call (col_client_name, col_care_call, col_client_Id, col_date,  col_time, col_cancellation_by, col_reason, col_pay_status, col_invoice, col_note, col_company_Id) 
            VALUES('" . $txtClientName . "', '" . $txtClientCareCall . "', '" . $txtClientId . "', '" . $txtDateOfVisit . "', '" . $txtTimeOfVisit . "', '" . $txtCancellationby . "', '" . $txtClientReason . "', '" . $txtPayCarer . "', '" . $txtDontInvoice . "', '" . $txtcancelNote . "', '" . $_SESSION['usr_compId'] . "')");
            if ($queryIns) {
                $sqlUpdateRota = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `first_carer` = '$careCallStatus', `first_carer_Id` = '$careCallStatus',`team_resource` = '$careCallStatus',`timeline_colour` = '$careCallStatusColor' 
                WHERE (uryyToeSS4 = '$txtClientId' AND care_calls = '$txtClientCareCall' AND Clientshift_Date = '$txtDateOfVisit' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ORDER BY userId DESC LIMIT 1");
                if ($sqlUpdateRota) {
                    echo "<script>
                            window.history.go(-3);
                        </script>";
                    //header("Location: ./client-visit?uryyToeSS4=$txtClientId");
                }
            }
        } else {
            header("Location: ./invoice-option-error");
        }
    } else if ($txtDontPayCarer) {
        if ($txtInvoice) {
            $queryIns = mysqli_query($conn, "INSERT INTO tbl_cancelled_call (col_client_name, col_care_call, col_client_Id, col_date,  col_time, col_cancellation_by, col_reason, col_pay_status, col_invoice, col_note, col_company_Id) 
            VALUES('" . $txtClientName . "', '" . $txtClientCareCall . "', '" . $txtClientId . "', '" . $txtDateOfVisit . "', '" . $txtTimeOfVisit . "', '" . $txtCancellationby . "', '" . $txtClientReason . "', '" . $txtDontPayCarer . "', '" . $txtInvoice . "', '" . $txtcancelNote . "', '" . $_SESSION['usr_compId'] . "')");
            if ($queryIns) {
                $sqlUpdateRota = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `first_carer` = '$careCallStatus', `first_carer_Id` = '$careCallStatus',`team_resource` = '$careCallStatus',`timeline_colour` = '$careCallStatusColor' 
                WHERE (uryyToeSS4 = '$txtClientId' AND care_calls = '$txtClientCareCall' AND Clientshift_Date = '$txtDateOfVisit' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ORDER BY userId DESC LIMIT 1");
                if ($sqlUpdateRota) {
                    echo "<script>
                            window.history.go(-3);
                        </script>";
                    //header("Location: ./client-visit?uryyToeSS4=$txtClientId");
                }
            }
        } else if ($txtDontInvoice) {
            $queryIns = mysqli_query($conn, "INSERT INTO tbl_cancelled_call (col_client_name, col_care_call, col_client_Id, col_date,  col_time, col_cancellation_by, col_reason, col_pay_status, col_invoice, col_note, col_company_Id) 
            VALUES('" . $txtClientName . "', '" . $txtClientCareCall . "', '" . $txtClientId . "', '" . $txtDateOfVisit . "', '" . $txtTimeOfVisit . "', '" . $txtCancellationby . "', '" . $txtClientReason . "', '" . $txtDontPayCarer . "', '" . $txtDontInvoice . "', '" . $txtcancelNote . "', '" . $_SESSION['usr_compId'] . "')");
            if ($queryIns) {
                $sqlUpdateRota = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `first_carer` = '$careCallStatus', `first_carer_Id` = '$careCallStatus',`team_resource` = '$careCallStatus',`timeline_colour` = '$careCallStatusColor' 
                WHERE (uryyToeSS4 = '$txtClientId' AND care_calls = '$txtClientCareCall' AND Clientshift_Date = '$txtDateOfVisit' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ORDER BY userId DESC LIMIT 1");
                if ($sqlUpdateRota) {
                    echo "<script>
                            window.history.go(-3);
                        </script>";
                    //header("Location: ./client-visit?uryyToeSS4=$txtClientId");
                }
            }
        } else {
            header("Location: ./invoice-option-error");
        }
    } else {
        header("Location: ./pay-option-error");
    }
}
