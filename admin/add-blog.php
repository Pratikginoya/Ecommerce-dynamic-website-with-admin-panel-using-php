<?php include_once 'header.php';

if (isset($_POST['submit_blog']))
{
    $title = $_POST['title'];
    $s_details = $_POST['s_details'];
    $f_details = $_POST['f_details'];
    $tag = implode(', ',$_POST['tag']);
    $image = rand(1,1000000).$_FILES['image']['name'];

    $path = 'image/'.$image;

    move_uploaded_file($_FILES['image']['tmp_name'],$path);

    $day = $_POST['day'];
    $month = $_POST['month'];
    $year = $_POST['year'];

    $sql_insert = "insert into `blog`(`title`, `short_detail`, `full_detail`, `tag`, `image`, `day`, `month`, `year`)values('$title','$s_details','$f_details','$tag','$image','$day','$month','$year')";
    mysqli_query($conn,$sql_insert);

}

?>

  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New Blog</h1>
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
                <h3 class="card-title">Add New Blog</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype="multipart/form-data">
            
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Title of New Blog</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Title of New Blog" name="title" maxlength="70" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Short Details of New Blog</label>
                    <textarea type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Short Details of New Blog" name="s_details" maxlength="250" required></textarea>
                  </div>
                   <div class="form-group">
                    <label for="exampleInputPassword1">Full Details of New Blog</label>
                    <textarea rows="10" type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Full Details of New Blog" name="f_details" maxlength="1500" required></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Tag of Product (As per the offer)</label>
                      <div>
                        <input type="checkbox" name="tag[]" value="Best-seller"> Best-seller <br>
                        <input type="checkbox" name="tag[]" value="Fashion"> Fashion <br>
                        <input type="checkbox" name="tag[]" value="Streetstyle"> Streetstyle <br>
                        <input type="checkbox" name="tag[]" value="Craft"> Craft <br>
                        <input type="checkbox" name="tag[]" value="Lifestyle"> Lifestyle <br>
                        <input type="checkbox" name="tag[]" value="Featured"> Featured <br>
                        <input type="checkbox" name="tag[]" value="Sale"> Sale <br>
                        <input type="checkbox" name="tag[]" value="Top-rate"> Top-rate <br>
                     </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Add Image of New Blog</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="image" required>
                        <label class="custom-file-label" for="exampleInputFile">Choose image</label>
                      </div>
                    </div> 
                  </div>

                  <input type="hidden" name="day" value="<?php echo date('d'); ?>">
                  <input type="hidden" name="month" value="<?php echo date('M'); ?>">
                  <input type="hidden" name="year" value="<?php echo date('Y'); ?>">
 
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