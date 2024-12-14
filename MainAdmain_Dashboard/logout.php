<?php
session_start();

unset($_SESSION['ID_Admin']);

header("Location:login.php");
?>