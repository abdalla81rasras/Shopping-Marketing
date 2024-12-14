<?php
session_start();
if(!isset($_SESSION['id_store_info']) && !isset($_SESSION['StoreName_info'])){
  header("Location:login.php");
}

include "./incl/connection.php";

$lang = isset($_GET['lang']) ? $_GET['lang'] : "en";

if($lang=="en"){
  include "languages/en.php";
}elseif($lang=="ar"){
  include "languages/ar.php";
}elseif($lang==""){
  include "languages/en.php";
}

$StoreName_info = $_SESSION['StoreName_info'];

?>
<!doctype html>
<html lang="<?php echo $lang?>" dir="<?php echo ($lang == "ar") ? "rtl" : "ltr"; ?>">
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
  <style>
    *{
      text-decoration: none;
      list-style-type: none;
    }

    body{
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

    .color-box {
      width: 20px;
      height: 20px;
      border-radius: 100%;
      border: 1px solid #2caf4e;
    }
  </style>
  <body class="">
    <div class="wrapper">
      <div class="sidebar" data-color="purple" data-background-color="white" data-image="./assets/img/sidebar-1.jpg">
        <div class="logo">
          <a href="./index.php?lang=<?php echo $lang ?>" class="simple-text logo-normal">
            <?php echo $language['Welcome'] ?> <?php echo $_SESSION['StoreName_info'] ?>
          </a>
        </div>
        <div class="sidebar-wrapper">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="./store_info.php?lang=<?php echo $lang ?>">
                <p><?php echo $language['Store Information'] ?></p>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $language['Products'] ?>
              </a>
              <div class="dropdown-menu dropdown-menu-right dropdown-success" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="./add_product.php?lang=<?php echo $lang ?>"><?php echo $language['Add New'] ?></a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="./all_products.php?lang=<?php echo $lang ?>"><?php echo $language['All Products'] ?></a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="./products_views_number.php?lang=<?php echo $lang ?>"><?php echo $language['Products Views Number'] ?></a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $language['Orders'] ?>
              </a>
              <div class="dropdown-menu dropdown-menu-right dropdown-success" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="./orders.php?lang=<?php echo $lang ?>"><?php echo $language['Orders'] ?></a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="./order_status.php?lang=<?php echo $lang ?>"><?php echo $language['Orders Status'] ?></a>
              </div>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="./ads.php?lang=<?php echo $lang ?>">
                <p><?php echo $language['Ads Sponsor'] ?></p>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="./views.php?lang=<?php echo $lang ?>">
                <p><?php echo $language['Views'] ?></p>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./login.php?lang=<?php echo $lang ?>">
                <p><?php echo $language['Logout'] ?></p>
              </a>
            </li>
          </ul>
        </div>
      </div>
      <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand"><?php echo $language['Dashboard'] ?></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form" action="search.php" method="GET">
              <div class="input-group no-border">
                <input type="hidden" name="lang" value="<?php echo $lang ?>">
                <input type="text" name="search" class="form-control" placeholder="<?php echo $language['Search'] ?>...">
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModalLong">
                  <i class="fa fa-file-video-o"></i>
                  <p class="d-lg-none d-md-block">
                    <?php echo $language['Video'] ?>
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">language</i>
                  <p class="d-lg-none d-md-block">
                    <?php echo $language['languages'] ?>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item <?php if($lang=="ar") echo 'active' ?>" href="search.php?lang=ar&search=<?php echo $_GET['search'] ?>"><?php echo $language['ar'] ?></a>
                  <a class="dropdown-item <?php if($lang=="en" || $lang=="") echo 'active' ?>" href="search.php?lang=en&search=<?php echo $_GET['search'] ?>"><?php echo $language['en'] ?></a>
                </div>
              </li>
              <?php 
                $select="SELECT `Customer_Name` FROM `orders` WHERE `name_store`='$StoreName_info'";
                $query=mysqli_query($conn , $select);
                $num_rows=mysqli_num_rows($query)
              ?>
                <li class="nav-item dropdown">
                  <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="material-icons">notifications</i>
                    <span class="notification"><?php echo $num_rows;?></span>
                    <p class="d-lg-none d-md-block">
                      <?php echo $language['Some Actions'] ?>
                    </p>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    <?php while($row=mysqli_fetch_assoc($query)): ?>
                      <a class="dropdown-item" href="./orders.php?lang=<?php echo $lang ?>"><?php echo $language['Order'] ?> : <?php echo $row['Customer_Name']; ?></a>
                    <?php endwhile; ?>
                  </div>
                </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="table-responsive">  
                <table class="table">
                  <?php
                    if(isset($_GET['search'])){

                      $search = $_GET['search'];

                      $sql= "SELECT * FROM `prudocts` WHERE CONCAT(Products_Name,Products_Name_arabic,Products_Sizes,Product_Price,Products_Category,Products_sub_Category) LIKE '%$search%' AND `store_name_prudoct`='$StoreName_info'";
                      $result = mysqli_query($conn,$sql);

                      $sql2 = "SELECT * FROM orders WHERE CONCAT(Customer_Name,Customer_Phone_Number,Product_Name,order_id) LIKE '%$search%' AND `name_store`='$StoreName_info'";
                      $result2 = mysqli_query($conn,$sql2);
                  ?>
                    <thead>
                      <tr>
                        <th><?php echo $language['Results Search'] ?> :</th>
                      </tr>
                    </thead>
                    <tbody>    
                  <?php
                      if($result==true && $result2==true){ 

                        $num_rows=mysqli_num_rows($result);
                        $num_rows_2=mysqli_num_rows($result2);
                        
                        if ($num_rows > 0 || $num_rows_2 > 0) {

                          while ($row = mysqli_fetch_assoc($result)) {
                          ?>
                            <tr>
                              <td><?php echo ($lang=="ar") ? $row['Products_Name_arabic'] :  $row['Products_Name']; ?></td>
                              <td><?php echo $row['Products_Sizes']; ?></td>
                              <td><?php echo $row['Product_Price']; ?>JOD</td>
                              <td><?php echo $language[$row['Products_Category']]??""; ?></td>
                              <td><?php echo $language[$row['Products_sub_Category']]??""; ?></td>
                              <td><div class="color-box" style="background-color: <?php echo $row['Product_Colors']; ?>;"></div></td>
                            </tr>
                          <?php
                          }

                          while ($row_2 = mysqli_fetch_assoc($result2)) {
                            ?>
                              <tr>
                                <td><?php echo $row_2['Customer_Name']; ?></td>
                                <td><?php echo $row_2['Customer_Phone_Number']; ?></td>
                                <td><?php echo $row_2['Product_Name']; ?></td>
                                <!--<td><?php //echo ($lang=="ar") ? $row_2['Products_Name_arabic'] :  $row_2['Products_Name']; ?></td>-->
                                <td><?php echo $language[$row_2['Order_Category']]??""; ?></td>
                                <td><?php echo $language[$row_2['Order_Sub_Category']]??""; ?></td>
                                <td><?php echo $row_2['Total_Amount_Price']; ?>JOD</td>
                                <td><?php echo $language['IDs'] ?> : <?php echo $row_2['order_id']; ?></td>
                                <td><?php echo $language['qty'] ?> : <?php echo $row_2['QTY']; ?></td>
                              </tr>
                            <?php
                          }

                        }else{
                          ?>
                            <tfoot>
                              <tr>
                                <th><?php echo $language['No results found'] ?></th>
                              </tr>
                            </tfoot>
                          <?php
                        }
                      }else{
                        echo " Query error !!" . mysqli_error($conn);
                      }
                    }else{
                      echo " Query error !!" . mysqli_error($conn);
                    }
                  ?>
                    </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
<?php include "./incl/footer.php"; ?>