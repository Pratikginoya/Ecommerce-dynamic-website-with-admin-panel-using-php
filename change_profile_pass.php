<?php include_once 'site_connection.php'; include_once 'header.php'; 

if(isset($_SESSION['login']))
{
	$id = $_SESSION['login'];
	$msg = "";
	$msg2 = "";

	if(isset($_POST['change_pass']))
	{
		$curr_pass = $_POST['curr_pass'];
		$new_pass = $_POST['new_pass'];
		$new_pass2 = $_POST['new_pass2'];

		$sql_check = "select * from user_register where password='$curr_pass' and id='$id'";
		$data_check = mysqli_query($conn,$sql_check);
		$check = mysqli_num_rows($data_check);

		if($check>0)
		{
			if($new_pass==$new_pass2)
			{
				if($curr_pass==$new_pass2)
				{
					$msg2 = "";
					$msg = "New password is already used before...! Kindly use another password...";
				}
				else
				{
					$sql_update = "update user_register set password='$new_pass2' where id='$id'";
					mysqli_query($conn,$sql_update);

					$msg = "";
					$msg2 = "Password has been changed sucessfully... Kindly go back to Home or My profile now....";
				}				
			}
			else
			{
				$msg2 = "";
				$msg = "Re-entered new password is not match...! Kindly enter same password in both field...";
			}
		}
		else
		{
			$msg2 = "";
			$msg = "Entered Current passowrd is not match...!";
		}
	}
}
else
{
	header('location:login_home.php');
}

?>
<div class="m-t-110">
	<div class="login_text">
		<h4 class="p-b-15 ltext-108 cl2 trans-04 heading_profile" style="font-size: 25px;">
			CHANGE YOUR PASSWORD
		</h4>

		<p class="stext-117 cl6">
			Please using Back-to-manage-profile options to go back with existing details...
		</p>
	</div>

<div id="current_pass">	
	<form method="post">
		<div id="new_number_of_product">
			<div class="bg0 p-t-20">
				<div class="container">
					<div class="row">
						<div class="col-lg-5 col-md-6 col-sm-10 m-lr-auto">	
									
								<div class="col-12 p-b-25" style="color: red;">
									<?php echo $msg; ?>
								</div>
								<div class="col-12 p-b-25" style="color: green;">
									<?php echo $msg2; ?>
								</div>

								<div class="col-12 p-b-25">
									<label class="stext-102 cl3" for="password1">Enter Your Current Password</label>
									<input type="password" name="curr_pass" class="size-111 bor8 stext-102 cl2 p-lr-20" minlength="6" maxlength="15" required>
								</div>

								<div class="col-12 p-b-25">
									<label class="stext-102 cl3" for="password1">Enter New Password (8 to 15 digits)</label>
									<input type="password" name="new_pass" class="size-111 bor8 stext-102 cl2 p-lr-20" minlength="8" maxlength="15" required>
								</div>

								<div class="col-12 p-b-35">
									<label class="stext-102 cl3" for="password2">Re-enter New Password (8 to 15 digits)</label>
									<input type="password" name="new_pass2" class="size-111 bor8 stext-102 cl2 p-lr-20" minlength="8" maxlength="15" required>
								</div>

								<input type="submit" value="Submit" class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-auto" name="change_pass">

								<label class="stext-102 cl3 login_or m-t-60" for="email">--- OR ----</label>
								
								<div class="login_flex">
									<a href="my_profile.php" class="flex-c-m cl0 size-112 bg7 bor11 p-lr-15 trans-04 m-b-50 register" name="review_submit" id="review_count">Back to Manage Profile</a> 
								</div>				
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>

</div>


<?php include_once 'scripts.php'; ?>