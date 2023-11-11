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
	<link rel="stylesheet" type="text/css" href="css/maina.css">
<!--===============================================================================================-->

	<style>
		.login_or{
			text-align: center;
			margin-bottom: 50px;
		}
		.register{
			font-family: Poppins-Medium;
			color: #333;
			background-color: white;
			font-size: 17px;
			font-weight: 500;
		}
		.login_flex{
			margin: auto;
			font-family: Poppins-Medium;
			display: flex;
			align-items: center;
			gap: 2px;
			justify-content: center;
		}
		.logo_login{
			margin: auto;
			margin-top: 90px;
			margin-bottom: 80px;
			width: 160px;
		}
		.logo_login img{
			width: 100%;
		}
		.button_login_flex{
			display: flex;
			justify-content: space-between;
			align-items: center;
			margin-bottom: 50px;
		}
		.forgot{
			font-family: Poppins-Medium;
			color: #333;
			background-color: white;
			font-size: 14px;
			font-weight: 500;
		}
		.login_text h4{
			font-family: Poppins-Medium;
			font-size: 13.5px;
			font-weight: 600;
			text-align: center;
		}
		.login_text p{
			font-family: Poppins-Medium;
			font-size: 11.5px;
			font-weight: 400;
			font-style: italic;
			text-align: center;
		}
	</style>
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
			LOGIN / REGISTER
		</h4>

		<p class="stext-117 cl6">
			Enjoy a personalised shopping experience
		</p>
	</div>					
								

	<!-- Shoping Cart -->
<div id="new_number_of_product">
	<div class="bg0 p-t-50">
		<div class="container">
			<div class="row">
				<div class="col-lg-5 col-md-6 col-sm-10 m-lr-auto">
							
					<form method="post" class="w-full" id="review_submit">

						<div class="col-12 p-b-5">
							<label class="stext-102 cl3" for="name">User ID</label>
							<input class="size-111 bor8 stext-102 cl2 p-lr-20" id="name" type="text" name="user_id">
						</div>

						<div class="col-12 p-b-5">
							<label class="stext-102 cl3" for="email">Password</label>
							<input class="size-111 bor8 stext-102 cl2 p-lr-20" id="email" type="password" name="password">
						</div>
											
						<br>

						<div class="col-sm-12 p-b-5 button_login_flex">
							<input type="submit" name="login" value="Login" class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10">
							<a href="#" class="forgot m-b-5">Forgot Password?</a>
						</div>

						<label class="stext-102 cl3 login_or" for="email">--- OR ----</label>
						
						<div class="login_flex">
							<small style="font-size: 13px">New to CozaStore ? </small>
							<a href="register.php" class="flex-c-m cl0 size-112 bg7 bor11 p-lr-15 trans-04 m-b-2 register" name="review_submit" id="review_count">Create an account</a> 
						</div>
					</form>

				</div>
			</div>
		</div>
	</div>
</div>
</div>


	<?php include_once 'scripts.php'; ?>