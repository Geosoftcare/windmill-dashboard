<?php include('header-contents.php'); ?>


<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Dashboard Analytics</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Analytics</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-xl-4">
                <div class="card flat-card">
                    <div class="row-table">
                        <div class="col-sm-6 card-body br">
                            <div class="row">
                                <div class="col-sm-4">
                                    <i class="icon feather icon-home text-c-green mb-1 d-block"></i>
                                </div>
                                <div class="col-sm-8 text-md-center">
                                    <h5>View</h5>
                                    <span style="font-size:11px;">Dashboard</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 card-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <i class="icon feather icon-user text-c-red mb-1 d-block"></i>
                                </div>
                                <div class="col-sm-8 text-md-center">
                                    <h5>
                                        <?php
                                        $sql_total_team = "SELECT * FROM tbl_general_team_form 
                                        WHERE col_company_Id = '" . $_SESSION['usr_compId'] . "'";
                                        if ($result_total_team = mysqli_query($conn, $sql_total_team)) {
                                            $rowcount = mysqli_num_rows($result_total_team);
                                            printf($rowcount);
                                            mysqli_free_result($result_total_team);
                                        }
                                        ?>
                                    </h5>
                                    <span style="font-size:11px;">Team</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-table">
                        <div class="col-sm-6 card-body br">
                            <div class="row">
                                <div class="col-sm-4">
                                    <i class="icon feather icon-user-plus text-c-blue mb-1 d-block"></i>
                                </div>
                                <div class="col-sm-8 text-md-center">
                                    <h5>
                                        <?php
                                        $sql_total_client = "SELECT * FROM tbl_general_client_form 
                                        WHERE col_company_Id = '" . $_SESSION['usr_compId'] . "'";
                                        if ($result_total_client = mysqli_query($conn, $sql_total_client)) {
                                            $rowcount = mysqli_num_rows($result_total_client);
                                            printf($rowcount);
                                            mysqli_free_result($result_total_client);
                                        }
                                        ?>
                                    </h5>
                                    <span style="font-size:11px;">Clients</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 card-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <i class="icon feather icon-briefcase text-c-yellow mb-1 d-block"></i>
                                </div>
                                <div class="col-sm-8 text-md-center">
                                    <h5>
                                        <?php
                                        $sql_position = "SELECT * FROM tbl_position 
                                        WHERE (col_company_Id = '" . $_SESSION['usr_compId'] . "')";
                                        if ($result_position = mysqli_query($conn, $sql_position)) {
                                            $rowcount = mysqli_num_rows($result_position);
                                            printf($rowcount);
                                        }
                                        ?>
                                    </h5>
                                    <span style="font-size:11px;">Position in care</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- widget primary card start -->
                <div class="card flat-card widget-primary-card">
                    <div class="row-table">
                        <div class="col-sm-3 card-body">
                            <i class="feather icon-map-pin text-c-cream mb-1 d-block"></i>
                        </div>
                        <div class="col-sm-9">
                            <h4>
                                <?php
                                $sql_total_area = "SELECT client_area FROM tbl_general_client_form 
                                WHERE (col_company_Id = '" . $_SESSION['usr_compId'] . "') GROUP BY client_area";
                                if ($result_total_area = mysqli_query($conn, $sql_total_area)) {
                                    $rowcount = mysqli_num_rows($result_total_area);
                                    printf($rowcount);
                                    mysqli_free_result($result_total_area);
                                }
                                ?>
                            </h4>
                            <h6>Location(s)</h6>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-xl-4">
                <div class="card flat-card">
                    <div class="row-table">
                        <div class="col-sm-6 card-body br">
                            <div class="row">
                                <div class="col-sm-4">
                                    <i class="icon feather icon-tag text-c-green mb-1 d-block"></i>
                                </div>
                                <div class="col-sm-8 text-md-center">
                                    <h5>
                                        <?php
                                        $sql_total_task = "SELECT * FROM tbl_clients_task_records 
                                        WHERE col_company_Id = '" . $_SESSION['usr_compId'] . "'";
                                        if ($result_total_task = mysqli_query($conn, $sql_total_task)) {
                                            $rowcount = mysqli_num_rows($result_total_task);
                                            printf($rowcount);
                                            mysqli_free_result($result_total_task);
                                        }
                                        ?>
                                    </h5>
                                    <span style="font-size:11px;">Task</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 card-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <i class="icon feather icon-heart text-c-blue mb-1 d-block"></i>
                                </div>
                                <div class="col-sm-8 text-md-center">
                                    <h5>
                                        <?php
                                        $sql_total_meds = "SELECT * FROM tbl_clients_medication_records 
                                        WHERE (col_company_Id = '" . $_SESSION['usr_compId'] . "')";
                                        if ($result_total_meds = mysqli_query($conn, $sql_total_meds)) {
                                            $rowcount = mysqli_num_rows($result_total_meds);
                                            printf($rowcount);
                                            mysqli_free_result($result_total_meds);
                                        }
                                        ?>
                                    </h5>
                                    <span style="font-size:11px;">Medication</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-table">
                        <div class="col-sm-6 card-body br">
                            <div class="row">
                                <div class="col-sm-4">
                                    <i class="icon feather icon-map-pin text-c-blue mb-1 d-block"></i>
                                </div>
                                <div class="col-sm-8 text-md-center">
                                    <h5>
                                        <?php
                                        $sql_total_areas = "SELECT client_area FROM tbl_general_client_form 
                                        WHERE (col_company_Id = '" . $_SESSION['usr_compId'] . "') GROUP BY client_area";
                                        if ($result_total_areas = mysqli_query($conn, $sql_total_areas)) {
                                            $rowcount = mysqli_num_rows($result_total_areas);
                                            printf($rowcount);
                                            mysqli_free_result($result_total_areas);
                                        }
                                        ?>
                                    </h5>
                                    <span style="font-size:11px;">Area</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 card-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <i class="icon feather icon-book text-c-blue mb-1 d-blockz"></i>
                                </div>
                                <div class="col-sm-8 text-md-center">
                                    <h5><?php
                                        $sql_total_report = "SELECT COUNT(*) AS total_rows FROM tbl_raise_concern 
                                        WHERE col_company_Id = '" . $_SESSION['usr_compId'] . "'";
                                        $result = $conn->query($sql_total_report);
                                        if ($result) {
                                            $row = $result->fetch_assoc();
                                            echo $row['total_rows'];
                                        } else {
                                            echo "Error: " . $conn->error;
                                        }
                                        ?></h5>
                                    <span style="font-size:11px;">Report</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- widget-success-card start -->
                <div class="card flat-card widget-purple-card">
                    <div class="row-table">
                        <div class="col-sm-3 card-body">
                            <i class="fas fa-trophy"></i>
                        </div>
                        <div class="col-sm-9">
                            <h4>
                                <?php
                                $sql_total_comp_users = mysqli_query($conn, "SELECT * FROM tbl_goesoft_users 
                                WHERE (col_company_Id = '" . $_SESSION['usr_compId'] . "')");
                                $row_total_comp_users = mysqli_fetch_array($sql_total_comp_users);
                                $varCompliment = $row_total_comp_users['col_company_compliment'];
                                echo $varCompliment;
                                ?>
                            </h4>
                            <h6>Compliment(s)</h6>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-xl-4">
                <div class="card support-bar overflow-hidden">
                    <div class="card-body pb-0">
                        <h2 class="m-0">
                            <?php
                            $sql_total_report = "SELECT COUNT(*) AS total_rows FROM tbl_raise_concern 
                            WHERE col_company_Id = '" . $_SESSION['usr_compId'] . "'";
                            $result = $conn->query($sql_total_report);
                            if ($result) {
                                $row = $result->fetch_assoc();
                                echo $row['total_rows'];
                            } else {
                                echo "Error: " . $conn->error;
                            }
                            ?>
                        </h2>
                        <span class="text-c-blue">Support/Reports</span>
                        <p class="mb-3 mt-3">Total number of support/report that come in.</p>
                    </div>
                    <div id="support-chart"></div>
                    <div class="card-footer bg-primary text-white">
                        <div class="row text-center">
                            <div class="col">
                                <h4 class="m-0 text-white">0</h4>
                                <span>Open</span>
                            </div>
                            <div class="col">
                                <h4 class="m-0 text-white">0</h4>
                                <span>Running</span>
                            </div>
                            <div class="col">
                                <h4 class="m-0 text-white">0</h4>
                                <span>Solved</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Widget primary-success card end -->

            <!-- Clients ,team member start -->
            <div class="col-xl-6 col-md-12">
                <div class="card table-card">
                    <div class="card-header">
                        <h5>Clients</h5>
                        <a href="./client-list" style="position: absolute; right:50px; top:12x;">
                            <button type="button" class="btn btn-info btn-sm"><i class="feather mr-2 icon-plus"></i>More</button>
                        </a>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th class="text-left">Profile</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $query = "
                                    SELECT t1.userId, t1.client_first_name, t1.client_last_name, t1.client_primary_phone, 
                                    t1.uryyToeSS4, t1.col_company_Id, t2.col_reason, t2.col_status_color 
                                    FROM tbl_general_client_form t1
                                    LEFT JOIN tbl_client_status_records t2 
                                    ON 
                                        t1.uryyToeSS4 = t2.col_client_Id AND ((CURDATE() BETWEEN t2.col_start_date AND t2.col_end_date) OR (t2.col_start_date <= '$today' 
                                        AND t2.col_end_date = 'TFN')) WHERE (t1.col_company_Id = '" . $_SESSION['usr_compId'] . "') ORDER BY t1.client_first_name DESC LIMIT 10;
                                    ";


                                    $result = mysqli_query($conn, $query);
                                    while ($trans = mysqli_fetch_array($result)) {
                                        echo "
                                            <tr>
                                                <td>
                                                    <div class='d-inline-block align-middle'>
                                                        <img src='assets/images/profile/profile-icon.jpg' alt='user image' class='img-radius wid-40 align-top m-r-15'>
                                                        <div class='d-inline-block'>
                                                            <h6> " . $trans['client_first_name'] . "  " . $trans['client_last_name'] . " </h6>
                                                            <p class='m-b-0' style='font-size:12px; padding:3px 0px 3px 5px; border-radius:50px; color:" . $trans['col_status_color'] . ";'><strong>" . $trans['col_reason'] . "</stron></p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>" . $trans['client_primary_phone'] . "</td>
                                                <td>
                                                <a href='./client-details?uryyToeSS4=" . $trans['uryyToeSS4'] . "'><button title='View client details' type='button' class='btn btn-primary btn-sm'><i class='feather mr-2 icon-eye'></i>View</button></a>
                                                </td>
                                            </tr>
                                            ";
                                    } ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>


            <!-- Team ,team member start -->
            <div class="col-xl-6 col-md-12">
                <div class="card table-card">
                    <div class="card-header">
                        <h5>Team</h5>
                        <a href="./team-list" style="position: absolute; right:50px; top:12x;">
                            <button type="button" class="btn btn-info btn-sm"><i class="feather mr-2 icon-plus"></i>More</button>
                        </a>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th class="text-left">Profile</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "
                                    SELECT t1.userId, t1.team_first_name, t1.team_last_name, t1.team_primary_phone, 
                                    t1.uryyTteamoeSS4, t1.col_company_Id, t2.col_team_condition, t2.col_approval, t2.col_color_code 
                                    FROM tbl_general_team_form t1
                                    LEFT JOIN tbl_team_status t2 
                                    ON 
                                        t1.uryyTteamoeSS4 = t2.uryyTteamoeSS4 AND ((CURDATE() BETWEEN t2.col_startDate AND t2.col_endDate AND t2.col_approval = 'Approved') 
                                        OR (t2.col_startDate <= '$today' AND t2.col_endDate = 'TFN' AND t2.col_approval = 'Approved')) WHERE (t1.col_company_Id = '" . $_SESSION['usr_compId'] . "') 
                                        ORDER BY t1.team_first_name DESC LIMIT 10;
                                    ";
                                    $result = mysqli_query($conn, $query);
                                    while ($trans = mysqli_fetch_array($result)) {
                                        echo "

                                    <tr>
                                        <td>
                                            
                                            <div class='d-inline-block align-middle'>
                                                <img src='assets/images/profile/profile-icon.jpg' alt='user image' class='img-radius wid-40 align-top m-r-15'>
                                                <div class='d-inline-block'>
                                                    <h6>" . $trans['team_first_name'] . " " . $trans['team_last_name'] . "</h6>
                                                    <p class='m-b-0' style='font-size:12px; padding:3px 0px 3px 5px; border-radius:50px; color:" . $trans["col_color_code"] . ";'><strong>" . $trans['col_team_condition'] . "</strong></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>" . $trans['team_primary_phone'] . "</td>
                                        <td>
                                        <a href='./team-details?uryyTteamoeSS4=" . $trans['uryyTteamoeSS4'] . "'><button type='button' class='btn btn-primary btn-sm'><i class='feather mr-2 icon-eye'></i>View</button></a>
                                        </td>

                                    </tr>
                                    ";
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <?php include('bottom-panel-block.php'); ?>


        </div>
        <!-- Latest Customers end -->
    </div>
    <!-- [ Main Content ] end -->
</div>
</div>



<?php include('footer-contents.php'); ?>