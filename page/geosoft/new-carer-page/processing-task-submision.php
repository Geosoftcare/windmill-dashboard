<?php


if (isset($_POST['btnSubmitTaskNote'])) {

    $txtTaskName = mysqli_real_escape_string($conn, $_POST['txtTaskName']);
    $txtTaskDate = mysqli_real_escape_string($conn, $_POST['txtTaskDate']);
    $txtTaskTimeIn = mysqli_real_escape_string($conn, $_POST['txtTaskTimeIn']);
    $txtTaskNote = mysqli_real_escape_string($conn, $_POST['txtTaskNote']);
    $txtTaskId = mysqli_real_escape_string($conn, $_POST['txtTaskId']);

    $txtClientId = mysqli_real_escape_string($conn, $_POST['txtClientId']);
    $txtCarerEmail = mysqli_real_escape_string($conn, $_POST['txtCarerEmail']);
    $txtTask = "Task";
    $txtVisibility = "Updated";

    $txtDosage = "Null";
    $txtCarerName = mysqli_real_escape_string($conn, $_POST['txtCarerName']);
    $mycheckNObox = mysqli_real_escape_string($conn, $_POST['txtcheckNObox']);
    $mycheckYesbox = mysqli_real_escape_string($conn, $_POST['txtcheckYesbox']);

    $txtcare_call1 = "Breakfast";
    $txtcare_call2 = "Lunch";
    $txtcare_call3 = "Tea";
    $txtcare_call4 = "Bed";
    $txtmonday = "Monday";
    $txttuesday = "Tuesday";
    $txtwednesday = "Wednesday";
    $txtthursday = "Thursday";
    $txtfriday = "Friday";
    $txtsaturday = "Saturday";
    $txtsunday = "Sunday";
    $txtTaskStatus = "Updated";

    $myCheck = "SELECT * FROM tbl_finished_tasks WHERE task_SpecialId = '" . $txtTaskId . "' AND team_1email !='' ";
    $myCheckres = mysqli_query($conn, $myCheck);
    $countRes = mysqli_num_rows($myCheckres);

    if ($countRes != 0) {
        $sql = mysqli_query($conn, "UPDATE `tbl_finished_tasks` SET `team_2email` = '$txtCarerEmail' WHERE task_SpecialId = '$txtTaskId' ");
        if ($sql) {
            header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
        }
    } else {

        if ($mycheckNObox) {
            $queryIns = mysqli_query($conn, "INSERT INTO tbl_finished_tasks (task_name, task_date, task_timeIn, task_note, task_SpecialId, uryyToeSS4, team_1email, category, col_dosage, col_carername, col_outcome, care_call1, care_call2, care_call3, care_call4, monday, tuesday, wednesday, thursday, friday, saturday, sunday, col_task_status) 
            VALUES('" . $txtTaskName . "', '" . $txtTaskDate . "', '" . $txtTaskTimeIn . "', '" . $txtTaskNote . "', '" . $txtTaskId . "', '" . $txtClientId . "', '" . $txtCarerEmail . "', '" . $txtTask . "', '" . $txtDosage . "', '" . $txtCarerName . "', '" . $mycheckNObox . "', '" . $txtcare_call1 . "', '" . $txtcare_call2 . "', '" . $txtcare_call3 . "', '" . $txtcare_call4 . "', '" . $txtmonday . "', '" . $txttuesday . "', '" . $txtwednesday . "', '" . $txtthursday . "', '" . $txtfriday . "', '" . $txtsaturday . "', '" . $txtsunday . "', '" . $txtTaskStatus . "') ");
            if ($queryIns) {
                $sqlUpdate = mysqli_query($conn, "UPDATE `tbl_clients_task_records` SET `visibility` = '$txtVisibility' WHERE client_task_Id = '$txtTaskId' ");
                header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
            }
        } else if ($mycheckYesbox) {
            $queryIns2 = mysqli_query($conn, "INSERT INTO tbl_finished_tasks (task_name, task_date, task_timeIn, task_note, task_SpecialId, uryyToeSS4, team_1email, category, col_dosage, col_carername, col_outcome, care_call1, care_call2, care_call3, care_call4, monday, tuesday, wednesday, thursday, friday, saturday, sunday, col_task_status) 
            VALUES('" . $txtTaskName . "', '" . $txtTaskDate . "', '" . $txtTaskTimeIn . "', '" . $txtTaskNote . "', '" . $txtTaskId . "', '" . $txtClientId . "', '" . $txtCarerEmail . "', '" . $txtTask . "', '" . $txtDosage . "', '" . $txtCarerName . "', '" . $mycheckYesbox . "', '" . $txtcare_call1 . "', '" . $txtcare_call2 . "', '" . $txtcare_call3 . "', '" . $txtcare_call4 . "', '" . $txtmonday . "', '" . $txttuesday . "', '" . $txtwednesday . "', '" . $txtthursday . "', '" . $txtfriday . "', '" . $txtsaturday . "', '" . $txtsunday . "', '" . $txtTaskStatus . "') ");
            if ($queryIns2) {
                $sqlUpdate2 = mysqli_query($conn, "UPDATE `tbl_clients_task_records` SET `visibility` = '$txtVisibility' WHERE client_task_Id = '$txtTaskId' ");
                header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
            }
        } else {
            echo "
            <script type='text/javascript'>
            $(document).ready(function() {
                $('#popupAlert').show();
            });
            </script>";
        }
    }
}
