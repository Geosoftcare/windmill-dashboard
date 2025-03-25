<?php include('client-header-contents.php'); ?>


<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <?php
        $result = mysqli_query($conn, "SELECT * FROM tbl_schedule_calls WHERE uryyToeSS4='$uryyToeSS4' 
        AND call_status = 'Scheduled' ORDER BY userId DESC LIMIT 1 ");
        $row = mysqli_fetch_array($result);
        $clientName = $row['client_name'];
        $result = "SELECT * FROM tbl_client_notes WHERE uryyToeSS4='$uryyToeSS4' ";
        $result = mysqli_query($conn, $result);
        $rowcount = mysqli_num_rows($result);
        ?> <br>
        <h4>Note <br><small style="font-weight: 600;"><?php echo $clientName . " (" . $rowcount . ")"; ?> </small></h4>
        <br>
        <div class="row">
            <h5><strong>Notes</strong></h5>
            <hr>
            <?php
            $result = mysqli_query($conn, "SELECT * FROM tbl_client_notes WHERE uryyToeSS4='$uryyToeSS4' 
            ORDER BY userId DESC ");
            while ($row = mysqli_fetch_array($result)) {
                $collect_client_specialId = $row['uryyToeSS4'];
                $clientNoteDate = date('d M, Y', strtotime("" . $row['dateof_note'] . ""));
                echo "
                            <div class='col-xl-6'>
                                <a href='#' style='text-decoration:none; color:#000;'>
                                    <div class='card table-card'>
                                        <div class='card-header'>
                                            <h5><i class='feather mr-2 icon-briefcase'></i> &nbsp; Notes</h5>
                                            <span style='position:absolute; right:20px; font-weight:16px;'><i class='feather mr-2 icon-clock'></i> " . $row['timeof_note'] . "</span>
                                        </div>
                                        <div class='card-body p-0'>
                                            <div style='width:100%; height:auto; padding:8px 0px 8px 22px; font-weight:600; font-size:18px;'>
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


    <!-- Latest Customers end -->
</div>
<!-- [ Main Content ] end -->
</div>




<?php include('footer-contents.php'); ?>