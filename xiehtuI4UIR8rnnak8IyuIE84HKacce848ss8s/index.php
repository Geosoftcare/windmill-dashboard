<!DOCTYPE html>
<html lang="en">

<head>
	<title>Geosoft Care | Admin control panel - Sign up</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="Geosoft care - Software for care settings is a dynamic nursing, domiciliary, support and agency App based in the UK. It is built on solid partnership and experience spanning almost two decades within its management team.">
	<meta name="keywords" content="HTML, CSS, JavaScript, AJAX, PHP mySQL">
	<meta name="author" content="Ese Sphere LTD">
	<meta property="og:image" content="assets/images/gsLogo.png" />
	<meta name="twitter:image" content="assets/images/gsLogo.png" />
	<link rel="icon" href="assets/images/gsLogo.png" />
	<link rel="icon" href="assets/images/gsLogo.png" type="image/x-icon" />
	<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="assets/css/style.css">
	<script type="text/javascript">
		$(document).ready(function() {
			$('#popupAlert').hide();
		});
	</script>
	<?php include('processing-signup-details.php'); ?>
</head>

<div class="auth-wrapper">
	<div class="auth-content text-center">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data" name="signupForm" autocomplete="off">
			<div class="card borderless">
				<div class="row align-items-center text-center">
					<div class="col-md-12">
						<div class="card-body">
							<h4 class="f-w-400">Create Access <br>
								<small style="font-size: 15px;">
									Create access for new company
								</small>
							</h4>
							<hr>
							<div id="popupAlert" style="width: 100%; height:auto; margin-bottom:5px; padding:22px; background-color:rgba(192, 57, 43,1.0); color:white;">
								Company already exist!!!
							</div>
							<div class="form-group mb-3">
								<input type="email" name="myEmail" class="form-control" id="myEmail" placeholder="Email address" required />
							</div>
							<div class="form-group mb-3">
								<input type="text" name="fullName" class="form-control" id="username" placeholder="Company name" required />
							</div>
							<hr>
							<div class="form-group mb-4">
								<input type="password" minlength="8" name="myPassword" class="form-control" id="Password" placeholder="Password" required />
							</div>
							<button type="submit" id="save-btn" name="btnAccessurlform" class="btn btn-primary btn-block mb-4">Create account</button>
							<hr>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>


<script>
	save_btn = document.querySelector("#save-btn");
	save_btn.onclick = function() {
		this.innerHTML = "<div class='loader'>Loading...</div>";
		setTimeout(() => {
			this.innerHTML = "Sign up";
			this.style = "color: #fff; pointer-event:none;";
		}, 7000);
	}
</script>

<script src="assets/js/vendor-all.min.js"></script>
<script src="assets/js/plugins/bootstrap.min.js"></script>



</body>

</html>