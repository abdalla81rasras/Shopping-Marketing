<?php
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

if (isset($_POST['buy'])) {

    $product_id = $_POST['id_prudocts'];
    $name_prudocts = $_POST['name_prudocts'];
    $store_prudocts = $_POST['store_prudocts'];
    $store_name_prudoct_arbic = $_POST['store_name_prudoct_arbic'];
    $Products_Name_arabic = $_POST['Products_Name_arabic'];
    $logo_store_prudocts = $_POST['logo_store_prudocts'];
    $price_prudocts = $_POST['price_prudocts'];
    $category_prudocts = $_POST['category_prudocts'];
    $sub_category_prudocts = $_POST['sub_category_prudocts'];
    $quantity = $_POST['qtys'];
    $color_prudocts = $_POST['Product_Colors'];

    $product_details = array(
        'name' => $name_prudocts,
        'name_ar' => $Products_Name_arabic ,
        'store' => $store_prudocts,
        'store_ar'=> $store_name_prudoct_arbic ,
        'logo store' => $logo_store_prudocts,
        'price' => $price_prudocts,
        'category' => $category_prudocts,
        'sub category' => $sub_category_prudocts,
        'quantity' => $quantity,
        'color' => $color_prudocts
    );

    $_SESSION['cart'][$product_id] = $product_details;

    ?>

        <script>window.location.href='checkout.php?lang=<?php echo $lang ?>'</script>

    <?php
    
}

?>