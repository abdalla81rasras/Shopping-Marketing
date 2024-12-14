<?php
session_start();
include "./includes/connection_1.php";
include "./includes/connection_2.php";

include "./includes/func-login.php";

include "./includes/header.php";         
?>

<!-- breadcrumb-section start -->
<nav class="breadcrumb-section theme1 breadcrumb-bg1">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="breadcrumb-title text-center my-20">
          <h2 class="title text-dark text-capitalize"><?php echo $language["login"] ?></h2>
        </div>
      </div>
      <div class="col-12">
        <ol
          class="breadcrumb bg-transparent m-0 p-0 align-items-center justify-content-center"
        >
          <li class="breadcrumb-item"><a href="index.php?lang=<?php echo $lang ?>"><?php echo $language["Home"] ?></a></li>
          <li class="breadcrumb-item active" aria-current="page">
            <?php echo $language["login"] ?>
          </li>
        </ol>
      </div>
    </div>
  </div>
</nav>
<!-- breadcrumb-section end -->

<!-- product tab start -->
<div class="my-account pb-70">
    <div class="container grid-wraper">
        <div class="row">
            <?php if(isset($_GET['reg'])){ ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo $language['Register Success'] ?>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
              </div>                             
            <?php } ?>
            
            <?php if(isset($_SESSION['er_log'])){ ?>
              <div class='alert alert-danger' role='alert'>
                  <?php echo $language[$_SESSION['er_log']] ?>
              </div>                 
            <?php } ?>
            <div class="col-12">
                <h3 class="title text-capitalize pb-30"> <?php echo $language["Log In To Your Account"] ?></h3>
                <form class="log-in-form" action="" method="POST">
                  <div class="form-group row">
                      <label for="username" class="col-md-3 col-form-label"><?php echo $language["Username"] ?></label>
                      <div class="col-md-6">
                        <input type="text" name="user_name" value="<?php echo htmlspecialchars($user_name); ?>" class="form-control" id="username">
                        <div class="text-danger mt-1"><?php echo $language[$errors['user_name']]??"" ?></div>
                      </div>
                  </div>
                  <div class="form-group row">
                    <label for="Password" class="col-md-3 col-form-label"><?php echo $language["Password"] ?></label>
                    <div class="col-md-6">
                        <div class="input-group mb-2">
                            <input type="password" name="password" value="<?php echo htmlspecialchars($password); ?>" class="form-control InputPassword" id="Password">
                            <div class="input-group-prepend">
                                <input type="hidden" class="s_h" value="<?php echo $lang ?>">
                                <i class="showpassword fa fa-eye-slash" style="font-size: 16px; margin:10px; color:black;"></i>
                            </div>
                        </div>
                        <div class="text-danger mt-1"><?php echo $language[$errors['password']]??"" ?></div>
                    </div>
                  </div>
                  <div class="form-group row pb-3 text-center">
                      <div class="col-12">
                          <div class="login-form-links">
                              <a href="./forget_password.php?lang=<?php echo $lang ?>" class="for-get"><?php echo $language["Forgot your password?"] ?></a>
                              <div class="sign-btn">
                                  <button name="login" class="btn theme-btn--dark1 btn--md"><?php echo $language["Sign in"] ?></button>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="form-group row text-center mb-0">
                      <div class="col-12">
                          <div class="border-top">
                              <a href="register.php?lang=<?php echo $lang ?>" class="no-account"><?php echo $language["No account? Create one here"] ?></a>
                          </div>
                      </div>
                  </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- product tab end -->

<?php
include "./includes/footer.php";
?>