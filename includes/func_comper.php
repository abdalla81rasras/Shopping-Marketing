<?php

if(isset($_POST['compare'])){
    
    $id_product_compare = mysqli_real_escape_string($conn_main_admin , $_POST['id_product']);
    $name_product_compare = mysqli_real_escape_string($conn_main_admin , $_POST['name_product_pages']);
    $name_product_ar_compare = mysqli_real_escape_string($conn_main_admin , $_POST['name_product_pages_ar']);
    $store_logo_compare = mysqli_real_escape_string($conn_main_admin , $_POST['store_logo_pages']);
    $name_store_compare = mysqli_real_escape_string($conn_main_admin , $_POST['name_store_pages']);
    $name_store_ar_compare = mysqli_real_escape_string($conn_main_admin , $_POST['name_store_pages_ar']);
    $price_compare = mysqli_real_escape_string($conn_main_admin , $_POST['price_pages']);
    $Description_compare = mysqli_real_escape_string($conn_main_admin , $_POST['Description_pages']);
    $Description_ar_compare = mysqli_real_escape_string($conn_main_admin , $_POST['Description_pages_ar']);
    $size_compare = mysqli_real_escape_string($conn_main_admin , $_POST['size_pages']);
    $color_compare = mysqli_real_escape_string($conn_main_admin , $_POST['color_pages']);

    if(isset($_SESSION['id_users'])){
        
        $id_user_compare = mysqli_real_escape_string($conn_main_admin , $_POST['id_user']);

        $sql_cheack = "SELECT * FROM `topages_compare` WHERE `id_user`='$id_user_compare' AND `id_product`='$id_product_compare'";
        $query_cheack = mysqli_query($conn_main_admin , $sql_cheack);

        if(mysqli_num_rows($query_cheack) > 0){
            
            header("Location:compare.php?action=added&lang=".$_GET['lang']);
            
        }else{

            $sql_compare = "INSERT INTO `topages_compare`(`id_product`,`id_user`,`name_product_compare`,`store_logo_compare`,`name_store_compare`,`price_compare`,`Description_compare`,`name_product_ar_compare`,`name_store_ar_compare`,`Description_ar_compare`,`size_compare`,`color_compare`) 
                            VALUES('$id_product_compare','$id_user_compare','$name_product_compare','$store_logo_compare','$name_store_compare','$price_compare','$Description_compare','$name_product_ar_compare','$name_store_ar_compare','$Description_ar_compare','$size_compare','$color_compare')";

            if(mysqli_query($conn_main_admin , $sql_compare)){
                
                header("Location:compare.php?action=success&lang=".$_GET['lang']);
            }
            else{
                echo "Query Error !!" . mysqli_error($conn_main_admin);
            }

        }

    }else{

        if(!isset($_SESSION['nologin_compare'])){
            $_SESSION['nologin_compare']=array();
        }

        if(isset($_SESSION['nologin_compare'][$id_product_compare])){

            header("Location:compare.php?action=added&lang=".$_GET['lang']);            

        }else{

            $_SESSION['nologin_compare'][$id_product_compare]=array(
                'id_product_compare' => $id_product_compare ,
                'store_logo_compare' => $store_logo_compare ,
                'name_store_compare' => $name_store_compare ,
                'price_compare' => $price_compare ,
                'Description_compare' => $Description_compare ,
                'size_compare' => $size_compare ,
                'color_compare' => $color_compare ,
                'name_product_ar_compare' => $name_product_ar_compare ,
                'name_store_ar_compare' => $name_store_ar_compare  ,
                'Description_ar_compare' => $Description_ar_compare ,
                'name_product_compare' => $name_product_compare
            );

            header("Location:compare.php?action=success&lang=".$_GET['lang']);
        }
    }
}
//$_SESSION['nologin_compare']=array();

$nologin_compare = $_SESSION['nologin_compare']??"";
//print_r($nologin_compare);
$json_compare = json_encode($nologin_compare);
setcookie('nologin_compare' , $json_compare , time()+(60 * 60 * 24 * 7) , '/');

?>