<?php
include('dbconnections.php');
$output = '';

if (isset($_POST["query"])) {
    $search = mysqli_real_escape_string($conn, $_POST["query"]);
    $query = "SELECT * FROM tbl_pay_rate WHERE (col_name LIKE '%" . $search . "%' OR col_service_type LIKE '%" . $search . "%') ";
} else {
    $query = "SELECT * FROM tbl_pay_rate WHERE (col_company_Id = '" . $_SESSION['usr_compId'] . "') ORDER BY col_name ASC ";
}
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    $output .= '
					<table class="table table-striped table-hover mb-0">
                    <thead>
                        <tr>
                            <th>Rate name</th>
                            <th>Last updated at</th>
                            <th>Edit</th>
                        </tr>
                    </thead>';
    while ($trans = mysqli_fetch_array($result)) {
        // $clientDOB = date('d M, Y', strtotime("" . $trans['client_date_of_birth'] . ""));
        $output .= '
			<tr>
            
                                                    <td>
                                                        <div class="d-inline-block align-middle">
                                                            <img src="assets/images/profile/profile-icon.jpg" alt="user image" class="img-radius wid-40 align-top m-r-15">
                                                            <div class="d-inline-block">
                                                                <h6> ' . $trans["col_name"] . '</h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>' . $trans["col_date"] . '</td>
                                                    <td>
                                                    <a style="text-decoration:none;" href="./edit-pay-rate?col_special_Id=' . $trans["col_special_Id"] . '"> 
                                                        <button title="Edit pay rate details" type="button" class="btn btn-primary btn-sm"><i class="feather mr-2 icon-edit"></i></button>
                                                    </a>
                                                    </td>

                                                </tr>
		';
    }
    echo $output;
} else {
    echo 'Data Not Found';
}
