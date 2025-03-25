<script>
    $('#selectAllCheckbox').change(function() {
        $('.checkboxes').prop('checked', $(this).prop('checked'));
    });
</script>
<?php
include('dbconnections.php');

$varGetAllData = 'Select all';
$varCookieCity = $_COOKIE["companyCity"];
if ($varGetAllData == $varCookieCity) {
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Display teams in all city
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $output = '';
    if (isset($_POST["query"])) {
        $search = mysqli_real_escape_string($conn, $_POST["query"]);
        $query = "
        SELECT t1.userId, t1.team_first_name, t1.team_last_name, t1.team_primary_phone, t1.team_poster_code, 
        t1.team_sexuality, t1.team_nationality, t1.team_date_of_birth, t1.team_city, t1.uryyTteamoeSS4, t1.col_company_Id, 
        t2.col_team_condition, t2.col_color_code FROM tbl_general_team_form t1
        LEFT JOIN tbl_team_status t2 
        ON 
            t1.uryyTteamoeSS4 = t2.uryyTteamoeSS4 AND ((CURDATE() BETWEEN t2.col_startDate AND t2.col_endDate AND t2.col_approval = 'Approved') OR (t2.col_startDate <= '$today' 
            AND t2.col_endDate = 'TFN' AND t2.col_approval = 'Approved')) WHERE (t1.team_first_name LIKE '%" . $search . "%' OR t1.team_last_name LIKE '%" . $search . "%') ";
    } else {
        $query = "
        SELECT t1.userId, t1.team_first_name, t1.team_last_name, t1.team_primary_phone, t1.team_poster_code, 
        t1.team_sexuality, t1.team_nationality, t1.team_date_of_birth, t1.team_city, t1.uryyTteamoeSS4, t1.col_company_Id, 
        t2.col_team_condition, t2.col_color_code FROM tbl_general_team_form t1
        LEFT JOIN tbl_team_status t2 
        ON 
            t1.uryyTteamoeSS4 = t2.uryyTteamoeSS4 AND ((CURDATE() BETWEEN t2.col_startDate AND t2.col_endDate AND t2.col_approval = 'Approved') OR (t2.col_startDate <= '$today' 
            AND t2.col_endDate = 'TFN' AND t2.col_approval = 'Approved')) WHERE (t1.col_company_Id = '" . $_SESSION['usr_compId'] . "') ORDER BY t1.team_first_name ASC ";
    }
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $output .= '<div class="table-responsive">
					<table class="table table-striped table-hover mb-0">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="selectAllCheckbox"></th>
                            <th>Name</th>
                            <th>Date of birth</th>
                            <th>Nationality</th>
                            <th>Phone</th>
                            <th>Gender</th>
                            <th class="text-left">City based</th>
                            <th>Profile</th>
                        </tr>
                    </thead>
                    ';
        while ($trans = mysqli_fetch_array($result)) {
            $teamDOB = date('d M, Y', strtotime("" . $trans['team_date_of_birth'] . ""));
            $output .= '
                                                    
                                                    <tr>
                                                    <td><input type="checkbox" class="checkboxes" name="txtSelectedId[]" value="' . $trans["userId"] . '"></td>
                                                    <td>
                                                        <a style="cursor:pointer; text-decoration:none; color:#000;" href="./team-details?uryyTteamoeSS4=' . $trans["uryyTteamoeSS4"] . '">
                                                            <div class="d-inline-block align-middle">
                                                                <img src="assets/images/profile/profile-icon.jpg" alt="user image" class="img-radius wid-40 align-top m-r-15">
                                                                <div class="d-inline-block">
                                                                    <h6>' . $trans["team_first_name"] . '  ' . $trans["team_last_name"] . '</h6>
                                                                    <p class="m-b-0" style="color:white; padding:3px 10px 3px 10px; border-radius:50px; color:' . $trans["col_color_code"] . ';"><strong>' . $trans["col_team_condition"] . '</strong></p>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </td>
                                                    <td>' . $teamDOB . '</td>
                                                    <td>' . $trans["team_nationality"] . '</td>
                                                    <td>0' . $trans["team_primary_phone"] . '</td>
                                                    <td>' . $trans["team_sexuality"] . '</td>
                                                    <td>' . $trans["team_city"] . '</td>
                                                    <td>
                                                    <a href="./team-details?uryyTteamoeSS4=' . $trans["uryyTteamoeSS4"] . '"><button title="View carer profile" type="button" class="btn btn-info btn-sm"><i class="feather mr-2 icon-eye"></i></button></a>
                                                    </td>
                                                </tr>
		';
        }
        echo $output;
    } else {
        echo 'Data Not Found';
    }
} else {
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Display teams in selected city
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $output = '';
    if (isset($_POST["query"])) {
        $search = mysqli_real_escape_string($conn, $_POST["query"]);
        $query = "
        SELECT t1.userId, t1.team_first_name, t1.team_last_name, t1.team_primary_phone, t1.team_poster_code, 
        t1.team_sexuality, t1.team_nationality, t1.team_date_of_birth, t1.team_city, t1.uryyTteamoeSS4, t1.col_company_Id, 
        t2.col_team_condition, t2.col_color_code FROM tbl_general_team_form t1
        LEFT JOIN tbl_team_status t2 
        ON 
            t1.uryyTteamoeSS4 = t2.uryyTteamoeSS4 AND ((CURDATE() BETWEEN t2.col_startDate AND t2.col_endDate AND t2.col_approval = 'Approved') OR (t2.col_startDate <= '$today' 
            AND t2.col_endDate = 'TFN' AND t2.col_approval = 'Approved')) WHERE (t1.col_company_city = '" . $_COOKIE["companyCity"] . "' AND t1.team_first_name LIKE '%" . $search . "%' OR t1.team_last_name LIKE '%" . $search . "%') ";
    } else {
        $query = "
        SELECT t1.userId, t1.team_first_name, t1.team_last_name, t1.team_primary_phone, t1.team_poster_code, 
        t1.team_sexuality, t1.team_nationality, t1.team_date_of_birth, t1.team_city, t1.uryyTteamoeSS4, t1.col_company_Id, 
        t2.col_team_condition, t2.col_color_code FROM tbl_general_team_form t1
        LEFT JOIN tbl_team_status t2 
        ON 
            t1.uryyTteamoeSS4 = t2.uryyTteamoeSS4 AND ((CURDATE() BETWEEN t2.col_startDate AND t2.col_endDate AND t2.col_approval = 'Approved') OR (t2.col_startDate <= '$today' 
            AND t2.col_endDate = 'TFN' AND t2.col_approval = 'Approved')) WHERE (t1.col_company_city = '" . $_COOKIE["companyCity"] . "' AND t1.col_company_Id = '" . $_SESSION['usr_compId'] . "') ORDER BY t1.team_first_name ASC ";
    }
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $output .= '<div class="table-responsive">
					<table class="table table-striped table-hover mb-0">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="selectAllCheckbox"></th>
                            <th>Name</th>
                            <th>Date of birth</th>
                            <th>Nationality</th>
                            <th>Phone</th>
                            <th>Gender</th>
                            <th class="text-left">City based</th>
                            <th>Profile</th>
                        </tr>
                    </thead>
                    ';
        while ($trans = mysqli_fetch_array($result)) {
            $teamDOB = date('d M, Y', strtotime("" . $trans['team_date_of_birth'] . ""));
            $output .= '
                                                    
                                                    <tr>
                                                    <td><input type="checkbox" class="checkboxes" name="txtSelectedId[]" value="' . $trans["userId"] . '"></td>
                                                    <td>
                                                        <a style="cursor:pointer; text-decoration:none; color:#000;" href="./team-details?uryyTteamoeSS4=' . $trans["uryyTteamoeSS4"] . '">
                                                            <div class="d-inline-block align-middle">
                                                                <img src="assets/images/profile/profile-icon.jpg" alt="user image" class="img-radius wid-40 align-top m-r-15">
                                                                <div class="d-inline-block">
                                                                    <h6>' . $trans["team_first_name"] . '  ' . $trans["team_last_name"] . '</h6>
                                                                    <p class="m-b-0" style="color:white; padding:3px 10px 3px 10px; border-radius:50px; color:' . $trans["col_color_code"] . ';"><strong>' . $trans["col_team_condition"] . '</strong></p>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </td>
                                                    <td>' . $teamDOB . '</td>
                                                    <td>' . $trans["team_nationality"] . '</td>
                                                    <td>0' . $trans["team_primary_phone"] . '</td>
                                                    <td>' . $trans["team_sexuality"] . '</td>
                                                    <td>' . $trans["team_city"] . '</td>
                                                    <td>
                                                    <a href="./team-details?uryyTteamoeSS4=' . $trans["uryyTteamoeSS4"] . '"><button title="View carer profile" type="button" class="btn btn-info btn-sm"><i class="feather mr-2 icon-eye"></i></button></a>
                                                    </td>

                                                </tr>
		';
        }
        echo $output;
    } else {
        echo 'Data Not Found';
    }
}
