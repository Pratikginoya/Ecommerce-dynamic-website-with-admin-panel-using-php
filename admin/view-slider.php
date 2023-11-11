<?php include_once 'header.php';

$sql_select = "select * from `slider`";
$data = mysqli_query($conn,$sql_select);

if (isset($_GET['d_id']))
{
    $delete_id = $_GET['d_id'];

    $sql_select_img = "select * from `slider` where `id`='$delete_id'";
    $data_img = mysqli_query($conn,$sql_select_img);
    $row = mysqli_fetch_assoc($data_img);
    $delete_img = $row['image'];

    unlink('image/'.$delete_img);

    $sql_delete = "delete from `slider` where `id`='$delete_id'";
    mysqli_query($conn,$sql_delete);

    header('location:view-slider.php');
}

?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>View / Manage Data of Sliders</h1>
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
                <h3 class="card-title">View/Manage data of Slider</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Titel of Slider</th>
                    <th>Details of Slider</th>
                    <th>Image</th>
                    <th>Edit Data</th>
                    <th>Delete Data</th>
                  </tr>
                  </thead>
                  
                  <?php while ($row = mysqli_fetch_assoc($data)) { ?>

                   <tr>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['details']; ?></td>
                    <td align="center">
                         <div style="width: 250px; height: 200px;"><img src="image/<?php echo $row['image']; ?>" style="height: 100%; width: 100%; object-fit: cover;"></td></div>
                    </td>
                    <td><a href="edit-slider.php?e_id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a></td>
                    <td><a href="view-slider.php?d_id=<?php echo $row['id']; ?>" class="btn btn-primary">Delete</button></td>
                  </tr>

                  <?php } ?>


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
