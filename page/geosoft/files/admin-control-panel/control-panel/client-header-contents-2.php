<?php include('dbconnections.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo "$CompanyName"; ?></title>
    <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 11]>
    	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    	<![endif]-->
    <!-- Meta -->
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
    </script>

    <?php include('processing-add-task-form.php'); ?>
    <?php include('processing-add-client-form.php'); ?>
    <?php include('processing-client-task.php'); ?>
    <?php include('processing-client-medicine.php'); ?>
    <?php include('processing-add-group-form.php'); ?>
    <?php include('processing-add-team-form.php'); ?>
    <?php include('processing-add-position.php'); ?>
    <?php include('processing-new-medication-form.php'); ?>
    <?php include('processing-edit-medication.php'); ?>
    <?php include('processing-manage-runs.php'); ?>

</head>
<style type="text/css">
    #exampleFormControlSelect1 {
        height: 50px;
    }

    input[type=checkbox] {
        transform: scale(1.5);
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
    $result = mysqli_query($conn, "SELECT * FROM tbl_daily_shift_records WHERE userId = '$myIduser' ");
    while ($row = mysqli_fetch_array($result)) { ?>

        <nav class="pcoded-navbar">
            <div class="navbar-wrapper">
                <div class="navbar-content scroll-div ">
                    <div class="">
                        <div class="main-menu-header">
                            <img class="img-radius" src="assets/images/gsLogo.png" alt="User-Profile-Image">
                            <div class="user-details">
                                <span>Geosoft</span>
                                <div id="more-details">Admin panel<i class="fa fa-chevron-down m-l-5"></i></div>
                            </div>
                        </div>
                        <div class="collapse" id="nav-user-link">
                            <ul class="list-unstyled">
                                <li class="list-group-item"><a href=" "><i class="feather icon-user m-r-5"></i>View Profile</a></li>
                                <li class="list-group-item"><a href="#!"><i class="feather icon-settings m-r-5"></i>Settings</a></li>
                                <li class="list-group-item"><a href="./auth-normal-logout?auth-normal-logout"><i class="feather icon-log-out m-r-5"></i>Logout</a></li>
                            </ul>
                        </div>
                    </div>

                    <ul class="nav pcoded-inner-navbar ">
                        <li class="nav-item pcoded-menu-caption">
                            <label>Navigation</label>
                        </li>
                        <li class="nav-item">
                            <a href="./dashboard" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="./client-details<?php echo "?uryyToeSS4=" . $row['uryyToeSS4'] . "" ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-layout"></i></span><span class="pcoded-mtext">About me</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="./client-feed<?php echo "?uryyToeSS4=" . $row['uryyToeSS4'] . "" ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Client feeds</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="./client-care-planner<?php echo "?uryyToeSS4=" . $row['uryyToeSS4'] . "" ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-heart"></i></span><span class="pcoded-mtext">Care plan</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="./client-visit<?php echo "?uryyToeSS4=" . $row['uryyToeSS4'] . "" ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-eye"></i></span><span class="pcoded-mtext">Weekly visits</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="./client-task<?php echo "?uryyToeSS4=" . $row['uryyToeSS4'] . "" ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-user"></i></span><span class="pcoded-mtext">Task plan</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="./client-calendar<?php echo "?uryyToeSS4=" . $row['uryyToeSS4'] . "" ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-calendar"></i></span><span class="pcoded-mtext">Calendar</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="./client-medication<?php echo "?uryyToeSS4=" . $row['uryyToeSS4'] . "" ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-activity"></i></span><span class="pcoded-mtext">Medication</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="./client-care-team<?php echo "?uryyToeSS4=" . $row['uryyToeSS4'] . "" ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-users"></i></span><span class="pcoded-mtext">Care team</span></a>
                        </li>
                        <!-- <li class="nav-item">
                                <a href="./share-access<?php echo "?uryyToeSS4=" . $row['uryyToeSS4'] . "" ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-briefcase"></i></span><span class="pcoded-mtext">Share access</span></a>
                            </li>-->
                        <li class="nav-item">
                            <a href="./auth-normal-logout" class="nav-link "><span class="pcoded-micon"><i class="feather icon-log-out"></i></span><span class="pcoded-mtext">Logout</span></a>
                        </li>

                    </ul>
                <?php }
                ?>

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
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a href="#!" class="pop-search"><i class="feather icon-search"></i></a>
                        <div class="search-bar">
                            <input type="text" class="form-control border-0 shadow-none" placeholder="Search hear">
                            <button type="button" class="close" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <a class="dropdown-toggle h-drop" href="#" data-toggle="dropdown">
                                More Links
                            </a>
                            <div class="dropdown-menu profile-notification ">
                                <ul class="pro-body">
                                    <li><a href="./auth-user-profile" class="dropdown-item"><i class="fas fa-circle"></i> Profile</a></li>
                                    <li><a href="./auth-messages" class="dropdown-item"><i class="fas fa-circle"></i> My Messages</a></li>
                                    <li><a href="./index" class="dropdown-item"><i class="fas fa-circle"></i> Lock Screen</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li>
                        <div class="dropdown">

                            <div class="dropdown-menu dropdown-menu-right notification">
                                <div class="noti-head">
                                    <h6 class="d-inline-block m-b-0">Notifications</h6>
                                    <div class="float-right">
                                        <a href="#!" class="m-r-10">mark as read</a>
                                        <a href="#!">clear all</a>
                                    </div>
                                </div>
                                <ul class="noti-body">
                                    <li class="n-title">
                                        <p class="m-b-0">NEW</p>
                                    </li>

                                </ul>
                                <div class="noti-footer">
                                    <a href="#!">show all</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="dropdown drp-user">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="feather icon-user"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-notification">
                                <div class="pro-head">
                                    <img src="assets/images/user/profile-image.jpg" class="img-radius" alt="User-Profile-Image">
                                    <span>Samson Gift</span>
                                    <a href="auth-signin.html" class="dud-logout" title="Logout">
                                        <i class="feather icon-log-out"></i>
                                    </a>
                                </div>
                                <ul class="pro-body">
                                    <li><a href="./auth-user-profile" class="dropdown-item"><i class="feather icon-user"></i> Profile</a></li>
                                    <li><a href="./auth-messages" class="dropdown-item"><i class="feather icon-mail"></i> My Messages</a></li>
                                    <li><a href="./auth-normal-logout" class="dropdown-item"><i class="feather icon-lock"></i> Lock Screen</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>


        </header>
        <!-- [ Header ] end -->