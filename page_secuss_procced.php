<?php
session_start();
if(!isset($_SESSION['id_users'])){
    header("Location:login.php");
}

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
          <h2 class="title text-dark text-capitalize"><?php echo $language["Checkout"] ?></h2>
        </div>
      </div>
      <div class="col-12">
        <ol class="breadcrumb bg-transparent m-0 p-0 align-items-center justify-content-center">
          <li class="breadcrumb-item"><a href="index.php?lang=<?php echo $lang ?>"><?php echo $language["Home"] ?></a></li>
          <li class="breadcrumb-item active" aria-current="page"><?php echo $language["Checkout"] ?></li>
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
                <h3 class="title text-capitalize pb-30"><?php echo $language["Procced Checkout"] ?></h3>
                <div class='alert alert-success' role='alert'>
                  <?php echo $language["checkout procced successfully, thank you"] ?>  :) 
                  <br><br><a href="index.php?lang=<?php echo $lang ?>" class="text-info"><--</a>  <span class="mx-2"><?php echo $language["back to home page"] ?></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- product tab end -->

<?php
include "./includes/footer.php";
?>