<?php include('dbconnection-string.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Geosoft care is a dynamic nursing and domiciliary agency based in the UK. It is built on solid partnership and experience spanning almost two decades within its management team.">
    <meta name="keywords" content="HTML, CSS, JavaScript, AJAX, PHP mySQL">
    <meta name="author" content="Ese Sphere Entr.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo "" . $CompanyName . ""; ?></title>
    <meta property="og:image" content="assets/img/gsLogo.png" />
    <meta name="twitter:image" content="assets/img/gsLogo.png" />
    <link rel="icon" href="assets/img/gsLogo.png" />
    <!-- Logo icon -->
    <link rel="icon" href="assets/img/gsLogo.png" type="image/x-icon" />
    <!-- Custom styles -->
    <link rel="stylesheet" href="./css/style.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="./assets/js/init-alpine.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <script type="module">
        $(document).ready(function() {
            $('#popupAlert').hide();

            $('#btnSubmitStartCall').hide();

            $('#calc-dist').click(function() {
                $('#btnSubmitStartCall').show();
                $('#calc-dist').hide();
            });
        });
        import LatLon from 'https://cdn.jsdelivr.net/npm/geodesy@2/latlon-spherical.min.js';
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('#calc-dist').onclick = function() {
                calculateDistance();
            }
        });

        function calculateDistance() {
            const p1 = LatLon.parse(document.querySelector('#point1').value);
            const p2 = LatLon.parse(document.querySelector('#point2').value);
            const dist = parseFloat(p1.distanceTo(p2).toPrecision(4));
            document.querySelector('#result-distance').value = dist;
        }
    </script>

    <?php include('processing-med-submision.php'); ?>
    <?php include('processing-task-submision.php'); ?>
</head>
<style type="text/css">
    #txtUserLog {
        height: 55px;
        font-size: 18px;
    }

    html {
        font-size: 18px;
    }

    input[type=checkbox] {
        transform: scale(2);
    }
</style>
</head>

<body>
    <div class="layer"></div>
    <!-- ! Body -->
    <a class="skip-link sr-only" href="./dashboard">Skip to content</a>
    <div class="page-flex">
        <!-- ! Sidebar -->
        <?php
        $result = mysqli_query($conn, "SELECT * FROM tbl_goesoft_carers_account WHERE user_email_address = '" . $_SESSION['usr_email'] . "' ORDER BY userId DESC ");
        while ($trans = mysqli_fetch_array($result)) {
        ?>
            <aside style="background-color: #273c75 !important;" class="sidebar">
                <div class="sidebar-start">
                    <div class="sidebar-head">
                        <a href="/" class="logo-wrapper" title="Home">
                            <span class="sr-only">Home</span>
                            <span class="icon logo" aria-hidden="true"><img src="assets/img/gsLogo.png" alt=""></span>
                            <div class="logo-text">
                                <span class="logo-title">Geosoft</span>
                                <span class="logo-subtitle">Dashboard</span>
                            </div>

                        </a>
                        <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
                            <span class="sr-only">Toggle menu</span>
                            <span class="icon menu-toggle" aria-hidden="true"></span>
                        </button>
                    </div>
                    <div class="sidebar-body">
                        <ul class="sidebar-body-menu">
                            <li>
                                <a class="active" href="dashboard.php"><span class="icon home" aria-hidden="true"></span>Dashboard</a>
                            </li>
                            <li>
                                <a href="./view-timesheet<?php echo "?user_special_Id=" . $trans['user_special_Id'] . "";
                                                        } ?>"><span class="icon folder" aria-hidden="true"></span>View Timesheet</a>
                            </li>
                            <li>
                                <a href="../privacy-notice"><span class="icon image" aria-hidden="true"></span>Privacy Notice</a>
                            </li>
                            <li>
                                <a href="./Chat-system"><span class="icon paper" aria-hidden="true"></span>Chat with admin</a>
                            </li>
                            <li>
                                <a href="./feed-back"><span class="icon message" aria-hidden="true"></span>Feedback</a>
                            </li>
                            <li>
                                <a href="./help.php"><span class="icon help" aria-hidden="true"></span>Help</a>
                            </li>
                        </ul>
                        <span class="system-menu__title">Details</span>

                        <ul class="sidebar-body-menu">
                            <li>
                                <a class="show-cat-btn" href="##">
                                    <span class="icon" aria-hidden="true"></span>
                                    Application Versions
                                    <br>
                                    11.1.8 - gp23-24
                                    <br>
                                    Build Reg number
                                    <span class="category__btn transparent-btn" title="Open list">
                                        <span class="sr-only">Open list</span>
                                        <span class="icon" aria-hidden="true"></span>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a class="show-cat-btn" href="./logout?logout">
                                    <span class="icon logout" aria-hidden="true"></span>Log me out
                                    <span class="category__btn transparent-btn" title="Open list">
                                        <span class="sr-only">Open list</span>
                                        <span class="icon" aria-hidden="true"></span>
                                    </span>
                                </a>
                                <ul class="cat-sub-menu">

                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>


                <div class="sidebar-footer">
                    <a href="##" class="sidebar-user">
                        <span class="sidebar-user-img">
                            <picture>
                                <source srcset="./img/avatar/avatar-illustrated-01.webp" type="image/webp"><img src="./img/avatar/avatar-illustrated-01.png" alt="User name">
                            </picture>
                        </span>
                        <div class="sidebar-user-info">
                            <span class="sidebar-user__title">Nafisa Sh.</span>
                            <span class="sidebar-user__subtitle">Support manager</span>
                        </div>
                    </a>
                </div>
            </aside>

            <div class="main-wrapper">
                <!-- ! Main nav -->