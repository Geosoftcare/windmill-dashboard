<?php
include('client-header-contents.php');
?>

<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="row">
            <div class="col-md-3 col-xl-3 col-sm-3">
                <?php
                $result = mysqli_query($conn, "SELECT * FROM tbl_schedule_calls 
                WHERE (uryyToeSS4='$uryyToeSS4' AND call_status = 'Scheduled') 
                ORDER BY userId DESC LIMIT 1 ");
                $row = mysqli_fetch_array($result);
                $clientName = $row['client_name'];
                $result = "SELECT * FROM tbl_schedule_calls WHERE (uryyToeSS4='$uryyToeSS4') ";
                $result = mysqli_query($conn, $result);
                $rowcount = mysqli_num_rows($result);
                ?>
                <h4>Visits <br><small style="font-weight: 600;"><?php echo $clientName . " (" . $rowcount . ")"; ?> </small></h4>
            </div>
            <div class="col-md-3 col-xl-3 col-sm-3"></div>
            <div class="col-md-3 col-xl-3 col-sm-3">
                <form style="margin-top: 0px;" action="./cookies-date" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <div style="padding: 0px 0px 20px 5px; width:100%;">
                        <input type="hidden" value="<?php print $uryyToeSS4; ?>" name="txtClientId">
                        <input type="date" name='txtDate' value="<?php print $visitCookieDate; ?>" onchange='this.form.submit()' style="width: 150px; height:45px; background-color:inherit; border:none; font-size:18px; font-weight:600;" />
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
            <div class="col-md-12">
                <div id="yourdiv">
                    <div class="row">
                        <?php
                        $sql_get_recent_carer = mysqli_query($conn, "SELECT first_carer_Id,Clientshift_Date 
                        FROM tbl_schedule_calls WHERE (Clientshift_Date = '$visitCookieDate' AND call_status ='Scheduled' 
                        AND uryyToeSS4='$uryyToeSS4') 
                        ORDER BY userId ASC LIMIT 1 ");
                        $row_get_recent_carer = mysqli_fetch_array($sql_get_recent_carer);
                        $varRecentCarer = $row_get_recent_carer['first_carer_Id'];
                        $varCareCallDate = $row_get_recent_carer['Clientshift_Date'];
                        echo "
                            <h5>
                                <strong>
                                   <i class='feather mr-2 icon-calendar'></i> " . date('l', strtotime("" . $visitCookieDate . "")) . "
                                </strong>
                            </h5>
                        ";
                        $query = "
                            SELECT c.userId, c.dateTime_in, c.dateTime_out, c.first_carer, c.first_carer_Id, c.bgChange, c.call_status, c.Clientshift_Date, c.uryyToeSS4, c.col_company_Id 
                            FROM tbl_schedule_calls c LEFT JOIN tbl_cancelled_call a ON c.uryyToeSS4 = a.col_client_Id AND c.care_calls = a.col_care_call AND CURDATE() = a.col_date
                            WHERE (c.first_carer_Id = '$varRecentCarer' AND Clientshift_Date = '$visitCookieDate' AND a.col_client_Id IS NULL AND c.uryyToeSS4 = '$uryyToeSS4') ORDER BY c.dateTime_in ASC ";
                        $result = mysqli_query($conn, $query);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row_visit_details = mysqli_fetch_array($result)) {
                                $clientVisitDate = date('d M, Y', strtotime("" . $row_visit_details['Clientshift_Date'] . ""));
                                $currentTime = date('H:i');
                                echo "
                                <div class='col-xl-3'>
                                                    <a href='./view-visit?userId=" . $row_visit_details['userId'] . "' style='text-decoration:none; color:#000;'>
                                                        <div class='card table-card'>
                                                            <div class='card-header'>
                                                                <h5><i class='feather mr-2 icon-briefcase'></i> &nbsp; Visit</h5>
                                                                <span style='position:absolute; right:20px; font-weight:16px;'><i class='feather mr-2 icon-clock'></i> " . $currentTime . "</span>
                                                            </div>
                                                            <div class='card-body p-0'>
                                                                <div style='width:100%; height:auto; padding:8px 0px 8px 22px; font-weight:600; font-size:16px;'>
                                                                    <h6 style='font-weight:600;'>Planned time</h6>
                                                                    <table style='border:none;'>
                                                                        <tr>
                                                                             <td style='font-weight:600;'>
                                                                                <h6>Time in</h6>
                                                                            </td>
                                                                            <td  style='font-weight:600; padding: 0px 0px 0px 35px;'>
                                                                                <h6>Time out</h6>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span style='font-weight:600;'><i class='feather mr-2 icon-clock'></i> " . $row_visit_details['dateTime_in'] . " </span>
                                                                            </td>
                                                                            <td style='padding: 0px 0px 0px 35px;'>
                                                                                <span style='font-weight:600;'><i class='feather mr-2 icon-clock'></i> " . $row_visit_details['dateTime_out'] . " </span>
                                                                            </td>
                                                                        </tr>
                                                                    </table>   
                                                                </div>
                                                                <div style='width:100%; height:auto; padding:8px 0px 8px 22px; font-weight:600; font-size:16px;'>
                                                                    <span style='font-weight:22px;'><i class='feather mr-2 icon-users'></i> " . $row_visit_details['first_carer'] . " </span>
                                                                </div>
                                                                <div style=' width: 100%; font-weight:600; height:auto; padding:8px; background-color:" . $row_visit_details['bgChange'] . "; color:#fff;'>
                                                                    <span style='font-weight:600;'><i class='feather mr-2 icon-check-square'></i> " . $row_visit_details['call_status'] . " </span> <span style='font-weight:22px; position:absolute; right:10px;'><i class='feather mr-2 icon-calendar'></i>" . $clientVisitDate . "</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                ";
                            }
                        }
                        ?>
                    </div>
                    <br>
                    <br>
                </div>

            </div>
        </div>

    </div>
</div>


<script>
    function addStyling() {
        document.style.background = "skyblue";
    }

    function divPrinting() {
        var divContents = document.getElementById("dvContainer").innerHTML;
        var a = window.open('', '', 'left=40', 'top=40', 'height=500', 'width=1200');
        a.document.write('<html>');
        a.document.write('<head> <title>Geosoft Care | For home and community care</title> </head>');
        a.document.write('<body style="font-size:22px;">');
        a.document.write('<h2>Geosoft Care</h2><br><br><h4>Below are the details of your visit history. <br>For more info, update or complaint. Do not hesitate to contact us.</h4>');
        a.document.write(divContents);
        a.document.write('</body></html>');
        a.document.close();
        a.print();
    }
</script>

<?php include('footer-contents.php'); ?>