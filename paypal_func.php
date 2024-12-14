<?php
session_start();
if(!isset($_SESSION['id_users'])){

}

include "includes/connection_1.php";
include "includes/connection_2.php";

$lang = $_POST['langs_paypal'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id_user = $_SESSION['id_users'];

    $sql_check = "SELECT * FROM `customers` WHERE `id_user`='$id_user'"; 
    $query_check = mysqli_query($conn_main_admin , $sql_check);
    $fetch_check = mysqli_fetch_assoc($query_check);

    $id_user_customer = $fetch_check['id_user'];
    $first_name_customer = $fetch_check['first_name'];
    $last_name_customer = $fetch_check['last_name'];
    $phone_number_customer = $fetch_check['phone_number'];

    $method_payment_customer = "online";

    $id_order_online = random_int(10,500);
    $id_traking_orders = random_int(0,100) + $id_order_online;

    $total_final_all = $_POST['total_amount_final_paypal'];

    $sql_order_user = "INSERT INTO `orders_users`(`id_user`, `id_traking_orders` , `name_order_user`,`total_order_user`) VALUES('$id_user', '$id_traking_orders' ,'$first_name_customer $last_name_customer','$total_final_all')";
    if(mysqli_query($conn_store_admin , $sql_order_user)){

    }else{
        echo 'query error !' . mysqli_error($conn_store_admin);
    } 

    foreach ($_SESSION['cart'] as $product_id => $product_details) {
        
        $name = mysqli_real_escape_string($conn_main_admin , $product_details['name']);
        $store = mysqli_real_escape_string($conn_main_admin , $product_details['store']);
        $name_ar = mysqli_real_escape_string($conn_main_admin , $product_details['name_ar']);
        $store_ar = mysqli_real_escape_string($conn_main_admin , $product_details['store_ar']);
        $logo = mysqli_real_escape_string($conn_main_admin , $product_details['logo store']);
        $price = $product_details['price'];
        $category = mysqli_real_escape_string($conn_main_admin , $product_details['category']);
        $subcategory = mysqli_real_escape_string($conn_main_admin , $product_details['sub category']);
        $quantity = $product_details['quantity'];
        $total_prices = $price * $quantity;
        $color = mysqli_real_escape_string($conn_main_admin , $product_details['color']);

        $sql_order_online = "INSERT INTO orders (`id_user`, `id_traking_orders` , `Customer_Name`, `Customer_Phone_Number`, `order_id`, `Product_Name`, `name_store`, `Product_Name_ar` , `name_store_ar` , `store_logo`, `price_product`, `Order_Category`, `Order_Sub_Category`, `QTY`, `Total_Amount_Price`, `color`, `order_s_p_d`) 
                                VALUES ('$id_user_customer', '$id_traking_orders' , '$first_name_customer $last_name_customer', '$phone_number_customer', '$id_order_online', '$name', '$store', '$name_ar' , '$store_ar' , '$logo', '$price', '$category', '$subcategory', '$quantity', $total_prices, '$color', '$method_payment_customer')";
        
        if (mysqli_query($conn_store_admin , $sql_order_online)) {
            
            foreach ($_SESSION['cart'] as $product_id => $product_details) {

                $increment_buy = 1;
                $sql_buy = "UPDATE `prudocts` SET `num_buys`=`num_buys`+'$increment_buy' WHERE `id_name_prudoct` = $product_id";
                mysqli_query($conn_store_admin,$sql_buy);

            }

            foreach ($_SESSION['cart'] as $product_id => $product_details) {

                $sql_delete_basket = "DELETE FROM `topages_basket` WHERE `id_prudoct` = $product_id";
                mysqli_query($conn_main_admin,$sql_delete_basket);

            }

            foreach ($_SESSION['cart'] as $product_id => $product_details) {
                
                $sql_delete_favorite = "DELETE FROM `topages_favorite` WHERE `id_prudoct` = $product_id";
                mysqli_query($conn_main_admin,$sql_delete_favorite);
                
            }

            $empties_cutomer = "UPDATE `customers` SET `id_form_shipping`= 0 , `cash_delivery`='' , `card_number`='' , `name_card`='' , `expiry_date_month`='', `expiry_date_year`='' , `card_security_code`='' , `promo_code`='' , `id_form_payment`= 0 , `id_order_cash`='' , `agree`='' WHERE `id_user`='$id_user'";
            mysqli_query($conn_main_admin,$empties_cutomer);

            $_SESSION['cart'] = array();

            ?>
                <script>
                    window.location.href='page_secuss_procced.php?lang=<?php echo $lang ?>';
                </script>
            <?php

        } else {
            echo 'query error !' . mysqli_error($conn_store_admin);
        }
    }
        
} else {
?>
    <h1>Invalid request !!</h1>
<?php
}
?>
