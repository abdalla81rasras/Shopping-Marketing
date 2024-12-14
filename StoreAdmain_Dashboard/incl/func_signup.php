<?php
// signup
if(isset($_POST['creat_acount'])) {
	
   if(empty($_FILES['img_store_info']['name'])){
      $errors['img_store_info']="No Selected Image";
   }else{
      $img_store_info = $_FILES['img_store_info']['name'];
      $img_store_infoTamp = $_FILES["img_store_info"]["tmp_name"];
      $folderimg_store_info = "../Upload/" . $img_store_info ;
      move_uploaded_file($img_store_infoTamp , $folderimg_store_info );
   }

   if(empty($_POST['StoreName_info'])){
      $errors['StoreName_info']="No Store Name";
   }else{
      $StoreName_info = $_POST['StoreName_info'];
   }

   if(empty($_POST['email_store_info'])){
      $errors['email_store_info']="No Email";
   }else{
      $email_store_info = $_POST['email_store_info'];
      if(!filter_var($email_store_info, FILTER_VALIDATE_EMAIL)){
         $errors['email_store_info'] = 'Email Invalid';
      }
   }

   if(empty($_POST['ph_n_store_info'])){
      $errors['ph_n_store_info']="No Phone Number";
   }else{
      $ph_n_store_info = $_POST['ph_n_store_info'];
      if(!preg_match('/^\s*(?:\+?(\d{1,3}))?[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{4})(?: *x(\d+))?\s*$/', $ph_n_store_info)){
         $errors['ph_n_store_info'] = 'Phone Number Invalid';
      }
   }

   if(empty($_POST['pass_store_info'])){
      $errors['pass_store_info']="No Password";
   }else{
      $pass_store_info = $_POST['pass_store_info'];
      if(!preg_match('/(?=.*[A-Za-z0-9])(?=.*\d)[A-Za-z\d]{8,}/',$pass_store_info)){
         $errors['pass_store_info']="must be password strong 8 characters";
      }
   }

   if(empty($_POST['cpss_store_info'])){
      $errors['cpss_store_info']="No Confirm Password";
   }else{
      $cpss_store_info = $_POST['cpss_store_info'];
      if($cpss_store_info != $pass_store_info){
         $errors['cpss_store_info']="Not Same Password";
      }
   }

   if(empty($_POST['wbi_store_info'])){
      $errors['wbi_store_info']="Empty Field";
   }else{
      $wbi_store_info = $_POST['wbi_store_info'];
   }

   if(empty($_POST['cardNumber_store_info'])){
      $errors['cardNumber_store_info']="No Card Number";
   }else{
      $cardNumber_store_info = $_POST['cardNumber_store_info'];
      if(!preg_match('/^4[0-9]{6,}$/', $cardNumber_store_info)){
         //visa
      }elseif(!preg_match('/^5[1-5][0-9]{5,}|222[1-9][0-9]{3,}|22[3-9][0-9]{4,}|2[3-6][0-9]{5,}|27[01][0-9]{4,}|2720[0-9]{3,}$/', $cardNumber_store_info)){
         //master card
      }elseif(!preg_match('/^3[47][0-9]{5,}$/', $cardNumber_store_info)){
         //american express
      }elseif(!preg_match('/^3(?:0[0-5]|[68][0-9])[0-9]{4,}$/', $cardNumber_store_info)){
         //diners club
      }elseif(!preg_match('/^6(?:011|5[0-9]{2})[0-9]{3,}$/', $cardNumber_store_info)){
         //discovrer
      }elseif(!preg_match('/^(?:2131|1800|35[0-9]{3})[0-9]{3,}$/', $cardNumber_store_info)){
         //jbc
      }else{
         $errors['cardNumber_store_info'] = 'Card Number Incorrect'; 
      }
   }

   if(empty($_POST['cardName_store_info'])){
      $errors['cardName_store_info']="No Card Name";
   }else{
      $cardName_store_info = $_POST['cardName_store_info'];
      if(!preg_match("/^[\p{L}\s.'-]+$/u", $cardName_store_info)){
         $errors['cardName_store_info'] = 'Card Name Invalid';
      }
   }

   if(empty($_POST['Expirydate_store_info'])){
      $errors['Expirydate_store_info']="No Expiry Date";
   }else{
      $Expirydate_store_info = $_POST['Expirydate_store_info'];
      if(!preg_match('/^(0[1-9]|1[0-2])\/\d{2}$/', $Expirydate_store_info)){
         $errors['Expirydate_store_info'] = 'Card Expiry Date Invalid';
      }
   }

   if(empty($_POST['CardSecurity_store_info'])){
         $errors['CardSecurity_store_info']="No Card Security";
   }else{
      $CardSecurity_store_info = $_POST['CardSecurity_store_info'];
      if(!preg_match('/^[0-9]{3,4}$/', $CardSecurity_store_info)){
         $errors['CardSecurity_store_info'] = 'Card Security Invalid';
      }
   }

   if(empty($_POST['ShippingAddress_store_info'])){
      $errors['ShippingAddress_store_info']="No Shipping Address";
   }else{
      $ShippingAddress_store_info = $_POST['ShippingAddress_store_info'];
   }

   if(empty($_POST['Shop_Category_store_info'])){
      $errors['Shop_Category_store_info']="No Shop Category";
   }else{
      $Shop_Category_store_info = $_POST['Shop_Category_store_info'];
      $Shop_Category_store_info_str = implode(',' , $Shop_Category_store_info);
   }

   if(empty($_POST['Shop_sub_Category_store_info'])){
      $errors['Shop_sub_Category_store_info']="No Shop Sub Category";
   }else{
      $Shop_sub_Category_store_info = $_POST['Shop_sub_Category_store_info'];
      $Shop_sub_Category_store_info_str = implode(',' , $Shop_sub_Category_store_info);
   }

   if(empty($_POST['agree_terms'])){
      $errors['agree_terms']="Not Selected";
   }else{
      $agree_terms = $_POST['agree_terms'];
   }

   if(!array_filter($errors)){
      $img_store_info = mysqli_real_escape_string($conn , $_FILES['img_store_info']['name']);
      $StoreName_info = mysqli_real_escape_string($conn , $_POST['StoreName_info']);
      $email_store_info = mysqli_real_escape_string($conn , $_POST['email_store_info']);
      $ph_n_store_info = mysqli_real_escape_string($conn , $_POST['ph_n_store_info']);
      $pass_store_info = mysqli_real_escape_string($conn , $_POST['pass_store_info']);
      $cpss_store_info = mysqli_real_escape_string($conn , $_POST['cpss_store_info']);
      $wbi_store_info = mysqli_real_escape_string($conn , $_POST['wbi_store_info']);
      $cardNumber_store_info = mysqli_real_escape_string($conn , $_POST['cardNumber_store_info']);
      $cardName_store_info = mysqli_real_escape_string($conn , $_POST['cardName_store_info']);
      $Expirydate_store_info = mysqli_real_escape_string($conn , $_POST['Expirydate_store_info']);
      $CardSecurity_store_info = mysqli_real_escape_string($conn , $_POST['CardSecurity_store_info']);
      $ShippingAddress_store_info = mysqli_real_escape_string($conn , $_POST['ShippingAddress_store_info']);
      $agree_terms = mysqli_real_escape_string($conn , $_POST['agree_terms']);

      $cheack_sql="SELECT `email_store_info`,`pass_store_info` FROM `store_information`";
      $query_sql=mysqli_query($conn,$cheack_sql);
      $num_rows=mysqli_num_rows($query_sql);

      if($num_rows < 0){

         $errors['exists']="Email | Password Exist";
         
      }else{

         $role_vendor = 'vendor';

         $sql="INSERT INTO `store_information`
                           (`img_store_info`,`StoreName_info`,
                           `email_store_info`,`ph_n_store_info`,
                           `pass_store_info`,`cpss_store_info`,
                           `wbi_store_info`,`cardNumber_store_info`,
                           `cardName_store_info`,`Expirydate_store_info`,
                           `CardSecurity_store_info`,`ShippingAddress_store_info`,
                           `Shop_Category_store_info`,`Shop_sub_Category_store_info`,`agree_terms`,`role`) 
                  VALUES   ('$img_store_info','$StoreName_info',
                           '$email_store_info','$ph_n_store_info',
                           '$pass_store_info','$cpss_store_info',
                           '$wbi_store_info','$cardNumber_store_info',
                           '$cardName_store_info','$Expirydate_store_info',
                           '$CardSecurity_store_info','$ShippingAddress_store_info',
                           '$Shop_Category_store_info_str','$Shop_sub_Category_store_info_str','$agree_terms','$role_vendor')";

         if(mysqli_query($conn , $sql)){ 

            ?>
               <script type='text/javascript'>
                  var message = '<?php echo $language['Login Successfully'] ?>';
                  alert(message);
               </script>";
            <?php
            
            header("Location:login.php?lang=".$_GET['lang']);

         }else{
            echo 'query error !' . mysqli_error($conn);
         }
      }      
   }
}
?>

<?php include "head_sgin_reg.php"; ?>
