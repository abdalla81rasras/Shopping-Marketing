<?php
include "connection_1.php";
include "connection_2.php";

if(isset($_GET['Id_prudoct'])){

    $Id_prudoct = $_GET['Id_prudoct'];

    $sql="SELECT * FROM `prudocts` WHERE `id_name_prudoct`='$Id_prudoct'";

    $query=mysqli_query($conn_store_admin,$sql);

    while ($row_single=mysqli_fetch_assoc($query)) { 

        $_SESSION['id_name_prudoct'] = $row_single['id_name_prudoct'];
        $store_name_prudoct = $row_single['store_name_prudoct'];
        $store_logo_prudoct = $row_single['store_logo_prudoct'];
        $Products_Name = $row_single['Products_Name'];
        $Product_Short_Description = $row_single['Product_Short_Description'];
        $Product_Full_Description = $row_single['Product_Full_Description'];
        $Product_Material = $row_single['Product_Material'];
        $Products_Sizes = $row_single['Products_Sizes'];
        $Product_Colors = $row_single['Product_Colors'];
        $Product_Price = $row_single['Product_Price'];
        $discout_prudoct = $row_single['discout_prudoct'];
        $Delivery_Policy_Time = $row_single['Delivery_Policy_Time'];
        $Return_Policy = $row_single['Return_Policy'];
        $Products_Category = $row_single['Products_Category'];
        $Products_sub_Category = $row_single['Products_sub_Category'];
        $store_name_prudoct_arbic = $row_single['store_name_prudoct_arbic'];
        $Products_Name_arabic= $row_single['Products_Name_arabic'];
        $Product_Short_Description_arabic = $row_single['Product_Short_Description_arabic'];
        $Product_Full_Description_arbic = $row_single['Product_Full_Description_arbic'];
        $Product_Material_arabic = $row_single['Product_Material_arabic'];
        $Delivery_Policy_Time_arbic = $row_single['Delivery_Policy_Time_arbic'];
        $Return_Policy_arabic = $row_single['Return_Policy_arabic'];
        
    }

    $view_product="UPDATE `prudocts` SET product_views = 1 + product_views WHERE `id_name_prudoct`='$Id_prudoct'";

    if(!mysqli_query($conn_store_admin,$view_product)){
        echo 'query error !' . mysqli_error($conn_store_admin);
    }
}
?>