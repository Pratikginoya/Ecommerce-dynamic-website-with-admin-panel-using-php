<?php include_once 'header.php';

if (isset($_GET['e_id']))
{
    $edit_id = $_GET['e_id'];
}

$sql_select = "select * from `slider` where `id`='$edit_id'";
$data = mysqli_query($conn,$sql_select);
$row = mysqli_fetch_assoc($data);


if (isset($_POST['submit_slider']))
{
    $title = $_POST['title'];
    $details = $_POST['details'];
    $image = $_FILES['image']['name'];

    if ($image=="") 
    {
        $image = $row['image'];
    }
    else
    {
        unlink('image/'.$row['image']);
        
        $image = rand(0,1000000).$_FILES['image']['name'];
        $path = 'image/'.$image;
        move_uploaded_file($_FILES['image']['tmp_name'],$path);
    }

    $sql_update = "update `slider` set `title`='$title',`details`='$details',`image`='$image' where `id`='$edit_id'";
    mysqli_query($conn,$sql_update);

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
                <h3 class="card-title">Edit Slider</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype="multipart/form-data">
            
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Edit Title of Slider</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Title of Slider" name="title" maxlength="20" required value="<?php echo @$row['title']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Edit Details of Slider</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Some Details of Slider" name="details" maxlength="50" required value="<?php echo @$row['details']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Select New Image of Slider</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
                        <label class="custom-file-label" for="exampleInputFile">Choose image</label>
                      </div>
                    </div> 
                  </div>

                  <label for="exampleInputFile">Current Image of Slider</label>
                  <div style="width: 200px; height: 200px;">
                      <img src="image/<?php echo $row['image']; ?>" style="height: 100%; width: 100%; object-fit: cover;">
                  </div>
 
                </div>
                <!-- /.card-body -->
           
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit_slider">Submit</button>
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