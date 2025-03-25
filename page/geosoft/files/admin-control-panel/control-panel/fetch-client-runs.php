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
        $query = "SELECT * FROM tbl_client_runs WHERE (col_company_Id = '" . $_SESSION['usr_compId'] . "' AND run_name LIKE '%" . $search . "%' OR run_town LIKE '%" . $search . "%') GROUP BY run_name ORDER BY userId ASC ";
    } else {
        $query = "SELECT * FROM tbl_client_runs WHERE (col_company_Id = '" . $_SESSION['usr_compId'] . "') ORDER BY userId ASC ";
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
                                                                    <h6> ' . $trans["run_name"] . '</h6>
                                                                    <p class=" m-b-0" style="padding:3px 0px 3px 10px; border-radius:50px; color:' . $runDateCreated . ';"><strong>' . $trans["dateTime"] . '</strong></p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>' . $trans["run_town"] . '</td>
                                                        <td>
                                                        <a style="text-decoration:none;" href="./delete-run?run_ids=' . $trans["run_ids"] . '"> <button title="Delete run" type="button" class="btn  btn-danger btn-sm"><i class="feather mr-2 icon-trash"></i></button></a>
                                                        <a style="text-decoration:none;" href="./attach-clients?run_ids=' . $trans["run_ids"] . '"><button title="Attach run" type="button" class="btn btn-info btn-sm"><i class="feather mr-2 icon-eye"></i></button></a>
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
    //Display clients in all city
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $output = '';
    if (isset($_POST["query"])) {
        $search = mysqli_real_escape_string($conn, $_POST["query"]);
        $query = "SELECT * FROM tbl_client_runs WHERE (col_run_city = '" . $_COOKIE["companyCity"] . "' AND run_name LIKE '%" . $search . "%' OR run_town LIKE '%" . $search . "%') GROUP BY run_name ORDER BY userId ASC ";
    } else {
        $query = "SELECT * FROM tbl_client_runs WHERE (col_run_city = '" . $_COOKIE["companyCity"] . "' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ORDER BY userId ASC ";
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
                                                                    <h6> ' . $trans["run_name"] . '</h6>
                                                                    <p class=" m-b-0" style="padding:3px 0px 3px 10px; border-radius:50px; color:' . $runDateCreated . ';"><strong>' . $trans["dateTime"] . '</strong></p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>' . $trans["run_town"] . '</td>
                                                        <td>
                                                        <a style="text-decoration:none;" href="./delete-run?run_ids=' . $trans["run_ids"] . '"> <button title="Delete run" type="button" class="btn  btn-danger btn-sm"><i class="feather mr-2 icon-trash"></i></button></a>
                                                        <a style="text-decoration:none;" href="./attach-clients?run_ids=' . $trans["run_ids"] . '"><button title="Attach run" type="button" class="btn btn-info btn-sm"><i class="feather mr-2 icon-eye"></i></button></a>
                                                        </td>
    
                                                    </tr>
            ';
        }
        echo $output;
    } else {
        echo 'Data Not Found';
    }
}
