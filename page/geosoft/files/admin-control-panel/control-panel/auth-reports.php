<?php include('header-contents.php'); ?>

<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Report</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="./dashboard.php"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Report board</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-xl-4">
                <div class="card flat-card widget-primary-card">
                    <div class="row-table">
                        <div class="col-sm-3 card-body">
                            <i class="feather icon-list"></i>
                        </div>
                        <div class="col-sm-9">
                            <h4>
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
                            </h4>
                            <h6>Report</h6>
                        </div>
                    </div>
                </div>
                <!-- widget primary card end -->
            </div>

            <div class="col-md-12 col-xl-4">
                <div class="card flat-card widget-purple-card">
                    <div class="row-table">
                        <div class="col-sm-3 card-body">
                            <i class="feather icon-activity"></i>
                        </div>
                        <div class="col-sm-9">
                            <h4>
                                <?php
                                $sql_total_report = "SELECT COUNT(*) AS total_rows FROM tbl_raise_concern 
                                WHERE (col_status = 'Seen' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')";
                                $result = $conn->query($sql_total_report);
                                if ($result) {
                                    $row = $result->fetch_assoc();
                                    echo $row['total_rows'];
                                } else {
                                    echo "Error: " . $conn->error;
                                }
                                ?>
                            </h4>
                            <h6>Seen</h6>
                        </div>
                    </div>
                </div>
                <!-- widget-success-card end -->
            </div>


            <!-- table card-1 start -->
            <div class="col-md-12 col-xl-4">
                <div class="card flat-card widget-info-card" style="background-color: rgba(231, 76, 60,1.0); color:white;">
                    <div class="row-table">
                        <div class="col-sm-3 card-body" style="background-color: rgba(192, 57, 43,1.0); color:white;">
                            <i class="feather icon-alert-triangle"></i>
                        </div>
                        <div class="col-sm-9" style="color: white;;">
                            <h4 style="color: white;;">
                                <?php
                                $sql_total_report = "SELECT COUNT(*) AS total_rows FROM tbl_raise_concern 
                                WHERE (col_status = 'Pending' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')";
                                $result = $conn->query($sql_total_report);
                                if ($result) {
                                    $row = $result->fetch_assoc();
                                    echo $row['total_rows'];
                                } else {
                                    echo "Error: " . $conn->error;
                                }
                                ?>
                            </h4>
                            <h6 style="color: white;;">Pending</h6>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xl-12 col-md-12">
                <div class="card table-card">
                    <div class="card-header">
                        <h5>Clients</h5>
                        <div class="card-header-right">
                            <div class="btn-group card-option">
                                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="feather icon-more-horizontal"></i>
                                </button>
                                <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                    <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                                    <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                                    <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
                                    <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Client</th>
                                        <th>Team</th>
                                        <th>Report title</th>
                                        <th class="text-left">Date reported</th>
                                        <th>Decision</th>
                                    </tr>
                                </thead>
                                <tbody class="table-striped">
                                    <?php
                                    $sql_sel_report = "SELECT * FROM tbl_raise_concern WHERE (col_company_Id = '" . $_SESSION['usr_compId'] . "')";
                                    $result = $conn->query($sql_sel_report);
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            $varDateSubmited = date('d M, Y', strtotime("" . $row['dateTime'] . ""));
                                            echo "
                                            <tr>
                                                <td class='fw-bold'>
                                                    <div class='d-inline-block align-middle'>
                                                        <div class='d-inline-block'>
                                                            <h6><strong> " . $row['col_client_name'] . "</strong></h6>
                                                            <p class='text-muted m-b-0'>Important</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><strong>" . $row['col_team_name'] . "</strong></td>
                                                <td><strong>" . $row['col_title'] . "</strong></td>
                                                <td><strong>" . $varDateSubmited . "</strong></td>
                                                <td>
                                                    <form action='./auto-update?userId=" . $row['userId'] . "' method='post' autocomplete='off'>
                                                        <input type='hidden' name='txtStatus' value='Seen'>
                                                        <button title='View report details' name='btnAutoUpdate' type='submit' class='btn btn-info btn-sm'><i class='feather mr-2 icon-eye'></i>View</button>
                                                    </form>
                                                </td>

                                            </tr>
                                        ";
                                        }
                                    } else {
                                        echo "0 results";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <?php include('bottom-panel-block.php'); ?>


        </div>
    </div>
</div>
</div>


<?php include('footer-contents.php'); ?>