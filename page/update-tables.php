<?php

if (isset($_POST['btnUpdateTable'])) {
    include('dbconnections.php');

    //$sql_update1 = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_path` = 'medication-report-form' ");
    //if ($sql_update1) {
    //$sql_update2 = mysqli_query($conn, "UPDATE `tbl_clients_task_records` SET `col_path` = 'task-report-form' ");
    //if ($sql_update2) {
    //   echo "<h1>Table updated</h1>";
    //}
    //}

    $sql_update1 = mysqli_query($conn, "UPDATE `tbl_clients_medication_records` SET `col_fifo` = '' ");
    if ($sql_update1) {
        $sql_update2 = mysqli_query($conn, "UPDATE `tbl_clients_task_records` SET `col_fifo` = '' ");
        if ($sql_update2) {
            echo "<h1>Table updated</h1>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>

<body>
    <form action="./update-tables" method="post" enctype="multipart/form-data">
        <input type="submit" name="btnUpdateTable" value="Submit" style="height: 40px; width:100px; font-size: 16px;" />
    </form>


    <br><br>
    <hr>
    <br><br>

    <table>
        <tr>
            <td>ID</td>
            <td>Task</td>
            <td>Care Call</td>
            <td>Day</td>
        </tr>
        <?php
        include_once('dbconnections.php');
        $sql = "SELECT * FROM tbl_clients_task_records WHERE (uryyToeSS4 = '76dd20c63bde01a4043ccb110cf6480d9e8f421b2c109fc570009e30db9228e6' 
        AND care_call2 = 'Lunch' AND saturday ='Saturday')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "
                <tr>
                    <td>" . $row['client_Id'] . "</td>
                    <td>" . $row['client_taskName'] . "</td>
                    <td>" . $row['care_call2'] . "</td>
                    <td>" . $row['saturday'] . "</td>
                </tr>
                ";
            }
        } else {
            echo "Error: " . mysqli_error($conn);
        }
        ?>
    </table>

    <br><br>
    ///////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////////////
    <br>

    <table>
        <tr>
            <td>ID</td>
            <td>Task</td>
            <td>Care Call</td>
            <td>Day</td>
        </tr>
        <?php
        $sql = "SELECT * FROM tbl_finished_tasks WHERE (task_date = '2025-02-22' 
        AND uryyToeSS4 = '76dd20c63bde01a4043ccb110cf6480d9e8f421b2c109fc570009e30db9228e6' 
        AND care_calls = 'Lunch' AND care_call_days ='Saturday')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "
                <tr>
                    <td>" . $row['task_Id'] . "</td>
                    <td>" . $row['task_name'] . "</td>
                    <td>" . $row['care_calls'] . "</td>
                    <td>" . $row['care_call_days'] . "</td>
                </tr>
                ";
            }
        } else {
            echo "Error: " . mysqli_error($conn);
        }
        mysqli_close($conn);
        ?>
    </table>
</body>

</html>