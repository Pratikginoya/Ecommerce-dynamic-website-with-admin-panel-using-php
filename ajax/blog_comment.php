<?php 

include_once '../site_connection.php';

if (isset($_POST['cmt'])) {
	
	$userid = $_POST['blog_comment_id'];
	$cmt = $_POST['cmt'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$web = $_POST['web'];

	$sql_insert = "insert into `blog_comment`(`userid`,`name`,`email`,`comment`,`website`)values('$userid','$name','$email','$cmt','$web')";
	mysqli_query($conn,$sql_insert);

	$sql_select_comment = "select * from `blog_comment` where `userid`='$userid'";
	$data_comment = mysqli_query($conn,$sql_select_comment);
}

if (isset($_GET['d_id']))
{
	$delete_id = $_GET['d_id'];

	$sql_select = "select `userid` from `blog_comment` where `id`='$delete_id'";
	$data = mysqli_query($conn,$sql_select);
	$row = mysqli_fetch_assoc($data);

	$id = $row['userid'];

	$sql_delete = "delete from `blog_comment` where `id`='$delete_id'";
	mysqli_query($conn,$sql_delete);

	$sql_select_comment = "select * from `blog_comment` where `userid`='$id'";
	$data_comment = mysqli_query($conn,$sql_select_comment);
}


 ?>


 				<?php while ($row = mysqli_fetch_assoc($data_comment)) { ?>

 						<div class="flex-w flex-t p-b-68">
							<div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
								<img src="images/01.jpg" alt="AVATAR">
							</div>

							<div class="size-207">
								<div class="flex-w flex-sb-m p-b-17">
									<span class="mtext-107 cl2 p-r-20">
										<?php echo $row['name']; ?>
									</span>

									<a href="javascript:void(0)" class="stext-109 cl8 hov-cl1 trans-04 delete_comment" attr_id=<?php echo $row['id']; ?>> Delete Comment </a>
								</div>

								<p class="stext-102 cl6">
									<?php echo $row['comment']; ?>
								</p>		
							</div>
						</div>

				<?php } ?>

<script type="text/javascript">
	
	$('.delete_comment').click(function(){

				var id_d = $(this).attr('attr_id');

				// alert(id_d);
				$.ajax({

					type: "get",
					url: "ajax/blog_comment.php",
					data: {'d_id':id_d},

					success:function(res)
					{
						$('#display_blog_comment').html(res);
					}
				})
			});

</script>