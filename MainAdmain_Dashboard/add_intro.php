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
          <li class="nav-item dropdown">
            <a class="nav-link" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <p>Orders</p>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-success" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="./view_orders.php">View All</a>
            </div>
          </li>
          <li class="nav-item dropdown active">
            <a class="nav-link" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <p>Intro for Admin Store</p>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-success" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="./view_intro.php">View All</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item active" href="./add_intro.php">Add New</a>
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
                  <h5 class="card-title">Update Intro For the Admin Store</h5>
                <?php else: ?>
                  <h5 class="card-title">Add Intro For the Admin Store</h5>
                <?php endif; ?>
              </div>
              <div class="card-body pt-1">
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="id_intro" value="<?php echo $id_intro; ?>">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Upload Video For Admin Store :</label>
                        <input type="file" class="form-control" name="vid_intro" accept="video/*">
                        <div class="text-danger mt-1"><?php echo $errors['vid_intro'] ?></div>
                        <?php if($edit==true): ?>
                          <div class="text-warning my-1"><?php echo $errors['edit_vid_intro'] ?></div>
                          <p class="text-success font-weight-bold mr-2 d-inline">Old Video : <?php echo htmlspecialchars($intros); ?></p>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                  <div class="row justify-content-around">
                      <?php if($update==true): ?>
                        <button name="update_intro" type="submit" class="btn btn-success btn-round">Update</button>
                      <?php else: ?>
                        <button name="save_intro" type="submit" class="btn btn-success btn-round">Save</button>
                      <?php endif; ?>
                        <button name="cancel_intro" type="submit" class="btn btn-success btn-round">Cancel</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
<?php include "./inc/footer.php" ?>