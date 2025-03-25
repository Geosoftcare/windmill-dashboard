<?php include('dbconnections.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo "$CompanyName"; ?></title>
    <meta charset="utf-8" />
    <meta name="description" content="Geosoft care - Software for care settings is a dynamic nursing, domiciliary, support and agency App based in the UK. It is built on solid partnership and experience spanning almost two decades within its management team." />
    <meta name="keywords" content="HTML, CSS, JavaScript, AJAX, PHP mySQL" />
    <meta name="author" content="Ese Sphere IT Solution" />
    <meta name="developer" content="Ese Sphere IT Solution" />
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js" type="text/javascript"></script>
    <!-- JS for jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- JS for full calender -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
    <!-- bootstrap css and js -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#popupAlert').hide();
            $('#form-line').hide();

            $('#popupAlertSuccess').hide();
            $('#SecondCarerVisibilitybox').hide();

            $('#SecondCarerVisibility').click(function() {
                $('#SecondCarerVisibilitybox').slideToggle();
            });

            $('#txtHidenShowTxt').click(function() {
                $('#form-line').slideToggle();
            });

            $('#selectAllCheckbox').change(function() {
                $('.checkboxes').prop('checked', $(this).prop('checked'));
            });

            setInterval(function() {
                const div = document.querySelector('.shake-me');
                div.classList.add('shaking');
                setTimeout(function() {
                    div.classList.remove('shaking');
                }, 500);
            }, 3000);
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
    <?php include('processing-schedule-roster.php'); ?>
    <?php include('processing-add-new-run.php'); ?>
    <?php include('processing-edit-morning-call.php'); ?>
</head>
<style type="text/css">
    #exampleFormControlSelect1 {
        height: 50px;
    }

    .chatSystemBox {
        height: 500px;
        overflow: auto;
        display: flex;
        flex-direction: column-reverse;
        width: 100%;
        padding: 22px;
        max-height: 500px;
    }

    input[type=checkbox] {
        transform: scale(1.5);
    }

    ::-webkit-scrollbar-corner {
        background: rgba(0, 0, 0, 0.2);
    }

    * {
        scrollbar-width: thin;
        scrollbar-color: var(--scroll-bar-color) var(--scroll-bar-bg-color);
    }

    /* Works on Chrome, Edge, and Safari */
    *::-webkit-scrollbar {
        width: 12px;
        height: 12px;
    }

    *::-webkit-scrollbar-track {
        background: var(--scroll-bar-bg-color);
    }

    *::-webkit-scrollbar-thumb {
        background-color: var(--scroll-bar-color);
        border-radius: 20px;
        border: 3px solid var(--scroll-bar-bg-color);
    }

    .care-call-details-box {
        width: 100%;
        padding: 12px;
        border-radius: 5px;
        background-color: rgba(189, 195, 199, .2);
    }

    .shake-me {
        background-color: red;
        color: white;
        padding: 0px 5px 5px 5px;
        border-radius: 100%;
        font-size: 13px;
        cursor: pointer;
    }

    @keyframes shake {
        0% {
            transform: translateX(0);
        }

        25% {
            transform: translateX(-10px);
        }

        50% {
            transform: translateX(10px);
        }

        75% {
            transform: translateX(-10px);
        }

        100% {
            transform: translateX(0);
        }
    }

    .shake-me {
        display: inline-block;
        padding: 10px;
        background-color: lightcoral;
        color: white;
        font-size: 14px;
        border-radius: 5px;
    }

    /* Initially, no animation */
    .shake-me.shaking {
        animation: shake 0.5s ease-in-out infinite;
    }

    #notification-container {
        position: fixed;
        top: 20px;
        right: 20px;
        display: flex;
        z-index: 9999;
        flex-direction: column;
        gap: 10px;
    }

    .notification {
        background-color: #ff9800;
        color: white;
        padding: 10px 15px;
        border-radius: 5px;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        font-size: 14px;
        font-weight: bold;
        text-align: center;
        min-width: 200px;
        cursor: pointer;
        transition: opacity 0.5s ease-in-out;
    }
</style>

<body data-new-gr-c-s-check-loaded="14.1027.0" data-gr-ext-installed="">
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>

    <?php
    $sql_notification = "SELECT * FROM tbl_team_status WHERE (col_approval = 'Awaiting Approval' 
    AND col_company_Id = '" . $_SESSION['usr_compId'] . "')";
    $myCheckres = mysqli_query($conn, $sql_notification);
    $rowcount = mysqli_num_rows($myCheckres);
    $varNotification = '<sup class="shake-me">' . $rowcount . '</sup>';

    $sel_admin_data_result = mysqli_query($conn, "SELECT * FROM tbl_goesoft_users 
    WHERE user_email_address = '" . $_SESSION['usr_email'] . "' 
    AND col_company_id = '" . $_SESSION['usr_compId'] . "' ");
    while ($display_admin_data_row = mysqli_fetch_array($sel_admin_data_result)) {
    ?>
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
                                <li class="list-group-item"><a href="./checking-administrator-access" style="text-decoration: none; color:#fff;"><i class="feather icon-user m-r-5"></i>View admin</a></li>
                                <li class="list-group-item"><a href="./share-access-code?col_company_Id=<?php echo "" . $display_admin_data_row['col_company_Id'] . ""; ?>" style="text-decoration: none; color:#fff;"><i class="feather icon-share-2 m-r-5"></i>Share access</a></li>
                                <li class="list-group-item"><a href="./qrcodes" style="text-decoration: none; color:#fff;"><i class="fas fa-qrcode m-r-5"></i>QR Codes</a></li>
                                <li class="list-group-item"><a href="./auth-normal-logout?auth-normal-logout" style="text-decoration: none; color:#fff;"><i class="feather icon-log-out m-r-5"></i>Logout</a></li>
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
                            <a href="./roster/" class="nav-link "><span class="pcoded-micon"><i class="feather icon-layout"></i></span><span class="pcoded-mtext">View Rota</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="./manage-runs" class="nav-link"><span class="pcoded-micon"><i class="feather icon-map"></i></span><span class="pcoded-mtext">Manage Runs</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="./active-clients" class="nav-link "><span class="pcoded-micon"><i class="feather icon-user"></i></span><span class="pcoded-mtext">Clients</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="./team-list" class="nav-link "><span class="pcoded-micon"><i class="feather icon-user-plus"></i></span><span class="pcoded-mtext">Team</span></a>
                        </li>
                        <!--<li class="nav-item">
                            <a href="./chat-list" class="nav-link "><span class="pcoded-micon"><i class="feather icon-message-circle"></i></span><span class="pcoded-mtext">Messages</span></a>
                        </li>-->
                        <li class="nav-item">
                            <a href="./auth-reports" class="nav-link "><span class="pcoded-micon"><i class="feather icon-align-justify"></i></span><span class="pcoded-mtext">Reports</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="./auth-client-task" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Tasks</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="./auth-new-medication" class="nav-link "><span class="pcoded-micon"><i class="feather icon-heart"></i></span><span class="pcoded-mtext">Medication</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="./auth-client-group" class="nav-link "><span class="pcoded-micon"><i class="feather icon-pie-chart"></i></span><span class="pcoded-mtext">Groups</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="./auth-position" class="nav-link "><span class="pcoded-micon"><i class="feather icon-briefcase"></i></span><span class="pcoded-mtext">Position</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="./finance/finance-portal" class=" nav-link "><span class=" pcoded-micon"><i class="feather icon-pocket"></i></span><span class="pcoded-mtext">Finance</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="./auth-normal-logout" class="nav-link "><span class="pcoded-micon"><i class="feather icon-log-out"></i></span><span class="pcoded-mtext">Logout</span></a>
                        </li>
                    </ul>

                    <div class="card text-center">
                        <div class="card-block">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="feather icon-sunset f-40"></i>
                            <h6 class="mt-3">Hello, Geosoft!</h6>
                            <p>Complete the following steps to learn how Geosoft works and hit the ground running.</p>
                            <a href="../../../../help-center" target="_blank" class="btn btn-primary btn-sm text-white m-0">Help center</a>
                        </div>
                    </div>

                </div>
            </div>
        </nav>

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
                            <a class="dropdown-toggle h-drop" href="./finance/finance-portal">
                                <i class="feather icon-pocket"></i> Finance
                            </a>
                            &nbsp;&nbsp;
                            <a class="dropdown-toggle h-drop" href="./auth-position">
                                <i class="feather icon-briefcase"></i> Position
                            </a>
                        </div>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto">
                    <li>
                        <div class="dropdown">
                            <div class="noti-head">
                                <div class="float-right">
                                    <a href="./notification-panel" style="text-decoration: none;">
                                        <i class="feather icon-bell"></i><?php print $varNotification; ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="dropdown drp-user">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <?php echo "" . $display_admin_data_row['company_name'] . ""; ?> <i class="feather icon-user"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-notification">
                                <div class="pro-head">
                                    <img src="assets/images/user/profile-image.jpg" class="img-radius" alt="User-Profile-Image">
                                    <span>
                                    <?php echo "" . $display_admin_data_row['user_fullname'] . "";
                                } ?>
                                    </span>
                                </div>
                                <ul class="pro-body">
                                    <li><a href="./checking-administrator-access" class="dropdown-item"><i class="feather icon-user"></i> Admin list</a></li>
                                    <li><a href="#" class="dropdown-item"><i class="feather icon-mail"></i> My Messages</a></li>
                                    <li><a href="./auth-normal-logout" class="dropdown-item"><i class="feather icon-lock"></i> Lock Screen</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </header>
        <!-- [ Header ] end -->