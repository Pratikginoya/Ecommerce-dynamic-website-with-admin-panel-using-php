<?php include_once 'connection.php'; 


/* we got this only after POST-Sign In, Else is return to Login page */
if (isset($_SESSION['login_id']))
{
      header('location:dashboard.php');
}


/* Login process run if above session is not active*/
if (isset($_POST['signin']))
{
    
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql_select = "select * from `login` where `email`='$email' and `password`='$password'";
    $data = mysqli_query($conn,$sql_select);

    $data_count = mysqli_num_rows($data);

    if($data_count > 0)
    {
        $row = mysqli_fetch_assoc($data);

        $_SESSION['login_id'] = $row['id'];

        header('location:dashboard.php');
    }
    else
    {
        $sql_select = "select * from `login`";
        $data = mysqli_query($conn,$sql_select);

        $row = mysqli_fetch_assoc($data);

        if($row == null)
        {
            echo "There is no any data has been registered... Kindly register now first.... <br><br><br>";
        }
        elseif($row['email'] != $email && $row['password'] != $password)
        {
            echo "Entered Email and Password are incorrect... Please enter correct details in both... <br><br><br>";
        }
        elseif($row['email'] != $email)
        {
            echo "Entered Email is incorrect... Please enter correct email... <br><br><br>";
        }
        else
        {
            echo "Entered Password is incorrect... Please enter correct password... <br><br><br>";
        }

    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index.php"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="index.php" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <button type="submit" class="btn btn-primary btn-block" name="signin">Sign In</button>
          </div>
          <div class="col-6">
            <div class="icheck-primary">
              <label for="remember">
                <a href="forgot.php" style="color: black; font-size: 14px;">Forgot Password ?</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<?php include_once 'scripts.php'; ?>