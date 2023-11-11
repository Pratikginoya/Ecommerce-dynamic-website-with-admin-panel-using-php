<?php 

include_once 'admin/connection.php';

if(isset($_POST['rating']))
{

	$rating = $_POST['rating'];
	$review = $_POST['review'];
	$name = $_POST['name'];
	$email = $_POST['email'];

	$sql_insert = "insert into `product_comment`(`rating`,`review`,`name`,`email`)values('$rating','$review','$name','$email')";
	mysqli_query($conn,$sql_insert);

}

$sql_select_comment = "select * from `product_comment`";
$data_comment = mysqli_query($conn,$sql_select_comment);

// $sql_select_count = "select * from `product_comment`";
// $data_count = mysqli_query($conn,$sql_select_count);
// $comment_count = mysqli_num_rows($data_count);

 ?>

 									 									
									<?php while ($row_comment = mysqli_fetch_assoc($data_comment)) { ?>
									
										<div class="flex-w flex-t p-b-68">
											<div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
												<img src="images/01.jpg" alt="AVATAR">
											</div>

											<div class="size-207">
												<div class="flex-w flex-sb-m p-b-17">
													<span class="mtext-107 cl2 p-r-20">
														<?php echo $row_comment['name']; ?>
													</span>

													<span class="fs-18 cl11">

													<?php $star='<i class="zmdi zmdi-star"></i>' ?>

													<?php for ($i=1; $i<=$row_comment['rating']; $i++) { 
														echo $star;
													} ?>
													</span>
												</div>

												<p class="stext-102 cl6">
													<?php echo $row_comment['review']; ?>
												</p>
												
											</div>
										</div>

									<?php } ?>
									
							