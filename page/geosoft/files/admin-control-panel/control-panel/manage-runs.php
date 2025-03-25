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
                            <h5 class="m-b-10">Run
                            </h5>
                        </div>
                        <ul class="breadcrumb">
                            <li style="font-size:16px;" class="breadcrumb-item">
                                Use runs to group visits together and optimise your rota
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
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

                        <div style="margin-top: 15px;" class="row">
                            <br>
                            <div style="padding: 0;" class="col-sm-4 col-4">
                                <div>
                                    <input type="search" class="form-control" name="search_text" id="search_text" placeholder="Search run here..." />
                                </div>
                                <ul class="list"></ul>
                            </div>
                            <div class="col-sm-2">
                                <form action="./cookie-cities" method="POST" enctype="multipart/form-data" autocomplete="off">
                                    <select onchange="this.form.submit()" name="manageRun" id="select_page" style="width:200px; height:50px;" class="form-control">
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
                                        $sql_get_client_cities = mysqli_query($conn, "SELECT * FROM tbl_manage_runs WHERE (col_company_Id = '" . $_SESSION['usr_compId'] . "') GROUP BY col_client_city");
                                        while ($row_get_client_cities = mysqli_fetch_array($sql_get_client_cities)) {
                                            echo "
                                            <option value='" . $row_get_client_cities['col_client_city'] . "'>" . $row_get_client_cities['col_client_city'] . "</option>
                                            ";
                                        } ?>
                                        ?>
                                    </select>
                                </form>
                            </div>
                            <div class="col-sm-4 col-5">
                                <a href="./add-new-run" style="text-decoration:none;">
                                    <button style="height: 48px;" type="button" class="btn btn-info"><i class="feather mr-2 icon-plus"></i>Add new run</button>
                                </a>
                            </div>
                        </div>

                    </div>
                    <div class="card-body p-0">
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
                url: "fetch-client-runs.php",
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