<?php 
include "./incl/connection.php";
include "./incl/incFun.php";
include "./incl/head_forg_reset.php";
?>
            <div class="d-none" hidden>
              <?php 
                include "incl/forget_password_process.php";
              ?>
            </div>
            <div class="title text-center mb-3">
              <h3 class="mb-2"><?php echo $language['Forget Password'] ?></h3>
            </div>
            <form action="" method="POST">
              <div class="form-group">
                <p class="text-dark label-p"><?php echo $language['Email'] ?> :</p>
                <input type="email" class="form-control" name="email_store_info" value="<?php echo htmlspecialchars($email_store_info) ?>" id="Email" placeholder="<?php echo $language['plemail'] ?>">
                <div class="text-danger mb-0 mt-1"><?php echo $language[$errors['email_store_info']]??"" ?></div>
              </div>
              <div class="form-group text-center mt-2">
                <button class="btn btn-success" name="reset-request"><?php echo $language['Send'] ?></button>
              </div>
            </form>
            <small class="text-left font-weight-bold m-0 p-0"><?php echo $language['Store Admin'] ?></small>
          </div>
        </div>
      </div>
    </div>
  <?php include "./incl/forg_reset_footer.php"; ?>