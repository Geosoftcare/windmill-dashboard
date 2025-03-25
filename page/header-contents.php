<?php include('dbconnections.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php echo $CompanyName; ?></title>
    <meta name="description" content="Geosoft care the perfect solution for home care and agency App based in the UK. It is built on solid partnership and experience spanning almost two decades within its management team." />
    <meta name="keywords" content="HTML, CSS, JavaScript, AJAX, PHP mySQL" />
    <meta name="author" content="Ese Sphere Ent" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <meta property="og:image" content="img/gsLogo.png" />
    <meta name="twitter:image" content="img/gsLogo.png" />
    <link rel="icon" href="img/gsLogo.png" />
    <!-- Logo icon -->
    <link rel="icon" href="img/gsLogo.png" type="image/x-icon" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,700|Roboto:300,400,700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="vendor/line-awesome/css/line-awesome.min.css" rel="stylesheet">
    <link href="vendor/aos/aos.css" rel="stylesheet">
    <link href="vendor/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script>
        document.addEventListener('contextmenu', event => event.preventDefault());
    </script>
</head>
<style>
    html,
    body {
        overflow-x: hidden;
    }

    #cb-cookie-banner {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        z-index: 1000;
        border-radius: 0;
        display: none;
    }
</style>

<body onload="checkCookie()">

    <div class="site-wrap">

        <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icofont-close js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>

        <header class="site-navbar js-sticky-header site-navbar-target" role="banner">

            <div class="container">
                <div class="row align-items-center">

                    <div class="col-6 col-lg-2">
                        <h1 class="mb-0 site-logo"><a href="./index" class="mb-0">
                                <img src="./img/gsLogo - Copy.png" style="width: 180px; height:28px;" alt="">
                            </a></h1>
                    </div>

                    <div class="col-12 col-md-10 d-none d-lg-block">
                        <nav class="site-navigation position-relative text-right" role="navigation">

                            <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                                <li class="active"><a href="./index" class="nav-link">Home</a></li>
                                <li><a href="./about-us" class="nav-link">About us</a></li>
                                <!--<li class="has-children">
                                    <a href="./resources" class="nav-link">Resources</a>
                                    <ul class="dropdown">
                                        <li><a href="./blog" class="nav-link">Blog</a></li>
                                        <li><a href="blog-single.html" class="nav-link">Blog Sigle</a></li>
                                    </ul>
                                </li>
                                <li class="has-children">
                                    <a href="./solutions" class="nav-link">Solutions</a>
                                    <ul class="dropdown">
                                        <li><a href="./blog" class="nav-link">Blog</a></li>
                                        <li><a href="blog-single.html" class="nav-link">Blog Sigle</a></li>
                                    </ul>
                                </li>-->
                                <li><a href="./pricing" class="nav-link">Pricing</a></li>
                                <li class="">
                                    <a href="./features" class="nav-link">Features</a>
                                    <!--<ul class="dropdown">
                                        <li><a href="./blog" class="nav-link">Blog</a></li>
                                        <li><a href="blog-single.html" class="nav-link">Blog Sigle</a></li>
                                    </ul>-->
                                </li>
                                </li>
                                <li style="border-radius:5%; background-color:#FF9800; color:white; cursor:pointer;"><a href="./feedback" class="nav-link">Feedback</a></li>
                                <li><a href="./contact" class="nav-link">Contact</a></li>
                                <li><a href="./geosoft/files/admin-control-panel/control-panel/" target="_blank" class="nav-link">Sign In</a></li>
                            </ul>
                        </nav>
                    </div>


                    <div class="col-6 d-inline-block d-lg-none ml-md-0 py-3" style="position: relative; top: 3px;">

                        <a href="#" class="burger site-menu-toggle js-menu-toggle" data-toggle="collapse" data-target="#main-navbar">
                            <span></span>
                        </a>
                    </div>

                </div>
            </div>

        </header>