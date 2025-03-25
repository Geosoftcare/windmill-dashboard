<table border="1px">
    <tr>
        <td>Client Id</td>
        <td></td>
        <td>Client Name</td>
    </tr>



    <?php
    if (isset($_POST['btnCheckClientId'])) {
        include('dbtest.php');

        $txtClientId = mysqli_real_escape_string($conn, $_POST['txtClientId']);

        $sel_carer_carecall_result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE uryyToeSS4 = '$txtClientId' AND care_call1 = 'Breakfast' AND task_endDate >= '$today' ");
        while ($trans = mysqli_fetch_array($sel_carer_carecall_result)) {
            echo "
        
        <tr>
            <td>" . $trans['uryyToeSS4'] . "</td>
            <td>" . $trans['client_taskName'] . "</td>
            <td>" . $trans['client_first_name'] . " " . $trans['client_last_name'] . "</td>
        </tr>
    
    ";
        }
    } ?>

</table>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello world</title>
</head>

<body>

    <form action="./check-client-id" method="post" enctype="multipart/form-data">
        <input type="text" name="txtClientId">
        <br>
        <input type="submit" name="btnCheckClientId">
    </form>
    <hr>
</body>

</html>