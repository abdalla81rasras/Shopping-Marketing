<?php
session_start();
if(!isset($_SESSION['id_users']) && !isset($_SESSION['TRue'])){
    
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
          <h2 class="title text-dark text-capitalize"><?php echo $language["About Us"] ?></h2>
        </div>
      </div>
      <div class="col-12">
        <ol
          class="breadcrumb bg-transparent m-0 p-0 align-items-center justify-content-center"
        >
          <li class="breadcrumb-item"><a href="index.php?lang=<?php echo $lang ?>"><?php echo $language["Home"] ?></a></li>
          <li class="breadcrumb-item active" aria-current="page">
            <?php echo $language["About Us"] ?>
          </li>
        </ol>
      </div>
    </div>
  </div>
</nav>
<!-- breadcrumb-section end -->

<!-- product tab start -->
<?php
  $select="SELECT * FROM `footer`";
  $query=mysqli_query($conn_main_admin , $select);
  if($row=mysqli_fetch_assoc($query)):
?>
<section class="about-section pb-40">
    <div class="container grid-wraper">
        <div class="row">
            <div class="col-lg-6 mb-30">
                <div class="about-content">
                    <h2 class="title mb-20"><?php echo $language[$row['title_security1']]??""; ?></h2>
                    <p class="mb-20">
                      <?php echo $language[$row['desc_security1']]??""; ?>.
                    </p>
                </div>
            </div>
            <div class="col-lg-6 mb-30">
                <div class="about-left-image mb-30">
                    <img src="Upload_main_admin/<?php echo $row['img_security']; ?>" alt="img" class="img-responsive">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mb-30">
                <div class="about-info">
                    <h4 class="title mb-20"><?php echo $language[$row['title_security2']]??""; ?></h4>
                    <p>
                      <?php echo $language[$row['desc_security2']]??""; ?>.
                    </p>
                </div>
            </div>
            <div class="col-md-4 mb-30">
                <div class="about-info">
                    <h4 class="title mb-20"><?php echo $language[$row['title_security3']]??""; ?></h4>
                    <p>
                      <?php echo $language[$row['desc_security3']]??""; ?>.
                    </p>
                </div>
            </div>
            <div class="col-md-4 mb-30">
                <div class="about-info">
                    <h4 class="title mb-20"><?php echo $language[$row['title_security4']]??""; ?></h4>
                    <p>
                      <?php echo $language[$row['desc_security4']]??""; ?>.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- product tab end -->

<?php
include "./includes/footer.php";
?>