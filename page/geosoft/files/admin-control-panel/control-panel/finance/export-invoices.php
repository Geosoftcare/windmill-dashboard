<?php

if (isset($_POST['btnExportInvoices'])) {
    include_once 'dbconnections.php';

    if (!empty($_POST['selected_ids'])) {

        $selected_ids = $_POST['selected_ids'];
        $ids = implode(",", $selected_ids);

        // Query to fetch selected rows
        $sql_get_selected_data = $conn->query("SELECT userId,col_payer,col_care_recipient,col_invoice_start_date,col_invoice_end_date FROM tbl_invoices WHERE (userId IN($ids) AND `col_company_Id` = '" . $_SESSION['usr_compId'] . "') GROUP BY col_client_Id");
        if ($sql_get_selected_data->num_rows > 0) {

            $delimiter = ",";

            // Prepare CSV output
            $output = fopen('php://output', 'w');
            $fields = array('INVOICE#', 'PAYER NAME', 'PERIOD START', 'PERIOD END', 'CARE RECIPIENT', 'EXPENSES', 'CARE DELIVERY', 'FEES', 'TOTAL'); // CSV header
            fputcsv($output, $fields, $delimiter);

            // Loop through data and write to CSV
            while ($row_selected_data = $sql_get_selected_data->fetch_assoc()) {

                $varStartDate = $row_selected_data['col_invoice_start_date'];
                $varEndDate = $row_selected_data['col_invoice_end_date'];
                $varUserId = $row_selected_data['userId'];
                $varInvoiceId = '00' . $row_selected_data['userId'];

                $varExpenses = '0.00';
                $varFees = '0.00';

                $sql_total_balance = mysqli_query($conn, "SELECT SUM(`col_payer_rate`) AS total_payment FROM `tbl_invoices` WHERE ((col_invoice_start_date >= '$varStartDate' AND col_invoice_end_date <= '$varEndDate') AND userId = '$varUserId' AND `col_company_Id` = '" . $_SESSION['usr_compId'] . "') ");
                $row_total_balance = mysqli_fetch_array($sql_total_balance, MYSQLI_ASSOC);
                $varTotalCareDelivery = number_format((float)$row_total_balance['total_payment'], 2, '.', '');
                $varTotal = $varTotalCareDelivery + $varExpenses;

                $lineData = array("" . $varInvoiceId . "#", $row_selected_data['col_payer'], $varStartDate, $varEndDate, $row_selected_data['col_care_recipient'], $varExpenses, $varTotalCareDelivery, $varFees, $varTotal);
                fputcsv($output, $lineData, $delimiter);
            }

            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename=Invoices_' . date('Y-m-d') . '.csv');
            header('Pragma: no-cache');
            header('Expires: 0');
            //output all remaining data on a file pointer 
            fpassthru($output);
        }
    } else {
        echo "No rows selected.";
    }
}
