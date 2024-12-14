<?php
session_start();
include "./includes/connection_1.php";
include "./includes/connection_2.php";
include "./includes/header.php";       

include "./includes/reset_password_process.php";
?>

<!-- breadcrumb-section start -->
<nav class="breadcrumb-section theme1 breadcrumb-bg1">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="breadcrumb-title text-center my-20">
          <h2 class="title text-dark text-capitalize"><?php echo $language["reset password"] ?></h2>
        </div>
      </div>
      <div class="col-12">
        <ol class="breadcrumb bg-transparent m-0 p-0 align-items-center justify-content-center">
          <li class="breadcrumb-item"><a href="index.php?lang=<?php echo $lang ?>"><?php echo $language["Home"] ?></a></li>
          <li class="breadcrumb-item active" aria-current="page"><?php echo $language["reset password"] ?></li>
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
            <div class="col-12">
                <h3 class="title text-capitalize pb-30"><?php echo $language["reset password account"] ?></h3>
                <?php
                    if ($num_rows == 1) {
                ?>
                    <form class="log-in-form" action="" method="POST">
                        <div class="form-group row">
                            <label for="Password" class="col-md-3 col-form-label"><?php echo $language["Password"] ?></label>
                            <div class="col-md-6">
                                <div class="input-group mb-2">
                                    <input type="password" name="password" value="<?php echo htmlspecialchars($password); ?>" class="form-control InputPassword" id="Password">
                                    <i class="showpassword fa fa-eye-slash" style="font-size: 16px; margin:10px; color:black;"></i>
                                </div>
                                <div class="text-danger mt-1"><?php echo $language[$errors['password']]??"" ?></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="CPassword" class="col-md-3 col-form-label"><?php echo $language["Password Confirm"] ?></label>
                            <div class="col-md-6">
                                <div class="input-group mb-2">
                                    <input type="password" name="cpassword" value="<?php echo htmlspecialchars($cpassword); ?>" class="form-control InputCPassword" id="CPassword">
                                    <i class="showcpassword fa fa-eye-slash" style="font-size: 16px; margin:10px; color:black;"></i>
                                </div>
                                <div class="text-danger mt-1"><?php echo $language[$errors['cpassword']]??"" ?></div>
                            </div>
                        </div>
                        <input type='hidden' name='token' value='<?php echo htmlspecialchars($token); ?>'>
                        <input type='hidden' name='email' value='<?php echo htmlspecialchars($email_token); ?>'>
                        <div class="form-group row pb-3 text-center">
                            <div class="col-md-12">
                                <div class="login-form-links">
                                    <div class="sign-btn">
                                        <button type="submit" name="reset_pass" class="btn theme-btn--dark1 btn--md"><?php echo $language["Reset"] ?></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                <?php
                    } else {
                ?>
                    <div class='alert alert-danger' role='alert'>
                        <?php echo $language["Invalid token"] ?> !!
                    </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
</div>
<!-- product tab end -->

<?php
include "./includes/footer.php";
?>