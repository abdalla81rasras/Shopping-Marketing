<?php
include "./incl/header.php";
?>
        <?php include "./incl/update_store_info.php"; ?>
          <li class="nav-item active">
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
      <?php include "./incl/navbar.php" ?>
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-success">
                  <h3 class="card-title"><?php echo $language['Store Information'] ?></h3>
                </div>
                <div class="card-body">
                  <form action="" method="POST" enctype="multipart/form-data">
                    <?php 
                      $id_store_info=$_SESSION['id_store_info'];
                      $select="SELECT * FROM `store_information` WHERE `id_store_info`='$id_store_info'";
                      $query=mysqli_query($conn , $select);
                      if($row=mysqli_fetch_assoc($query)):
                    ?>
                      <div class="row mb-4">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="sn"><?php echo $language['Store Name'] ?></label>
                            <input type="text" id="sn" class="form-control" name="StoreName_info" value="<?php echo $row['StoreName_info'] ?>">
                            <div class="text-danger mb-0 mt-1"><?php echo $language[$errors['StoreName_info']]??"" ?></div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <div class="input-group files">
                              <input type="file" class="custom-file-input" accept="Image/*" id="customFile" name="img_store_info">
                              <label class="custom-file-label" for="customFile" style="cursor: pointer;"><?php echo $language['Store Logo : size(300 X 312)'] ?></label>
                            </div>
                            <div class="text-danger mb-0 mt-2"><?php echo $language[$errors['img_store_info']]??"" ?></div>
                            <p class="text-success font-weight-bold mr-2 d-inline"><?php echo $language['Old Image'] ?> :</p>
                            <img src="../Upload/<?php echo $row['img_store_info'] ?>" title="<?php echo $row['img_store_info'] ?>" alt="<?php echo $row['img_store_info'] ?>" style="width:150px;">
                          </div>
                        </div>
                      </div>
                      <div class="row mb-4">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="es"><?php echo $language['Email'] ?></label>
                            <input type="email" id="es" name="email_store_info" class="form-control" value="<?php echo $row['email_store_info'] ?>">
                            <div class="text-danger mb-0 mt-1"><?php echo $language[$errors['email_store_info']]??"" ?></div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="pns"><?php echo $language['Phone Number'] ?></label>
                            <input type="text" id="pns" name="ph_n_store_info" class="form-control" value="<?php echo $row['ph_n_store_info'] ?>">
                            <div class="text-danger mt-1"><?php echo $language[$errors['ph_n_store_info']]??"" ?></div>
                          </div>
                        </div>
                      </div>
                      <div class="row mb-4">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="pss"><?php echo $language['Password'] ?></label>
                            <input type="password" id="pss" name="pass_store_info" class="form-control" value="<?php echo $row['pass_store_info'] ?>">
                            <div class="text-danger mt-1"><?php echo $language[$errors['pass_store_info']]??"" ?></div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="cpss"><?php echo $language['Confirm Password'] ?></label>
                            <input type="password" id="cpss" name="cpss_store_info" class="form-control" value="<?php echo $row['cpss_store_info'] ?>">
                            <div class="text-danger mt-1"><?php echo $language[$errors['cpss_store_info']]??"" ?></div>
                          </div>
                        </div>
                      </div>
                      <div class="row mb-4">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="wbi"><?php echo $language['Wallet or Bank IBAN'] ?></label>  
                            <input type="text" name="wbi_store_info" id="wbi" class="form-control" value="<?php echo $row['wbi_store_info'] ?>">
                            <div class="text-danger mb-0 mt-1"><?php echo $language[$errors['wbi_store_info']]??"" ?></div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="cns"><?php echo $language['Card Number'] ?></label>
                            <input type="text" id="cns" class="form-control" name="cardNumber_store_info" value="<?php echo $row['cardNumber_store_info'] ?>">
                            <div class="text-danger mb-0 mt-1"><?php echo $language[$errors['cardNumber_store_info']]??"" ?></div>
                          </div>
                        </div>
                      </div>
                      <div class="row mb-4">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="cnas"><?php echo $language['Card Name'] ?></label>
                            <input type="text" id="cnas" class="form-control" name="cardName_store_info" value="<?php echo $row['cardName_store_info'] ?>">
                            <div class="text-danger mb-0 mt-1"><?php echo $language[$errors['cardName_store_info']]??"" ?></div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="eds"><?php echo $language['Expiry date'] ?></label>
                            <input type="text" id="eds" class="form-control" name="Expirydate_store_info" value="<?php echo $row['Expirydate_store_info'] ?>">
                            <div class="text-danger mb-0 mt-1"><?php echo $language[$errors['Expirydate_store_info']]??"" ?></div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="cscs"><?php echo $language['Card Security Code'] ?></label>
                            <input type="number" id="cscs" class="form-control" name="CardSecurity_store_info" value="<?php echo $row['CardSecurity_store_info'] ?>" min="1" max="999">
                            <div class="text-danger mb-0 mt-1"><?php echo $language[$errors['CardSecurity_store_info']]??"" ?></div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="sas"><?php echo $language['Shipping address'] ?></label>
                            <input type="text" id="sas" class="form-control" name="ShippingAddress_store_info" value="<?php echo $row['ShippingAddress_store_info'] ?>">
                            <div class="text-danger mb-0 mt-1"><?php echo $language[$errors['ShippingAddress_store_info']]??"" ?></div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                              <label><?php echo $language['Shop Category'] ?></label>
                              <?php 
                                $row_Shop_category=$row['Shop_Category_store_info'];
                                $expload_Shop_category=explode("," , $row_Shop_category);

                                $row_Shop_sub_Category=$row['Shop_sub_Category_store_info'];
                                $expload_Shop_sub_Category=explode("," , $row_Shop_sub_Category);
                              ?>
                              <div class="mb-3">
                                <div class="form-check">
                                    <label class="form-check-label text-dark" for="CheakOne">
                                        <input class="form-check-input CheakOne" name="Shop_Category_store_info[]" value="CLOTHING" type="checkbox" <?php if(in_array('CLOTHING',$expload_Shop_category)){ echo 'checked="checked"';} ?> id="CheakOne">
                                        <?php echo $language['CLOTHING'] ?>
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                                <div class="ml-3" id="check_mneu1" style="display:none;">
                                    <div class="form-check">
                                        <label class="form-check-label text-dark" for="CheakOne-one">
                                            <input class="form-check-input" name="Shop_sub_Category_store_info[]" value="Female-CLOTHING" type="checkbox" <?php if(in_array('Female-CLOTHING',$expload_Shop_sub_Category)){ echo 'checked="checked"';} ?> id="CheakOne-one">
                                            <?php echo $language['Female'] ?>
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label text-dark" for="CheakOne-tow">
                                            <input class="form-check-input" name="Shop_sub_Category_store_info[]" value="Male-CLOTHING" type="checkbox" <?php if(in_array('Male-CLOTHING',$expload_Shop_sub_Category)){ echo 'checked="checked"';} ?> id="CheakOne-tow">
                                            <?php echo $language['Male'] ?>
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label text-dark" for="CheakOne-three">
                                            <input class="form-check-input" name="Shop_sub_Category_store_info[]" value="Kids-CLOTHING" type="checkbox" <?php if(in_array('Kids-CLOTHING',$expload_Shop_sub_Category)){ echo 'checked="checked"';} ?> id="CheakOne-three">
                                            <?php echo $language['Kids'] ?>
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label text-dark" for="CheakOne-fhur">
                                            <input class="form-check-input" name="Shop_sub_Category_store_info[]" value="All-CLOTHING" type="checkbox" <?php if(in_array('All-CLOTHING',$expload_Shop_sub_Category)){ echo 'checked="checked"';} ?> id="CheakOne-fhur">
                                            <?php echo $language['All'] ?>
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                              </div>
                              <div class="mb-3">
                                <div class="form-check">
                                    <label class="form-check-label  text-dark" for="CheakTow">
                                        <input class="form-check-input CheakTow" name="Shop_Category_store_info[]" value="SHOES" type="checkbox" <?php if(in_array('SHOES',$expload_Shop_category)){ echo 'checked="checked"';} ?> id="CheakTow">
                                        <?php echo $language['SHOES'] ?>
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                                <div class="ml-3" id="check_mneu2" style="display:none;">
                                    <div class="form-check">
                                        <label class="form-check-label text-dark" for="CheakTow-one">  
                                            <input class="form-check-input" name="Shop_sub_Category_store_info[]" value="Female-SHOES" type="checkbox" <?php if(in_array('Female-SHOES',$expload_Shop_sub_Category)){ echo 'checked="checked"';} ?> id="CheakTow-one">
                                            <?php echo $language['Female'] ?>
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label text-dark" for="CheakTow-tow">
                                            <input class="form-check-input" name="Shop_sub_Category_store_info[]" value="Male-SHOES" type="checkbox" <?php if(in_array('Male-SHOES',$expload_Shop_sub_Category)){ echo 'checked="checked"';} ?> id="CheakTow-tow">
                                            <?php echo $language['Male'] ?>
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label text-dark" for="CheakTow-three">
                                            <input class="form-check-input" name="Shop_sub_Category_store_info[]" value="Kids-SHOES" type="checkbox" <?php if(in_array('Kids-SHOES',$expload_Shop_sub_Category)){ echo 'checked="checked"';} ?> id="CheakTow-three">
                                             <?php echo $language['Kids'] ?>
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label text-dark" for="CheakTow-fhur">
                                            <input class="form-check-input" name="Shop_sub_Category_store_info[]" value="All-SHOES" type="checkbox" <?php if(in_array('All-SHOES',$expload_Shop_sub_Category)){ echo 'checked="checked"';} ?> id="CheakTow-fhur">
                                            <?php echo $language['All'] ?>
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                              </div>
                              <div class="mb-3">
                                <div class="form-check">
                                    <label class="form-check-label text-dark" for="CheakThree">
                                        <input class="form-check-input CheakThree" name="Shop_Category_store_info[]" value="BAGS" type="checkbox" <?php if(in_array('BAGS',$expload_Shop_category)){ echo 'checked="checked"';} ?> id="CheakThree">
                                        <?php echo $language['BAGS'] ?>
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                                <div class="ml-3" id="check_mneu3" style="display:none;">
                                    <div class="form-check">
                                        <label class="form-check-label text-dark" for="CheakThree-one">
                                            <input class="form-check-input" name="Shop_sub_Category_store_info[]" value="Female-BAGS" type="checkbox" <?php if(in_array('Female-BAGS',$expload_Shop_sub_Category)){ echo 'checked="checked"';} ?> id="CheakThree-one">
                                            <?php echo $language['Female'] ?>
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label text-dark" for="CheakThree-tow">
                                            <input class="form-check-input" name="Shop_sub_Category_store_info[]" value="Male-BAGS" type="checkbox" <?php if(in_array('Male-BAGS',$expload_Shop_sub_Category)){ echo 'checked="checked"';} ?> id="CheakThree-tow">
                                            <?php echo $language['Male'] ?>
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label text-dark" for="CheakThree-three">
                                            <input class="form-check-input" name="Shop_sub_Category_store_info[]" value="Kids-BAGS" type="checkbox" <?php if(in_array('Kids-BAGS',$expload_Shop_sub_Category)){ echo 'checked="checked"';} ?> id="CheakThree-three">
                                             <?php echo $language['Kids'] ?>
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label text-dark" for="CheakThree-fhur">
                                            <input class="form-check-input" name="Shop_sub_Category_store_info[]" value="All-BAGS" type="checkbox" <?php if(in_array('All-BAGS',$expload_Shop_sub_Category)){ echo 'checked="checked"';} ?> id="CheakThree-fhur">
                                            <?php echo $language['All'] ?>
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div> 
                              </div>
                              <div class="mb-3">
                                <div class="form-check">
                                    <label class="form-check-label text-dark" for="CheakFure">
                                        <input class="form-check-input CheakFure" name="Shop_Category_store_info[]" value="PERFUMES" type="checkbox" <?php if(in_array('PERFUMES',$expload_Shop_category)){ echo 'checked="checked"';} ?> id="CheakFure">
                                        <?php echo $language['PERFUMES'] ?>
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                                <div class="ml-3" id="check_mneu4" style="display:none;">
                                    <div class="form-check">
                                        <label class="form-check-label text-dark" for="CheakFure-one">
                                            <input class="form-check-input" name="Shop_sub_Category_store_info[]" value="Female-PERFUMES" type="checkbox" <?php if(in_array('Female-PERFUMES',$expload_Shop_sub_Category)){ echo 'checked="checked"';} ?> id="CheakFure-one">
                                            <?php echo $language['Female'] ?>
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label text-dark" for="CheakFure-tow">
                                            <input class="form-check-input" name="Shop_sub_Category_store_info[]" value="Male-PERFUMES" type="checkbox" <?php if(in_array('Male-PERFUMES',$expload_Shop_sub_Category)){ echo 'checked="checked"';} ?> id="CheakFure-tow">
                                            <?php echo $language['Male'] ?>
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label text-dark" for="CheakFure-three">
                                            <input class="form-check-input" name="Shop_sub_Category_store_info[]" value="Kids-PERFUMES" type="checkbox" <?php if(in_array('Kids-PERFUMES',$expload_Shop_sub_Category)){ echo 'checked="checked"';} ?> id="CheakFure-three">
                                             <?php echo $language['Kids'] ?>
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label text-dark" for="CheakFure-fhur">
                                            <input class="form-check-input" name="Shop_sub_Category_store_info[]" value="All-PERFUMES" type="checkbox" <?php if(in_array('All-PERFUMES',$expload_Shop_sub_Category)){ echo 'checked="checked"';} ?> id="CheakFure-fhur">
                                            <?php echo $language['All'] ?>
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                              </div>
                              <div class="mb-3">
                                <div class="form-check">
                                    <label class="form-check-label  text-dark" for="CheakFaif">
                                        <input class="form-check-input CheakFaif" name="Shop_Category_store_info[]" value="ACCESSORIES" type="checkbox" <?php if(in_array('ACCESSORIES',$expload_Shop_category)){ echo 'checked="checked"';} ?> id="CheakFaif">
                                        <?php echo $language['ACCESSORIES'] ?>
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                                <div class="ml-3" id="check_mneu5" style="display:none;">
                                    <div class="form-check">
                                        <label class="form-check-label text-dark" for="CheakFaif-one">
                                            <input class="form-check-input" name="Shop_sub_Category_store_info[]" value="Hand Made-ACCESSORIES" type="checkbox" <?php if(in_array('Hand Made-ACCESSORIES',$expload_Shop_sub_Category)){ echo 'checked="checked"';} ?> id="CheakFaif-one">
                                            <?php echo $language['Hand Made'] ?>
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label text-dark" for="CheakFaif-tow">
                                            <input class="form-check-input" name="Shop_sub_Category_store_info[]" value="All-ACCESSORIES" type="checkbox" <?php if(in_array('All-ACCESSORIES',$expload_Shop_sub_Category)){ echo 'checked="checked"';} ?> id="CheakFaif-tow">
                                            <?php echo $language['All'] ?>
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                              </div>
                              <div class="mb-3">
                                <div class="form-check">
                                    <label class="form-check-label text-dark" for="CheakSix">
                                        <input class="form-check-input CheakSix" name="Shop_Category_store_info[]" value="GAMING" type="checkbox" <?php if(in_array('GAMING',$expload_Shop_category)){ echo 'checked="checked"';} ?> id="CheakSix">
                                        <?php echo $language['GAMING'] ?>
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                                <div class="ml-3" id="check_mneu6" style="display:none;">
                                    <div class="form-check">
                                        <label class="form-check-label text-dark" for="CheakSix-one">
                                            <input class="form-check-input" name="Shop_sub_Category_store_info[]" value="Gaming Accessories-GAMING" type="checkbox" <?php if(in_array('Gaming Accessories-GAMING',$expload_Shop_sub_Category)){ echo 'checked="checked"';} ?> id="CheakSix-one">
                                            <?php echo $language['Gaming Accessories'] ?>
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label text-dark" for="CheakSix-tow">
                                            <input class="form-check-input" name="Shop_sub_Category_store_info[]" value="Figurines-GAMING" type="checkbox" <?php if(in_array('Figurines-GAMING',$expload_Shop_sub_Category)){ echo 'checked="checked"';} ?> id="CheakSix-tow">
                                            <?php echo $language['Figurines'] ?>
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label text-dark" for="CheakSix-three">
                                            <input class="form-check-input" name="Shop_sub_Category_store_info[]" value="All-GAMING" type="checkbox" <?php if(in_array('All-GAMING',$expload_Shop_sub_Category)){ echo 'checked="checked"';} ?> id="CheakSix-three">
                                            <?php echo $language['All'] ?>
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div> 
                              </div>
                              <div class="mb-1">
                                <div class="form-check">
                                    <label class="form-check-label text-dark" for="CheakSeven">
                                        <input class="form-check-input CheakSeven" name="Shop_Category_store_info[]" value="OTHERS" type="checkbox" <?php if(in_array('OTHERS',$expload_Shop_category)){ echo 'checked="checked"';} ?> id="CheakSeven">
                                        <?php echo $language['OTHERS'] ?>
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                                <div class="ml-3" id="check_mneu7" style="display:none;">
                                    <div class="form-check">
                                        <label class="form-check-label text-dark" for="CheakSeven-one">
                                            <input class="form-check-input" name="Shop_sub_Category_store_info[]" value="Makeup-OTHERS" type="checkbox" <?php if(in_array('Makeup-OTHERS',$expload_Shop_sub_Category)){ echo 'checked="checked"';} ?> id="CheakSeven-one">
                                            <?php echo $language['Makeup'] ?>
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label text-dark" for="CheakSeven-tow">
                                            <input class="form-check-input" name="Shop_sub_Category_store_info[]" value="Phone Accessories-OTHERS" type="checkbox" <?php if(in_array('Phone Accessories-OTHERS',$expload_Shop_sub_Category)){ echo 'checked="checked"';} ?> id="CheakSeven-tow">
                                            <?php echo $language['Phone Accessories'] ?>
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label text-dark" for="CheakSeven-three">
                                            <input class="form-check-input" name="Shop_sub_Category_store_info[]" value="Hand Made-OTHERS" type="checkbox" <?php if(in_array('Hand Made-OTHERS',$expload_Shop_sub_Category)){ echo 'checked="checked"';} ?> id="CheakSeven-three">
                                            <?php echo $language['Hand Made'] ?>
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label text-dark" for="CheakSeven-fhur">
                                            <input class="form-check-input" name="Shop_sub_Category_store_info[]" value="Arts-OTHERS" type="checkbox" <?php if(in_array('Arts-OTHERS',$expload_Shop_sub_Category)){ echo 'checked="checked"';} ?> id="CheakSeven-fhur">
                                            <?php echo $language['Arts'] ?>
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div> 
                              </div>
                              <div class="text-danger mb-0 mt-1"><?php echo $language[$errors['Shop_Category_store_info']]??"" ?></div>
                              <div class="text-danger mb-0 mt-1"><?php echo $language[$errors['Shop_sub_Category_store_info']]??"" ?></div>
                          </div>
                        </div>
                      </div>
                      <div class="row justify-content-center">
                        <button name="update_store_info" class="btn btn-success btn-round"><?php echo $language['Update'] ?></button>
                      </div>
                    <?php endif; ?>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
<?php include "./incl/footer.php"; ?>