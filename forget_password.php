<?php
session_start();

include "./includes/connection_1.php";
include "./includes/connection_2.php";
include "./includes/header.php";         
?>

<!-- breadcrumb-section start -->
<nav class="breadcrumb-section theme1 breadcrumb-bg1">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="breadcrumb-title text-center my-20">
          <h2 class="title text-dark text-capitalize"><?php echo $language["Forget Password"] ?></h2>
        </div>
      </div>
      <div class="col-12">
        <ol
          class="breadcrumb bg-transparent m-0 p-0 align-items-center justify-content-center"
        >
          <li class="breadcrumb-item"><a href="index.php?lang=<?php echo $lang ?>"><?php echo $language["Home"] ?></a></li>
          <li class="breadcrumb-item active" aria-current="page"><?php echo $language["Forget Password"] ?></li>
        </ol>
      </div>
    </div>
  </div>
</nav>
<!-- breadcrumb-section end -->

<!-- product tab start -->
<div class="d-none" hidden>
  <?php include "includes/forget_password_process.php"; ?>
</div>
<div class="my-account pb-70">
    <div class="container grid-wraper">
        <div class="row">
            <div class="col-12">
                <h3 class="title text-capitalize pb-30"><?php echo $language["Add Account"] ?></h3>
                <form class="log-in-form" action="" method="POST">
                  <div class="form-group row">
                      <label for="email" class="col-md-3 col-form-label"><?php echo $language["Email"] ?></label>
                      <div class="col-md-6">
                          <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>" class="form-control" id="email">
                          <div class="text-danger mt-1"><?php echo $language[$errors['email']]??"" ?></div>
                      </div>
                  </div>
                  <div class="form-group row pb-3 text-center">
                      <div class="col-12">
                          <div class="login-form-links">
                              <div class="sign-btn">
                                  <button type="submit" name="send_mail" class="btn theme-btn--dark1 btn--md"><?php echo $language["Send"] ?></button>
                              </div>
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