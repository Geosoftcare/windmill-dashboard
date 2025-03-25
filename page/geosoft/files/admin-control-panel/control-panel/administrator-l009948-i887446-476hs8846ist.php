<?php include('header-contents.php'); ?>


<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Admin</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="./dashboard.php"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Admin board</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- table card-1 start -->
            <div class="col-md-12 col-xl-4">

                <!-- widget primary card start -->
                <div class="card flat-card widget-primary-card">
                    <div class="row-table">
                        <div class="col-sm-3 card-body">
                            <i class="feather icon-list"></i>
                        </div>
                        <div class="col-sm-9">
                            <h4><?php
                                $sql = "SELECT * FROM tbl_goesoft_users WHERE col_company_Id = '" . $_SESSION['usr_compId'] . "' ";
                                if ($result = mysqli_query($conn, $sql)) {
                                    $rowcount = mysqli_num_rows($result);
                                    printf($rowcount);
                                    mysqli_free_result($result);
                                }
                                ?></h4>
                            <h6>Admin</h6>
                        </div>
                    </div>
                </div>
                <!-- widget primary card end -->
            </div>
            <!-- table card-1 end -->


            <!-- table card-2 start -->
            <div class="col-md-12 col-xl-4">
                <!-- widget-success-card start -->
                <div class="card flat-card widget-purple-card">
                    <div class="row-table">
                        <div class="col-sm-3 card-body">
                            <i class="feather icon-activity"></i>
                        </div>
                        <div class="col-sm-9">
                            <h4><?php
                                $sql = "SELECT * FROM tbl_goesoft_users WHERE verification_code = 'Verified' 
                                AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ";
                                if ($result = mysqli_query($conn, $sql)) {
                                    $rowcount = mysqli_num_rows($result);
                                    printf($rowcount);
                                    mysqli_free_result($result);
                                }
                                ?></h4>
                            <h6>Active</h6>
                        </div>
                    </div>
                </div>
                <!-- widget-success-card end -->
            </div>
            <!-- table card-2 end -->


            <!-- table card-1 start -->
            <div class="col-md-12 col-xl-4">
                <!-- widget primary card start -->
                <div class="card flat-card widget-info-card" style="background-color: rgba(231, 76, 60,1.0); color:white;">
                    <div class="row-table">
                        <div class="col-sm-3 card-body" style="background-color: rgba(192, 57, 43,1.0); color:white;">
                            <i class="feather icon-alert-triangle"></i>
                        </div>
                        <div class="col-sm-9" style="color: white;">
                            <h4 style="color: white;">
                                <?php
                                $sql = "SELECT * FROM tbl_goesoft_users WHERE verification_code = 'Not Verified' 
                                AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ";
                                if ($result = mysqli_query($conn, $sql)) {
                                    $rowcount = mysqli_num_rows($result);
                                    printf($rowcount);
                                    mysqli_free_result($result);
                                }
                                ?>
                            </h4>
                            <h6 style="color: white;">In-active</h6>
                        </div>
                    </div>
                </div>
            </div>
            <!-- table card-1 end -->

            <!-- prject ,team member start -->
            <div class="col-xl-12 col-md-12">
                <div class="card table-card">
                    <div class="card-header">
                        <h5>Admin</h5>
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
                                        <th>Name</th>
                                        <th>Email address</th>
                                        <th>Date registered</th>
                                        <th>Time registered</th>
                                        <th>Decision </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $result = mysqli_query($conn, "SELECT * FROM tbl_goesoft_users 
                                    WHERE (col_company_Id = '" . $_SESSION['usr_compId'] . "') ORDER BY userId DESC ");
                                    while ($trans = mysqli_fetch_array($result)) {
                                        echo "
                                        <tr>
                                            <td>
                                                <div class='d-inline-block align-middle'>
                                                    <img src='assets/images/profile/profile-icon.jpg' alt='user image' class='img-radius wid-40 align-top m-r-15'>
                                                    <div class='d-inline-block'>
                                                        <h6> " . $trans['user_fullname'] . " </h6>
                                                        <p style='color:red;' class='text-muted m-b-0'><strong>" . $trans['verification_code'] . "</strong></p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>" . $trans['user_email_address'] . "</td>
                                            <td>" . $trans['date_registered'] . "</td>
                                            <td>" . $trans['time_registered'] . "</td>
                                            <td>
                                            <a style='text-decoration:none;' href='./deactivate-admin?user_special_Id=" . $trans['user_special_Id'] . "'> <button title='Delete this admin' type='button' " . $trans['status1'] . " class='btn btn-primary btn-sm'>Deactivate</button> </a>
                                            <a style='text-decoration:none;' href='./activate-admin?user_special_Id=" . $trans['user_special_Id'] . "'> <button title='Activate this admin' type='button' " . $trans['status2'] . "  class='btn btn-info btn-sm'>Activate</button> </a>
                                            <a style='text-decoration:none;' href='./delete-admin?user_special_Id=" . $trans['user_special_Id'] . "'> <button title='Delete this admin' type='button' class='btn btn-danger btn-sm'>Delete</button> </a>
                                            <a style='text-decoration:none;' href='./finance-access?user_special_Id=" . $trans['user_special_Id'] . "'> <button title='Grant user finance access' type='button' class='btn btn-secondary btn-sm'>Finance</button> </a>
                                            <a style='text-decoration:none;' href='./admin-access?user_special_Id=" . $trans['user_special_Id'] . "'> <button title='Grant user admin access' type='button' class='btn btn-secondary btn-sm'>Admin</button> </a>
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