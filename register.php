<?php 

include_once 'site_connection.php';

if (isset($_POST['register']))
{
	$name = $_POST['name'];
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	$password1 = $_POST['password1'];
	$password2 = $_POST['password2'];

	if($password1 == $password2)
	{
		$sql_select_email = "select * from `user_register` where `email`='$email'";
		$data_email = mysqli_query($conn,$sql_select_email);
		$email_count = mysqli_num_rows($data_email);

		$sql_select_mobile = "select * from `user_register` where `mobile_number`='$mobile'";
		$data_mobile = mysqli_query($conn,$sql_select_mobile);
		$mobile_count = mysqli_num_rows($data_mobile);

			if($email_count==0)
			{
				if($mobile_count==0)
				{
					$sql_insert = "insert into `user_register`(`name`,`email`,`mobile_number`,`password`)values('$name','$email','$mobile','$password1')";
					mysqli_query($conn,$sql_insert);

					header('location:login_home.php');
				}
				else
				{ ?>
					<div style="text-align: center; color: red; padding-top:10px;">"Entered Mobile Number is already exist.... Please enter correct Mobile number or user Forgot Password option...."</div>
				<?php }
			}
			else
			{ ?>
				<div style="text-align: center; color: red; padding-top:10px;">"Entered Email ID is already exist.... Please enter correct email or user Forgot Password option...."</div>
			<?php }
	}
	else
	{ ?>
		<div style="text-align: center; color: red; padding-top:10px;">"Re-entered password is not match.. Kindly enter same password in both tab...."</div>
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
	</div>
	

	<div class="login_text">
		<h4 class="p-b-15 ltext-108 cl2 trans-04">
			REGISTER NOW
		</h4>

		<p class="stext-117 cl6">
			Enjoy a personalised shopping experience
		</p>
	</div>					
								

	<!-- Shoping Cart -->
<form method="post">
<div id="new_number_of_product">
	<div class="bg0 p-t-50">
		<div class="container">
			<div class="row">
				<div class="col-lg-5 col-md-6 col-sm-10 m-lr-auto">			
					
						<div class="col-12 p-b-5">
							<label class="stext-102 cl3" for="name">Name</label>
							<input type="text" name="name" class="size-111 bor8 stext-102 cl2 p-lr-20" required>
						</div>

						<div class="col-12 p-b-5">
							<label class="stext-102 cl3" for="email">Email</label>
							<input type="email" name="email" class="size-111 bor8 stext-102 cl2 p-lr-20" required>
						</div>

						<div class="col-12 p-b-5">
							<label class="stext-102 cl3" for="mobile">Mobile Number</label>
							<input type="text" name="mobile" class="size-111 bor8 stext-102 cl2 p-lr-20" required>
						</div>

						<div class="col-12 p-b-5">
							<label class="stext-102 cl3" for="password1">Password</label>
							<input type="password" name="password1" class="size-111 bor8 stext-102 cl2 p-lr-20" minlength="6" maxlength="10" required>
						</div>

						<div class="col-12 p-b-5">
							<label class="stext-102 cl3" for="password2">Re-Enter Password</label>
							<input type="password" name="password2" class="size-111 bor8 stext-102 cl2 p-lr-20" minlength="6" maxlength="10" required>
						</div>
											
						<br>

						<button class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10" name="register">
							Submit
						</button>	

						<label class="stext-102 cl3 login_or" for="email">--- OR ----</label>
						
						<div class="login_flex">
							<small style="font-size: 13px">Wants to back to login ? </small>
							<a href="login_home.php" class="flex-c-m cl0 size-112 bg7 bor11 p-lr-15 trans-04 m-b-2 register" name="review_submit" id="review_count">Back to Login</a> 
						</div>				
				</div>
			</div>
		</div>
	</div>
</div>
</form>



	<?php include_once 'scripts.php'; ?>