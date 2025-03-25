<?php include_once('dbconnections.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    $myCheck_order = mysqli_query($conn, "SELECT * FROM tbl_schedule_calls WHERE (first_carer_Id = '6ed6e540bba36096d38b22450e306ab5a3d33b7e406d6e570bb4d0192c19458f' AND Clientshift_Date = '2024-08-05') GROUP BY first_carer_Id");
    while ($row_order = mysqli_fetch_array($myCheck_order)) {
        $hold_carer_care_client = $row_order['uryyToeSS4'];

        $myCheck_order2 = mysqli_query($conn, "SELECT * FROM tbl_schedule_calls WHERE (first_carer_Id != '6ed6e540bba36096d38b22450e306ab5a3d33b7e406d6e570bb4d0192c19458f' AND uryyToeSS4 = '$hold_carer_care_client' AND Clientshift_Date = '2024-08-05') GROUP BY first_carer_Id");
        while ($row_order2 = mysqli_fetch_array($myCheck_order2)) {
            $hold_carer2_Id = $row_order2['first_carer'];
            echo "
            " . $hold_carer2_Id . "
        ";
        }
    }
    ?>


</body>


</html>