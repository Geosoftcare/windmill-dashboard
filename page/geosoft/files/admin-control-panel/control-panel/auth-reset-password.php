<!DOCTYPE html>
<html lang="en">

<head>
    <title>GeosoftCare | Admin control panel - Reset Password</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Geocare is a dynamic nursing and domiciliary agency based in the UK. It is built on solid partnership and experience spanning almost two decades within its management team.">
    <meta name="keywords" content="HTML, CSS, JavaScript, AJAX, PHP mySQL">
    <meta name="author" content="Geocare Services Limited">
    <!-- Favicon icon -->
    <meta property="og:image" content="assets/images/gsLogo.png" />
    <meta name="twitter:image" content="assets/images/gsLogo.png" />
    <link rel="icon" href="assets/images/gsLogo.png" />
    <!-- Favicon icon -->
    <link rel="icon" href="assets/images/gsLogo.png" type="image/x-icon" />
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <!-- vendor css -->
    <link rel="stylesheet" href="assets/css/style.css">

    <script type="text/javascript">
        $(document).ready(function() {
            $('#popupAlert').hide();
        });
    </script>
    <?php include('processing-reset-password.php'); ?>
</head>

<!-- [ auth-signup ] start -->
<div class="auth-wrapper">
    <div class="auth-content text-center">

        <form action="./auth-reset-password" method="POST" enctype="multipart/form-data" name="signupForm" autocomplete="off">
            <div class="card borderless">
                <div class="row align-items-center text-center">
                    <div class="col-md-12">
                        <div class="card-body">
                            <h4 class="f-w-400">Reset Password</h4>
                            <hr>

                            <div id="popupAlert" style="width: 100%; height:auto; margin-bottom:5px; padding:22px; background-color:rgba(192, 57, 43,1.0); color:white;">
                                Email does not exist!!!
                            </div>
                            <div class="form-group mb-3">
                                <label style="text-align: left;" for="Company name">Enter email</label>
                                <input type="email" name="myEmail" class="form-control" id="myEmail" placeholder="Email address" required />
                            </div>

                            <button type="submit" id="save-btn" name="btnCheckForEmail" class="btn btn-primary btn-block mb-4">Reset password</button>
                            <hr>
                            <p class="mb-2">Already have an account? <a href="./index" class="f-w-400">Sign in</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- [ auth-signup ] end -->


<script>
    save_btn = document.querySelector("#save-btn");

    save_btn.onclick = function() {
        this.innerHTML = "<div class='loader'>Loading...</div>";
        setTimeout(() => {
            this.innerHTML = "Reset password";
            this.style = "color: #fff; pointer-event:none;";
        }, 7000);
    }
</script>
<!-- Required Js -->
<script src="assets/js/vendor-all.min.js"></script>
<script src="assets/js/plugins/bootstrap.min.js"></script>



</body>

</html>