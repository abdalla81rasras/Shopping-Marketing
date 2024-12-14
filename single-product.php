<?php
  session_start();
  if(!isset($_SESSION['id_users'])){
    
  }

  include "./includes/connection_1.php";
  include "./includes/connection_2.php";

  $lang = isset($_GET['lang']) ? $_GET['lang'] : "en";

  if($lang=="en"){
    include "languages/en.php";
  }elseif($lang=="ar"){
    include "languages/ar.php";
  }elseif($lang==""){
    include "languages/en.php";
  }

  $sql_banner="SELECT * FROM `inner_slider_banner`";
  $query_banner=mysqli_query($conn_main_admin,$sql_banner);
  $row_banner=mysqli_fetch_assoc($query_banner);

  include "./includes/func_single.php";

  include "./includes/func_comper.php";
  include "./includes/func_favorite.php";
  include "./includes/func_cart.php";

  include "./includes/func_other_single.php";

  include "./includes/delete.php";

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

  .color-box {
    width: 20px;
    height: 20px;
    border-radius: 100%;
    border: 1px solid #2caf4e;
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
          <?php echo $language['view Favorite'] ?>
        </a>
        <a href="javascript:void()" class="btn theme--btn1 btn--md text-uppercase d-block d-sm-inline-block mt-30">
          <?php echo $language['all Shop products'] ?> x <?php echo $nums > 0 ? $nums : 0 ;?>
        </a>
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
                        <a href="?lang=<?php echo $lang ?>&Id_prudoct=<?php echo $_GET['Id_prudoct']; ?>&action=delete_single&id_delete=<?php echo $item['id_product_favorite'] ?>" class="remove">x</a>
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
                                  <input type="hidden" name="id_delete_remove_cart" value="<?php echo $item['id_product_basket'] ?>">
                                  <a href="?lang=<?php echo $lang ?>&Id_prudoct=<?php echo $_GET['Id_prudoct'] ?>&action=delete_basket_single&id_delete_basket_single=<?php echo $item['id_product_basket'] ?>" class="remove">
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
                    <a href="?lang=en&Id_prudoct=<?php echo $_GET['Id_prudoct'] ?>">
                      <img src="http://demo.posthemes.com/pos_zonan/img/l/1.jpg" alt="img" />
                      <?php echo $language['English'] ?>
                    </a>
                  </li>
                  <li class="<?php if($lang=="ar") echo 'active' ?>">
                    <a href="?lang=ar&Id_prudoct=<?php echo $_GET['Id_prudoct'] ?>">
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

<!-- breadcrumb-section start -->
<nav class="breadcrumb-section theme1 breadcrumb-bg1">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="breadcrumb-title text-center my-20">
          <h2 class="title text-dark text-capitalize"><?php echo $language["Single Product"] ?></h2>
        </div>
      </div>
      <div class="col-12">
        <ol class="breadcrumb bg-transparent m-0 p-0 align-items-center justify-content-center">
          <li class="breadcrumb-item"><a href="index.php?lang=<?php echo $lang ?>"><?php echo $language["Home"] ?></a></li>
          <li class="breadcrumb-item active" aria-current="page"><?php echo $language["Single Product"] ?></li>
        </ol>
      </div>
    </div>
  </div>
</nav>
<!-- breadcrumb-section end -->

<!-- product-single start -->
<section class="product-single theme1">
  <div class="container grid-wraper">
    <div class="row">
      <?php include "./includes/func-reviews.php"; ?>
      <div class="col-md-9 mx-auto col-lg-6 mb-5 mb-lg-0">
        <div class="product-sync-init">
            <div class="single-product">
                <div class="product-thumb">
                    <img src="assets/img/slider/thumb/1.jpg" id="myimage" alt="product-thumb">
                </div>
            </div>
            <!-- single-product end -->
            <div class="single-product">
                <div class="product-thumb">
                    <img src="assets/img/slider/thumb/2.jpg" id="myimage" alt="product-thumb">
                </div>
            </div>
            <!-- single-product end -->
            <div class="single-product">
                <div class="product-thumb">
                    <img src="assets/img/slider/thumb/3.jpg" id="myimage" alt="product-thumb">
                </div>
            </div>
            <!-- single-product end -->
            <div class="single-product">
                <div class="product-thumb">
                    <img src="assets/img/slider/thumb/4.jpg" id="myimage" alt="product-thumb">
                </div>
            </div>
            <!-- single-product end -->
        </div>
        <div class="img-zoom-container buttom">
          <div id="myresult" class="img-zoom-result"></div>
        </div>
        <div class="product-sync-nav slick-nav-sync">
            <div class="single-product">
                <div class="product-thumb">
                    <a href="javascript:void(0)"> <img src="assets/img/slider/thumb/1.1.jpg"
                            alt="product-thumb"></a>
                </div>
            </div>
            <!-- single-product end -->
            <div class="single-product">
                <div class="product-thumb">
                    <a href="javascript:void(0)"> <img src="assets/img/slider/thumb/2.1.jpg"
                            alt="product-thumb"></a>
                </div>
            </div>
            <!-- single-product end -->
            <div class="single-product">
                <div class="product-thumb">
                    <a href="javascript:void(0)"><img src="assets/img/slider/thumb/3.1.jpg"
                            alt="product-thumb"></a>
                </div>
            </div>
            <!-- single-product end -->
            <div class="single-product">
                <div class="product-thumb">
                    <a href="javascript:void(0)"><img src="assets/img/slider/thumb/4.1.jpg"
                            alt="product-thumb"></a>
                </div>
            </div>
            <!-- single-product end -->
            <div class="single-product">
                <div class="product-thumb">
                    <a href="javascript:void(0)"><img src="assets/img/slider/thumb/2.1.jpg"
                            alt="product-thumb"></a>
                </div>
            </div>
            <!-- single-product end -->
        </div>
      </div>
      <div class="col-lg-6 mt-5 mt-md-0">
        <form action="" method="POST">
          <div class="single-product-info">
            <div class="single-product-head">
              <?php if(!empty($_SESSION['id_users'])): ?>
                <input type="hidden" name="id_user" value="<?php echo $_SESSION['id_users'] ?>">
              <?php endif; ?>
              <input type="hidden" name="id_product" value="<?php echo $_SESSION['id_name_prudoct'] ?>">
              <input type="hidden" name="store_logo_pages" value="<?php echo $store_logo_prudoct ?>">
              <input type="hidden" name="name_store_pages" value="<?php echo $store_name_prudoct ?>">
              <input type="hidden" name="price_pages" value="<?php echo ($Product_Price-($Product_Price*$discout_prudoct/100)) ?>">
              <input type="hidden" name="Description_pages" value="<?php echo $Product_Short_Description ?>">
              <input type="hidden" name="size_pages" value="<?php echo $Products_Sizes ?>">
              <input type="hidden" name="color_pages" value="<?php echo $Product_Colors ?>">
              <input type="hidden" name="name_product_pages_ar" value="<?php echo $Products_Name_arabic ?>">
              <input type="hidden" name="name_store_pages_ar" value="<?php echo $store_name_prudoct_arbic ?>">
              <input type="hidden" name="Description_pages_ar" value="<?php echo $Product_Short_Description_arabic ?>">
              <input type="hidden" name="name_product_pages" value="<?php echo $Products_Name ?>">

              <h2 class="title mb-20"><?php echo ($lang=="ar") ? $Products_Name_arabic : $Products_Name; ?></h2>
              <div class="star-content d-flex align-items-center mb-20">
                <?php
                  $sql_svg = "SELECT AVG(rating) AS `average_rating` FROM `reviews` WHERE `id_prudoct` = '".$_SESSION['id_name_prudoct']."' AND `rating` BETWEEN 1 AND 5";
                  $query_svg = mysqli_query($conn_store_admin ,$sql_svg);
                  $result_svg = mysqli_fetch_assoc($query_svg);
                ?>
                  <div class="rateyo" id="rating"
                    data-rateyo-rating="<?php 
                                          if(empty($result_svg['average_rating'])){
                                            $result_svg['average_rating'] = 0;
                                            echo $result_svg['average_rating'];
                                          }else{
                                            echo $result_svg['average_rating'];
                                          }
                                        ?>"
                    data-rateyo-num-stars="5"
                    data-rateyo-score="">
                  </div>
                <a href="#pills-contact" id="write-comment">
                  <span class="mx-2"><i class="far fa-comment-dots"></i></span>
                  <?php echo $language["Read reviews"] ?> <span>  </span>
                </a>
                <a herf="#" style="cursor:pointer;" data-toggle="popover" data-html="true" data-placement="bottom" 
                    data-content='
                                <div class="star-content">
                                  <?php if(!empty($_SESSION['id_users'])): ?>
                                    <form action="" method="POST">
                                      <label><?php echo $language["Rating ( 1 - 5 )"] ?> :
                                        <input type="number" name="rating" min="0" max="5" step="0.1" required="">
                                      </label>
                                      <textarea class="form-control mt-2 mb-3" name="comment_star" cols="30" rows="5" required="" placeholder="<?php echo $language["Enter Comment"] ?> ..."></textarea>
                                      <div class="text-center">
                                        <button class="btn btn-success" type="submit" name="submit_review"><?php echo $language["Submit"] ?></button>
                                      </div>
                                    </form>
                                  <?php else: ?>
                                    <p><?php echo $language['You must'] ?> <a href="login.php?lang=<?php echo $lang ?>"><?php echo $language['login'] ?></a> <?php echo $language['or'] ?> <a href="register.php?lang=<?php echo $lang ?>"><?php echo $language['registration'] ?></a>  :)</p>
                                  <?php endif; ?>
                                </div>
                                '>
                     <?php echo $language["Write a review"] ?>
                </a>
              </div>
            </div>
            <div class="product-body mb-20">
              <div class="d-flex align-items-center mb-20 border-bottom pb-20">
                <?php
                  $select_product_discount="SELECT `Product_Price`,`discout_prudoct` FROM `prudocts` WHERE `id_name_prudoct` = ".$_SESSION['id_name_prudoct']." ";
                  $query_product_discount=mysqli_query($conn_store_admin,$select_product_discount);
                  $row_product_discount=mysqli_fetch_assoc($query_product_discount);
                  if($row_product_discount['discout_prudoct'] > 0):
                ?>
                  <h6 class="product-price">
                    <del class="del m"><?php echo $row_product_discount['Product_Price'] ?>JD</del>
                    <span class="onsale"><?php echo ($row_product_discount['Product_Price']-($row_product_discount['Product_Price']*$row_product_discount['discout_prudoct']/100)) ?>JD</span>
                  </h6>
                  <span class="badge my-badge position-static bg-dark mx-20"><?php echo $language["Save"] ?> <?php echo $row_product_discount['discout_prudoct'] ?>%</span>
                <?php else: ?>
                  <h6><span class="onsale"><?php echo $row_product_discount['Product_Price'] ?>JD</span></h6>
                <?php endif; ?>
              </div>
            </div>
            <div class="product-footer">
              <div class="product-count style d-flex flex-column flex-sm-row align-items-center mb-30">
                  <div class="count d-flex">
                    <input type="number" min="1" max="5" step="1" name="qty_single" value="1"/>
                  </div>
                  <div class="mx-4">
                    <button class="btn theme-btn--dark3 btn--xl mt-30 mt-sm-0" name="basket_single">
                      <span class="mx-2"><i class="ion-bag"></i></span>
                      <?php echo $language["Add to Basket"] ?>
                    </button>
                  </div>
              </div>
              <div class=" mt-30">
                <table>
                  <tr>
                    <td>
                      <label><?php echo $language["Color"] ?> :</label>
                    </td>
                      <td class="d-flex">
                        <div class="color-box mx-3 mt-1" style="background-color: <?php echo $Product_Colors ?>;"></div>
                      </td>
                  </tr>
                </table>
              </div>
              <div class="addto-whish-list mt-20">
                <button type="submit" name="favorite_single"><a><i class="icon-heart"></i> <?php echo $language["Add to Favorites"] ?></a></button>
                <button type="submit" name="compare_single" class=" mx-3"><a><i class="icon-shuffle"></i> <?php echo $language["Add to Compare"] ?></a></button>
              </div>
              <div class="align-items-center d-flex mt-20">
                <img src="./Upload/<?php echo $store_logo_prudoct ?>" width="45px" height="45px" alt="img-logo">
                <p class="mx-3"><?php echo ($lang=="ar") ? $store_name_prudoct_arbic : $store_name_prudoct; ?></p>
              </div>
              <div class="pro-social-links mt-20">
                <ul class="d-flex align-items-center">
                  <li class="share"><?php echo $language["Share"] ?></li>
                  <li>
                    <a target="_blank" href="#"><i class="ion-social-facebook"></i></a>
                  </li>
                  <li>
                    <a target="_blank" href="#"><i class="icon-social-instagram"></i></a>
                  </li>
                  <li>
                    <a target="_blank" href="#"><i class="ion-social-whatsapp"></i></a>
                  </li>
                </ul>
              </div> 
              
            </div>
            <div class="block-reassurance">
              <ul>
                <li>
                  <img
                    src="assets/img/icon/10.png"
                    alt="img"
                  />
                  <?php echo $language["sp"] ?>
                </li>
                <li>
                  <img
                    src="assets/img/icon/11.png"
                    alt="img"
                  />
                  <?php echo $language["Delivery policy"] ?> (<?php echo ($lang=="ar") ? $Delivery_Policy_Time_arbic : $Delivery_Policy_Time; ?>)
                </li>
                <li>
                  <img
                    src="assets/img/icon/12.png"
                    alt="img"
                  />
                  <?php echo $language["Return policy"] ?> (<?php echo ($lang=="ar") ? $Return_Policy_arabic : $Return_Policy; ?>)
                </li>
              </ul>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<!-- product-single end -->

<!-- product tab start -->
<div class="product-tab theme1 bg-white pt-70 pb-70">
  <div class="container">
    <div class="product-tab-nav">
      <div class="row align-items-center">
        <div class="col-12">
          <nav class="product-tab-menu single-product">
            <ul
              class="nav nav-pills justify-content-center"
              id="pills-tab"
              role="tablist"
            >
              <li class="nav-item">
                <a class="nav_link active"
                  id="pills-home-tab"
                  data-toggle="tab"
                  href="#pills-home"
                  role="tab"
                  aria-controls="pills-home"
                  aria-selected="true"
                  ><?php echo $language["Description"] ?></a
                >
              </li>
              <li class="nav-item">
                <a
                  class="nav_link"
                  data-toggle="tab"
                  href="#pills-profile"
                  ><?php echo $language["Product Details"] ?></a
                >
              </li>
              <li class="nav-item">
                <a
                  class="nav_link"
                  data-toggle="tab"
                  href="#pills-contact"
                  ><?php echo $language["Reviews"] ?></a
                >
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
    <!-- product-tab-nav end -->
    <div class="row">
      <div class="col-12">
        <div class="tab-content">
          <!-- first tab-pane -->
          <div class="tab-pane fade show active" id="pills-home">
            <div class="single-product-desc">
              <ul class="descriptions-ul">
                <li>
                  <?php echo ($lang=="ar") ? $Product_Short_Description_arabic : $Product_Short_Description; ?>
                </li>
                <li>
                  <?php echo ($lang=="ar") ? $Product_Full_Description_arbic : $Product_Full_Description; ?>
                </li>                  
              </ul>
            </div>
          </div>
          <!-- second tab-pane -->
          <div class="tab-pane fade second-tab-pane" id="pills-profile">
            <div class="single-product-desc">
              <div class="studio-thumb">
                <img class="mb-20" src="./Upload/<?php echo $store_logo_prudoct ?>" width="50px" height="50px" alt="img-thumb"/>
                <h6 class="mb-2"><?php echo $language["Store Name"] ?> <small><?php echo ($lang=="ar") ? $store_name_prudoct_arbic : $store_name_prudoct; ?></small></h6>
                <h3><?php echo $language["Data sheet"] ?></h3>
              </div>
              <div class="product-features">
                <ul>
                  <li><span><?php echo $language["Product Material"] ?></span></li>
                  <li><span><?php echo ($lang=="ar") ? $Product_Material_arabic : $Product_Material; ?></span></li>
                  <li><span><?php echo $language["Product Category"] ?></span></li>
                  <li>
                    <span>
                      <div class="d-flex">
                        <label for="ch1">
                          <input type="radio" class="d-none" value="<?php echo $Products_Category ?>" id="ch1" checked>
                            <?php echo $language[$Products_Category]??"" ?>
                        </label>
                      </div>
                    </span>
                  </li>
                  <li><span><?php echo $language["Product Sub-Category"] ?></span></li>
                  <li>
                    <span>
                      <div class="d-flex">
                        <label for="ch1">
                          <input type="radio" class="d-none" value="<?php echo $Products_sub_Category ?>" id="ch1" checked>
                            <?php echo $language[$Products_sub_Category]??"" ?>
                        </label>
                      </div>
                    </span>
                  </li>

                  <li><span><?php echo $language["Size"] ?></span></li>
                  <li><span><?php echo $Products_Sizes ?></span></li>
                </ul>
              </div>
            </div>
          </div>
          <!-- third tab-pane -->
          <div class="tab-pane fade third-tab-pane" id="pills-contact">
            <div class="single-product-desc">
              <?php
                $id_prudoct_review = $_SESSION['id_name_prudoct'];
                $select_product_reviw="SELECT * FROM `reviews` WHERE `id_prudoct` = '$id_prudoct_review'";
                $query_product_reviw=mysqli_query($conn_store_admin,$select_product_reviw);
                while($row_product_reviw=mysqli_fetch_assoc($query_product_reviw)):
              ?>
                <div class="grade-content">
                  <div class="d-flex align-items-center">
                    <span class="grade"><?php echo $language["Grade"] ?> </span>
                    <div class="rateyo rate mx-2"
                      data-rateyo-rating="<?php echo $row_product_reviw['rating'] ?>"
                      data-rateyo-num-stars="5"
                      data-rateyo-score="" id="rating"></div>
                  </div>
                  <h6 class="sub-title"><?php echo $language["Date"] ?></h6>
                  <p>
                    <?php 
                    $date=date_create($row_product_reviw['date']);
                    echo date_format($date,"d/m/Y");
                    ?>
                  </p>
                  <h4 class="title"><?php echo $language["demo"] ?></h4>
                  <p><?php echo $row_product_reviw['comment_star'] ?></p>
                  <br>
                </div>
              <?php endwhile; ?>
                <button class="review btn theme-btn--dark3 theme-btn--dark3-sm btn--sm rounded-5 mt-15">
                  <?php echo $language["Write your review"] ?> !
                </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- product tab end -->

<!-- new arrival section start -->
<section class="theme1 bg-white pb-70">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="section-title text-center mb-30">
          <h2 class="title text-dark text-capitalize"><?php echo $language["recommended and the best rates from the same categories"] ?></h2>
          <p class="text mt-10"><?php echo $language["Add Related products to weekly line up"] ?></p>
        </div>
      </div>
      <div class="col-12">
        <div class="product-slider-init slick-nav">
          <?php
            $select_product_same_store="SELECT * FROM `prudocts` WHERE `Products_Category`='$Products_Category' ORDER BY `avg_rates` DESC";
            $query_product_same_store=mysqli_query($conn_store_admin,$select_product_same_store);
            while ($row_product_same_store = mysqli_fetch_assoc($query_product_same_store)) :              
          ?>
            <div class="slider-item">
              <div class="card product-card">
                <div class="card-body p-0">
                  <div class="media flex-column">
                    <div class="product-thumbnail w-100 position-relative">
                      <?php
                        if($row_product_same_store['discout_prudoct'] > 0):
                      ?>
                        <span class="badge badge-success top-left">-<?php echo $row_product_same_store['discout_prudoct'] ?>%</span>
                        <?php else: ?>
                          <?php 
                            $twoDaysAgo = date('Y-m-d', strtotime('-2 days'));
                            $sql = "SELECT * FROM prudocts WHERE date_prudoct >= '$twoDaysAgo' AND `id_name_prudoct`='".$row_product_same_store['id_name_prudoct']."' "; 
                            $result = mysqli_query($conn_store_admin , $sql);
                            if(mysqli_num_rows($result) > 0){
                          ?>
                            <span class="badge badge-danger top-left"><?php echo $language["new"] ?></span>
                          <?php 
                            }else{

                            } 
                          ?>
                      <?php endif; ?>
                      <a class="d-block" href="single-product.php?lang=<?php echo $lang ?>&Id_prudoct=<?php echo $row_product_same_store['id_name_prudoct'] ?>">
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
                          <input type="hidden" name="id_product" value="<?php echo $row_product_same_store['id_name_prudoct'] ?>">
                          <input type="hidden" name="store_logo_pages" value="<?php echo $row_product_same_store['store_logo_prudoct'] ?>">
                          <input type="hidden" name="name_store_pages" value="<?php echo $row_product_same_store['store_name_prudoct'] ?>">
                          <input type="hidden" name="price_pages" value="<?php echo ($row_product_same_store['Product_Price']-($row_product_same_store['Product_Price']*$row_product_same_store['discout_prudoct']/100)) ?>">
                          <input type="hidden" name="Description_pages" value="<?php echo $row_product_same_store['Product_Short_Description'] ?>">
                          <input type="hidden" name="size_pages" value="<?php echo $row_product_same_store['Products_Sizes'] ?>">
                          <input type="hidden" name="color_pages" value="<?php echo $row_product_same_store['Product_Colors'] ?>">
                          <input type="hidden" name="name_product_pages_ar" value="<?php echo $row_product_same_store['Products_Name_arabic']  ?>">
                          <input type="hidden" name="name_store_pages_ar" value="<?php echo $row_product_same_store['store_name_prudoct_arbic'] ?>">
                          <input type="hidden" name="Description_pages_ar" value="<?php echo $row_product_same_store['Product_Short_Description_arabic'] ?>">
                          <input type="hidden" name="name_product_pages" value="<?php echo $row_product_same_store['Products_Name'] ?>">
                            
                          <button class="pro-btn" name="basket"><?php echo $language["Add to Basket"] ?></button>

                          <ul class="d-flex justify-content-center">
                            <li>
                              <button type="submit" name="compare">
                                <a>
                                  <span class="ion-ios-shuffle-strong"
                                        data-toggle="tooltip" data-placement="bottom"
                                        title="<?php echo $language["Add to compare"] ?>"> </span>
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
                                                  if(empty($row_product_same_store['avg_rates'])){
                                                    $row_product_same_store['avg_rates'] = 0;
                                                    echo $row_product_same_store['avg_rates'];
                                                  }else{
                                                    echo $row_product_same_store['avg_rates'];
                                                  }
                                                  ?>
                                                "
                            data-rateyo-num-stars="5"
                            data-rateyo-score="">
                          </div>
                        </div>
                        <div class="align-items-center d-flex mt-2">
                          <img src="Upload/<?php echo $row_product_same_store['store_logo_prudoct'] ?>" width="45px" height="45px" alt="img-logo">
                          <a href="./stores.php?lang=<?php echo $lang ?>" class="mx-3"><p><?php echo ($lang=="ar") ? $row_product_same_store['store_name_prudoct_arbic'] : $row_product_same_store['store_name_prudoct']; ?></p></a>
                        </div>
                        <h3 class="title my-10"><?php echo ($lang=="ar") ? $row_product_same_store['Products_Name_arabic'] : $row_product_same_store['Products_Name']; ?></h3>
                        <?php
                          if($row_product_same_store['discout_prudoct'] > 0):
                        ?>
                          <h6 class="product-price">
                            <del class="del m"><?php echo $row_product_same_store['Product_Price'] ?>JD</del>
                            <span class="onsale"><?php echo ($row_product_same_store['Product_Price']-($row_product_same_store['Product_Price']*$row_product_same_store['discout_prudoct']/100)) ?>JD</span>
                          </h6>
                        <?php else: ?>
                            <h6 class="product-price"><span class="onsale"><?php echo $row_product_same_store['Product_Price'] ?>JD</span></h6>
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
</section>
<!-- new arrival section end -->
<!-- new arrival section start -->
<section class="theme1 bg-white pb-70">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="section-title text-center mb-30">
          <h2 class="title text-dark text-capitalize"><?php echo $language["products from the same store"] ?></h2>
          <p class="text mt-10"><?php echo $language["other products in the same category"] ?>:</p>
        </div>
      </div>
      <div class="col-12">
        <div class="product-slider-init slick-nav">
          <?php
            $select_product_same_store="SELECT * FROM `prudocts` WHERE `store_name_prudoct` = '$store_name_prudoct'";
            $query_product_same_store=mysqli_query($conn_store_admin,$select_product_same_store);
            while($row_product_same_store=mysqli_fetch_assoc($query_product_same_store)):
              
              $id = $row_product_same_store['id_name_prudoct'];
              $sql_avg = "SELECT AVG(rating) AS `average_rating` FROM `reviews` WHERE `id_prudoct` = '$id' AND `rating` BETWEEN 1 AND 5";
              $query_avg = mysqli_query($conn_store_admin ,$sql_avg);
              $result_avg = mysqli_fetch_assoc($query_avg);
          ?>
            <div class="slider-item">
              <div class="card product-card">
                <div class="card-body p-0">
                  <div class="media flex-column">
                    <div class="product-thumbnail w-100 position-relative">
                      <?php
                        if($row_product_same_store['discout_prudoct'] > 0):
                      ?>
                        <span class="badge badge-success top-left">-<?php echo $row_product_same_store['discout_prudoct'] ?>%</span>
                        <?php else: ?>
                          <?php 
                            $twoDaysAgo = date('Y-m-d', strtotime('-2 days'));
                            $sql = "SELECT * FROM prudocts WHERE date_prudoct >= '$twoDaysAgo' AND `id_name_prudoct`='".$row_product_same_store['id_name_prudoct']."' "; 
                            $result = mysqli_query($conn_store_admin , $sql);
                            if(mysqli_num_rows($result) > 0){
                          ?>
                            <span class="badge badge-danger top-left"><?php echo $language["new"] ?></span>
                          <?php 
                            }else{

                            } 
                          ?>
                      <?php endif; ?>
                      <a class="d-block" href="single-product.php?lang=<?php echo $lang ?>&Id_prudoct=<?php echo $row_product_same_store['id_name_prudoct'] ?>">
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
                          <input type="hidden" name="id_product" value="<?php echo $row_product_same_store['id_name_prudoct'] ?>">
                          <input type="hidden" name="store_logo_pages" value="<?php echo $row_product_same_store['store_logo_prudoct'] ?>">
                          <input type="hidden" name="name_store_pages" value="<?php echo $row_product_same_store['store_name_prudoct'] ?>">
                          <input type="hidden" name="price_pages" value="<?php echo ($row_product_same_store['Product_Price']-($row_product_same_store['Product_Price']*$row_product_same_store['discout_prudoct']/100)) ?>">
                          <input type="hidden" name="Description_pages" value="<?php echo $row_product_same_store['Product_Short_Description'] ?>">
                          <input type="hidden" name="size_pages" value="<?php echo $row_product_same_store['Products_Sizes'] ?>">
                          <input type="hidden" name="color_pages" value="<?php echo $row_product_same_store['Product_Colors'] ?>">
                          <input type="hidden" name="name_product_pages_ar" value="<?php echo $row_product_same_store['Products_Name_arabic'] ?>">
                          <input type="hidden" name="name_store_pages_ar" value="<?php echo $row_product_same_store['store_name_prudoct_arbic'] ?>">
                          <input type="hidden" name="Description_pages_ar" value="<?php echo $row_product_same_store['Product_Short_Description_arabic'] ?>">
                          <input type="hidden" name="name_product_pages" value="<?php echo $row_product_same_store['Products_Name'] ?>">
                          
                          <button class="pro-btn" name="basket"><?php echo $language["Add to Basket"] ?></button>

                          <ul class="d-flex justify-content-center">
                            <li>
                              <button type="submit" name="compare">
                                <a>
                                  <span class="ion-ios-shuffle-strong"
                                        data-toggle="tooltip" data-placement="bottom"
                                        title="<?php echo $language["Add to compare"] ?>"> </span>
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
                                                  if(empty($result_avg['average_rating'])){
                                                    $result_avg['average_rating'] = 0;
                                                    echo $result_avg['average_rating'];
                                                  }else{
                                                    echo $result_avg['average_rating'];
                                                  }
                                                ?>
                                              "
                          data-rateyo-num-stars="5"
                          data-rateyo-score="">
                          </div>
                        </div>
                        <div class="align-items-center d-flex mt-2">
                          <img src="Upload/<?php echo $row_product_same_store['store_logo_prudoct'] ?>" width="45px" height="45px" alt="img-logo">
                          <a href="./stores.php?lang=<?php echo $lang ?>" class="mx-3"><p><?php echo ($lang=="ar") ? $row_product_same_store['store_name_prudoct_arbic'] : $row_product_same_store['store_name_prudoct']; ?></p></a>
                        </div>
                        <h3 class="title my-10"><?php echo $row_product_same_store['Products_Name'] ?></h3>
                        <?php
                          if($row_product_same_store['discout_prudoct'] > 0):
                        ?>
                          <h6 class="product-price">
                            <del class="del m"><?php echo $row_product_same_store['Product_Price'] ?>JD</del>
                            <span class="onsale"><?php echo ($row_product_same_store['Product_Price']-($row_product_same_store['Product_Price']*$row_product_same_store['discout_prudoct']/100)) ?>JD</span>
                          </h6>
                        <?php else: ?>
                            <h6 class="product-price"><span class="onsale"><?php echo $row_product_same_store['Product_Price'] ?>JD</span></h6>
                        <?php endif; ?>
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
</section>
<!-- new arrival section end -->

<?php
include "./includes/footer.php";
?>
