<?php
if (isset($_POST['btnTeamStatus'])) {
    include('dbconnection-string.php');

    $txttCarerName =  mysqli_real_escape_string($conn, $_POST['txttCarerName']);
    $txtCarerId =  mysqli_real_escape_string($conn, $_POST['txtCarerId']);
    $txttCompanyId =  mysqli_real_escape_string($conn, $_POST['txttCompanyId']);

    $txtStartDate =  mysqli_real_escape_string($conn, $_POST['txtStartDate']);
    $txtEndDate =  mysqli_real_escape_string($conn, $_POST['txtEndDate']);
    $txtTeamStatus =  mysqli_real_escape_string($conn, $_POST['txtTeamStatus']);
    $statusColor = 'rgba(231, 76, 60,1.0)';
    $varActiveColor = 'rgba(33, 150, 243,1.0)';
    $txtLeaveStatus = 'Awaiting approval';
    $txtIsRead = 'False';
    $txtcolorCode = '#bdc3c7';
    $txtNote =  mysqli_real_escape_string($conn, $_POST['txtNote']);

    $MyInsertQuery = mysqli_query($conn, "INSERT INTO tbl_team_status (`col_full_name`, `col_startDate`, `col_endDate`, `col_team_condition`, `col_note`, `col_approval`, `col_is_read`, `col_color_code`, `uryyTteamoeSS4`, `col_company_Id`) 
    VALUES('" . $txttCarerName . "', '" . $txtStartDate . "', '" . $txtEndDate . "', '" . $txtTeamStatus . "', '" . $txtNote . "', '" . $txtLeaveStatus . "', '" . $txtIsRead . "', '" . $txtcolorCode . "', '" . $txtCarerId . "', '$txttCompanyId')");
    if ($MyInsertQuery) {
        header("Location: ./availability");
    }
}
