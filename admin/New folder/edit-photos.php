<?php include_once 'header.php';

if (isset($_GET['e_id']))
{
  $edit_id = $_GET['e_id'];
}

$edit_sql_select = "select * from `photos` where `ID`='$edit_id'";
$edit_data = mysqli_query($conn,$edit_sql_select);
$row = mysqli_fetch_assoc($edit_data);


if (isset($_POST['submit_photos']))
{
    $title = $_POST['title'];
    $details = $_POST['details'];
    $type = $_POST['type'];
    $image = $_FILES['image']['name'];

    if ($image=="") {
      $image = $row['Image'];
    }
    else{
      $path = 'image/'.$image;

    move_uploaded_file($_FILES['image']['tmp_name'], $path);
    }

    $sql_update = "update `photos` set `Title`='$title',`Details`='$details',`Type`='$type',`Image`='$image' where `ID`='$edit_id'";
    mysqli_query($conn,$sql_update);

    header('location:view-photos.php');

}

?>

  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New Latest Photos</h1>
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
                <h3 class="card-title">Add New Latest Photos</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype="multipart/form-data">
            
                <div class="card-body">
                  
                  <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Title of Photo</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Title of New Photo" name="title" maxlength="20" required value="<?php echo @$row['Title']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Details of Photo</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" maxlength="50" placeholder="Enter Some Details of New Photo" name="details" maxlength="50" required value="<?php echo @$row['Details']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Type of Photo</label>

                    <select class="form-control" name="type" required>
                      <option selected disabled>-Select Type of Photo-</option>
                      <option
                      <?php if(@$row['Type']=='furniture'){
                        echo "selected";
                      } ?>
                      >furniture</option>
                      <option
                      <?php if(@$row['Type']=='wallpaper'){
                        echo "selected";
                      } ?>
                      >wallpaper</option>
                      <option
                      <?php if(@$row['Type']=='nature'){
                        echo "selected";
                      } ?>
                      >nature</option>
                      <option
                      <?php if(@$row['Type']=='branding'){
                        echo "selected";
                      } ?>
                      >branding</option>
                    </select>

                    <!-- <input type="text" class="form-control" id="exampleInputPassword1" maxlength="50" placeholder="Enter Some Details of New Photo" name="details" maxlength="50" required> -->
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Edit Photos</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
                        <label class="custom-file-label" for="exampleInputFile">Choose image</label>
                      </div>
                    </div> 
                  </div>
                  <label for="exampleInputFile">Current Photo</label>
                  <div style="width: 250px; height: 200px;">
                      <img src="image/<?php echo $row['Image']; ?>" style="height: 100%; width: 100%;">
                  </div>
 
                </div>
                <!-- /.card-body -->
           
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit_photos">Submit</button>
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