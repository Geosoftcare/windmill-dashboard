<!DOCTYPE html>
<html lang="en">

<head>
	<title>Geosoft Care | Admin control panel - Sign up</title>
	<!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 11]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	<!-- Meta -->
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
	<?php include('processing-signup-details.php'); ?>
</head>

<!-- [ auth-signup ] start -->
<div class="auth-wrapper">
	<div class="auth-content text-center">

		<form action="./auth-signup" method="POST" enctype="multipart/form-data" name="signupForm" autocomplete="off">
			<div class="card borderless">
				<div class="row align-items-center text-center">
					<div class="col-md-12">
						<div class="card-body">
							<h4 class="f-w-400">Sign up</h4>
							<hr>

							<div id="popupAlert" style="width: 100%; height:auto; margin-bottom:5px; padding:22px; background-color:rgba(192, 57, 43,1.0); color:white;">
								Email already exist!!!
							</div>
							<div class="form-group mb-3">
								<input type="text" name="fullName" class="form-control" id="username" placeholder="Full name" required />
							</div>
							<div class="form-group mb-3">
								<input type="text" name="myEmail" class="form-control" id="myEmail" placeholder="Email address" required />
							</div>
							<hr>

							<div class="form-group mb-3">
								<label style="text-align: left;" for="Company name">What city does your company located?</label>
								<select name="txtSelectCurrentCity" required type="text" class="form-control" id="exampleFormControlSelect1" placeholder="City">
									<optgroup label="England">England
										<option value="Null">--Select City--</option>
										<option value="Bath">Bath</option>
										<option value="Birmingham">Birmingham</option>
										<option value="Bradford">Bradford</option>
										<option value="Brighton & Hove">Brighton & Hove</option>
										<option value="Bristol">Bristol</option>
										<option value="Cambridge">Cambridge</option>
										<option value="Canterbury">Canterbury</option>
										<option value="Carlisle">Carlisle</option>
										<option value="Chelmsford">Chelmsford</option>
										<option value="Chester">Chester</option>
										<option value="Chichester">Chichester</option>
										<option value="Colchester">Colchester</option>
										<option value="Coventry">Coventry</option>
										<option value="Derby">Derby</option>
										<option value="Doncaster">Doncaster</option>
										<option value="Durham">Durham</option>
										<option value="Ely">Ely</option>
										<option value="Exeter">Exeter</option>
										<option value="Gloucester">Gloucester</option>
										<option value="Hereford">Hereford</option>
										<option value="Kingston-upon-Hull">Kingston-upon-Hull</option>
										<option value="Lancaster">Lancaster</option>
										<option value="Leeds">Leeds</option>
										<option value="Leicester">Leicester</option>
										<option value="Lichfield">Lichfield</option>
										<option value="Lincoln">Lincoln</option>
										<option value="Liverpool">Liverpool</option>
										<option value="London">London</option>
										<option value="Manchester">Manchester</option>
										<option value="Milton Keynes">Milton Keynes</option>
										<option value="Newcastle-upon-Tyne">Newcastle-upon-Tyne</option>
										<option value="Norwich">Norwich</option>
										<option value="Nottingham">Nottingham</option>
										<option value="Oxford">Oxford</option>
										<option value="Peterborough">Peterborough</option>
										<option value="Plymouth">Plymouth</option>
										<option value="Portsmouth">Portsmouth</option>
										<option value="Preston">Preston</option>
										<option value="Ripon">Ripon</option>
										<option value="Salford">Salford</option>
										<option value="Salisbury">Salisbury</option>
										<option value="Sheffield">Sheffield</option>
										<option value="Southampton">Southampton</option>
										<option value="Southend-on-Sea">Southend-on-Sea</option>
										<option value="St Albans">St Albans</option>
										<option value="Stoke on Trent">Stoke on Trent</option>
										<option value="Sunderland">Sunderland</option>
										<option value="Truro">Truro</option>
										<option value="Wakefield">Wakefield</option>
										<option value="Wells">Wells</option>
										<option value="Westminster">Westminster</option>
										<option value="Winchester">Winchester</option>
										<option value="Wolverhampton">Wolverhampton</option>
										<option value="Worcester">Worcester</option>
										<option value="York">York</option>
									</optgroup>

									<optgroup label="Northern Ireland">Northern Ireland
										<option value="Armagh">Armagh</option>
										<option value="Bangor">Bangor</option>
										<option value="Belfast">Belfast</option>
										<option value="Lisburn">Lisburn</option>
										<option value="Londonderry">Londonderry</option>
										<option value="Newry">Newry</option>
									</optgroup>


									<optgroup label="Scotland">Scotland
										<option value="Aberdeen">Aberdeen</option>
										<option value="Dundee">Dundee</option>
										<option value="Dunfermline">Dunfermline</option>
										<option value="Edinburgh">Edinburgh</option>
										<option value="Glasgow">Glasgow</option>
										<option value="Inverness">Inverness</option>
										<option value="Perth">Perth</option>
										<option value="Stirling">Stirling</option>
									</optgroup>

									<optgroup label="Wales">Wales
										<option value="Bangor">Bangor</option>
										<option value="Cardiff">Cardiff</option>
										<option value="Newport">Newport</option>
										<option value="St Asaph">St Asaph</option>
										<option value="St Davids">St Davids</option>
										<option value="Swansea">Swansea</option>
										<option value="Wrexham">Wrexham</option>
									</optgroup>
								</select>
							</div>

							<div class="form-group mb-4">
								<input type="password" minlength="8" name="myPassword" class="form-control" id="Password" placeholder="Password" required />
							</div>

							<?php

							for ($a = 1; $a <= 50; $a++) {
								$usdd = "0";
								$rand = rand(0000, 9999);
								$ud = "45";
								$id = "$usdd$rand$ud";
							}

							// Return current date from the remote server

							?> <input type="hidden" value="<?php echo $id; ?>" name="mysocialId" />
							<input type="hidden" name="currentDate" value="<?php echo "" . date("Y-m-d") . ""; ?>" />
							<input type="hidden" name="currentTime" value="<?php echo "" . date("H:ia"); ?>" />

							<div class="custom-control custom-checkbox  text-left mb-4 mt-2">
								<input type="checkbox" class="custom-control-input" id="customCheck1">
								<label class="custom-control-label" for="customCheck1">Keep me <a href="#!"> loged in</a>.</label>
							</div>

							<?php /*Get user ip address*/
							$ip_address = $_SERVER['REMOTE_ADDR'];
							/*Get user ip address details with geoplugin.net*/
							$geopluginURL = 'http://www.geoplugin.net/php.gp?ip=' . $ip_address;
							$addrDetailsArr = unserialize(file_get_contents($geopluginURL));
							/*Get City name by return array*/
							$city = $addrDetailsArr['geoplugin_city'];
							/*Get Country name by return array*/
							$country = $addrDetailsArr['geoplugin_countryName'];
							/*Comment out these line to see all the posible details*/
							/*echo '<pre>'; print_r($addrDetailsArr); die();*/

							if (!$city) {
								$city = 'Not Define';
							}
							if (!$country) {
								$country = 'Not Define';
							}

							?>
							<input type='hidden' value='<?php echo "" . $ip_address . ""; ?>' name='txtIpAddress' />
							<input type='hidden' value='<?php echo "" . $country . ""; ?>' name='txtmyCountry' />

							<button type="submit" id="save-btn" name="btnSubmitform" class="btn btn-primary btn-block mb-4">Create account</button>
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
			this.innerHTML = "Sign up";
			this.style = "color: #fff; pointer-event:none;";
		}, 7000);
	}
</script>
<!-- Required Js -->
<script src="assets/js/vendor-all.min.js"></script>
<script src="assets/js/plugins/bootstrap.min.js"></script>



</body>

</html>