<?php
include "func_lang.php";
?>
<style>
  *{
    text-decoration: none;
    list-style-type: none;
  }

  body{
    direction: <?php echo ($lang == 'ar') ? 'rtl' : 'ltr'; ?>;
  }

  .label-p{
    font-weight: 400;
    font-size: 14px;
    text-align: <?php echo ($lang == 'ar') ? 'right' : 'left'; ?>;
  }

  .alert,.text-danger {
    text-align: <?php echo ($lang == 'ar') ? 'right' : 'left'; ?>;
  }
</style>
  <head>
    <link rel="icon" type="image/png" href="./assets/img/favicon.png">
    <title><?php echo $language['Store Dashboard'] ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta http-equiv="Content-Language" content="<?php echo $lang?>">
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- Material Kit CSS -->
    <link href="./assets/css/material-dashboard.css" rel="stylesheet" />
  </head>
  <body class="bg-success">
    <div class="wrapper">
      <div class="container contect-login">
        <div class="card w-75">
          <div class="card-body p-5">