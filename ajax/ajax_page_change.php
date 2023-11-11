<?php 

include_once '../site_connection.php';

$sql_select_count = "select * from `blog`";
$data_count = mysqli_query($conn,$sql_select_count);

$total_data = mysqli_num_rows($data_count);
$limit = 2;
$page_count = ceil($total_data/2);

if (isset($_GET['p_id']))
{
	$page_no = $_GET['p_id'];
}
else
{
	$page_no = 1;
}

$start = ($page_no-1)*$limit;

$sql_select = "select * from `blog` limit $start,$limit";
$data = mysqli_query($conn,$sql_select);

if (isset($_GET['search']))
{
	$search_text = $_GET['search'];

	$sql_select_count = "select * from `blog` where `title` like '%$search_text%'";
	$data_count = mysqli_query($conn,$sql_select_count);

	$total_data = mysqli_num_rows($data_count);
	$limit = 2;
	$page_count_s = ceil($total_data/2);

	if (isset($_GET['p_s_id']))
	{
		$page_no = $_GET['p_s_id'];
	}
	else
	{
		$page_no = 1;
	}

	$start = ($page_no-1)*$limit;
	$sql_select = "select * from `blog` where `title` like '%$search_text%' limit $start,$limit";
	$data = mysqli_query($conn,$sql_select);
}


 ?>


 				<?php while ($row = mysqli_fetch_assoc($data)) { ?>
						<!-- item blog -->
						<div class="p-b-63">
							<a href="blog-detail.php?detail_id=<?php echo $row['id']; ?>" class="hov-img0 how-pos5-parent">
								<img src="admin/image/<?php echo $row['image']; ?>" alt="IMG-BLOG">

								<div class="flex-col-c-m size-123 bg9 how-pos5">
									<span class="ltext-107 cl2 txt-center">
										<?php echo $row['day']; ?>
									</span>

									<span class="stext-109 cl3 txt-center">
										<?php echo $row['month']; ?> <?php echo $row['year']; ?>
									</span>
								</div>
							</a>

							<div class="p-t-32">
								<h4 class="p-b-15">
									<a href="blog-detail.php?detail_id=<?php echo $row['id']; ?>" class="ltext-108 cl2 hov-cl1 trans-04">
										<?php echo $row['title']; ?>
									</a>
								</h4>

								<p class="stext-117 cl6">
									<?php echo $row['short_detail']; ?>
								</p>

								<div class="flex-w flex-sb-m p-t-18">
									<span class="flex-w flex-m stext-111 cl2 p-r-30 m-tb-10">
										<span>
											<span class="cl4">By</span> Admin  
											<span class="cl12 m-l-4 m-r-6">|</span>
										</span>

										<span>
											<?php echo $row['tag']; ?>
											<span class="cl12 m-l-4 m-r-6">|</span>
										</span>

										<span>
											8 Comments
										</span>
									</span>

									<a href="blog-detail.php?detail_id=<?php echo $row['id']; ?>" class="stext-101 cl2 hov-cl1 trans-04 m-tb-10">
										Continue Reading

										<i class="fa fa-long-arrow-right m-l-9"></i>
									</a>
								</div>
							</div>
						</div>

				<?php } ?>

						<!-- Pagination -->
						<div class="flex-l-m flex-w w-full p-t-10 m-lr--7">

							<?php 
							if (isset($_GET['search'])) {
								
								for ($i=1; $i<=$page_count_s; $i++) { ?>
									<a href="javascript:void(0)" class="flex-c-m how-pagination1 trans-04 m-all-7
									<?php if(isset($_GET['p_s_id']))
										  	  {
										  		if($_GET['p_s_id']==$i)
										  	    {
										  			echo "active-pagination1";
										  	  	}
										  		else
										  	  	{
										  			echo "";
										  	  	}
										  	  }
										  	  else
										  	  {
										  		if($i==1)
										  		{
										  			echo "active-pagination1";
										  		}
										 	  } ?> page_change_s" attr_id=<?php echo $i; ?> attr_search=<?php echo $_GET['search']; ?>>
									<?php echo $i; ?>
									</a>
								<?php } 
							}
							else { 
								for ($i=1; $i<=$page_count; $i++) { ?>
									<a href="javascript:void(0)" class="flex-c-m how-pagination1 trans-04 m-all-7 
										<?php if(isset($_GET['p_id']))
										  	  {
										  		if($_GET['p_id']==$i)
										  	    {
										  			echo "active-pagination1";
										  	  	}
										  		else
										  	  	{
										  			echo "";
										  	  	}
										  	  }
										  	  else
										  	  {
										  		if($i==1)
										  		{
										  			echo "active-pagination1";
										  		}
										 	  } ?> page_change" attr_id=<?php echo $i; ?>>
									<?php echo $i; ?>
									</a>
							 	<?php } 
							 }?>
						</div>


<script type="text/javascript">
	
	$('.page_change').click(function(){

				var id = $(this).attr('attr_id');

				$.ajax({

					type: "get",
					url: "ajax/ajax_page_change.php",
					data: {'p_id':id},

					success:function(res)
					{
						$('#display_page_data').html(res);
		
						$('html, body').animate({ scrollTop: 280 }, 'slow');
					}

				});
			});

	$('#search').click(function(){

				var text = $('#search_text').serialize();

				// alert(text);

				$.ajax({

					type: "get",
					url: "ajax/ajax_page_change.php",
					data: {'search':text},

					success:function(res)
					{
						$('#display_page_data').html(res);
					}

				});
			});

	$('.page_change_s').click(function(){

				var ids = $(this).attr('attr_id');
				var text = $(this).attr('attr_search');

				// alert(ids);
				// alert(text);
				$.ajax({

					type: "get",
					url: "ajax/ajax_page_change.php",
					data: {'p_s_id':ids,'search':text},

					success:function(res)
					{
						$('#display_page_data').html(res);

						$('html,body').animate({scrollTop:280},'slow');
					}

				});
			});

</script>