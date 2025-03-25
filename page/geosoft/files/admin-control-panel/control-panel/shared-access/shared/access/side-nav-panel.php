<div class="row">
    <div class="col-md-12">
        <a href="./client-feed?uryyToeSS4=<?php echo $uryyToeSS4; ?>" style="text-decoration:none; color:#000;">
            <div style="padding: 12px; font-size:20px;">
                <div class="row">
                    <div class="col-10">
                        <strong>Completed</strong>
                    </div>
                    <div class="col-2">
                        <strong>
                            <?php
                            $result = "SELECT * FROM tbl_daily_shift_records WHERE uryyToeSS4='$uryyToeSS4' ";
                            if ($result = mysqli_query($conn, $result)) {
                                $rowcount = mysqli_num_rows($result);
                                printf($rowcount);
                                mysqli_free_result($result);
                            } ?>
                        </strong>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-12">
        <a href="./alerts-feeds?uryyToeSS4=<?php echo $uryyToeSS4; ?>" style="text-decoration:none; color:#000;">
            <div style="padding: 12px; font-size:20px;">
                <div class="row">
                    <div class="col-10">
                        <strong>Scheduled</strong>
                    </div>
                    <div class="col-2">
                        <strong>
                            <?php
                            $result = "SELECT * FROM tbl_schedule_calls WHERE uryyToeSS4='$uryyToeSS4' AND call_status = 'Scheduled' ";
                            if ($result = mysqli_query($conn, $result)) {
                                $rowcount = mysqli_num_rows($result);
                                printf($rowcount);
                                mysqli_free_result($result);
                            } ?>
                        </strong>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-12">
        <a href="./client-visit?uryyToeSS4=<?php echo $uryyToeSS4; ?>" style="text-decoration:none; color:#000;">
            <div style="padding: 12px; font-size:20px;">
                <div class="row">
                    <div class="col-10">
                        <strong>Visits</strong>
                    </div>
                    <div class="col-2">
                        <strong>
                            <?php
                            $result = "SELECT * FROM tbl_schedule_calls WHERE uryyToeSS4='$uryyToeSS4' ";
                            if ($result = mysqli_query($conn, $result)) {
                                $rowcount = mysqli_num_rows($result);
                                printf($rowcount);
                                mysqli_free_result($result);
                            } ?>
                        </strong>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-12">
        <a href="./client-notes?uryyToeSS4=<?php echo $uryyToeSS4; ?>" style="text-decoration:none; color:#000;">
            <div style="padding: 12px; font-size:20px;">
                <div class="row">
                    <div class="col-10">
                        <strong>Notes</strong>
                    </div>
                    <div class="col-2">
                        <strong>
                            <?php
                            $result = "SELECT * FROM tbl_client_notes WHERE uryyToeSS4='$uryyToeSS4' ";
                            if ($result = mysqli_query($conn, $result)) {
                                $rowcount = mysqli_num_rows($result);
                                printf($rowcount);
                                mysqli_free_result($result);
                            } ?>
                        </strong>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-12 col-2">
        <a href="" style="text-decoration:none; color:#000;">
            <div style="padding: 12px; font-size:20px;">
                <hr>
                <strong>Actions</strong>
            </div>
        </a>
    </div>
</div>

<hr>