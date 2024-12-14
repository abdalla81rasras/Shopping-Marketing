<?php 
//prudocts
if(isset($_POST['save_name_prudoct'])){
	
   $store_name_prudoct = $_SESSION['StoreName_info'];

   if(empty($_POST['store_name_prudoct_arbic'])){
      $errors['store_name_prudoct_arbic']="لا يوجد اسم المتجر";
   }else{
      $store_name_prudoct_arbic = $_POST['store_name_prudoct_arbic'];
   }

   if(empty($_POST['Products_Name'])){
      $errors['Products_Name']="No Products Name";
   }else{
      $Products_Name = $_POST['Products_Name'];
   }

   if(empty($_POST['Products_Name_arabic'])){
      $errors['Products_Name_arabic']="لا يوجد اسم منتج";
   }else{
      $Products_Name_arabic = $_POST['Products_Name_arabic'];
   }

   if(empty($_POST['Product_Short_Description'])){
      $errors['Product_Short_Description']="No Short Description";
   }else{
      $Product_Short_Description = $_POST['Product_Short_Description'];
   }

   if(empty($_POST['Product_Short_Description_arabic'])){
      $errors['Product_Short_Description_arabic']="لا يوجد وصف قصير للمنتج";
   }else{
      $Product_Short_Description_arabic = $_POST['Product_Short_Description_arabic'];
   }

   if(empty($_POST['Product_Full_Description'])){
      $errors['Product_Full_Description']="No Full Description";
   }else{
      $Product_Full_Description = $_POST['Product_Full_Description'];
   }

   if(empty($_POST['Product_Full_Description_arbic'])){
      $errors['Product_Full_Description_arbic']="لا يوجد وصف طويل للمنتج";
   }else{
      $Product_Full_Description_arbic = $_POST['Product_Full_Description_arbic'];
   }

   if(empty($_POST['Product_Material'])){
      $errors['Product_Material']="No Product Material";
   }else{
      $Product_Material = $_POST['Product_Material'];
   }

   if(empty($_POST['Product_Material_arabic'])){
      $errors['Product_Material_arabic']="لا يوجد مواد المنتج";
   }else{
      $Product_Material_arabic = $_POST['Product_Material_arabic'];
   }

   if(empty($_POST['Products_Sizes'])){
      $errors['Products_Sizes']="No Selected Size";
   }else{
      $Products_Sizes = $_POST['Products_Sizes'];
   }

   if(empty($_POST['Product_Colors'])){
      $errors['Product_Colors']="No Selected Color";
   }else{
      $Product_Colors = $_POST['Product_Colors'];
   }

   if(empty($_POST['Product_Price'])){
      $errors['Product_Price']="No Price";
   }else{
      $Product_Price = $_POST['Product_Price'];
   }

   if(empty($_POST['discout_prudoct'])){
      
   }else{
      $discout_prudoct = $_POST['discout_prudoct'];
   }

   if(empty($_POST['Delivery_Policy_Time'])){
      $errors['Delivery_Policy_Time']="No Delivery Policy Time";
   }else{
      $Delivery_Policy_Time = $_POST['Delivery_Policy_Time'];
   }

   if(empty($_POST['Delivery_Policy_Time_arbic'])){
      $errors['Delivery_Policy_Time_arbic']="الحقل فارغ";
   }else{
      $Delivery_Policy_Time_arbic = $_POST['Delivery_Policy_Time_arbic'];
   }
   
   if(empty($_POST['Return_Policy'])){
      $errors['Return_Policy']="No Return Policy";
   }else{
      $Return_Policy = $_POST['Return_Policy'];
   }

   if(empty($_POST['Return_Policy_arabic'])){
      $errors['Return_Policy_arabic']="لا يوجد سياسة العائدات";
   }else{
      $Return_Policy_arabic = $_POST['Return_Policy_arabic'];
   }

   if(empty($_POST['Products_Category'])){
      $errors['Products_Category']="No Selected Products Category";
   }else{
      $Products_Category = $_POST['Products_Category'];
      $Products_Category_str = implode(",", $Products_Category);
   }
   
   if(empty($_POST['Products_sub_Category'])){
      $errors['Products_sub_Category']="No Selected Products Sub Category";
   }else{
      $Products_sub_Category = $_POST['Products_sub_Category'];
      $Products_sub_Category_str = implode(",", $Products_sub_Category);
   } 

   if(empty($_FILES['store_logo_prudoct']['name'])){
      $errors['store_logo_prudoct']="No Selected Image";
   }else{
      $store_logo_prudoct = $_FILES['store_logo_prudoct']['name'];
      $store_logo_prudoctTamp = $_FILES["store_logo_prudoct"]["tmp_name"];
      $folderstore_logo_prudoct = "../Upload/". $store_logo_prudoct ;
      move_uploaded_file($store_logo_prudoctTamp , $folderstore_logo_prudoct);
   }

   $status_product_qty  = true;

   if(!array_filter($errors)){
      $store_name_prudoct = mysqli_real_escape_string($conn , $_SESSION['StoreName_info']);
      $store_name_prudoct_arbic = mysqli_real_escape_string($conn , $_POST['store_name_prudoct_arbic']);
      $Products_Name = mysqli_real_escape_string($conn , $_POST['Products_Name']);
      $Products_Name_arabic = mysqli_real_escape_string($conn , $_POST['Products_Name_arabic']);
      $Product_Short_Description = mysqli_real_escape_string($conn , $_POST['Product_Short_Description']);
      $Product_Short_Description_arabic = mysqli_real_escape_string($conn , $_POST['Product_Short_Description_arabic']);
      $Product_Full_Description = mysqli_real_escape_string($conn , $_POST['Product_Full_Description']);
      $Product_Full_Description_arbic = mysqli_real_escape_string($conn , $_POST['Product_Full_Description_arbic']);
      $Product_Material = mysqli_real_escape_string($conn , $_POST['Product_Material']);
      $Product_Material_arabic = mysqli_real_escape_string($conn , $_POST['Product_Material_arabic']);
      $Products_Sizes = mysqli_real_escape_string($conn , $_POST['Products_Sizes']);
      $Product_Colors = mysqli_real_escape_string($conn , $_POST['Product_Colors']);
      $Product_Price = mysqli_real_escape_string($conn , $_POST['Product_Price']);
      $discout_prudoct = mysqli_real_escape_string($conn , $_POST['discout_prudoct']);
      $Delivery_Policy_Time = mysqli_real_escape_string($conn , $_POST['Delivery_Policy_Time']);
      $Delivery_Policy_Time_arbic = mysqli_real_escape_string($conn , $_POST['Delivery_Policy_Time_arbic']);
      $Return_Policy = mysqli_real_escape_string($conn , $_POST['Return_Policy']);
      $Return_Policy_arabic = mysqli_real_escape_string($conn , $_POST['Return_Policy_arabic']);
      $store_logo_prudoct = mysqli_real_escape_string($conn , $_FILES['store_logo_prudoct']['name']);

      $sql="INSERT INTO  `prudocts`(`store_name_prudoct`,`store_name_prudoct_arbic`,`Products_Name`,
                                    `Products_Name_arabic`,`Product_Short_Description`,`Product_Short_Description_arabic`,
                                    `Product_Full_Description`, `Product_Full_Description_arbic`,`Product_Material` ,
                                    `Product_Material_arabic`,`Products_Sizes`,`Product_Colors`,`Product_Price`,
                                    `discout_prudoct`,`Delivery_Policy_Time`, `Delivery_Policy_Time_arbic` ,
                                    `Return_Policy`,`Return_Policy_arabic`,`store_logo_prudoct`,
                                    `Products_Category`,`Products_sub_Category`,`status_product_qty`) 
                           VALUES  ('$store_name_prudoct','$store_name_prudoct_arbic','$Products_Name',
                                    '$Products_Name_arabic','$Product_Short_Description','$Product_Short_Description_arabic',
                                    '$Product_Full_Description','$Product_Full_Description_arbic','$Product_Material',
                                    '$Product_Material_arabic','$Products_Sizes','$Product_Colors','$Product_Price',
                                    '$discout_prudoct','$Delivery_Policy_Time', '$Delivery_Policy_Time_arbic' ,
                                    '$Return_Policy','$Return_Policy_arabic','$store_logo_prudoct',
                                    '$Products_Category_str','$Products_sub_Category_str','$status_product_qty')";

      if(mysqli_query($conn , $sql)){
         header("Location:all_products_all.php?lang=".$_GET['lang']);
      }else{
         echo 'query error' . mysqli_error($conn);
      }
   }
}

if(isset($_GET['delete_name_prudoct'])){
    
   $id_name_prudoct=$_GET['delete_name_prudoct'];

   $sql="DELETE FROM `prudocts` WHERE `id_name_prudoct`='$id_name_prudoct'";

   if(mysqli_query($conn, $sql)){

   } else {
      echo 'query error: '. mysqli_error($conn);
   }
   
   header("Location:all_products_all.php?lang=".$_GET['lang']);
}

if(isset($_GET['edit_name_prudoct'])){

   $id_name_prudoct=$_GET['edit_name_prudoct'];

   $update=true;
   $edit=true;

   $sql="SELECT * FROM `prudocts` WHERE `id_name_prudoct`='$id_name_prudoct'";

   $query=mysqli_query($conn,$sql);

   while ($row=mysqli_fetch_assoc($query)) {   
      $store_name_prudoct = $row['store_name_prudoct'];
      $store_name_prudoct_arbic = $row['store_name_prudoct_arbic'];
      $Products_Name = $row['Products_Name'];
      $Products_Name_arabic = $row['Products_Name_arabic'];
      $Product_Short_Description = $row['Product_Short_Description'];
      $Product_Short_Description_arabic = $row['Product_Short_Description_arabic'];
      $Product_Full_Description = $row['Product_Full_Description'];
      $Product_Full_Description_arbic = $row['Product_Full_Description_arbic'];
      $Product_Material = $row['Product_Material'];
      $Product_Material_arabic = $row['Product_Material_arabic'];
      $Products_Sizes = $row['Products_Sizes'];
      $Product_Colors = $row['Product_Colors'];
      $Product_Price = $row['Product_Price'];
      $discout_prudoct = $row['discout_prudoct'];
      $Delivery_Policy_Time = $row['Delivery_Policy_Time'];
      $Delivery_Policy_Time_arbic= $row['Delivery_Policy_Time_arbic'];
      $Return_Policy = $row['Return_Policy'];
      $Return_Policy_arabic = $row['Return_Policy_arabic'];
      $Products_Category = $row['Products_Category'];
      $Products_sub_Category = $row['Products_sub_Category'];
      $store_logo_prudoct = $row['store_logo_prudoct'];
   }

   if(empty($_FILES['store_logo_prudoct']['name'])){
      $errors['edit_store_logo_prudoct']="Must be selected Old image when updating data";
   }
}

if(isset($_POST['update_name_prudoct'])){

   $id_name_prudoct = $_POST['id_name_prudoct'];

   $update=true;

   $store_name_prudoct = $_SESSION['StoreName_info'];

   if(empty($_POST['store_name_prudoct_arbic'])){
      $errors['store_name_prudoct_arbic']="لا يوجد تحديث اسم المتجر";
   }else{
      $store_name_prudoct_arbic = $_POST['store_name_prudoct_arbic'];
   }

   if(empty($_POST['Products_Name'])){
      $errors['Products_Name']="No Products Name";
   }else{
      $Products_Name = $_POST['Products_Name'];
   }

   if(empty($_POST['Products_Name_arabic'])){
      $errors['Products_Name_arabic']="لا يوجد تديث المنتج";
   }else{
      $Products_Name_arabic = $_POST['Products_Name_arabic'];
   }

   if(empty($_POST['Product_Short_Description'])){
      $errors['Product_Short_Description']="No Short Description";
   }else{
      $Product_Short_Description = $_POST['Product_Short_Description'];
   }

   if(empty($_POST['Product_Short_Description_arabic'])){
      $errors['Product_Short_Description_arabic']="لا يوجد تحديث الوصف القصير للمنتج";
   }else{
      $Product_Short_Description_arabic = $_POST['Product_Short_Description_arabic'];
   }

   if(empty($_POST['Product_Full_Description'])){
      $errors['Product_Full_Description']="No Full Description";
   }else{
      $Product_Full_Description = $_POST['Product_Full_Description'];
   }

   if(empty($_POST['Product_Full_Description_arbic'])){
      $errors['Product_Full_Description_arbic']="لا يوجد تحديث الوصف طويل للمنتج";
   }else{
      $Product_Full_Description_arbic = $_POST['Product_Full_Description_arbic'];
   }

   if(empty($_POST['Product_Material'])){
      $errors['Product_Material']="No Product Material";
   }else{
      $Product_Material = $_POST['Product_Material'];
   }

   if(empty($_POST['Product_Material_arabic'])){
      $errors['Product_Material_arabic']="لا يوجد تحديث مواد المنتج";
   }else{
      $Product_Material_arabic = $_POST['Product_Material_arabic'];
   }

   if(empty($_POST['Products_Sizes'])){
      $errors['Products_Sizes']="No Selected Size";
   }else{
      $Products_Sizes = $_POST['Products_Sizes'];
   }

   if(empty($_POST['Product_Colors'])){
      $errors['Product_Colors']="No Selected Color";
   }else{
      $Product_Colors = $_POST['Product_Colors'];
   }

   if(empty($_POST['Product_Price'])){
      $errors['Product_Price']="No Price";
   }else{
      $Product_Price = $_POST['Product_Price'];
   }

   if(empty($_POST['discout_prudoct'])){
      
   }else{
      $discout_prudoct = $_POST['discout_prudoct'];
   }

   if(empty($_POST['Delivery_Policy_Time'])){
      $errors['Delivery_Policy_Time']="No Delivery Policy Time";
   }else{
      $Delivery_Policy_Time = $_POST['Delivery_Policy_Time'];
   }

   if(empty($_POST['Delivery_Policy_Time_arbic'])){
      $errors['Delivery_Policy_Time_arbic']="الحقل فارغ";
   }else{
      $Delivery_Policy_Time_arbic = $_POST['Delivery_Policy_Time_arbic'];
   }

   if(empty($_POST['Return_Policy'])){
      $errors['Return_Policy']="No Return Policy";
   }else{
      $Return_Policy = $_POST['Return_Policy'];
   }

   if(empty($_POST['Return_Policy_arabic'])){
      $errors['Return_Policy_arabic']="لا يوجد تحديث سياسة العائدات";
   }else{
      $Return_Policy_arabic = $_POST['Return_Policy_arabic'];
   }

   if(empty($_POST['Products_Category'])){
      $errors['Products_Category']="No Update Selected Products Category";
   }else{
      $Products_Category = $_POST['Products_Category'];
      $Products_Category_str = implode(",", $Products_Category);
   }
   
   if(empty($_POST['Products_sub_Category'])){
      $errors['Products_sub_Category']="No Update Selected Products Sub Category";
   }else{
      $Products_sub_Category = $_POST['Products_sub_Category'];
      $Products_sub_Category_str = implode(",", $Products_sub_Category);
   }

   if(empty($_FILES['store_logo_prudoct']['name'])){
      $errors['store_logo_prudoct']="No updated image , or the original image must be selected when updating data";
   }else{
      $store_logo_prudoct = $_FILES['store_logo_prudoct']['name'];
      $store_logo_prudoctTamp = $_FILES["store_logo_prudoct"]["tmp_name"];
      $folderstore_logo_prudoct = "../Upload/". $store_logo_prudoct ;
      move_uploaded_file($store_logo_prudoctTamp , $folderstore_logo_prudoct );
   }

   if(!array_filter($errors)){
      $store_name_prudoct = mysqli_real_escape_string($conn , $_SESSION['StoreName_info']);
      $store_name_prudoct_arbic = mysqli_real_escape_string($conn , $_POST['store_name_prudoct_arbic']);
      $Products_Name = mysqli_real_escape_string($conn , $_POST['Products_Name']);
      $Products_Name_arabic = mysqli_real_escape_string($conn , $_POST['Products_Name_arabic']);
      $Product_Short_Description = mysqli_real_escape_string($conn , $_POST['Product_Short_Description']);
      $Product_Short_Description_arabic = mysqli_real_escape_string($conn , $_POST['Product_Short_Description_arabic']);
      $Product_Full_Description = mysqli_real_escape_string($conn , $_POST['Product_Full_Description']);
      $Product_Full_Description_arbic = mysqli_real_escape_string($conn , $_POST['Product_Full_Description_arbic']);
      $Product_Material = mysqli_real_escape_string($conn , $_POST['Product_Material']);
      $Product_Material_arabic = mysqli_real_escape_string($conn , $_POST['Product_Material_arabic']);
      $Products_Sizes = mysqli_real_escape_string($conn , $_POST['Products_Sizes']);
      $Product_Colors = mysqli_real_escape_string($conn , $_POST['Product_Colors']);
      $Product_Price = mysqli_real_escape_string($conn , $_POST['Product_Price']);
      $discout_prudoct = mysqli_real_escape_string($conn , $_POST['discout_prudoct']);
      $Delivery_Policy_Time = mysqli_real_escape_string($conn , $_POST['Delivery_Policy_Time']);
      $Delivery_Policy_Time_arbic = mysqli_real_escape_string($conn , $_POST['Delivery_Policy_Time_arbic']);
      $Return_Policy = mysqli_real_escape_string($conn , $_POST['Return_Policy']);
      $Return_Policy_arabic = mysqli_real_escape_string($conn , $_POST['Return_Policy_arabic']);
      $store_logo_prudoct = mysqli_real_escape_string($conn , $_FILES['store_logo_prudoct']['name']);

      $sql="UPDATE `prudocts` SET`store_name_prudoct`='$store_name_prudoct' , `store_name_prudoct_arbic`='$store_name_prudoct_arbic' ,`Products_Name`='$Products_Name' , 
                                 `Products_Name_arabic`='$Products_Name_arabic',`Product_Short_Description`='$Product_Short_Description' , `Product_Short_Description_arabic`='$Product_Short_Description_arabic',
                                 `Product_Full_Description`='$Product_Full_Description',`Product_Full_Description_arbic`='$Product_Full_Description_arbic',`Product_Material`='$Product_Material' ,
                                 `Product_Material_arabic`='$Product_Material_arabic',`Products_Sizes`='$Products_Sizes' ,`Product_Colors`='$Product_Colors' ,`Product_Price`='$Product_Price' ,
                                 `discout_prudoct`='$discout_prudoct' ,`Delivery_Policy_Time`='$Delivery_Policy_Time' , `Delivery_Policy_Time_arbic`='$Delivery_Policy_Time_arbic' ,
                                 `store_logo_prudoct`='$store_logo_prudoct' ,`Return_Policy`='$Return_Policy' , `Return_Policy_arabic`='$Return_Policy_arabic',
                                 `Products_Category`='$Products_Category_str' ,`Products_sub_Category`='$Products_sub_Category_str'
                              WHERE `id_name_prudoct`= '$id_name_prudoct'";

      if(mysqli_query($conn , $sql)){

         header("Location:all_products_all.php?lang=".$_GET['lang']);

      }else{

         echo 'query error' . mysqli_error($conn);
         
      }
   } 
}

if(isset($_POST['update_status_stock'])){

   $id_update_stock = $_POST['id_update_stock'];

   $update=true;

   $Product_status = $_POST['Product_status'];
   
   $sql="UPDATE `prudocts` SET `status_product_qty`='$Product_status' WHERE `id_name_prudoct`= '$id_update_stock'";

   if(mysqli_query($conn , $sql)){
      ?>
         <script type='text/javascript'>
            var message = '<?php echo $language['Updated Successfully'] ?>';
            alert(message);
            window.location.href='add_product.php?lang=<?php echo $_GET['lang'] ?>&edit_name_prudoct=<?php echo $id_update_stock; ?>';
         </script>
      <?php
   }else{
      echo 'query error' . mysqli_error($conn);
   }

}
?>
