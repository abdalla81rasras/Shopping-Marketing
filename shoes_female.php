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

<!-- breadcrumb-section start -->
<nav class="breadcrumb-section theme1 breadcrumb-bg1">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-title text-center my-20">
                    <h2 class="title text-dark text-capitalize"><?php echo $language['Page'] ?></h2>
                </div>
            </div>
            <div class="col-12">
                <ol class="breadcrumb bg-transparent m-0 p-0 align-items-center justify-content-center">
                    <li class="breadcrumb-item"><a href="index.php?lang=<?php echo $lang ?>"><?php echo $language['Home'] ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo $language['Page'] ?></li>
                </ol>
            </div>
        </div>
    </div>
</nav>
<!-- breadcrumb-section end -->
<!-- product tab start -->
<div class="product-tab pb-70">
    <div class="container grid-wraper">
        <div class="grid-nav-wraper mb-30">
            <div class="row align-items-center">
                <div class="col-12 col-md-6 mb-3 mb-md-0">
                    <nav class="Shop-grid-nav">
                        <ul class="nav nav-pills align-items-center" id="pills-tab" role="tablist">
                            <li class="nav-item mx-0">
                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                                    role="tab" aria-controls="pills-home" aria-selected="true">
                                    <i class="fa fa-th"></i>

                                </a>
                            </li>
                            <li class="nav-item mx-15">
                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                                    role="tab" aria-controls="pills-profile" aria-selected="false"><i
                                        class="fa fa-list"></i></a>
                            </li>
                            <?php
                                $query = "SELECT * FROM prudocts WHERE `Products_sub_Category`='Female-SHOES'";
                                $results = mysqli_query($conn_store_admin,$query);
                                $num = mysqli_num_rows($results);
                               
                            ?>
                                <li> 
                                    <span class="total-products text-capitalize"><?php echo $language['There are'] ?> <?php echo $num ?> <?php echo $language['products'] ?>.</span>
                                </li>

                        </ul>
                    </nav>
                </div>
                <div class="col-12 col-md-6 position-relative">
                    <form action="" method="post">
                        <div class="Shop-grid-button d-flex align-items-center">
                            <span class="sort-by"><?php echo $language['Sort by'] ?> :</span>
                            <select class="form-control-sm" name="option">
                                <option class="dropdown-item list-group-item list-group-item-action" value=""><a href="#"> -- <?php echo $language['Select Option'] ?> --</a></option>
                                <option class="dropdown-item list-group-item list-group-item-action" value="sub_cat_shoes_female"><a href="#"> <?php echo $language['Sub categories'] ?></a></option>
                                <option class="dropdown-item list-group-item list-group-item-action" value="high_price_shoes_female"><a href="#"> <?php echo $language['High price to low'] ?></a></option>
                                <option class="dropdown-item list-group-item list-group-item-action" value="high_rite_shoes_female"><a href="#"> <?php echo $language['High rate to low'] ?></a></option>
                                <option class="dropdown-item list-group-item list-group-item-action" value="views_shoes_female"><a href="#"> <?php echo $language['Products View'] ?></a></option>
                            </select>
                            <div class="text-center mx-4">
                                <button class="btn theme-btn--dark1 btn--md" name="submit_option"><?php echo $language['Submit'] ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- product-tab-nav end -->
        <div class="tab-content" id="pills-tabContent">
            <!-- first tab-pane -->
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="row grid-view theme1">
                    <?php
                    if(isset($_POST['submit_option'])){
                        $query = "SELECT * FROM prudocts WHERE `Products_sub_Category`='Female-SHOES'";
                        switch( $_POST['option'] ){
                            case 'sub_cat_shoes_female':
                                $query .= " ORDER BY Products_sub_Category DESC";
                                break;
                            case 'high_price_shoes_female':
                                $query .= " ORDER BY Product_Price DESC";
                                break;
                            case 'high_rite_shoes_female':
                                $query .= " ORDER BY avg_rates DESC";
                                break;
                            case 'views_shoes_female':
                                $query .= " ORDER BY product_views DESC";
                                break;
                        }
                        $results = mysqli_query($conn_store_admin,$query);
                        while($row=mysqli_fetch_array($results)){
                    ?>
                        
                        <div class="col-sm-6 col-md-4 mb-30">
                            <div class="card product-card">
                                <div class="card-body p-0">
                                    <div class="product-thumbnail position-relative">
                                        <?php
                                            if($row['discout_prudoct'] > 0):
                                        ?>
                                            <span class="badge badge-success top-left">-<?php echo $row['discout_prudoct'] ?>%</span>
                                            <?php else: ?>
                                                <?php 
                                                    $twoDaysAgo = date('Y-m-d', strtotime('-2 days'));
                                                    $sql = "SELECT * FROM prudocts WHERE date_prudoct >= '$twoDaysAgo' AND `id_name_prudoct`='".$row['id_name_prudoct']."' "; 
                                                    $result = mysqli_query($conn_store_admin , $sql);
                                                    if(mysqli_num_rows($result) > 0){
                                                ?>
                                                    <span class="badge badge-danger top-left"><?php echo $language["new"] ?></span>
                                                <?php 
                                                    }else{

                                                    } 
                                                ?>
                                        <?php endif; ?>
                                        <a href="single-product.php?lang=<?php echo $lang ?>&Id_prudoct=<?php echo $row['id_name_prudoct'] ?>">
                                            <img class="first-img" src="assets/img/product/1.jpg" alt="thumbnail">
                                        </a>
                                        <form action="" method="POST">
									        <div class="product-links d-flex d-flex justify-content-between">
												<?php 
												    if(!empty($_SESSION['id_users'])):
												?>
									            	<input type="hidden" name="id_user" value="<?php echo $_SESSION['id_users'] ?>">
												<?php endif; ?>
									            <input type="hidden" name="id_product" value="<?php echo $row['id_name_prudoct'] ?>">
									            <input type="hidden" name="store_logo_pages" value="<?php echo $row['store_logo_prudoct'] ?>">
									            <input type="hidden" name="name_store_pages" value="<?php echo $row['store_name_prudoct'] ?>">
									            <input type="hidden" name="price_pages" value="<?php echo ($row['Product_Price']-($row['Product_Price']*$row['discout_prudoct']/100)) ?>">
									            <input type="hidden" name="Description_pages" value="<?php echo $row['Product_Short_Description'] ?>">
									            <input type="hidden" name="size_pages" value="<?php echo $row['Products_Sizes'] ?>">
									            <input type="hidden" name="color_pages" value="<?php echo $row['Product_Colors'] ?>">
									            <input type="hidden" name="name_product_pages_ar" value="<?php echo $row['Products_Name_arabic'] ?>">
									            <input type="hidden" name="name_store_pages_ar" value="<?php echo $row['store_name_prudoct_arbic'] ?>">
									            <input type="hidden" name="Description_pages_ar" value="<?php echo $row['Product_Short_Description_arabic'] ?>">
									            <input type="hidden" name="name_product_pages" value="<?php echo $row['Products_Name'] ?>">
									            
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
                                    <div class="product-desc">
                                        <h3 class="title"><?php echo ($lang=="ar") ? $row['Products_Name_arabic'] : $row['Products_Name']; ?></h3>
                                        <div class="star-rating my-10">
                                            <div class="rateyo" id="rating"
                                                data-rateyo-rating="<?php  
                                                                        if(empty($row['avg_rates'])){
                                                                            $row['avg_rates'] = 0;
                                                                            echo $row['avg_rates'];
                                                                        }else{
                                                                            echo $row['avg_rates'];
                                                                        }
                                                                    ?>
                                                                    "
                                                data-rateyo-num-stars="5"
                                                data-rateyo-score="">
                                            </div>
                                        </div>
                                        <div class="align-items-center d-flex mt-2 mb-3">
                                            <img src="Upload/<?php echo $row['store_logo_prudoct'] ?>" width="45px" height="45px" alt="img-logo">
                                            <a href="./stores.php?lang=<?php echo $lang ?>" class="mx-3"><p><?php echo ($lang=="ar") ? $row['store_name_prudoct_arbic'] : $row['store_name_prudoct']; ?></p></a>
                                        </div>
                                        <?php
                                            if($row['discout_prudoct'] > 0):
                                        ?>
                                            <h6 class="product-price">
                                                <del class="del m"><?php echo $row['Product_Price'] ?>JD</del>
                                                <span class="onsale"><?php echo ($row['Product_Price']-($row['Product_Price']*$row['discout_prudoct']/100)) ?>JD</span>
                                            </h6>
                                        <?php else: ?>
                                            <h6 class="product-price"><span class="onsale"><?php echo $row['Product_Price'] ?>JD</span></h6>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <!-- product-list End -->
                        </div>
                    <?php
                        }
                    } else {
                        $query = "SELECT * FROM `prudocts` WHERE `Products_sub_Category`='Female-SHOES'";
                        $results = mysqli_query($conn_store_admin,$query);
                        while($row=mysqli_fetch_array($results)){
                    ?>
                        
                        <div class="col-sm-6 col-md-4 mb-30">
                            <div class="card product-card">
                                <div class="card-body p-0">
                                    <div class="product-thumbnail position-relative">
                                        <?php
                                            if($row['discout_prudoct'] > 0):
                                        ?>
                                            <span class="badge badge-success top-left">-<?php echo $row['discout_prudoct'] ?>%</span>
                                            <?php else: ?>
                                                <?php 
                                                    $twoDaysAgo = date('Y-m-d', strtotime('-2 days'));
                                                    $sql = "SELECT * FROM prudocts WHERE date_prudoct >= '$twoDaysAgo' AND `id_name_prudoct`='".$row['id_name_prudoct']."' "; 
                                                    $result = mysqli_query($conn_store_admin , $sql);
                                                    if(mysqli_num_rows($result) > 0){
                                                ?>
                                                    <span class="badge badge-danger top-left"><?php echo $language["new"] ?></span>
                                                <?php 
                                                    }else{

                                                    } 
                                                ?>
                                        <?php endif; ?>
                                        <a href="single-product.php?lang=<?php echo $lang ?>&Id_prudoct=<?php echo $row['id_name_prudoct'] ?>">
                                            <img class="first-img" src="assets/img/product/1.jpg" alt="thumbnail">
                                        </a>
                                        <form action="" method="POST">
									        <div class="product-links d-flex d-flex justify-content-between">
												<?php 
												    if(!empty($_SESSION['id_users'])):
												?>
									            	<input type="hidden" name="id_user" value="<?php echo $_SESSION['id_users'] ?>">
												<?php endif; ?>
									            <input type="hidden" name="id_product" value="<?php echo $row['id_name_prudoct'] ?>">
									            <input type="hidden" name="store_logo_pages" value="<?php echo $row['store_logo_prudoct'] ?>">
									            <input type="hidden" name="name_store_pages" value="<?php echo $row['store_name_prudoct'] ?>">
									            <input type="hidden" name="price_pages" value="<?php echo ($row['Product_Price']-($row['Product_Price']*$row['discout_prudoct']/100)) ?>">
									            <input type="hidden" name="Description_pages" value="<?php echo $row['Product_Short_Description'] ?>">
									            <input type="hidden" name="size_pages" value="<?php echo $row['Products_Sizes'] ?>">
									            <input type="hidden" name="color_pages" value="<?php echo $row['Product_Colors'] ?>">
									            <input type="hidden" name="name_product_pages_ar" value="<?php echo $row['Products_Name_arabic'] ?>">
									            <input type="hidden" name="name_store_pages_ar" value="<?php echo $row['store_name_prudoct_arbic'] ?>">
									            <input type="hidden" name="Description_pages_ar" value="<?php echo $row['Product_Short_Description_arabic'] ?>">
									            <input type="hidden" name="name_product_pages" value="<?php echo $row['Products_Name'] ?>">
									            
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
                                    <div class="product-desc">
                                        <h3 class="title"><?php echo ($lang=="ar") ? $row['Products_Name_arabic'] : $row['Products_Name']; ?></h3>
                                        <div class="star-rating my-10">
                                            <div class="rateyo" id="rating"
                                                data-rateyo-rating="<?php  
                                                                        if(empty($row['avg_rates'])){
                                                                            $row['avg_rates'] = 0;
                                                                            echo $row['avg_rates'];
                                                                        }else{
                                                                            echo $row['avg_rates'];
                                                                        }
                                                                    ?>
                                                                    "
                                                data-rateyo-num-stars="5"
                                                data-rateyo-score="">
                                            </div>
                                        </div>
                                        <div class="align-items-center d-flex mt-2 mb-3">
                                            <img src="Upload/<?php echo $row['store_logo_prudoct'] ?>" width="45px" height="45px" alt="img-logo">
                                            <a href="./stores.php?lang=<?php echo $lang ?>" class="mx-3"><p><?php echo ($lang=="ar") ? $row['store_name_prudoct_arbic'] : $row['store_name_prudoct']; ?></p></a>
                                        </div>
                                        <?php
                                            if($row['discout_prudoct'] > 0):
                                        ?>
                                            <h6 class="product-price">
                                                <del class="del m"><?php echo $row['Product_Price'] ?>JD</del>
                                                <span class="onsale"><?php echo ($row['Product_Price']-($row['Product_Price']*$row['discout_prudoct']/100)) ?>JD</span>
                                            </h6>
                                        <?php else: ?>
                                            <h6 class="product-price"><span class="onsale"><?php echo $row['Product_Price'] ?>JD</span></h6>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <!-- product-list End -->
                        </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
            <!-- second tab-pane -->
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="row grid-view-list theme1">
                    <?php
                        if(isset($_POST['submit_option'])){
                            $query = "SELECT * FROM prudocts WHERE `Products_sub_Category`='Female-SHOES'";
                            switch( $_POST['option'] ){
                                case 'sub_cat_shoes_female':
                                    $query .= " ORDER BY Products_sub_Category DESC";
                                    break;
                                case 'high_price_shoes_female':
                                    $query .= " ORDER BY Product_Price DESC";
                                    break;
                                case 'high_rite_shoes_female':
                                    $query .= " ORDER BY avg_rates DESC";
                                    break;
                                case 'views_shoes_female':
                                    $query .= " ORDER BY product_views DESC";
                                    break;
                            }
                            $results = mysqli_query($conn_store_admin,$query);
                            while($row=mysqli_fetch_array($results)){
                    ?>
                        
                        <div class="col-12 mb-30">
                            <div class="card product-card">
                                <div class="card-body p-0">
                                    <div class="media flex-column flex-sm-row">
                                        <div class="product-thumbnail position-relative">
                                            <?php
                                                if($row['discout_prudoct'] > 0):
                                            ?>
                                                <span class="badge badge-success top-left">-<?php echo $row['discout_prudoct'] ?>%</span>
                                                <?php else: ?>
                                                    <?php 
                                                        $twoDaysAgo = date('Y-m-d', strtotime('-2 days'));
                                                        $sql = "SELECT * FROM prudocts WHERE date_prudoct >= '$twoDaysAgo' AND `id_name_prudoct`='".$row['id_name_prudoct']."' "; 
                                                        $result = mysqli_query($conn_store_admin , $sql);
                                                        if(mysqli_num_rows($result) > 0){
                                                    ?>
                                                        <span class="badge badge-danger top-left"><?php echo $language["new"] ?></span>
                                                    <?php 
                                                        }else{

                                                        } 
                                                    ?>
                                            <?php endif; ?>
                                            <a href="single-product.php?lang=<?php echo $lang ?>&Id_prudoct=<?php echo $row['id_name_prudoct'] ?>">
                                                <img class="first-img" src="assets/img/product/1.jpg" alt="thumbnail">
                                            </a>
                                           <form action="" method="POST">
                                                <div class="product-links d-flex d-flex justify-content-between">
                                                    <?php 
                                                        if(!empty($_SESSION['id_users'])):
                                                    ?>
                                                        <input type="hidden" name="id_user" value="<?php echo $_SESSION['id_users'] ?>">
                                                    <?php endif; ?>
                                                    <input type="hidden" name="id_product" value="<?php echo $row['id_name_prudoct'] ?>">
                                                    <input type="hidden" name="store_logo_pages" value="<?php echo $row['store_logo_prudoct'] ?>">
                                                    <input type="hidden" name="name_store_pages" value="<?php echo $row['store_name_prudoct'] ?>">
                                                    <input type="hidden" name="price_pages" value="<?php echo ($row['Product_Price']-($row['Product_Price']*$row['discout_prudoct']/100)) ?>">
                                                    <input type="hidden" name="Description_pages" value="<?php echo $row['Product_Short_Description'] ?>">
                                                    <input type="hidden" name="size_pages" value="<?php echo $row['Products_Sizes'] ?>">
                                                    <input type="hidden" name="color_pages" value="<?php echo $row['Product_Colors'] ?>">
                                                    <input type="hidden" name="name_product_pages_ar" value="<?php echo $row['Products_Name_arabic'] ?>">
                                                    <input type="hidden" name="name_store_pages_ar" value="<?php echo $row['store_name_prudoct_arbic'] ?>">
                                                    <input type="hidden" name="Description_pages_ar" value="<?php echo $row['Product_Short_Description_arabic'] ?>">
                                                    <input type="hidden" name="name_product_pages" value="<?php echo $row['Products_Name'] ?>">
                                                    
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
                                        <div class="media-body pl-sm-4 mt-30 mt-sm-0 mx-25">
                                            <div class="product-desc">
                                                <h3 class="title"><?php echo ($lang=="ar") ? $row['Products_Name_arabic'] : $row['Products_Name']; ?></h3>
                                                <div class="star-rating mb-10 mt-10">
                                                    <div class="rateyo" id="rating"
                                                        data-rateyo-rating="<?php  
                                                                                if(empty($row['avg_rates'])){
                                                                                    $row['avg_rates'] = 0;
                                                                                    echo $row['avg_rates'];
                                                                                }else{
                                                                                    echo $row['avg_rates'];
                                                                                }
                                                                            ?>
                                                                            "
                                                        data-rateyo-num-stars="5"
                                                        data-rateyo-score="">
                                                    </div>
                                                </div>
                                                <div class="align-items-center d-flex mt-2 mb-3">
                                                    <img src="Upload/<?php echo $row['store_logo_prudoct'] ?>" width="45px" height="45px" alt="img-logo">
                                                    <a href="./stores.php?lang=<?php echo $lang ?>" class="mx-3"><p><?php echo ($lang=="ar") ? $row['store_name_prudoct_arbic'] : $row['store_name_prudoct']; ?></p></a>
                                                </div>
                                                <?php
                                                    if($row['discout_prudoct'] > 0):
                                                ?>
                                                    <h6 class="product-price">
                                                        <del class="del m"><?php echo $row['Product_Price'] ?>JD</del>
                                                        <span class="onsale"><?php echo ($row['Product_Price']-($row['Product_Price']*$row['discout_prudoct']/100)) ?>JD</span>
                                                    </h6>
                                                <?php else: ?>
                                                    <h6 class="product-price"><span class="onsale"><?php echo $row['Product_Price'] ?>JD</span></h6>
                                                <?php endif; ?>
                                            </div>
                                            <ul class="product-list-des">
                                                <li>
                                                    <?php echo ($lang=="ar") ? $row['Product_Full_Description_arbic'] : $row['Product_Full_Description']; ?>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- product-list End -->
                        </div>
                    <?php
                            }
                        } else {
                            $query = "SELECT * FROM `prudocts` WHERE `Products_sub_Category`='Female-SHOES'";
                            $results = mysqli_query($conn_store_admin,$query);
                            while($row=mysqli_fetch_array($results)){
                    ?>
                        
                        <div class="col-12 mb-30">
                            <div class="card product-card">
                                <div class="card-body p-0">
                                    <div class="media flex-column flex-sm-row">
                                        <div class="product-thumbnail position-relative">
                                            <?php
                                                if($row['discout_prudoct'] > 0):
                                            ?>
                                                <span class="badge badge-success top-left">-<?php echo $row['discout_prudoct'] ?>%</span>
                                                <?php else: ?>
                                                    <?php 
                                                        $twoDaysAgo = date('Y-m-d', strtotime('-2 days'));
                                                        $sql = "SELECT * FROM prudocts WHERE date_prudoct >= '$twoDaysAgo' AND `id_name_prudoct`='".$row['id_name_prudoct']."' "; 
                                                        $result = mysqli_query($conn_store_admin , $sql);
                                                        if(mysqli_num_rows($result) > 0){
                                                    ?>
                                                        <span class="badge badge-danger top-left"><?php echo $language["new"] ?></span>
                                                    <?php 
                                                        }else{

                                                        } 
                                                    ?>
                                            <?php endif; ?>
                                            <a href="single-product.php?lang=<?php echo $lang ?>&Id_prudoct=<?php echo $row['id_name_prudoct'] ?>">
                                                <img class="first-img" src="assets/img/product/1.jpg" alt="thumbnail">
                                            </a>
                                           <form action="" method="POST">
                                                <div class="product-links d-flex d-flex justify-content-between">
                                                    <?php 
                                                        if(!empty($_SESSION['id_users'])):
                                                    ?>
                                                        <input type="hidden" name="id_user" value="<?php echo $_SESSION['id_users'] ?>">
                                                    <?php endif; ?>
                                                    <input type="hidden" name="id_product" value="<?php echo $row['id_name_prudoct'] ?>">
                                                    <input type="hidden" name="store_logo_pages" value="<?php echo $row['store_logo_prudoct'] ?>">
                                                    <input type="hidden" name="name_store_pages" value="<?php echo $row['store_name_prudoct'] ?>">
                                                    <input type="hidden" name="price_pages" value="<?php echo ($row['Product_Price']-($row['Product_Price']*$row['discout_prudoct']/100)) ?>">
                                                    <input type="hidden" name="Description_pages" value="<?php echo $row['Product_Short_Description'] ?>">
                                                    <input type="hidden" name="size_pages" value="<?php echo $row['Products_Sizes'] ?>">
                                                    <input type="hidden" name="color_pages" value="<?php echo $row['Product_Colors'] ?>">
                                                    <input type="hidden" name="name_product_pages_ar" value="<?php echo $row['Products_Name_arabic'] ?>">
                                                    <input type="hidden" name="name_store_pages_ar" value="<?php echo $row['store_name_prudoct_arbic'] ?>">
                                                    <input type="hidden" name="Description_pages_ar" value="<?php echo $row['Product_Short_Description_arabic'] ?>">
                                                    <input type="hidden" name="name_product_pages" value="<?php echo $row['Products_Name'] ?>">
                                                    
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
                                        <div class="media-body pl-sm-4 mt-30 mt-sm-0 mx-25">
                                            <div class="product-desc">
                                                <h3 class="title"><?php echo ($lang=="ar") ? $row['Products_Name_arabic'] : $row['Products_Name']; ?></h3>
                                                <div class="star-rating mb-10 mt-10">
                                                    <div class="rateyo" id="rating"
                                                        data-rateyo-rating="<?php  
                                                                                if(empty($row['avg_rates'])){
                                                                                    $row['avg_rates'] = 0;
                                                                                    echo $row['avg_rates'];
                                                                                }else{
                                                                                    echo $row['avg_rates'];
                                                                                }
                                                                            ?>
                                                                            "
                                                        data-rateyo-num-stars="5"
                                                        data-rateyo-score="">
                                                    </div>
                                                </div>
                                                <div class="align-items-center d-flex mt-2 mb-3">
                                                    <img src="Upload/<?php echo $row['store_logo_prudoct'] ?>" width="45px" height="45px" alt="img-logo">
                                                    <a href="./stores.php?lang=<?php echo $lang ?>" class="mx-3"><p><?php echo ($lang=="ar") ? $row['store_name_prudoct_arbic'] : $row['store_name_prudoct']; ?></p></a>
                                                </div>
                                                <?php
                                                    if($row['discout_prudoct'] > 0):
                                                ?>
                                                    <h6 class="product-price">
                                                        <del class="del m"><?php echo $row['Product_Price'] ?>JD</del>
                                                        <span class="onsale"><?php echo ($row['Product_Price']-($row['Product_Price']*$row['discout_prudoct']/100)) ?>JD</span>
                                                    </h6>
                                                <?php else: ?>
                                                    <h6 class="product-price"><span class="onsale"><?php echo $row['Product_Price'] ?>JD</span></h6>
                                                <?php endif; ?>
                                            </div>
                                            <ul class="product-list-des">
                                                <li>
                                                    <?php echo ($lang=="ar") ? $row['Product_Full_Description_arbic'] : $row['Product_Full_Description']; ?>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- product-list End -->
                        </div>
                    <?php
                            }
                        }
                    ?>   
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <nav class="pagination-section mt-30">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <ul class="pagination justify-content-center">
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#"><i class="ion-chevron-right"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- product tab end -->

<?php
include "./includes/footer.php";
?>