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
          <li class="nav-item dropdown active">
            <a class="nav-link" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <p>Footer</p>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-success" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item active" href="./view_footer.php">View All</a>
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
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <p>Stores</p>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-success" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="./view_stores.php">View All</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <p>Orders</p>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-success" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="./view_orders.php">View All</a>
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
      <?php include "./inc/navbar.php"; ?>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">View Footer</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class="text-success">
                      <th>Website Logo</th>
                      <th>Slogen</th>
                      <th>Facebook</th>
                      <th>Instagram</th>
                      <th>Whatsapp</th>
                      <th>Title 1</th>
                      <th>Title 2</th>
                      <th>Title 3</th>
                      <th>Title 4</th>
                      <th>Desription 1</th>
                      <th>Desription 2</th>
                      <th>Desription 3</th>
                      <th>Desription 4</th>
                      <th>Image About</th>
                      <th>Question 1</th>
                      <th>Question 2</th>
                      <th>Question 3</th>
                      <th>Question 4</th>
                      <th>Answer 1</th>
                      <th>Answer 2</th>
                      <th>Answer 3</th>
                      <th>Answer Video</th>
                      <th>Action</th>
                    </thead>
                    <tbody>
                      <?php 
                        $select="SELECT * FROM `footer`";
                        $query=mysqli_query($conn , $select);
                        while($row=mysqli_fetch_assoc($query)):
                      ?>
                        <tr>
                          <td>
                            <img src="../Upload_main_admin/<?php echo $row['img_logo_footer']; ?>" title="<?php echo $row['img_logo_footer']; ?>" alt="<?php echo $row['img_logo_footer']; ?>" width="150px">
                          </td>
                          <td><?php echo $row['slogin_footer']; ?></td>
                          <td><?php echo $row['facebook_footer']; ?></td>
                          <td><?php echo $row['insta_footer']; ?></td>
                          <td><?php echo $row['whats_footer']; ?></td>
                          <td><?php echo $row['title_security1']; ?></td>
                          <td><?php echo $row['title_security2']; ?></td>
                          <td><?php echo $row['title_security3']; ?></td>
                          <td><?php echo $row['title_security4']; ?></td>
                          <td>
                            <?php echo $row['desc_security1']; ?>
                          </td>
                          <td>
                            <?php echo $row['desc_security2']; ?>
                          </td>
                          <td>
                            <?php echo $row['desc_security3']; ?>
                          </td>
                          <td>
                            <?php echo $row['desc_security4']; ?>
                          </td>
                          <td>
                            <img src="../Upload_main_admin/<?php echo $row['img_security']; ?>" title="<?php echo $row['img_security']; ?>" alt="<?php echo $row['img_security']; ?>" width="150px">
                          </td>
                          <td>
                            <?php echo $row['Q1']; ?>
                          </td>
                          <td>
                            <?php echo $row['Q2']; ?>
                          </td>
                          <td>
                            <?php echo $row['Q3']; ?>
                          </td>
                          <td>
                            <?php echo $row['Q4']; ?>
                          </td>
                          <td>
                            <?php echo $row['A1']; ?>
                          </td>
                          <td>
                            <?php echo $row['A2']; ?>
                          </td>
                          <td>
                            <?php echo $row['A4']; ?>                          
                          </td>
                          <td>
                            <video src="../Upload_main_admin/<?php echo $row['vid_A']; ?>" width="150px" controls></video>
                          </td>
                          <td>
                            <a href="./add_footer.php?edit_footer=<?php echo $row['id_footer']; ?>"><i class="fa fa-edit" title="edit" style="font-size:16px;"></i></a>
                          </td>
                        </tr>
                      <?php endwhile; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
<?php include "./inc/footer.php" ?>