<?php
session_start();
if(!isset($_SESSION['id_store_info']) && !isset($_SESSION['StoreName_info'])){
  header("Location:login.php");
}

include "connection.php";
include "func_lang.php";
include "incFun.php";

?>
<style>
  *{
    text-decoration: none;
    list-style-type: none;
  }

  body,html{
    direction: <?php echo ($lang == 'ar') ? 'rtl' : 'ltr'; ?>;
  }

  .label-p{
    font-size: 14px;
    line-height: 1.42857;
    color: #AAAAAA;
    font-weight: 400;
    text-align: <?php echo ($lang == 'ar') ? 'right' : 'left'; ?>;
  }

  .sidebar,p,a,h1,h2,h3,h4,h5,h6,.alert ,table , td , th , tr , tbody ,.card-title,.text-danger,.text-warning,.dt-buttons ,.form-group-rights{
    text-align: <?php echo ($lang == 'ar') ? 'right' : 'left'; ?>;
  }
</style>
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta http-equiv="Content-Language" content="<?php echo $lang?>">
  <title>
    <?php echo $language['Store Dashboard'] ?>
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="./assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="./assets/demo/demo.css" rel="stylesheet" />
  
</head>
<body class="">
  
  <div class="wrapper">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="./assets/img/sidebar-1.jpg">
      <div class="logo">
        <a href="./index.php?lang=<?php echo $lang ?>" class="simple-text logo-normal">
          <?php echo $language['Welcome'] ?>  <?php echo $_SESSION['StoreName_info'] ?>
        </a>
      </div>