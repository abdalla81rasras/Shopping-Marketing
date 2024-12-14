<?php
include "incl/connection.php";
include "incl/incFun.php"; 
include "incl/head_forg_reset.php";
?>
            <?php
              include "incl/update_password.php";
            ?>
            <div class="title text-center mb-3">
              <h3 class="mb-2"><?php echo $language['Reset Password'] ?></h3>
            </div>
            <?php
              if ($num_rows == 1) {
            ?>
              <form action="" method="POST">
                <div class="form-group">
                  <p class="text-dark label-p"><?php echo $language['Password New'] ?> :</label>
                  <input type="password" class="form-control" name="pass_store_info" value="<?php echo htmlspecialchars($pass_store_info) ?>" placeholder="<?php echo $language['plpass'] ?>">
                  <div class="text-danger mb-0"><?php echo $language[$errors['pass_store_info']]??"" ?></div>
                </div>
                <div class="form-group mb-2">
                  <p class="text-dark label-p"><?php echo $language['Confirm Password New'] ?> :</label>
                  <input type="password" class="form-control" name="cpss_store_info" value="<?php echo htmlspecialchars($cpss_store_info) ?>" placeholder="<?php echo $language['plConfirm Password'] ?>">
                  <div class="text-danger mb-0"><?php echo $language[$errors['cpss_store_info']]??"" ?></div>
                </div>
                <input type='hidden' name='token' value='<?php echo htmlspecialchars($token); ?>'>
                <input type='hidden' name='email' value='<?php echo htmlspecialchars($email_token); ?>'>
                <div class="form-group text-center mt-2">
                  <button class="btn btn-success" name="reset-pass"><?php echo $language['Reset Password'] ?></button>
                </div>
              </form>
            <?php
              } else {
            ?>
              <div class='alert alert-danger' role='alert'>
                <?php echo $language['Invalid token'] ?>  !!
              </div>
            <?php      
              }
            ?>
            <small class="font-weight-bold m-0 p-0"><?php echo $language['Store Admin'] ?></small>
          </div>
        </div>
      </div>
    </div>
  <?php include "./incl/forg_reset_footer.php"; ?>