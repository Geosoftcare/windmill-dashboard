<?php

if (isset($_POST['btnSubmitClientTastForm'])) {

  $txtClientSocialId = mysqli_real_escape_string($conn, $_REQUEST['txtClientSocialId']);
  $txtTask = mysqli_real_escape_string($conn, $_REQUEST['txtTask']);
  $txtTaskDetails = mysqli_real_escape_string($conn, $_REQUEST['txtTaskDetails']);

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

  $txtAnytimeSession = "Anytime/Session";
  $txtStarts = mysqli_real_escape_string($conn, $_REQUEST['txtStarts']);
  $txtEnd = mysqli_real_escape_string($conn, $_REQUEST['txtEnd']);
  $current_Date = mysqli_real_escape_string($conn, $_REQUEST['current_Date']);
  $current_Time = mysqli_real_escape_string($conn, $_REQUEST['current_Time']);

  $col_taskId = mysqli_real_escape_string($conn, $_REQUEST['col_taskId']);
  $mysocialIdEncrypt = mysqli_real_escape_string($conn, $_REQUEST['mysocialIdEncrypt']);

  $txtPeriod = mysqli_real_escape_string($conn, $_REQUEST['txtPeriod']);
  $txtPeriodCategory = mysqli_real_escape_string($conn, $_REQUEST['txtPeriodCategory']);

  $frequency = $txtMorning . " " . $txtLunch . " " . $txtTea . " " . $txtBed;
  $myTaskId = hash('sha256', $col_taskId);

  $task_colours = '#000';
  $task_visibility = 'Not updated';
  $varTaskPath = 'task-report-form';

  $clickDisplayDaily = mysqli_real_escape_string($conn, $_REQUEST['clickDisplayDaily']);
  $clickDisplayOneTime = mysqli_real_escape_string($conn, $_REQUEST['clickDisplayOneTime']);
  $clickDisplayCustom = mysqli_real_escape_string($conn, $_REQUEST['clickDisplayCustom']);

  if ($clickDisplayDaily) {
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $myCheck = "SELECT * FROM tbl_clients_task_records WHERE (client_taskName = '$txtTask' AND task_startDate = '$txtStartMed' AND task_endDate = '$txtEndMed' AND uryyToeSS4 = '$txtClientSocialId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ";
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
      //Check if current client social id is already in the database.
      $Client_special_Id_Check = mysqli_query($conn, "SELECT col_taskId FROM tbl_clients_task_records ORDER BY client_Id DESC LIMIT 1");
      $row_get_Id = mysqli_fetch_array($Client_special_Id_Check);
      $col_taskId = $row_get_Id['col_taskId'];

      //If the current client social id is already in the database, then add new client by adding one integer to the current id.
      $myTaskIdentity = $col_taskId + 1;
      $client_med_Identity = '00' . $myTaskIdentity;
      $queryIns = mysqli_query($conn, "INSERT INTO tbl_clients_task_records (uryyToeSS4, client_taskName, client_task_details, monday, tuesday, wednesday, thursday, friday, saturday, sunday, tast_anytimeSession, task_startDate, task_endDate, col_occurence, col_period_one, col_period_two, col_taskId, col_path, col_company_Id) 
      VALUES('" . $txtClientSocialId . "', '" . $txtTask . "', '" . $txtTaskDetails . "', '" . $txtMonday . "', '" . $txtTuesday . "', '" . $txtWednesday . "', '" . $txtThursday . "', '" . $txtFriday . "', '" . $txtSaturday . "', '" . $txtSunday . "', '" . $txtAnytimeSession . "', '" . $txtStarts . "', '" . $txtEnd . "', '" . $txtStarts . "', '', 'Daily', '" . $client_med_Identity . "', '" . $varTaskPath . "', '" . $_SESSION['usr_compId'] . "') ");
      if ($queryIns) {
        $updateMysqlTable1 = mysqli_query($conn, "UPDATE `tbl_clients_task_records` SET `care_call1`= '$txtMorning', `care_call2`= '$txtLunch', `care_call3`= '$txtTea', `care_call4`= '$txtBed', `extra_call1`= '$txtExM', `extra_call2`= '$txtExL', `extra_call3`= '$txtExT', `extra_call4`= '$txtExB', `col_extra_visit`= '$txtExtraVisit', `task_colours`= '$task_colours', `visibility`= '$task_visibility' WHERE (`col_taskId` = '$client_med_Identity' AND `col_company_Id` = '" . $_SESSION['usr_compId'] . "') ");
        if ($updateMysqlTable1) {
          header("Location: ./client-task?uryyToeSS4=$txtClientSocialId");
        } else {
          header("Location: ./not-successful-page");
        }
      }
    }
  } else if ($clickDisplayOneTime) {
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $myCheck = "SELECT * FROM tbl_clients_task_records WHERE (client_taskName = '$txtTask' AND task_startDate = '$txtStartMed' AND task_endDate = '$txtEndMed' AND uryyToeSS4 = '$txtClientSocialId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ";
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
      //Check if current client social id is already in the database.
      $Client_special_Id_Check = mysqli_query($conn, "SELECT col_taskId FROM tbl_clients_task_records ORDER BY client_Id DESC LIMIT 1");
      $row_get_Id = mysqli_fetch_array($Client_special_Id_Check);
      $col_taskId = $row_get_Id['col_taskId'];

      //If the current client social id is already in the database, then add new client by adding one integer to the current id.
      $myTaskIdentity = $col_taskId + 1;
      $client_med_Identity = '00' . $myTaskIdentity;
      $queryIns = mysqli_query($conn, "INSERT INTO tbl_clients_task_records (uryyToeSS4, client_taskName, client_task_details, monday, tuesday, wednesday, thursday, friday, saturday, sunday, tast_anytimeSession, task_startDate, task_endDate, col_occurence, col_period_one, col_period_two, col_taskId, col_path, col_company_Id) 
      VALUES('" . $txtClientSocialId . "', '" . $txtTask . "', '" . $txtTaskDetails . "', 'Monday',  'Tuesday',  'Wednesday',  'Thursday',  'Fridat',  'Saturday',  'Sunday', '" . $txtAnytimeSession . "', '" . $txtStarts . "', '" . $txtEnd . "', '" . $txtStarts . "', '', 'Monthly', '" . $client_med_Identity . "', '" . $varTaskPath . "', '" . $_SESSION['usr_compId'] . "') ");
      if ($queryIns) {
        $updateMysqlTable1 = mysqli_query($conn, "UPDATE `tbl_clients_task_records` SET `care_call1`= '$txtMorning', `care_call2`= '$txtLunch', `care_call3`= '$txtTea', `care_call4`= '$txtBed', `extra_call1`= '$txtExM', `extra_call2`= '$txtExL', `extra_call3`= '$txtExT', `extra_call4`= '$txtExB', `col_extra_visit`= '$txtExtraVisit', `task_colours`= '$task_colours', `visibility`= '$task_visibility' WHERE (`col_taskId` = '$client_med_Identity' AND `col_company_Id` = '" . $_SESSION['usr_compId'] . "') ");
        if ($updateMysqlTable1) {
          header("Location: ./client-task?uryyToeSS4=$txtClientSocialId");
        } else {
          header("Location: ./not-successful-page");
        }
      }
    }
  } else if ($clickDisplayCustom) {
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $myCheck = "SELECT * FROM tbl_clients_task_records WHERE (client_taskName = '$txtTask' AND task_startDate = '$txtStartMed' AND task_endDate = '$txtEndMed' AND uryyToeSS4 = '$txtClientSocialId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ";
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
      $Client_special_Id_Check = mysqli_query($conn, "SELECT col_taskId FROM tbl_clients_task_records ORDER BY client_Id DESC LIMIT 1");
      $row_get_Id = mysqli_fetch_array($Client_special_Id_Check);
      $col_taskId = $row_get_Id['col_taskId'];

      //If the current client social id is already in the database, then add new client by adding one integer to the current id.
      $myTaskIdentity = $col_taskId + 1;
      $client_med_Identity = '00' . $myTaskIdentity;
      $queryIns = mysqli_query($conn, "INSERT INTO tbl_clients_task_records (uryyToeSS4, client_taskName, client_task_details, monday, tuesday, wednesday, thursday, friday, saturday, sunday, tast_anytimeSession, task_startDate, task_endDate, col_occurence, col_period_one, col_period_two, col_taskId, col_path, col_company_Id) 
      VALUES('" . $txtClientSocialId . "', '" . $txtTask . "', '" . $txtTaskDetails . "', '" . $txtMonday . "', '" . $txtTuesday . "', '" . $txtWednesday . "', '" . $txtThursday . "', '" . $txtFriday . "', '" . $txtSaturday . "', '" . $txtSunday . "', '" . $txtAnytimeSession . "', '" . $txtStarts . "', '" . $txtEnd . "', '" . $txtStarts . "', '$txtPeriod', '$txtPeriodCategory', '" . $client_med_Identity . "', '" . $varTaskPath . "', '" . $_SESSION['usr_compId'] . "') ");
      if ($queryIns) {
        $updateMysqlTable1 = mysqli_query($conn, "UPDATE `tbl_clients_task_records` SET `care_call1`= '$txtMorning', `care_call2`= '$txtLunch', `care_call3`= '$txtTea', `care_call4`= '$txtBed', `extra_call1`= '$txtExM', `extra_call2`= '$txtExL', `extra_call3`= '$txtExT', `extra_call4`= '$txtExB', `col_extra_visit`= '$txtExtraVisit', `task_colours`= '$task_colours', `visibility`= '$task_visibility' WHERE (`col_taskId` = '$client_med_Identity' AND `col_company_Id` = '" . $_SESSION['usr_compId'] . "') ");
        if ($updateMysqlTable1) {
          header("Location: ./client-task?uryyToeSS4=$txtClientSocialId");
        } else {
          header("Location: ./not-successful-page");
        }
      }
    }
  }
}
