<?php include_once 'header.php';

$view_id = $_GET['v_id'];

$sql_select = "select * from `order` where `id`='$view_id'";
$data = mysqli_query($conn,$sql_select);
$row = mysqli_fetch_assoc($data);

?>

  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Details of Product to Deliver</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">General Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Details of Product to Deliver</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <table id="example2" class="table table-bordered">
                  
                  <tr>
                    <th>Current Delivery Status</th>
                    <td><?php echo $row['status']; ?></td>
                  </tr>
                  <tr>
                    <th>Product ID</th>
                    <td><?php echo $row['product_id']; ?></td>
                  </tr>
                  <tr>
                    <th>Date & Time of Order</th>
                    <td><?php echo $row['date_time']; ?></td>
                  </tr>
                  <tr>
                    <th>Name of Product</th>
                    <td><?php echo $row['name']; ?></td>
                  </tr>
                  <tr>
                    <th>Price of Product per Pic</th>
                    <td>Rs.<?php echo $row['price']; ?></td>
                  </tr>
                  <tr>
                    <th>Number of Product to Deliver</th>
                    <td><?php echo $row['num_product']; ?></td>
                  </tr>
                  <tr>
                    <th>Size</th>
                    <td><?php echo $row['size']; ?></td>
                  </tr>
                  <tr>
                    <th>Color</th>
                    <td><?php echo $row['color']; ?></td>
                  </tr>
                  <tr>
                    <th>Delivery Address</th>
                    <td><?php echo $row['address']; ?></td>
                  </tr>
                  <tr>
                    <th>City</th>
                    <td><?php echo $row['city']; ?></td>
                  </tr>
                  <tr>
                    <th>Pincode</th>
                    <td><?php echo $row['pincode']; ?></td>
                  </tr>
                  <tr>
                    <th>Customer Name</th>
                    <td><?php echo $row['cust_name']; ?></td>
                  </tr>
                  <tr>
                    <th>Customer Mobile Number</th>
                    <td><?php echo $row['mobile']; ?></td>
                  </tr>
                  <tr>
                    <th>Customer Email ID</th>
                    <td><?php echo $row['email']; ?></td>
                  </tr>
                  <tr>
                    <th>Payment Mode</th>
                    <td><?php echo $row['payment']; ?></td>
                  </tr>
                  <tr>
                    <th>Image-1 (Main)</th>
                    <td align="center">
                         <div style="width: 250px; height: 200px;"><img src="image/<?php echo $row['image']; ?>" style="height: 100%; width: 100%; object-fit: cover; object-position: top;"></td></div>
                    </td>
                  </tr>

                  </table>

                  <a href="edit-order-status.php?e_id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit Order Status</a>
                  <br>
                  <a href="view-received-order.php" class="btn btn-primary">Back to View Order List</a>
 
            </div>
            <!-- /.card -->
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
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