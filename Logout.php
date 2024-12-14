<?php
session_start();

unset($_SESSION['id_users']);
unset($_SESSION['TRue']);
unset($_SESSION['cart']);
unset($_SESSION['count_item']);

$_SESSION['cart_nologin']=array();
$_SESSION['favorite_nologin']=array();
$_SESSION['nologin_compare']=array();

setcookie('cart_nologin' , '' , time() - 3600 , '/');
setcookie('favorite_nologin' , '' , time()-3600 , '/');
setcookie('nologin_compare' , '' , time()-3600 , '/');

header("Location:index.php?lang=".$_GET['lang']);

?>