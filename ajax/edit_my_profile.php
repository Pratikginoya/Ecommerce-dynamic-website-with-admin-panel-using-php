<?php include_once '../site_connection.php';

$id = $_SESSION['login'];
$msg = "";

	if (isset($_POST['name'])) {

		$msg = "";
		$name = $_POST['name'];
		$email = $_POST['email'];
		$mobile = $_POST['mobile'];

		$sql_select_email = "select * from user_register where id='$id'";
		$data_email = mysqli_query($conn,$sql_select_email);
		$row = mysqli_fetch_assoc($data_email);

		$existing_name = $row['name'];
		$existing_email = $row['email'];
		$existing_mobile = $row['mobile_number'];

		if($name==$existing_name && $email==$existing_email && $mobile==$existing_mobile)
		{
			$msg = "Data is not edited...! Please edit the data or use 'Back to Manage Profile' option...";
		}
		else if($email==$existing_email)
		{
			if($mobile==$existing_mobile)
			{
				$msg = "";
			}
			else
			{
				$sql_select_m = "select * from user_register where mobile_number='$mobile'";
				$data_m = mysqli_query($conn,$sql_select_m);
				$count_m = mysqli_num_rows($data_m);

				if($count_m==0)
				{
					$msg = "";
				}
				else
				{
					$msg = "Entered Mobile number is already registered...! Kindly use another Mobile number...";
				}
			}
		}
		else
		{
			$sql_select_e = "select * from user_register where email='$email'";
			$data_e = mysqli_query($conn,$sql_select_e);
			$count_e = mysqli_num_rows($data_e);

			if($count_e==0)
			{
				$msg = "";
			}
			else
			{
				$msg = 'Entered Email is already registered...! Kindly use another Email...';
			}
		}
	}

 ?>

 <?php if($msg=="") { ?>
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
								<label class="stext-102 cl3" for="name_e">Name</label>
								<input type="text" name="name_e" class="size-111 bor8 stext-102 cl2 p-lr-20" required value="<?php echo $name; ?>" readonly>
							</div>

							<div class="col-12 p-b-35">
								<label class="stext-102 cl3" for="email_e">Email</label>
								<input type="email" name="email_e" class="size-111 bor8 stext-102 cl2 p-lr-20" required value="<?php echo $email; ?>" readonly>
							</div>

							<div class="col-12 p-b-35">
								<label class="stext-102 cl3" for="mobile_e">Mobile Number</label>
								<input type="text" name="mobile_e" class="size-111 bor8 stext-102 cl2 p-lr-20" required value="<?php echo $mobile; ?>" readonly>
							</div>

							<div class="col-12 p-b-30">
								<label class="stext-102 cl3" for="password">Enter Your Current Password</label>
								<input type="password" name="password" class="size-111 bor8 stext-102 cl2 p-lr-20" minlength="6" maxlength="10" required>
							</div>

							<input type="submit" value="Verify" class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-auto" name="verify_data">


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
<?php }
else{ ?>
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
<?php } ?>

<script type="text/javascript">
	$('#edit_data').submit(function(e){
				e.preventDefault();

				var form_data = $('#edit_data').serialize();

				// alert(data);
				$.ajax({

					type:"post",
					url:"ajax/edit_my_profile.php",
					data:form_data,

					success:function(res)
					{
						$('#current_pass').html(res);
					}
				});
			});
</script>