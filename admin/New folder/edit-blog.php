<?php include_once 'header.php';

// $edit_id = $_SESSION['edit_slider_id'];

if (isset($_GET['e_id']))
{
  $edit_id = $_GET['e_id'];
}

$edit_sql_select = "select * from `blog` where `ID`='$edit_id'";
$edit_data = mysqli_query($conn,$edit_sql_select);
$row = mysqli_fetch_assoc($edit_data);


if (isset($_POST['submit_blog']))
{
    $title = $_POST['title'];
    $s_details = $_POST['s_details'];
    $f_details = $_POST['f_details'];
    $image = $_FILES['image']['name'];

    if ($image=="") {
        $image = $row['Image'];
    }
    else
    {
        $path = 'image/'.$image;
        move_uploaded_file($_FILES['image']['tmp_name'], $path);
    }

    $sql_update = "update `blog` set `Title`='$title',`Short_Details`='$s_details',`Full_Details`='$f_details',`Image`='$image' where `ID`='$edit_id'";
    mysqli_query($conn,$sql_update);

    header('location:view-blog.php');
}

?>

  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit This Blog</h1>
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
                <h3 class="card-title">Edit This Blog</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype="multipart/form-data">
            
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Edit Title of Blog</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Title of Blog" name="title" maxlength="70" value="<?php echo @$row['Title']; ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Edit Short Details of Blog</label>
                    <textarea type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Short Details of Blog" name="s_details" maxlength="250" required><?php echo @$row['Short_Details']; ?></textarea>
                  </div>
                   <div class="form-group">
                    <label for="exampleInputPassword1">Edit Full Details of Blog</label>
                    <textarea rows="10" type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Full Details of Blog" name="f_details" maxlength="1500" required><?php echo @$row['Full_Details']; ?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Add New Image of This Blog</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
                        <label class="custom-file-label" for="exampleInputFile">Choose image</label>
                      </div>
                    </div> 
                  </div>

                  <label for="exampleInputFile">Current Image of This Blog</label>
                   <div style="width: 250px; height: 200px;">
                      <img src="image/<?php echo $row['Image']; ?>" style="height: 100%; width: 100%; object-fit: cover;">
                  </div>
    
                </div>
                <!-- /.card-body -->
           
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit_blog">Submit</button>
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