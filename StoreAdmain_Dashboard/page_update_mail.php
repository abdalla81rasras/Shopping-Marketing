<?php
include "./incl/connection.php";
include "./incl/incFun.php";
?>
          <?php include "./incl/head_forg_reset.php"; ?>
            <div class="title text-center mb-3">
              <h3 class="mb-2"><?php echo $language['Reset Password'] ?></h3>
            </div>
            <div class='alert alert-info' role='alert'>
              <?php echo $language['Has been successfully update, click her'] ?> <a href='login.php?lang=<?php echo $lang ?>'> <i class='fa fa-heart text-white'></i> </a> <?php echo $language['to go into login Page'] ?>.
            </div>
            <small class="font-weight-bold m-0 p-0"><?php echo $language['Store Admin'] ?></small>
          </div>
        </div>
      </div>
    </div>
<?php include "./incl/forg_reset_footer.php"; ?>