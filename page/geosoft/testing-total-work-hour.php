<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    include('dbconnection-string.php');

    $totalTime = mysqli_query($conn, "SELECT SUM(TIMESTAMPDIFF(minute, client_schedule_start_time, client_schedule_end_time)) / COUNT(*) AS avg_minutes FROM tbl_general_client_form");

    $totalTime;
    ?>

</body>

</html>