<?php 

include_once '../connection.php';

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

 ?>


 				<thead>
                  <tr>
                    <th>Titel of Blog</th>
                    <th>Headline of Blog</th>
                    <th>Details of Blog</th>
                    <th>Tags of Blog</th>
                    <th>Image</th>
                    <th>Edit Data</th>
                    <th>Delete Data</th>
                  </tr>
                  </thead>
                  
                   <?php while ($row = mysqli_fetch_assoc($data)) { ?>

                   <tr>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['short_detail']; ?></td>
                    <td><?php echo $row['full_detail']; ?></td>
                    <td><?php echo $row['tag']; ?></td>
                    <td align="center">
                         <div style="width: 200px; height: 150px;"><img src="image/<?php echo $row['image']; ?>" style="height: 100%; width: 100%; object-fit: cover;"></td></div>
                    </td>
                    <td><a href="edit-blog.php?e_id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a></td>
                    <td><a href="view-blog.php?d_id=<?php echo $row['id']; ?>" class="btn btn-primary">Delete</button></td>
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
                      } ?> blog_admin_page_change " attr_id=<?php echo $i; ?> >
                    <?php echo $i; ?>
                    </a>
                  <?php } ?>    
                    </td>
                  </tr>

 <script type="text/javascript">
  
  $(document).ready(function(){

    $('.blog_admin_page_change').click(function(){

        var b_page_change_id = $(this).attr('attr_id');

        $.ajax({

          type: 'get',
          url: 'ajax/blog_admin_page_change.php',
          data: {'p_id':b_page_change_id},

          success:function(res)
          {
              $('.display_blog_admin_page_change').html(res);

              $('html,body').animate({scrollTop:0},'slow');
          }

        });
    });
  });

</script>