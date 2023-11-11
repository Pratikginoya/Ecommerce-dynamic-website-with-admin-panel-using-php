<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/slick/slick.min.js"></script>
	<script src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script src="vendor/parallax100/parallax100.js"></script>
	<script>
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script>
<!--===============================================================================================-->
	<script src="vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/sweetalert/sweetalert.min.js"></script>
	<script>
		$('.js-addwish-b2').on('click', function(e){
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function(){
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});
	
	</script>
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

<!--===============================================================================================-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes"></script>
	<script src="js/map-custom.js"></script>

<!--==============================================================================================-->
	<script type="text/javascript" src="js/code.jquery.com_jquery-3.7.0.min.js"></script>
	<script type="text/javascript">
		
		$(document).ready(function(){

			$('#review_submit').submit(function(e){
				e.preventDefault();

				var review_data = $('#review_submit').serialize();

				// alert(review_data);

				$.ajax({

					type:"post",
					url:"ajax/ajax_run.php",
					data:review_data,

					success:function(res)
					{	
						$('#display_data').html(res);
					}
				});
			});

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

			


			$('#blog_comment').submit(function(e){
				e.preventDefault();

				var blog_comment = $('#blog_comment').serialize();

				// alert(blog_comment);
				$.ajax({

					type: "post",
					url: "ajax/blog_comment.php",
					data: blog_comment,

					success:function(res)
					{
						$('#display_blog_comment').html(res);
					}

				});
			});

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

			$('.all_product_page_change').click(function(){

				var id = $(this).attr('attr_id');

				// alert(all_pro_p_id);
				$.ajax({

					type: "get",
					url: "ajax/all_product_page_change.php",
					data: {'all_pro_p_id':id},

					success:function(res)
					{
						$('#all_product_page_change_data').html(res);

						$('html,body').animate({scrollTop: 0}, 'slow');
					}
				});
			});

			$('.men_product_page_change').click(function(){

				var id = $(this).attr('attr_id');

				// alert(all_pro_p_id);
				$.ajax({

					type: "get",
					url: "ajax/men_product_page_change.php",
					data: {'all_pro_p_id':id},

					success:function(res)
					{
						$('#men_product_page_change_data').html(res);

						$('html,body').animate({scrollTop: 0}, 'slow');
					}
				});
			});

			$('.search_man_product_page_change').click(function(){

				var id = $(this).attr('attr_id');
				var text = $('#srch_txt_men').val();

				// alert(id);
				// alert(text);
				$.ajax({

					type: "get",
					url: "ajax/men_product_page_change.php",
					data: {'all_pro_p_id_s':id,'search_mans_product':text},

					success:function(res)
					{
						$('#men_product_page_change_data').html(res);

						$('html,body').animate({scrollTop: 0}, 'slow');
					}
				});
			});

			$('.women_product_page_change').click(function(){

				var id = $(this).attr('attr_id');

				// alert(all_pro_p_id);
				$.ajax({

					type: "get",
					url: "ajax/women_product_page_change.php",
					data: {'all_pro_p_id':id},

					success:function(res)
					{
						$('#women_product_page_change_data').html(res);

						$('html,body').animate({scrollTop: 0}, 'slow');
					}
				});
			});

			$('.search_women_product_page_change').click(function(){

				var id = $(this).attr('attr_id');
				var text = $('#srch_txt_women').val();

				// alert(id);
				// alert(text);
				$.ajax({

					type: "get",
					url: "ajax/women_product_page_change.php",
					data: {'all_pro_p_id_s':id,'search_women_product':text},

					success:function(res)
					{
						$('#women_product_page_change_data').html(res);

						$('html,body').animate({scrollTop: 0}, 'slow');
					}
				});
			});

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
			

			$('.delete_cart_item').click(function(){

				var id = $(this).attr('attr_id');

				// alert(id);
				$.ajax({

					type: "get",
					url: "ajax/add_cart.php",
					data:{'d_id':id},

					success:function(res)
					{
						$('#new_number_of_product').html(res);
					}
				});
			});


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


			$('#search_product_text').submit(function(e){
				e.preventDefault();

				var search_pro = $('#search_product_text').serialize();

				// alert(search_pro);
				$.ajax({

					type: "get",
					url: "ajax/all_product_page_change.php",
					data: search_pro,

					success:function(res)
					{
						$('#all_product_page_change_data').html(res);
					}
				});
			});

			$('.search_product_page_change').click(function(){

				var idss = $(this).attr('attr_id');
				var texts = $('#srch_txt').val();

				// alert(idss);
				// alert(texts); die();
				$.ajax({

					type: "get",
					url: "ajax/all_product_page_change.php",
					data: {'all_pro_p_id_s':idss,'search_product':texts},

					success:function(res)
					{
						$('#all_product_page_change_data').html(res);

						$('html,body').animate({scrollTop: 0}, 'slow');
					}
				});
			});

			$('.add_number').click(function(){

				var id = $(this).attr('attr_id');
				var number = $(this).attr('attr_pro');

				// alert(id);
				// alert(number);
				$.ajax({

					type: "get",
					url: "ajax/change_cart_data.php",
					data: {'id':id,'add_pro':number},

					success:function(res)
					{
						$('#new_number_of_product').html(res);
					}
				});
			});


			$('.dec_number').click(function(){

				var id = $(this).attr('attr_id');
				var number = $(this).attr('attr_pro');

				// alert(id);
				// alert(number);
				$.ajax({

					type: "get",
					url: "ajax/change_cart_data.php",
					data: {'id':id,'add_pro':number},

					success:function(res)
					{
						$('#new_number_of_product').html(res);
					}
				});
			});

			$('.delete_from_cart').click(function(){

				var d_id = $(this).attr('attr_id');

				// alert(d_id);
				$.ajax({

					type: "get",
					url: "ajax/change_cart_data.php",
					data: {'d_id':d_id},

					success:function(res)
					{
						$('#new_number_of_product').html(res);
					}
				});
			});

			$('.cart_delete').click(function(){

				var d_id = $(this).attr('attr_id');

				$.ajax({

					type: "get",
					url: "ajax/change_cart_data.php",
					data: {'d_id':d_id},

					success:function(res)
					{
						$('#new_number_of_product').html(res);
					}
				});
			});

			$('#newness').click(function(){

				var data = $(this).attr('attr_id');

				// alert(data);
				$.ajax({

					type: "get",
					url: "ajax/all_product_page_change.php",
					data: {'newness':data},

					success:function(res)
					{
						$('#all_product_page_change_data').html(res);
						$('.panel-filter').css('display','none');

						$('#default').removeClass('filter-link-active');
						$('#low_high').removeClass('filter-link-active');
						$('#high_low').removeClass('filter-link-active');
						$('#newness').addClass('filter-link-active');

						$('#color_change').css('backgroundColor','#717fe0');
						$('#color_change').css('color','white');
						$('.icon-filter').css('color','white');
					}
				});
			});

			$('#low_high').click(function(){

				var data = $(this).attr('attr_id');

				// alert(data);
				$.ajax({

					type: "get",
					url: "ajax/all_product_page_change.php",
					data: {'low_high':data},

					success:function(res)
					{
						$('#all_product_page_change_data').html(res);
						$('.panel-filter').css('display','none');

						$('#default').removeClass('filter-link-active');
						$('#newness').removeClass('filter-link-active');
						$('#high_low').removeClass('filter-link-active');
						$('#low_high').addClass('filter-link-active');

						$('#color_change').css('backgroundColor','#717fe0');
						$('#color_change').css('color','white');
						$('.icon-filter').css('color','white');
					}
				});
			});

			$('#high_low').click(function(){

				var data = $(this).attr('attr_id');

				// alert(data);
				$.ajax({

					type: "get",
					url: "ajax/all_product_page_change.php",
					data: {'high_low':data},

					success:function(res)
					{
						$('#all_product_page_change_data').html(res);
						$('.panel-filter').css('display','none');

						$('#default').removeClass('filter-link-active');
						$('#newness').removeClass('filter-link-active');
						$('#low_high').removeClass('filter-link-active');
						$('#high_low').addClass('filter-link-active');

						$('#color_change').css('backgroundColor','#717fe0');
						$('#color_change').css('color','white');
						$('.icon-filter').css('color','white');
					}
				});
			});

			$('#newness_s').click(function(){

				var data = $(this).attr('attr_id');
				var text = $(this).attr('attr_id_s');

				// alert(data);
				$.ajax({

					type: "get",
					url: "ajax/all_product_page_change.php",
					data: {'newness':data,'search_product':text},

					success:function(res)
					{
						$('#all_product_page_change_data').html(res);
						$('.panel-filter').css('display','none');

						$('#default_s').removeClass('filter-link-active');
						$('#low_high_s').removeClass('filter-link-active');
						$('#high_low_s').removeClass('filter-link-active');
						$('#newness_s').addClass('filter-link-active');

						$('#color_change').css('backgroundColor','#717fe0');
						$('#color_change').css('color','white');
						$('.icon-filter').css('color','white');
					}
				});
			});

			$('#low_high_s').click(function(){

				var data = $(this).attr('attr_id');
				var text = $(this).attr('attr_id_s');

				// alert(data);
				$.ajax({

					type: "get",
					url: "ajax/all_product_page_change.php",
					data: {'low_high':data,'search_product':text},

					success:function(res)
					{
						$('#all_product_page_change_data').html(res);
						$('.panel-filter').css('display','none');

						$('#default_s').removeClass('filter-link-active');
						$('#newness_s').removeClass('filter-link-active');
						$('#high_low_s').removeClass('filter-link-active');
						$('#low_high_s').addClass('filter-link-active');

						$('#color_change').css('backgroundColor','#717fe0');
						$('#color_change').css('color','white');
						$('.icon-filter').css('color','white');
					}
				});
			});

			$('#high_low_s').click(function(){

				var data = $(this).attr('attr_id');
				var text = $(this).attr('attr_id_s');

				// alert(data);
				$.ajax({

					type: "get",
					url: "ajax/all_product_page_change.php",
					data: {'high_low':data,'search_product':text},

					success:function(res)
					{
						$('#all_product_page_change_data').html(res);
						$('.panel-filter').css('display','none');

						$('#default_s').removeClass('filter-link-active');
						$('#newness_s').removeClass('filter-link-active');
						$('#low_high_s').removeClass('filter-link-active');
						$('#high_low_s').addClass('filter-link-active');

						$('#color_change').css('backgroundColor','#717fe0');
						$('#color_change').css('color','white');
						$('.icon-filter').css('color','white');
					}
				});
			});


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

		});

	</script>

</body>
</html>