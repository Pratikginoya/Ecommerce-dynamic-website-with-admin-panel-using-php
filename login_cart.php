<?php 

include_once 'site_connection.php';
	
if (isset($_POST['login']))
{
	$email = $_POST['email'];
	$password = $_POST['password'];

	$sql_select = "select * from `user_register` where `email`='$email' and `password`='$password'";
	$data = mysqli_query($conn,$sql_select);
	$row_count = mysqli_num_rows($data);

	if($row_count>0)
	{
		$row = mysqli_fetch_assoc($data);
		$_SESSION['login']=$row['id'];

		$user_id = $row['id'];
		$cart_id = $_SESSION['cart_id'];
		$product = $_SESSION['num_product'];
		$size_p = $_SESSION['size_p'];
		$color_p = $_SESSION['color_p'];

		if($product>0)
		{
			$sql_select = "select * from `product` where `id`='$cart_id'";
			$data = mysqli_query($conn,$sql_select);
			$row = mysqli_fetch_assoc($data);

			$sql_select_c = "select * from `cart` where `product_id`='$cart_id' and `user_id`='$user_id'";
			$data_c = mysqli_query($conn,$sql_select_c);
			$row_count = mysqli_num_rows($data_c);
			$row_data = mysqli_fetch_assoc($data_c);

			$product_id = $cart_id;
			$name = $row['name'];
			$price = $row['price'];
			$num_product = $product;
			$image = $row['image1'];

			if($row_count>0)
			{
				$new_price = $price;
				$new_num_product = $num_product + $row_data['num_product'];

				$sql_update = "update `cart` set `price`='$new_price',`num_product`='$new_num_product' where `product_id`='$product_id' and `user_id`='$user_id'";
				mysqli_query($conn,$sql_update);

				header('location:shoping-cart.php');
			}
			else
			{
				$sql_insert = "insert into `cart`(`product_id`,`user_id`,`name`,`price`,`num_product`,`image`,`size`,`color`)values('$product_id','$user_id','$name','$price','$product','$image','$size_p','$color_p')";
				mysqli_query($conn,$sql_insert);

				header('location:shoping-cart.php');
			}
		}
	}
	else
	{ ?>
		<div style="text-align: center; color: red; padding-top:10px;">"Entered Email or Password is Incorrect...."</div>
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
			LOGIN / REGISTER
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

						<div class="col-12 p-b-5">
							<label class="stext-102 cl3" for="email">Email</label>
							<input class="size-111 bor8 stext-102 cl2 p-lr-20" id="name" type="email" name="email" required>
						</div>

						<div class="col-12 p-b-30">
							<label class="stext-102 cl3" for="email">Password</label>
							<input class="size-111 bor8 stext-102 cl2 p-lr-20" id="email" type="password" name="password" required>
						</div>

						<div class="col-sm-12 p-b-5 button_login_flex">
							<button class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10" name="login">
								Login
							</button>
							<a href="forgot.php" class="forgot m-b-5">Forgot Password?</a>
						</div>

						<label class="stext-102 cl3 login_or" for="email">--- OR ----</label>
						
						<div class="login_flex">
							<small style="font-size: 13px">New to CozaStore ? </small>
							<a href="register.php" class="flex-c-m cl0 size-112 bg7 bor11 p-lr-15 trans-04 m-b-2 register" name="review_submit" id="review_count">Create an account</a> 
						</div>


				</div>
			</div>
		</div>
	</div>
</form>
</div>


	<?php include_once 'scripts.php'; ?>