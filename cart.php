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
          <h2 class="title text-dark text-capitalize"><?php echo $language["Basket"] ?></h2>
        </div>
      </div>
      <div class="col-12">
        <ol
          class="breadcrumb bg-transparent m-0 p-0 align-items-center justify-content-center"
        >
          <li class="breadcrumb-item"><a href="index.php?lang=<?php echo $lang ?>"><?php echo $language["Home"] ?></a></li>
          <li class="breadcrumb-item active" aria-current="page">
            <?php echo $language["Basket"] ?>
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
                                    <?php echo $language['Product added to basket'] ?>.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div> 
                            <?php
                        }
                    }
                ?>
                <h3 class="title pb-25 text-capitalize"><?php echo $language["Your Basket items"] ?></h3>
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
                        <?php if(!empty($_SESSION['id_users'])): ?>
                            <tbody>
                                <?php 
                                    $id_users = $_SESSION['id_users'];
                                    $select_basket="SELECT * FROM `topages_basket` WHERE `id_user`='$id_users' ORDER BY `id_basket` DESC";
                                    $query_basket=mysqli_query($conn_main_admin , $select_basket);
                                    while($row=mysqli_fetch_assoc($query_basket)):
                                    $ids = $row['id_prudoct'];
                                ?>
                                    <tr>
                                        <th class="text-center" scope="row">
                                            <img src="assets/img/product/6.jpg" id="<?php echo $row['id_basket']; ?>" alt="img">
                                        </th>
                                        <td class="text-center">
                                            <span class="whish-title"><?php echo ($lang=="ar") ? $row['name_product_basket_ar'] : $row['prudoct_name_basket']; ?></span>
                                        </td>
                                        <td>
                                            <div class="align-items-center justify-content-center d-flex">
                                                <img src="./Upload/<?php echo $row['store_logo_basket']; ?>" width="50px" height="50px" alt="img-logo">
                                                <p class="mx-3"><?php echo ($lang=="ar") ? $row['name_store_basket_ar'] : $row['name_logo_basket']; ?></p>
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
                                            <span id="prices" hidden><?php echo $row['price_basket'] ?></span>
                                        </td>
                                        <form action="" method="POST">
                                            <input type="hidden" name="id_baskets" value="<?php echo $row['id_basket'] ?>">
                                            <input type="hidden" name="id_prudocts" value="<?php echo $ids ?>">
                                            <td class="text-center">
                                                <div class="product-count style">
                                                    <div class="count d-flex justify-content-center">
                                                        <input type="number" name="qtys" id="qty" min="1" max="10" step="1" value="<?php echo $row['qty_basket'] ?>">                                                   
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <button type="submit" name="delete_basket">
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
                                                    <button name="buy" class="btn theme-btn--dark1 btn--xl text-uppercase"><?php echo $language["buy now"] ?></button>
                                                    <?php endif; ?>
                                            </td>
                                        </form>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        <?php else: ?>
                            <tbody>
                                <?php 
                                    if (isset($_COOKIE['cart_nologin'])) {
                                        $cart = json_decode($_COOKIE['cart_nologin'], true);
                                        if(is_array($cart)||is_object($cart)){
                                            foreach ($cart as $item) {
                                                ?>
                                                    <tr>
                                                        <th class="text-center" scope="row">
                                                            <img src="assets/img/product/6.jpg" id="<?php echo $item['id_product_basket']; ?>" alt="img">
                                                        </th>
                                                        <td class="text-center">
                                                            <span class="whish-title"><?php echo ($lang=="ar") ? $item['name_product_basket_ar'] : $item['name_product_basket']; ?></span>
                                                        </td>
                                                        <td>
                                                            <div class="align-items-center justify-content-center d-flex">
                                                                <img src="./Upload/<?php echo $item['store_logo_basket']; ?>" width="50px" height="50px" alt="img-logo">
                                                                <p class="mx-3"><?php echo ($lang=="ar") ? $item['name_store_basket_ar'] : $item['name_store_basket']; ?></p>
                                                            </div>                                    
                                                        </td>
                                                        <?php 
                                                            $select_prudoct="SELECT * FROM `prudocts` WHERE `id_name_prudoct`='".$item['id_product_basket']."'";
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

                                                                $update_status = "UPDATE `prudocts` SET `stock_status`='$new_stock' WHERE `id_name_prudoct`='".$item['id_product_basket']."'";
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
                                                            <span id="prices" hidden><?php echo $item['price_basket'] ?></span>
                                                        </td>
                                                        <form action="" method="POST">
                                                            <input type="hidden" name="id_basket_item" value="<?php echo $item['id_product_basket'] ?>">
                                                            <td class="text-center">
                                                                <div class="product-count style">
                                                                    <div class="count d-flex justify-content-center">
                                                                        <input type="number" name="qtys" id="qty" min="1" max="10" step="1" value="<?php echo $item['qty_basket'] ?>">                                                   
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="text-center">
                                                                <button type="submit" name="delete_basket_item">
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
                                                                $select_bay="SELECT `stock_status` FROM `prudocts` WHERE `id_name_prudoct`='".$item['id_product_basket']."'";
                                                                $query_bay=mysqli_query($conn_store_admin , $select_bay);
                                                                $row_stock=mysqli_fetch_assoc($query_bay);
                                                                if($row_stock['stock_status']==$language["In stock"]):
                                                            ?>
                                                                <button onclick="window.location.href='login.php?lang=<?php echo $lang ?>';" class="btn theme-btn--dark1 btn--xl text-uppercase"><?php echo $language["buy now"] ?></button>
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
        <?php
            if(!empty($_SESSION['id_users'])):
        ?>
            <div class="my-5 text-right">
                <a href="javascript:void()" class="btn theme-btn--dark1 btn--xl text-uppercase" id="n-table"><?php echo $language["Next"] ?></a>
            </div>
            <div class="row show_table" id="table-order">
                <div class="col-12">
                    <h3 class="title pb-25 text-capitalize"><?php echo $language["Your Orders"] ?></h3>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-center" scope="col"><?php echo $language["Logo & Name Store"] ?></th>
                                    <th class="text-center" scope="col"><?php echo $language["Item Name"] ?></th>
                                    <th class="text-center" scope="col"><?php echo $language["Qty"] ?></th>
                                    <th class="text-center" scope="col"><?php echo $language["Price"] ?></th>
                                    <th class="text-center" scope="col"><?php echo $language["Order Status"] ?></th>
                                    <th class="text-center" scope="col"><?php echo $language["Order ID"] ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $id_users = $_SESSION['id_users'];
                                    $select="SELECT * FROM `orders` WHERE `id_user`='$id_users'";
                                    $query=mysqli_query($conn_store_admin , $select);
                                    while($row=mysqli_fetch_assoc($query)):
                                ?>
                                    <tr>
                                        <td>
                                            <div class="align-items-center justify-content-center d-flex">
                                                <img src="./Upload/<?php echo $row['store_logo']; ?>" id="<?php echo $row['id_orders']; ?>" width="50px" height="50px" alt="img-logo">
                                                <p class="mx-3"><?php echo ($lang=="ar") ? $row['name_store_ar'] : $row['name_store']; ?></p>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <span class="whish-title"><?php echo ($lang=="ar") ? $row['Product_Name_ar'] : $row['Product_Name']; ?></span>
                                        </td>
                                        <td class="text-center">
                                            <span class="whish-title">
                                                <?php echo $row['QTY']; ?>
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <span class="whish-list-price">
                                                <?php echo $row['Total_Amount_Price']; ?>JD
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <span class="whish-title">
                                                <?php
                                                    if($row['order_s_p_d'] === "online"){

                                                        $o_s_p_d = $language['Paid'];
                                                        echo $o_s_p_d;

                                                    }elseif($row['order_s_p_d'] === "cash on delivery"){

                                                        $o_s_p_d = $language['cash on delivery'];
                                                        echo $o_s_p_d;

                                                    }
                                                ?>
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <span class="whish-title"><?php echo $row['order_id']; ?></span>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>
<!-- product tab end -->

<?php
include "./includes/footer.php";
?>