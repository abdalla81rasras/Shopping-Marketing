<?php
//wishlist
if(isset($_POST['delete_wishlist'])){

    $id_delete_wishlist = mysqli_real_escape_string($conn_main_admin , $_POST['id_favorite']);

    $sql_delete = "DELETE FROM `topages_favorite` WHERE `id_favorite`='$id_delete_wishlist'";

    if(mysqli_query($conn_main_admin ,$sql_delete)) {

        ?>
            <script type='text/javascript'>
                var message = '<?php echo $language['Successfully Deleted'] ?>';
                alert(message);
                window.location.href='wishlist.php?lang=<?php echo $lang ?>';
            </script>
        <?php
        
    } else {

        echo "Query error" . mysqli_error($conn_main_admin);

    }

}

if(isset($_POST['delete_remove_favorite'])){

    $id_delete_remove_favorite = mysqli_real_escape_string($conn_main_admin , $_POST['id_delete_remove_favorite']);

    $sql_remove = "DELETE FROM `topages_favorite` WHERE `id_favorite`='$id_delete_remove_favorite'";

    if(mysqli_query($conn_main_admin ,$sql_remove)) {
        
    
    } else {

        echo "Query error" . mysqli_error($conn_main_admin);

    }

}

if(isset($_POST['delete_wishlist_item'])){

    $id_favorite_item = $_POST['id_favorite_item'];

    if(isset($_COOKIE['favorite_nologin'])){

        $favorite = json_decode($_COOKIE['favorite_nologin'] , true);

        $favorite_new = array();

        if(is_array($favorite) || is_object($favorite)){
            foreach($favorite as $item){
                if($item['id_product_favorite'] != $id_favorite_item){
                    array_push($favorite_new,$item);
                }
            }
        }
            
        $favorite_json = json_encode($favorite_new , true);

        setcookie('favorite_nologin' , $favorite_json , time()+(60 * 60 * 24 * 7) , '/');

        unset($_SESSION['favorite_nologin'][$id_favorite_item]);

        ?>
            <script type='text/javascript'>
                var message = '<?php echo $language['Successfully Deleted'] ?>';
                alert(message);
                window.location.href='wishlist.php?lang=<?php echo $lang ?>';
            </script>
        <?php
    }
}

if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id_delete'])) {

    $id_delete_remove_favorite_item = $_GET['id_delete'];

    if(isset($_COOKIE['favorite_nologin'])){

        $wishlist = json_decode($_COOKIE['favorite_nologin'] , true);

        $new_wishlist = array();

        if(is_array($wishlist) || is_object($wishlist)){
            foreach($wishlist as $item){
                if($item['id_product_favorite'] != $id_delete_remove_favorite_item){
                    array_push($new_wishlist , $item);
                }
            }
        }

        $json_wishlist = json_encode($new_wishlist);

        setcookie('favorite_nologin' ,  $json_wishlist , time()+(60*60*24*7) , '/');

        unset($_SESSION['favorite_nologin'][$id_delete_remove_favorite_item]);

        ?>
            <script>
                window.location.href="?lang=<?php echo $lang ?>";
            </script>
        <?php
    }
}

if (isset($_GET['action']) && $_GET['action'] == 'delete_single' && isset($_GET['id_delete']) && isset($_GET['Id_prudoct'])) {

    $id_delete_remove_favorite_item = $_GET['id_delete'];
    $Id_prudoct = $_GET['Id_prudoct'];

    if(isset($_COOKIE['favorite_nologin'])){

        $wishlist = json_decode($_COOKIE['favorite_nologin'] , true);

        $new_wishlist = array();

        if(is_array($wishlist) || is_object($wishlist)){
            foreach($wishlist as $item){
                if($item['id_product_favorite'] != $id_delete_remove_favorite_item){
                    array_push($new_wishlist , $item);
                }
            }
        }
            
        $json_wishlist = json_encode($new_wishlist);

        setcookie('favorite_nologin' ,  $json_wishlist , time()+(60*60*24*7) , '/');

        unset($_SESSION['favorite_nologin'][$id_delete_remove_favorite_item]);

        ?>
            <script>
                window.location.href="?lang=<?php echo $lang ?>&Id_prudoct=<?php echo $Id_prudoct; ?>";
            </script>
        <?php
    }
}


//basket
if(isset($_POST['delete_basket'])){

    $id_delete_basket = mysqli_real_escape_string($conn_main_admin , $_POST['id_baskets']);

    $sql_delete = "DELETE FROM `topages_basket` WHERE `id_basket`='$id_delete_basket'";

    if(mysqli_query($conn_main_admin ,$sql_delete)) {

        ?>
            <script type='text/javascript'>
                var message = '<?php echo $language['Successfully Deleted'] ?>';
                alert(message);
                window.location.href='cart.php?lang=<?php echo $lang ?>';
            </script>
        <?php
        
    } else {

        echo "Query error" . mysqli_error($conn_main_admin);

    }

}

if(isset($_POST['delete_remove_cart'])){

    $id_delete_remove_cart = mysqli_real_escape_string($conn_main_admin , $_POST['id_delete_remove_cart']);

    $sql_remove = "DELETE FROM `topages_basket` WHERE `id_basket`='$id_delete_remove_cart'";

    if(mysqli_query($conn_main_admin ,$sql_remove)) {
         

    } else {

        echo "Query error" . mysqli_error($conn_main_admin);

    }
    
}

if(isset($_POST['delete_basket_item'])){

    $id_basket_item = $_POST['id_basket_item'];

    if (isset($_COOKIE['cart_nologin'])) {

        $cart = json_decode($_COOKIE['cart_nologin'], true);

        $new_cart = array();

        if(is_array($cart) || is_object($cart)){
            foreach ($cart as $item) {
                if($item['id_product_basket'] != $id_basket_item){
                    array_push($new_cart,$item);
                }
            }
        }

        $new_cart_json = json_encode($new_cart,true);

        setcookie('cart_nologin',$new_cart_json , time()+(60 * 60 * 24 * 7)  ,'/');

        unset($_SESSION['cart_nologin'][$id_basket_item]);

        ?>
            <script type='text/javascript'>
                var message = '<?php echo $language['Successfully Deleted'] ?>';
                alert(message);
                window.location.href='cart.php?lang=<?php echo $lang ?>';
            </script>
        <?php

    }
}

if(isset($_GET['action']) && $_GET['action']=="delete_basket" && isset($_GET['id_delete_basket'])){

    $id_delete_basket_item = $_GET['id_delete_basket'];

    if(isset($_COOKIE['cart_nologin'])){

        $cart_item = json_decode($_COOKIE['cart_nologin'] , true);

        $new_cart_item = array();

        if(is_array($cart_item) || is_object($cart_item)){
            foreach($cart_item as $item){
                if($item['id_product_basket'] != $id_delete_basket_item){
                    array_push($new_cart_item , $item);
                }
            }
        }

        $json_cart_item = json_encode($new_cart_item);

        setcookie("cart_nologin" , $json_cart_item , time()+(60*60*24*7) , '/');

        unset($_SESSION['cart_nologin'][$id_delete_basket_item]);

        ?>
            <script>
                window.location.href='?lang=<?php echo $lang ?>';
            </script>
        <?php
    }
}

if(isset($_GET['action']) && $_GET['action']=="delete_basket_single" && isset($_GET['id_delete_basket_single']) && isset($_GET['Id_prudoct'])){

    $id_delete_basket_item = $_GET['id_delete_basket_single'];
    $Id_prudoct = $_GET['Id_prudoct'];

    if(isset($_COOKIE['cart_nologin'])){

        $cart_item = json_decode($_COOKIE['cart_nologin'] , true);

        $new_cart_item = array();

        if(is_array($cart_item) || is_object($cart_item)){
            foreach($cart_item as $item){
                if($item['id_product_basket'] != $id_delete_basket_item){
                    array_push($new_cart_item , $item);
                }
            }
        }

        $json_cart_item = json_encode($new_cart_item);

        setcookie("cart_nologin" , $json_cart_item , time()+(60*60*24*7) , '/');

        unset($_SESSION['cart_nologin'][$id_delete_basket_item]);

        ?>
            <script>
                window.location.href="?lang=<?php echo $lang ?>&Id_prudoct=<?php echo $Id_prudoct; ?>";
            </script>
        <?php
    }
}
?>