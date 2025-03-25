<?php
include('dbconnections.php');
$output = '';

if (isset($_POST["query"])) {
    $search = mysqli_real_escape_string($conn, $_POST["query"]);
    $query = "SELECT * FROM tbl_invoice_rate WHERE (col_name LIKE '%" . $search . "%') ";
} else {
    $query = "SELECT * FROM tbl_invoice_rate WHERE (col_company_Id = '" . $_SESSION['usr_compId'] . "') ORDER BY col_name ASC ";
}
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    $output .= '
					<table class="table table-striped table-hover mb-0">
                    <thead>
                        <tr>
                            <th>Rate name</th>
                            <th>Last updated at</th>
                            <th>View</th>
                        </tr>
                    </thead>';
    while ($trans = mysqli_fetch_array($result)) {
        $varInvoiceDate = date('d M, Y', strtotime("" . $trans['col_date'] . ""));
        $output .= '
			<tr>
            
                                                    <td>
                                                        <div class="d-inline-block align-middle">
                                                            <div class="d-inline-block">
                                                                <h6> ' . $trans["col_name"] . '</h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>' . $varInvoiceDate . '</td>
                                                    <td>
                                                    <a style="text-decoration:none;" href="./invoicing-rate?col_special_Id=' . $trans["col_special_Id"] . '">
                                                        <button title="View invoice rate" type="button" class="btn btn-primary btn-sm"><i class="feather mr-2 icon-eye"></i></button>
                                                    </a>
                                                    </td>

                                                </tr>
		';
    }
    echo $output;
} else {
    echo 'Data Not Found';
}
