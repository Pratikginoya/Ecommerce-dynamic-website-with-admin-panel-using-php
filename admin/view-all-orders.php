<?php include_once 'header.php';

$sql_select_data = "select * from `order` where `status`='Cancelled-By-Client' or `status`='Delivered' or `status` = 'Cancelled-By-Supplier'";
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

$sql_select = "select * from `order` where `status`='Cancelled-By-Client' or `status`='Delivered' or `status` = 'Cancelled-By-Supplier' limit $start,$limit";
$data = mysqli_query($conn,$sql_select);

?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>View Past Order Data</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">View Past Orders Data</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover display_past_order_admin_page_change">
                  <thead>
                  <tr>
                    <th>Product ID</th>
                    <th>Order Date/Time</th>
                    <th>Name of Product</th>
                    <th>Number of Items</th>
                    <th>Image 1 (Main)</th>
                    <th>Delivery Address</th>
                    <th>City & Pincode</th>
                    <th>Status</th>
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
                    <td><?php echo $row['status']; ?></td>                    
                    <td><a href="view-more-past-order.php?v_id=<?php echo $row['id']; ?>">View More</a></td>
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
                      } ?> past_order_admin_page_change " attr_id=<?php echo $i; ?> >
                    <?php echo $i; ?>
                    </a>
                  <?php } ?>   
                    </td>
                  </tr>

                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <?php include_once 'footer.php'; ?>


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?php include_once 'scripts.php'; ?>
