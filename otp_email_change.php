<?php include_once 'site_connection.php'; include_once 'header.php'; 
	
$sent_otp = $_SESSION['otp_email_change'];
$msg = "";

if (isset($_POST['verify_otp']))
{
	$get_otp = $_POST['enter_opt'];

	if($sent_otp==$get_otp)
	{
		$email = $_SESSION['new_email'];
		$name = $_SESSION['new_name'];
		$mobile = $_SESSION['new_mobile'];
		$id = $_SESSION['login'];

		$sql_update = "update user_register set name='$name',email='$email',mobile_number='$mobile' where id='$id'";
		mysqli_query($conn,$sql_update);

		header('location:my_profile.php');
	}
	else
	{
		$msg = "Enter OTP is not match..! Kindly enter OTP which is sent to your registered mail ID....";
	}
}

 ?>

<div class="m-t-130">
	<div class="login_text">
		<h4 class="p-b-15 ltext-108 cl2 trans-04 heading_profile" style="font-size: 25px;">
			Enter OTP to Verify New Email
		</h4>

		<p class="stext-117 cl6">
			Please using Back-to-manage-profile options to go back with existing details...
		</p>
	</div>	
	<form method="post">
		<div id="new_number_of_product">
			<div class="bg0 p-t-40">
				<div class="container">
					<div class="row">
						<div class="col-lg-5 col-md-6 col-sm-10 m-lr-auto">
						<div class="col-12 p-b-25" style="color: red;">
							<?php echo $msg; ?>
						</div>
						<div class="col-12 p-b-35">
							<label class="stext-102 cl3" for="otp">Enter 6 Digit OTP (which is sent on your new entered mail ID)</label>
							<input class="size-111 bor8 stext-102 cl2 p-lr-20" id="name" type="text" name="enter_opt" maxlength="6" minlength="6" required>
						</div>

						<div class="col-sm-12 p-b-5 button_login_flex">
							<button class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-auto" name="verify_otp">
								Verify OTP
							</button>
						</div>

						<label class="stext-102 cl3 login_or" for="email">--- OR ----</label>
						
						<div class="login_flex">
							<a href="my_profile.php" class="flex-c-m cl0 size-112 bg7 bor11 p-lr-15 trans-04 m-b-2 register" name="review_submit" id="review_count">Back to Manage Profile</a> 
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>


	<?php include_once 'scripts.php'; ?>