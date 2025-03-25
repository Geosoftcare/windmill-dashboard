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

    .active {
        background-color: red;
    }
</style>


<?php

if (isset($_GET['run_ids'])) {
    $Myrun_ids = $_GET['run_ids'];
}
$selectRuns = mysqli_query($conn, "SELECT * FROM tbl_client_runs 
WHERE run_ids = '$Myrun_ids' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ORDER BY userId DESC ");
while ($displayrunId = mysqli_fetch_array($selectRuns)) {
    $getRunTown = $displayrunId['run_town'];
    $_SESSION['run_town'] = $getRunTown;

    $getRunNameCol = $displayrunId['run_name'];
    $_SESSION['run_name'] = $getRunNameCol;

    $getRunNameColId = $displayrunId['run_ids'];
    $_SESSION['run_Id'] = $getRunNameColId;

    $getRunCity = $displayrunId['col_run_city'];
    $_SESSION['run_city'] = $getRunCity;
?>



    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h4 class="m-b-10">Attach clients
                                    <br>
                                    <small>
                                        Attach clients to <?php echo $getRunNameCol;
                                                        } ?>
                                    </small>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- table card-1 start -->


                <!-- prject ,team member start -->
                <div class="col-xl-8 col-md-8">
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
                            <div style="width: 400px; height:auto; padding:12px; margin-top:12px;">
                                <input type="search" class="form-control" name="search_text" id="search_text" placeholder="Search client here..." />
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="row">
                            </div>
                            <div class="table-responsive">
                                <div id="result"></div>
                                <div style="clear:both"></div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">

                    </div>
                    <br><br>
                </div>


                <!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
                <!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
                <!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

                <div class="col-xl-4 col-md-4">
                    <div style="width:400px; max-height:600px;">
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
                                <h5>Recently added</h5>
                            </div>
                            <div style="z-index: 1000; background-color:#fff;" class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover mb-0">
                                        <thead>
                                            <tr>
                                                <th>Client Name</th>
                                                <th>Care calls</th>
                                                <th>Remove</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $result = mysqli_query($conn, "SELECT * FROM tbl_manage_runs 
                                            WHERE (run_area_nameId = '$getRunNameColId' AND `col_right_to_display` = 'True'
                                            AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ORDER BY userId ASC ");
                                            while ($trans = mysqli_fetch_array($result)) {
                                                echo "
                                                        <tr>
                                                            <td>
                                                                <div class='d-inline-block'>
                                                                    <h6>" . $trans['client_name'] . "</h6>
                                                                </div>
                                                            </td>
                                                            <td>" . $trans['care_calls'] . "</td>
                                                            <td>
                                                                <form action='./processing-delete-client-from-run' method='post'>
                                                                    <input type='hidden' name='txtUserId' value='" . $trans['userId'] . "'>
                                                                    <input type='hidden' name='txtClientSpecialId' value='" . $trans['uryyToeSS4'] . "'>
                                                                    <input type='hidden' name='txtcare_calls' value='" . $trans['care_calls'] . "'>
                                                                    <input type='hidden' name='txtRunSpecialId' value='" . $trans['run_area_nameId'] . "'>
                                                                    <button style='width:25px; height:25px; padding:0;' type='submit' name='btnDeleteClientList' class='btn btn-danger btn-sm'>
                                                                        <i class='feather icon-x'></i>
                                                                    </button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    ";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br><br>
                </div>


                <?php include('bottom-panel-block.php'); ?>


            </div>
            <!-- Latest Customers end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript">
        /**/
        $(document).ready(function() {
            load_data();

            function load_data(query) {
                $.ajax({
                    url: "fetch-attach-client-list.php",
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