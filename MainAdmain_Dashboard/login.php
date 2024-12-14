<?php
include "./inc/connection.php";
include "./inc/incFun.php";
include "./inc/fun_login.php";

$sqli="SELECT * FROM `header`";
$query=mysqli_query($conn,$sqli);
$row=mysqli_fetch_assoc($query);
?>
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../Upload_main_admin/<?php echo $row['dash_logo'] ?>">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    <?php echo $row['dash_name']; ?>
  </title>  
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="./assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="./assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="bg-success">
  <div class="wrapper">
    <div class="container contect-login">
      <div class="card w-75">
        <div class="card-body p-5">
          <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xl-6">
              <div class="left-login d-flex flex-column align-items-center justify-content-center">
                <div class="logo">
                  <img src="../Upload_main_admin/<?php echo $row['img_logo'] ?>" class="w-20" alt="img-logo">
                </div>
                <div class="title mt-4">
                  <h3>
                    Slogin
                  </h3>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xl-6">
              <div class="title text-center mb-2">
                <h3 class="mb-2">Login</h3>
                <div class="text-danger"><?php echo $errors['log_Incorrect'] ?></div>
              </div>
              <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data" class="form">
                <div class="form-group">
                  <label for="Username" class="text-dark">Username :</label>
                  <input type="text" class="form-control" name="username_admin" value="<?php echo htmlspecialchars($username_admin); ?>" id="Username" placeholder="Enter Username">
                  <div class="text-danger mt-1"><?php echo $errors['username_admin'] ?></div>
                </div>
                <div class="form-group mt-3">
                  <label for="Password" class="text-dark">Password :</label>
                  <input type="password" class="form-control" name="Password_admin" value="<?php echo htmlspecialchars($Password_admin); ?>" id="Password" placeholder="Enter Password">
                  <div class="text-danger mt-1"><?php echo $errors['Password_admin'] ?></div>
                </div>
                <div class="form-group text-center mt-3">
                  <button name="login" class="btn btn-success">Login</button>
                </div>
              </form>
            </div>
            <small class="text-left font-weight-bold mt-1 m-0 p-0">Main Admin</small>
        </div>
        </div>
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="./assets/js/core/jquery.min.js"></script>
  <script src="./assets/js/core/popper.min.js"></script>
  <script src="./assets/js/core/bootstrap.min.js"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!--  Notifications Plugin    -->
  <script src="./assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="./assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script>
</body>

</html>
