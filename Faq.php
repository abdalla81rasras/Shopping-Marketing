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
          <h2 class="title text-dark text-capitalize"><?php echo $language["Faq"] ?></h2>
        </div>
      </div>
      <div class="col-12">
        <ol
          class="breadcrumb bg-transparent m-0 p-0 align-items-center justify-content-center"
        >
          <li class="breadcrumb-item"><a href="index.php?lang=<?php echo $lang ?>"><?php echo $language["Home"] ?></a></li>
          <li class="breadcrumb-item active" aria-current="page">
            <?php echo $language["Faq"] ?>
          </li>
        </ol>
      </div>
    </div>
  </div>
</nav>
<!-- breadcrumb-section end -->

<?php  
    $select_faq="SELECT * FROM `footer`";
    $query_faq=mysqli_query($conn_main_admin , $select_faq);
    if($row=mysqli_fetch_assoc($query_faq)):
?>
<section class="pb-40">
    <div class="container  grid-wraper">
        <div class="row">
            <div class="col-lg-12">
                <div id="accordion">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <p class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"
                                    aria-expanded="true" aria-controls="collapseOne">
                                    <?php echo $language[$row['Q1']]??""; ?>
                                </button>
                            </p>
                        </div>
                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                <p><?php echo $language[$row['A1']]??""; ?>.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTow">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseTow"
                                    aria-expanded="false" aria-controls="collapseTow">
                                    <?php echo $language[$row['Q2']]??""; ?>
                                </button>
                            </h5>
                        </div>
                        <div id="collapseTow" class="collapse" aria-labelledby="headingTow" data-parent="#accordion">
                            <div class="card-body">
                                <p><?php echo $language[$row['A2']]??""; ?>.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <p class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseThree"
                                    aria-expanded="false" aria-controls="collapseThree">
                                    <?php echo $language[$row['Q3']]??""; ?>
                                </button>
                            </p>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                            <div class="card-body">
                                <p><?php echo $language[$row['A4']]??""; ?>.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingFour">
                            <p class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseFour"
                                    aria-expanded="false" aria-controls="collapseFour">
                                    <?php echo $language[$row['Q4']]??""; ?>
                                </button>
                            </p>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                            <div class="card-body">
                                <div class="p-3">
                                    <video src="./Upload_main_admin/<?php echo $row['vid_A']; ?>" class="w-50" controls></video>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<?php
include "./includes/footer.php";
?>