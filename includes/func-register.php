<?php
$first_name = $last_name = $user_name = $email = $phone_number = $password = $cpassword = $address = "";
$errors=array("first_name"=>"" , "last_name"=>"" , "user_name"=>"" , "display_name"=>"" , "email"=>"" , "phone_number"=>"" , "password"=>"" , "cpassword"=>"" , "address"=>"");

if(isset($_POST['sgin_up'])){
	
   if(empty($_POST['first_name'])){
      $errors['first_name']="No first name";
   }else{
      $first_name = $_POST['first_name'];
   }

   if(empty($_POST['last_name'])){
      $errors['last_name']="No last name";
   }else{
      $last_name = $_POST['last_name'];
   }

   if(empty($_POST['user_name'])){
      $errors['user_name']="No username";
   }else{
      $user_name = $_POST['user_name'];
      if(!preg_match('/^.{5,}$/' , $user_name)){
      $errors['user_name']="username must be at least 5 characters";
      }
   }

   if(empty($_POST['email'])){
      $errors['email']="No email";
   }else{
      $email = $_POST['email'];
      if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $errors['email'] = 'Email Invalid';
      }
   }

   if(empty($_POST['phone_number'])){
      $errors['phone_number']="No phone number";
   }else{
      $phone_number = $_POST['phone_number'];
      if(!preg_match('/^\s*(?:\+?(\d{1,3}))?[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{4})(?: *x(\d+))?\s*$/', $phone_number)){
      $errors['phone_number'] = 'Phone Number Invalid';
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

   if(empty($_POST['cpassword'])){
      $errors['cpassword']="No Confirm Password";
   }else{
      $cpassword = $_POST['cpassword'];
      if($cpassword != $password){
      $errors['cpassword']="Not Same Password";
      }
   }

   if(empty($_POST['address'])){
      $errors['address']="No address";
   }else{
      $address = $_POST['address'];
   }

   if(!array_filter($errors)){
      $first_name = mysqli_real_escape_string($conn_main_admin , $_POST['first_name']);
      $last_name = mysqli_real_escape_string($conn_main_admin , $_POST['last_name']);
      $user_name = mysqli_real_escape_string($conn_main_admin , $_POST['user_name']);
      $email = mysqli_real_escape_string($conn_main_admin , $_POST['email']);
      $phone_number = mysqli_real_escape_string($conn_main_admin , $_POST['phone_number']);
      $password = mysqli_real_escape_string($conn_main_admin , $_POST['password']);
      $cpassword = mysqli_real_escape_string($conn_main_admin , $_POST['cpassword']);
      $address = mysqli_real_escape_string($conn_main_admin , $_POST['address']);

      $cheack_sql="SELECT * FROM `users` WHERE `user_name`='$user_name' || `password`='$password' || `email`='$email' || `phone_number`='$phone_number'";
      $query_sql=mysqli_query($conn_main_admin,$cheack_sql);
      $check_rows=mysqli_fetch_assoc($query_sql);

      if(!$check_rows){
         
         $rol_user = "user";

         $sql="INSERT INTO `users`(`first_name`,`last_name`,`user_name`,`email`,`phone_number`,`password`,`cpassword`,`address`,`role`) VALUES('$first_name','$last_name','$user_name','$email','$phone_number','$password','$cpassword','$address','$rol_user')";
         if(mysqli_query($conn_main_admin , $sql)){

            $id_insert_user = mysqli_insert_id($conn_main_admin);

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
            
                     $sql = "INSERT INTO `topages_basket`(`id_user`,`id_prudoct`,`prudoct_name_basket`,`store_logo_basket`,`name_logo_basket`,`name_product_basket_ar`,`name_store_basket_ar`,`price_basket`,`qty_basket`) 
                        VALUES('$id_insert_user','$id_product_basket','$name_product_basket','$store_logo_basket','$name_store_basket','$name_product_basket_ar','$name_store_basket_ar','$price_basket','$qty_basket')";

                     if(mysqli_query($conn_main_admin,$sql)){
                        
                     }else {
                        echo "Error Query" . mysqli_error($conn_main_admin);
                     } 
                  }
               }
            }

            setcookie('cart_nologin' , '' , time()-3600 , '/');


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

                     $sql = "INSERT INTO `topages_favorite`(`id_user`,`id_prudoct`,`prudoct_name_favorite`,`store_logo_favorite`,`name_logo_favorite`,`name_product_ar_favorite`,`name_store_ar_favorite`,`price_favorite`,`qty_favortie`) 
                        VALUES('$id_insert_user','$id_product_favorite','$name_product_favorite','$store_logo_favorite','$name_store_favorite','$name_product_ar_favorite','$name_store_ar_favorite','$price_favorite','$qty_favorite')";

                     if(mysqli_query($conn_main_admin,$sql)){

                     }else {
                        echo "Error Query" . mysqli_error($conn_main_admin);
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
            
                     $sql_compare = "INSERT INTO `topages_compare`(`id_product`,`id_user`,`name_product_compare`,`store_logo_compare`,`name_store_compare`,`price_compare`,`Description_compare`,`name_product_ar_compare`,`name_store_ar_compare`,`Description_ar_compare`,`size_compare`,`color_compare`) 
                            VALUES('$id_product_compare','$id_insert_user','$name_product_compare','$store_logo_compare','$name_store_compare','$price_compare','$Description_compare','$name_product_ar_compare','$name_store_ar_compare','$Description_ar_compare','$size_compare','$color_compare')";

                     if(mysqli_query($conn_main_admin , $sql_compare)){
                        
                     }else{
                        echo "Query Error !!" . mysqli_error($conn_main_admin);
                     } 

                  }
               }
            }
            
            setcookie('nologin_compare' , '' , time()-3600 , '/');
            
            header("Location:login.php?reg=success_register&lang=".$_GET['lang']);

         }else{
            echo 'query error' . mysqli_error($conn_main_admin);
         }
         
      }else {

         $_SESSION['er_reg']= "Account already exist";

         if($check_rows['user_name']===$user_name){
               $errors['user_name']="Username Exist";
         }

         if($check_rows['password']===$password){
               $errors['password']="Password Exist";
         }

         if($check_rows['email']===$email){
               $errors['email']="Email Exist";
         }

         if($check_rows['phone_number']===$phone_number){
               $errors['phone_number']="Phone Number Exist";
         }
      }
   }
}
?>
