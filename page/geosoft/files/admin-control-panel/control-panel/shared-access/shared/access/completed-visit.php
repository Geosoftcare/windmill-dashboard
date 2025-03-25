<?php include('client-header-contents.php'); ?>


<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="row">
            <div class="col-md-3 col-xl-3 col-sm-3">
                <?php
                $result = mysqli_query($conn, "SELECT * FROM tbl_schedule_calls 
                WHERE uryyToeSS4='$uryyToeSS4' AND call_status = 'Scheduled' ORDER BY userId DESC LIMIT 1 ");
                $row = mysqli_fetch_array($result);
                $clientName = $row['client_name'];
                $result = "SELECT * FROM tbl_daily_shift_records WHERE uryyToeSS4='$uryyToeSS4' ";
                $result = mysqli_query($conn, $result);
                $rowcount = mysqli_num_rows($result);
                ?> <br>
                <h4>Visits <br><small style="font-weight: 600;"><?php echo $clientName . " (" . $rowcount . ")"; ?> </small></h4>
            </div>
            <div class="col-md-3 col-xl-3 col-sm-3"></div>
            <div class="col-md-3 col-xl-3 col-sm-3">
                <form style="margin-top: 0px;" action="./cookies-date" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <div style="padding: 0px 0px 20px 5px; width:100%;">
                        <input type="hidden" value="<?php print $uryyToeSS4; ?>" name="txtClientId">
                        <input type="date" name='txtDate' onchange='this.form.submit()' value="<?php echo $visitCookieDate; ?>" style="width: 150px; height:45px; background-color:inherit; border:none; font-size:18px; font-weight:600;" />
                    </div>
                </form>
            </div>
            <div class="col-md-3 col-xl-3 col-sm-3">
                <div style="width: 100%; height:auto; padding:5px; margin-bottom:30px;">
                    <input class="btn btn-secondary" type="button" value="Download file" onclick="PrintElem('#yourdiv')" />
                </div>
            </div>
        </div>

        <hr style="background-color:rgba(189, 195, 199,1.0);">


        <div class="row">
            <div class="col-lg-12">
                <div id="yourdiv">
                    <div class="row">
                        <?php
                        $sql_get_recent_carer = mysqli_query($conn, "SELECT first_carer_Id, Clientshift_Date 
                        FROM tbl_schedule_calls WHERE (Clientshift_Date = '$visitCookieDate' AND call_status = 'Completed' 
                        AND uryyToeSS4='$uryyToeSS4') ORDER BY userId ASC LIMIT 1 ");
                        $row_get_recent_carer = mysqli_fetch_array($sql_get_recent_carer);
                        $varRecentCarer = $row_get_recent_carer['first_carer_Id'];
                        $varCareCallDate = $row_get_recent_carer['Clientshift_Date'];
                        echo "
                            <h5>
                                <strong>
                                   <i class='feather mr-2 icon-calendar'></i> " . date('l', strtotime("" . $visitCookieDate . "")) . "
                                </strong>
                            </h5>";

                        $result = mysqli_query($conn, "SELECT * FROM tbl_schedule_calls WHERE (uryyToeSS4='$uryyToeSS4' 
                        AND call_status = 'Completed' AND Clientshift_Date = '$visitCookieDate' AND first_carer_Id = '$varRecentCarer') ORDER BY Clientshift_Date DESC ");
                        while ($row = mysqli_fetch_array($result)) {
                            $clientVisitDate = date('d M, Y', strtotime("" . $row['Clientshift_Date'] . ""));
                            echo "
 
                            <div class='col-xl-3'>
                                <a href='./view-visit?userId=" . $row['userId'] . "' style='text-decoration:none; color:#000;'>
                                    <div class='card table-card'>
                                        <div class='card-header'>
                                            <h5><i class='feather mr-2 icon-briefcase'></i> &nbsp; Completed</h5>
                                            <span style='position:absolute; right:20px; font-weight:16px;'><i class='feather mr-2 icon-clock'></i> " . $row['dateTime_in'] . "</span>
                                        </div>
                                        <div class='card-body p-0'>
                                            <div style='width:100%; height:auto; padding:8px 0px 8px 22px; font-size:16px;'>
                                                <h6><strong>Actual time</strong></h6>
                                                <table style='border:none;'>
                                                                        <tr>
                                                                             <td>
                                                                                <h6>Time in</h6>
                                                                            </td>
                                                                            <td style='padding: 0px 0px 0px 35px;'>
                                                                                <h6>Time out</h6>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span style='font-weight:22px;'><i class='feather mr-2 icon-clock'></i> " . $row['dateTime_in'] . " </span>
                                                                            </td>
                                                                            <td style='padding: 0px 0px 0px 35px;'>
                                                                                <span style='font-weight:22px;'><i class='feather mr-2 icon-clock'></i> " . $row['dateTime_out'] . " </span>
                                                                            </td>
                                                                        </tr>
                                                                    </table>   
                                            </div>
                                            <div style=' width: 100%; height:auto; padding:8px; background-color:#16a085; color:#fff;'>
                                                <span style='font-weight:22px;'><i class='feather mr-2 icon-check-square'></i> Completed </span> <span style='font-weight:22px; position:absolute; right:10px;'><i class='feather mr-2 icon-calendar'></i>" . $clientVisitDate . "</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        ";
                        } ?>
                    </div>


                    <br>
                    <br>
                </div>
            </div>
        </div>

        <!-- Latest Customers end -->
    </div>
    <!-- [ Main Content ] end -->
</div>




<?php include('footer-contents.php'); ?>