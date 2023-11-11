<?php 

include_once 'site_connection.php';
	
$sent_otp = $_SESSION['otp'];

if (isset($_POST['verify_otp']))
{
	$get_otp = $_POST['enter_opt'];

	if($sent_otp==$get_otp)
	{
		header('location:password_change.php');
	}
	else
	{ ?>
		<div style="text-align: center; color: red; padding-top:10px;">"Enter OTP is not match..! Kindly enter OTP which is sent to your registered mail ID...."</div>
	<?php }
}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/MagnificPopup/magnific-popup.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main_css.css">
<!--===============================================================================================-->

</head>

<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.php" class="logo_login">
				<img src="images/icons/logo-01.png" alt="IMG-LOGO">
			</a>
		</div>
	

	<div class="login_text">
		<h4 class="p-b-15 ltext-108 cl2 trans-04">
			VERIFY OTP
		</h4>

		<p class="stext-117 cl6">
			Enjoy a personalised shopping experience
		</p>
	</div>					
								

	<!-- Shoping Cart -->
<form method="post">	
	<div class="bg0 p-t-50">
		<div class="container">
			<div class="row">
				<div class="col-lg-5 col-md-6 col-sm-10 m-lr-auto">

						<div class="col-12 p-b-35">
							<label class="stext-102 cl3" for="otp">Enter 6 Digit OTP (which is sent on your registered mail)</label>
							<input class="size-111 bor8 stext-102 cl2 p-lr-20" id="name" type="text" name="enter_opt" maxlength="6" minlength="6" required>
						</div>

						<div class="col-sm-12 p-b-5 button_login_flex">
							<button class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10" name="verify_otp">
								Verify OTP
							</button>
						</div>

						<label class="stext-102 cl3 login_or" for="email">--- OR ----</label>
						
						<div class="login_flex">
							<small style="font-size: 13px">Wants to back to login ? </small>
							<a href="login_home.php" class="flex-c-m cl0 size-112 bg7 bor11 p-lr-15 trans-04 m-b-2 register" name="review_submit" id="review_count">Back to Login</a> 
						</div>	


				</div>
			</div>
		</div>
	</div>
</form>
</div>


	<?php include_once 'scripts.php'; ?>