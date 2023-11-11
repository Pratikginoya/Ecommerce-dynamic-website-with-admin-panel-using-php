<?php include_once 'header.php';


$sql_select_count = "select * from `blog`";
$data_count = mysqli_query($conn,$sql_select_count);

$total_data = mysqli_num_rows($data_count);
$limit = 2;
$page_count = ceil($total_data/2);

if (isset($_GET['p_id']))
{
  $page_no = $_GET['p_id'];
}
else
{
  $page_no = 1;
}

$start = ($page_no-1)*$limit;
$sql_select = "select * from `blog` limit $start,$limit";
$data = mysqli_query($conn,$sql_select);


if (isset($_GET['d_id']))
{
    $delete_id = $_GET['d_id'];

    $sql_select_img = "select * from `blog` where `id`='$delete_id'";
    $data_img = mysqli_query($conn,$sql_select_img);
    $row_img = mysqli_fetch_assoc($data_img);

    $delete_img = $row['image'];

    unlink('image/'.$delete_img);

    $sql_delete = "delete from `blog` where `ID`='$delete_id'";
    mysqli_query($conn,$sql_delete);

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
            <h1>View / Manage Data of Blogs</h1>
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
                <h3 class="card-title">View/Manage data of Blogs</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover display_blog_admin_page_change">
                  <thead>
                  <tr>
                    <th>Titel of Blog</th>
                    <th>Headline of Blog</th>
                    <th>Details of Blog</th>
                    <th>Tags of Blog</th>
                    <th>Image</th>
                    <th>Edit Data</th>
                    <th>Delete Data</th>
                  </tr>
                  </thead>
                  
                  <?php while ($row = mysqli_fetch_assoc($data)) { ?>

                   <tr>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['short_detail']; ?></td>
                    <td><?php echo $row['full_detail']; ?></td>
                    <td><?php echo $row['tag']; ?></td>
                    <td align="center">
                         <div style="width: 200px; height: 150px;"><img src="image/<?php echo $row['image']; ?>" style="height: 100%; width: 100%; object-fit: cover;"></td></div>
                    </td>
                    <td><a href="edit-blog.php?e_id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a></td>
                    <td><a href="view-blog.php?d_id=<?php echo $row['id']; ?>" class="btn btn-primary">Delete</button></td>
                  </tr>

                  <?php } ?>

                  <tr>
                    <td colspan="7" align="center">
                      <?php for ($i=1; $i<=$page_count; $i++) { ?>
                    <a href="javascript:void(0)" class="btn btn-primary-page 
                    <?php if(isset($_GET['p_id']))
                      {
                        if($_GET['p_id']==$i)
                        {
                          echo "btn-primary-page-active";
                        }
                        else
                        {
                          echo "";
                        }
                      }
                      else
                      {
                        if($i==1)
                        {
                          echo "btn-primary-page-active";
                        }
                      } ?> blog_admin_page_change " attr_id=<?php echo $i; ?> >
                    <?php echo $i; ?>
                    </a>
                  <?php } ?>   
                    </td>
                  </tr>
                            


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
