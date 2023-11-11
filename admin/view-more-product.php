<?php include_once 'header.php';

$view_id = $_GET['v_id'];

$sql_select = "select * from `product` where `id`='$view_id'";
$data = mysqli_query($conn,$sql_select);
$row = mysqli_fetch_assoc($data);

if(isset($_GET['d_id']))
{
    $delete_id = $_GET['d_id'];

    $sql_delete = "delete from `product` where `id`='$delete_id'";
    mysqli_query($conn,$sql_delete);

    header('location:view-product.php');
}

?>

  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Details of Product</h1>
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
                <h3 class="card-title">Details of Product</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <table id="example2" class="table table-bordered">
                  
                  <tr>
                    <th>Product ID</th>
                    <td><?php echo $row['id']; ?></td>
                  </tr>
                  <tr>
                    <th>Stock</th>
                    <td><?php echo $row['stock']; ?></td>
                  </tr>
                  <tr>
                    <th>Name of Product</th>
                    <td><?php echo $row['name']; ?></td>
                  </tr>
                  <tr>
                    <th>Price of Product</th>
                    <td><?php echo $row['price']; ?></td>
                  </tr>
                  <tr>
                    <th>Category of Product</th>
                    <td><?php echo $row['category']; ?></td>
                  </tr>
                  <tr>
                    <th>Tag/Offer of Product</th>
                    <td><?php echo $row['tag']; ?></td>
                  </tr>
                  <tr>
                    <th>Type of Product</th>
                    <td><?php echo $row['type']; ?></td>
                  </tr>
                  <tr>
                    <th>Sizes of Product</th>
                    <td><?php echo $row['size']; ?></td>
                  </tr>
                  <tr>
                    <th>Colors of Product</th>
                    <td><?php echo $row['color']; ?></td>
                  </tr>
                  <tr>
                    <th>Weight of Product</th>
                    <td><?php echo $row['weight']; ?></td>
                  </tr>
                  <tr>
                    <th>Dimentions of Product</th>
                    <td><?php echo $row['dimension']; ?></td>
                  </tr>
                  <tr>
                    <th>Material Type of Product</th>
                    <td><?php echo $row['material']; ?></td>
                  </tr>
                  <tr>
                    <th>One line Title of Product</th>
                    <td><?php echo $row['one_line_title']; ?></td>
                  </tr>
                  <tr>
                    <th>Description of Product</th>
                    <td><?php echo $row['description']; ?></td>
                  </tr>
                  <tr>
                    <th>Image-1 (Main)</th>
                    <td align="center">
                         <div style="width: 250px; height: 200px;"><img src="image/<?php echo $row['image1']; ?>" style="height: 100%; width: 100%; object-fit: cover; object-position: top;"></td></div>
                    </td>
                  </tr>
                  <tr>
                    <th>Image-2</th>
                    <td align="center">
                         <div style="width: 250px; height: 200px;"><img src="image/<?php echo $row['image2']; ?>" style="height: 100%; width: 100%; object-fit: cover; object-position: top;"></td></div>
                    </td>
                  </tr>
                  <tr>
                    <th>Image-3</th>
                    <td align="center">
                         <div style="width: 250px; height: 200px;"><img src="image/<?php echo $row['image3']; ?>" style="height: 100%; width: 100%; object-fit: cover; object-position: top;"></td></div>
                    </td>
                  </tr>

                  </table>

                  <a href="edit-product.php?e_id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit Product Details</a>
                  <br>
                  <a href="view-product.php?d_id=<?php echo $row['id']; ?>" class="btn btn-primary">Delete Product</a>
                   <br>
                  <a href="view-product.php" class="btn btn-primary">Back to List of Products</a>
 
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