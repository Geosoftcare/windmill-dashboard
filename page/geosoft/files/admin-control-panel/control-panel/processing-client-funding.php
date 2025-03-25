<?php

if (isset($_POST['btnSaveClientFunding'])) {
    include('dbconnections.php');

    $txtClientFullName = mysqli_real_escape_string($conn, $_REQUEST['txtClientFullName']);
    $txtClientId = mysqli_real_escape_string($conn, $_REQUEST['txtClientId']);


    $txtLAFunding = mysqli_real_escape_string($conn, $_REQUEST['txtLAFunding']);
    $txtPrivateFunding = mysqli_real_escape_string($conn, $_REQUEST['txtPrivateFunding']);
    $txtNHSFunding = mysqli_real_escape_string($conn, $_REQUEST['txtNHSFunding']);
    $txtOrderFunding = mysqli_real_escape_string($conn, $_REQUEST['txtOrderFunding']);


    $txtLocalAuthority = mysqli_real_escape_string($conn, $_REQUEST['txtLocalAuthority']);
    $txtCompanyId = mysqli_real_escape_string($conn, $_REQUEST['txtCompanyId']);

    if ($txtLAFunding == true) {
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $sql_get_contract_details = mysqli_query($conn, "SELECT * FROM `tbl_contract` WHERE (col_invoice_format = '$txtLAFunding' AND `col_company_Id` = '" . $_SESSION['usr_compId'] . "') ");
        $row_get_contract_details = mysqli_fetch_array($sql_get_contract_details, MYSQLI_ASSOC);
        $varGetPayer = $row_get_contract_details['col_payer'];
        $varGetRateCard = $row_get_contract_details['col_rate_card'];

        $sql_check_funding = mysqli_query($conn, "SELECT * FROM `tbl_funding` WHERE (col_invoice_format = '$txtLAFunding' AND uryyToeSS4 = '$uryyToeSS4' AND `col_company_Id` = '" . $_SESSION['usr_compId'] . "')");
        $row_check_funding = mysqli_fetch_array($sql_check_funding, MYSQLI_ASSOC);
        $count_check_funding = mysqli_num_rows($sql_check_funding);
        if ($count_check_funding != 0) {
            $sql_update_funding = mysqli_query($conn, "UPDATE `tbl_funding` SET `col_payer` = '$varGetPayer', `col_pay_rate` = '$varGetRateCard', `col_invoice_format` = '$txtLAFunding', `col_local_auth` = '$txtLocalAuthority' 
            WHERE (col_invoice_format = '$txtLAFunding' AND uryyToeSS4 = '$uryyToeSS4' AND `col_company_Id` = '" . $_SESSION['usr_compId'] . "') ");
            if ($sql_update_funding) {
                header("Location: ./client-funding?uryyToeSS4=$txtClientId");
            }
        } else {
            $sql_insert_funding = mysqli_query($conn, "INSERT INTO tbl_funding (col_client_name, uryyToeSS4, col_payer, col_pay_rate, col_invoice_format, col_local_auth, col_company_Id) 
            VALUES('" . $txtClientFullName . "', '" . $txtClientId . "', '" . $varGetPayer . "', '" . $varGetRateCard . "', '" . $txtLAFunding . "', '" . $txtLocalAuthority . "', '" . $txtCompanyId . "') ");
            if ($sql_insert_funding) {
                header("Location: ./client-funding?uryyToeSS4=$txtClientId");
            }
        }
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    } else if ($txtPrivateFunding == true) {
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $sql_get_contract_details = mysqli_query($conn, "SELECT * FROM `tbl_contract` WHERE (col_invoice_format = '$txtPrivateFunding' AND `col_company_Id` = '" . $_SESSION['usr_compId'] . "') ");
        $row_get_contract_details = mysqli_fetch_array($sql_get_contract_details, MYSQLI_ASSOC);
        $varGetPayer = $row_get_contract_details['col_payer'];
        $varGetRateCard = $row_get_contract_details['col_rate_card'];

        $sql_check_funding = mysqli_query($conn, "SELECT * FROM `tbl_funding` WHERE (col_invoice_format = '$txtPrivateFunding' AND uryyToeSS4 = '$uryyToeSS4' AND `col_company_Id` = '" . $_SESSION['usr_compId'] . "')");
        $row_check_funding = mysqli_fetch_array($sql_check_funding, MYSQLI_ASSOC);
        $count_check_funding = mysqli_num_rows($sql_check_funding);
        if ($count_check_funding != 0) {
            $sql_update_funding = mysqli_query($conn, "UPDATE `tbl_funding` SET `col_payer` = '$varGetPayer', `col_pay_rate` = '$varGetRateCard', `col_invoice_format` = '$txtPrivateFunding', `col_local_auth` = '$txtLocalAuthority' 
            WHERE (col_invoice_format = '$txtPrivateFunding' AND uryyToeSS4 = '$uryyToeSS4' AND `col_company_Id` = '" . $_SESSION['usr_compId'] . "') ");
            if ($sql_update_funding) {
                header("Location: ./client-funding?uryyToeSS4=$txtClientId");
            }
        } else {
            $sql_insert_funding = mysqli_query($conn, "INSERT INTO tbl_funding (col_client_name, uryyToeSS4, col_payer, col_pay_rate, col_invoice_format, col_local_auth, col_company_Id) 
            VALUES('" . $txtClientFullName . "', '" . $txtClientId . "', '" . $varGetPayer . "', '" . $varGetRateCard . "', '" . $txtPrivateFunding . "', '" . $txtLocalAuthority . "', '" . $txtCompanyId . "') ");
            if ($sql_insert_funding) {
                header("Location: ./client-funding?uryyToeSS4=$txtClientId");
            }
        }
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    } else if ($txtNHSFunding == true) {
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $sql_get_contract_details = mysqli_query($conn, "SELECT * FROM `tbl_contract` WHERE (col_invoice_format = '$txtNHSFunding' AND `col_company_Id` = '" . $_SESSION['usr_compId'] . "') ");
        $row_get_contract_details = mysqli_fetch_array($sql_get_contract_details, MYSQLI_ASSOC);
        $varGetPayer = $row_get_contract_details['col_payer'];
        $varGetRateCard = $row_get_contract_details['col_rate_card'];

        $sql_check_funding = mysqli_query($conn, "SELECT * FROM `tbl_funding` WHERE (col_invoice_format = '$txtNHSFunding' AND uryyToeSS4 = '$uryyToeSS4' AND `col_company_Id` = '" . $_SESSION['usr_compId'] . "')");
        $row_check_funding = mysqli_fetch_array($sql_check_funding, MYSQLI_ASSOC);
        $count_check_funding = mysqli_num_rows($sql_check_funding);
        if ($count_check_funding != 0) {
            $sql_update_funding = mysqli_query($conn, "UPDATE `tbl_funding` SET `col_payer` = '$varGetPayer', `col_pay_rate` = '$varGetRateCard', `col_invoice_format` = '$txtNHSFunding', `col_local_auth` = '$txtLocalAuthority' 
            WHERE (col_invoice_format = '$txtNHSFunding' AND uryyToeSS4 = '$uryyToeSS4' AND `col_company_Id` = '" . $_SESSION['usr_compId'] . "') ");
            if ($sql_update_funding) {
                header("Location: ./client-funding?uryyToeSS4=$txtClientId");
            }
        } else {
            $sql_insert_funding = mysqli_query($conn, "INSERT INTO tbl_funding (col_client_name, uryyToeSS4, col_payer, col_pay_rate, col_invoice_format, col_local_auth, col_company_Id) 
            VALUES('" . $txtClientFullName . "', '" . $txtClientId . "', '" . $varGetPayer . "', '" . $varGetRateCard . "', '" . $txtNHSFunding . "', '" . $txtLocalAuthority . "', '" . $txtCompanyId . "') ");
            if ($sql_insert_funding) {
                header("Location: ./client-funding?uryyToeSS4=$txtClientId");
            }
        }
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    } else if ($txtOrderFunding == true) {
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $sql_get_contract_details = mysqli_query($conn, "SELECT * FROM `tbl_contract` WHERE (col_invoice_format = '$txtOrderFunding' AND `col_company_Id` = '" . $_SESSION['usr_compId'] . "') ");
        $row_get_contract_details = mysqli_fetch_array($sql_get_contract_details, MYSQLI_ASSOC);
        $varGetPayer = $row_get_contract_details['col_payer'];
        $varGetRateCard = $row_get_contract_details['col_rate_card'];

        $sql_check_funding = mysqli_query($conn, "SELECT * FROM `tbl_funding` WHERE (col_invoice_format = '$txtOrderFunding' AND uryyToeSS4 = '$uryyToeSS4' AND `col_company_Id` = '" . $_SESSION['usr_compId'] . "')");
        $row_check_funding = mysqli_fetch_array($sql_check_funding, MYSQLI_ASSOC);
        $count_check_funding = mysqli_num_rows($sql_check_funding);
        if ($count_check_funding != 0) {
            $sql_update_funding = mysqli_query($conn, "UPDATE `tbl_funding` SET `col_payer` = '$varGetPayer', `col_pay_rate` = '$varGetRateCard', `col_invoice_format` = '$txtOrderFunding', `col_local_auth` = '$txtLocalAuthority' 
            WHERE (col_invoice_format = '$txtOrderFunding' AND uryyToeSS4 = '$uryyToeSS4' AND `col_company_Id` = '" . $_SESSION['usr_compId'] . "') ");
            if ($sql_update_funding) {
                header("Location: ./client-funding?uryyToeSS4=$txtClientId");
            }
        } else {
            $sql_insert_funding = mysqli_query($conn, "INSERT INTO tbl_funding (col_client_name, uryyToeSS4, col_payer, col_pay_rate, col_invoice_format, col_local_auth, col_company_Id) 
            VALUES('" . $txtClientFullName . "', '" . $txtClientId . "', '" . $varGetPayer . "', '" . $varGetRateCard . "', '" . $txtOrderFunding . "', '" . $txtLocalAuthority . "', '" . $txtCompanyId . "') ");
            if ($sql_insert_funding) {
                header("Location: ./client-funding?uryyToeSS4=$txtClientId");
            }
        }
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    } else {
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        header("Location: ./error-page");
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    }
}
