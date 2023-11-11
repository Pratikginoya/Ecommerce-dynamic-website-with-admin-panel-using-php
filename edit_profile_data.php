<?php include_once 'site_connection.php'; include_once 'header.php'; 

if(isset($_SESSION['login']))
{
	$id = $_SESSION['login'];

	$sql_select = "select * from user_register where id='$id'";
	$data = mysqli_query($conn,$sql_select);
	$row = mysqli_fetch_assoc($data);

	$msg = '';

	if(isset($_POST['verify_data']))
	{
		$password = $_POST['password'];

		$sql_check = "select * from user_register where id='$id' and password='$password'";
		$data_check = mysqli_query($conn,$sql_check);
		$check = mysqli_num_rows($data_check);

		if($check>0)
		{
			$name = $_POST['name_e'];
			$email = $_POST['email_e'];
			$mobile = $_POST['mobile_e'];

			$sql_select_email = "select * from user_register where id='$id'";
			$data_email = mysqli_query($conn,$sql_select_email);
			$row_email = mysqli_fetch_assoc($data_email);
			$existing_email = $row_email['email'];

			if($email==$existing_email)
			{
				$sql_update = "update user_register set name='$name',email='$email',mobile_number='$mobile' where id='$id'";
				mysqli_query($conn,$sql_update);

				header('location:my_profile.php');
			}
			else
			{
				$_SESSION['new_email'] = $email;
				$_SESSION['new_name'] = $name;
				$_SESSION['new_mobile'] = $mobile;

				header('location:mail_email_change/smtp.php');
			}
		}
		else
		{
			$msg = "Entered Current passowrd is not matched.....!";
		}		
	}
}
else
{
	header('location:login_home.php');
}

?>
<div class="m-t-130">
	<div class="login_text">
		<h4 class="p-b-15 ltext-108 cl2 trans-04 heading_profile" style="font-size: 25px;">
			EDIT YOUR DETAILS
		</h4>

		<p class="stext-117 cl6">
			Please using Back-to-manage-profile options to go back with existing details...
		</p>
	</div>

<div id="current_pass">	
	<form method="post" id="edit_data">
		<div id="new_number_of_product">
			<div class="bg0 p-t-40">
				<div class="container">
					<div class="row">
						<div class="col-lg-5 col-md-6 col-sm-10 m-lr-auto">	
									
								<div class="col-12 p-b-25" style="color: red;">
									<?php echo $msg; ?>
								</div>
								<div class="col-12 p-b-35">
									<label class="stext-102 cl3" for="name">Name</label>
									<input type="text" name="name" class="size-111 bor8 stext-102 cl2 p-lr-20" required value="<?php echo @$row['name']; ?>">
								</div>

								<div class="col-12 p-b-35">
									<label class="stext-102 cl3" for="email">Email</label>
									<input type="email" name="email" class="size-111 bor8 stext-102 cl2 p-lr-20" required value="<?php echo @$row['email']; ?>">
								</div>

								<div class="col-12 p-b-35">
									<label class="stext-102 cl3" for="mobile">Mobile Number</label>
									<input type="text" name="mobile" class="size-111 bor8 stext-102 cl2 p-lr-20" required value="<?php echo @$row['mobile_number']; ?>">
								</div>

								<input type="submit" value="Submit" class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-auto" name="edit_data">

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