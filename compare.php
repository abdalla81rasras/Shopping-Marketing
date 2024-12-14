<?php
session_start();
if(!isset($_SESSION['id_users'])){
    
}
include "./includes/connection_1.php";
include "./includes/connection_2.php";
include "./includes/func_compare_cart.php";
include "./includes/header.php";
?>

<style>
.color-box {
  width: 20px;
  height: 20px;
  border-radius: 100%;
  border: 1px solid #2caf4e;
}
</style>

<!-- breadcrumb-section start -->
<nav class="breadcrumb-section theme1 breadcrumb-bg1">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="breadcrumb-title text-center my-20">
          <h2 class="title text-dark text-capitalize"><?php echo $language["compare"] ?></h2>
        </div>
      </div>
      <div class="col-12">
        <ol
          class="breadcrumb bg-transparent m-0 p-0 align-items-center justify-content-center"
        >
          <li class="breadcrumb-item"><a href="index.php?lang=<?php echo $lang ?>"><?php echo $language["Home"] ?></a></li>
          <li class="breadcrumb-item active" aria-current="page">
            <?php echo $language["compare"] ?>
          </li>
        </ol>
      </div>
    </div>
  </div>
</nav>
<!-- breadcrumb-section end -->

<!-- product tab start -->
<section class="compare-section theme1 pb-70">
    <div class="container grid-wraper">
        <div class="row">
            <div class="col-12">
                <?php 
                    if(isset($_GET['action'])){
                        if($_GET['action']=='added'){
                            ?>
                                <div class="alert alert-info alert-dismissible fade show" role="alert">
                                    <?php echo $language['Product Already Added in compare'] ?>.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php
                        }else{
                            ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <?php echo $language['Product added to compare'] ?>.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div> 
                            <?php
                        }
                    }
                ?>
                <h3 class="title pb-25 text-capitalize"><?php echo $language["compare"] ?></h3>
                <div class="table-responsive">
                    <?php 
                        if(!empty($_SESSION['id_users'])): 
                            $id_users = $_SESSION['id_users'];
                    ?>
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col"><?php echo $language["product info"] ?></th>
                                    <?php 
                                        $select="SELECT * FROM `topages_compare` WHERE `id_user`='$id_users'";
                                        $query=mysqli_query($conn_main_admin , $select);
                                        while($row=mysqli_fetch_assoc($query)):
                                    ?>
                                        <th scope="col" class="text-center" id="<?php echo $row['id_product_compare']; ?>"> 
                                            <img src="assets/img/product/1.jpg" alt="img">
                                            <span class="sub-title d-block"><?php echo ($lang=="ar") ? $row['name_product_ar_compare'] : $row['name_product_compare']; ?></span>
                                            <form action="" method="post">
                                                <input type="hidden" name="id_user" value="<?php echo $_SESSION['id_users'] ?>">
                                                <input type="hidden" name="id_product" value="<?php echo $row['id_product'] ?>">
                                                <input type="hidden" name="store_logo_pages" value="<?php echo $row['store_logo_compare'] ?>">
                                                <input type="hidden" name="name_store_pages" value="<?php echo $row['name_store_compare'] ?>">
                                                <input type="hidden" name="price_pages" value="<?php echo $row['price_compare'] ?>">
                                                <input type="hidden" name="Description_pages" value="<?php echo $row['Description_compare'] ?>">
                                                <input type="hidden" name="size_pages" value="<?php echo $row['size_compare'] ?>">
                                                <input type="hidden" name="color_pages" value="<?php echo $row['color_compare'] ?>">
                                                <input type="hidden" name="name_product_pages_ar" value="<?php echo $row['name_product_ar_compare'] ?>">
                                                <input type="hidden" name="name_store_pages_ar" value="<?php echo $row['name_store_ar_compare'] ?>">
                                                <input type="hidden" name="Description_pages_ar" value="<?php echo $row['Description_ar_compare'] ?>">
                                                <input type="hidden" name="name_product_pages" value="<?php echo $row['name_product_compare'] ?>">
                                                
                                                
                                                <button type="submit" name="compare_to_basket" class="btn theme-btn--dark1 btn--xl"> <?php echo $language["add to cart"] ?></button>
                                            </form>
                                        </th>
                                    <?php endwhile; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">
                                        <?php echo $language["Name & Logo Store"] ?> 
                                    </th>
                                    <?php 
                                        $select="SELECT * FROM `topages_compare` WHERE `id_user`='$id_users'";
                                        $query=mysqli_query($conn_main_admin , $select);
                                        while($row=mysqli_fetch_assoc($query)):
                                    ?>
                                        <td>
                                            <div class="align-items-center justify-content-center d-flex">
                                                <img src="./Upload/<?php echo $row['store_logo_compare']; ?>" class="Compare-img" alt="img-logo">
                                                <p class="mx-3"><?php echo ($lang=="ar") ? $row['name_store_ar_compare'] : $row['name_store_compare']; ?></p>
                                            </div>                                    
                                        </td>
                                    <?php endwhile; ?>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <?php echo $language["Price"] ?>
                                    </th>
                                    <?php 
                                        $select="SELECT * FROM `topages_compare` WHERE `id_user`='$id_users'";
                                        $query=mysqli_query($conn_main_admin , $select);
                                        while($row=mysqli_fetch_assoc($query)):
                                    ?>
                                        <td class="text-center">
                                            <span class="whish-list-price">
                                                <?php echo $row['price_compare']; ?>JD
                                            </span>
                                        </td>
                                    <?php endwhile; ?> 
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <?php echo $language["Description"] ?>
                                    </th>
                                    <?php 
                                        $select="SELECT * FROM `topages_compare` WHERE `id_user`='$id_users'";
                                        $query=mysqli_query($conn_main_admin , $select);
                                        while($row=mysqli_fetch_assoc($query)):
                                    ?>
                                        <td class="text-center">
                                            <p><?php echo ($lang=="ar") ? $row['Description_ar_compare'] : $row['Description_compare']; ?></p>
                                        </td>
                                    <?php endwhile; ?>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <?php echo $language["Availability"] ?>
                                    </th>
                                    <?php 
                                        $select_id = "SELECT `id_product` FROM `topages_compare` WHERE `id_user`='$id_users'";
                                        $query_id = mysqli_query($conn_main_admin , $select_id);
                                        while($row_id = mysqli_fetch_assoc($query_id)):

                                        $prudoct_id = $row_id['id_product'];

                                        $select="SELECT * FROM `prudocts` WHERE `id_name_prudoct`='$prudoct_id'";
                                        $query=mysqli_query($conn_store_admin , $select);
                                        $row_num=mysqli_num_rows($query);

                                        if($row_num > 0){ 

                                            $row=mysqli_fetch_assoc($query);
                                            $stock=$row['status_product_qty'];
                                            
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

                                            $update_status = "UPDATE `prudocts` SET `stock_status`='$new_stock' WHERE `id_name_prudoct`='$prudoct_id'";
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

                                        endwhile;
                                    ?>
                                </tr>
                                <tr>
                                    <th scope="row">
                                    <?php echo $language["size"] ?>
                                    </th>
                                    <?php 
                                        $select="SELECT * FROM `topages_compare` WHERE `id_user`='$id_users'";
                                        $query=mysqli_query($conn_main_admin , $select);
                                        while($row=mysqli_fetch_assoc($query)):
                                    ?>
                                        <td class="text-center">
                                            <?php echo $row['size_compare']; ?>
                                        </td>
                                    <?php endwhile; ?>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <?php echo $language["colors"] ?>
                                    </th>
                                    <?php 
                                        $select="SELECT * FROM `topages_compare` WHERE `id_user`='$id_users'";
                                        $query=mysqli_query($conn_main_admin , $select);
                                        while($row=mysqli_fetch_assoc($query)):
                                    ?>
                                        <td class="text-center">
                                            <span class="color-box" style="background-color: <?php echo $row['color_compare']; ?>"></span>
                                        </td>
                                    <?php endwhile; ?>
                                </tr>
                            </tbody>
                        </table>
                    <?php else : ?>
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col"><?php echo $language["product info"] ?></th>
                                    <?php 
                                        if(isset($_COOKIE['nologin_compare'])):
                                            $compare = json_decode($_COOKIE['nologin_compare'] , true);
                                            if (is_array($compare) || is_object($compare)){
                                                foreach($compare as $c):
                                        ?>
                                            <th scope="col" class="text-center" id="<?php echo $c['id_product_compare']; ?>"> 
                                                <img src="assets/img/product/1.jpg" alt="img">
                                                <span class="sub-title d-block"><?php echo ($lang=="ar") ? $c['name_product_ar_compare'] : $c['name_product_compare']; ?></span>
                                                <form action="" method="post">
                                                    <input type="hidden" name="id_product" value="<?php echo $c['id_product_compare'] ?>">
                                                    <input type="hidden" name="store_logo_pages" value="<?php echo $c['store_logo_compare'] ?>">
                                                    <input type="hidden" name="name_store_pages" value="<?php echo $c['name_store_compare'] ?>">
                                                    <input type="hidden" name="price_pages" value="<?php echo $c['price_compare'] ?>">
                                                    <input type="hidden" name="Description_pages" value="<?php echo $c['Description_compare'] ?>">
                                                    <input type="hidden" name="size_pages" value="<?php echo $c['size_compare'] ?>">
                                                    <input type="hidden" name="color_pages" value="<?php echo $c['color_compare'] ?>">
                                                    <input type="hidden" name="name_product_pages_ar" value="<?php echo $c['name_product_ar_compare'] ?>">
                                                    <input type="hidden" name="name_store_pages_ar" value="<?php echo $c['name_store_ar_compare'] ?>">
                                                    <input type="hidden" name="Description_pages_ar" value="<?php echo $c['Description_ar_compare'] ?>">
                                                    <input type="hidden" name="name_product_pages" value="<?php echo $c['name_product_compare'] ?>">
                                                    
                                                    
                                                    <button type="submit" name="compare_to_basket" class="btn theme-btn--dark1 btn--xl"> <?php echo $language["add to cart"] ?></button>
                                                </form>
                                            </th>
                                        <?php 
                                                endforeach; 
                                            }
                                        endif;
                                    ?>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">
                                        <?php echo $language["Name & Logo Store"] ?> 
                                    </th>
                                    <?php 
                                        if(isset($_COOKIE['nologin_compare'])): 
                                            $compare = json_decode($_COOKIE['nologin_compare'] , true);
                                            if (is_array($compare) || is_object($compare)){
                                                foreach($compare as $c):
                                        ?>
                                            <td>
                                                <div class="align-items-center justify-content-center d-flex">
                                                    <img src="./Upload/<?php echo $c['store_logo_compare']; ?>" class="Compare-img" alt="img-logo">
                                                    <p class="mx-3"><?php echo ($lang=="ar") ? $c['name_store_ar_compare'] : $c['name_store_compare']; ?></p>
                                                </div>   
                                            </td>
                                        <?php
                                                endforeach;
                                            }
                                        endif;
                                    ?> 
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <?php echo $language["Price"] ?>
                                    </th>
                                    <?php
                                        if(isset($_COOKIE['nologin_compare'])): 
                                            $compare = json_decode($_COOKIE['nologin_compare'] , true);
                                            if (is_array($compare) || is_object($compare)){
                                                foreach($compare as $c):
                                        ?>
                                            <td class="text-center">
                                                <span class="whish-list-price">
                                                    <?php echo $c['price_compare']; ?>JD
                                                </span>
                                            </td> 
                                        <?php
                                                endforeach;
                                            }
                                        endif;
                                    ?>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <?php echo $language["Description"] ?>
                                    </th>
                                    <?php 
                                        if(isset($_COOKIE['nologin_compare'])):
                                            if (is_array($compare) || is_object($compare)){ 
                                                $compare = json_decode($_COOKIE['nologin_compare'] , true);
                                                foreach($compare as $c):
                                        ?>
                                            <td class="text-center">
                                                <p><?php echo ($lang=="ar") ? $c['Description_ar_compare'] : $c['Description_compare']; ?></p>
                                            </td>
                                        <?php 
                                                endforeach;
                                            }
                                        endif; 
                                    ?>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <?php echo $language["Availability"] ?>
                                    </th>
                                    <?php 
                                        if(isset($_COOKIE['nologin_compare'])): 
                                            $compare = json_decode($_COOKIE['nologin_compare'] , true);
                                            if (is_array($compare) || is_object($compare)){
                                                foreach($compare as $c):
                                                    $select="SELECT * FROM `prudocts` WHERE `id_name_prudoct`='".$c['id_product_compare']."'";
                                                    $query=mysqli_query($conn_store_admin , $select);
                                                    $rows_num=mysqli_num_rows($query);

                                                    if($rows_num > 0){ 

                                                        $row_status=mysqli_fetch_assoc($query);
                                                        $stock=$row_status['status_product_qty'];
                                                        
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

                                                        $update_status = "UPDATE `prudocts` SET `stock_status`='$new_stock' WHERE `id_name_prudoct`='".$c['id_product_compare']."'";
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

                                                endforeach;
                                            }
                                        endif;
                                    ?>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <?php echo $language["size"] ?>
                                    </th>
                                    <?php
                                        if(isset($_COOKIE['nologin_compare'])): 
                                            $compare = json_decode($_COOKIE['nologin_compare'] , true);
                                            if (is_array($compare) || is_object($compare)){
                                                foreach($compare as $c):
                                        ?>
                                            <td class="text-center">
                                                <?php echo $c['size_compare']; ?>
                                            </td>
                                        <?php 
                                                endforeach;
                                            }
                                        endif;
                                    ?>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <?php echo $language["colors"] ?>
                                    </th>
                                    <?php
                                        if(isset($_COOKIE['nologin_compare'])): 
                                            $compare = json_decode($_COOKIE['nologin_compare'] , true);
                                            if (is_array($compare) || is_object($compare)){
                                                foreach($compare as $c):
                                        ?>
                                            <td class="text-center">
                                                <span class="color-box" style="background-color: <?php echo $c['color_compare']; ?>"></span>
                                            </td>
                                        <?php 
                                                endforeach;
                                            }
                                        endif; 
                                    ?>
                                </tr>
                            </tbody>
                        </table>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product tab end -->

<?php
include "./includes/footer.php";
?>