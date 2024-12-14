<?php
include "./incl/connection.php";
include "./incl/incFun.php";
?>

          <?php include "./incl/head_forg_reset.php"; ?>
            <div class="title text-center mb-3">
              <h3 class="mb-2"><?php echo $language['Forget Password'] ?></h3>
            </div>
            <div class='alert alert-success' role='alert'>
              <h4 class='alert-heading'><?php echo $language['Well Done'] ?>  :)</h4>
              <hr>
              <p><?php echo $language['Message has been sent to your email, check of email'] ?>.</p>
            </div>
            <small class="font-weight-bold m-0 p-0"><?php echo $language['Store Admin'] ?></small>  
          </div>
        </div>
      </div>
    </div>
<?php include "./incl/forg_reset_footer.php"; ?>