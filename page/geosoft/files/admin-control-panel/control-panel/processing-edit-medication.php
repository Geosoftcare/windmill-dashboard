<?php

if (isset($_POST['btnEditClientMedicine'])) {

	include('dbconnections.php');

	$txtMed_Id =  mysqli_real_escape_string($conn, $_POST['txtMed_Id']);
	$txturyyToeSS4 =  mysqli_real_escape_string($conn, $_POST['uryyToeSS4']);
	$txtMedName =  mysqli_real_escape_string($conn, $_POST['txtMedName']);
	$txtMedDosage =  mysqli_real_escape_string($conn, $_POST['txtMedDosage']);
	$txtMedType =  mysqli_real_escape_string($conn, $_POST['txtMedType']);
	$txtMedFrequency =  mysqli_real_escape_string($conn, $_POST['txtMedFrequency']);
	$txtMedicineSupport =  mysqli_real_escape_string($conn, $_POST['txtMedicineSupport']);
	$txtMedPackage =  mysqli_real_escape_string($conn, $_POST['txtMedPackage']);

	$txtMorning = mysqli_real_escape_string($conn, $_REQUEST['txtMorning']);
	$txtLunch = mysqli_real_escape_string($conn, $_REQUEST['txtLunch']);
	$txtTea = mysqli_real_escape_string($conn, $_REQUEST['txtTea']);
	$txtBed = mysqli_real_escape_string($conn, $_REQUEST['txtBed']);

	$txtExM = mysqli_real_escape_string($conn, $_REQUEST['txtEM']);
	$txtExL = mysqli_real_escape_string($conn, $_REQUEST['txtEL']);
	$txtExT = mysqli_real_escape_string($conn, $_REQUEST['txtET']);
	$txtExB = mysqli_real_escape_string($conn, $_REQUEST['txtEB']);

	$txtMonday = mysqli_real_escape_string($conn, $_REQUEST['txtMonday']);
	$txtTuesday = mysqli_real_escape_string($conn, $_REQUEST['txtTuesday']);
	$txtWednesday = mysqli_real_escape_string($conn, $_REQUEST['txtWednesday']);
	$txtThursday = mysqli_real_escape_string($conn, $_REQUEST['txtThursday']);
	$txtFriday = mysqli_real_escape_string($conn, $_REQUEST['txtFriday']);
	$txtSaturday = mysqli_real_escape_string($conn, $_REQUEST['txtSaturday']);
	$txtSunday = mysqli_real_escape_string($conn, $_REQUEST['txtSunday']);
	$txtStartMed = mysqli_real_escape_string($conn, $_REQUEST['txtStartMed']);
	$txtEndMed = mysqli_real_escape_string($conn, $_REQUEST['txtEndMed']);

	$txtMedkDetails =  mysqli_real_escape_string($conn, $_POST['txtMedkDetails']);

	$txtPeriod = mysqli_real_escape_string($conn, $_REQUEST['txtPeriod']);
	$txtPeriodCategory = mysqli_real_escape_string($conn, $_REQUEST['txtPeriodCategory']);

	$clickDisplayDaily = mysqli_real_escape_string($conn, $_REQUEST['clickDisplayDaily']);
	$clickDisplayOneTime = mysqli_real_escape_string($conn, $_REQUEST['clickDisplayOneTime']);
	$clickDisplayCustom = mysqli_real_escape_string($conn, $_REQUEST['clickDisplayCustom']);


	if ($clickDisplayDaily) {
		$client_data_insertionQuery = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `med_name` = '$txtMedName', `med_dosage` = '$txtMedDosage', `med_type` = '$txtMedType', `med_support_required` = '$txtMedicineSupport', `med_package` = '$txtMedPackage', `med_details` = '$txtMedkDetails',
	  `care_call1`= '$txtMorning', `care_call2`= '$txtLunch', `care_call3`= '$txtTea', `care_call4`= '$txtBed', `extra_call1`= '$txtExM', `extra_call2`= '$txtExL', `extra_call3`= '$txtExT', `extra_call4`= '$txtExB', `monday` = '$txtMonday', `tuesday` = '$txtTuesday', `wednesday` = '$txtWednesday', `thursday` = '$txtThursday', `friday` = '$txtFriday'
	 , `saturday` = '$txtSaturday', `sunday` = '$txtSunday', `client_startMed` = '$txtStartMed', `client_endMed` = '$txtEndMed', `col_occurence` = '$txtStartMed', `col_period_two` = 'Daily' WHERE med_Id = '$_$txtMed_Id' ");

		if ($client_data_insertionQuery) {
			header("Location: ./client-medication?uryyToeSS4=$txturyyToeSS4");
		} else {
		}
	} else if ($clickDisplayOneTime) {
		$client_data_insertionQuery = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `med_name` = '$txtMedName', `med_dosage` = '$txtMedDosage', `med_type` = '$txtMedType', `med_support_required` = '$txtMedicineSupport', `med_package` = '$txtMedPackage', `med_details` = '$txtMedkDetails',
	  `care_call1`= '$txtMorning', `care_call2`= '$txtLunch', `care_call3`= '$txtTea', `care_call4`= '$txtBed', `extra_call1`= '$txtExM', `extra_call2`= '$txtExL', `extra_call3`= '$txtExT', `extra_call4`= '$txtExB', `monday` = '$txtMonday', `tuesday` = '$txtTuesday', `wednesday` = '$txtWednesday', `thursday` = '$txtThursday', `friday` = '$txtFriday'
	 , `saturday` = '$txtSaturday', `sunday` = '$txtSunday', `client_startMed` = '$txtStartMed', `client_endMed` = '$txtEndMed', `col_occurence` = '$txtStartMed', `col_period_two` = 'Monthly' WHERE med_Id = '$_$txtMed_Id' ");

		if ($client_data_insertionQuery) {
			header("Location: ./client-medication?uryyToeSS4=$txturyyToeSS4");
		} else {
		}
	} else if ($clickDisplayCustom) {
		$client_data_insertionQuery = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `med_name` = '$txtMedName', `med_dosage` = '$txtMedDosage', `med_type` = '$txtMedType', `med_support_required` = '$txtMedicineSupport', `med_package` = '$txtMedPackage', `med_details` = '$txtMedkDetails',
	  `care_call1`= '$txtMorning', `care_call2`= '$txtLunch', `care_call3`= '$txtTea', `care_call4`= '$txtBed', `extra_call1`= '$txtExM', `extra_call2`= '$txtExL', `extra_call3`= '$txtExT', `extra_call4`= '$txtExB', `monday` = '$txtMonday', `tuesday` = '$txtTuesday', `wednesday` = '$txtWednesday', `thursday` = '$txtThursday', `friday` = '$txtFriday'
	 , `saturday` = '$txtSaturday', `sunday` = '$txtSunday', `client_startMed` = '$txtStartMed', `client_endMed` = '$txtEndMed', `col_occurence` = '$txtStartMed', `col_period_one` = '$txtPeriod', `col_period_two` = '$txtPeriodCategory' WHERE med_Id = '$_$txtMed_Id' ");

		if ($client_data_insertionQuery) {
			header("Location: ./client-medication?uryyToeSS4=$txturyyToeSS4");
		} else {
		}
	}
}
