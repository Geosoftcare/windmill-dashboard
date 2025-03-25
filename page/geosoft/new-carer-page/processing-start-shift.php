<?php

include('dbconnection-string.php');

if (isset($_POST['btnStartShift'])) {

    //Get user and client latitude and longitude which result to comparison in disatnce to know if carer point A is closer to 
    //client point B

    $txtStart = mysqli_real_escape_string($conn, $_POST['txtStart']);
    $txtStartDate = mysqli_real_escape_string($conn, $_POST['txtStartDate']);
    $txtStartTime = mysqli_real_escape_string($conn, $_POST['txtStartTime']);
    $txtEndTime = "Null";
    $txtClientName = mysqli_real_escape_string($conn, $_POST['txtClientName']);
    $txtClientId = mysqli_real_escape_string($conn, $_POST['txtClientId']);
    $txtClientArea = mysqli_real_escape_string($conn, $_POST['txtClientArea']);

    $txtClientAddLi1 = mysqli_real_escape_string($conn, $_POST['txtClientAddLi1']);
    $txtClientAddLi2 = mysqli_real_escape_string($conn, $_POST['txtClientAddLi2']);
    $txtClientCity = mysqli_real_escape_string($conn, $_POST['txtClientCity']);
    $txtClientPostCode = mysqli_real_escape_string($conn, $_POST['txtClientPostCode']);

    $txtCarerName = mysqli_real_escape_string($conn, $_POST['txtCarerName']);
    $txtCarerId = mysqli_real_escape_string($conn, $_POST['txtCarerId']);

    $txtsecCarerName = "Null";
    $txtTaskName = "Null";
    $txtTaskNote = "Null";
    $txtsecCarerId = "Null";

    $txtClientTask = mysqli_real_escape_string($conn, $_POST['txtClientTask']);
    $txtTaskId = mysqli_real_escape_string($conn, $_POST['txtTaskId']);
    $txtTaskColours = "#27ae60";
    $txtDistance = mysqli_real_escape_string($conn, $_POST['txtDistance']);

    if ($txtDistance <= '2') {

        //Check if care call already started
        $myCheck = "SELECT * FROM tbl_daily_shift_records WHERE checkinout_Id = '" . $txtClientTask . "' ";
        $myCheckres = mysqli_query($conn, $myCheck);
        $countRes = mysqli_num_rows($myCheckres);

        //if it is true then execute queries and proceed to tasks
        if ($countRes != 0) {
            $sql = mysqli_query($conn, "UPDATE `tbl_daily_shift_records` SET `secStart_time` = '$txtStartTime', `team_2Name` = '$txtCarerName', `secondCarer_userId` = '$txtCarerId' WHERE checkinout_Id = '$txtClientTask' ");
            if ($sql) {
                header("Location: ./check-out-progress?uryyToeSS4=$txtClientId");
            }
        } else {
            $queryIns = mysqli_query($conn, "INSERT INTO tbl_daily_shift_records (shift_status, shift_date, shift_start_time, shift_end_time, client_name, uryyToeSS4, client_group, team_1Name, team_2Name, task_note, firstCarer_userId, secondCarer_userId, checkinout_Id) VALUES('" . $txtStart . "', '" . $txtStartDate . "', '" . $txtStartTime . "', '" . $txtEndTime . "', '" . $txtClientName . "', '" . $txtClientId . "', '" . $txtClientArea . "', '" . $txtCarerName . "', '" . $txtsecCarerName . "', '" . $txtTaskNote . "', '" . $txtCarerId . "', '" . $txtsecCarerId . "', '" . $txtTaskId . "') ");
            if ($queryIns) {
                header("Location: ./tasks-progress?uryyToeSS4=$txtClientId");
            }
        }
        //Below code insert the data into database if distance agreed is stated in the map

    } else {
    }
} else {
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:image" content="assets/img/gsLogo.png" />
    <meta name="twitter:image" content="assets/img/gsLogo.png" />
    <link rel="icon" href="assets/img/gsLogo.png" />
    <!-- Logo icon -->
    <title><?php echo "" . $CompanyName . ""; ?></title>
    <link rel="icon" href="assets/img/gsLogo.png" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2424.039849580655!2d-2.1380394064193693!3d52.5869727592829!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48709b9b316ad329%3A0xe352fd6790e08e54!2s<?php echo $txtClientAddLi1; ?>%20<?php echo $txtClientAddLi2; ?>%2C%<?php echo $txtClientCity; ?>%20<?php echo $txtClientPostCode; ?>!5e0!3m2!1sen!2suk!4v1712322921451!5m2!1sen!2suk" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                <div style="width: 100%; height:auto; padding:22px; margin-top:20px;">
                    <h4>Distance too great</h4>
                    <hr>
                    <a href="./care-plan?uryyToeSS4=<?php echo $txtClientId; ?>">
                        <button class="btn btn-primary">Go back</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>