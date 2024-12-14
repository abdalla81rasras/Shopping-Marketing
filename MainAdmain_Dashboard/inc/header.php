<?php 
session_start();
if(!isset($_SESSION['ID_Admin'])){
  header("Location:login.php");
}
?>
<!doctype html>
<html lang="en">
<?php
  include "connection.php";
  $sqli="SELECT * FROM `header`";
  $query=mysqli_query($conn,$sqli);
  $row=mysqli_fetch_assoc($query);
?>
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../Upload_main_admin/<?php echo $row['dash_logo'] ?>">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    <?php echo $row['dash_name']; ?>
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="./assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="./assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper">
    <div class="sidebar" data-color="white" data-active-color="success">
      <div class="logo">
        <a href="./index.php" class="simple-text logo-normal">
          Welcome Zonan Admin <?php echo $_SESSION['ID_Admin'] ?>
        </a>
      </div>