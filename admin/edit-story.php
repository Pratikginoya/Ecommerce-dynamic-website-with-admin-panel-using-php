<?php include_once 'header.php';

$sql_select = "select * from `about`";
$data = mysqli_query($conn,$sql_select);
$row = mysqli_fetch_assoc($data);

if (isset($_POST['edited_story']))
{
    $s_detail = $_POST['s_detail'];
    $image_s = $_FILES['image']['name'];

    if($image_s=="")
    {
        $image = $row['story_image'];
    }
    else
    {
        unlink('image/'.$row['story_image']);

        $image = rand(1,1000000).$_FILES['image']['name'];
        $path = 'image/'.$image;
        move_uploaded_file($_FILES['image']['tmp_name'],$path);
    }

    $sql_update = "update `about` set `story_detail`='$s_detail',`story_image`='$image'";
    mysqli_query($conn,$sql_update);

    header('location:manage-about.php');
}

?>

  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Our Story</h1>
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
                <h3 class="card-title">Edit Our Story</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype="multipart/form-data">
            
                <div class="card-body">
                   <div class="form-group">
                    <label for="exampleInputPassword1">Details of Story</label>
                    <textarea rows="10" type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Full Details of New Blog" name="s_detail" maxlength="1500" required><?php echo $row['story_detail']; ?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Add New Image of Story</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
                        <label class="custom-file-label" for="exampleInputFile">Choose image</label>
                      </div>
                    </div> 
                  </div> 
                  <label for="exampleInputFile">Current Image of Story</label>
                  <div style="width: 200px; height: 200px;">
                      <img src="image/<?php echo $row['story_image']; ?>" style="height: 100%; width: 100%; object-fit: cover; object-position: top;">
                  </div>
                </div>
                <!-- /.card-body -->
           
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="edited_story">Submit</button>
                </div>
                <div class="card-footer">
                  <a href="manage-about.php" class="btn btn-primary">Back to View-About</a>
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