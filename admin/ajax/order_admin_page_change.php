<?php 

include_once '../connection.php';

$sql_select_data = "select * from `order` where `status`='Pending'";
$data_data = mysqli_query($conn,$sql_select_data);
$data_count = mysqli_num_rows($data_data);

$limit = 5;
$page_count = ceil($data_count/$limit);

if (isset($_GET['p_id']))
{
  $page_no = $_GET['p_id'];
}
else
{
  $page_no=1;
}

$start = ($page_no-1)*$limit;

$sql_select = "select * from `order` where `status`='Pending' limit $start,$limit";
$data = mysqli_query($conn,$sql_select);

 ?>


 				<thead>
                  <tr>
                    <th>Product ID</th>
                    <th>Order Date/Time</th>
                    <th>Name of Product</th>
                    <th>Number of Items</th>
                    <th>Image 1 (Main)</th>
                    <th>Delivery Address</th>
                    <th>City & Pincode</th>
                    <th>View More</th>
                  </tr>
                  </thead>
                  
                  <?php while ($row = mysqli_fetch_assoc($data)) { ?>

                   <tr>
                    <td><?php echo $row['product_id']; ?></td>
                    <td><?php echo $row['date_time']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['num_product']; ?></td>
                    <td align="center">
                         <div style="width: 200px; height: 170px;"><img src="image/<?php echo $row['image']; ?>" style="height: 100%; width: 100%; object-fit: cover; object-position: top;"></td></div>
                    </td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['city']; ?>, <?php echo $row['pincode']; ?></td>                    
                    <td><a href="view-more-product-order.php?v_id=<?php echo $row['id']; ?>">View More</a></td>
                  </tr>

                  <?php } ?>

                   <tr>
                    <td colspan="8" align="center">
                  <?php for ($i=1; $i<=$page_count; $i++) { ?>
                    <a href="javascript:void(0)" class="btn btn-primary-page 
                    <?php if(isset($_GET['p_id']))
                      {
                        if($_GET['p_id']==$i)
                        {
                          echo "btn-primary-page-active";
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
                          echo "btn-primary-page-active";
                        }
                      } ?> order_admin_page_change " attr_id=<?php echo $i; ?> >
                    <?php echo $i; ?>
                    </a>
                  <?php } ?>   
                    </td>
                  </tr>

<script type="text/javascript">
	
	$('.order_admin_page_change').click(function(){

        var o_page_change_id = $(this).attr('attr_id');

        // alert(o_page_change_id);
        $.ajax({

          type: 'get',
          url: 'ajax/order_admin_page_change.php',
          data: {'p_id':o_page_change_id},

          success:function(res)
          {
              $('.display_order_admin_page_change').html(res);

              $('html,body').animate({scrollTop:0},'slow');
          }

        });
    });

</script>