<?php

if (isset($_POST['btnStatusPermanent'])) {
    include('dbconnections.php');

    $txtClientId = mysqli_real_escape_string($conn, $_POST['txtClientId']);
    $txtCompanyId = mysqli_real_escape_string($conn, $_POST['txtCompanyId']);
    $txtReasonForPermanent = mysqli_real_escape_string($conn, $_POST['txtReasonForPermanent']);
    $txtNoteForPermanent = mysqli_real_escape_string($conn, $_POST['txtNoteForPermanent']);
    $txtStartDate = mysqli_real_escape_string($conn, $_POST['txtStartDate']);
    $txtEndDate = 'TFN';
    /**
     * Defines the color for the 'Hospitalized' client status.
     */
    $txtActive = '';
    /**
     * Defines the color for the 'Hospitalized' client status.
     */
    $txtDeceased = 'rgba(231, 76, 60,1.0)';
    /**
     * Defines the color for the 'On a trip' client status.
     */
    $txtleftservice = 'rgba(142, 68, 173,1.0)';
    /**
     * Defines the color for the 'With family' client status.
     */
    $txtPermanent = 'rgba(52, 31, 151,1.0)';
    /**
     * Defines the color for the 'Other' client status.
     */
    $txtothers = 'rgba(211, 84, 0,1.0)';

    $sql_get_client_details = mysqli_query($conn, "SELECT * FROM tbl_general_client_form WHERE (uryyToeSS4='$txtClientId' 
    AND col_company_Id = '$txtCompanyId') ORDER BY userId DESC LIMIT 1 ");
    $row_get_client_details = mysqli_fetch_array($sql_get_client_details);
    $varClientNames = $row_get_client_details['client_first_name'] . ' ' . $row_get_client_details['client_last_name'];


    if ($txtReasonForPermanent == 'Active') {
        $sql_update_data = mysqli_query($conn, "UPDATE `tbl_client_status_records` SET `col_end_date` = 'Active', `col_active_date` = '$txtStartDate' WHERE (col_client_Id = '$txtClientId' AND col_company_Id = '$txtCompanyId') ORDER BY userId DESC LIMIT 1 ");
        if ($sql_update_data) {
            $update_care_call_status1 = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `rightTo_display` = 'True' WHERE ((Clientshift_Date >= '$txtStartDate') AND uryyToeSS4 = '$txtClientId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
            if ($update_care_call_status1) {
                $update_care_call_status2 = mysqli_query($conn, "UPDATE `tbl_manage_runs` SET `col_right_to_display` = 'True' WHERE uryyToeSS4 = '$txtClientId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ");
                if ($update_care_call_status2) {
                    $update_care_call_status3 = mysqli_query($conn, "UPDATE `tbl_clienttime_calls` SET `col_right_to_display` = 'True' WHERE (uryyToeSS4 = '$txtClientId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                    if ($update_care_call_status3) {
                        header("Location: ./client-details?uryyToeSS4=$txtClientId");
                    }
                }
            }
        }
    } else {
        $reasons = ['Deceased', 'Left Service', 'Permanent', 'Other'];
        if (in_array($txtReasonForPermanent, $reasons)) {
            if ($txtEndDate == TRUE) {
                $sql_insert_date = mysqli_query($conn, "INSERT INTO tbl_client_status_records (col_client_name, col_reason, col_note, col_status_color, col_start_date, col_end_date, col_client_Id, col_company_Id) 
                VALUES('" . $varClientNames . "', '" . $txtReasonForPermanent . "', '" . $txtNoteForPermanent . "', '" . $txtDeceased . "', '" . $txtStartDate . "', '" . $txtEndDate . "', '" . $txtClientId . "', '" . $txtCompanyId . "') ");
                if ($sql_insert_date) {
                    $update_care_call_status1 = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `rightTo_display` = 'False' WHERE ((Clientshift_Date >= '$txtStartDate' AND Clientshift_Date <= '$txtEndDate' OR Clientshift_Date = '$txtStartDate') 
                    AND uryyToeSS4 = '$txtClientId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                    if ($update_care_call_status1) {
                        $update_care_call_status2 = mysqli_query($conn, "UPDATE `tbl_manage_runs` SET `col_right_to_display` = 'False' WHERE uryyToeSS4 = '$txtClientId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ");
                        if ($update_care_call_status2) {
                            $update_care_call_status3 = mysqli_query($conn, "UPDATE `tbl_clienttime_calls` SET `col_right_to_display` = 'False' WHERE (uryyToeSS4 = '$txtClientId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                            if ($update_care_call_status3) {
                                header("Location: ./client-details?uryyToeSS4=$txtClientId");
                            }
                        }
                    }
                }
            } else {
                $sql_insert_date = mysqli_query($conn, "INSERT INTO tbl_client_status_records (col_client_name, col_reason, col_note, col_status_color, col_start_date, col_end_date, col_client_Id, col_company_Id) 
                VALUES('" . $varClientNames . "', '" . $txtReasonForPermanent . "', '" . $txtNoteForTemporary . "', '" . $txtHospitalized . "', '" . $txtStartDate . "', 'TFN', '" . $txtClientId . "', '" . $txtCompanyId . "') ");
                if ($sql_insert_date) {
                    $update_care_call_status1 = mysqli_query($conn, "UPDATE `tbl_schedule_calls` SET `rightTo_display` = 'False' WHERE ((Clientshift_Date >= '$txtStartDate') AND uryyToeSS4 = '$txtClientId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                    if ($update_care_call_status1) {
                        $update_care_call_status2 = mysqli_query($conn, "UPDATE `tbl_manage_runs` SET `col_right_to_display` = 'False' WHERE uryyToeSS4 = '$txtClientId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ");
                        if ($update_care_call_status2) {
                            $update_care_call_status3 = mysqli_query($conn, "UPDATE `tbl_clienttime_calls` SET `col_right_to_display` = 'False' WHERE (uryyToeSS4 = '$txtClientId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                            if ($update_care_call_status3) {
                                header("Location: ./client-details?uryyToeSS4=$txtClientId");
                            }
                        }
                    }
                }
            }
        }
    }
}
