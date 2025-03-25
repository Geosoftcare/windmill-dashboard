<?php include('client-header-contents.php'); ?>


<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <?php
        if (isset($_GET['uryyToeSS4'])) {
            $uryyToeSS4 = $_GET['uryyToeSS4'];
        }
        $result = mysqli_query($conn, "SELECT * FROM tbl_schedule_calls WHERE uryyToeSS4='$uryyToeSS4' AND call_status = 'Scheduled' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ORDER BY userId DESC LIMIT 1 ");
        $row = mysqli_fetch_array($result);
        $clientName = $row['client_name'];
        ?> <br>
        <h4>Note <br><small style="font-weight: 600;"><?php echo $clientName; ?>
                (<?php
                    $result = "SELECT * FROM tbl_client_notes WHERE uryyToeSS4='$uryyToeSS4' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ";
                    if ($result = mysqli_query($conn, $result)) {
                        $rowcount = mysqli_num_rows($result);
                        printf($rowcount);
                        mysqli_free_result($result);
                    } ?>)
            </small></h4>

        <br>
        <div class="row">
            <div class="col-md-5">
                Write new note
                <hr>

                <form action="./processing-client-note" method="post" enctype="multipart/form-data" autocomplete="off">
                    <?php
                    $result = mysqli_query($conn, "SELECT * FROM tbl_general_client_form WHERE uryyToeSS4='$uryyToeSS4' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ORDER BY userId DESC ");
                    while ($row = mysqli_fetch_array($result)) { ?>

                        <input type="hidden" value="<?php echo "" . $row['uryyToeSS4'] . ""; ?>" name="txtClientSpecialId" />
                        <input type="hidden" value="<?php echo date("Y-m-d"); ?>" name="txtDateOfNote" />
                        <input type="hidden" value="<?php echo date("h:ia"); ?>" name="txtTimeOfNote" />

                        <div class="form-group">
                            <textarea name="txtClientNote" id="" class="form-control" placeholder="Notes" rows="10"></textarea>
                        </div>

                        <input type="hidden" value="<?php echo "" . $row['col_company_Id'] . "";
                                                } ?>" name="txtCompanyId" />

                        <div class="form-group">
                            <input type="submit" name="btnSubmitClientNote" class="btn btn-block btn-small btn-primary" value="Save note" />
                        </div>
                </form>
            </div>
            <div class="col-md-7">
                <a href="./manage-runs" style="text-decoration: none;">
                    <button class="btn btn-small btn-primary">Add new run</button>
                </a>
                <hr>
                <div class="row">

                    <!-- Clients feed, team member start -->
                    <?php
                    $result = mysqli_query($conn, "SELECT * FROM tbl_client_notes WHERE uryyToeSS4='$uryyToeSS4' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ORDER BY userId DESC ");
                    while ($row = mysqli_fetch_array($result)) {
                        $collect_client_specialId = $row['uryyToeSS4'];
                        $clientNoteDate = date('d M, Y', strtotime("" . $row['dateof_note'] . ""));
                        echo "
                            <div class='col-xl-12'>
                                <a href='#' style='text-decoration:none; color:#000;'>
                                    <div class='card table-card'>
                                        <div class='card-header'>
                                            <h5><i class='feather mr-2 icon-briefcase'></i> &nbsp; Notes</h5>
                                            <span style='position:absolute; right:20px; font-weight:16px;'><i class='feather mr-2 icon-clock'></i> " . $row['timeof_note'] . "</span>
                                        </div>
                                        <div class='card-body p-0'>
                                            <div style='width:100%; height:auto; padding:8px 0px 8px 22px; font-size:16px;'>
                                                " . $row['client_note'] . "</h6>
                                            </div>
                                            <div style=' width: 100%; height:auto; padding:8px; background-color:#2c3e50; color:#fff;'>
                                                <span style='font-weight:22px;'><i class='feather mr-2 icon-check-square'></i> Notice </span> <span style='font-weight:22px; position:absolute; right:10px;'><i class='feather mr-2 icon-calendar'></i>" . $clientNoteDate . "</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        ";
                    } ?>
                </div>
            </div>
            <br>
            <br>
        </div>
    </div>

    <div class="row">
        <?php include('bottom-panel-block.php'); ?>
    </div>

    <!-- Latest Customers end -->
</div>
<!-- [ Main Content ] end -->
</div>




<?php include('footer-contents.php'); ?>