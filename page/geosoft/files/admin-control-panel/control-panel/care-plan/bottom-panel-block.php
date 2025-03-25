<!-- prject ,team member start -->
<!-- seo start -->

<div style="margin-top: 100px;"></div>


<div class="col-xl-4 col-md-12">
    <div class="card">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-6">
                    <h3>
                        <?php

                        $sql = "SELECT * FROM tbl_general_client_form";

                        if ($result = mysqli_query($conn, $sql)) {
                            $rowcount = mysqli_num_rows($result);
                            printf($rowcount);
                            mysqli_free_result($result);
                        }

                        ?>
                    </h3>
                    <h6 class="text-muted m-b-0">clients<i class="fa fa-caret-down text-c-red m-l-10"></i></h6>
                </div>
                <div class="col-6">
                    <div id="seo-chart1" class="d-flex align-items-end"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-4 col-md-6">
    <div class="card">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-6">
                    <h3>
                        <?php

                        $sql = "SELECT * FROM tbl_goesoft_carers_account";

                        if ($result = mysqli_query($conn, $sql)) {
                            $rowcount = mysqli_num_rows($result);
                            printf($rowcount);
                            mysqli_free_result($result);
                        }

                        ?>
                    </h3>
                    <h6 class="text-muted m-b-0">Team<i class="fa fa-caret-up text-c-green m-l-10"></i></h6>
                </div>
                <div class="col-6">
                    <div id="seo-chart2" class="d-flex align-items-end"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-4 col-md-6">
    <div class="card">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-6">
                    <h3><?php

                        $sql = "SELECT * FROM tbl_group_list";

                        if ($result = mysqli_query($conn, $sql)) {
                            $rowcount = mysqli_num_rows($result);
                            printf($rowcount);
                            mysqli_free_result($result);
                        }
                        mysqli_close($conn);
                        ?></h3>
                    <h6 class="text-muted m-b-0">Group<i class="fa fa-caret-down text-c-red m-l-10"></i></h6>
                </div>
                <div class="col-6">
                    <div id="seo-chart3" class="d-flex align-items-end"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- seo end -->