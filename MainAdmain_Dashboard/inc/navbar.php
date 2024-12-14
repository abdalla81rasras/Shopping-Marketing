<!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:;">Dashboard</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form method="GET" action="search.php">
              <div class="input-group no-border">
                <input type="text" name="query" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="nc-icon nc-zoom-split"></i>
                  </div>
                </div>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="javascript::void()" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-bell-55"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-success" aria-labelledby="navbarDropdownMenuLink">
                  <?php
                    include "connection.php"; 
                    $conn_2=mysqli_connect("localhost","root","","vendor_zanzon");
                    if(!$conn_2){
                      die("Connection Error !!".mysqli_connect_error($conn_2));
                    }
                    $select1="SELECT `Customer_Name` FROM `orders`";
                    $query1=mysqli_query($conn_2 , $select1);
                    while($row1=mysqli_fetch_assoc($query1)):
                  ?>
                    <a class="dropdown-item" href="view_orders.php">Customer : <?php echo $row1['Customer_Name'] ?></a>
                  <?php 
                    endwhile; 
                    $select2="SELECT `name_order_user` FROM `orders_users`";
                    $query2=mysqli_query($conn_2 , $select2);
                    while($row2=mysqli_fetch_assoc($query2)):
                  ?>
                    <a class="dropdown-item" href="view_users.php">Order : <?php echo $row2['name_order_user'] ?></a>
                  <?php endwhile; ?>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>

<!-- End Navbar -->