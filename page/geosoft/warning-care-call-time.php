<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Geosoft care | Warning</title>
    <meta property="og:image" content="assets/img/gsLogo.png" />
    <meta name="twitter:image" content="assets/img/gsLogo.png" />
    <link rel="icon" href="assets/img/gsLogo.png" />
    <!-- Logo icon -->
    <link rel="icon" href="assets/img/gsLogo.png" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>

    <form action="./processing-warning-start-shift" enctype="multipart/form-data" method="post" id="numform" autocomplete="off">
        <?php
        include_once('dbconnection-string.php');
        if (isset($_GET['userId'])) {
            $myClientSpecialUserId = $_GET['userId'];
            $getUniversalSpecialId = mysqli_query($conn, "SELECT * FROM tbl_schedule_calls WHERE (userId='$myClientSpecialUserId' AND col_company_id='" . $_SESSION['usr_compId'] . "') ");
            $row_select_line = mysqli_fetch_array($getUniversalSpecialId, MYSQLI_ASSOC);
            $displayClientSpecId = $row_select_line['uryyToeSS4'];
            $displayClientCareCalls = $row_select_line['dateTime_in'];
            $displayClientCareCallsEnd = $row_select_line['dateTime_out'];
            $displayClientCareCallsDate = $row_select_line['Clientshift_Date'];
            $display_client_carecall = $row_select_line['care_calls'];
            $display_first_carerUserIdPin = $row_select_line['first_carer_Id'];
        }



        $result = mysqli_query($conn, "SELECT * FROM tbl_general_client_form WHERE uryyToeSS4='$displayClientSpecId' ");
        while ($row = mysqli_fetch_array($result)) {
        ?>
            <input type="hidden" value="<?php echo "" . $_SESSION['usr_carerId'] . ""; ?>" name="txtCarerId" />
            <input type="hidden" value="<?php echo "" . $_SESSION['usr_carerNames'] . ""; ?>" name="txtCarerName" />
            <input type="hidden" value="<?php echo "" . $_SESSION['usr_carerPostCode'] . ""; ?>" name="txtCarerPC" />
            <input type="hidden" value="Checked in" name="txtStart" />
            <input type="hidden" value="<?php echo $displayClientCareCallsDate; ?>" name="txtStartDate" />
            <input type="hidden" value="<?php print $sTime; ?>" name="txtStartTime" />
            <input type="hidden" value="<?php echo "" . $row['client_first_name'] . " " . $row['client_last_name'] . ""; ?>" name="txtClientName" />
            <input type="hidden" value="<?php echo "" . $row['uryyToeSS4'] . ""; ?>" name="txtClientId" />
            <input type="hidden" value="<?php echo "" . $row['client_area'] . ""; ?>" name="txtClientArea" />
            <input type="hidden" value="<?php echo "" . $row['client_address_line_1'] . ""; ?>" name="txtClientAddLi1" />
            <input type="hidden" value="<?php echo "" . $row['client_address_line_2'] . ""; ?>" name="txtClientAddLi2" />
            <input type="hidden" value="<?php echo "" . $row['client_city'] . ""; ?>" name="txtClientCity" />
            <input type="hidden" value="<?php echo "" . $row['client_poster_code'] . "";
                                    } ?>" name="txtClientPostCode" />
            <input type="hidden" value="<?php echo date('Y-m-d') ?>" name="txtTimeSheetDate" />

            <?php
            $echomyTime = date("H:i");
            $result = mysqli_query($conn, "SELECT * FROM tbl_schedule_calls WHERE (uryyToeSS4='$displayClientSpecId' AND Clientshift_Date = '$displayClientCareCallsDate' 
          AND first_carer_Id = '" . $_SESSION['usr_carerId'] . "' AND col_company_id='" . $_SESSION['usr_compId'] . "') ORDER BY userId DESC LIMIT 1 ");
            while ($rowAreaDate = mysqli_fetch_array($result)) {
                $CureDay = $rowAreaDate['col_area_Id'];
                $currCallTime = $rowAreaDate['dateTime_in'];
                $companyId = $rowAreaDate['col_company_Id'];
            ?>
                <input type="hidden" value="<?php echo $myClientSpecialUserId; ?>" name="txtClientSpecialUserId" />
                <input type="hidden" value="<?php echo $CureDay; ?>" name="txtColAreaId" />
                <input type="hidden" value="<?php echo $companyId;
                                        } ?>" name="txtcompanyId" />

                <!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
                <!--////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

                <input type="hidden" value="<?php echo $display_client_carecall; ?>" name="txtVariousCareCalls" />
                <input type="hidden" value="<?php echo $display_first_carerUserIdPin; ?>" name="txtFirstCarerIdPin" />
                <input type="hidden" value="<?php echo $displayClientCareCalls; ?>" name="txtCareCallsStartTime" />
                <input type="hidden" value="<?php echo $displayClientCareCallsEnd; ?>" name="txtCareCallsEndTime" />
                <input type="hidden" value="<?php echo $displayClientCareCallsDate; ?>" name="txtClientCareCallsDate" />


                <div style="margin-top:50%;" class="container">
                    <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6">
                            <div class="card text-white bg-danger mb-3" style="max-width: 100%;">
                                <div class="card-header" style="font-weight:700;"><i class="bi bi-exclamation-triangle-fill"></i> Alert</div>
                                <div class="card-body">
                                    <h4 class="card-title" style="font-weight:700;">Warning!!!</h4>
                                    <p class="card-text" style="font-weight:600;">This care call is ahead of current planned time. Do you wish to continue?</p>
                                    <hr>

                                    <button onclick="history.back()" type='button' class='btn btn-dark'>No</button>
                                    <button type='submit' class='btn btn-success' name="btnStartWarningShift">Yes</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3"></div>
                    </div>
                </div>

    </form>