<?php
include "./inc/connection.php";
include "./inc/header.php";
include "./inc/function.php";
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
          <li class="nav-item dropdown active">
            <a class="nav-link" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <p>Feedback</p>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-success" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="./view_feedback.php">View All</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item active" href="./add_feedback.php">Add New</a>
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
            <div class="card card-user">
              <div class="card-header">
                <?php if($update==true || $edit==true): ?>
                  <h5 class="card-title">Update Our Partner Feedback</h5>
                <?php else: ?>
                  <h5 class="card-title">Add Our Partner Feedback</h5>
                <?php endif; ?>
              </div>
              <div class="card-body pt-1">
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="id_feedback" value="<?php echo $id_feedback; ?>">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Name :</label>
                        <input type="text" class="form-control" name="name_feedback" value="<?php echo htmlspecialchars($name_feedback); ?>" placeholder="Enter Name">
                        <div class="text-danger mt-1"><?php echo $errors['name_feedback'] ?></div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email_feedback" value="<?php echo htmlspecialchars($email_feedback); ?>" class="form-control" placeholder="Enter Email">
                        <div class="text-danger mt-1"><?php echo $errors['email_feedback'] ?></div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Feedback :</label>
                        <textarea class="form-control textarea" name="description_feedback" placeholder="Enter Feedback"><?php echo htmlspecialchars($description_feedback); ?></textarea>
                        <div class="text-danger mt-1"><?php echo $errors['description_feedback'] ?></div>
                      </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label>Image : size(100X100)</label>
                          <input type="file" class="form-control" name="img_feedback" accept="image/*">
                          <div class="text-danger mt-1"><?php echo $errors['img_feedback'] ?></div>
                          <?php if($edit==true): ?>
                            <div class="text-warning mt-1 mb-2"><?php echo $errors['edit_img_feedback'] ?></div>
                            <p class="text-success font-weight-bold mr-2 d-inline">Old Image :</p>
                            <img src="../Upload_main_admin/<?php echo htmlspecialchars($img_feedback); ?>" title="<?php echo htmlspecialchars($img_feedback); ?>" alt="<?php echo htmlspecialchars($img_feedback); ?>" style="width:170px;">
                          <?php endif; ?>
                        </div>
                    </div>
                  </div>
                  <div class="row justify-content-around">
                    <?php if($update==true): ?>
                      <button name="update_feed" type="submit" class="btn btn-success btn-round">Update</button>
                    <?php else: ?>
                      <button name="save_feed" type="submit" class="btn btn-success btn-round">Save</button>
                    <?php endif; ?>
                      <button name="cancel_feed" type="submit" class="btn btn-success btn-round">Cancel</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
<?php include "./inc/footer.php" ?>