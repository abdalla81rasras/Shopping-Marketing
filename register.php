<?php
include "./includes/connection_1.php";
include "./includes/connection_2.php";

include "./includes/func-register.php";

include "./includes/header.php";
?>
<!-- breadcrumb-section start -->
<nav class="breadcrumb-section theme1 breadcrumb-bg1">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="breadcrumb-title text-center my-20">
            <h2 class="title text-dark text-capitalize"><?php echo $language["Register"] ?></h2>
        </div>
      </div>
      <div class="col-12">
        <ol
          class="breadcrumb bg-transparent m-0 p-0 align-items-center justify-content-center"
        >
            <li class="breadcrumb-item"><a href="index.php?lang=<?php echo $lang ?>"><?php echo $language["Home"] ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $language["Register"] ?></li>
        </ol>
      </div>
    </div>
  </div>
</nav>
<!-- breadcrumb-section end -->

<!-- breadcrumb-section end -->
<!-- product tab start -->
<div class="register pt-80 pb-80">
    <div class="container grid-wraper">
        <div class="row">
            <div class="col-12">
                <?php
                    if(isset($_SESSION['er_reg'])){                    
                ?>
                    <div class='alert alert-danger' role='alert'>
                        <?php echo $language[$_SESSION['er_reg']] ?> !
                    </div>
                <?php } ?>
                <h3 class="title text-capitalize mb-30 pb-25"><?php echo $language["Create An Account"] ?></h3>
                <div class="log-in-form">
                    <form action="" method="POST" class="personal-information">
                        <div class="order-asguest theme1 mb-3">
                            <span><?php echo $language["Already have an account?"] ?></span>
                            <a class="text-muted hover-color" href="login.php?lang=<?php echo $lang ?>"><?php echo $language["Log in instead"] ?>!</a>
                        </div>
                        <div class="form-group row">
                            <label for="firstname" class="col-md-3 col-form-label"><?php echo $language["First Name"] ?></label>
                            <div class="col-md-6">
                                <input type="text" name="first_name" value="<?php echo htmlspecialchars($first_name); ?>" id="firstname" class="form-control">
                                <div class="text-danger mt-1"><?php echo $language[$errors['first_name']]??"" ?></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lastname"  class="col-md-3 col-form-label"><?php echo $language["Last Name"] ?></label>
                            <div class="col-md-6">
                                <input type="text" name="last_name" value="<?php echo htmlspecialchars($last_name); ?>" id="lastname" class="form-control">
                                <div class="text-danger mt-1"><?php echo $language[$errors['last_name']]??"" ?></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="username" class="col-md-3 col-form-label"><?php echo $language["Username"] ?></label>
                            <div class="col-md-6">
                                <input type="text" name="user_name" value="<?php echo htmlspecialchars($user_name); ?>" id="username" class="form-control">
                                <div class="text-danger mt-1"><?php echo $language[$errors['user_name']]??"" ?></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label"><?php echo $language["Email"] ?></label>
                            <div class="col-md-6">
                                <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>" id="email" class="form-control">
                                <div class="text-danger mt-1"><?php echo $language[$errors['email']]??"" ?></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phonenumber" class="col-md-3 col-form-label"><?php echo $language["Phone Number"] ?></label>
                            <div class="col-md-6">
                                <input type="text" name="phone_number" value="<?php echo htmlspecialchars($phone_number); ?>" id="phonenumber" class="form-control">
                                <div class="text-danger mt-1"><?php echo $language[$errors['phone_number']]??"" ?></div>
                            </div>
                        </div>
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
                        <div class="form-group row">
                            <label for="phonenumber" class="col-md-3 col-form-label"><?php echo $language["Address"] ?></label>
                            <div class="col-md-6">
                                <input type="text" name="address" value="<?php echo htmlspecialchars($address); ?>" id="phonenumber" class="form-control">
                                <div class="text-danger mt-1"><?php echo $language[$errors['address']]??"" ?></div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <div class="col-12">
                                <div class="sign-btn text-center">
                                    <button name="sgin_up" class="btn theme-btn--dark1 btn--md"><?php echo $language["sign-up"] ?></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- product tab end -->

<?php
include "./includes/footer.php";
?>