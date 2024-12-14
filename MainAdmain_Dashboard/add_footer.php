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
          <li class="nav-item dropdown active">
            <a class="nav-link" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <p>Footer</p>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-success" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="./view_footer.php">View All</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item active" href="./add_footer.php">Add New</a>
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
                  <h5 class="card-title">Update Footer</h5>
                <?php else: ?>
                  <h5 class="card-title">Add Footer</h5>
                <?php endif; ?>
              </div>
              <div class="card-body pt-1">
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="id_footer" value="<?php echo $id_footer; ?>">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Website Logo : size(127X27)</label>
                        <input type="file" class="form-control" name="img_logo_footer" accept="image/*">
                        <div class="text-danger mt-1"><?php echo $errors['img_logo_footer'] ?></div>
                        <?php if($edit==true): ?>
                          <div class="text-warning mt-1 mb-2"><?php echo $errors['edit_img_logo_footer'] ?></div>
                          <p class="text-success font-weight-bold mr-2 d-inline">Old Image :</p>
                          <img src="../Upload_main_admin/<?php echo htmlspecialchars($img_logo_footer); ?>" title="<?php echo htmlspecialchars($img_logo_footer); ?>" alt="<?php echo htmlspecialchars($img_logo_footer); ?>" style="width:170px;">
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Slogin :</label>
                        <textarea class="form-control textarea" name="slogin_footer" placeholder="Enter Slogn"><?php echo htmlspecialchars($slogin_footer); ?></textarea>
                        <div class="text-danger mt-1"><?php echo $errors['slogin_footer'] ?></div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Follow Us on Social :</label>
                        <div>
                          <input type="text" class="form-control" name="facebook_footer" value="<?php echo htmlspecialchars($facebook_footer); ?>" placeholder="Enter Link Facebook">
                          <div class="text-danger mt-1"><?php echo $errors['facebook_footer'] ?></div>
                        </div>
                        <div class="my-2">
                          <input type="text" class="form-control" name="insta_footer" value="<?php echo htmlspecialchars($insta_footer); ?>" placeholder="Enter Link Instagram">
                          <div class="text-danger mt-1"><?php echo $errors['insta_footer'] ?></div>
                        </div>
                        <div>
                          <input type="text" class="form-control" name="whats_footer" value="<?php echo htmlspecialchars($whats_footer); ?>" placeholder="Enter Link Whatsapp">
                          <div class="text-danger mt-1"><?php echo $errors['whats_footer'] ?></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group mb-0">
                        <label>Security :</label>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group mb-2">
                        <input type="text" class="form-control" name="title_security1" value="<?php echo htmlspecialchars($title_security1); ?>" placeholder="Enter Title 1">
                        <div class="text-danger mt-1"><?php echo $errors['title_security1'] ?></div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group mb-2">
                        <input type="text" class="form-control" name="title_security2" value="<?php echo htmlspecialchars($title_security2); ?>" placeholder="Enter Title 2">
                        <div class="text-danger mt-1"><?php echo $errors['title_security2'] ?></div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group mb-2">
                        <input type="text" class="form-control" name="title_security3" value="<?php echo htmlspecialchars($title_security3); ?>" placeholder="Enter Title 3">
                        <div class="text-danger mt-1"><?php echo $errors['title_security3'] ?></div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group mb-2">
                        <input type="text" class="form-control" name="title_security4" value="<?php echo htmlspecialchars($title_security4); ?>" placeholder="Enter Title 4">
                        <div class="text-danger mt-1"><?php echo $errors['title_security4'] ?></div>
                      </div>
                    </div> 
                    <br><br><br>
                    <div class="col-md-6">
                      <div class="form-group mb-2">
                        <textarea class="form-control textarea" name="desc_security1" placeholder="Enter Description 1"><?php echo htmlspecialchars($desc_security1); ?></textarea>
                        <div class="text-danger mt-1"><?php echo $errors['desc_security1'] ?></div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group mb-2">
                        <textarea class="form-control textarea" name="desc_security2" placeholder="Enter Description 2"><?php echo htmlspecialchars($desc_security2); ?></textarea>
                        <div class="text-danger mt-1"><?php echo $errors['desc_security2'] ?></div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group mb-2">
                        <textarea class="form-control textarea" name="desc_security3" placeholder="Enter Description 3"><?php echo htmlspecialchars($desc_security3); ?></textarea>
                        <div class="text-danger mt-1"><?php echo $errors['desc_security3'] ?></div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group mb-2">
                        <textarea class="form-control textarea" name="desc_security4" placeholder="Enter Description 4"><?php echo htmlspecialchars($desc_security4); ?></textarea>
                        <div class="text-danger mt-1"><?php echo $errors['desc_security4'] ?></div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <small>size(765X455)</small>
                        <input type="file" class="form-control" name="img_security" accept="image/*">
                        <div class="text-danger mt-1"><?php echo $errors['img_security'] ?></div>
                        <?php if($edit==true): ?>
                          <div class="text-warning mt-1 mb-2"><?php echo $errors['edit_img_security'] ?></div>
                          <p class="text-success font-weight-bold mr-2 d-inline">Old Image :</p>
                          <img src="../Upload_main_admin/<?php echo htmlspecialchars($img_security); ?>" title="<?php echo htmlspecialchars($img_security); ?>" alt="<?php echo htmlspecialchars($img_security); ?>" style="width:170px;">
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                  <div class="row mt-1">
                    <div class="col-md-12">
                      <div class="form-group mb-0">
                        <label>Q&A :</label>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group mb-2">
                        <textarea class="form-control textarea" name="Q1" placeholder="Enter Question 1"><?php echo htmlspecialchars($Q1); ?></textarea>
                        <div class="text-danger mt-1"><?php echo $errors['Q1'] ?></div>                      
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group mb-2">
                        <textarea class="form-control textarea" name="Q2" placeholder="Enter Question 2"><?php echo htmlspecialchars($Q2); ?></textarea>
                        <div class="text-danger mt-1"><?php echo $errors['Q2'] ?></div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group mb-2">
                        <textarea class="form-control textarea" name="Q3" placeholder="Enter Question 3"><?php echo htmlspecialchars($Q3); ?></textarea>
                        <div class="text-danger mt-1"><?php echo $errors['Q3'] ?></div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group mb-2">
                        <textarea class="form-control textarea" name="Q4" placeholder="Enter Question 4"><?php echo htmlspecialchars($Q4); ?></textarea>
                        <div class="text-danger mt-1"><?php echo $errors['Q4'] ?></div>
                      </div>
                    </div> 
                    <br><br><br><br><br>
                    <div class="col-md-6">
                      <div class="form-group mb-2">
                        <textarea class="form-control textarea" name="A1" placeholder="Enter Answer 1"><?php echo htmlspecialchars($A1); ?></textarea>
                        <div class="text-danger mt-1"><?php echo $errors['A1'] ?></div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group mb-2">
                        <textarea class="form-control textarea" name="A2" placeholder="Enter Answer 2"><?php echo htmlspecialchars($A2); ?></textarea>
                        <div class="text-danger mt-1"><?php echo $errors['A2'] ?></div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group mb-2">
                        <textarea class="form-control textarea" name="A4" placeholder="Enter Answer 3"><?php echo htmlspecialchars($A4); ?></textarea>
                        <div class="text-danger mt-1"><?php echo $errors['A4'] ?></div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group mb-2">
                        <small>video</small>
                        <input type="file" name="vid_A" class="form-control" accept="video/*">
                        <div class="text-danger mt-1"><?php echo $errors['vid_A'] ?></div>
                        <?php if($edit==true): ?>
                          <div class="text-warning my-1"><?php echo $errors['edit_vid_A'] ?></div>
                          <p class="text-success font-weight-bold mr-2 d-inline">Old Video : <?php echo htmlspecialchars($vid_A); ?></p>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                  <div class="row justify-content-around">
                    <?php if($update==true): ?>
                      <button type="submit" name="update_footer" class="btn btn-success btn-round">Update</button>
                    <?php else: ?>
                      <button type="submit" name="save_footer" class="btn btn-success btn-round">Save</button>
                    <?php endif; ?>
                      <button type="submit" name="cancel_footer" class="btn btn-success btn-round">Cancel</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
<?php include "./inc/footer.php" ?>