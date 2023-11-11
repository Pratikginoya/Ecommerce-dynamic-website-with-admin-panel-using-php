<?php include_once 'header.php';

$sql_select = "select * from `about`";
$data = mysqli_query($conn,$sql_select);

if (isset($_GET['d_id']))
{
    $delete_id = $_GET['d_id'];

    $sql_delete = "delete from `about` where `ID`='$delete_id'";
    mysqli_query($conn,$sql_delete);

    header('location:view-thought.php');
}

?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>View / Manage Thoughts of About  (What Others Saying...)</h1>
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
                <h3 class="card-title">View/Manage Thoughts</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Thought</th>
                    <th>Name</th>
                    <th>City & State</th>
                    <th>Edit Data</th>
                    <th>Delete Data</th>
                  </tr>
                  </thead>
                  
                  <?php while ($row = mysqli_fetch_assoc($data)) { ?>

                   <tr>
                    <td><?php echo $row['Thought']; ?></td>
                    <td><?php echo $row['Name']; ?></td>
                    <td><?php echo $row['City']; ?></td>
                    <td><a href="edit-thought.php?e_id=<?php echo $row['ID']; ?>" class="btn btn-primary">Edit</a></td>
                    <td><a href="view-thought.php?d_id=<?php echo $row['ID']; ?>" class="btn btn-primary">Delete</button></td>
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
