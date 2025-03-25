<?php include('team-header-contents.php'); ?>

<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <?php
        if (isset($_GET['uryyTteamoeSS4'])) {
            $uryyTteamoeSS4 = $_GET['uryyTteamoeSS4'];
            $sql_get_carer_names = mysqli_query($conn, "SELECT * FROM tbl_general_team_form 
            WHERE uryyTteamoeSS4='$uryyTteamoeSS4' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' 
            ORDER BY userId DESC LIMIT 1 ");
            $row_get_carer_names = mysqli_fetch_array($sql_get_carer_names);
            $varCarerNames = $row_get_carer_names['team_first_name'] . " " . $row_get_carer_names['team_last_name'];
        }
        ?>

        <h4>
            Availability
            <br>
            <small>Below are the list of <?php print $varCarerNames; ?>'s availability.</small>
        </h4>

        <div style="width: 100%; height:auto; padding:12px; justify-content:right; display:flex;">
            <a href="./availability?uryyTteamoeSS4=<?php echo $uryyTteamoeSS4; ?>" style="text-decoration: none;">
                <button class="btn btn-info" style="margin-top: 10px; margin-left: 10px;">Absence</button>
            </a>
        </div>
        <!-- [ delete box ] start -->
        <div class="row">
            <div class="col-md-4 col-xl-2"></div>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php
                if (isset($_GET['uryyTteamoeSS4'])) {
                    $uryyTteamoeSS4 = $_GET['uryyTteamoeSS4'];
                    $result = mysqli_query($conn, "SELECT * FROM tbl_team_status WHERE uryyTteamoeSS4='$uryyTteamoeSS4' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ORDER BY userId DESC ");
                    while ($row = mysqli_fetch_array($result)) {
                        $varStartDate = date('d M, Y', strtotime("" . $row['col_startDate'] . ""));
                        $varEndDate = date('d M, Y', strtotime("" . $row['col_endDate'] . ""));
                        $varDateSubmitted = date('d M, Y', strtotime("" . $row['dateTime'] . ""));
                        echo "
                        <div class='col-md-4 col-xl-4'>
                        <a href='./approve-availability?userId=" . $row['userId'] . "' style='text-decoration: none; color:#000;'>
                            <div style='box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;'>
                                <div style='height:260px;' class='card-body'>
                                    <h5 class='card-title'>" . $row['col_team_condition'] . "</h5>
                                    <hr style='background-color:rgba(189, 195, 199,.6);' />
                                    <p style='font-size:18px;' class='card-text'>
                                    " . $row['col_note'] . "
                                    </p>
                                    <p style='font-size:14px;' class='card-text'>
                                    " . $varStartDate . " &rarr; " . $varEndDate . "
                                    </p>
                                </div>
                                <div class='card-footer' style='background-color:" . $row['col_color_code'] . ";'>
                                    <small style='font-weight:600; color:#000;'>" . $varDateSubmitted . " | " . $row['col_approval'] . "</small>
                                </div>
                            </div>
                        </a>
                        </div>
                    ";
                    }
                }
                ?>

            </div>
        </div>
        <div class="col-md-4 col-xl-3"></div>
    </div>
    <!-- [ delete box ] end -->
</div>


<?php include('footer-contents.php'); ?>