<?php 
include "./incl/connection.php";
include "./incl/head_sgin_reg.php";
include "./incl/function_login.php"; ?>
<body class="bg-success">
    <div class="wrapper">
        <div class="container contect-login">
            <div class="card w-75">
                <div class="card-body p-5">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xl-6">
                            <div class="left-login d-flex flex-column align-items-center justify-content-center">
                                <div class="logo">
                                    <img src="./assets/img/logo-dark.jpg" class="w-20" alt="img-logo">
                                </div>
                                <div class="title mt-3">
                                    <h3>
                                        <p>
                                            <?php echo $language['Slogin'] ?>
                                        </p>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xl-6">
                            <div class="title text-center mb-3">
                                <h3 class="mb-2"><?php echo $language['Login'] ?></h3>
                                <div class="text-danger mb-0"><?php echo $language[$errors['Incorrect']]??"" ?></div>
                            </div>
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <p class="text-dark label-p"><?php echo $language['Email'] ?> :</p>
                                    <input type="email" class="form-control" name="email_store_info" value="<?php echo htmlspecialchars($email_store_info) ?>" id="Email" placeholder="<?php echo $language['plemail'] ?>">
                                    <div class="text-danger mb-0 mt-1"><?php echo $language[$errors['email_store_info']]??"" ?></div>
                                </div>
                                <div class="form-group mt-3">
                                    <p class="text-dark label-p"><?php echo $language['Password'] ?> :</p>
                                    <input type="password" class="form-control" name="pass_store_info" value="<?php echo htmlspecialchars($pass_store_info) ?>" id="Password" placeholder="<?php echo $language['plpass'] ?>">
                                    <div class="text-danger mb-0 mt-1"><?php echo $language[$errors['pass_store_info']]??"" ?></div>
                                </div>
                                <div class="form-group text-center mt-3">
                                    <a href="forget-password.php?lang=<?php echo $lang ?>"><?php echo $language['Forget Password'] ?></a>
                                </div>
                                <div class="form-group text-center mt-2">
                                    <button class="btn btn-success" name="login"><?php echo $language['Login'] ?></button>
                                </div>
                                <div class="form-group text-center mt-2">
                                    <a href="./signup.php?lang=<?php echo $lang ?>"><?php echo $language['Signup'] ?></a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-md-12 col-xl-12">
                            <div class="d-flex justify-content-between">
                                <small class="text-left font-weight-bold m-0 p-0"><?php echo $language['Store Admin'] ?></small>
                                <ul class="d-flex mb-0 pb-0">
                                    <li><p class="text-dark label-p"><?php echo $language['Languages'] ?> :</label></li>
                                    <li class="mx-3"><a href="?lang=en"><?php echo $language['en'] ?></a></li>
                                    <li><a href="?lang=ar"><?php echo $language['ar'] ?></a></li> 
                                </ul>
                            </div>
                        </div>
                    </div>    
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