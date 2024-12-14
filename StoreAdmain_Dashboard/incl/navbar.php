<!-- Navbar -->
<?php 

include "connection.php";

$id_order_vendor=$_SESSION['id_store_info'];
$store_name_order_vendor = $_SESSION['StoreName_info'];

?>
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
              <a class="dropdown-item <?php if($lang=="ar") echo 'active' ?>" href="?lang=ar"><?php echo $language['ar'] ?></a>
              <a class="dropdown-item <?php if($lang=="en" || $lang=="") echo 'active' ?>" href="?lang=en"><?php echo $language['en'] ?></a>
            </div>
          </li>
        <?php 
          $select="SELECT `Customer_Name` FROM `orders` WHERE `name_store`='$store_name_order_vendor'";
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