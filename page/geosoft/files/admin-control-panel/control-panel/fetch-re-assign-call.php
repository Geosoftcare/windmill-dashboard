<?php
include('dbconnections.php');
if (isset($_GET['run_area_nameId'])) {
    $run_area_nameId = $_GET['run_area_nameId'];
}
$varGetAllData = 'Select all';
$varCookieCity = $_COOKIE["companyCity"];
if ($varGetAllData == $varCookieCity) {
    $output = '';
    if (isset($_POST["query"])) {
        $search = mysqli_real_escape_string($conn, $_POST["query"]);
        $query = "SELECT * FROM tbl_general_team_form WHERE (team_first_name LIKE '%" . $search . "%' OR team_last_name LIKE '%" . $search . "%') ";
    } else {
        $query = "SELECT * FROM tbl_general_team_form WHERE (col_company_Id = '" . $_SESSION['usr_compId'] . "') ORDER BY team_first_name ASC ";
    }
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $output .= '<div class="table-responsive">
					<table class="table table-striped table-hover mb-0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Date of birth</th>
                            <th>Nationality</th>
                            <th>Phone</th>
                            <th>Assign run</th>
                        </tr>
                    </thead>
                    ';
        while ($trans = mysqli_fetch_array($result)) {
            $teamDOB = date('d M, Y', strtotime("" . $trans['team_date_of_birth'] . ""));
            $output .= '
                                                
                                                    <tr>
                                                    <td>
                                                        <div class="d-inline-block align-middle">
                                                            <img src="assets/images/profile/profile-icon.jpg" alt="user image" class="img-radius wid-40 align-top m-r-15">
                                                            <div class="d-inline-block">
                                                                <h6>' . $trans["team_first_name"] . '  ' . $trans["team_last_name"] . '</h6>
                                                                <p class="m-b-0" style="color:white; padding:3px 10px 3px 10px; border-radius:50px; color:' . $trans["TeamStatuscolors"] . ';"><strong>' . $trans["team_status"] . '</strong></p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>' . $teamDOB . '</td>
                                                    <td>' . $trans["team_nationality"] . '</td>
                                                    <td>' . $trans["team_primary_phone"] . '</td>
                                                    <td>
                                                    <form method="post" action="./processing-re-assign-call" enctype="multipart/form-data" autocomplete="off">
                                                        <input type="hidden" name="txtCarerName" value="' . $trans["team_first_name"] . ' ' . $trans["team_last_name"] . '" />
                                                        <input type="hidden" name="txtCarerId" value="' . $trans["uryyTteamoeSS4"] . '" />
                                                        <input type="hidden" name="txtCarerResources" value="' . $trans["col_team_resource"] . '" />
                                                        <input type="hidden" name="txtShiftDate" value="' . $_SESSION["currentDateRota"] . '" />
                                                        <input type="hidden" name="txtCareCalls" value="' . $_SESSION['client_care_call'] . '" />
                                                        <input type="hidden" name="txtRotaDateInDay" value="' . $_SESSION['currentRotaDay'] . '" />
                                                        <input type="hidden" value="02c<?php echo $id; ?>" name="carecallID" />
                                                        <input type="hidden" name="txtClientSpecId" value="' . $_SESSION['get_client_Spec_Id'] . '" />
                                                        <input type="hidden" value="firstAttemptone<?php echo $id; ?>" name="firstAttempId" />
                                                        <button style="height:40px;" title="View carer profile" name="btnScheduleRuns" type="submit" class="btn btn-info btn-sm"><i class="feather mr-2 icon-briefcase"></i> Assign run</button>
                                                    </form>
                                                    </td>
                                                </tr>
		';
        }
        echo $output;
    } else {
        echo 'Data Not Found';
    }
} else {
    $output = '';
    if (isset($_POST["query"])) {
        $search = mysqli_real_escape_string($conn, $_POST["query"]);
        $query = "SELECT * FROM tbl_general_team_form WHERE (col_company_city = '" . $_COOKIE["companyCity"] . "' AND team_first_name LIKE '%" . $search . "%' OR team_last_name LIKE '%" . $search . "%') ";
    } else {
        $query = "SELECT * FROM tbl_general_team_form WHERE (col_company_city = '" . $_COOKIE["companyCity"] . "' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ORDER BY team_first_name ASC ";
    }
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $output .= '<div class="table-responsive">
					<table class="table table-striped table-hover mb-0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Date of birth</th>
                            <th>Nationality</th>
                            <th>Phone</th>
                            <th>Assign run</th>
                        </tr>
                    </thead>
                    ';
        while ($trans = mysqli_fetch_array($result)) {
            $teamDOB = date('d M, Y', strtotime("" . $trans['team_date_of_birth'] . ""));
            $output .= '
                                                
                                                    <tr>
                                                    <td>
                                                        <div class="d-inline-block align-middle">
                                                            <img src="assets/images/profile/profile-icon.jpg" alt="user image" class="img-radius wid-40 align-top m-r-15">
                                                            <div class="d-inline-block">
                                                                <h6>' . $trans["team_first_name"] . '  ' . $trans["team_last_name"] . '</h6>
                                                                <p class="m-b-0" style="color:white; padding:3px 10px 3px 10px; border-radius:50px; color:' . $trans["TeamStatuscolors"] . ';"><strong>' . $trans["team_status"] . '</strong></p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>' . $teamDOB . '</td>
                                                    <td>' . $trans["team_nationality"] . '</td>
                                                    <td>' . $trans["team_primary_phone"] . '</td>
                                                    <td>
                                                    <form method="post" action="./processing-re-assign-call" enctype="multipart/form-data" autocomplete="off">
                                                        <input type="hidden" name="txtCarerName" value="' . $trans["team_first_name"] . ' ' . $trans["team_last_name"] . '" />
                                                        <input type="hidden" name="txtCarerId" value="' . $trans["uryyTteamoeSS4"] . '" />
                                                        <input type="hidden" name="txtCarerResources" value="' . $trans["col_team_resource"] . '" />
                                                        <input type="hidden" name="txtShiftDate" value="' . $_SESSION["currentDateRota"] . '" />
                                                        <input type="hidden" name="txtCareCalls" value="' . $_SESSION['client_care_call'] . '" />
                                                        <input type="hidden" name="txtRotaDateInDay" value="' . $_SESSION['currentRotaDay'] . '" />
                                                        <input type="hidden" value="02c<?php echo $id; ?>" name="carecallID" />
                                                        <input type="hidden" name="txtClientSpecId" value="' . $_SESSION['get_client_Spec_Id'] . '" />
                                                        <input type="hidden" value="firstAttemptone<?php echo $id; ?>" name="firstAttempId" />
                                                        <button style="height:40px;" title="View carer profile" name="btnScheduleRuns" type="submit" class="btn btn-info btn-sm"><i class="feather mr-2 icon-briefcase"></i> Assign run</button>
                                                    </form>
                                                    </td>
                                                </tr>
		';
        }
        echo $output;
    } else {
        echo 'Data Not Found';
    }
}
