<?php include_once 'header.php';

if (isset($_GET['e_id']))
{
    $edit_id = $_GET['e_id'];
}

$edit_sql_select = "select * from `about` where `ID`='$edit_id'";
$edit_data = mysqli_query($conn,$edit_sql_select);
$row = mysqli_fetch_assoc($edit_data);

if (isset($_POST['submit_thought']))
{
    $thought = $_POST['thought'];
    $name = $_POST['name'];
    $city = $_POST['city'];

    $sql_update = "update `about` set `Thought`='$thought',`Name`='$name',`City`='$city' where `ID`='$edit_id'";
    mysqli_query($conn,$sql_update);

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
            <h1>Add Your Thought in About (What Others Saying)</h1>
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
                <h3 class="card-title">Add Your Thought</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype="multipart/form-data">
            
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Your Thought</label>
                    <textarea rows="7" type="text" class="form-control" id="exampleInputEmail1" maxlength="300" placeholder="Enter Your Thought" name="thought" required><?php echo @$row['Thought']; ?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Your Name</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" maxlength="20" placeholder="Enter Your Name" name="name" required value="<?php echo @$row['Name']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Your City & State</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" maxlength="35" placeholder="Enter Your City, State" name="city" required value="<?php echo @$row['City']; ?>">
                  </div>
 
                </div>
                <!-- /.card-body -->
           
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit_thought">Submit</button>
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