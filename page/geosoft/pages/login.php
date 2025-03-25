<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Geosoft care - Software for care settings is a dynamic nursing, domiciliary, support and agency App based in the UK. It is built on solid partnership and experience spanning almost two decades within its management team.">
    <meta name="keywords" content="HTML, CSS, JavaScript, AJAX, PHP mySQL">
    <meta name="author" content="Ese Sphere IT Solution.">
    <title>Geosoft Care - Welcome | For home and community care</title>
    <meta property="og:image" content="../assets/img/gsLogo.png" />
    <meta name="twitter:image" content="../assets/img/gsLogo.png" />
    <link rel="icon" href="../assets/img/gsLogo.png" />
    <link rel="icon" href="../assets/img/gsLogo.png" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" integrity="sha384-4LISF5TTJX/fLmGSxO53rV4miRxdg84mZsxmO8Rx5jGtp/LbrixFETvWa5a6sESd" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css" integrity="sha384-BY+fdrpOd3gfeRvTSMT+VUZmA728cfF9Z2G42xpaRkUGu2i3DyzpTURDo5A6CaLK" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        $(document).ready(function() {
            window.setTimeout(function() {
                location.href = "./log";
            }, 3000);
        });
    </script>
</head>
<style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
    }

    #splash-screen {
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
        transition: opacity 0.5s ease;
    }

    #main-content {
        padding: 20px;
    }

    @keyframes fadeInUp {
        0% {
            transform: translateY(100%);
            opacity: 0;
        }

        100% {
            transform: translateY(0%);
            opacity: 1;
        }
    }

    #geosoft-logo {
        animation: 1.5s fadeInUp;
    }

    #slide {
        animation: 3s fadeInUp;
    }
</style>

<body>

    <div class="container-fluid" id="splash-screen">
        <div id="splash-logo img-logo">
            <img id="geosoft-logo" src="../assets/img/gsLogo.png" alt="Geosoft Care Logo" style="width: 120px; height: 120px;">
        </div>
        <div style="margin-top: 10px; font-size:22px;" id="slide">
            <b>GEOSOFT</b>
        </div>
    </div>
</body>

</html>