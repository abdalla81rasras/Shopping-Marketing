<?php
$lang = isset($_GET['lang']) ? $_GET['lang'] : "en";

if($lang=="en"){
  include "languages/en.php";
}elseif($lang=="ar"){
  include "languages/ar.php";
}elseif($lang==""){
  include "languages/en.php";
}

include "delete.php";

$sql_banner="SELECT * FROM `inner_slider_banner`";
$query_banner=mysqli_query($conn_main_admin,$sql_banner);
$row_banner=mysqli_fetch_assoc($query_banner);

?>
<!doctype html>
<html lang="<?php echo $lang?>" dir="<?php echo ($lang == "ar") ? "rtl" : "ltr"; ?>">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta http-equiv="Content-Language" content="<?php echo $lang?>">
    <meta name="description" content="" />
    <title><?php echo $language['Zonan'] ?></title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico" />

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

    <link rel="stylesheet" href="assets/css/fontawesome.min.css" />
    <link rel="stylesheet" href="assets/css/ionicons.min.css" />
    <link rel="stylesheet" href="assets/css/simple-line-icons.css" />
    <link rel="stylesheet" href="assets/css/plugins/jquery-ui.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/plugins/plugins.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/jquery.rateyo.min.css">

</head>

<style>
    body,.banner-content,.product-card,header,.product-tab-nav,.second-tab-pane,.second-tab-pane .product-features,.third-tab-pane,.offcanvas-mobile-menu ,.grid-nav-wraper,.pagination-section{
        direction: <?php echo ($lang == 'ar') ? 'rtl' : 'ltr'; ?>;
    }

    /* statick */
    .offcanvas-submenu,.product-tab,.testimonial-section,.main-slider,.product-slider-init,.badge.badge-success.top-left,.product-sync-init,.product-sync-nav.slick-nav-sync{
        direction: ltr;
    }

    [dir=rtl] .slick-slide{
        float: <?php echo ($lang == 'ar') ? 'left' : 'right'; ?>;
    }

    .slider-content,.banner-content,.media-body,header,.product-tab-nav,.descriptions-ul li, .second-tab-pane .product-features ul ,
    .grade-content{
        text-align: <?php echo ($lang == 'ar') ? 'right' : 'left'; ?>;
    }

    .banner-content{
        right:<?php echo ($lang == 'ar') ? '45px' : '0px'; ?>;
    }

    .offcanvas .offcanvas-menu ul li .menu-expand,
    .minicart-product-list li .content .remove {
        <?php echo ($lang == 'ar') ? 'left: 0px;' : 'right: 0px;'; ?>
    }

    .breadcrumb-bg1 {
        background: url('Upload_main_admin/<?php echo $row_banner['banner'] ?>') no-repeat center;
        background-size: auto;
        background-size: cover;
        padding: 100px 0 200px 0;
    }
</style>

<body>
<!-- offcanvas-overlay start -->
<div class="offcanvas-overlay"></div>
<!-- offcanvas-overlay end -->

<!-- OffCanvas Favorite Start -->
<div id="offcanvas-wishlist" class="offcanvas offcanvas-wishlist theme1">
    <div class="inner">
        <div class="head d-flex flex-wrap justify-content-between">
            <span class="title"><?php echo $language['Favorites'] ?></span>
            <button class="offcanvas-close">×</button>
        </div>
        <?php
            if(!empty($_SESSION['id_users'])){
        ?>
            <ul class="minicart-product-list">
                <?php 
                    $select_favorite="SELECT * FROM `topages_favorite` WHERE `id_user`='".$_SESSION['id_users']."' ORDER BY `id_favorite` DESC";
                    $query_favorite=mysqli_query($conn_main_admin , $select_favorite);
                    $nums=mysqli_num_rows($query_favorite);
                    while($row=mysqli_fetch_assoc($query_favorite)):
                ?>
                    <li>
                        <a href="single-product.php?lang=<?php echo $lang ?>&Id_prudoct=<?php echo $row['id_prudoct'] ?>" class="image"><img src="assets/img/product/4.jpg"
                                alt="Cart product Image"></a>
                        <div class="content">
                            <a href="single-product.php?lang=<?php echo $lang ?>&Id_prudoct=<?php echo $row['id_prudoct'] ?>" class="title">
                                <?php echo ($lang=="ar") ? $row['name_product_ar_favorite'] : $row['prudoct_name_favorite']; ?>
                            </a>
                            <span class="quantity-price"><?php echo $row['qty_favortie'] ?> x <span class="amount"><?php echo ($row['price_favorite']*$row['qty_favortie']) ?>JD</span></span>
                            <div class="stores-cart align-items-center d-flex">
                                <img src="./Upload/<?php echo $row['store_logo_favorite'] ?>" width="20px" height="20px" alt="img-logo">
                                <p class="mx-2"><?php echo ($lang=="ar") ? $row['name_store_ar_favorite'] : $row['name_logo_favorite']; ?></p>
                            </div>
                            <form action="" method="POST">
                                <input type="hidden" name="id_delete_remove_favorite" value="<?php echo $row['id_favorite'] ?>">
                                <a href="#" class="remove">
                                    <button type="submit" name="delete_remove_favorite">×</button>
                                </a>
                            </form>
                        </div>
                    </li>                
                <?php 
                    endwhile; 
                ?>
            </ul>
            <a href="wishlist.php?lang=<?php echo $lang ?>" class="btn theme--btn1 btn--md text-uppercase ml-3 d-block d-sm-inline-block mt-30">
                <?php echo $language['view Favorite'] ?></a>
            <a href="javascript:void()" class="btn theme--btn1 btn--md text-uppercase d-block d-sm-inline-block mt-30"> 
                <?php echo $language['all Shop products'] ?> x <?php echo $nums > 0 ? $nums : 0 ;?></a>
        <?php   
            }else{ 
        ?>
            <ul class="minicart-product-list">
                <?php 
                    if(isset($_COOKIE['favorite_nologin'])){
                        $favorite = json_decode($_COOKIE['favorite_nologin'] , true);
                        if (is_array($favorite) || is_object($favorite)){
                            foreach($favorite as $item){
                ?>
                    <li>
                        <a href="single-product.php?lang=<?php echo $lang ?>&Id_prudoct=<?php echo $item['id_product_favorite'] ?>" class="image"><img src="assets/img/product/4.jpg"
                                alt="Cart product Image"></a>
                        <div class="content">
                            <a href="single-product.php?lang=<?php echo $lang ?>&Id_prudoct=<?php echo $item['id_product_favorite'] ?>" class="title">
                                <?php echo ($lang=="ar") ? $item['name_product_ar_favorite'] : $item['name_product_favorite']; ?>
                            </a>
                            <span class="quantity-price"><?php echo $item['qty_favorite'] ?> x <span class="amount"><?php echo ($item['price_favorite']*$item['qty_favorite']) ?>JD</span></span>
                            <div class="stores-cart align-items-center d-flex">
                                <img src="./Upload/<?php echo $item['store_logo_favorite'] ?>" width="20px" height="20px" alt="img-logo">
                                <p class="mx-2"><?php echo ($lang=="ar") ? $item['name_store_ar_favorite'] : $item['name_store_favorite']; ?></p>
                            </div>
                            <a href="?lang=<?php echo $lang ?>&action=delete&id_delete=<?php echo $item['id_product_favorite']; ?>" class="remove">x</a>
                        </div>
                    </li>                
                <?php 
                            }    
                        }
                    }
                ?>
            </ul>
            <a href="wishlist.php?lang=<?php echo $lang ?>" class="btn theme--btn1 btn--md text-uppercase ml-3 d-block d-sm-inline-block mt-30">
                <?php echo $language['view Favorite'] ?></a>
            <a href="javascript:void()" class="btn theme--btn1 btn--md text-uppercase d-block d-sm-inline-block mt-30">
                <?php echo $language['all Shop products'] ?> x 
                <?php
                    if(isset($_COOKIE['favorite_nologin'])){
                        $favorite = json_decode($_COOKIE['favorite_nologin'] , true);
                        if (is_array($favorite) || is_object($favorite)){
                            $nums = count($favorite);
                            echo $nums > 0 ? $nums : 0 ;
                        }else{
                            echo 0;
                        }
                    }
                ?>
            </a>
        <?php
            }
        ?>
    </div>
</div>
<!-- OffCanvas Favorite End -->

<!-- OffCanvas Basket Start -->
<div id="offcanvas-cart" class="offcanvas offcanvas-cart theme1">
    <div class="inner">
        <div class="head d-flex flex-wrap justify-content-between">
            <span class="title"><?php echo $language['Basket'] ?></span>
            <button class="offcanvas-close">×</button>
        </div>
        <?php
            if(!empty($_SESSION['id_users'])){
        ?>
            <ul class="minicart-product-list">
                <?php 
                    $select_basket="SELECT * FROM `topages_basket` WHERE `id_user`='".$_SESSION['id_users']."' ORDER BY `id_basket` DESC";
                    $query_basket=mysqli_query($conn_main_admin , $select_basket);
                    while($row=mysqli_fetch_assoc($query_basket)):
                ?>
                    <li>
                        <a href="single-product.php?lang=<?php echo $lang ?>&Id_prudoct=<?php echo $row['id_prudoct'] ?>" class="image"><img src="assets/img/product/4.jpg"
                                alt="Cart product Image"></a>
                        <div class="content">
                            <a href="single-product.php?lang=<?php echo $lang ?>&Id_prudoct=<?php echo $row['id_prudoct'] ?>" class="title">
                                <?php echo ($lang=="ar") ? $row['name_product_basket_ar'] : $row['prudoct_name_basket']; ?>
                            </a>
                            <span class="quantity-price"><?php echo $row['qty_basket'] ?> x <span class="amount"><?php echo ($row['price_basket']*$row['qty_basket']) ?>JD</span></span>
                            <div class="stores-cart align-items-center d-flex">
                                <img src="./Upload/<?php echo $row['store_logo_basket'] ?>" width="20px" height="20px" alt="img-logo">
                                <p class="mx-2"><?php echo ($lang=="ar") ? $row['name_store_basket_ar'] : $row['name_logo_basket']; ?></p>
                            </div>
                            <form action="" method="POST">
                                <input type="hidden" name="id_delete_remove_cart" value="<?php echo $row['id_basket'] ?>">
                                <a href="#" class="remove">
                                    <button type="submit" name="delete_remove_cart">×</button>
                                </a>
                            </form>
                        </div>
                    </li>                
                <?php 
                    endwhile; 
                ?>
            </ul>
            <div class="sub-total d-flex flex-wrap justify-content-between">
                <?php
                    $total_basket="SELECT SUM(price_basket*qty_basket) as `total_basket` FROM `topages_basket` WHERE `id_user`='".$_SESSION['id_users']."'";
                    $total_query_basket=mysqli_query($conn_main_admin , $total_basket);
                    $sums=mysqli_fetch_assoc($total_query_basket);
                ?>
                <strong><?php echo $language['Subtotal'] ?> :</strong>
                <span class="amount"><?php echo $sums['total_basket'] > 0 ? $sums['total_basket'] : 0 ;?>JD</span>
            </div>
            <a href="cart.php?lang=<?php echo $lang ?>" class="btn theme--btn1 btn--md text-uppercase ml-5 d-block d-sm-inline-block mr-sm-2"><?php echo $language['View Basket'] ?></a>
            <a href="checkout.php?lang=<?php echo $lang ?>"
                class="btn theme--btn1 btn--md text-uppercase d-block ml-3 d-sm-inline-block mt-4 mt-sm-0"><?php echo $language['checkout'] ?></a>
            <p class="minicart-message"><?php echo $language['Free Shipping on All Orders Over 100JD'] ?>!</p>
        <?php   
            }else{ 
                ?>
                <ul class="minicart-product-list">
                    <?php 
                        if(isset($_COOKIE['cart_nologin'])){
                            $cart = json_decode($_COOKIE['cart_nologin'] , true);
                            if (is_array($cart) || is_object($cart)){
                                foreach($cart as $item){
                    ?>
                        <li>
                            <a href="single-product.php?lang=<?php echo $lang ?>&Id_prudoct=<?php echo $item['id_product_basket'] ?>" class="image"><img src="assets/img/product/4.jpg"
                                    alt="Cart product Image"></a>
                            <div class="content">
                                <a href="single-product.php?lang=<?php echo $lang ?>&Id_prudoct=<?php echo $item['id_product_basket'] ?>" class="title">
                                    <?php echo ($lang=="ar") ? $item['name_product_basket_ar'] : $item['name_product_basket']; ?>
                                </a>
                                <span class="quantity-price"><?php echo $item['qty_basket'] ?> x <span class="amount"><?php echo floatval($item['qty_basket']) * floatval ($item['price_basket']) ?>JD</span></span>
                                <div class="stores-cart align-items-center d-flex">
                                    <img src="./Upload/<?php echo $item['store_logo_basket'] ?>" width="20px" height="20px" alt="img-logo">
                                    <p class="mx-2"><?php echo ($lang=="ar") ? $item['name_store_basket_ar'] : $item['name_store_basket']; ?></p>
                                </div>
                                <a href="?lang=<?php echo $lang ?>&action=delete_basket&id_delete_basket=<?php echo $item['id_product_basket'] ?>" class="remove">
                                    <button type="submit" name="delete_remove_cart">×</button>
                                </a>
                            </div>
                        </li>                
                    <?php 
                                }    
                            }
                        }
                    ?>
                </ul>

                <div class="sub-total d-flex flex-wrap justify-content-between">
                    <?php 
                        if(isset($_COOKIE['cart_nologin'])){
                            $cart = json_decode($_COOKIE['cart_nologin'] , true);
                            if (is_array($cart) || is_object($cart)){
                                $totals_cart = 0;

                                foreach ($cart as $item) {                                
                                $totals_cart += $item['qty_basket'] * $item['price_basket'] ;
                                } 
                        ?>              
                            <strong><?php echo $language['Subtotal'] ?> :</strong>
                            <span class="amount"><?php echo $totals_cart > 0 ? $totals_cart : 0 ;?>JD</span>
                        <?php 
                                   
                            }
                        }
                    ?>
                </div>
                <a href="cart.php?lang=<?php echo $lang ?>" class="btn theme--btn1 btn--md text-uppercase ml-5 d-block d-sm-inline-block mr-sm-2"><?php echo $language['View Basket'] ?></a>
                <a href="checkout.php?lang=<?php echo $lang ?>"
                    class="btn theme--btn1 btn--md text-uppercase d-block ml-3 d-sm-inline-block mt-4 mt-sm-0"><?php echo $language['checkout'] ?></a>
                <p class="minicart-message"><?php echo $language['Free Shipping on All Orders Over 100JD'] ?>!</p>
            <?php
            }
        ?>
    </div>
</div>
<!-- OffCanvas Basket End -->

<!-- offcanvas-setting Start -->
<div id="offcanvas-setting" class="offcanvas offcanvas-cart theme1">
    <div class="inner">
        <div class="head d-flex justify-content-between">
            <span class="title"><?php echo $language['Setting'] ?></span>
            <button class="offcanvas-close">×</button>
        </div>
        <div class="content_setting">
            <div class="info_setting">
                <?php
                    if(empty($_SESSION['id_users'])){
                ?>
                <ul>
                    <li>
                        <a href="login.php?lang=<?php echo $lang ?>"><?php echo $language['login'] ?></a>
                    </li>
                    <li>
                        <a href="checkout.php?lang=<?php echo $lang ?>"><?php echo $language['Checkout'] ?></a>
                    </li>
                </ul>
                <?php 
                    }else{
                ?>
                <h3 class="title_setting"><?php echo $language['My account'] ?></h3>
                <ul>
                    <li>
                        <a href="myaccount.php?lang=<?php echo $lang ?>"><?php echo $language['My account'] ?></a>
                    </li>
                    <li>
                        <a href="checkout.php?lang=<?php echo $lang ?>"><?php echo $language['Checkout'] ?></a>
                    </li>
                    <li>
                        <a href="./Logout.php?lang=<?php echo $lang ?>"><?php echo $language['Logout'] ?></a>
                    </li>
                </ul>
                <?php 
                    }
                ?>
            </div>
            <div class="info_setting">
                <h3 class="title_setting"><?php echo $language['Language'] ?></h3>
                <ul>
                    <li class="<?php if($lang=="en" || $lang=="") echo 'active' ?>">
                        <a href="?lang=en">
                            <img src="http://demo.posthemes.com/pos_zonan/img/l/1.jpg" alt="img" />
                            <?php echo $language['English'] ?>
                        </a>
                    </li>
                    <li class="<?php if($lang=="ar") echo 'active' ?>">
                        <a href="?lang=ar">
                            <img src="assets/img/logo/saudi-arabia-flag-icon.png" alt="img" />
                            <?php echo $language['Arabic'] ?>
                        </a>
                    </li>
                </ul>
            </div> 
            <div class="info_setting">
                <div class="title_setting"><?php echo $language['Currency'] ?> :</div>
                <ul>
                    <li class="active"><a href="#">JD  <img src="./assets/img/logo/Flag-of-Jordan.png" alt="img"></a></li>
                </ul>
            </div>
            <div class="info_setting"> 
                <a target="_blank" href="stores.php?lang=<?php echo $lang ?>" class="title_setting font-weight-bold text-primary"><?php echo $language['have a store ?'] ?></a>
            </div>
        </div>
    </div>
</div>
<!--offcanvas-setting End -->

<!-- offcanvas-mobile-menu start -->
<div id="offcanvas-mobile-menu" class="offcanvas theme1 offcanvas-mobile-menu">
    <div class="inner">
        <div class="border-bottom mb-4 pb-4 text-right">
            <button class="offcanvas-close">×</button>
        </div>
        <div class="offcanvas-head mb-4">
            <nav class="offcanvas-top-nav">
                <ul class="d-flex justify-content-center align-items-center">
                    <li class="mx-3">
                        <a href="compare.php?lang=<?php echo $lang ?>">
                            <i class="ion-ios-loop-strong"></i> <?php echo $language['compare'] ?> 
                            <?php
                                if(!empty($_SESSION['id_users'])){
                                    $sql = "SELECT * FROM `topages_compare` WHERE `id_user`='".$_SESSION['id_users']."'";
                                    $query = mysqli_query($conn_main_admin,$sql);
                                    $num = mysqli_num_rows($query);
                            ?>
                                <span>(<?php echo $num; ?>)</span>
                            <?php 
                                } else {
                            ?>
                                <span>(0)</span>
                            <?php } ?>
                        </a>
                    </li>
                    <li class="mx-3">
                        <a href="wishlist.php?lang=<?php echo $lang ?>"> 
                            <i class="ion-android-favorite-outline"></i> <?php echo $language['Favorite'] ?>
                            <?php
                                if(!empty($_SESSION['id_users'])){
                                    $sql = "SELECT * FROM `topages_favorite` WHERE `id_user`='".$_SESSION['id_users']."'";
                                    $query = mysqli_query($conn_main_admin,$sql);
                                    $num = mysqli_num_rows($query);
                            ?>
                                <span>(<?php echo $num; ?>)</span>
                            <?php 
                                } else {
                            ?>
                                <span>(0)</span>
                            <?php } ?>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <nav class="offcanvas-menu">
            <ul>
                <li><a href="index.php?lang=<?php echo $lang ?>"><span class="menu-text"><?php echo $language['Home'] ?></span></li>
                <li><a href="javascript:void()"><span class="menu-text"><?php echo $language['Shop'] ?></span></a>
                    <ul class="offcanvas-submenu">
                        <li>
                            <a href="#"><span class="menu-text"><?php echo $language['CLOTHING'] ?></span></a>
                            <ul class="offcanvas-submenu">
                                <li><a href="./Clothing_female.php?lang=<?php echo $lang ?>"><?php echo $language['Female'] ?></a></li>
                                <li><a href="./Clothing_male.php?lang=<?php echo $lang ?>"><?php echo $language['Male'] ?></a></li>
                                <li><a href="./Clothing_kids.php?lang=<?php echo $lang ?>"><?php echo $language['Kids'] ?></a></li>
                                <li><a href="./Clothing_all.php?lang=<?php echo $lang ?>"><?php echo $language['All'] ?></a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><span class="menu-text"><?php echo $language['SHOES'] ?></span></a>
                            <ul class="offcanvas-submenu">
                                <li><a href="./shoes_female.php?lang=<?php echo $lang ?>"><?php echo $language['Female'] ?></a></li>
                                <li><a href="./shoes_male.php?lang=<?php echo $lang ?>"><?php echo $language['Male'] ?></a></li>
                                <li><a href="./shoes_kids.php?lang=<?php echo $lang ?>"><?php echo $language['Kids'] ?></a></li>
                                <li><a href="./shoes_all.php?lang=<?php echo $lang ?>"><?php echo $language['All'] ?></a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><span class="menu-text"><?php echo $language['BAGS'] ?></span></a>
                            <ul class="offcanvas-submenu">
                                <li><a href="./bags_female.php?lang=<?php echo $lang ?>"><?php echo $language['Female'] ?></a></li>
                                <li><a href="./bags_male.php?lang=<?php echo $lang ?>"><?php echo $language['Male'] ?></a></li>
                                <li><a href="./bags_kids.php?lang=<?php echo $lang ?>"><?php echo $language['Kids'] ?></a></li>
                                <li><a href="./bags_all.php?lang=<?php echo $lang ?>"><?php echo $language['All'] ?></a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><span class="menu-text"><?php echo $language['ACCESSORIES'] ?></span></a>
                            <ul class="offcanvas-submenu">
                                <li><a href="./accessories_hand_made.php?lang=<?php echo $lang ?>"><?php echo $language['Hand Made'] ?></a></li>
                                <li><a href="./accessories_all.php?lang=<?php echo $lang ?>"><?php echo $language['All'] ?></a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><span class="menu-text"><?php echo $language['PERFUMES'] ?></span></a>
                            <ul class="offcanvas-submenu">
                                <li><a href="./perfumes_fmale.php?lang=<?php echo $lang ?>"><?php echo $language['Female'] ?></a></li>
                                <li><a href="./perfumes_male.php?lang=<?php echo $lang ?>"><?php echo $language['Male'] ?></a></li>
                                <li><a href="./perfumes_kids.php?lang=<?php echo $lang ?>"><?php echo $language['Kids'] ?></a></li>
                                <li><a href="./perfumes_all.php?lang=<?php echo $lang ?>"><?php echo $language['All'] ?></a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><span class="menu-text"><?php echo $language['GAMING'] ?></span></a>
                            <ul class="offcanvas-submenu">
                                <li><a href="./gaming_accessories.php?lang=<?php echo $lang ?>"><?php echo $language['Gaming Accessories'] ?></a></li>
                                <li><a href="./gaming_figurines.php?lang=<?php echo $lang ?>"><?php echo $language['Figurines'] ?></a></li>
                                <li><a href="./gaming_all.php?lang=<?php echo $lang ?>"><?php echo $language['All'] ?></a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><span class="menu-text"><?php echo $language['OTHER PAGES'] ?></span></a>
                            <ul class="offcanvas-submenu">
                                <li><a href="./makeup.php?lang=<?php echo $lang ?>"><?php echo $language['Makeup'] ?></a></li>
                                <li><a href="./phone accessories.php?lang=<?php echo $lang ?>"><?php echo $language['Phone Accessories'] ?></a></li>
                                <li><a href="./hand made.php?lang=<?php echo $lang ?>"><?php echo $language['Hand Made'] ?></a></li>
                                <li><a href="./arts.php?lang=<?php echo $lang ?>"><?php echo $language['Arts'] ?></a></li>
                            </ul>
                        </li>
                    </ul>
                </li>  

                <li><a href="contact.php?lang=<?php echo $lang ?>"><?php echo $language['Contact Us'] ?></a></li>

                <li><a href="stores.php?lang=<?php echo $lang ?>"><?php echo $language['Stores'] ?></a></li>
            </ul>
        </nav>
        <div class="offcanvas-social py-30">
            <ul>
                <li>
                    <a href="#www.facebook.com" target="_blank"><i class="icon-social-facebook"></i></a>
                </li>
                <li>
                    <a href="#www.twitter.com" target="_blank"><i class="icon-social-twitter"></i></a>
                </li>
                <li>
                    <a href="#www.whatsapp.com" target="_blank"><i class="icon-social-whatsapp"></i></a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- offcanvas-mobile-menu end -->

<!-- header start -->
<header id="sticky" class="header style1 theme1">
    <!-- header-middle satrt -->
    <div class="header-middle">
        <div class="container">
            <div class="row align-items-center position-relative">
                <div class="col-6 col-lg-2 col-xl-3 order-first">
                    <?php 
                        $sql_header="SELECT `img_logo` FROM `header`";
                        $query_header=mysqli_query($conn_main_admin,$sql_header);
                        $row_header=mysqli_fetch_assoc($query_header);
                    ?> 

                    <div class="logo">
                        <a href="index.php?lang=<?php echo $lang ?>"><img src="Upload_main_admin/<?php echo $row_header['img_logo'] ?>" alt="logo"></a>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-7 col-xl-6 d-none d-lg-block">
                    <nav class="header-bottom theme1">
                        <ul class="main-menu d-flex align-items-center">
                            <li>
                                <a href="index.php?lang=<?php echo $lang ?>" class="pl-0"><?php echo $language['Home'] ?></a>
                            </li>
                            <li class="position-static">
                                <a href=" #"><?php echo $language['Shop'] ?> <i class="ion-ios-arrow-down"></i></a>
                                <ul class="mega-menu row">
                                    <li class="col-2">
                                        <ul class="border-right h-100 pr-20">
                                            <li class="mega-menu-title"><a href="#"><?php echo $language['CLOTHING'] ?></a></li>
                                            <li><a href="./Clothing_female.php?lang=<?php echo $lang ?>"><?php echo $language['Female'] ?></a></li>
                                            <li><a href="./Clothing_male.php?lang=<?php echo $lang ?>"><?php echo $language['Male'] ?></a></li>
                                            <li><a href="./Clothing_kids.php?lang=<?php echo $lang ?>"><?php echo $language['Kids'] ?></a></li>
                                            <li><a href="./Clothing_all.php?lang=<?php echo $lang ?>"><?php echo $language['All'] ?></a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="col-2">
                                        <ul class="border-right h-100 pr-20">
                                            <li class="mega-menu-title"><a href="#"><?php echo $language['SHOES'] ?></a></li>
                                            <li><a href="./shoes_female.php?lang=<?php echo $lang ?>"><?php echo $language['Female'] ?></a></li>
                                            <li><a href="./shoes_male.php?lang=<?php echo $lang ?>"><?php echo $language['Male'] ?></a></li>
                                            <li><a href="./shoes_kids.php?lang=<?php echo $lang ?>"><?php echo $language['Kids'] ?></a></li>
                                            <li><a href="./shoes_all.php?lang=<?php echo $lang ?>"><?php echo $language['All'] ?></a></li>
                                        </ul>
                                    </li>
                                    <li class="col-2">
                                        <ul class="border-right h-100 pr-20">
                                            <li class="mega-menu-title"><a href="#"><?php echo $language['BAGS'] ?></a></li>
                                            <li><a href="./bags_female.php?lang=<?php echo $lang ?>"><?php echo $language['Female'] ?></a></li>
                                            <li><a href="./bags_male.php?lang=<?php echo $lang ?>"><?php echo $language['Male'] ?></a></li>
                                            <li><a href="./bags_kids.php?lang=<?php echo $lang ?>"><?php echo $language['Kids'] ?></a></li>
                                            <li><a href="./bags_all.php?lang=<?php echo $lang ?>"><?php echo $language['All'] ?></a></li>
                                        </ul>
                                    </li>
                                    <li class="col-2">
                                        <ul class="border-right h-100 pr-20">
                                            <li class="mega-menu-title"><a href="#"><?php echo $language['PERFUMES'] ?></a></li>
                                            <li><a href="./perfumes_fmale.php?lang=<?php echo $lang ?>"><?php echo $language['Female'] ?></a></li>
                                            <li><a href="./perfumes_male.php?lang=<?php echo $lang ?>"><?php echo $language['Male'] ?></a></li>
                                            <li><a href="./perfumes_kids.php?lang=<?php echo $lang ?>"><?php echo $language['Kids'] ?></a></li>
                                            <li><a href="./perfumes_all.php?lang=<?php echo $lang ?>"><?php echo $language['All'] ?></a></li>
                                        </ul>
                                    </li>
                                    <li class="col-2">
                                      <ul class="border-right h-100 pr-20">
                                            <li class="mega-menu-title"><a href="#"><?php echo $language['ACCESSORIES'] ?></a></li>
                                            <li><a href="./accessories_hand_made.php?lang=<?php echo $lang ?>"><?php echo $language['Hand Made'] ?></a></li>
                                            <li><a href="./accessories_all.php?lang=<?php echo $lang ?>"><?php echo $language['All'] ?></a></li>
                                        </ul>  
                                    </li>
                                    <li class="col-2">
                                        <ul class="border-right h-100 pr-20">
                                            <li class="mega-menu-title"><a href="#"><?php echo $language['GAMING'] ?></a></li>
                                            <li><a href="./gaming_accessories.php?lang=<?php echo $lang ?>"><?php echo $language['Gaming Accessories'] ?></a></li>
                                            <li><a href="./gaming_figurines.php?lang=<?php echo $lang ?>"><?php echo $language['Figurines'] ?></a></li>
                                            <li><a href="./gaming_all.php?lang=<?php echo $lang ?>"><?php echo $language['All'] ?></a></li>
                                        </ul>
                                    </li>
                                    <li class="col-2 mt-3">
                                        <ul>
                                            <li class="mega-menu-title"><a href="#"><?php echo $language['OTHER PAGES'] ?></a></li>
                                            <li><a href="./makeup.php?lang=<?php echo $lang ?>"><?php echo $language['Makeup'] ?></a></li>
                                            <li><a href="./phone accessories.php?lang=<?php echo $lang ?>"><?php echo $language['Phone Accessories'] ?></a></li>
                                            <li><a href="./hand made.php?lang=<?php echo $lang ?>"><?php echo $language['Hand Made'] ?></a></li>
                                            <li><a href="./arts.php?lang=<?php echo $lang ?>"><?php echo $language['Arts'] ?></a></li>
                                        </ul>
                                    </li>
                                    <li class="col-12 mt-4">
                                        <div class="zoom-in overflow-hidden d-block">
                                            <img class="w-100" src="assets/img/mega-menu/1.jpg" alt="img">
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="stores.php?lang=<?php echo $lang ?>"><?php echo $language['Stores'] ?></a></li>
                            <li><a href="contact.php?lang=<?php echo $lang ?>"><?php echo $language['Contact Us'] ?></a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-6 col-lg-3 col-xl-3">
                    <!-- search-form end -->
                    <div class="d-flex align-items-center justify-content-end">
                        <div class="cart-block-links theme1">
                            <ul class="d-flex align-items-center">
                                <li>
                                    <a href="javascript:void(0)" class="search search-toggle">
                                        <i class="ion-ios-search-strong"></i>
                                    </a>
                                </li>
                                <li class="position-relative d-none d-sm-block">
                                    <a href="compare.php?lang=<?php echo $lang ?>">
                                        <i><img src="./assets/Icons and Images/wishlist icon.png" width="19px" height="19px" alt=""></i>
                                        <?php
                                            if(!empty($_SESSION['id_users'])){
                                                $sql = "SELECT * FROM `topages_compare` WHERE `id_user`='".$_SESSION['id_users']."'";
                                                $query = mysqli_query($conn_main_admin,$sql);
                                                if(mysqli_num_rows($query) > 0):
                                        ?>
                                            <span class="dot-red"></span>
                                            <?php 
                                                endif;
                                            }else{
                                                if(isset($_COOKIE['nologin_compare'])){
                                                    $compares = json_decode($_COOKIE['nologin_compare'] , true);
                                                    if (is_array($compares) || is_object($compares)){
                                                        $nums = count($compares);
                                                        if($nums > 0){
                                                        ?>
                                                            <span class="dot-red"></span>
                                                        <?php
                                                        }
                                                    }
                                                }
                                            } 
                                        ?>
                                    </a>
                                </li>
                                <li class="position-relative d-none d-sm-block">
                                    <a class="offcanvas-toggle" href="#offcanvas-wishlist">
                                        <i class="ion-android-favorite-outline"></i>
                                        <?php
                                            if(!empty($_SESSION['id_users'])){
                                                $sql = "SELECT * FROM `topages_favorite` WHERE `id_user`='".$_SESSION['id_users']."'";
                                                $query = mysqli_query($conn_main_admin,$sql);
                                                if(mysqli_num_rows($query) > 0):
                                        ?>
                                            <span class="dot-red"></span>
                                        <?php 
                                                endif;
                                            }else{
                                              if(isset($_COOKIE['favorite_nologin'])){
                                                $favorite = json_decode($_COOKIE['favorite_nologin'] , true);
                                                if (is_array($favorite) || is_object($favorite)){
                                                  $nums = count($favorite);
                                                  if($nums > 0){
                                                    ?>
                                                      <span class="dot-red"></span>
                                                    <?php
                                                  }
                                                }
                                              }
                                            } 
                                        ?>
                                    </a>
                                </li>
                                <li class="cart-block position-relative d-none d-sm-block">
                                    <a class="offcanvas-toggle" href="#offcanvas-cart">
                                        <i class="ion-bag"></i>
                                        <?php
                                            if(!empty($_SESSION['id_users'])){
                                                $sql = "SELECT * FROM `topages_basket` WHERE `id_user`='".$_SESSION['id_users']."'";
                                                $query = mysqli_query($conn_main_admin,$sql);
                                                if(mysqli_num_rows($query) > 0):
                                        ?>
                                            <span class="dot-red"></span>
                                        <?php 
                                                endif;
                                            }else{
                                                if(isset($_COOKIE['cart_nologin'])){
                                                $carts = json_decode($_COOKIE['cart_nologin'] , true);
                                                if (is_array($carts) || is_object($carts)){
                                                    $nums = count($carts);
                                                    if($nums > 0){
                                                    ?>
                                                        <span class="dot-red"></span>
                                                    <?php
                                                    }
                                                }
                                                }
                                            } 
                                        ?>
                                    </a>
                                </li>
                                <li class="mr-0 cart-block">
                                    <a class="offcanvas-toggle" href="#offcanvas-setting">
                                        <i class="ion-android-settings"></i>
                                    </a>
                                </li>
                                <!-- cart block end -->
                            </ul>
                        </div>
                        <div class="mobile-menu-toggle theme1 d-lg-none">
                            <a href="#offcanvas-mobile-menu" class="offcanvas-toggle">
                                <svg viewbox="0 0 800 600">
                                    <path
                                        d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200"
                                        id="top"></path>
                                    <path d="M300,320 L540,320" id="middle"></path>
                                    <path
                                        d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190"
                                        id="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318)">
                                    </path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header-middle end -->
</header>
<!-- header end -->
