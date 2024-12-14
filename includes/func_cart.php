<?php
if(isset($_POST['basket'])){

    $id_product_basket = mysqli_real_escape_string($conn_main_admin , $_POST['id_product']);
    $name_product_basket = mysqli_real_escape_string($conn_main_admin , $_POST['name_product_pages']);
    $name_product_basket_ar = mysqli_real_escape_string($conn_main_admin , $_POST['name_product_pages_ar']);
    $store_logo_basket = mysqli_real_escape_string($conn_main_admin , $_POST['store_logo_pages']);
    $name_store_basket = mysqli_real_escape_string($conn_main_admin , $_POST['name_store_pages']);
    $name_store_basket_ar = mysqli_real_escape_string($conn_main_admin , $_POST['name_store_pages_ar']);
    $price_basket = mysqli_real_escape_string($conn_main_admin , $_POST['price_pages']);

    if(!empty($_SESSION['id_users'])){

        $id_user_basket = mysqli_real_escape_string($conn_main_admin , $_POST['id_user']);

        $sql_cheack = "SELECT * FROM `topages_basket` WHERE `id_user`='$id_user_basket' AND `id_prudoct`='$id_product_basket'";
        $query_cheack = mysqli_query($conn_main_admin,$sql_cheack);

        if(mysqli_num_rows($query_cheack) > 0){
            
            $row_cheack = mysqli_fetch_assoc($query_cheack);
            $id_user_cheak=$row_cheack['id_user'];
            $id_prudoct_cheack=$row_cheack['id_prudoct'];

            $increment_qty = 1;
            $update_qty = "UPDATE `topages_basket` SET `qty_basket`=`qty_basket`+$increment_qty WHERE `id_user`='$id_user_cheak' AND `id_prudoct`='$id_prudoct_cheack'";

            if(mysqli_query($conn_main_admin,$update_qty)){

                header("Location:cart.php?action=updated&lang=".$_GET['lang']);
                
            }else {
                echo "Error update" . mysqli_error($conn_main_admin);
            }

        }else {

            $sql = "INSERT INTO `topages_basket`(`id_user`,`id_prudoct`,`prudoct_name_basket`,`store_logo_basket`,`name_logo_basket`,`name_product_basket_ar`,`name_store_basket_ar`,`price_basket`,`qty_basket`) 
                        VALUES('$id_user_basket','$id_product_basket','$name_product_basket','$store_logo_basket','$name_store_basket','$name_product_basket_ar','$name_store_basket_ar','$price_basket',1)";

            if(mysqli_query($conn_main_admin,$sql)){

                header("Location:cart.php?action=success&lang=".$_GET['lang']);
                
            }else {
                echo "Error Query" . mysqli_error($conn_main_admin);
            }

        }

    }else{

        if (!isset($_SESSION['cart_nologin'])) {
            $_SESSION['cart_nologin'] = array();
        }

        if (isset($_SESSION['cart_nologin'][$id_product_basket])) {

            $_SESSION['cart_nologin'][$id_product_basket]['qty_basket'] += 1;

            header("Location:cart.php?action=updated&lang=".$_GET['lang']);

        } else {
            
            $_SESSION['cart_nologin'][$id_product_basket] = array(
                'id_product_basket' => $id_product_basket ,
                'name_product_basket_ar' => $name_product_basket_ar ,
                'name_product_basket' => $name_product_basket ,
                'name_store_basket' => $name_store_basket ,
                'store_logo_basket' => $store_logo_basket ,
                'name_store_basket_ar'=> $name_store_basket_ar ,
                'qty_basket'=> 1 ,
                'price_basket'=> $price_basket
            );

            header("Location:cart.php?action=success&lang=".$_GET['lang']);
        }

    }
        
}
//$_SESSION['cart_nologin']=array();

$gust_carts = $_SESSION['cart_nologin']??"";
//print_r($gust_carts);
$json_cart = json_encode($gust_carts);
setcookie('cart_nologin', $json_cart, time() + (60 * 60 * 24 * 7), '/');

?>