<?php include_once 'site_connection.php'; ?>
<header class="header-v4">
<?php include_once 'header.php'; ?>
</header>
<?php 

$sql_select = "select * from `about`";
$data = mysqli_query($conn,$sql_select);
$row = mysqli_fetch_assoc($data);

 ?>

	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			About
		</h2>
	</section>	


	<!-- Content page -->
	<section class="bg0 p-t-75 p-b-120">
		<div class="container">
			<div class="row p-b-148">
				<div class="col-md-7 col-lg-8">
					<div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
						<h3 class="mtext-111 cl2 p-b-16">
							Our Story
						</h3>

						<p class="stext-113 cl6 p-b-26">
							<?php echo $row['story_detail']; ?>
						</p>

						<p class="stext-113 cl6 p-b-26">
							Any questions? Let us know in store at 8th floor, 379 Hudson St, New York, NY 10018 or call us on (+1) 96 716 6879
						</p>
					</div>
				</div>

				<div class="col-11 col-md-5 col-lg-4 m-lr-auto">
					<div class="how-bor1 ">
						<div class="hov-img0">
							<img src="admin/image/<?php echo $row['story_image']; ?>" alt="IMG">
						</div>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="order-md-2 col-md-7 col-lg-8 p-b-30">
					<div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
						<h3 class="mtext-111 cl2 p-b-16">
							Our Mission
						</h3>

						<p class="stext-113 cl6 p-b-26">
							<?php echo $row['mission_detail']; ?>
						</p>

						
					</div>
				</div>

				<div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
					<div class="how-bor2">
						<div class="hov-img0">
							<img src="admin/image/<?php echo $row['mission_image']; ?>" alt="IMG">
						</div>
					</div>
				</div>
			</div>

			<br>

			<div class="bor16 p-l-29 p-b-9 m-t-22">
				<p class="stext-114 cl6 p-r-40 p-b-11">
					"<?php echo $row['best_thought']; ?>"
				</p>

				<span class="stext-111 cl8">
					- <?php echo $row['thought_by']; ?>
				</span>
			</div>
		</div>
	</section>	

<?php include_once 'footer.php'; ?>


<?php include_once 'scripts.php'; ?>