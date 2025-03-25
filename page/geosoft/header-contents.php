<?php include('dbconnection-string.php'); ?>
<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Geosoft care - Software for care settings is a dynamic nursing, domiciliary, support and agency App based in the UK. It is built on solid partnership and experience spanning almost two decades within its management team.">
    <meta name="keywords" content="HTML, CSS, JavaScript, AJAX, PHP mySQL">
    <meta name="author" content="Ese Sphere IT Solution.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:image" content="files/geocare/logo/geoLogo.png">
    <meta name="twitter:image" content="files/geocare/logo/geoLogo.png">
    <title><?php echo "" . $CompanyName . ""; ?></title>
    <meta property="og:image" content="assets/img/gsLogo.png" />
    <meta name="twitter:image" content="assets/img/gsLogo.png" />
    <link rel="icon" href="assets/img/gsLogo.png" />
    <link rel="icon" href="assets/img/gsLogo.png" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="assets/css/external-construct.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="./assets/css/tailwind.output.css" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="./assets/js/init-alpine.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script type="module">
        $(document).ready(function() {
            $('#popupAlert').hide();

            $('#btnSubmitStartCall').hide();
            $('#popupNoOptions').hide();
            $('#popupYesOptions').hide();

            $('#calc-dist').click(function() {
                $('#btnSubmitStartCall').show();
                $('#calc-dist').hide();
            });

            $('#displayPopupNoOption').click(function() {
                $('#popupNoOptions').slideToggle();
                $('#popupYesOptions').hide();
            });

            $('#displayPopupYesOption').click(function() {
                $('#popupYesOptions').slideToggle();
                $('#popupNoOptions').hide();
            });

            var clicked;

            $('.bedroomsCheck').on('click', function() {
                clicked = $(this);

                if ($(this).is(':checked')) {
                    $('.bedroomsCheck:checked').not($(this)).each(function() {
                        $(this).prop('checked', false);
                        $(this).trigger('change');
                    });
                };
            });

            $('.bedroomsCheck').on('change', function() {
                if (!clicked.is($(this))) {
                    //do something useful here
                    console.log($(this).val() + ' changed');
                };
            });

            $(function() {
                $(".btnStartButton").click(function() {
                    $(".btnStartButton").attr("disabled", true);
                    $('#myStartForm').submit();
                });
            });
        });
    </script>

    <?php include('processing-med-submision.php'); ?>
    <?php include('processing-task-submision.php'); ?>
</head>
<style type="text/css">
    #txtUserLog {
        height: 55px;
        font-size: 20px;
    }

    body,
    html {
        font-size: 20px;
        overflow: hidden;
        zoom: reset;
    }

    @media (max-width: 600px) {
        html {
            font-size: 18px;
        }
    }

    input[type=checkbox] {
        transform: scale(2);
    }

    .content {
        width: 100%;
        height: auto;
    }

    .containerbox {
        overflow-y: auto;
        height: auto;
        width: 100%;
        margin-top: 7px;
    }

    .containerbox::-webkit-scrollbar {
        display: none;
    }

    #title-Base-txt {
        display: flex;
        width: 100%;
        color: rgba(127, 140, 141, 1.0);
        font-size: 12px;
    }

    button,
    button:hover,
    button:active,
    button:focus {
        outline: 0;
        box-shadow: none;
    }

    .skeleton-loader:empty {
        width: 100%;
        height: 15px;
        display: block;
        background: linear-gradient(to right,
                rgba(255, 255, 255, 0),
                rgba(255, 255, 255, 0.5) 50%,
                rgba(255, 255, 255, 0) 80%),
            lightgray;
        background-repeat: repeat-y;
        background-size: 50px 500px;
        background-position: 0 0;
        animation: shine 1s infinite;
    }

    @keyframes shine {
        to {
            background-position: 100% 0;
        }
    }

    .prod--wrapper {
        display: flex;
        width: 95%;
        margin: 12px 0;
        border-radius: 6px;
        padding: 22px 10px;
        font-family: "Calibri", "Arial";
    }

    .prod--wrapper .prod--row {
        display: flex;
        flex-direction: row;
    }

    .prod--wrapper .prod--col {
        display: flex;
        flex-direction: column;
    }

    .prod--wrapper .prod--img {
        width: 20%;
        margin: 0 15px;
    }

    .prod--wrapper .prod--img .prod--img-graphic {
        max-height: 100%;
        height: 100%;
        vertical-align: top;
        max-width: 100%;
    }

    .prod--wrapper .prod--details {
        width: 90%;
        margin-left: 17px;
    }

    .prod--wrapper .prod--details .prod--name {
        margin-bottom: 3px;
        width: 85%;
        display: block;
        max-width: 100%;
    }

    .prod--wrapper .prod--details .prod--name .prod--name-para {
        margin: 0 auto;
    }

    .prod--wrapper .prod--details .prod--name .prod--name-text {
        font-weight: bold;
        font-size: 16px;
        line-height: 23px;
        color: #002877;
        height: 40px;
    }

    .prod--wrapper .prod--details .prod--description {
        margin-bottom: 13px;
    }

    .prod--wrapper .prod--details .prod--description .prod--description-text {
        font-size: 13px;
        line-height: 18px;
        color: #666666;
    }

    .chatSystemBox {
        overflow: auto;
        display: flex;
        flex-direction: column-reverse;
        width: 100%;
        padding: 25px;
        max-height: 500px;
        background-color: rgba(189, 195, 199, .4);
    }

    #care-plan-list {
        width: 100%;
        height: auto;
        padding: 22px;
        border-radius: 12px;
        box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px;
        font-size: 18px;
        font-weight: 600;
    }

    #previewContainer {
        height: 315px;
        border: 3px dashed rgba(99, 110, 114, .4);
        width: 100%;
        background-image: url('./assets/img/choose_file.png');
        background-repeat: no-repeat;
        background-position: center;
        background-size: 100px;
    }

    #previewImage {
        height: 314px;
    }
</style>



<body onLoad="initGeolocation();">
    <?php
    $result = mysqli_query($conn, "SELECT * FROM tbl_goesoft_carers_account 
    WHERE user_email_address = '" . $_SESSION['usr_email'] . "' ORDER BY userId DESC ");
    while ($trans = mysqli_fetch_array($result)) {
    ?>

        <div style="width:100%; position:fixed; top:0;" class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
            <aside class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0">
                <div class="py-4 text-gray-500 dark:text-gray-400">
                    <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
                        Geosoft
                    </a>
                    <ul class="mt-6">
                        <li class="relative px-6 py-3">
                            <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                            <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100" href="./dashboard">
                                <img src="assets/img/Home_icon_blue-1.png" style="width: 20px; height:20px;" alt="">
                                <span class="ml-4" style="font-size: 18px;">Dashboard</span>
                            </a>
                        </li>
                    </ul>
                    <ul>
                        <li class="relative px-6 py-3">
                            <h1 class="ml-4" style="font-size: 18px;"><strong>Personal Details</strong></h1>
                            <span class="ml-4" style="font-size: 16px; font-weight:600;">Full name</span><br />
                            <h1 class="ml-4" style="font-size: 15px;"><strong><?php echo " " . $trans['user_fullname'] . " "; ?></strong></h1>
                            <br>
                            <hr>
                            <br>
                            <span class="ml-4" style="font-size: 16px;"><strong>Phone number</strong></span><br />
                            <h1 class="ml-4" style="font-size: 16px; font-weight:600;"><?php echo " " . $trans['user_phone_number'] . " "; ?></h1>
                            <span class="ml-4" style="font-size: 16px;"><strong>Email Address</strong></span><br />
                            <h1 class="ml-4" style="font-size: 16px; font-weight:600;"><?php echo " " . $trans['user_email_address'] . " "; ?></h1>
                        </li>
                    </ul>

                    <ul class="mt-6">
                        <li class="relative px-6 py-3">
                            <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                            <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100" href="./timesheet<?php echo "?user_special_Id=" . $trans['user_special_Id'] . ""; ?>  ">
                                <img src="assets/img/timesheet-icon.png" style="width: 20px; height:20px;" alt="">
                                <span class="ml-4" style="font-size: 18px;">View timesheet</span>
                            </a>
                        </li>
                    </ul>

                    <!--<ul>
                        <li class="relative px-6 py-3">
                            <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100" style="padding: 12px;" href="../feedback">
                                <h1 class="ml-4" style="font-size: 18px;"><strong>Feedback</strong></h1>
                            </a>
                            <div class="ml-4" style="font-size: 16px; font-weight:600;">Help us improve Geosoft Care by sharing your thoughts and suggestions in our quick feedback survey.</div>
                        </li>
                    </ul>

                    <ul>
                        <li class="relative px-6 py-3">
                            <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100" href="../help-center">
                                <h1 class="ml-4" style="font-size: 18px;"><strong></strong></h1>
                            </a>
                            <div class="ml-4" style="font-size: 16px; font-weight:600;">Our support team are here to answer your questions and provide support with using Geosoft Care.</div>
                        </li>
                    </ul>

                    <ul class="mt-6">
                        <li class="relative px-6 py-3">
                            <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                            <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100" href="https://geosoftcare.co.uk/page/privacy-policy">
                                <img src="assets/img/privacy-icon.png" style="width: 20px; height:20px;" alt="">
                                <span class="ml-4" style="font-size: 18px;">Privacy Notice</span>
                            </a>
                        </li>
                    </ul>-->

                    <ul class="mt-6">
                        <li class="relative px-6 py-3">
                            <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                            <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100" href="./chat-system">
                                <img src="assets/img/Chat-PNG.png" style="width: 20px; height:20px;" alt="">
                                <span class="ml-4" style="font-size: 18px;">Chat with admin</span>
                            </a>
                        </li>
                    </ul>

                    <!--<ul>
                        <li class="relative px-6 py-3">
                            <h1 class="ml-4" style="font-size: 18px;"><strong>Versions</strong></h1>
                            <span class="ml-4" style="font-size: 16px;">Application</span><br />
                            <h1 class="ml-4" style="font-size: 15px;"><strong>11.1.8 - gp23-24</strong></h1>
                            <span class="ml-4" style="font-size: 16px;">Build</span><br />
                            <h1 class="ml-4" style="font-size: 16px;"><strong>Reg number</strong></h1>
                        </li>
                    </ul>-->

                    <div class="px-6 my-6">
                        <a href="./logout?logout" style="text-decoration: none;">
                            <button class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                Log Out
                                <span class="ml-2" aria-hidden="true"></span>
                            </button>
                        </a>
                    </div>
                </div>
            </aside>
            <!-- Mobile sidebar -->

            <!-- Backdrop -->
            <div x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"></div>
            <aside class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white dark:bg-gray-800 md:hidden" x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150" x-transition:enter-start="opacity-0 transform -translate-x-20" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0 transform -translate-x-20" @click.away="closeSideMenu" @keydown.escape="closeSideMenu">
                <div class="py-4 text-gray-500 dark:text-gray-400">
                    <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
                        Geosoft
                    </a>
                    <ul class="mt-6">
                        <li class="relative px-6 py-3">
                            <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                            <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100" href="./dashboard">
                                <img src="assets/img/home.png" style="width: 20px; height:20px;" alt="">
                                <span class="ml-4" style="font-size: 18px;">Dashboard</span>
                            </a>
                        </li>
                    </ul>

                    <ul>
                        <li class="relative px-6 py-3">
                            <h1 class="ml-4" style="font-size: 18px;"><strong>Personal Details</strong></h1>
                            <span class="ml-4" style="font-size: 16px; font-weight:600;">Full name</span><br />
                            <h1 class="ml-4" style="font-size: 15px;"><strong><?php echo " " . $trans['user_fullname'] . " "; ?></strong></h1>
                            <br>
                            <hr>
                            <br>
                            <span class="ml-4" style="font-size: 16px;"><strong>Phone number</strong></span><br />
                            <h1 class="ml-4" style="font-size: 15px; font-weight:600;"><?php echo " " . $trans['user_phone_number'] . " "; ?></h1>
                            <span class="ml-4" style="font-size: 16px; font-weight:600;"><strong>Email Address</strong></span><br />
                            <h1 class="ml-4" style="font-size: 16px; font-weight:600;"><?php echo " " . $trans['user_email_address'] . " "; ?></h1>
                        </li>
                    </ul>

                    <ul class="mt-6">
                        <li class="relative px-6 py-3">
                            <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                            <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100" href="./timesheet<?php echo "?user_special_Id=" . $trans['user_special_Id'] . "";
                                                                                                                                                                                                                        } ?>">
                                <img src="assets/img/timesheet-icon.png" style="width: 20px; height:20px;" alt="">
                                <span class="ml-4" style="font-size: 18px;">View timesheet</span>
                            </a>
                        </li>
                    </ul>

                    <!--<ul>
                        <li class="relative px-6 py-3">
                            <a target="_blank" class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100" style="padding: 12px;" href="https://geosoftcare.co.uk/page/contact">
                                <h1 class="ml-4" style="font-size: 18px;"><strong>Feedback</strong></h1>
                            </a>
                            <div class="ml-4" style="font-size: 16px; font-weight:600;">Help us improve Geosoft Care by sharing your thoughts and suggestions in our quick feedback survey.</div>
                        </li>
                    </ul>


                    <ul>
                        <li class="relative px-6 py-3">
                            <h1 class="ml-4" style="font-size: 18px;"><strong></strong></h1>
                            <div class="ml-4" style="font-size: 16px; font-weight:600;">Our support team are here to answer your questions and provide support with using Geosoft Care.</div>
                        </li>
                    </ul>

                    <ul class="mt-6">
                        <li class="relative px-6 py-3">
                            <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                            <a target="_blank" class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100" href="https://geosoftcare.co.uk/page/privacy-policy">
                                <img src="assets/img/privacy-icon.png" style="width: 20px; height:20px;" alt="">
                                <span class="ml-4" style="font-size: 18px;">Privacy Notice</span>
                            </a>
                        </li>
                    </ul>-->

                    <ul class="mt-6">
                        <li class="relative px-6 py-3">
                            <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                            <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100" href="./chat-system">
                                <img src="assets/img/chat.jpg" style="width: 20px; height:20px;" alt="">
                                <span class="ml-4" style="font-size: 18px;">Chat with admin</span>
                            </a>
                        </li>
                    </ul>

                    <!--<ul>
                        <li class="relative px-6 py-3">
                            <h1 class="ml-4" style="font-size: 18px;"><strong>Versions</strong></h1>
                            <span class="ml-4" style="font-size: 16px;">Application</span><br />
                            <h1 class="ml-4" style="font-size: 15px;"><strong>11.1.8 - gp23-24</strong></h1>
                            <span class="ml-4" style="font-size: 16px;">Build</span><br />
                            <h1 class="ml-4" style="font-size: 16px;"><strong>Reg number</strong></h1>
                        </li>
                    </ul>-->

                    <div class="px-6 my-6">
                        <a href="./logout?logout" style="text-decoration: none;">
                            <button class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                Log Out
                                <span class="ml-2" aria-hidden="true"></span>
                            </button>
                        </a>
                    </div>
                </div>
            </aside>
            <div class="flex flex-col flex-1 w-full">


                <header class="z-10 py-4 bg-white shadow-md dark:bg-gray-800">
                    <div class="container flex items-center justify-between h-full px-6 mx-auto text-purple-600 dark:text-purple-300">
                        <!-- Mobile hamburger -->
                        <button class="p-1 mr-5 -ml-1 rounded-md md:hidden focus:outline-none focus:shadow-outline-purple" @click="toggleSideMenu" aria-label="Menu">
                            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <!-- Search input -->
                        <div class="flex justify-center flex-1 lg:mr-32">
                            <div class="relative w-full max-w-xl mr-6 focus-within:text-purple-500">


                            </div>
                        </div>
                        <ul class="flex items-center flex-shrink-0 space-x-6">
                            <!-- Theme toggler -->
                            <li class="flex">
                                <button class="rounded-md focus:outline-none focus:shadow-outline-purple" @click="toggleTheme" aria-label="Toggle color mode">
                                    <template x-if="!dark">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                                        </svg>
                                    </template>
                                    <template x-if="dark">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"></path>
                                        </svg>
                                    </template>
                                </button>
                            </li>
                            <!-- Notifications menu -->
                            <li class="relative">
                                <button class="relative align-middle rounded-md focus:outline-none focus:shadow-outline-purple" @click="toggleNotificationsMenu" @keydown.escape="closeNotificationsMenu" aria-label="Notifications" aria-haspopup="true">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"></path>
                                    </svg>
                                    <!-- Notification badge -->
                                    <span aria-hidden="true" class="absolute top-0 right-0 inline-block w-3 h-3 transform translate-x-1 -translate-y-1 bg-red-600 border-2 border-white rounded-full dark:border-gray-800"></span>
                                </button>
                                <!--<template x-if="isNotificationsMenuOpen">
                                    <ul x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click.away="closeNotificationsMenu" @keydown.escape="closeNotificationsMenu" class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:text-gray-300 dark:border-gray-700 dark:bg-gray-700">
                                        <li class="flex">
                                            <a target="_blank" class="inline-flex items-center justify-between w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200" href="https://geosoftcare.co.uk/page/contact">
                                                <span>Feedback</span>
                                            </a>
                                        </li>
                                        <li class="flex">
                                            <a class="inline-flex items-center justify-between w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200" href="#">
                                                <span></span>
                                            </a>
                                        </li>
                                        <li class="flex">
                                            <a class="inline-flex items-center justify-between w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200" href="#">
                                                <span>Visits</span>
                                            </a>
                                        </li>
                                    </ul>
                                </template>-->
                            </li>
                            <!-- Profile menu -->
                            <li class="relative">
                                <button class="align-middle rounded-full focus:shadow-outline-purple focus:outline-none" @click="toggleProfileMenu" @keydown.escape="closeProfileMenu" aria-label="Account" aria-haspopup="true">
                                    <img class="object-cover w-8 h-8 rounded-full" src="assets/img/user_icons.png" alt="" aria-hidden="true" />
                                </button>
                                <template x-if="isProfileMenuOpen">
                                    <ul x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click.away="closeProfileMenu" @keydown.escape="closeProfileMenu" class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:border-gray-700 dark:text-gray-300 dark:bg-gray-700" aria-label="submenu">
                                        <!--<li class="flex">
                                            <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200" href="#">
                                                <svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                                </svg>
                                            </a>
                                        </li>-->
                                        <li class="flex">
                                            <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200" href="./logs">
                                                <span><img style="height: 17px; height:17px;" src="./assets/img/care-plan/list.svg" alt=""></span>
                                                &nbsp;&nbsp;&nbsp;
                                                <span>Logs</span>
                                            </a>
                                        </li>
                                        <li class="flex">
                                            <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200" href="./availability">
                                                <span><img style="height: 17px; height:17px;" src="./assets/img/care-plan/user-minus.svg" alt=""></span>
                                                &nbsp;&nbsp;&nbsp;
                                                <span>Availability</span>
                                            </a>
                                        </li>
                                        <li class="flex">
                                            <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200" href="./logout?logout">
                                                <span><img style="height: 17px; height:17px;" src="./assets/img/care-plan/log-out.svg" alt=""></span>
                                                &nbsp;&nbsp;&nbsp;
                                                <span>Log out</span>
                                            </a>
                                        </li>
                                    </ul>
                                </template>
                            </li>
                        </ul>
                    </div>
                </header>