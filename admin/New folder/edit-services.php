<?php include_once 'header.php';

if (isset($_GET['e_id']))
{
    $edit_id = $_GET['e_id'];
}

$edit_sql_select = "select * from `services` where `ID`='$edit_id'";
$edit_data = mysqli_query($conn,$edit_sql_select);
$row = mysqli_fetch_assoc($edit_data);


if (isset($_POST['submit_services']))
{
    $title = $_POST['title'];
    $details = $_POST['details'];

    $sql_update = "update `services` set `Title`='$title',`Details`='$details' where `ID`='$edit_id'";
    mysqli_query($conn,$sql_update);

    header('location:view-services.php');
}

?>

  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Slider</h1>
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
                <h3 class="card-title">Edit Services</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype="multipart/form-data">
            
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Edit Title of Service</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Title of Service" name="title" required maxlength="40" value="<?php echo @$row['Title']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Edit Details of Service</label>
                    <textarea rows="6" type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Some Details of Service" name="details" required maxlength="250"><?php echo @$row['Details']; ?></textarea>
                  </div>
 
                </div>
                <!-- /.card-body -->
           
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit_services">Submit</button>
                </div>
              </form>
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