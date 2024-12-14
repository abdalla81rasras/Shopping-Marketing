<?php
include "./incl/connection.php";
include "./incl/incFun.php";
?>
          <?php include "./incl/head_forg_reset.php"; ?>
            <div class="title text-center mb-3">
              <h3 class="mb-2"><?php echo $language['Forget Password'] ?></h3>
            </div>
            <div class='alert alert-danger' role='alert'>
                <h4 class='alert-heading'><?php echo $language['Failed'] ?> :(</h4>
                <hr>
                <p><?php echo $language['Sorry, it has not been sent to your email'] ?>.
                    <br><br><?php echo $language['click'] ?> <a class="text-dark" href="./forget-password.php?lang=<?php echo $lang ?>"><?php echo $language['her'] ?></a> <?php echo $language['to back into forget page'] ?></p>
            </div>
            <small class="font-weight-bold m-0 p-0"><?php echo $language['Store Admin'] ?></small> 
          </div>
        </div>
      </div>
    </div>
<?php include "./incl/forg_reset_footer.php"; ?>