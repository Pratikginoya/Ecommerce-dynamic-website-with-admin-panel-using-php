<?php include_once 'site_connection.php'; ?>

<header class="header-v4">
<?php include_once 'header.php'; ?>
</header>

<?php 

$sql_select_featured = "select * from `product` where `tag` like '%Featured%'";
$data_featured = mysqli_query($conn,$sql_select_featured);

if (isset($_GET['detail_id']))
{
	$detail_id = $_GET['detail_id'];
}

$sql_select = "select * from `blog` where `id`='$detail_id'";
$data = mysqli_query($conn,$sql_select);
$row = mysqli_fetch_assoc($data);

$tag = explode(', ',$row['tag']);
$tag_length = count($tag);

$sql_select_comment = "select * from `blog_comment` where `userid`='$detail_id'";
$data_comment = mysqli_query($conn,$sql_select_comment);


 ?>

		<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<a href="blog.php" class="stext-109 cl8 hov-cl1 trans-04">
				Blog
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				<?php echo $row['title']; ?>
			</span>
		</div>
	</div>


	<!-- Content page -->
	<section class="bg0 p-t-52 p-b-20">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-lg-9 p-b-80">
					<div class="p-r-45 p-r-0-lg">
						<!--  -->
						<div class="wrap-pic-w how-pos5-parent">
							<img src="admin/image/<?php echo $row['image']; ?>" alt="IMG-BLOG">

							<div class="flex-col-c-m size-123 bg9 how-pos5">
								<span class="ltext-107 cl2 txt-center">
									<?php echo $row['day']; ?>
								</span>

								<span class="stext-109 cl3 txt-center">
									<?php echo $row['month']; ?> <?php echo $row['year']; ?>
								</span>
							</div>
						</div>

						<div class="p-t-32">
							<span class="flex-w flex-m stext-111 cl2 p-b-19">
								<span>
									<span class="cl4">By</span> Admin  
									<span class="cl12 m-l-4 m-r-6">|</span>
								</span>

								<span>
									<?php echo $row['day']; ?> <?php echo $row['month']; ?>, <?php echo $row['year']; ?>
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

							<h4 class="ltext-109 cl2 p-b-28">
								<?php echo $row['title']; ?>
							</h4>

							<p class="stext-117 cl6 p-b-26">
								<?php echo $row['short_detail']; ?>
							</p>

							<p class="stext-117 cl6 p-b-26">
								<?php echo $row['full_detail']; ?>
							</p>
						</div>

						<div class="flex-w flex-t p-t-16">
							<span class="size-216 stext-116 cl8 p-t-4">
								Tags
							</span>

							<div class="flex-w size-217">
								<span class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									<?php echo $row['tag']; ?>  
								</span>

								<!-- <a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Crafts
								</a> -->
							</div>
						</div>

						<br><br>

					<div id="display_blog_comment">
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
					</div>


						<!-- input comments (form) -->
						<div class="p-t-40">
							<h5 class="mtext-113 cl2 p-b-12">
								Leave a Comment
							</h5>

							<p class="stext-107 cl6 p-b-40">
								Your email address will not be published. Required fields are marked *
							</p>

							<form method="post" id="blog_comment">
								<input type="hidden" name="blog_comment_id" value="<?php echo $detail_id; ?>">

								<div class="bor19 m-b-20">
									<textarea class="stext-111 cl2 plh3 size-124 p-lr-18 p-tb-15" name="cmt" placeholder="Comment..." required></textarea>
								</div>

								<div class="bor19 size-218 m-b-20">
									<input class="stext-111 cl2 plh3 size-116 p-lr-18" type="text" name="name" placeholder="Name *" required>
								</div>

								<div class="bor19 size-218 m-b-20">
									<input class="stext-111 cl2 plh3 size-116 p-lr-18" type="email" name="email" placeholder="Email *" required>
								</div>

								<div class="bor19 size-218 m-b-30">
									<input class="stext-111 cl2 plh3 size-116 p-lr-18" type="text" name="web" placeholder="Website">
								</div>

								<button class="flex-c-m stext-101 cl0 size-125 bg3 bor2 hov-btn3 p-lr-15 trans-04">
									Post Comment
								</button>
							</form>
						</div>
					</div>
				</div>

				<div class="col-md-4 col-lg-3 p-b-80">
					<div class="side-menu">
						<!-- <div class="bor17 of-hidden pos-relative">
							<input class="stext-103 cl2 plh4 size-116 p-l-28 p-r-55" type="text" name="search" placeholder="Search">

							<button class="flex-c-m size-122 ab-t-r fs-18 cl4 hov-cl1 trans-04">
								<i class="zmdi zmdi-search"></i>
							</button>
						</div> -->

						<!-- <div class="p-t-55">
							<h4 class="mtext-112 cl2 p-b-33">
								Categories
							</h4>

							<ul>
								<li class="bor18">
									<a href="#" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
										Fashion
									</a>
								</li>

								<li class="bor18">
									<a href="#" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
										Beauty
									</a>
								</li>

								<li class="bor18">
									<a href="#" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
										Street Style
									</a>
								</li>

								<li class="bor18">
									<a href="#" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
										Life Style
									</a>
								</li>

								<li class="bor18">
									<a href="#" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
										DIY & Crafts
									</a>
								</li>
							</ul>
						</div> -->

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


						<div class="p-t-50">
							<h4 class="mtext-112 cl2 p-b-27">
								Tags of This Blog
							</h4>

							<div class="flex-w m-r--5">

							<?php for ($i=0; $i<$tag_length; $i++)
							{ ?>
								<div class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									<?php echo $tag[$i]; ?>
								</div>
							<?php } ?>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>	

<?php include_once 'footer.php'; ?>


<?php include_once 'scripts.php'; ?>