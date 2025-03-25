<!DOCTYPE html>
<html lang="en">

<head>

	<title>Geosoft | Admin control panel - Sign in</title>
	<!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 11]> 
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="description" content="Geosoft care - Software for care settings is a dynamic nursing, domiciliary, support and agency App based in the UK. It is built on solid partnership and experience spanning almost two decades within its management team." />
	<meta name="keywords" content="HTML, CSS, JavaScript, AJAX, PHP mySQL" />
	<meta name="author" content="Ese Sphere Ent" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<!-- Logo icon -->
	<meta property="og:image" content="assets/images/gsLogo.png" />
	<meta name="twitter:image" content="assets/images/gsLogo.png" />
	<link rel="icon" href="assets/images/gsLogo.png" />
	<!-- Logo icon -->
	<link rel="icon" href="assets/images/gsLogo.png" type="image/x-icon" />
	<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

	<!-- vendor css -->
	<link rel="stylesheet" href="assets/css/style.css">

	<script type="text/javascript">
		$(document).ready(function() {
			$('#popupAlert').hide();
		});
	</script>
	<?php include('processing-user-signin.php'); ?>

</head>

<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
	<div class="auth-content text-center">
		<form action="./index" method="POST" enctype="multipart/form-data" name="signupForm" autocomplete="off">
			<div class="card borderless">
				<div class="row align-items-center ">
					<div class="col-md-12">
						<div class="card-body">
							<h4 class="mb-3 f-w-400">Sign in</h4>
							<hr>
							<div id="popupAlert" style="width: 100%; height:auto; margin-bottom:5px; padding:22px; background-color:rgba(192, 57, 43,1.0); color:white;">
								Incorrect login!!!
							</div>
							<div class="form-group mb-3">
								<input type="text" name="myEmail" required class="form-control" id="Email" placeholder="Email address">
							</div>
							<div class="form-group mb-4">
								<input type="password" name="myPassword" required class="form-control" id="Password" placeholder="Password">
							</div>
							<div class="custom-control custom-checkbox text-left mb-4 mt-2">
								<input type="checkbox" class="custom-control-input" id="customCheck1">
								<label class="custom-control-label" for="customCheck1">Save credentials.</label>
							</div>
							<button type="submit" name="btnSubmitform" class="btn btn-primary btn-block mb-4">Log in</button>
							<hr>
							<p class="mb-2 text-muted">Forgot password? <a href="./auth-reset-password" class="f-w-400">Reset</a></p>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
<!-- [ auth-signin ] end -->

<!-- Required Js -->
<script src="assets/js/vendor-all.min.js"></script>
<script src="assets/js/plugins/bootstrap.min.js"></script>



</body>

</html>