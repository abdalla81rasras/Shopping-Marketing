<?php
$lang = isset($_GET['lang']) ? $_GET['lang'] : "en";

if($lang=="en"){
  include "languages/en.php";
}elseif($lang=="ar"){
  include "languages/ar.php";
}elseif($lang==""){
  include "languages/en.php";
}

?>
<!doctype html>
<html lang="<?php echo $lang?>" dir="<?php echo ($lang == "ar") ? "rtl" : "ltr"; ?>">