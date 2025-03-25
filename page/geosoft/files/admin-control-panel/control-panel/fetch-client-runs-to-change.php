<?php
include('dbconnections.php');
if (isset($_GET['userId'])) {
    $myUserId = $_GET['userId'];
}
$output = '';

if (isset($_POST["query"])) {
    $search = mysqli_real_escape_string($conn, $_POST["query"]);
    $query = "SELECT * FROM tbl_manage_runs WHERE col_run_name LIKE '%" . $search . "%' OR client_area LIKE '%" . $search . "%' GROUP BY col_run_name ORDER BY userId ASC ";
} else {
    $query = "SELECT * FROM tbl_manage_runs WHERE col_company_Id = '" . $_SESSION['usr_compId'] . "' GROUP BY col_run_name ORDER BY userId ASC ";
}
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    $output .= '<div class="table-responsive">
					<table class="table table-striped table-hover mb-0">
                    <thead>
                        <tr>
                            <th>Run name</th>
                            <th>Town located</th>
                            <th>Decision</th>
                        </tr>
                    </thead>';
    while ($trans = mysqli_fetch_array($result)) {
        $runDateCreated = date('Y-m-d', strtotime("" . $trans['dateTime'] . ""));
        $runTimeCreated = date('H:i', strtotime("" . $trans['dateTime'] . ""));
        $output .= '
			                                    <tr>
                                                    <td>
                                                        <div class="d-inline-block align-middle">
                                                            <div class="d-inline-block">
                                                                <h6> ' . $trans["col_run_name"] . '</h6>
                                                                <p class=" m-b-0" style="padding:3px 0px 3px 10px; border-radius:50px; color:' . $runDateCreated . ';"><strong>' . $trans["dateTime"] . '</strong></p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>' . $trans["client_area"] . '</td>
                                                    <td>
                                                    <form method="post" action="./processing-change-client-run" enctype="multipart/form-data" autocomplete="off">
                                                        <input type="hidden" name="txtRunAreaId" value="' . $trans["run_area_nameId"] . '" />
                                                        <input type="hidden" name="txtClientId" value="' . $_SESSION['myUsersId'] . '" />
                                                        <input type="hidden" name="txtDateChange" value="' . $_SESSION['currentDateRota'] . '" />
                                                        <input type="hidden" name="txtClientRunName" value="' . $trans["col_run_name"] . '" />
                                                        <button style="height:40px;" title="Move client care to this run" name="btnChangeClientRun" type="submit" class="btn btn-info btn-sm"><i class="feather mr-2 icon-user"></i> Attach to this run</button>
                                                    </form>
                                                    </td>
                                                </tr>
                                                        ';
    }
    echo $output;
} else {
    echo 'Data Not Found';
}
