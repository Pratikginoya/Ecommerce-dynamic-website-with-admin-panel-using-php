<?php 

include_once '../site_connection.php';

if(isset($_POST['rating']))
{

	$userid = $_POST['user_id'];
	$rating = $_POST['rating'];
	$review = $_POST['review'];
	$name = $_POST['name'];
	$email = $_POST['email'];

	$sql_insert = "insert into `product_comment`(`userid`,`rating`,`review`,`name`,`email`)values('$userid','$rating','$review','$name','$email')";
	mysqli_query($conn,$sql_insert);

	$sql_select_comment = "select * from `product_comment` where `userid`='$userid'";
	$data_comment = mysqli_query($conn,$sql_select_comment);

}

if (isset($_GET['d_id']))
{
	$d_id = $_GET['d_id'];

	$sql_select = "select `userid` from `product_comment` where `id`='$d_id'";
	$data = mysqli_query($conn,$sql_select);
	$row = mysqli_fetch_assoc($data);
	$id = $row['userid'];

	$sql_delete = "delete from `product_comment` where `id`='$d_id'";
	mysqli_query($conn,$sql_delete);

	$sql_select_comment = "select * from `product_comment` where `userid`='$id'";
	$data_comment = mysqli_query($conn,$sql_select_comment);

}

// $sql_select_count = "select * from `product_comment` where `userid`='$userid'";
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

													<span class="fs-18 cl11">
														<a href="javascript:void(0)" class="stext-109 cl8 hov-cl1 trans-04 delete_review" attr_id=<?php echo $row_comment['id']; ?>> Delete Review </a>
													</span>
											</div>
										</div>

									<?php } ?>
									
<script type="text/javascript">
	
	$('.delete_review').click(function(){

				var id_d = $(this).attr('attr_id');

				// alert(id_d);
				$.ajax({

					type: "get",
					url: "ajax/ajax_run.php",
					data: {'d_id':id_d},

					success:function(res)
					{
						$('#display_data').html(res);
					}
				})
			});

</script>