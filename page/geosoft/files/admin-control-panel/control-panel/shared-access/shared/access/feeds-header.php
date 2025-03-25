<?php include('dbconnections.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo "$CompanyName"; ?></title>
    <meta charset="utf-8" />
    <meta name="description" content="Geocare is a dynamic nursing and domiciliary agency based in the UK. It is built on solid partnership and experience spanning almost two decades within its management team." />
    <meta name="keywords" content="HTML, CSS, JavaScript, AJAX, PHP mySQL" />
    <meta name="author" content="Geocare Services Limited" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />


    <meta property="og:image" content="assets/images/gsLogo.png" />
    <meta name="twitter:image" content="assets/images/gsLogo.png" />
    <link rel="icon" href="assets/images/gsLogo.png" />
    <!-- Logo icon -->
    <link rel="icon" href="assets/images/gsLogo.png" type="image/x-icon" />

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script src="./js/bootstrap.min.js"></script>
    <script src="./fullcalendar/lib/main.min.js"></script>
    <!-- vendor css -->
    <link rel="stylesheet" href="assets/css/style.css" />
    <!-- *Note: You must have internet connection on your laptop or pc other wise below code is not working -->
    <!-- CSS for full calender -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css" rel="stylesheet" />

    <!-- JS for jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- JS for full calender -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
    <!-- bootstrap css and js -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#popupAlert').hide();
        });
        $(document).ready(function() {
            $('#popupAlertSuccess').hide();
        });


        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>

</head>
<style type="text/css">
    #exampleFormControlSelect1 {
        height: 50px;
    }
</style>

<body class="">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    <!-- [ navigation menu ] start -->


    <?php
    $myIduser = $_GET['userId'];
    $result = mysqli_query($conn, "SELECT * FROM tbl_schedule_calls WHERE userId = '$myIduser' ");
    $row = mysqli_fetch_array($result);
    $varClientSpecialId = $row['uryyToeSS4'];
    ?>

    <nav class="pcoded-navbar">
        <div class="navbar-wrapper">
            <div class="navbar-content scroll-div ">
                <div class="">
                    <div class="main-menu-header">
                        <img class="img-radius" src="assets/images/user/profile-image.jpg" alt="User-Profile-Image">
                        <div class="user-details">
                            <span>Geosoft</span>
                            <div id="more-details">Family view</div>
                        </div>
                    </div>
                </div>

                <ul class="nav pcoded-inner-navbar ">
                    <li class="nav-item pcoded-menu-caption">
                        <label>Navigation</label>
                    </li>
                    <li class="nav-item">
                        <a href="./client-visit<?php echo "?uryyToeSS4=" . $row['uryyToeSS4'] . "" ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-eye"></i></span><span class="pcoded-mtext">Visits</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="./completed-visit<?php echo "?uryyToeSS4=" . $row['uryyToeSS4'] . "" ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-thumbs-up"></i></span><span class="pcoded-mtext">Completed</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="./schedulled-visit<?php echo "?uryyToeSS4=" . $row['uryyToeSS4'] . "" ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-bell"></i></span><span class="pcoded-mtext">Scheduled</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="./client-notes<?php echo "?uryyToeSS4=" . $row['uryyToeSS4'] . "" ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-book"></i></span><span class="pcoded-mtext">Note</span></a>
                    </li>
                    <!--<li class="nav-item">
                        <a href="./compliment-company<?php echo "?uryyToeSS4=" . $row['uryyToeSS4'] . "" ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-award"></i></span><span class="pcoded-mtext">Compliment</span></a>
                    </li>-->
                </ul>


                <div class="card text-center">
                    <div class="card-block">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <i class="feather icon-sunset f-40"></i>
                        <h6 class="mt-3">Hello, Geosoft!</h6>
                        <p>Complete the following steps to learn how Geosoft works and hit the ground running.</p>
                        <a href="Help center" target="_blank" class="btn btn-primary btn-sm text-white m-0">Help center</a>
                    </div>
                </div>

            </div>
        </div>
    </nav>
    <!-- [ navigation menu ] end -->
    <!-- [ Header ] start -->
    <header class="navbar pcoded-header navbar-expand-lg navbar-light header-dark">


        <div class="m-header">
            <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
            <a href="#!" class="b-brand">
                <!-- ========   change your logo hear   ============ -->
                <h3 style="color: rgba(189, 195, 199,1.0);">Geosoft</h3>
            </a>
            <a href="#!" class="mob-toggler">
                <i class="feather icon-more-vertical"></i>
            </a>
        </div>


    </header>
    <!-- [ Header ] end -->