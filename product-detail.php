<?php include_once 'site_connection.php'; ?>

<header class="header-v4">
<?php include_once 'header.php'; ?>
</header>

<?php 

$detail_id = $_GET['detail_id'];

$sql_select = "select * from `product` where `id`='$detail_id'";
$data = mysqli_query($conn,$sql_select);
$row = mysqli_fetch_assoc($data);

$sql_select_count = "select * from `product_comment` where `userid`='$detail_id'";
$data_count = mysqli_query($conn,$sql_select_count);
$comment_count = mysqli_num_rows($data_count);

$category_related = $row['category'];
$sql_select_related = "select * from `product` where `category`='$category_related' AND `stock`='In Stock'";
$data_related = mysqli_query($conn,$sql_select_related);

$sql_select_comment = "select * from `product_comment` where `userid`='$detail_id'";
$data_comment = mysqli_query($conn,$sql_select_comment);

	
if (isset($_POST['cart_submit']))
{
	if(isset($_SESSION['login']))
	{

	$user_id = $_SESSION['login'];
	$cart_id = $_POST['cart_id'];
	$product = $_POST['num_product'];
	$size_p = $_POST['size_select'];
	$color_p = $_POST['color_select'];

		if($product>0)
		{
			$sql_select = "select * from `product` where `id`='$cart_id'";
			$data = mysqli_query($conn,$sql_select);
			$row = mysqli_fetch_assoc($data);

			$sql_select_c = "select * from `cart` where `product_id`='$cart_id' and `user_id`='$user_id' and `size`='$size_p' and `color`='$color_p'";
			$data_c = mysqli_query($conn,$sql_select_c);
			$row_count = mysqli_num_rows($data_c);
			$row_data = mysqli_fetch_assoc($data_c);

			// while($row_data = mysqli_fetch_assoc($data_c))
			// {	
			// 		$count = 0;
			// 		$size = $row_data['size'];
			// 		$color = $row_data['color'];

			// 		if($size==$size_p && $color==$color_p)
			// 		{
			// 			$count++;
			// 		}
			// }

			$product_id = $cart_id;
			$name = $row['name'];
			$price = $row['price'];
			$image = $row['image1'];

			if($row_count>0)
			{
				$new_price = $price;
				$new_num_product = $product + $row_data['num_product'];

				$sql_update = "update `cart` set `price`='$new_price',`num_product`='$new_num_product' where `product_id`='$product_id' and `user_id`='$user_id'";
				mysqli_query($conn,$sql_update);

				header('location:shoping-cart.php');
			}
			else
			{
				$sql_insert = "insert into `cart`(`product_id`,`user_id`,`name`,`price`,`num_product`,`image`,`size`,`color`)values('$product_id','$user_id','$name','$price','$product','$image','$size_p','$color_p')";
				mysqli_query($conn,$sql_insert);

				header('location:shoping-cart.php');
			}
			
		}
	}
	else
	{
		$_SESSION['cart_id'] = $_POST['cart_id'];
		$_SESSION['num_product'] = $_POST['num_product'];
		$_SESSION['size_p'] = $_POST['size_select'];
		$_SESSION['color_p'] = $_POST['color_select'];
		header('location:login_cart.php');
	}
}

 ?>

	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<?php if ($row['category']=='Accessories') { ?>
				<a href="<?php echo $row['category']; ?>-product.php" class="stext-109 cl8 hov-cl1 trans-04">
					Fashion <?php echo $row['category']; ?>
					<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
				</a>
			<?php }
			else
			{ ?>
				<a href="<?php echo $row['category']; ?>-product.php" class="stext-109 cl8 hov-cl1 trans-04">
					<?php echo $row['category']; ?>-Products
					<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
				</a>
			<?php } ?>

			<span class="stext-109 cl4">
				<?php echo $row['name']; ?>
			</span>
		</div>
	</div>
		

	<!-- Product Detail -->
	<section class="sec-product-detail bg0 p-t-65 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-7 p-b-30">
					<div class="p-l-25 p-r-30 p-lr-0-lg">
						<div class="wrap-slick3 flex-sb flex-w">
							<div class="wrap-slick3-dots"></div>
							<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

							<div class="slick3 gallery-lb">
								<div class="item-slick3" data-thumb="admin/image/<?php echo $row['image1']; ?>">
									<div class="wrap-pic-w pos-relative">
										<img src="admin/image/<?php echo $row['image1']; ?>" alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="admin/image/<?php echo $row['image1']; ?>">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>

								<div class="item-slick3" data-thumb="admin/image/<?php echo $row['image2']; ?>">
									<div class="wrap-pic-w pos-relative">
										<img src="admin/image/<?php echo $row['image2']; ?>" alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="admin/image/<?php echo $row['image2']; ?>">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>

								<div class="item-slick3" data-thumb="admin/image/<?php echo $row['image3']; ?>">
									<div class="wrap-pic-w pos-relative">
										<img src="admin/image/<?php echo $row['image3']; ?>" alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="admin/image/<?php echo $row['image3']; ?>">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
					
				<div class="col-md-6 col-lg-5 p-b-30">
					<div class="p-r-50 p-t-5 p-lr-0-lg">
						<h4 class="mtext-105 cl2 js-name-detail p-b-14">
							<?php echo $row['name']; ?>
						</h4>

						<span class="mtext-106 cl2">
							Rs.<?php echo $row['price']; ?>
						</span>

						<p class="stext-102 cl3 p-t-23">
							<?php echo $row['one_line_title']; ?>
						</p>
					

					<form method="post" id="add_cart">
						<div class="p-t-33">
							<div class="flex-w flex-r-m p-b-10">
								<div class="size-203 flex-c-m respon6">
									Size
								</div>

								<div class="size-204 respon6-next">
									<div class="rs1-select2 bor8 bg0">
										<select class="js-select2" name="size_select" required>
											<option value="">Choose an option</option>

												<?php 
													$size = explode(',',$row['size']);
													$size_length = count($size);
												?>
											<?php for ($i=0; $i<$size_length; $i++) { ?>
												<option value="<?php echo $size[$i]; ?>"><?php echo $size[$i]; ?></option>
											<?php } ?>
										</select>
										<div class="dropDownSelect2"></div>
									</div>
								</div>
							</div>

							<div class="flex-w flex-r-m p-b-10">
								<div class="size-203 flex-c-m respon6">
									Color
								</div>

								<div class="size-204 respon6-next">
									<div class="rs1-select2 bor8 bg0">
										<select class="js-select2" name="color_select" required>
											<option value="">Choose an option</option>

												<?php 
													$color = explode(',',$row['color']);
													$color_length = count($color);
												?>
											<?php for ($i=0; $i<$color_length; $i++) { ?>
												<option value="<?php echo $color[$i]; ?>"><?php echo $color[$i]; ?></option>
											<?php } ?>
										</select>
										<div class="dropDownSelect2"></div>
									</div>
								</div>
							</div>

							
							<div class="flex-w flex-r-m p-b-10">
								<div class="size-204 flex-w flex-m respon6-next">
										<input type="hidden" name="cart_id" value="<?php echo $row['id']; ?>">
									<div class="wrap-num-product flex-w m-r-20 m-tb-10">
										<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-minus"></i>
										</div>

										<input class="mtext-104 cl3 txt-center num-product" type="number" name="num_product" value="1">

										<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-plus"></i>
										</div>
									</div>

									<button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail cart_submit" name="cart_submit">
										Add to Cart
									</button>
								</div>
							</div>
						</div>
					</form>

						<!--  -->
						<div class="flex-w flex-m p-l-100 p-t-40 respon7">
							<div class="flex-m bor9 p-r-10 m-r-11">
								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Add to Wishlist">
									<i class="zmdi zmdi-favorite"></i>
								</a>
							</div>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
								<i class="fa fa-facebook"></i>
							</a>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
								<i class="fa fa-twitter"></i>
							</a>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
								<i class="fa fa-google-plus"></i>
							</a>
						</div>
					</div>
				</div>
			</div>


			<div class="bor10 m-t-50 p-t-43 p-b-40">
				<!-- Tab01 -->
				<div class="tab01">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item p-b-10">
							<a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a>
						</li>

						<li class="nav-item p-b-10">
							<a class="nav-link" data-toggle="tab" href="#information" role="tab">Additional information</a>
						</li>

						<li class="nav-item p-b-10">
							<a class="nav-link" data-toggle="tab" href="#reviews" role="tab" id="comment_count">Reviews (<?php echo $comment_count; ?>)</a>
						</li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content p-t-43">
						<!-- - -->
						<div class="tab-pane fade show active" id="description" role="tabpanel">
							<div class="how-pos2 p-lr-15-md">
								<p class="stext-102 cl6">
									<?php echo $row['description']; ?>
								</p>
							</div>
						</div>

						<!-- - -->
						<div class="tab-pane fade" id="information" role="tabpanel">
							<div class="row">
								<div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
									<ul class="p-lr-28 p-lr-15-sm">
										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Weight
											</span>

											<span class="stext-102 cl6 size-206">
												<?php echo $row['weight']; ?>
											</span>
										</li>

										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Dimensions
											</span>

											<span class="stext-102 cl6 size-206">
												<?php echo $row['dimension']; ?>
											</span>
										</li>

										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Materials
											</span>

											<span class="stext-102 cl6 size-206">
												<?php echo $row['material']; ?>
											</span>
										</li>

										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Color
											</span>

											<span class="stext-102 cl6 size-206">
												<?php echo $row['color']; ?>
											</span>
										</li>

										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Size
											</span>

											<span class="stext-102 cl6 size-206">
												<?php echo $row['size']; ?>
											</span>
										</li>
									</ul>
								</div>
							</div>
						</div>

						<!-- - -->
						<div class="tab-pane fade" id="reviews" role="tabpanel">
							<div class="row">
								<div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
									<div class="p-b-30 m-lr-15-sm">

								<div id="display_data">
									<?php 
									while ($row_comment = mysqli_fetch_assoc($data_comment)) { ?>
											
										<!-- Review -->
									
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
								</div>
										
										<!-- Add review -->
										<form method="post" class="w-full" id="review_submit">

											<input type="hidden" name="user_id" id="detail_id" value="<?php echo $detail_id; ?>">

											<h5 class="mtext-108 cl2 p-b-7">
												Add a review
											</h5>

											<p class="stext-102 cl6">
												Your email address will not be published. Required fields are marked *
											</p>

											<div class="flex-w flex-m p-t-50 p-b-23">
												<span class="stext-102 cl3 m-r-16">
													Your Rating
												</span>

												<span class="wrap-rating fs-18 cl11 pointer">
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<input class="dis-none" type="number" name="rating">
												</span>
											</div>

											<div class="row p-b-25">
												<div class="col-12 p-b-5">
													<label class="stext-102 cl3" for="review">Your review</label>
													<textarea class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10" id="review" name="review"></textarea>
												</div>

												<div class="col-sm-6 p-b-5">
													<label class="stext-102 cl3" for="name">Name</label>
													<input class="size-111 bor8 stext-102 cl2 p-lr-20" id="name" type="text" name="name">
												</div>

												<div class="col-sm-6 p-b-5">
													<label class="stext-102 cl3" for="email">Email</label>
													<input class="size-111 bor8 stext-102 cl2 p-lr-20" id="email" type="text" name="email">
												</div>
											</div>

											<button class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10" name="review_submit" id="review_count">
												Submit
											</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
			<span class="stext-107 cl6 p-lr-25">
				SKU: JAK-01
			</span>

			<span class="stext-107 cl6 p-lr-25">
				Categories: <?php echo $row['category'].", ".$row['type']; ?>
			</span>
		</div>
	</section>


	<!-- Related Products -->
	<section class="sec-relate-product bg0 p-t-45 p-b-105">
		<div class="container">
			<!-- <div class="p-b-45">
				<h3 class="ltext-106 cl5 txt-center">
					Related Products
				</h3>
			</div> -->

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">


					<?php while ($row = mysqli_fetch_assoc($data_related)) { ?>
					
					<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-pic hov-img0">
								<img src="admin/image/<?php echo $row['image1']; ?>" alt="IMG-PRODUCT">

								<!-- <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
									Quick View
								</a> -->
							</div>

							<div class="block2-txt flex-w flex-t p-t-14">
								<div class="block2-txt-child1 flex-col-l ">
									<a href="product-detail.php?detail_id=<?php echo $row['id']; ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
										<?php echo $row['name']; ?>
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
			</div>
		</div>
	</section>
		

<?php include_once 'footer.php'; ?>

<?php include_once 'scripts.php'; ?>