<?php include_once 'header.php';

$sql_select_story = "select * from `about`";
$data_story = mysqli_query($conn,$sql_select_story);

$sql_select_mission = "select * from `about`";
$data_mission = mysqli_query($conn,$sql_select_mission);

$sql_select_thought = "select * from `about`";
$data_thought = mysqli_query($conn,$sql_select_thought);

?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage About Us (Story and Mission)</h1>
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
                <h3 class="card-title">Manage About Us</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Story Detail</th>
                    <th>Story Image</th>
                    <th rowspan="3">Edit Our Story</th>
                  </tr>
                  </thead>
                  
                  <?php while ($row = mysqli_fetch_assoc($data_story)) { ?>

                   <tr>
                    <td><?php echo $row['story_detail']; ?></td>
                    <td align="center">
                         <div style="width: 200px; height: 150px;"><img src="image/<?php echo $row['story_image']; ?>" style="height: 100%; width: 100%; object-fit: cover;"></td></div>
                    </td>
                    <td valign="center"><a href="edit-story.php?e_id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a></td>
                  </tr>

                  <?php } ?>
                </table>

                <br>

                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Mission Detail</th>
                    <th>Mission Image</th>
                    <th rowspan="3">Edit Our Mission</th>
                  </tr>
                  </thead>
                  
                  <?php while ($row = mysqli_fetch_assoc($data_mission)) { ?>

                   <tr>
                    <td><?php echo $row['mission_detail']; ?></td>
                    <td align="center">
                         <div style="width: 200px; height: 150px;"><img src="image/<?php echo $row['mission_image']; ?>" style="height: 100%; width: 100%; object-fit: cover;"></td></div>
                    </td>
                    <td valign="center"><a href="edit-mission.php?e_id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a></td>
                  </tr>

                  <?php } ?>
                </table>

                <br>

                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Best Thought</th>
                    <th>Thought by Name</th>
                    <th rowspan="3">Edit Datas</th>
                  </tr>
                  </thead>
                  
                  <?php while ($row = mysqli_fetch_assoc($data_thought)) { ?>

                   <tr>
                    <td>"<?php echo $row['best_thought']; ?>"</td>
                    <td>- <?php echo $row['thought_by']; ?></td>
                    <td valign="center"><a href="edit-thought.php?e_id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a></td>
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
