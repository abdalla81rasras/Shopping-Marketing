<?php

if(isset($_POST['favorite'])){
    
    $id_product_favorite = mysqli_real_escape_string($conn_main_admin , $_POST['id_product']);
    $name_product_favorite = mysqli_real_escape_string($conn_main_admin , $_POST['name_product_pages']);
    $name_product_ar_favorite = mysqli_real_escape_string($conn_main_admin , $_POST['name_product_pages_ar']);
    $store_logo_favorite = mysqli_real_escape_string($conn_main_admin , $_POST['store_logo_pages']);
    $name_store_favorite = mysqli_real_escape_string($conn_main_admin , $_POST['name_store_pages']);
    $name_store_ar_favorite = mysqli_real_escape_string($conn_main_admin , $_POST['name_store_pages_ar']);
    $price_favorite = mysqli_real_escape_string($conn_main_admin , $_POST['price_pages']);

    if(!empty($_SESSION['id_users'])){

        $id_user_favorite = mysqli_real_escape_string($conn_main_admin , $_POST['id_user']);

        $sql_cheack = "SELECT * FROM `topages_favorite` WHERE `id_user`='$id_user_favorite' AND `id_prudoct`='$id_product_favorite'";
        $query_cheack = mysqli_query($conn_main_admin,$sql_cheack);

        if(mysqli_num_rows($query_cheack) > 0){
            
            $row_cheack = mysqli_fetch_assoc($query_cheack);
            $id_user_cheak=$row_cheack['id_user'];
            $id_prudoct_cheack=$row_cheack['id_prudoct'];

            $increment_qty = 1;
            $update_qty = "UPDATE `topages_favorite` SET `qty_favortie`=`qty_favortie`+$increment_qty WHERE `id_user`='$id_user_cheak' AND `id_prudoct`='$id_prudoct_cheack'";

            if(mysqli_query($conn_main_admin,$update_qty)){

                header("Location:wishlist.php?action=updated&lang=".$_GET['lang']);

            }else {
                echo "Error update" . mysqli_error($conn_main_admin);
            }

        }else {

            $sql = "INSERT INTO `topages_favorite`(`id_user`,`id_prudoct`,`prudoct_name_favorite`,`store_logo_favorite`,`name_logo_favorite`,`name_product_ar_favorite`,`name_store_ar_favorite`,`price_favorite`,`qty_favortie`) 
                        VALUES('$id_user_favorite','$id_product_favorite','$name_product_favorite','$store_logo_favorite','$name_store_favorite','$name_product_ar_favorite','$name_store_ar_favorite','$price_favorite',1)";

            if(mysqli_query($conn_main_admin,$sql)){

                header("Location:wishlist.php?action=success&lang=".$_GET['lang']);

            }else {
                echo "Error Query" . mysqli_error($conn_main_admin);
            }

        }

    }else{

        if (!isset($_SESSION['favorite_nologin'])) {
            $_SESSION['favorite_nologin'] = [];
        }

        if (isset($_SESSION['favorite_nologin'][$id_product_favorite])) {

            $_SESSION['favorite_nologin'][$id_product_favorite]['qty_favorite'] += 1;

            header("Location:wishlist.php?action=updated&lang=".$_GET['lang']);

        } else {
            
            $_SESSION['favorite_nologin'][$id_product_favorite] = array(
                'id_product_favorite' => $id_product_favorite ,
                'name_product_favorite' => $name_product_favorite ,
                'name_product_ar_favorite' => $name_product_ar_favorite ,
                'store_logo_favorite' => $store_logo_favorite ,
                'name_store_favorite' => $name_store_favorite ,
                'name_store_ar_favorite' => $name_store_ar_favorite ,
                'price_favorite' => $price_favorite ,
                'qty_favorite' => 1
            );

            header("Location:wishlist.php?action=success&lang=".$_GET['lang']);
        }
    }
}
//$_SESSION['favorite_nologin']=array();

$guest_favorite = $_SESSION['favorite_nologin']??"";
$favorite_json = json_encode($guest_favorite);
setcookie('favorite_nologin' , $favorite_json , time()+(60 * 60 * 24 * 7) , '/');

?>