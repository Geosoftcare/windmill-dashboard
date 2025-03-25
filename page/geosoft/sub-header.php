<div style="width: 100%; height:25%; color:white; border-bottom:3px solid rgba(95, 39, 205,1.0); background-color:rgba(39, 60, 117,1.0); padding:12px; font-size:16px;">
    <table style="border: none; width:100%;">
        <tr>
            <td style="border: none;" valign="bottom">
                <form style="margin-top: 5px;" action="./care-calls-by-date" method="GET" enctype="multipart/form-data" autocomplete="off">
                    <div style="padding: 0px 0px 20px 5px; width:100%;">
                        <input type="date" value="<?php echo $today ?>" onchange='this.form.submit()' name="QueryDate" style="width: 150px; height:45px; background-color:inherit; border:none; font-size:18px; font-weight:600;" required />
                    </div>
                </form>
            </td>
            <td>
                <div style="font-weight: 600; margin-top:-15px; font-size:18px;">
                    <?php echo $formatted_Carertime . " hr"; ?>
                </div>
            </td>
        </tr>
    </table>
    <hr style="background-color:#000;margin-top: -12px; ">
    <div class="containerbox">
        <div class="content">
            <table>
                <tr>
                    <?php
                    $sel_carer_carecall_result = mysqli_query($conn, "SELECT * FROM tbl_schedule_calls 
                    WHERE (Clientshift_Date >= '$firstDateofMonth' AND Clientshift_Date <= '$lastDateofMonth' 
                    AND first_carer_Id = '$worker_specialId' AND col_company_Id = '$worker_companyId') 
                    GROUP BY Clientshift_Date ");
                    while ($trans = mysqli_fetch_array($sel_carer_carecall_result)) {
                        $ScdateOfCareCalls = "" . $trans['Clientshift_Date'] . "";
                        $dateOfCareCalls = date('d', strtotime("" . $trans['Clientshift_Date'] . ""));
                        if ($today == $ScdateOfCareCalls) {
                            echo "
                            <td style='padding:0px 10px 0px 0px;'>
                            <a href='./care-calls-by-date?QueryDate=$ScdateOfCareCalls' style='text-decoration:none;'>
                                <div style='width:35px; height:36px; text-align:center; border-radius:100%; background-color:green; color:white; padding:7px;'>
                                $dateOfCareCalls
                                </div>
                            </a>
                            </td>
                            ";
                        } else {
                            echo "
                            <td style='padding:0px 10px 0px 0px;'>
                            <a href='./care-calls-by-date?QueryDate=$ScdateOfCareCalls' style='text-decoration:none;'>
                                <div style='width:35px; height:36px; text-align:center; border-radius:100%; background-color:rgba(25, 42, 86,1.0); color:white; padding:7px;'>
                                $dateOfCareCalls
                                </div>
                            </a>
                            </td>
                            ";
                        }
                    } ?>
                </tr>
            </table>
        </div>
    </div>
</div>