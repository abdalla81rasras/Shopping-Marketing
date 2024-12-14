<?php
//basket
if(isset($_POST['basket_single'])){

    $id_product_basket = mysqli_real_escape_string($conn_main_admin , $_POST['id_product']);
    $name_product_basket = mysqli_real_escape_string($conn_main_admin , $_POST['name_product_pages']);
    $name_product_basket_ar = mysqli_real_escape_string($conn_main_admin , $_POST['name_product_pages_ar']);
    $store_logo_basket = mysqli_real_escape_string($conn_main_admin , $_POST['store_logo_pages']);
    $name_store_basket = mysqli_real_escape_string($conn_main_admin , $_POST['name_store_pages']);
    $name_store_basket_ar = mysqli_real_escape_string($conn_main_admin , $_POST['name_store_pages_ar']);
    $price_basket = mysqli_real_escape_string($conn_main_admin , $_POST['price_pages']);
    $qty_basket_single = mysqli_real_escape_string($conn_main_admin , $_POST['qty_single']);

    if(isset($_SESSION['id_users'])){

        $id_user_basket = mysqli_real_escape_string($conn_main_admin , $_POST['id_user']);
        
        $sql_cheack = "SELECT * FROM `topages_basket` WHERE `id_user`='$id_user_basket' AND `id_prudoct`='$id_product_basket'";
        $query_cheack = mysqli_query($conn_main_admin,$sql_cheack);

        if(mysqli_num_rows($query_cheack) > 0){
            
            $row_cheack = mysqli_fetch_assoc($query_cheack);
            $id_user_cheak=$row_cheack['id_user'];
            $id_prudoct_cheack=$row_cheack['id_prudoct'];

            $update_qty = "UPDATE `topages_basket` SET `qty_basket`=`qty_basket`+$qty_basket_single WHERE `id_user`='$id_user_cheak' AND `id_prudoct`='$id_prudoct_cheack'";

            if(mysqli_query($conn_main_admin,$update_qty)){

                ?>
                    <script type='text/javascript'>
                        var message1 = '<?php echo $language['Product Already Added, and but has been qty incremented'] ?>';
                        alert(message1);
                        window.location.href='single-product.php?lang=<?php echo $lang ?>&Id_prudoct=<?php echo $id_product_basket ?>';
                        exit;
                    </script>
                <?php

            }else {
                echo "Error update" . mysqli_error($conn_main_admin);
            }

        }else {

            $sql = "INSERT INTO `topages_basket`(`id_user`,`id_prudoct`,`prudoct_name_basket`,`store_logo_basket`,`name_logo_basket`,`name_product_basket_ar`,`name_store_basket_ar`,`price_basket`,`qty_basket`) 
                        VALUES('$id_user_basket','$id_product_basket','$name_product_basket','$store_logo_basket','$name_store_basket','$name_product_basket_ar','$name_store_basket_ar','$price_basket','$qty_basket_single')";

            if(mysqli_query($conn_main_admin,$sql)){

                ?>
                    <script type='text/javascript'>
                        var message2 = '<?php echo $language['Product added to basket'] ?>';
                        alert(message2);
                        window.location.href='single-product.php?lang=<?php echo $lang ?>&Id_prudoct=<?php echo $id_product_basket ?>';
                        exit;
                    </script>
                <?php
                    
            }else {
                echo "Error Query" . mysqli_error($conn_main_admin);
            }

        }

    }else{

        if (!isset($_SESSION['cart_nologin'])) {
            $_SESSION['cart_nologin'] = [];
        }

        if (isset($_SESSION['cart_nologin'][$id_product_basket])) {

            $_SESSION['cart_nologin'][$id_product_basket]['qty_basket'] += $qty_basket_single;

            ?>
                <script type='text/javascript'>
                    var message1_1 = '<?php echo $language['Product Already Added, and but has been qty incremented'] ?>';
                    alert(message1_1);
                    window.location.href='single-product.php?lang=<?php echo $lang ?>&Id_prudoct=<?php echo $id_product_basket ?>';
                    exit;
                </script>
            <?php

        } else {
            
            $_SESSION['cart_nologin'][$id_product_basket] = array(
                'id_product_basket' => $id_product_basket ,
                'name_product_basket_ar' => $name_product_basket_ar ,
                'name_product_basket' => $name_product_basket ,
                'name_store_basket' => $name_store_basket ,
                'store_logo_basket' => $store_logo_basket ,
                'name_store_basket_ar'=> $name_store_basket_ar ,
                'qty_basket'=> $qty_basket_single ,
                'price_basket'=> $price_basket
            );

            ?>
                <script type='text/javascript'>
                    var message1_2 = '<?php echo $language['Product added to basket'] ?>';
                    alert(message1_2);
                    window.location.href='single-product.php?lang=<?php echo $lang ?>&Id_prudoct=<?php echo $id_product_basket ?>';
                    exit;
                </script>
            <?php
        }

    }
        
}
//$_SESSION['cart_nologin']=array();

$gust_carts = $_SESSION['cart_nologin']??"";
$json_cart = json_encode($gust_carts);
setcookie('cart_nologin', $json_cart, time() + (60 * 60 * 24 * 7), '/');



//favorite
if(isset($_POST['favorite_single'])){

    $id_product_favorite_single = mysqli_real_escape_string($conn_main_admin , $_POST['id_product']);
    $name_product_favorite_single = mysqli_real_escape_string($conn_main_admin , $_POST['name_product_pages']);
    $name_product_ar_favorite_single = mysqli_real_escape_string($conn_main_admin , $_POST['name_product_pages_ar']);
    $store_logo_favorite_single = mysqli_real_escape_string($conn_main_admin , $_POST['store_logo_pages']);
    $name_store_favorite_single = mysqli_real_escape_string($conn_main_admin , $_POST['name_store_pages']);
    $name_store_ar_favorite_single = mysqli_real_escape_string($conn_main_admin , $_POST['name_store_pages_ar']);
    $price_favorite_single = mysqli_real_escape_string($conn_main_admin , $_POST['price_pages']);
    $qty_favorite_single_single = mysqli_real_escape_string($conn_main_admin , $_POST['qty_single']);

    if(isset($_SESSION['id_users'])){

        $id_user_favorite_single = mysqli_real_escape_string($conn_main_admin , $_POST['id_user']);
        $sql_cheack = "SELECT * FROM `topages_favorite` WHERE `id_user`='$id_user_favorite_single' AND `id_prudoct`='$id_product_favorite_single'";
        $query_cheack = mysqli_query($conn_main_admin,$sql_cheack);

        if(mysqli_num_rows($query_cheack) > 0){
            
            $row_cheack = mysqli_fetch_assoc($query_cheack);
            $id_user_cheak=$row_cheack['id_user'];
            $id_prudoct_cheack=$row_cheack['id_prudoct'];

            $update_qty = "UPDATE `topages_favorite` SET `qty_favortie`=`qty_favortie`+$qty_favorite_single_single WHERE `id_user`='$id_user_cheak' AND `id_prudoct`='$id_prudoct_cheack'";

            if(mysqli_query($conn_main_admin,$update_qty)){

                ?>
                    <script type='text/javascript'>
                        var message3 = '<?php echo $language['Product Already Added, and but has been qty incremented'] ?>';
                        alert(message3);
                        window.location.href='single-product.php?lang=<?php echo $lang ?>&Id_prudoct=<?php echo $id_product_favorite_single ?>';
                        exit;
                    </script>
                <?php

            }else {
                echo "Error update" . mysqli_error($conn_main_admin);
            }

        }else {

            $sql = "INSERT INTO `topages_favorite`(`id_user`,`id_prudoct`,`prudoct_name_favorite`,`store_logo_favorite`,`name_logo_favorite`,`name_product_ar_favorite`,`name_store_ar_favorite`,`price_favorite`,`qty_favortie`) 
                        VALUES('$id_user_favorite_single','$id_product_favorite_single','$name_product_favorite_single','$store_logo_favorite_single','$name_store_favorite_single','$name_product_ar_favorite_single','$name_store_ar_favorite_single','$price_favorite_single','$qty_favorite_single_single')";

            if(mysqli_query($conn_main_admin,$sql)){

                ?>
                    <script type='text/javascript'>
                        var message4 = '<?php echo $language['Product added to favorite'] ?>';
                        alert(message4);
                        window.location.href='single-product.php?lang=<?php echo $lang ?>&Id_prudoct=<?php echo $id_product_favorite_single ?>';
                        exit;
                    </script>
                <?php
                    
            }else {
                echo "Error Query" . mysqli_error($conn_main_admin);
            }

        }

    }else{
        
		if (!isset($_SESSION['favorite_nologin'])) {
            $_SESSION['favorite_nologin'] = [];
        }

        if (isset($_SESSION['favorite_nologin'][$id_product_favorite_single])) {

            $_SESSION['favorite_nologin'][$id_product_favorite_single]['qty_favorite'] += $qty_favorite_single_single;

            ?>
                <script type='text/javascript'>
                    var message3_1 = '<?php echo $language['Product Already Added, and but has been qty incremented'] ?>';
                    alert(message3_1);
                    window.location.href='single-product.php?lang=<?php echo $lang ?>&Id_prudoct=<?php echo $id_product_favorite_single ?>';
                    exit;
                </script>
            <?php

        } else {
            
            $_SESSION['favorite_nologin'][$id_product_favorite_single] = array(
                'id_product_favorite' => $id_product_favorite_single ,
                'name_product_favorite' => $name_product_favorite_single ,
                'name_product_ar_favorite' => $name_product_ar_favorite_single ,
                'store_logo_favorite' => $store_logo_favorite_single ,
                'name_store_favorite' => $name_store_favorite_single ,
                'name_store_ar_favorite' => $name_store_ar_favorite_single ,
                'price_favorite' => $price_favorite_single ,
                'qty_favorite' => $qty_favorite_single_single
            );

            ?>
                <script type='text/javascript'>
                    var message4 = '<?php echo $language['Product added to favorite'] ?>';
                    alert(message4);
                    window.location.href='single-product.php?lang=<?php echo $lang ?>&Id_prudoct=<?php echo $id_product_favorite_single ?>';
                    exit;
                </script>
            <?php
        }
    }
}
//$_SESSION['favorite_nologin']=array();

$guest_favorite = $_SESSION['favorite_nologin']??"";
$favorite_json = json_encode($guest_favorite);
setcookie('favorite_nologin' , $favorite_json , time()+(60 * 60 * 24 * 7) , '/');



//compare
if(isset($_POST['compare_single'])){

    $id_product_compare_single = mysqli_real_escape_string($conn_main_admin , $_POST['id_product']);
    $name_product_compare_single = mysqli_real_escape_string($conn_main_admin , $_POST['name_product_pages']);
    $name_product_ar_compare_single = mysqli_real_escape_string($conn_main_admin , $_POST['name_product_pages_ar']);
    $store_logo_compare_single = mysqli_real_escape_string($conn_main_admin , $_POST['store_logo_pages']);
    $name_store_compare_single = mysqli_real_escape_string($conn_main_admin , $_POST['name_store_pages']);
    $name_store_ar_compare_single = mysqli_real_escape_string($conn_main_admin , $_POST['name_store_pages_ar']);
    $price_compare_single = mysqli_real_escape_string($conn_main_admin , $_POST['price_pages']);
    $Description_compare_single = mysqli_real_escape_string($conn_main_admin , $_POST['Description_pages']);
    $Description_ar_compare_single = mysqli_real_escape_string($conn_main_admin , $_POST['Description_pages_ar']);
    $size_compare_single = mysqli_real_escape_string($conn_main_admin , $_POST['size_pages']);
    $color_compare_single = mysqli_real_escape_string($conn_main_admin , $_POST['color_pages']);

    if(!empty($_SESSION['id_users'])){

        $id_user_compare_single = mysqli_real_escape_string($conn_main_admin , $_POST['id_user']);

        $sql_cheack = "SELECT * FROM `topages_compare` WHERE `id_user`='$id_user_compare_single' AND `id_product`='$id_product_compare_single'";
        $query_cheack = mysqli_query($conn_main_admin , $sql_cheack);

        if(mysqli_num_rows($query_cheack) > 0){
            
            ?>
                <script type='text/javascript'>
                    var message5 = '<?php echo $language['Product Already Added in compare'] ?>';
                    alert(message5);
                    window.location.href='single-product.php?lang=<?php echo $lang ?>&Id_prudoct=<?php echo $id_product_compare_single ?>';
                    exit;
                </script>
            <?php

        }else{

            $sql_compare = "INSERT INTO `topages_compare`(`id_product`,`id_user`,`name_product_compare`,`store_logo_compare`,`name_store_compare`,`price_compare`,`Description_compare`,`name_product_ar_compare`,`name_store_ar_compare`,`Description_ar_compare`,`size_compare`,`color_compare`) 
                            VALUES('$id_product_compare_single','$id_user_compare_single','$name_product_compare_single','$store_logo_compare_single','$name_store_compare_single','$price_compare_single','$Description_compare_single','$name_product_ar_compare_single','$name_store_ar_compare_single','$Description_ar_compare_single','$size_compare_single','$color_compare_single')";

            if(mysqli_query($conn_main_admin , $sql_compare)){
            ?>
                <script type='text/javascript'>
                    var message6 = '<?php echo $language['Product added to compare'] ?>';
                    alert(message6);
                    window.location.href='single-product.php?lang=<?php echo $lang ?>&Id_prudoct=<?php echo $id_product_compare_single ?>';
                    exit;
                </script>
            <?php
            }
            else{
                echo "Query Error !!" . mysqli_error($conn_main_admin);
            }

        }

    }else{

        if(!isset($_SESSION['nologin_compare'])){
            $_SESSION['nologin_compare']=array();
        }

        if(isset($_SESSION['nologin_compare'][$id_product_compare_single])){

            ?>
                <script type='text/javascript'>
                    var message5_1 = '<?php echo $language['Product Already Added in compare'] ?>';
                    alert(message5_1);
                    window.location.href='single-product.php?lang=<?php echo $lang ?>&Id_prudoct=<?php echo $id_product_compare_single ?>';
                    exit;
                </script>
            <?php            

        }else{

            $_SESSION['nologin_compare'][$id_product_compare_single]=array(
                'id_product_compare' => $id_product_compare_single ,
                'store_logo_compare' => $store_logo_compare_single ,
                'name_store_compare' => $name_store_compare_single ,
                'price_compare' => $price_compare_single ,
                'Description_compare' => $Description_compare_single ,
                'size_compare' => $size_compare_single ,
                'color_compare' => $color_compare_single ,
                'name_product_ar_compare' => $name_product_ar_compare_single ,
                'name_store_ar_compare' => $name_store_ar_compare_single  ,
                'Description_ar_compare' => $Description_ar_compare_single ,
                'name_product_compare' => $name_product_compare_single
            );

            ?>
                <script type='text/javascript'>
                    var message6 = '<?php echo $language['Product added to compare'] ?>';
                    alert(message6);
                    window.location.href='single-product.php?lang=<?php echo $lang ?>&Id_prudoct=<?php echo $id_product_compare_single ?>';
                    exit;
                </script>
            <?php
        }
    }
        
}
//$_SESSION['nologin_compare']=array();

$nologin_compare = $_SESSION['nologin_compare']??"";
//print_r($nologin_compare);
$json_compare = json_encode($nologin_compare);
setcookie('nologin_compare' , $json_compare , time()+(60 * 60 * 24 * 7) , '/');

?>

