<?php 

include_once '../connection.php';

$sql_select_data = "select * from `product`";
$data_data = mysqli_query($conn,$sql_select_data);
$data_count = mysqli_num_rows($data_data);

$limit = 8;
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

$sql_select = "select * from `product` limit $start,$limit";
$data = mysqli_query($conn,$sql_select);

$previous = $page_no-1;
$next = $page_no+1;

 ?>


 				<thead>
                  <tr>
                    <th>ID</th>
                    <th>Name of Product</th>
                    <th>Price of Product</th>
                    <th>Category of Product</th>
                    <th>Type of Product</th>
                    <th>Stock</th>
                    <th>Image 1 (Main)</th>
                    <th>View More</th>
                  </tr>
                  </thead>
                  
                  <?php while ($row = mysqli_fetch_assoc($data)) { ?>

                   <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><?php echo $row['category']; ?></td>
                    <td><?php echo $row['type']; ?></td>
                    <td><?php echo $row['stock']; ?></td>
                    <td align="center">
                         <div style="width: 200px; height: 170px;"><img src="image/<?php echo $row['image1']; ?>" style="height: 100%; width: 100%; object-fit: cover; object-position: top;"></td></div>
                    </td>
                    <td><a href="view-more-product.php?v_id=<?php echo $row['id']; ?>">View More</a></td>
                  </tr>

                  <?php } ?>

                   <tr>
                    <td colspan="7" align="center">
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
                      } ?> product_admin_page_change " attr_id=<?php echo $i; ?> >
                    <?php echo $i; ?>
                    </a>
                  <?php } ?>   
                    </td>
                  </tr>


<script type="text/javascript">
	
	$('.product_admin_page_change').click(function(){

        var p_page_change_id = $(this).attr('attr_id');

        $.ajax({

          type: 'get',
          url: 'ajax/product_admin_page_change.php',
          data: {'p_id':p_page_change_id},

          success:function(res)
          {
              $('.display_product_admin_page_change').html(res);

              $('html,body').animate({scrollTop:0},'slow');
          }

        });
    });
	
</script>