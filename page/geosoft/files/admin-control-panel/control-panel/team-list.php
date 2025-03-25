<?php include('header-contents.php'); ?>


<style>
    ul {
        list-style: none;
    }

    .list {
        width: 100%;
        background-color: #ffffff;
        border-radius: 0 0 5px 5px;
    }

    .list-items {
        padding: 10px 5px;
    }

    .list-items:hover {
        background-color: #dddddd;
    }

    .multipleSelection {
        width: 200px;
        background-color: rgba(189, 195, 199, 1.0);
        font-size: 16px;
        position: absolute;
        z-index: 1000;
    }

    .selectBox {
        position: relative;
    }

    .selectBox select {
        width: 100%;
        padding: 5px;
        font-weight: bold;
        font-size: 16px;
    }

    .overSelect {
        position: absolute;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
    }

    #checkBoxes {
        display: none;
        border: 1px #8DF5E4 solid;
        height: auto;
        padding: 8px;
    }

    #checkBoxes label {
        display: block;
        padding: 5px;
    }

    #checkBoxes label:hover {
        background-color: #4F615E;
        color: white;

        /* Added text color for better visibility */
    }
</style>


<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Team</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="./dashboard.php"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Team board</a></li>
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
                            <h4>
                                <?php
                                $sql_count_totalTeam = mysqli_query($conn, "SELECT * FROM tbl_general_team_form 
                                WHERE col_company_Id = '" . $_SESSION['usr_compId'] . "'");
                                $sql_count_result = mysqli_num_rows($sql_count_totalTeam);
                                printf($sql_count_result);
                                ?>
                            </h4>
                            <h6>Team</h6>
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
                            <h4>
                                <?php
                                $query = "
                                SELECT t1.userId, t1.uryyTteamoeSS4, t1.col_company_Id FROM tbl_general_team_form t1
                                        LEFT JOIN tbl_team_status t2 
                                        ON 
                                        t1.uryyTteamoeSS4 = t2.uryyTteamoeSS4 AND ((CURDATE() BETWEEN t2.col_startDate AND t2.col_endDate) 
                                        OR (t2.col_startDate = '$today' AND t2.col_endDate = 'TFN')) WHERE t2.uryyTteamoeSS4 IS NULL ;
                                ";
                                $sql_count_active = mysqli_query($conn, $query);
                                $sql_count_result = mysqli_num_rows($sql_count_active);
                                printf($sql_count_result);
                                ?>
                            </h4>
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
                        <div class="col-sm-9" style="color: white;;">
                            <h4 style="color: white;;">
                                <?php
                                $query = "
                                SELECT t1.userId, t1.uryyTteamoeSS4, t1.col_company_Id FROM tbl_general_team_form t1
                                        LEFT JOIN tbl_team_status t2 
                                        ON 
                                        t1.uryyTteamoeSS4 = t2.uryyTteamoeSS4 WHERE (t2.col_startDate <= '$today' AND t2.col_endDate >= '$today') 
                                        OR (t2.col_startDate = '$today' AND t2.col_endDate = 'TFN');
                                ";
                                $sql_count_active = mysqli_query($conn, $query);
                                $sql_count_result = mysqli_num_rows($sql_count_active);
                                printf($sql_count_result);
                                ?>
                            </h4>
                            <h6 style="color: white;;">In-active</h6>
                        </div>
                    </div>
                </div>
                <!-- widget primary card end -->
            </div>
            <!-- table card-1 end -->

            <!-- prject ,team member start -->
            <div class="col-xl-12 col-md-12">
                <div class="card table-card">
                    <div class="card-header">
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

                        <div style="margin-top: 60px;" class="row">
                            <br>
                            <div class="col-sm-4 col-4">
                                <div>
                                    <input type="search" class="form-control" name="search_text" id="search_text" placeholder="Search team here..." />
                                </div>
                            </div>
                            <div class="col-sm-2 col-4">
                                <form action="./cookie-cities" method="POST" enctype="multipart/form-data" autocomplete="off">
                                    <select onchange="this.form.submit()" name="teamView" id="select_page" style="width:200px; height:50px;" class="form-control">
                                        <option style="height: 40px; padding:12px; background-color:rgba(39, 174, 96,1.0); color:white;" value="">
                                            <?php
                                            if (isset($_COOKIE['companyCity'])) {
                                                echo $_COOKIE["companyCity"];
                                            } else {
                                                echo "Select city...";
                                            } ?>
                                        </option>
                                        <option value="Select all">Select all</option>
                                        <?php
                                        $sql_get_client_cities = mysqli_query($conn, "SELECT * FROM tbl_general_team_form WHERE (col_company_Id = '" . $_SESSION['usr_compId'] . "') GROUP BY col_company_city");
                                        while ($row_get_client_cities = mysqli_fetch_array($sql_get_client_cities)) {
                                            echo "
                                            <option value='" . $row_get_client_cities['col_company_city'] . "'>" . $row_get_client_cities['col_company_city'] . "</option>
                                            ";
                                        } ?>
                                        ?>
                                    </select>
                                </form>
                            </div>
                            <div style="text-align: right;" class="col-sm-5 col-4">
                                <a href="./add-new-team" style="text-decoration:none;">
                                    <button style="height: 48px;" type="button" class="btn btn-outline-info"><i class="feather mr-2 icon-plus"></i>Add team</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div style="overflow-y:scroll;" class="card-body p-0">
                        <div class="table-responsive">
                            <div id="result"></div>
                            <div style="clear:both"></div>
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



<script type="text/javascript">
    /**/
    $(document).ready(function() {
        load_data();

        function load_data(query) {
            $.ajax({
                url: "fetch-team-list.php",
                method: "post",
                data: {
                    query: query
                },
                success: function(data) {
                    $('#result').html(data);
                }
            });
        }

        $('#search_text').keyup(function() {
            var search = $(this).val();
            if (search != '') {
                load_data(search);
            } else {
                load_data();
            }
        });
    });




    //Check box code begins from here

    let show = true;

    function showCheckboxes() {
        let checkboxes = document.getElementById("checkBoxes");

        if (show) {
            checkboxes.style.display = "block";
            show = false;
        } else {
            checkboxes.style.display = "none";
            show = true;
        }
    }
</script>

<?php include('footer-contents.php'); ?>