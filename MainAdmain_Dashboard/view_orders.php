<?php
include "./inc/connection.php";
include "./inc/header.php";
?>
      <div class="sidebar-wrapper" style="overflow-x:hidden ;">
        <ul class="nav">
          <li class="nav-item dropdown">
            <a class="nav-link" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <p>Header</p>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-success" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="./view_header.php">View All</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="./add_header.php">Add New</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <p>Footer</p>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-success" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="./view_footer.php">View All</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="./add_footer.php">Add New</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <p>Slider Bar</p>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-success" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="./view_slide_bar.php">View All</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="./add_slide_bar.php">Add New</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <p>Offer section1 Under slide</p>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-success" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="./view_us1.php">View All</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="./add_us1.php">Add New</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <p>Offer section2 Under slide</p>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-success" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="./view_us2.php">View All</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="./add_us2.php">Add New</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <p>Promo codes</p>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-success" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="./view_promo_code.php">View All</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="./add_promo_code.php">Add New</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <p>All Inner Sliders</p>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-success" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="./view_inner_slider.php">View All</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="./add_inner_slider.php">Add New</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <p>Feedback</p>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-success" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="./view_feedback.php">View All</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="./add_feedback.php">Add New</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <p>Contact us</p>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-success" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="./view_contact.php">View All</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="./add_contact.php">Add New</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <p>Users</p>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-success" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="./view_users.php">View All</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <p>Stores</p>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-success" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="./view_stores.php">View All</a>
            </div>
          </li>
          <li class="nav-item dropdown active">
            <a class="nav-link" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <p>Orders</p>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-success" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item active" href="./view_orders.php">View All</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <p>Intro for Admin Store</p>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-success" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="./view_intro.php">View All</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="./add_intro.php">Add New</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <p>Messages</p>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-success" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="./view_messages.php">View All</a>
            </div>
          </li>
          <li class="nav-item">
            <a href="./logout.php" class="nav-link">Logout</a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel" style="height: 100vh;">
      <?php 
        include "./inc/navbar.php"; 
        $conn_2=mysqli_connect("localhost","root","","vendor_zanzon");
        if(!$conn_2){
          die("Connection Error !!".mysqli_connect_error($conn_2));
        }
      ?>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">View Orders</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table songs-table" id="example">
                    <thead class="text-success">
                      <th>Customer Name</th>
                      <th>Customer Phone Number</th>
                      <th>Product Name</th>
                      <th>Order Category</th>
                      <th>Order Sub Category</th>
                      <th>Total Amount</th>
                      <th>Order ID</th>
                      <th>QTY</th>
                      <th>Action</th>
                    </thead>
                    <tbody class="table-views">
                      <?php 
                        $sql="SELECT * FROM `orders`";
                        $query=mysqli_query($conn_2,$sql);
                        while($row=mysqli_fetch_assoc($query)):
                      ?>
                        <tr>
                          <td><?php echo $row['Customer_Name']; ?></td>
                          <td><?php echo $row['Customer_Phone_Number']; ?></td>
                          <td><?php echo $row['Product_Name']; ?></td>
                          <td><?php echo $row['Order_Category']; ?></td>
                          <td><?php echo $row['Order_Sub_Category']; ?></td>
                          <td><?php echo $row['Total_Amount_Price']; ?>JD</td>
                          <td><?php echo $row['order_id']; ?></td>
                          <td><?php echo $row['QTY']; ?></td>
                          <td>
                            <a href="./add_contact.php?delete_orders=<?php echo $row['id_orders']; ?>"><i class="fa fa-trash" title="delete" style="font-size:16px;"></i></a>
                          </td>
                        </tr>
                      <?php endwhile; ?>
                    </tbody>
                  </table>
                </div>
                <div class="text-center">
                  <button class="btn btn-success" id="songs-load">View All</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
<?php include "./inc/footer.php" ?>