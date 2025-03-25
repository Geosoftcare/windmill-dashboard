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
    //Display clients in all city
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $output = '';
    if (isset($_POST["query"])) {
        $search = mysqli_real_escape_string($conn, $_POST["query"]);
        $query = "
        SELECT t1.userId, t1.client_first_name, t1.client_last_name, t1.client_primary_phone, t1.client_poster_code, 
        t1.client_sexuality, t1.client_preferred_name, t1.client_date_of_birth, t1.client_area, t1.uryyToeSS4, t1.col_company_Id, t2.col_reason, t2.col_status_color 
        FROM tbl_general_client_form t1
        LEFT JOIN tbl_client_status_records t2 
        ON 
            t1.uryyToeSS4 = t2.col_client_Id AND ((CURDATE() BETWEEN t2.col_start_date AND t2.col_end_date) OR (t2.col_start_date <= '$today' 
            AND t2.col_end_date = 'TFN')) WHERE (t1.client_first_name LIKE '%" . $search . "%' OR t1.client_last_name LIKE '%" . $search . "%')";
    } else {
        $query = "
        SELECT t1.userId, t1.client_first_name, t1.client_last_name, t1.client_primary_phone, t1.client_poster_code, 
        t1.client_sexuality, t1.client_preferred_name, t1.client_date_of_birth, t1.client_area, t1.uryyToeSS4, t1.col_company_Id, t2.col_reason, t2.col_status_color 
        FROM tbl_general_client_form t1
        LEFT JOIN tbl_client_status_records t2 
        ON 
            t1.uryyToeSS4 = t2.col_client_Id AND ((CURDATE() BETWEEN t2.col_start_date AND t2.col_end_date) OR (t2.col_start_date <= '$today' 
            AND t2.col_end_date = 'TFN')) WHERE (t1.col_company_Id = '" . $_SESSION['usr_compId'] . "') ORDER BY t1.client_first_name ASC;
        ";
    }
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $output .= '<div class="table-responsive">
                        <table class="table table-striped table-hover mb-0">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="selectAllCheckbox"></th>
                                <th>Name</th>
                                <th>Primary phone</th>
                                <th>Groups</th>
                                <th>Date of birth</th>
                                <th>Post code</th>
                                <th>Gender</th>
                                <th class=" text-left">Preferred name</th>
                                <th>Profile</th>
                            </tr> 
                        </thead>';
        while ($trans = mysqli_fetch_array($result)) {
            $clientDOB = date('d M, Y', strtotime("" . $trans['client_date_of_birth'] . ""));
            $output .= '
                <tr>
                
                                                        <td><input type="checkbox" class="checkboxes" name="txtSelectedId[]" value="' . $trans["userId"] . '"></td>
                                                        <td>
                                                            <a style="cursor:pointer; text-decoration:none; color:#000;" href="./client-details?uryyToeSS4=' . $trans["uryyToeSS4"] . '">
                                                                <div class="d-inline-block align-middle">
                                                                    <img src="assets/images/profile/profile-icon.jpg" alt="user image" class="img-radius wid-40 align-top m-r-15">
                                                                    <div class="d-inline-block">
                                                                        <h6> ' . $trans["client_first_name"] . '  ' . $trans["client_last_name"] . '</h6>
                                                                        <p class=" m-b-0" style="padding:3px 0px 3px 10px; border-radius:50px; color:' . $trans["col_status_color"] . ';"><strong>' . $trans["col_reason"] . '</strong></p>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </td>
                                                        <td>0' . $trans["client_primary_phone"] . '</td>
                                                        <td>' . $trans["client_area"] . '</td>
                                                        <td>' . $clientDOB . '</td>
                                                        <td>' . $trans["client_poster_code"] . '</td>
                                                        <td>' . $trans["client_sexuality"] . '</td>
                                                        <td>' . $trans["client_preferred_name"] . '</td>
                                                        <td>
                                                        <a style="text-decoration:none;" href="./client-task?uryyToeSS4=' . $trans["uryyToeSS4"] . '"> <button title="View client task" type="button" class="btn  btn-primary btn-sm"><i class="feather mr-2 icon-list"></i></button> </a>
                                                        <a style="text-decoration:none;" href="./client-medication?uryyToeSS4=' . $trans["uryyToeSS4"] . '"> <button title="View client medication" type="button" class="btn  btn-danger btn-sm"> <i class="feather mr-2 icon-heart"></i></button> </a>
                                                        <a style="text-decoration:none;" href="./client-details?uryyToeSS4=' . $trans["uryyToeSS4"] . '"><button title="View client details" type="button" class="btn btn-info btn-sm"> <i class="feather mr-2 icon-eye"></i></button></a>
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
    //Display clients in selected city
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $output = '';
    if (isset($_POST["query"])) {
        $search = mysqli_real_escape_string($conn, $_POST["query"]);
        $query = "
        SELECT t1.userId, t1.client_first_name, t1.client_last_name, t1.client_primary_phone, t1.client_poster_code, t1.client_city, 
        t1.client_sexuality, t1.client_preferred_name, t1.client_date_of_birth, t1.client_area, t1.uryyToeSS4, t1.col_company_Id, t2.col_reason, t2.col_status_color 
        FROM tbl_general_client_form t1
        LEFT JOIN tbl_client_status_records t2 
        ON 
            t1.uryyToeSS4 = t2.col_client_Id AND ((CURDATE() BETWEEN t2.col_start_date AND t2.col_end_date) OR (t2.col_start_date <= '$today' 
            AND t2.col_end_date = 'TFN')) WHERE (t1.client_city = '" . $varCookieCity . "' AND t1.client_first_name LIKE '%" . $search . "%' OR t1.client_last_name LIKE '%" . $search . "%') ";
    } else {
        $query = "
        SELECT t1.userId, t1.client_first_name, t1.client_last_name, t1.client_primary_phone, t1.client_poster_code, t1.client_city, 
        t1.client_sexuality, t1.client_preferred_name, t1.client_date_of_birth, t1.client_area, t1.uryyToeSS4, t1.col_company_Id, t2.col_reason, t2.col_status_color 
        FROM tbl_general_client_form t1
        LEFT JOIN tbl_client_status_records t2 
        ON 
            t1.uryyToeSS4 = t2.col_client_Id AND ((CURDATE() BETWEEN t2.col_start_date AND t2.col_end_date) OR (t2.col_start_date <= '$today' 
            AND t2.col_end_date = 'TFN')) WHERE (t1.client_city = '" . $varCookieCity . "' AND t1.col_company_Id = '" . $_SESSION['usr_compId'] . "') ORDER BY t1.client_first_name ASC ";
    }
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $output .= '<div class="table-responsive">
                        <table class="table table-striped table-hover mb-0">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="selectAllCheckbox"></th>
                                <th>Name</th>
                                <th>Primary phone</th>
                                <th>Groups</th>
                                <th>Date of birth</th>
                                <th>Post code</th>
                                <th>Gender</th>
                                <th class=" text-left">Preferred name</th>
                                <th>Profile</th>
                            </tr>
                        </thead>';
        while ($trans = mysqli_fetch_array($result)) {
            $clientDOB = date('d M, Y', strtotime("" . $trans['client_date_of_birth'] . ""));
            $output .= '
                <tr>
                
                                                        <td><input type="checkbox" class="checkboxes" name="txtSelectedId[]" value="' . $trans["userId"] . '"></td>
                                                        <td>
                                                            <a style="cursor:pointer; text-decoration:none; color:#000;" href="./client-details?uryyToeSS4=' . $trans["uryyToeSS4"] . '">
                                                                <div class="d-inline-block align-middle">
                                                                    <img src="assets/images/profile/profile-icon.jpg" alt="user image" class="img-radius wid-40 align-top m-r-15">
                                                                    <div class="d-inline-block">
                                                                        <h6> ' . $trans["client_first_name"] . '  ' . $trans["client_last_name"] . '</h6>
                                                                        <p class=" m-b-0" style="padding:3px 0px 3px 10px; border-radius:50px; color:' . $trans["col_status_color"] . ';"><strong>' . $trans["col_reason"] . '</strong></p>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </td>
                                                        <td>0' . $trans["client_primary_phone"] . '</td>
                                                        <td>' . $trans["client_area"] . '</td>
                                                        <td>' . $clientDOB . '</td>
                                                        <td>' . $trans["client_poster_code"] . '</td>
                                                        <td>' . $trans["client_sexuality"] . '</td>
                                                        <td>' . $trans["client_preferred_name"] . '</td>
                                                        <td>
                                                        <a style="text-decoration:none;" href="./client-task?uryyToeSS4=' . $trans["uryyToeSS4"] . '"> <button title="View client task" type="button" class="btn  btn-primary btn-sm"><i class="feather mr-2 icon-list"></i></button> </a>
                                                        <a style="text-decoration:none;" href="./client-medication?uryyToeSS4=' . $trans["uryyToeSS4"] . '"> <button title="View client medication" type="button" class="btn  btn-danger btn-sm"> <i class="feather mr-2 icon-heart"></i></button> </a>
                                                        <a style="text-decoration:none;" href="./client-details?uryyToeSS4=' . $trans["uryyToeSS4"] . '"><button title="View client details" type="button" class="btn btn-info btn-sm"> <i class="feather mr-2 icon-eye"></i></button></a>
                                                        </td>
    
                                                    </tr>
            ';
        }
        echo $output;
    } else {
        echo 'Data Not Found';
    }
}
