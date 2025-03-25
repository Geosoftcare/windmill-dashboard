<?php

if (isset($_POST['btnSubmitClientMedicine'])) {

    //include('dbconnections.php');

    $txtClientSocialId = mysqli_real_escape_string($conn, $_REQUEST['txtClientSocialId']);
    $txtMedName = mysqli_real_escape_string($conn, $_REQUEST['txtMedName']);
    $txtMedDosage = mysqli_real_escape_string($conn, $_REQUEST['txtMedDosage']);

    $txtMorning = mysqli_real_escape_string($conn, $_REQUEST['txtMorning']);
    $txtLunch = mysqli_real_escape_string($conn, $_REQUEST['txtLunch']);
    $txtTea = mysqli_real_escape_string($conn, $_REQUEST['txtTea']);
    $txtBed = mysqli_real_escape_string($conn, $_REQUEST['txtBed']);

    $txtExM = mysqli_real_escape_string($conn, $_REQUEST['txtEM']);
    $txtExL = mysqli_real_escape_string($conn, $_REQUEST['txtEL']);
    $txtExT = mysqli_real_escape_string($conn, $_REQUEST['txtET']);
    $txtExB = mysqli_real_escape_string($conn, $_REQUEST['txtEB']);

    $txtExtraVisit = mysqli_real_escape_string($conn, $_REQUEST['txtExtraVisit']);

    $txtMonday = mysqli_real_escape_string($conn, $_REQUEST['txtMonday']);
    $txtTuesday = mysqli_real_escape_string($conn, $_REQUEST['txtTuesday']);
    $txtWednesday = mysqli_real_escape_string($conn, $_REQUEST['txtWednesday']);
    $txtThursday = mysqli_real_escape_string($conn, $_REQUEST['txtThursday']);
    $txtFriday = mysqli_real_escape_string($conn, $_REQUEST['txtFriday']);
    $txtSaturday = mysqli_real_escape_string($conn, $_REQUEST['txtSaturday']);
    $txtSunday = mysqli_real_escape_string($conn, $_REQUEST['txtSunday']);
    $txtStartMed = mysqli_real_escape_string($conn, $_REQUEST['txtStartMed']);
    $txtEndMed = mysqli_real_escape_string($conn, $_REQUEST['txtEndMed']);

    $txtMedType = mysqli_real_escape_string($conn, $_REQUEST['txtMedType']);
    $txtMedicineSupport = mysqli_real_escape_string($conn, $_REQUEST['txtMedicineSupport']);
    $txtMedPackage = mysqli_real_escape_string($conn, $_REQUEST['txtMedPackage']);
    $txtMedkDetails = mysqli_real_escape_string($conn, $_REQUEST['txtMedkDetails']);

    $current_Date = mysqli_real_escape_string($conn, $_REQUEST['current_Date']);
    $current_Time = mysqli_real_escape_string($conn, $_REQUEST['current_Time']);

    $col_taskId = mysqli_real_escape_string($conn, $_REQUEST['col_taskId']);
    $mysocialIdEncrypt = mysqli_real_escape_string($conn, $_REQUEST['mysocialIdEncrypt']);

    $txtPeriod = mysqli_real_escape_string($conn, $_REQUEST['txtPeriod']);
    $txtPeriodCategory = mysqli_real_escape_string($conn, $_REQUEST['txtPeriodCategory']);

    $myMedskId = hash('sha256', $col_taskId);

    $med_colours = '#000';
    $med_visibility = 'Not updated';
    $varMedPath = 'medication-report-form';

    $clickDisplayDaily = mysqli_real_escape_string($conn, $_REQUEST['clickDisplayDaily']);
    $clickDisplayOneTime = mysqli_real_escape_string($conn, $_REQUEST['clickDisplayOneTime']);
    $clickDisplayCustom = mysqli_real_escape_string($conn, $_REQUEST['clickDisplayCustom']);

    if ($clickDisplayDaily) {
        ////////////////This is to insert data for daily activities///////////////////////////////////////////////////////
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $myCheck = "SELECT * FROM tbl_clients_medication_records WHERE (med_name = '$txtMedName' AND client_startMed = '$txtStartMed' AND client_endMed = '$txtEndMed' AND uryyToeSS4 = '$txtClientSocialId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ";
        $myCheckres = mysqli_query($conn, $myCheck);
        $countRes = mysqli_num_rows($myCheckres);
        if ($countRes) {
            echo "
          <script type='text/javascript'>
          $(document).ready(function() {
            $('#popupAlert').show();
          });
        </script>";
        } else {
            //
            //Check if current client social id is already in the database.
            $Client_special_Id_Check = mysqli_query($conn, "SELECT col_taskId FROM tbl_clients_medication_records ORDER BY med_Id DESC LIMIT 1");
            $row_get_Id = mysqli_fetch_array($Client_special_Id_Check);
            $col_taskId = $row_get_Id['col_taskId'];

            //If the current client social id is already in the database, then add new client by adding one integer to the current id.
            $myTaskIdentity = $col_taskId + 1;
            $col_taskIdentity = '00' . $myTaskIdentity;
            $queryIns = mysqli_query($conn, "INSERT INTO tbl_clients_medication_records (uryyToeSS4, med_name, med_dosage, med_type, med_support_required, med_package, med_details, date_uploaded, time_uploaded, monday, tuesday, wednesday, thursday, friday, saturday, sunday, client_startMed, client_endMed, col_occurence, col_period_one, col_period_two, col_taskId, col_path, col_company_Id) 
            VALUES('" . $txtClientSocialId . "', '" . $txtMedName . "', '" . $txtMedDosage . "', '" . $txtMedType . "', '" . $txtMedicineSupport . "', '" . $txtMedPackage . "', '" . $txtMedkDetails . "', '" . $current_Date . "', '" . $current_Time . "', '" . $txtMonday . "',  '" . $txtTuesday . "',  '" . $txtWednesday . "',  '" . $txtThursday . "',  '" . $txtFriday . "',  '" . $txtSaturday . "',  '" . $txtSunday . "', '" . $txtStartMed . "', '" . $txtEndMed . "', '" . $txtStartMed . "', '', 'Daily', '" . $col_taskIdentity . "', '" . $varMedPath . "', '" . $_SESSION['usr_compId'] . "')");
            if ($queryIns) {
                $updateMysqlTable1 = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `care_call1`= '$txtMorning', `care_call2`= '$txtLunch', `care_call3`= '$txtTea', `care_call4`= '$txtBed', `extra_call1`= '$txtExM', `extra_call2`= '$txtExL', `extra_call3`= '$txtExT', `extra_call4`= '$txtExB', `col_extra_visit`= '$txtExtraVisit', `med_colours`= '$med_colours', `visibility`= '$med_visibility' WHERE (`col_taskId` = '$col_taskIdentity' AND `col_company_Id` = '" . $_SESSION['usr_compId'] . "') ");
                if ($updateMysqlTable1) {
                    header("Location: ./client-medication?uryyToeSS4=$txtClientSocialId");
                } else {
                    header("Location: ./not-successful-page");
                }
            }
        }
    } else if ($clickDisplayOneTime) {
        ////////////////This is to insert data for one time activities///////////////////////////////////////////////////////
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $myCheck = "SELECT * FROM tbl_clients_medication_records WHERE (med_name = '$txtMedName' AND client_startMed = '$txtStartMed' AND client_endMed = '$txtEndMed' AND uryyToeSS4 = '$txtClientSocialId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ";
        $myCheckres = mysqli_query($conn, $myCheck);
        $countRes = mysqli_num_rows($myCheckres);
        if ($countRes) {
            echo "
          <script type='text/javascript'>
          $(document).ready(function() {
            $('#popupAlert').show();
          });
        </script>";
        } else {

            //$time = strtotime("2024-08-11");
            //$final = date("Y-m-d", strtotime("+1 month", $time));
            //Check if current client social id is already in the database.
            $Client_special_Id_Check = mysqli_query($conn, "SELECT col_taskId FROM tbl_clients_medication_records ORDER BY med_Id DESC LIMIT 1");
            $row_get_Id = mysqli_fetch_array($Client_special_Id_Check);
            $col_taskId = $row_get_Id['col_taskId'];

            //If the current client social id is already in the database, then add new client by adding one integer to the current id.
            $myTaskIdentity = $col_taskId + 1;
            $col_taskIdentity = '00' . $myTaskIdentity;
            $queryIns = mysqli_query($conn, "INSERT INTO tbl_clients_medication_records (uryyToeSS4, med_name, med_dosage, med_type, med_support_required, med_package, med_details, date_uploaded, time_uploaded, monday, tuesday, wednesday, thursday, friday, saturday, sunday, client_startMed, client_endMed, col_occurence, col_period_one, col_period_two, col_taskId, col_path, col_company_Id) 
            VALUES('" . $txtClientSocialId . "', '" . $txtMedName . "', '" . $txtMedDosage . "', '" . $txtMedType . "', '" . $txtMedicineSupport . "', '" . $txtMedPackage . "', '" . $txtMedkDetails . "', '" . $current_Date . "', '" . $current_Time . "', 'Monday',  'Tuesday',  'Wednesday',  'Thursday',  'Fridat',  'Saturday',  'Sunday', '" . $txtStartMed . "', '" . $txtEndMed . "', '" . $txtStartMed . "', '', 'Monthly', '" . $col_taskIdentity . "', '" . $varMedPath . "', '" . $_SESSION['usr_compId'] . "')");
            if ($queryIns) {
                $updateMysqlTable1 = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `care_call1`= '$txtMorning', `care_call2`= '$txtLunch', `care_call3`= '$txtTea', `care_call4`= '$txtBed', `extra_call1`= '$txtExM', `extra_call2`= '$txtExL', `extra_call3`= '$txtExT', `extra_call4`= '$txtExB', `col_extra_visit`= '$txtExtraVisit', `med_colours`= '$med_colours', `visibility`= '$med_visibility' WHERE (`col_taskId` = '$col_taskIdentity' AND `col_company_Id` = '" . $_SESSION['usr_compId'] . "') ");
                if ($updateMysqlTable1) {
                    header("Location: ./client-medication?uryyToeSS4=$txtClientSocialId");
                } else {
                    header("Location: ./not-successful-page");
                }
            }
        }
    } else if ($clickDisplayCustom) {
        ////////////////This is to insert data for every other days or weeks activities///////////////////////////////////////////////////////
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $myCheck = "SELECT * FROM tbl_clients_medication_records WHERE (med_name = '$txtMedName' AND client_startMed = '$txtStartMed' AND client_endMed = '$txtEndMed' AND uryyToeSS4 = '$txtClientSocialId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ";
        $myCheckres = mysqli_query($conn, $myCheck);
        $countRes = mysqli_num_rows($myCheckres);
        if ($countRes) {
            echo "
          <script type='text/javascript'>
          $(document).ready(function() {
            $('#popupAlert').show();
          });
        </script>";
        } else {

            $occurrence = '+ ' . $txtPeriod . ' ' . $txtPeriodCategory;
            //echo $occurrence . "<Br><br>";
            $Timestamp = strtotime(date('Y-m-d'));
            $TotalTimeStamp = strtotime($occurrence, $Timestamp);
            $occurrenceDate = date('Y-d-m', $TotalTimeStamp);
            //Check if current client social id is already in the database.
            $Client_special_Id_Check = mysqli_query($conn, "SELECT col_taskId FROM tbl_clients_medication_records ORDER BY med_Id DESC LIMIT 1");
            $row_get_Id = mysqli_fetch_array($Client_special_Id_Check);
            $col_taskId = $row_get_Id['col_taskId'];

            //If the current client social id is already in the database, then add new client by adding one integer to the current id.
            $myTaskIdentity = $col_taskId + 1;
            $col_taskIdentity = '00' . $myTaskIdentity;
            $queryIns = mysqli_query($conn, "INSERT INTO tbl_clients_medication_records (uryyToeSS4, med_name, med_dosage, med_type, med_support_required, med_package, med_details, date_uploaded, time_uploaded, monday, tuesday, wednesday, thursday, friday, saturday, sunday, client_startMed, client_endMed, col_occurence, col_period_one, col_period_two, col_taskId, col_path, col_company_Id) 
                VALUES('" . $txtClientSocialId . "', '" . $txtMedName . "', '" . $txtMedDosage . "', '" . $txtMedType . "', '" . $txtMedicineSupport . "', '" . $txtMedPackage . "', '" . $txtMedkDetails . "', '" . $current_Date . "', '" . $current_Time . "', '" . $txtMonday . "',  '" . $txtTuesday . "',  '" . $txtWednesday . "',  '" . $txtThursday . "',  '" . $txtFriday . "',  '" . $txtSaturday . "',  '" . $txtSunday . "', '" . $txtStartMed . "', '" . $txtEndMed . "', '" . $txtStartMed . "', '$txtPeriod', '$txtPeriodCategory', '" . $col_taskIdentity . "', '" . $varMedPath . "', '" . $_SESSION['usr_compId'] . "')");
            if ($queryIns) {
                $updateMysqlTable1 = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `care_call1`= '$txtMorning', `care_call2`= '$txtLunch', `care_call3`= '$txtTea', `care_call4`= '$txtBed', `extra_call1`= '$txtExM', `extra_call2`= '$txtExL', `extra_call3`= '$txtExT', `extra_call4`= '$txtExB', `col_extra_visit`= '$txtExtraVisit', `med_colours`= '$med_colours', `visibility`= '$med_visibility' WHERE (`col_taskId` = '$col_taskIdentity' AND `col_company_Id` = '" . $_SESSION['usr_compId'] . "') ");
                if ($updateMysqlTable1) {
                    header("Location: ./client-medication?uryyToeSS4=$txtClientSocialId");
                } else {
                    header("Location: ./not-successful-page");
                }
            }
        }
    } else {
        echo "
        <script type='text/javascript'>
            $(document).ready(function() {
                $('#popupAlertFrequency').show();
            });
        </script>";
    }
}
