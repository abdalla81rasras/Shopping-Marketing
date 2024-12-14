<?php
    session_start();
    if(!isset($_SESSION['id_users']) && !isset($_SESSION['TRue'])){
        
    }

    include "./includes/connection_1.php";
    include "./includes/connection_2.php";
    include "./includes/func_single.php";

    include "./includes/func_comper.php";
    include "./includes/func_favorite.php";
    include "./includes/func_cart.php";

    include "./includes/header.php";

?>

<!-- main slider start -->
<section class="bg-light position-relative">
    <div class="main-slider dots-style theme1">
        <?php 
            $select_slider="SELECT * FROM `slider`";
            $query_slider=mysqli_query($conn_main_admin , $select_slider);
            while($row_slider=mysqli_fetch_assoc($query_slider)):
        ?>
        <div class="slider-item bg-img" style="background-image: url('Upload_main_admin/<?php echo $row_slider['img_slider_bar'] ?>');">
            <div class="container">
                <div class="row align-items-center slider-height">
                    <div class="col-12">
                        <div class="slider-content">
                            <p class="text text-dark text-uppercase animated mb-25" data-animation-in="fadeInDown">
                                <?php echo $language[$row_slider['title_slidebar']]??"" ?></p>
                            <h2 class="sub-title text-dark animated" data-animation-in="fadeInRight" data-delay-in="2">
                                <?php echo $language[$row_slider['description_slide_bar']]??"" ?></h2>
                            <a href="<?php echo $row_slider['btn_slider'] ?>?lang=<?php echo $lang ?>" target="_blank"
                                class="btn theme--btn1 btn--lg text-uppercase  animated mt-45 mt-sm-25"
                                data-animation-in="zoomIn" data-delay-in="3"><?php echo $language['Shop now'] ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
        <!-- slider-item end -->
    </div>
    <!-- slick-progress -->
    <div class="slick-progress">
        <span></span>
    </div>
    <!-- slick-progress end-->
</section>
<!-- main slider end -->

<!-- common banner  start -->
<div class="common-banner pt-70 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-30">
                <div class="position-relative zoom-in overflow-hidden">
                <?php 
                    $select_under_1="SELECT * FROM `under_slider_one`";
                    $query_under_1=mysqli_query($conn_main_admin , $select_under_1);
                    while($row_under=mysqli_fetch_assoc($query_under_1)):
                ?>
                    <div class="banner-thumb">
                        <img src="Upload_main_admin/<?php echo $row_under['img_under_one']; ?>" alt="banner-thumb-naile">
                    </div>
                    <div class="banner-content">
                        <p class="text text-capitalize text-dark mb-10"><?php echo $language[$row_under['title_under_one_1']]??""; ?></p>
                        <h4 class="title text-capitalize text-dark"><?php echo $language[$row_under['title_under_one_2']]??""; ?> <?php echo $row_under['discount_under_one']; ?>% <?php echo $language['Off'] ?></h4>
                        <a class="view-link text-capitalize mt-20" href="<?php echo $language[$row_under['link_under_one']]??""; ?>?lang=<?php echo $lang ?>" target="_blank">
                            <?php echo $language['View collection'] ?>
                            <span class="ion-android-arrow-dropright-circle theme-color"></span>
                        </a>
                    </div>
                <?php endwhile ?>
                </div>
            </div>
            <div class="col-md-6 mb-30">
                <div class="position-relative zoom-in overflow-hidden">
                <?php 
                    $select_slider_tow="SELECT * FROM `under_slider_tow`";
                    $query_slider_tow=mysqli_query($conn_main_admin , $select_slider_tow);
                    while($row_slider_tow=mysqli_fetch_assoc($query_slider_tow)):
                ?>
                    <div class="banner-thumb">
                        <img src="./Upload_main_admin/<?php echo $row_slider_tow['img_under_tow']; ?>" alt="banner-thumb-naile">
                    </div>
                    <div class="banner-content">
                        <p class="text text-capitalize text-dark mb-10"><?php echo $language[$row_slider_tow['title_under_tow_1']]??""; ?></p>
                        <h4 class="title text-capitalize text-dark"><?php echo $language[$row_slider_tow['title_under_tow_2']]??""; ?> <?php echo $row_slider_tow['discount_under_tow']; ?>% <?php echo $language['Off'] ?>
                        </h4>
                        <a class="view-link text-capitalize mt-20" href="<?php echo $language[$row_slider_tow['link_under_tow']]??""; ?>?lang=<?php echo $lang ?>" target="_blank">
                        <?php echo $language['View collection'] ?>
                            <span class="ion-android-arrow-dropright-circle theme-color"></span></a>
                    </div>
                <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- common banner  end -->

<!-- product tab start -->
<section class="product-tab bg-white pt-40 pb-70">
    <div class="container">
        <div class="product-tab-nav mb-30">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="section-title text-center mb-30">
                        <h2 class="title text-dark text-capitalize mb-20"><?php echo $language["Best Sellers"] ?></h2>
                        <p class="text"><?php echo $language["Browse the collection of our new products"] ?>.</p>
                    </div>
                </div>
                <div class="col-12">
                    <nav class="product-tab-menu theme1">
                        <ul class="nav nav-pills justify-content-center" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" href="#pills-tabContent1"><?php echo $language["Hot Categories"] ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#pills-tabContent2"><?php echo $language["Top Seller"] ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#pills-tabContent3"><?php echo $language["Discount Products"] ?></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- product-tab-nav end -->
        <div class="row">
            <div class="col-12">
                <div class="tab-content" id="pills-tabContent1">
                    <!-- first tab-pane -->
                    <div class="tab-pane fade show active">
                        <div class="product-slider-init theme1 slick-nav">
                        <?php
                            $select_product_hot="SELECT *, COUNT(*) as `count` FROM prudocts GROUP BY `Products_Category` ORDER BY `count` DESC LIMIT 7";
                            $query_product_hot=mysqli_query($conn_store_admin,$select_product_hot);
                            while ($row_product_hot = mysqli_fetch_assoc($query_product_hot)) :              
                        ?>
                            
                            <div class="slider-item">
                                <div class="card product-card">
                                    <div class="card-body p-0">
                                        <div class="media flex-column">
                                            <div class="product-thumbnail w-100 position-relative">
                                                <?php
                                                    if($row_product_hot['discout_prudoct'] > 0):
                                                ?>
                                                    <span class="badge badge-success top-left">-<?php echo $row_product_hot['discout_prudoct'] ?>%</span>
                                                    <?php else: ?>
                                                        <?php 
                                                            $twoDaysAgo = date('Y-m-d', strtotime('-2 days'));
                                                            $sql = "SELECT * FROM prudocts WHERE date_prudoct >= '$twoDaysAgo' AND `id_name_prudoct`='".$row_product_hot['id_name_prudoct']."' "; 
                                                            $result = mysqli_query($conn_store_admin , $sql);
                                                            if(mysqli_num_rows($result) > 0){
                                                        ?>
                                                            <span class="badge badge-danger top-left"><?php echo $language["new"] ?></span>
                                                        <?php 
                                                            }else{

                                                            } 
                                                        ?>
                                                <?php endif; ?>
                                                <a class="d-block" href="single-product.php?lang=<?php echo $lang ?>&Id_prudoct=<?php echo $row_product_hot['id_name_prudoct'] ?>">
                                                    <img class="first-img" src="assets/img/product/2.jpg" alt="thumbnail">
                                                    <img class="second-img" src="assets/img/product/2.1.jpg" alt="thumbnail">
                                                </a>
                                                <!-- product links -->
                                                <form action="" method="POST">
                                                    <div class="product-links d-flex d-flex justify-content-between">
                                                        <?php 
                                                            if(!empty($_SESSION['id_users'])):
                                                        ?>
                                                            <input type="hidden" name="id_user" value="<?php echo $_SESSION['id_users'] ?>">
                                                        <?php endif; ?>
                                                        <input type="hidden" name="id_product" value="<?php echo $row_product_hot['id_name_prudoct'] ?>">
                                                        <input type="hidden" name="store_logo_pages" value="<?php echo $row_product_hot['store_logo_prudoct'] ?>">
                                                        <input type="hidden" name="name_store_pages" value="<?php echo $row_product_hot['store_name_prudoct'] ?>">
                                                        <input type="hidden" name="price_pages" value="<?php echo ($row_product_hot['Product_Price']-($row_product_hot['Product_Price']*$row_product_hot['discout_prudoct']/100)) ?>">
                                                        <input type="hidden" name="Description_pages" value="<?php echo $row_product_hot['Product_Short_Description'] ?>">
                                                        <input type="hidden" name="size_pages" value="<?php echo $row_product_hot['Products_Sizes'] ?>">
                                                        <input type="hidden" name="color_pages" value="<?php echo $row_product_hot['Product_Colors'] ?>">
                                                        <input type="hidden" name="name_product_pages_ar" value="<?php echo $row_product_hot['Products_Name_arabic'] ?>">
                                                        <input type="hidden" name="name_store_pages_ar" value="<?php echo $row_product_hot['store_name_prudoct_arbic'] ?>">
                                                        <input type="hidden" name="Description_pages_ar" value="<?php echo $row_product_hot['Product_Short_Description_arabic'] ?>">
                                                        <input type="hidden" name="name_product_pages" value="<?php echo $row_product_hot['Products_Name'] ?>">
                                                        
                                                        <button class="pro-btn" name="basket"><?php echo $language["Add to Basket"] ?></button>

                                                        <ul class="d-flex justify-content-center">
                                                            <li>
                                                                <button type="submit" name="compare">
                                                                    <a>
                                                                        <span class="ion-ios-shuffle-strong"
                                                                        data-toggle="tooltip" data-placement="bottom"
                                                                    title="<?php echo $language["Add to compare"] ?>">

                                                                        </span>
                                                                    </a>
                                                                </button>
                                                            </li>
                                                            <li>
                                                                <button type="submit" name="favorite">
                                                                    <a>
                                                                        <span data-toggle="tooltip" data-placement="bottom"
                                                                            title="<?php echo $language["add to favorite"] ?>"
                                                                            class="ion-android-favorite-outline"> </span>
                                                                    </a>
                                                                </button>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="media-body">
                                                <div class="product-desc">
                                                    <div class="star-rating">
                                                        <div class="rateyo" id="rating"
                                                            data-rateyo-rating="<?php  
                                                                                    if(empty($row_product_hot['avg_rates'])){
                                                                                        $row_product_hot['avg_rates'] = 0;
                                                                                        echo $row_product_hot['avg_rates'];
                                                                                    }else{
                                                                                        echo $row_product_hot['avg_rates'];
                                                                                    }
                                                                                    ?>
                                                                                "
                                                            data-rateyo-num-stars="5"
                                                            data-rateyo-score="">
                                                        </div>
                                                    </div>
                                                    <div class="align-items-center d-flex mt-2">
                                                        <img src="Upload/<?php echo $row_product_hot['store_logo_prudoct'] ?>" width="45px" height="45px" alt="img-logo">
                                                        <a href="./stores.php?lang=<?php echo $lang ?>" class="mx-3"><p><?php echo ($lang=="ar") ? $row_product_hot['store_name_prudoct_arbic'] : $row_product_hot['store_name_prudoct']; ?></p></a>
                                                    </div>
                                                    <h3 class="title my-10"><?php echo ($lang=="ar") ? $row_product_hot['Products_Name_arabic'] : $row_product_hot['Products_Name']; ?></h3>
                                                    <?php
                                                        if($row_product_hot['discout_prudoct'] > 0):
                                                    ?>
                                                    <h6 class="product-price">
                                                        <del class="del m"><?php echo $row_product_hot['Product_Price'] ?>JD</del>
                                                        <span class="onsale"><?php echo ($row_product_hot['Product_Price']-($row_product_hot['Product_Price']*$row_product_hot['discout_prudoct']/100)) ?>JD</span>
                                                    </h6>
                                                    <?php else: ?>
                                                        <h6 class="product-price"><span class="onsale"><?php echo $row_product_hot['Product_Price'] ?>JD</span></h6>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php 
                            endwhile; 
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-12">
                <div class="tab-content" id="pills-tabContent2">
                    <!-- first tab-pane -->
                    <div class="tab-pane fade show active">
                        <div class="product-slider-init theme1 slick-nav">
                        <?php
                            $select_product_bests="SELECT * FROM `prudocts` WHERE `num_buys` > 1 and `avg_rates` > 3.0 ORDER BY `avg_rates` DESC LIMIT 15";
                            $query_product_bests=mysqli_query($conn_store_admin,$select_product_bests);
                            while ($row_product_bests = mysqli_fetch_assoc($query_product_bests)) :    
                        ?>
                            
                            <div class="slider-item">
                                <div class="card product-card">
                                    <div class="card-body p-0">
                                        <div class="media flex-column">
                                            <div class="product-thumbnail w-100 position-relative">
                                                <?php
                                                    if($row_product_bests['discout_prudoct'] > 0):
                                                ?>
                                                    <span class="badge badge-success top-left">-<?php echo $row_product_bests['discout_prudoct'] ?>%</span>
                                                    <?php else: ?>
                                                        <?php 
                                                            $twoDaysAgo = date('Y-m-d', strtotime('-2 days'));
                                                            $sql = "SELECT * FROM prudocts WHERE date_prudoct >= '$twoDaysAgo' AND `id_name_prudoct`='".$row_product_bests['id_name_prudoct']."' "; 
                                                            $result = mysqli_query($conn_store_admin , $sql);
                                                            if(mysqli_num_rows($result) > 0){
                                                        ?>
                                                            <span class="badge badge-danger top-left"><?php echo $language["new"] ?></span>
                                                        <?php 
                                                            }else{

                                                            } 
                                                        ?>
                                                <?php endif; ?>
                                                <a class="d-block" href="single-product.php?lang=<?php echo $lang ?>&Id_prudoct=<?php echo $row_product_bests['id_name_prudoct'] ?>">
                                                    <img class="first-img" src="assets/img/product/2.jpg" alt="thumbnail">
                                                    <img class="second-img" src="assets/img/product/2.1.jpg" alt="thumbnail">
                                                </a>
                                                <!-- product links -->
                                                <form action="" method="POST">
                                                    <div class="product-links d-flex d-flex justify-content-between">
                                                        <?php 
                                                            if(!empty($_SESSION['id_users'])):
                                                        ?>
                                                            <input type="hidden" name="id_user" value="<?php echo $_SESSION['id_users'] ?>">
                                                        <?php endif; ?>
                                                        <input type="hidden" name="id_product" value="<?php echo $row_product_bests['id_name_prudoct'] ?>">
                                                        <input type="hidden" name="store_logo_pages" value="<?php echo $row_product_bests['store_logo_prudoct'] ?>">
                                                        <input type="hidden" name="name_store_pages" value="<?php echo $row_product_bests['store_name_prudoct'] ?>">
                                                        <input type="hidden" name="price_pages" value="<?php echo ($row_product_bests['Product_Price']-($row_product_bests['Product_Price']*$row_product_bests['discout_prudoct']/100)) ?>">
                                                        <input type="hidden" name="Description_pages" value="<?php echo $row_product_bests['Product_Short_Description'] ?>">
                                                        <input type="hidden" name="size_pages" value="<?php echo $row_product_bests['Products_Sizes'] ?>">
                                                        <input type="hidden" name="color_pages" value="<?php echo $row_product_bests['Product_Colors'] ?>">
                                                        <input type="hidden" name="name_product_pages_ar" value="<?php echo $row_product_bests['Products_Name_arabic']?>">
                                                        <input type="hidden" name="name_store_pages_ar" value="<?php echo  $row_product_bests['store_name_prudoct_arbic'] ?>">
                                                        <input type="hidden" name="Description_pages_ar" value="<?php echo $row_product_bests['Product_Short_Description_arabic'] ?>">
                                                        <input type="hidden" name="name_product_pages" value="<?php echo $row_product_bests['Products_Name'] ?>">
                                                        
                                                        <button class="pro-btn" name="basket"><?php echo $language["Add to Basket"] ?></button>

                                                        <ul class="d-flex justify-content-center">
                                                            <li>
                                                                <button type="submit" name="compare">
                                                                    <a>
                                                                        <span class="ion-ios-shuffle-strong"
                                                                        data-toggle="tooltip" data-placement="bottom"
                                                                    title="<?php echo $language["Add to compare"] ?>">

                                                                        </span>
                                                                    </a>
                                                                </button>
                                                            </li>
                                                            <li>
                                                                <button type="submit" name="favorite">
                                                                    <a>
                                                                        <span data-toggle="tooltip" data-placement="bottom"
                                                                            title="<?php echo $language["add to favorite"] ?>"
                                                                            class="ion-android-favorite-outline"> </span>
                                                                    </a>
                                                                </button>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="media-body">
                                                <div class="product-desc">
                                                    <div class="star-rating">
                                                        <div class="rateyo" id="rating"
                                                            data-rateyo-rating="<?php  
                                                                                    if(empty($row_product_bests['avg_rates'])){
                                                                                        $row_product_bests['avg_rates'] = 0;
                                                                                        echo $row_product_bests['avg_rates'];
                                                                                    }else{
                                                                                        echo $row_product_bests['avg_rates'];
                                                                                    }
                                                                                ?>
                                                                                "
                                                            data-rateyo-num-stars="5">
                                                        </div>
                                                    </div>
                                                    <div class="align-items-center d-flex mt-2">
                                                        <img src="Upload/<?php echo $row_product_bests['store_logo_prudoct'] ?>" width="45px" height="45px" alt="img-logo">
                                                        <a href="./stores.php?lang=<?php echo $lang ?>" class="mx-3"><p><?php echo ($lang=="ar") ? $row_product_bests['store_name_prudoct_arbic'] : $row_product_bests['store_name_prudoct']; ?></p></a>
                                                    </div>
                                                    <h3 class="title my-10"><?php echo ($lang=="ar") ? $row_product_bests['Products_Name_arabic'] : $row_product_bests['Products_Name']; ?></h3>
                                                    <?php
                                                        if($row_product_bests['discout_prudoct'] > 0):
                                                    ?>
                                                        <h6 class="product-price">
                                                            <del class="del m"><?php echo $row_product_bests['Product_Price'] ?>JD</del>
                                                            <span class="onsale"><?php echo ($row_product_bests['Product_Price']-($row_product_bests['Product_Price']*$row_product_bests['discout_prudoct']/100)) ?>JD</span>
                                                        </h6>
                                                    <?php else: ?>
                                                        <h6 class="product-price"><span class="onsale"><?php echo $row_product_bests['Product_Price'] ?>JD</span></h6>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php 
                        endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="tab-content" id="pills-tabContent3">
                    <!-- first tab-pane -->
                    <div class="tab-pane fade show active">
                        <div class="product-slider-init theme1 slick-nav">
                            <?php
                                $select_product_discount="SELECT * FROM `prudocts` WHERE `discout_prudoct` > 0 ORDER BY `discout_prudoct` DESC";
                                $query_product_discount=mysqli_query($conn_store_admin,$select_product_discount);
                                while($row_product_discount=mysqli_fetch_assoc($query_product_discount)):
                            ?>
                                
                                <div class="slider-item">
                                    <div class="card product-card">
                                        <div class="card-body p-0">
                                            <div class="media flex-column">
                                                <div class="product-thumbnail w-100 position-relative">
                                                    <span class="badge badge-success top-left">-<?php echo $row_product_discount['discout_prudoct'] ?>%</span>
                                                    <a class="d-block" href="single-product.php?lang=<?php echo $lang ?>&Id_prudoct=<?php echo $row_product_discount['id_name_prudoct'] ?>">
                                                        <img class="first-img" src="assets/img/product/1.jpg" alt="thumbnail">
                                                        <img class="second-img" src="assets/img/product/1.1.jpg" alt="thumbnail">
                                                    </a>
                                                    <!-- product links -->
                                                    <form action="" method="POST">
                                                        <div class="product-links d-flex d-flex justify-content-between">
                                                            <?php 
                                                                if(!empty($_SESSION['id_users'])):
                                                            ?>
                                                                <input type="hidden" name="id_user" value="<?php echo $_SESSION['id_users'] ?>">
                                                            <?php endif; ?> 
                                                            <input type="hidden" name="id_product" value="<?php echo $row_product_discount['id_name_prudoct'] ?>">
                                                            <input type="hidden" name="store_logo_pages" value="<?php echo $row_product_discount['store_logo_prudoct'] ?>">
                                                            <input type="hidden" name="name_store_pages" value="<?php echo $row_product_discount['store_name_prudoct'] ?>">
                                                            <input type="hidden" name="price_pages" value="<?php echo ($row_product_discount['Product_Price']-($row_product_discount['Product_Price']*$row_product_discount['discout_prudoct']/100)) ?>">
                                                            <input type="hidden" name="Description_pages" value="<?php echo $row_product_discount['Product_Short_Description'] ?>">
                                                            <input type="hidden" name="size_pages" value="<?php echo $row_product_discount['Products_Sizes'] ?>">
                                                            <input type="hidden" name="color_pages" value="<?php echo $row_product_discount['Product_Colors'] ?>">
                                                            <input type="hidden" name="name_product_pages_ar" value="<?php echo $row_product_discount['Products_Name_arabic'] ?>">
                                                            <input type="hidden" name="name_store_pages_ar" value="<?php echo $row_product_discount['store_name_prudoct_arbic'] ?>">
                                                            <input type="hidden" name="Description_pages_ar" value="<?php echo $row_product_discount['Product_Short_Description_arabic'] ?>">
                                                            <input type="hidden" name="name_product_pages" value="<?php echo $row_product_discount['Products_Name'] ?>">
                                                            
                                                            <button class="pro-btn" name="basket"><?php echo $language["Add to Basket"] ?></button>

                                                            <ul class="d-flex justify-content-center">
                                                                <li>
                                                                    <button type="submit" name="compare">
                                                                        <a>
                                                                            <span class="ion-ios-shuffle-strong"
                                                                            data-toggle="tooltip" data-placement="bottom"
                                                                        title="<?php echo $language["Add to compare"] ?>">

                                                                            </span>
                                                                        </a>
                                                                    </button>
                                                                </li>
                                                                <li>
                                                                    <button type="submit" name="favorite">
                                                                        <a>
                                                                            <span data-toggle="tooltip" data-placement="bottom"
                                                                                title="<?php echo $language["add to favorite"] ?>"
                                                                                class="ion-android-favorite-outline"> </span>
                                                                        </a>
                                                                    </button>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="media-body">
                                                    <div class="product-desc">
                                                        <div class="star-rating">
                                                            <div class="rateyo" id="rating"
                                                                data-rateyo-rating="<?php  
                                                                                    if(empty($row_product_discount['avg_rates'])){
                                                                                        $row_product_discount['avg_rates'] = 0;
                                                                                        echo $row_product_discount['avg_rates'];
                                                                                    }else{
                                                                                        echo $row_product_discount['avg_rates'];
                                                                                    }
                                                                                    ?>
                                                                                    "
                                                                data-rateyo-num-stars="5"
                                                                data-rateyo-score="">
                                                            </div>
                                                        </div>
                                                        <div class="align-items-center d-flex mt-2">
                                                            <img src="Upload/<?php echo $row_product_discount['store_logo_prudoct'] ?>" width="45px" height="45px" alt="img-logo">
                                                            <a href="./stores.php?lang=<?php echo $lang ?>" class="mx-3"><p><?php echo ($lang=="ar") ? $row_product_discount['store_name_prudoct_arbic'] : $row_product_discount['store_name_prudoct']; ?></p></a>
                                                        </div>
                                                        <h3 class="title my-10"><?php echo ($lang=="ar") ? $row_product_discount['Products_Name_arabic'] : $row_product_discount['Products_Name']; ?></h3>
                                                        <h6 class="product-price"><del class="del"><?php echo $row_product_discount['Product_Price'] ?>JD</del>
                                                            <span class="onsale"><?php echo ($row_product_discount['Product_Price']-($row_product_discount['Product_Price']*$row_product_discount['discout_prudoct']/100)) ?>JD</span></h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product tab end -->

<!-- testimonial-section start -->
<section class="testimonial-section pb-70">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="testimonial-init dots-style">
                <?php 
                    $select_feedback="SELECT * FROM `feedback`";
                    $query_feedback=mysqli_query($conn_main_admin , $select_feedback);
                    while($row_feedback=mysqli_fetch_assoc($query_feedback)):
                ?>
                    <div class="slider-item">
                        <div class="testimonial-content text-center">
                            <img class="mb-30 mx-auto" src="Upload_main_admin/<?php echo $row_feedback['img_feedback']; ?>" alt="user">
                            <p><?php echo $language[$row_feedback['description_feedback']]; ?></p>
                            <span class="ion-quote mt-15 mb-30"></span>
                            <h4 class="text-uppercase mb-15"><?php echo $language[$row_feedback['name_feedback']]??""; ?></h4>
                            <a class="text-capitalize" href="javascript::void()"><?php echo $row_feedback['email_feedback']; ?></a>
                        </div>
                    </div>
                <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- testimonial-section end -->

<?php
include "./includes/footer.php";
?>