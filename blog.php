<?php include_once 'site_connection.php'; ?>

<header class="header-v4">
<?php include_once 'header.php'; ?>
</header>

<?php 

$sql_select_featured = "select * from `product` where `tag` like '%Featured%'";
$data_featured = mysqli_query($conn,$sql_select_featured);

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

	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-02.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Blog
		</h2>
	</section>

	<!-- Content page -->
	<section class="bg0 p-t-62 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-lg-9 p-b-80">
					<div class="p-r-45 p-r-0-lg" id="display_page_data">

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
										  } ?> page_change" attr_id=<?php echo $i; ?> >
									<?php echo $i; ?>
									</a>
							 	<?php } 
							 } ?>
						</div>

				
						
					</div>
				</div>

				<div class="col-md-4 col-lg-3 p-b-80">
					<div class="side-menu">
						<div class="bor17 of-hidden pos-relative">
							<form method="get">
							<input class="stext-103 cl2 plh4 size-116 p-l-28 p-r-55" type="text" name="search" placeholder="Search" id="search_text">

							<button class="flex-c-m size-122 ab-t-r fs-18 cl4 hov-cl1 trans-04" id="search">
								<i class="zmdi zmdi-search"></i>
							</button>
							</form>
						</div>

						<div class="p-t-65">
							<h4 class="mtext-112 cl2 p-b-33">
								Featured Products
							</h4>

							<ul>

							<?php $a=0; while ($row = mysqli_fetch_assoc($data_featured)) { ?>
								<li class="flex-w flex-t p-b-30">
									<a href="product-detail.php?detail_id=<?php echo $row['id']; ?>" class="wrao-pic-w size-214 hov-ovelay1 m-r-20" style="width:90px; height: 120px; overflow: hidden;">
										<img src="admin/image/<?php echo $row['image1']; ?>" alt="PRODUCT" style="width:100%; height: 100%; object-fit:cover; object-position:center;">
									</a>

									<div class="size-215 flex-col-t p-t-8">
										<a href="product-detail.php?detail_id=<?php echo $row['id']; ?>" class="stext-116 cl8 hov-cl1 trans-04">
											<?php echo $row['name']; ?>
										</a>

										<span class="stext-116 cl6 p-t-20">
											Rs.<?php echo $row['price']; ?>
										</span>
									</div>
								</li>
							<?php

								$a++;
									if ($a==4) {
										break;
									}
							} ?>

							</ul>
						</div>

						<!-- <div class="p-t-50">
							<h4 class="mtext-112 cl2 p-b-27">
								Tags
							</h4>

							<div class="flex-w m-r--5">
								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Fashion
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Lifestyle
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Denim
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Streetstyle
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Crafts
								</a>
							</div>
						</div> -->
					</div>
				</div>
			</div>
		</div>
	</section>	

<?php include_once 'footer.php'; ?>


<?php include_once 'scripts.php'; ?>