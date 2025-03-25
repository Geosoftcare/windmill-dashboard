<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Geosoft care | Task not completed</title>
</head>
<style>
    #box-container {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: #f0f0f0;
        color: rgba(12, 36, 97, 1.0);
        font-weight: 800;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        z-index: 1000;
    }
</style>

<body>
    <div class="container">
        <div id="box-container">
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div class="card text-white bg-danger mb-3" style="max-width: 100%;">
                        <div class="card-header" style="font-weight:700"><i class="bi bi-exclamation-triangle-fill"></i> Alert</div>
                        <div class="card-body">
                            <h4 class="card-title" style="font-weight:700">Oops Can't proceed!</h4>
                            <p class="card-text" style="font-weight:600; font-size:17px;">Note: You have an ongoing care call, kindly click the button to complete the call.</p>
                            <hr>
                            <?php
                            include('dbconnection-string.php');
                            $sql_check_call_status = mysqli_query($conn, "SELECT * FROM tbl_daily_shift_records WHERE (shift_date = '$today' AND shift_end_time = 'Null' AND col_carer_Id = '" . $_SESSION['usr_carerId'] . "' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ORDER BY userId DESC LIMIT 1 ");
                            $row_check_call_status = mysqli_fetch_array($sql_check_call_status, MYSQLI_ASSOC);
                            $txtClientId = $row_check_call_status['uryyToeSS4'];
                            ?>
                            <a href='./tasks-progress?uryyToeSS4=<?php echo $txtClientId; ?>' style='text-decoration:none;'>
                                <?php $_SESSION['uryyToeSS4'] = $txtClientId; ?>
                                <button type='button' class='btn btn-dark'>Continue task</button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3"></div>
            </div>
        </div>
    </div>



</body>

</html>