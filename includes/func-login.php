<?php
$user_name=$password="";
$errors=array("user_name"=>"" , "password"=>"");

if(isset($_POST['user_name']) && isset($_POST['password'])){

    if(empty($_POST['user_name'])){
        $errors['user_name']="No username";
    }else{
        $user_name = $_POST['user_name'];
        if(!preg_match('/^.{5,}$/' , $user_name)){
            $errors['user_name']="username must be at least 5 characters";
        }
    }

    if(empty($_POST['password'])){
        $errors['password']="No password";
    }else{
        $password = $_POST['password'];
        if(!preg_match('/(?=.*[A-Za-z0-9])(?=.*\d)[A-Za-z\d]{8,}/',$password)){
            $errors['password']="must be password strong 8 characters";
        }
    }

    if(!array_filter($errors)){

        $user_name = mysqli_real_escape_string($conn_main_admin , $_POST['user_name']);
        $password = mysqli_real_escape_string($conn_main_admin , $_POST['password']);            

        $sql="SELECT * FROM `users` WHERE `user_name`='$user_name' && `password`='$password'";

        $query= mysqli_query($conn_main_admin , $sql);

        $num_row = mysqli_num_rows($query);

        if($num_row > 0){

            $row= mysqli_fetch_assoc($query);
            $id_users = $row['id_users'];
            
            $_SESSION['TRue'] = true;
            $_SESSION['id_users'] = $id_users;

            if(isset($_COOKIE['cart_nologin'])){

                $carts = json_decode($_COOKIE['cart_nologin'] , true);
             
                if(is_array($carts) || is_object($carts)){
             
                    foreach($carts as $id_product_basket => $items){
                      
                        $id_product_basket = mysqli_real_escape_string($conn_main_admin , $items['id_product_basket']);
                        $name_product_basket_ar = mysqli_real_escape_string($conn_main_admin , $items['name_product_basket_ar']);
                        $name_product_basket = mysqli_real_escape_string($conn_main_admin , $items['name_product_basket']);
                        $name_store_basket = mysqli_real_escape_string($conn_main_admin , $items['name_store_basket']);
                        $store_logo_basket = mysqli_real_escape_string($conn_main_admin , $items['store_logo_basket']);
                        $name_store_basket_ar = mysqli_real_escape_string($conn_main_admin , $items['name_store_basket_ar']);
                        $qty_basket = $items['qty_basket'];
                        $price_basket = $items['price_basket'];
                    
                        $sql_cheack = "SELECT * FROM `topages_basket` WHERE `id_user`='".$_SESSION['id_users']."' AND `id_prudoct`='$id_product_basket'";
                        $query_cheack = mysqli_query($conn_main_admin,$sql_cheack);

                        if(mysqli_num_rows($query_cheack) > 0){

                            $row_cheack = mysqli_fetch_assoc($query_cheack);
                            $id_user_cheak = $row_cheack['id_user'];
                            $id_prudoct_cheack = $row_cheack['id_prudoct'];

                            $increment_qty = 1;
                            $update_qty = "UPDATE `topages_basket` SET `qty_basket`=`qty_basket`+$increment_qty WHERE `id_user`='$id_user_cheak' AND `id_prudoct`='$id_prudoct_cheack'";

                            if(mysqli_query($conn_main_admin,$update_qty)){
                                
                            }else {
                                echo "Error update" . mysqli_error($conn_main_admin);
                            }

                        }else{

                            $sql_insert = "INSERT INTO `topages_basket`(`id_user`,`id_prudoct`,`prudoct_name_basket`,`store_logo_basket`,`name_logo_basket`,`name_product_basket_ar`,`name_store_basket_ar`,`price_basket`,`qty_basket`) 
                                VALUES('".$_SESSION['id_users']."','$id_product_basket','$name_product_basket','$store_logo_basket','$name_store_basket','$name_product_basket_ar','$name_store_basket_ar','$price_basket','$qty_basket')";

                            if(mysqli_query($conn_main_admin,$sql_insert)){
                                
                            }else {
                                echo "Error Query" . mysqli_error($conn_main_admin);
                            } 

                        }
                    }                    
                }

            }

            setcookie('cart_nologin' , '' , time() - 3600 , '/');

            if(isset($_COOKIE['favorite_nologin'])){

                $favorites = json_decode($_COOKIE['favorite_nologin'] , true);
            
                if(is_array($favorites) || is_object($favorites)){
            
                    foreach($favorites as $id_product_favorite => $items){
 
                        $id_product_favorite = $items['id_product_favorite'];
                        $name_product_favorite = $items['name_product_favorite'];
                        $name_product_ar_favorite = $items['name_product_ar_favorite'];
                        $store_logo_favorite = $items['store_logo_favorite'];
                        $name_store_favorite = $items['name_store_favorite'];
                        $name_store_ar_favorite = $items['name_store_ar_favorite'];
                        $price_favorite = $items['price_favorite'];
                        $qty_favorite = $items['qty_favorite'];

                        $sql_cheack = "SELECT * FROM `topages_favorite` WHERE `id_user`='".$_SESSION['id_users']."' AND `id_prudoct`='$id_product_favorite'";
                        $query_cheack = mysqli_query($conn_main_admin,$sql_cheack);

                        if(mysqli_num_rows($query_cheack) > 0){
                            
                            $row_cheack = mysqli_fetch_assoc($query_cheack);
                            $id_user_cheak=$row_cheack['id_user'];
                            $id_prudoct_cheack=$row_cheack['id_prudoct'];

                            $increment_qty = 1;
                            $update_qty = "UPDATE `topages_favorite` SET `qty_favortie`=`qty_favortie`+$increment_qty WHERE `id_user`='$id_user_cheak' AND `id_prudoct`='$id_prudoct_cheack'";

                            if(mysqli_query($conn_main_admin,$update_qty)){

                            }else {
                                echo "Error update" . mysqli_error($conn_main_admin);
                            }

                        }else {

                            $sql = "INSERT INTO `topages_favorite`(`id_user`,`id_prudoct`,`prudoct_name_favorite`,`store_logo_favorite`,`name_logo_favorite`,`name_product_ar_favorite`,`name_store_ar_favorite`,`price_favorite`,`qty_favortie`) 
                                        VALUES('".$_SESSION['id_users']."','$id_product_favorite','$name_product_favorite','$store_logo_favorite','$name_store_favorite','$name_product_ar_favorite','$name_store_ar_favorite','$price_favorite','$qty_favorite')";

                            if(mysqli_query($conn_main_admin,$sql)){

                            }else {
                                echo "Error Query" . mysqli_error($conn_main_admin);
                            }

                        }
                    }
                }
            }
            
            setcookie('favorite_nologin' , '' , time()-3600 , '/');

            if(isset($_COOKIE['nologin_compare'])){

                $compares = json_decode($_COOKIE['nologin_compare'] , true);
             
                if(is_array($compares) || is_object($compares)){
             
                    foreach($compares as $id_product_compare => $items){
 
                        $id_product_compare = $items['id_product_compare'];
                        $store_logo_compare = $items['store_logo_compare'];
                        $name_store_compare = $items['name_store_compare'];
                        $price_compare = $items['price_compare'];
                        $Description_compare = $items['Description_compare'];
                        $size_compare = $items['size_compare'];
                        $color_compare = $items['color_compare'];
                        $name_product_ar_compare = $items['name_product_ar_compare'];
                        $name_store_ar_compare = $items['name_store_ar_compare'];
                        $Description_ar_compare = $items['Description_ar_compare'];
                        $name_product_compare = $items['name_product_compare'];
                
                        $sql_cheack = "SELECT * FROM `topages_compare` WHERE `id_user`='".$_SESSION['id_users']."' AND `id_product`='$id_product_compare'";
                        $query_cheack = mysqli_query($conn_main_admin , $sql_cheack);

                        if(mysqli_num_rows($query_cheack) > 0){                        
                            
                        }else{

                            $sql_compare = "INSERT INTO `topages_compare`(`id_product`,`id_user`,`name_product_compare`,`store_logo_compare`,`name_store_compare`,`price_compare`,`Description_compare`,`name_product_ar_compare`,`name_store_ar_compare`,`Description_ar_compare`,`size_compare`,`color_compare`) 
                                            VALUES('$id_product_compare','".$_SESSION['id_users']."','$name_product_compare','$store_logo_compare','$name_store_compare','$price_compare','$Description_compare','$name_product_ar_compare','$name_store_ar_compare','$Description_ar_compare','$size_compare','$color_compare')";

                            if(mysqli_query($conn_main_admin , $sql_compare)){
                                
                            }else{
                                echo "Query Error !!" . mysqli_error($conn_main_admin);
                            }

                        } 
                   }
                }
            }
             
            setcookie('nologin_compare' , '' , time()-3600 , '/');

            header("Location:index.php?lang=".$_GET['lang']);
            
        }else{ 

            $_SESSION['er_log']="Username | Password Incorrect";

        }
        
    }

}