<?php
include('dbconnections.php');
$output = '';

if (isset($_POST["query"])) {
    $search = mysqli_real_escape_string($conn, $_POST["query"]);
    $query = "SELECT * FROM tbl_clienttime_calls WHERE (dateTime_in !='' AND dateTime_in !='Null' AND dateTime_out !='' AND col_right_to_display ='True' AND client_area = '" . $_SESSION['run_town'] . "' AND client_name LIKE '%" . $search . "%' OR client_area LIKE '%" . $search . "%') ";
} else {
    $query = "SELECT * FROM tbl_clienttime_calls WHERE (dateTime_in !='' AND dateTime_in !='Null' AND dateTime_out !='' AND col_right_to_display ='True' AND client_area = '" . $_SESSION['run_town'] . "' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ORDER BY userId ASC ";
}
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    $output .= '<div class="table-responsive">
					<table class="table table-striped table-hover mb-0">
                    <thead>
                        <tr>
                            <th>Client Name</th>
                            <th>Town located</th>
                            <th>Care calls</th>
                            <th>Call time in</th>
                            <th>Call time out</th>
                            <th>Add run</th>
                        </tr>
                    </thead>';
    while ($trans = mysqli_fetch_array($result)) {
        $output .= '
			<tr>
            
                                                  
                                                    <td>
                                                        <div class="d-inline-block align-middle">
                                                            <div class="d-inline-block">
                                                                <h6> ' . $trans["client_name"] . '</h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>' . $trans["client_area"] . '</td>
                                                    <td>' . $trans["care_calls"] . '</td>
                                                    <td>' . $trans["dateTime_in"] . '</td>
                                                    <td>' . $trans["dateTime_out"] . '</td>
                                                    <td>
                                                    <form method="post" action="./processing-attach-client-run" enctype="multipart/form-data" autocomplete="off">
                                                        <input type="hidden" value="' . $trans["userId"] . '" name="txtReturnDefault" />
                                                        <input type="hidden" value="' . $_SESSION['run_name'] . '" name="txtrunName" />
                                                        <input type="hidden" value="' . $trans["uryyToeSS4"] . '" name="txtAllClientIds" />
                                                        <input type="hidden" value="' . $trans["care_calls"] . '" name="txtAllClientCalls" />
                                                        <input type="hidden" value="' . $_SESSION['run_Id'] . '" name="txtAllRunsId" />
                                                        <input type="hidden" value="' . $_SESSION['run_city'] . '" name="txtAllRunCity" />
                                                        <input type="hidden" value="' . $trans["col_required_carers"]  . '" name="txtextRequiredCarers" />
                                                        <input type="hidden" value="' . $trans["col_startDate"]  . '" name="txtStartDate" />
                                                        <input type="hidden" value="' . $trans["col_endDate"]  . '" name="txtendDate" />
                                                        <input type="hidden" value="' . $trans["col_occurence"] . '" name="txtOccurence" />
                                                        <input type="hidden" value="' . $trans["col_period_one"] . '" name="txtPeriodOne" />
                                                        <input type="hidden" value="' . $trans["col_period_two"] . '" name="txtPeriodTwo" />
                                                        <input type="hidden" value="' . $trans["col_right_to_display"] . '" name="txtRightToDisplay" />
                                                        <input type="hidden" value="' . $_SESSION["usr_compId"] . '" name="txtRunCompanyId" />
                                                        <button style="height:40px;" title="Add care call" name="btnAddToGroup" type="submit" class="btn btn-info btn-sm"><i class="feather mr-2 icon-briefcase"></i> Add +</button>
                                                    </form>
                                                    </td>

                                                </tr>
		';
    }
    echo $output;
} else {
    echo 'Data Not Found';
}
