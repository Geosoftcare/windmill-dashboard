<?php

  session_start();
  include('dbcon.php');
  
  $error = false;
  
  if( isset($_POST['btnSubmitform']) ) {  
    
    // prevent sql injections/ clear user invalid inputs
    $email = mysqli_real_escape_string($con, $_POST['myEmail']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);
    // prevent sql injections / clear user invalid inputs
    
    if(empty($email)){
      $error = true;
      $emailError = "Please enter your email address.";
    } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
      $error = true;
      $emailError = "Please enter valid email address.";
    }
    
    // if there's no error, continue to login
    if (!$error) {
    
      $res=mysqli_query($con, "SELECT email FROM blogusers WHERE email='$email'");
      $row=mysqli_fetch_array($res);
      $count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row
      
      if( $count == 1 && $row['email']==$email ) {
        $_SESSION['usr_id'] = $row['id'];
        $_SESSION['usr_email'] = $row['email'];
        header("Location: new-password.php");
      } else {
        echo "
        <script>
        alert('User Don't exist.);
        window.parent(location= 'reset-password.php');
        </script>
      ";
      }
        
    }
    
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Login | Geo Training - Blog</title>
    <!-- MDB icon -->
    <link rel="icon" href="../img/media-documents/geoLogo.png" type="image/x-icon" />
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />
    <!-- Google Fonts Roboto -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
    />
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />
  </head>
  <body>
    <!-- Start project here-->
    <div class="container">
      <!-- Section: Design Block -->
<section class="text-center text-lg-start">
  <style>
    .cascading-right {
      margin-right: -50px;
    }

    @media (max-width: 991.98px) {
      .cascading-right {
        margin-right: 0;
      }
    }
    #form3Example4,#btnExample4 { height: 55px; font-size: 18px; }
  </style>

  <!-- Jumbotron -->
  <div class="container py-4">
    <div class="row g-0 align-items-center">
      <div class="col-lg-6 mb-5 mb-lg-0">
        <div class="card cascading-right" style="
            background: hsla(0, 0%, 100%, 0.55);
            backdrop-filter: blur(30px);
            ">
          <div class="card-body p-5 shadow-5 text-center">
            <h2 class="fw-bold mb-5">Reset Password</h2>
            <form method="POST" enctype="multipart/form-data" autocomplete="off" name="loginForm" action="reset-password.php">
              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="email" name="myEmail" required id="form3Example4" class="form-control" />
                <label class="form-label" for="form3Example3">Email address</label>
              </div>

              <!-- Checkbox -->
              <div class="form-check d-flex justify-content-center mb-4">
                
                <label class="form-check-label" for="form2Example33"> I know my password <a href="index.php" style="text-decoration:none;">
                    Login
                  </a>
                </label>
              </div>

              <!-- Submit button -->
              <button id="btnExample4" name="btnSubmitform" type="submit" class="btn btn-primary btn-block mb-4">
                Continue
              </button>
            </form>
          </div>
        </div>
      </div>

      <div class="col-lg-6 mb-5 mb-lg-0">
        <img src="https://mdbootstrap.com/img/new/ecommerce/vertical/004.jpg" class="w-100 rounded-4 shadow-4"
          alt="" />
      </div>
    </div>
  </div>
  <!-- Jumbotron -->
</section>
<!-- Section: Design Block -->
    </div>
    <!-- End project here-->

    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>
  </body>
</html>
