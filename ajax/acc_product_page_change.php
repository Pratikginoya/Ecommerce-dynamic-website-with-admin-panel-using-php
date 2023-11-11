<?php 

include_once '../site_connection.php';

$sql_select_data = "select * from `product` where `category`='Accessories' AND `stock`='In Stock'";
$data_data = mysqli_query($conn,$sql_select_data);
$data_count = mysqli_num_rows($data_data);

$limit = 8;
$page_count = ceil($data_count/$limit);

if (isset($_GET['all_pro_p_id']))
{
	$page_no = $_GET['all_pro_p_id'];
}
else
{
	$page_no=1;
}

$start = ($page_no-1)*$limit;

$sql_select = "select * from `product` where `category`='Accessories' AND `stock`='In Stock' limit $start,$limit";
$data = mysqli_query($conn,$sql_select);

$previous = $page_no-1;
$next = $page_no+1;

if (isset($_GET['search_acc_product']))
{
	$search_pro = $_GET['search_acc_product'];

	$sql_select_data = "select * from `product` where `category`='Accessories' AND `stock`='In Stock' AND (`name` like '%$search_pro%' OR `category` like '%$search_pro%' OR `tag` like '%$search_pro%' OR `type` like '%$search_pro%' OR `one_line_title` like '%$search_pro%' OR `size` like '%$search_pro%' OR `color` like '%$search_pro%' OR `description` like '%$search_pro%' OR `weight` like '%$search_pro%' OR `dimension` like '%$search_pro%' OR `material` like '%$search_pro%')";
	$data_data = mysqli_query($conn,$sql_select_data);
	$data_count = mysqli_num_rows($data_data);

	$limit = 8;
	$page_count_s = ceil($data_count/$limit);

	if (isset($_GET['all_pro_p_id_s']))
	{
		$page_no = $_GET['all_pro_p_id_s'];
	}
	else
	{
		$page_no=1;
	}

	$start = ($page_no-1)*$limit;

	$sql_select = "select * from `product` where `category`='Accessories' AND `stock`='In Stock' AND (`name` like '%$search_pro%' OR `category` like '%$search_pro%' OR `tag` like '%$search_pro%' OR `type` like '%$search_pro%' OR `one_line_title` like '%$search_pro%' OR `size` like '%$search_pro%' OR `color` like '%$search_pro%' OR `description` like '%$search_pro%' OR `weight` like '%$search_pro%' OR `dimension` like '%$search_pro%' OR `material` like '%$search_pro%') limit $start,$limit";
	$data = mysqli_query($conn,$sql_select);

	$previous = $page_no-1;
	$next = $page_no+1;
}

 ?>


 <div class="row isotope-grid">

			<?php while ($row = mysqli_fetch_assoc($data)) { ?>
					
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item <?php echo $row['category']; ?>">
					<div class="block2">
						<div class="block2-pic hov-img0">
							<img src="admin/image/<?php echo $row['image1']; ?>" alt="IMG-PRODUCT">

							<!-- <a href="javascript:void(0)" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1 quick_view" attr_id="<?php echo $row['id']; ?>">
								Quick View
							</a> -->
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="product-detail.php?detail_id=<?php echo $row['id']; ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									<?php echo $row['name']; ?>
									<?php if (isset($_GET['search_acc_product'])) { ?>
										<input type="hidden" name="search_txt" value="<?php echo $_GET['search_acc_product']; ?>" id="srch_txt_acc">
									<?php } ?>
								</a>

								<span class="stext-105 cl3">
									Rs.<?php echo $row['price']; ?>
								</span>
							</div>

							<div class="block2-txt-child2 flex-r p-t-3">
								<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
									<img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
									<img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
								</a>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
			
			</div>

			<!-- Pagination -->

					<div class="flex-l-m flex-w w-full p-t-10 m-lr--7">


						<?php if (isset($_GET['search_acc_product'])) {
						if ($page_no>1) { ?>
							<a href="javascript:void(0)" class="flex-c-m how-pagination1 trans-04 m-all-7 search_acc_product_page_change" attr_id=<?php echo $previous; ?> style="font-size: 13px;" >
								Pre
							</a>
						<?php } }
						else {
							if ($page_no>1) { ?>
							<a href="javascript:void(0)" class="flex-c-m how-pagination1 trans-04 m-all-7 acc_product_page_change" attr_id=<?php echo $previous; ?> style="font-size: 13px;" >
								Pre
							</a>
						<?php }
						}
						?>

						<?php if (isset($_GET['search_acc_product'])) {	
						for ($i=1; $i<=$page_count_s; $i++) { ?>
							<a href="javascript:void(0)" class="flex-c-m how-pagination1 trans-04 m-all-7 
								<?php 
								if(isset($_GET['all_pro_p_id_s']))
								{
									if($_GET['all_pro_p_id_s']==$i)
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
								} ?> search_acc_product_page_change" attr_id=<?php echo $i; ?>>
								<?php echo $i; ?>
							</a>
						<?php } }
						else {
							for ($i=1; $i<=$page_count; $i++) { ?>
							<a href="javascript:void(0)" class="flex-c-m how-pagination1 trans-04 m-all-7 
								<?php 
								if(isset($_GET['all_pro_p_id']))
								{
									if($_GET['all_pro_p_id']==$i)
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
								} ?> acc_product_page_change" attr_id=<?php echo $i; ?>>
								<?php echo $i; ?>
							</a>
						<?php }							
						}
						?>

						<?php if (isset($_GET['search_acc_product'])) {	
						if($page_no<$page_count_s) { ?>
							<a href="javascript:void(0)" class="flex-c-m how-pagination1 trans-04 m-all-7 search_acc_product_page_change" attr_id=<?php echo $next; ?> style="font-size: 12.5px;">
									Next
							</a>
						<?php } }
						else {
							if($page_no<$page_count) { ?>
							<a href="javascript:void(0)" class="flex-c-m how-pagination1 trans-04 m-all-7 acc_product_page_change" attr_id=<?php echo $next; ?> style="font-size: 12.5px;">
									Next
							</a>
						<?php }
						}
						?>
					</div>

<script type="text/javascript">
	
	$('.acc_product_page_change').click(function(){

				var id = $(this).attr('attr_id');

				// alert(all_pro_p_id);
				$.ajax({

					type: "get",
					url: "ajax/acc_product_page_change.php",
					data: {'all_pro_p_id':id},

					success:function(res)
					{
						$('#acc_product_page_change_data').html(res);

						$('html,body').animate({scrollTop: 0}, 'slow');
					}
				});
			});

	$('.search_acc_product_page_change').click(function(){

				var id = $(this).attr('attr_id');
				var text = $('#srch_txt_acc').val();

				// alert(id);
				// alert(text);
				$.ajax({

					type: "get",
					url: "ajax/acc_product_page_change.php",
					data: {'all_pro_p_id_s':id,'search_acc_product':text},

					success:function(res)
					{
						$('#acc_product_page_change_data').html(res);

						$('html,body').animate({scrollTop: 0}, 'slow');
					}
				});
			});
	
</script>