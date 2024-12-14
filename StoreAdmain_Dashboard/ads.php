<?php
include "./incl/header.php";
?>
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
          <li class="nav-item active">
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
      <?php include "./incl/navbar.php" ?>
      <div class="content">
        <div class="container-fluid">
          <div class="row mt-3">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xl-12">
              <h4>
                <?php echo $language['ads'] ?> .
              </h4>
            </div>
          </div>
        </div>
      </div>
<?php include "./incl/footer.php"; ?>