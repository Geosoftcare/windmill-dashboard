<?php include('header-contents.php'); ?>

<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h4 class="m-b-10">Invoice dashboard
                                <br>
                                <small>
                                    Select a date range and contract and generate an invoice
                                </small>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <hr>
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- prject ,team member start -->
            <div class="col-md-3">
                <div class="form-cover" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px; padding:25px 15px 25px 15px; border-radius:12px;">
                    <form action="./set-dashboard-cookie" method="post" enctype="multipart/form-data" autocomplete="off" name="formData">
                        <div class="row">
                            <div class="col-md-12 col-xl-12">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Period Start<span style="color: red;"> *</span></label>
                                    <input type="date" name="txtPeriodStart" value="<?php print $txtStartDate; ?>" required class="form-control" id="exampleInputPassword1" />
                                </div>
                            </div>
                            <div class="col-md-12 col-xl-12">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Period End<span style="color: red;"> *</span></label>
                                    <input type="date" name='txtIDPeriodEnd' onchange='this.form.submit()' value="<?php print $txtEndDate; ?>" required class="form-control" id="exampleInputPassword1" />
                                </div>
                            </div>
                            <div style="margin-top:15px;" class="col-md-12 col-xl-12">
                                <label for="exampleInputContract">Contract<span style="color: red;"></span></label>
                                <select name="txtClientContract" class="form-control" id="exampleFormControlSelect1">
                                    <option value='<?php print $txtClientContract; ?>' selected='selected'>Select...</option>
                                    <option value='Checked in'>Select All</option>
                                    <?php
                                    $getContract = mysqli_query($conn, "SELECT * FROM tbl_invoice_rate WHERE (col_company_id = '" . $_SESSION['usr_compId'] . "') ORDER BY userId ASC");
                                    while ($fetchData = mysqli_fetch_array($getContract)) {
                                        echo "
                                            <option value='" . $fetchData['col_name'] . "'>" . $fetchData['col_name'] . "</option>
                                        ";
                                    }
                                    ?>
                                    <!--<option value='Null'>Select all</option>-->
                                </select>
                            </div>
                            <div style="margin-top:25px;" class="col-md-12 col-xl-12">
                                <label for="exampleInputPassword1">Care recipient<span style="color: red;"></span></label>
                                <select name="txtCareRecipient" class="form-control" id="exampleFormControlSelect1">
                                    <option value='<?php print $txtCareRecipient; ?>' selected='selected'>Select...</option>
                                    <option value='Checked in'>All</option>
                                    <?php
                                    $getCareRecipient = mysqli_query($conn, "SELECT * FROM tbl_daily_shift_records WHERE (shift_date >= '$txtStartDate' AND shift_date <= '$txtEndDate' AND col_company_id = '" . $_SESSION['usr_compId'] . "') GROUP BY client_name ASC");
                                    while ($fetchData = mysqli_fetch_array($getCareRecipient)) {
                                        echo "
                                            <option value='" . $fetchData['uryyToeSS4'] . "'>" . $fetchData['client_name'] . "</option>
                                        ";
                                    }
                                    ?>
                                    <!--<option value='Null'>Select all</option>-->
                                </select>
                                <input type="hidden" name="txtCompanyId" value="<?php print $_SESSION['usr_compId']; ?>">
                            </div>
                        </div>
                        <div class="col-md-12 col-xl-12">
                            <br>
                            <div class="form-group">
                                <input type="submit" name="btnFetchInvoiceData" class="btn btn-small btn-info" value="Fetch data" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-xl-9 col-md-9">
                <div class="row">
                    <div class="col-xl-4 col-md-4">
                        <div class="card flat-card widget-primary-card">
                            <div class="row-table">
                                <div class="col-sm-3 card-body">
                                    <i class="feather icon-credit-card"></i>
                                </div>
                                <div class="col-sm-9">
                                    <h4>
                                        <?php
                                        echo '£' . $total_invoice_payment;
                                        ?>
                                        <br>
                                        <small style="font-size:16px; font-weight:600;">
                                            Balance
                                        </small>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4">
                        <div class="card flat-card widget-purple-card">
                            <div class="row-table">
                                <div class="col-sm-3 card-body">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <div class="col-sm-9">
                                    <h4>
                                        <?php
                                        echo $formatted_invoice_time;
                                        ?>
                                        <br>
                                        <small style="font-size:16px; font-weight:600;">
                                            Hour
                                        </small>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4">
                        <div style="background-color:rgba(52, 152, 219,1.0); color:#fff;" class="card flat-card widget-blue-card">
                            <div class="row-table">
                                <div style="background-color:rgba(41, 128, 185,1.0); color:#fff;" class="col-sm-3 card-body">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </div>
                                <div class="col-sm-9">
                                    <h4>
                                        <?php
                                        $sql_get_total_visits = "SELECT COUNT(*) AS total_visits FROM tbl_daily_shift_records 
                                        WHERE shift_date BETWEEN ? AND ? AND (uryyToeSS4 = ? OR shift_status = ?) 
                                        AND col_visit_confirmation = 'Confirmed' AND col_company_id = ?";

                                        if ($stmt = mysqli_prepare($conn, $sql_get_total_visits)) {
                                            mysqli_stmt_bind_param($stmt, "sssss", $txtStartDate, $txtEndDate, $txtCareRecipient, $txtCareRecipient, $_SESSION['usr_compId']);
                                            mysqli_stmt_execute($stmt);
                                            mysqli_stmt_bind_result($stmt, $total_visits);
                                            mysqli_stmt_fetch($stmt);
                                            printf($total_visits);
                                            mysqli_stmt_close($stmt);
                                        }
                                        ?>
                                        <br>
                                        <small style="font-size:16px; font-weight:600;">
                                            Visit
                                        </small>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <form action="./processing-generate-invoice" id="InvoiceForm" method="post" enctype="multipart/form-data" autocomplete="off"></form>

                <div class="card-header">
                    <div class="row">
                        <div class="col-md-2 col-xl-2"></div>
                        <div class="col-md-2 col-xl-2"></div>
                        <div class="col-md-2 col-xl-2"></div>
                        <div class="col-md-2 col-xl-2"></div>
                        <div style="padding: 0;" class="col-md-2 col-xl-2">
                            <div style="width: 100%; height:auto; padding:2px; text-align:right;">
                                <form action="./processing-restore-visits" method="post" enctype="multipart/form-data" autocomplete="off">
                                    <input type="hidden" name="txtCompanyId" value="<?php print $_SESSION['usr_compId']; ?>">
                                    <input type="hidden" name="txtPeriodStart" value="<?php print $txtStartDate; ?>">
                                    <input type="hidden" name="txtPeriodEnd" value="<?php print $txtEndDate; ?>">
                                    <input type="hidden" name="txtCareGiverId" value="<?php print $varCarerrRunId; ?>">
                                    <button type="submit" name="btnRestoreVisits" style="width: 130px;" class="btn btn-info">Restore visits</button>
                                </form>
                            </div>
                        </div>
                        <div style="padding: 0;" class="col-md-2 col-xl-2">
                            <div style="width: 100%; height:auto; padding:2px; text-align:right;">
                                <button form="InvoiceForm" type="submit" name="btnGenerateInvoice" class="btn btn-secondary btn-small">Generate invoice</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover mb-0">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="selectAllCheckbox"></th>
                                    <th>Care recipient</th>
                                    <th>Caregiver</th>
                                    <th>Date</th>
                                    <th>Charged time</th>
                                    <th>Rate</th>
                                    <th>Mileage</th>
                                    <th class="text-left">Total</th>
                                    <th>More</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
                                    $page_no = $_GET['page_no'];
                                } else {
                                    $page_no = 1;
                                }
                                $number_displayed_per_page = 20;
                                $total_records_per_page = $number_displayed_per_page;
                                $offset = ($page_no - 1) * $total_records_per_page;
                                $previous_page = $page_no - 1;
                                $next_page = $page_no + 1;
                                $adjacents = "2";

                                //col_client_payer = '$txtClientContract' OR 

                                $result_count = mysqli_query($conn, "SELECT COUNT(DISTINCT carer_Name) As total_records 
                                FROM tbl_daily_shift_records WHERE ((shift_date >= '$txtStartDate' AND shift_date <= '$txtEndDate') 
                                AND (uryyToeSS4 = '$txtCareRecipient' OR shift_status = '$txtCareRecipient') 
                                AND col_visit_confirmation = 'Confirmed' AND `col_company_Id` = '" . $_SESSION['usr_compId'] . "') ");
                                $total_records = mysqli_fetch_array($result_count);
                                $total_records = $total_records['total_records'];
                                $total_no_of_pages = ceil($total_records / $total_records_per_page);
                                $second_last = $total_no_of_pages - 1; // total page minus 1

                                $result = mysqli_query($conn, "SELECT * FROM tbl_daily_shift_records WHERE ((shift_date BETWEEN '$txtStartDate' 
                                AND '$txtEndDate') AND (uryyToeSS4 = '$txtCareRecipient' OR shift_status = '$txtCareRecipient') 
                                AND col_visit_confirmation = 'Confirmed' AND (col_client_payer = '$txtClientContract' OR shift_status = '$txtClientContract') 
                                AND `col_company_Id` = '" . $_SESSION['usr_compId'] . "') GROUP BY carer_Name ORDER BY client_name LIMIT $offset, $total_records_per_page");
                                while ($row = mysqli_fetch_array($result)) {
                                    $carer_userId = $row['userId'];
                                    $client_specialId = $row['uryyToeSS4'];
                                    $varCareRate = $row['col_carecall_rate'];
                                    $col_client_payer = $row['col_client_payer'];
                                    $col_client_rate = $row['col_client_rate'];
                                    $txtShiftDate = $row['shift_date'];
                                    $client_name = $row['client_name'];
                                    $col_carecall_rate = $row['col_carecall_rate'];
                                    $col_worked_time = $row['col_worked_time'];
                                    $col_carer_Id = $row['col_carer_Id'];
                                    $uryyToeSS4 = $row['uryyToeSS4'];
                                    $varCareCallRate = round((float)$varCareRate, 2);
                                    $varShiftDate = date('d M', strtotime("" . $row['shift_date'] . ""));
                                    $varClientCallRate = number_format((float)$col_client_rate, 2, '.', '');

                                    $sql_total_balance = mysqli_query($conn, "SELECT SUM(`col_client_rate`) AS total_payment FROM `tbl_daily_shift_records` 
                                    WHERE (uryyToeSS4 = '$client_specialId' AND col_visit_confirmation = 'Confirmed' 
                                    AND `col_company_Id` = '" . $_SESSION['usr_compId'] . "') ");
                                    $row_total_balance = mysqli_fetch_array($sql_total_balance, MYSQLI_ASSOC);
                                    $total_clientPayment = number_format(round($row_total_balance['total_payment']));

                                    $sql_total_hour = mysqli_query($conn, "SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(`planned_timeOut`, `planned_timeIn`)))) AS total_worked_hours FROM `tbl_daily_shift_records` WHERE (uryyToeSS4 = '$client_specialId' AND col_visit_confirmation = 'Confirmed' AND `col_company_Id` = '" . $_SESSION['usr_compId'] . "') ");
                                    $row_total_hour = mysqli_fetch_array($sql_total_hour, MYSQLI_ASSOC);
                                    $total_hours = $row_total_hour['total_worked_hours'];
                                    // Split the time into hours, minutes, and seconds
                                    list($hours, $minutes, $seconds) = explode(':', $total_hours);
                                    // Convert the time into seconds
                                    $total_seconds = $hours * 3600 + $minutes * 60 + $seconds; // Outputs: 9045

                                    $hours = floor($total_seconds / 3600);
                                    $minutes = floor(($total_seconds % 3600) / 60);
                                    $seconds = $total_seconds % 60;

                                    $formatted_Carertime = sprintf('%02d:%02d', $hours, $minutes, $seconds);

                                    $sql_total_mileage = mysqli_query($conn, "SELECT SUM(`col_mileage`) AS total_mileage FROM `tbl_daily_shift_records` WHERE (uryyToeSS4 = '$client_specialId' AND `col_company_Id` = '" . $_SESSION['usr_compId'] . "') ");
                                    $row_total_mileage = mysqli_fetch_array($sql_total_mileage, MYSQLI_ASSOC);
                                    $total_carerMileage = number_format((float)$row_total_mileage['total_mileage'], 2, '.', '');
                                    $varTotalMiles = $total_carerMileage / 0.25;

                                    $varTotalAmount = $varClientCallRate + $total_carerMileage;

                                    echo "<tr>
                                    <td>
                                        <input type='checkbox' form='InvoiceForm' class='checkboxes' name='txtGenerateId[]' value='" . $client_specialId . "' />
                                        <input type='hidden' form='InvoiceForm' name='txtClientPayer_$client_specialId' value='$col_client_payer'> 
                                        <input type='hidden' form='InvoiceForm' name='txtClientPayRate_$client_specialId' value='$col_client_rate'>
                                        <input type='hidden' form='InvoiceForm' name='txtShiftDate_$client_specialId' value='$txtShiftDate'>
                                        <input type='hidden' form='InvoiceForm' name='txtClientName_$client_specialId' value='$client_name'> 
                                        <input type='hidden' form='InvoiceForm' name='txtCareCallRate_$client_specialId' value='$col_carecall_rate'> 
                                        <input type='hidden' form='InvoiceForm' name='txtWorkedTime_$client_specialId' value='$col_worked_time'>
                                        
                                        <input type='hidden' form='InvoiceForm' name='txtInStartDate_$client_specialId' value='$txtStartDate'> 
                                        <input type='hidden' form='InvoiceForm' name='txtInEndDate_$client_specialId' value='$txtEndDate'> 

                                        <input type='hidden' form='InvoiceForm' name='txtCarerId_$client_specialId' value='$col_carer_Id'> 
                                        <input type='hidden' form='InvoiceForm' name='txtClientId_$client_specialId' value='$uryyToeSS4'> 
                                        <input type='hidden' form='InvoiceForm' name='txtCompanyId_$client_specialId' value='" . $_SESSION['usr_compId'] . "'> 
                                    </td>
                                    <td>" . $row['client_name'] . "</td>
                                    <td>" . $row['carer_Name'] . "</td>
                                    <td>" . $varShiftDate . "</td>
                                    <td>
                                        " . $row['planned_timeIn'] . " &rarr; " . $row['planned_timeOut'] . "
                                        <br><span style='color:rgba(44, 62, 80,.9);'>" . $row['col_worked_time'] . "</span>
                                    </td>
                                    <td>£" . $varClientCallRate . "</td>
                                    <td>£" . $total_carerMileage . "</td>
                                    <td>£" . $varTotalAmount . "</td>
                                    <td>
                                        <form action='./processing-restore-single-visit' method='POST' enctype='multipart/form-data' autocomplete='off'>
                                            <input type='hidden' name='txtUserId' value='$carer_userId'>
                                            <input type='hidden' name='txtCarerSpecialId' value='$client_specialId'>
                                            <button title='Restore to confirmation' name= 'btnRestoreSingleVisit' type='submit' class='btn btn-info btn-sm'><i class='feather mr-2 icon-x'></i></button>
                                            <a href='./view-carer-visit-details?userId=" . $carer_userId . "'>
                                                <button title='View visit details' type='button' class='btn btn-primary btn-sm'><i class='feather mr-2 icon-eye'></i></button>
                                            </a>
                                        </form>
                                    </td>
                                    </tr>";
                                }
                                mysqli_close($conn);
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th>Care recipient</th>
                                    <th>Caregiver</th>
                                    <th>Date</th>
                                    <th>Charged time</th>
                                    <th>Rate</th>
                                    <th>Mileage</th>
                                    <th class="text-left">Total</th>
                                    <th>More</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <br>
                <div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
                    <strong>Page <?php echo $page_no . " of " . $total_no_of_pages; ?></strong>
                </div>

                <ul class="pagination">
                    <li <?php if ($page_no <= 1) {
                            echo "class='disabled'";
                        } ?>>
                        <a <?php if ($page_no > 1) {
                                echo "href='?page_no=$previous_page'";
                            } ?>>Previous</a>
                    </li>

                    <?php
                    if ($total_no_of_pages <= $number_displayed_per_page) {
                        for ($counter = 1; $counter <= $total_no_of_pages; $counter++) {
                            if ($counter == $page_no) {
                                echo "<li class='active'><a>$counter</a></li>";
                            } else {
                                echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                            }
                        }
                    } elseif ($total_no_of_pages > $number_displayed_per_page) {

                        if ($page_no <= 4) {
                            for ($counter = 1; $counter < 8; $counter++) {
                                if ($counter == $page_no) {
                                    echo "<li class='active'><a>$counter</a></li>";
                                } else {
                                    echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                                }
                            }
                            echo "<li><a>...</a></li>";
                            echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
                            echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
                        } elseif ($page_no > 4 && $page_no < $total_no_of_pages - 4) {
                            echo "<li><a href='?page_no=1'>1</a></li>";
                            echo "<li><a href='?page_no=2'>2</a></li>";
                            echo "<li><a>...</a></li>";
                            for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {
                                if ($counter == $page_no) {
                                    echo "<li class='active'><a>$counter</a></li>";
                                } else {
                                    echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                                }
                            }
                            echo "<li><a>...</a></li>";
                            echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
                            echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
                        } else {
                            echo "<li><a href='?page_no=1'>1</a></li>";
                            echo "<li><a href='?page_no=2'>2</a></li>";
                            echo "<li><a>...</a></li>";

                            for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
                                if ($counter == $page_no) {
                                    echo "<li class='active'><a>$counter</a></li>";
                                } else {
                                    echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                                }
                            }
                        }
                    }
                    ?>

                    <li <?php if ($page_no >= $total_no_of_pages) {
                            echo "class='disabled'";
                        } ?>>
                        <a <?php if ($page_no < $total_no_of_pages) {
                                echo "href='?page_no=$next_page'";
                            } ?>>Next</a>
                    </li>
                    <?php if ($page_no < $total_no_of_pages) {
                        echo "<li><a href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
                    } ?>
                </ul>
            </div>
        </div>
        <!-- Latest Customers end -->

        <div style="margin-top: 200px;"></div>


    </div>
</div>

<?php include('footer-contents.php'); ?>