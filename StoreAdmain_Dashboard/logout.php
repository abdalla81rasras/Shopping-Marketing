<?php
session_start();

unset($_SESSION['id_store_info']);
unset($_SESSION['StoreName_info']);

header("Location:login.php?lang=".$lang);

?>