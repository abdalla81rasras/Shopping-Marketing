<?php
session_start();
if(!isset($_SESSION['id_users'])){
    
}

include "./includes/connection_1.php";
include "./includes/connection_2.php";
include "./includes/header.php";
include "./includes/delete.php";

include "./includes/to_checkout.php";
?>

<!-- breadcrumb-section start -->
<nav class="breadcrumb-section theme1 breadcrumb-bg1">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="breadcrumb-title text-center my-20">
          <h2 class="title text-dark text-capitalize"><?php echo $language["Favorites"] ?></h2>
        </div>
      </div>
      <div class="col-12">
        <ol
          class="breadcrumb bg-transparent m-0 p-0 align-items-center justify-content-center"
        >
          <li class="breadcrumb-item"><a href="index.php?lang=<?php echo $lang ?>"><?php echo $language["Home"] ?></a></li>
          <li class="breadcrumb-item active" aria-current="page">
            <?php echo $language["Favorites"] ?>
          </li>
        </ol>
      </div>
    </div>
  </div>
</nav>
<!-- breadcrumb-section end -->

<!-- product tab start -->
<section class="whish-list-section theme1 pb-70">
    <div class="container grid-wraper">
        <div class="row">
            <div class="col-12">
                <?php 
                    if(isset($_GET['action'])){
                        if($_GET['action']=='updated'){
                            ?>
                                <div class="alert alert-info alert-dismissible fade show" role="alert">
                                    <?php echo $language['Product Already Added, and but has been qty incremented'] ?>.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php
                        }else{
                            ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <?php echo $language['Product added to favorite'] ?>.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div> 
                            <?php
                        }
                    }   
                ?>
                <h3 class="title pb-30 text-capitalize"><?php echo $language["Favorites"] ?></h3>
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center" scope="col"><?php echo $language["Product Image"] ?></th>
                                <th class="text-center" scope="col"><?php echo $language["Product Name"] ?></th>
                                <th class="text-center" scope="col"><?php echo $language["Logo & Name Store"] ?></th>
                                <th class="text-center" scope="col"><?php echo $language["Stock Status"] ?></th>
                                <th class="text-center" scope="col"><?php echo $language["Price"] ?></th>
                                <th class="text-center" scope="col"><?php echo $language["Qty"] ?></th>
                                <th class="text-center" scope="col"><?php echo $language["Action"] ?></th>
                                <th class="text-center" scope="col"><?php echo $language["Checkout"] ?></th>
                            </tr>
                        </thead>
                        <?php
                            if(!empty($_SESSION['id_users'])):
                        ?>
                            <tbody>
                                <?php 
                                    $id_users = $_SESSION['id_users'];
                                    $select_favorite="SELECT * FROM `topages_favorite` WHERE `id_user`='$id_users' ORDER BY `id_favorite` DESC";
                                    $query_favorite=mysqli_query($conn_main_admin , $select_favorite);
                                    while($row=mysqli_fetch_assoc($query_favorite)):
                                    $ids = $row['id_prudoct'];
                                ?>
                                    <tr>
                                        <th class="text-center" scope="row">
                                            <img src="assets/img/product/6.jpg" id="<?php echo $row['id_favorite']; ?>" alt="img">
                                        </th>
                                        <td class="text-center">
                                            <span class="whish-title"><?php echo ($lang=="ar") ? $row['name_product_ar_favorite'] : $row['prudoct_name_favorite']; ?></span>
                                        </td>
                                        <td>
                                            <div class="align-items-center justify-content-center d-flex">
                                                <img src="./Upload/<?php echo $row['store_logo_favorite']; ?>" width="50px" height="50px" alt="img-logo">
                                                <p class="mx-3"><?php echo ($lang=="ar") ? $row['name_store_ar_favorite'] : $row['name_logo_favorite']; ?></p>
                                            </div>                                    
                                        </td>
                                        <?php 
                                            $select_prudoct="SELECT * FROM `prudocts` WHERE `id_name_prudoct`='$ids'";
                                            $query_prudoct=mysqli_query($conn_store_admin , $select_prudoct);
                                            $row_nums_prudoct=mysqli_num_rows($query_prudoct);

                                            if($row_nums_prudoct > 0){ 

                                                $rows=mysqli_fetch_assoc($query_prudoct);
                                                $stock=$rows['status_product_qty'];
                                                
                                                if($stock == 1){
                                                    $new_stock=$language['In stock'];
                                        ?>
                                            <td class="text-center">
                                                <span class="badge badge-danger position-static my-badge"><?php echo $new_stock; ?></span>
                                            </td>
                                        <?php  
                                                }else{
                                                    $new_stock=$language['Out of stock'];
                                        ?>
                                            <td class="text-center theme2">
                                                <span class="badge badge-danger position-static my-badge"><?php echo $new_stock; ?></span>
                                            </td>
                                        <?php 
                                                }

                                                $update_status = "UPDATE `prudocts` SET `stock_status`='$new_stock' WHERE `id_name_prudoct`='$ids'";
                                                if(!mysqli_query($conn_store_admin,$update_status)){
                                                    echo "Error Update" . mysqli_error($conn_store_admin);
                                                }
                                        
                                            }else{
                                        ?>
                                            <td class="text-center">
                                                <span class="badge bg-info position-static my-badge"><?php echo $language["Product not found"] ?></span>
                                            </td>
                                        <?php 
                                            }
                                        ?>
                                        <td class="text-center">
                                            <span class="whish-list-price"><span id="total"></span>JOD</span>
                                            <span id="prices" hidden><?php echo $row['price_favorite'] ?></span>
                                        </td>
                                        <form action="" method="POST">
                                            <input type="hidden" name="id_favorite" value="<?php echo $row['id_favorite'] ?>">
                                            <input type="hidden" name="id_prudocts" value="<?php echo $ids ?>">
                                            <td class="text-center">
                                                <div class="product-count style">
                                                    <div class="count d-flex justify-content-center">
                                                        <input type="number" name="qtys" id="qty" min="1" max="10" step="1" value="<?php echo $row['qty_favortie'] ?>">
                                                        
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <button type="submit" name="delete_wishlist">
                                                    <a href="javascript::void()"> 
                                                        <span class="trash" title="Delete">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </span>
                                                    </a>
                                                </button>
                                                <?php 
                                                    $select_prudoct="SELECT * FROM `prudocts` WHERE `id_name_prudoct`='$ids'";
                                                    $query_prudocts=mysqli_query($conn_store_admin , $select_prudoct);
                                                    $row_prudocts=mysqli_fetch_assoc($query_prudocts);
                                                ?>
                                                <input type="hidden" name="name_prudocts" value="<?php echo $row_prudocts['Products_Name'] ?>">
                                                <input type="hidden" name="store_prudocts" value="<?php echo $row_prudocts['store_name_prudoct'] ?>">
                                                <input type="hidden" name="logo_store_prudocts" value="<?php echo $row_prudocts['store_logo_prudoct'] ?>">
                                                <input type="hidden" name="price_prudocts" value="<?php echo ($row_prudocts['Product_Price']-($row_prudocts['Product_Price']*$row_prudocts['discout_prudoct']/100)) ?>">
                                                <input type="hidden" name="category_prudocts" value="<?php echo $row_prudocts['Products_Category'] ?>">
                                                <input type="hidden" name="sub_category_prudocts" value="<?php echo $row_prudocts['Products_sub_Category'] ?>">
                                                <input type="hidden" name="Product_Colors" value="<?php echo $row_prudocts['Product_Colors'] ?>">
                                                <input type="hidden" name="Products_Name_arabic" value="<?php echo $row_prudocts['Products_Name_arabic'] ?>">
                                                <input type="hidden" name="store_name_prudoct_arbic" value="<?php echo $row_prudocts['store_name_prudoct_arbic'] ?>">
                                                <input type="hidden" name="Product_Short_Description_arabic" value="<?php echo $row_prudocts['Product_Short_Description_arabic'] ?>">
                                            </td>
                                            <td class="text-center">
                                                <?php
                                                    $select_bay="SELECT `stock_status` FROM `prudocts` WHERE `id_name_prudoct`='$ids'";
                                                    $query_bay=mysqli_query($conn_store_admin , $select_bay);
                                                    $row_stock=mysqli_fetch_assoc($query_bay);
                                                    if($row_stock['stock_status']==$language["In stock"]):
                                                ?>
                                                    <button name="buy" class="btn theme-btn--dark1 btn--xl text-uppercase"><?php echo $language["Buy now"] ?></button>
                                                <?php endif; ?>
                                                    
                                            </td>
                                        </form>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        <?php else: ?>
                            <tbody>
                                <?php
                                    if(isset($_COOKIE['favorite_nologin'])){
                                        $favorite = json_decode($_COOKIE['favorite_nologin'] , true);
                                        if (is_array($favorite) || is_object($favorite)){
                                            foreach($favorite as $item){
                                                ?>
                                                    <tr>
                                                        <th class="text-center" scope="row">
                                                            <img src="assets/img/product/6.jpg" id="<?php echo $item['id_product_favorite']; ?>" alt="img">
                                                        </th>
                                                        <td class="text-center">
                                                            <span class="whish-title"><?php echo ($lang=="ar") ? $item['name_product_ar_favorite'] : $item['name_product_favorite']; ?></span>
                                                        </td>
                                                        <td>
                                                            <div class="align-items-center justify-content-center d-flex">
                                                                <img src="./Upload/<?php echo $item['store_logo_favorite']; ?>" width="50px" height="50px" alt="img-logo">
                                                                <p class="mx-3"><?php echo ($lang=="ar") ? $item['name_store_ar_favorite'] : $item['name_store_favorite']; ?></p>
                                                            </div>                                    
                                                        </td>
                                                        <?php 
                                                            $select_prudoct="SELECT * FROM `prudocts` WHERE `id_name_prudoct`='".$item['id_product_favorite']."'";
                                                            $query_prudoct=mysqli_query($conn_store_admin , $select_prudoct);
                                                            $row_nums_prudoct=mysqli_num_rows($query_prudoct);

                                                            if($row_nums_prudoct > 0){ 

                                                                $rows=mysqli_fetch_assoc($query_prudoct);
                                                                $stock=$rows['status_product_qty'];
                                                                
                                                                if($stock == 1){
                                                                    $new_stock=$language['In stock'];
                                                        ?>
                                                            <td class="text-center">
                                                                <span class="badge badge-danger position-static my-badge"><?php echo $new_stock; ?></span>
                                                            </td>
                                                        <?php  
                                                                }else{
                                                                    $new_stock=$language['Out of stock'];
                                                        ?>
                                                            <td class="text-center theme2">
                                                                <span class="badge badge-danger position-static my-badge"><?php echo $new_stock; ?></span>
                                                            </td>
                                                        <?php 
                                                                }

                                                                $update_status = "UPDATE `prudocts` SET `stock_status`='$new_stock' WHERE `id_name_prudoct`='".$item['id_product_favorite']."'";
                                                                if(!mysqli_query($conn_store_admin,$update_status)){
                                                                    echo "Error Update" . mysqli_error($conn_store_admin);
                                                                }
                                                        
                                                            }else{
                                                        ?>
                                                            <td class="text-center">
                                                                <span class="badge bg-info position-static my-badge"><?php echo $language["Product not found"] ?></span>
                                                            </td>
                                                        <?php 
                                                            }
                                                        ?>
                                                        <td class="text-center">
                                                            <span class="whish-list-price"><span id="total"></span>JOD</span>
                                                            <span id="prices" hidden><?php echo $item['price_favorite'] ?></span>
                                                        </td>
                                                        <form action="" method="POST">
                                                            <input type="hidden" name="id_favorite_item" value="<?php echo $item['id_product_favorite'] ?>">
                                                            <td class="text-center">
                                                                <div class="product-count style">
                                                                    <div class="count d-flex justify-content-center">
                                                                        <input type="number" name="qtys" id="qty" min="1" max="10" step="1" value="<?php echo $item['qty_favorite'] ?>">
                                                                        
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="text-center">
                                                                <button type="submit" name="delete_wishlist_item">
                                                                    <a href="javascript::void()"> 
                                                                        <span class="trash" title="Delete">
                                                                            <i class="fas fa-trash-alt"></i>
                                                                        </span>
                                                                    </a>
                                                                </button>
                                                            </td>
                                                        </form>
                                                        <td class="text-center">
                                                            <?php
                                                                $select_bay="SELECT `stock_status` FROM `prudocts` WHERE `id_name_prudoct`='".$item['id_product_favorite']."'";
                                                                $query_bay=mysqli_query($conn_store_admin , $select_bay);
                                                                $row_stock=mysqli_fetch_assoc($query_bay);
                                                                if($row_stock['stock_status']==$language["In stock"]):
                                                            ?>
                                                                <button onclick="window.location.href='login.php?lang=<?php echo $lang ?>'" class="btn theme-btn--dark1 btn--xl text-uppercase"><?php echo $language["Buy now"] ?></button>
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                <?php
                                            }
                                        }
                                    }
                                ?>
                            </tbody>
                        <?php endif; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product tab end -->

<?php
include "./includes/footer.php";
?>