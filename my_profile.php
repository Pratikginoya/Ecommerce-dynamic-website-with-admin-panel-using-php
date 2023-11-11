<?php include_once 'site_connection.php'; include_once 'header.php'; 

if(isset($_SESSION['login']))
{
	$id = $_SESSION['login'];

	$sql_select = "select * from user_register where id='$id'";
	$data = mysqli_query($conn,$sql_select);
	$row = mysqli_fetch_assoc($data);

	if (isset($_POST['edit_data'])) {
		header('location:edit_profile_data.php');
	}

	if (isset($_POST['change_pass'])) {
		header('location:change_profile_pass.php');
	}
}
else
{
	header('location:login_home.php');
}


?>
<div class="m-t-120">
	<div class="login_text">
		<h4 class="p-b-15 ltext-108 cl2 trans-04 heading_profile" style="font-size: 25px;">
			MANAGE YOUR DETAILS
		</h4>

		<p class="stext-117 cl6">
			You can change your data using Edit-Your-Details options...
		</p>
	</div>	
	<form method="post">
		<div id="new_number_of_product">
			<div class="bg0 p-t-50">
				<div class="container">
					<div class="row">
						<div class="col-lg-5 col-md-6 col-sm-10 m-lr-auto">			
							
								<div class="col-12 p-b-35">
									<label class="stext-102 cl3" for="name">Name</label>
									<input type="text" name="name" class="size-111 bor8 stext-102 cl2 p-lr-20" required disabled value="<?php echo $row['name']; ?>">
								</div>

								<div class="col-12 p-b-35">
									<label class="stext-102 cl3" for="email">Email</label>
									<input type="email" name="email" class="size-111 bor8 stext-102 cl2 p-lr-20" required disabled value="<?php echo $row['email']; ?>">
								</div>

								<div class="col-12 p-b-35">
									<label class="stext-102 cl3" for="mobile">Mobile Number</label>
									<input type="text" name="mobile" class="size-111 bor8 stext-102 cl2 p-lr-20" required disabled value="<?php echo $row['mobile_number']; ?>">
								</div>

								<input type="submit" value="Edit Your Details" class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-20" name="edit_data">

								<input type="submit" value="Change Password" class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-20" name="change_pass">

								<label class="stext-102 cl3 login_or m-t-50" for="email">--- OR ----</label>
								
								<div class="login_flex">
									<small style="font-size: 13px">Wants to back to HOME page ? </small>
									<a href="index.php" class="flex-c-m cl0 size-112 bg7 bor11 p-lr-15 trans-04 m-b-2 register" name="review_submit" id="review_count">Back to Home</a> 
								</div>				
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>


<?php include_once 'scripts.php'; ?>