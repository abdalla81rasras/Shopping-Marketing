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
          <h2 class="title text-dark text-capitalize"><?php echo $language['Stores'] ?></h2>
        </div>
      </div>
      <div class="col-12">
        <ol
          class="breadcrumb bg-transparent m-0 p-0 align-items-center justify-content-center"
        >
          <li class="breadcrumb-item"><a href="index.php?lang=<?php echo $lang ?>"><?php echo $language['Home'] ?></a></li>
          <li class="breadcrumb-item active" aria-current="page">
            <?php echo $language['Stores'] ?>
          </li>
        </ol>
      </div>
    </div>
  </div>
</nav>
<!-- breadcrumb-section end -->

<div class="product-tab pb-70">
    <div class="container grid-wraper">
        <div class="tab-content">
            <!-- first tab-pane -->
            <div class="tab-pane fade show active">
                <div class="row grid-view theme1">
                    <?php 
                        $select_stores="SELECT * FROM `store_information`";
                        $query_stores=mysqli_query($conn_store_admin , $select_stores);
                        while($row_stores=mysqli_fetch_assoc($query_stores)):
                    ?>
                        <div class="col-sm-6 col-md-4 mb-30">
                            <div class="card product-card">
                                <div class="card-body p-0">
                                    <div class="product-thumbnail position-relative">
                                        <img class="first-img" src="Upload/<?php echo $row_stores['img_store_info'] ?>" alt="thumbnail">
                                    </div>
                                    <div class="product-desc">
                                        <h2 class="title"><?php echo $row_stores['StoreName_info'] ?></h2>
                                        <?php 
                                            $NameStore = $row_stores['StoreName_info'];
                                            $select_p_s="SELECT `store_name_prudoct` FROM `prudocts` WHERE `store_name_prudoct`='$NameStore'";
                                            $query_p_s=mysqli_query($conn_store_admin , $select_p_s);
                                            $num_rows_p_s=mysqli_num_rows($query_p_s);
                                        ?>
                                        <h2 class="title"><?php echo $language['Total Products'] ?> : <?php echo $num_rows_p_s ?></h2>
                                    </div>
                                </div> 
                            </div>
                            <!-- product-list End -->
                        </div>
                    <?php endwhile;?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include "./includes/footer.php";
?>