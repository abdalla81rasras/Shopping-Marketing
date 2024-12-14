<?php
include "./incl/header.php";

$id_prudoct=$_SESSION['id_store_info'];
$store_name=$_SESSION['StoreName_info'];

?>
        <?php include "incl/func_prudoct.php"; ?>
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="./store_info.php?lang=<?php echo $lang ?>">
                    <p><?php echo $language['Store Information'] ?></p>
                    </a>
                </li>
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $language['Products'] ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-success" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item active" href="./add_product.php?lang=<?php echo $lang ?>"><?php echo $language['Add New'] ?></a>
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
                    <?php if($update==true || $edit==true): ?>
                        <h3  class="card-title"><?php echo $language['Update Products'] ?></h3>
                    <?php else: ?>
                        <h3 class="card-title"><?php echo $language['Add Products'] ?></h3>
                    <?php endif; ?>
                </div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id_name_prudoct" value="<?php echo $id_name_prudoct ?>">
                        <div class="row mb-4">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label id="sn">Store Name</label>
                                    <input type="text" name="store_name_prudoct" value="<?php echo $_SESSION['StoreName_info'] ?>" id="sn" class="form-control" disabled>
                                    <div class="text-danger mb-0 mt-1"><?php echo $errors['store_name_prudoct'] ?></div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="sna">اسم المتجر بالعربي</label>
                                    <input type="text" name="store_name_prudoct_arbic" value="<?php echo htmlspecialchars($store_name_prudoct_arbic); ?>" id="sna" class="form-control">
                                    <div class="text-danger mb-0 mt-1"><?php echo $errors['store_name_prudoct_arbic'] ?></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="input-group files">
                                        <input type="file" class="custom-file-input" accept="Image/*" id="customFile" name="store_logo_prudoct">
                                        <label class="custom-file-label" for="customFile" style="cursor: pointer;"><?php echo $language['Store Logo : size(300 X 312)'] ?></label>
                                    </div>
                                    <div class="text-danger mb-0 mt-2"><?php echo $language[$errors['store_logo_prudoct']]??"" ?></div>
                                    <?php if($edit==true): ?>
                                        <div class="text-warning mt-2 mb-1"><?php echo $language[$errors['edit_store_logo_prudoct']]??"" ?></div>
                                        <p class="text-success font-weight-bold mr-2 d-inline justfy-content-end"><?php echo $language['Old Image'] ?> :</p>
                                        <img src="../Upload/<?php echo $store_logo_prudoct ?>" title="<?php echo $store_logo_prudoct ?>" alt="<?php echo $store_logo_prudoct ?>" style="width:150px;">
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="pn">Products Name</label>
                                <input type="text" id="pn" name="Products_Name" value="<?php echo htmlspecialchars($Products_Name); ?>" class="form-control">
                                <div class="text-danger mb-0 mt-1"><?php echo $errors['Products_Name'] ?></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="psd">Product Short Description</label>
                                <input type="text" id="psd" name="Product_Short_Description" value="<?php echo htmlspecialchars($Product_Short_Description); ?>" class="form-control">
                                <div class="text-danger mt-1"><?php echo $errors['Product_Short_Description'] ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="pna">اسم المنتج بالعربي</label>
                                <input type="text" id="pna" name="Products_Name_arabic" value="<?php echo htmlspecialchars($Products_Name_arabic); ?>" class="form-control">
                                <div class="text-danger mb-0 mt-1"><?php echo $errors['Products_Name_arabic'] ?></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="psda">وصف قصير للمنتج بالعربي</label>
                                <input type="text" id="psda" name="Product_Short_Description_arabic" value="<?php echo htmlspecialchars($Product_Short_Description_arabic); ?>" class="form-control">
                                <div class="text-danger mt-1"><?php echo $errors['Product_Short_Description_arabic'] ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="pfd">Product Full Description</label>
                                <input type="text" id="pfd" name="Product_Full_Description" value="<?php echo htmlspecialchars($Product_Full_Description); ?>" class="form-control">
                                <div class="text-danger mt-1"><?php echo $errors['Product_Full_Description'] ?></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="pm">Product Material</label>
                                <input type="text" id="pm" name="Product_Material" value="<?php echo htmlspecialchars($Product_Material); ?>" class="form-control">
                                <div class="text-danger mt-1"><?php echo $errors['Product_Material'] ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="pfda">وصف طويل للمنتج بالعربي</label>
                                <input type="text" id="pfda" name="Product_Full_Description_arbic" value="<?php echo htmlspecialchars($Product_Full_Description_arbic); ?>" class="form-control">
                                <div class="text-danger mt-1"><?php echo $errors['Product_Full_Description_arbic'] ?></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="pma">مواد المنتج بالعربي</label>
                                <input type="text" id="pma" name="Product_Material_arabic" value="<?php echo htmlspecialchars($Product_Material_arabic); ?>" class="form-control">
                                <div class="text-danger mt-1"><?php echo $errors['Product_Material_arabic'] ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select name="Products_Sizes" class="form-control form-control-sm" id="ps">
                                        <option value=""><?php echo $language['Select Size'] ?></option>
                                        <?php 
                                            $sql_mneu="SELECT `Products_Sizes` FROM `prudocts` WHERE `id_name_prudoct`='$id_name_prudoct'";
                                            $result=mysqli_query($conn , $sql_mneu);
                                            $row_mneus=mysqli_fetch_assoc($result);
                                            if($update==true || $edit==true): 
                                        ?>
                                            <option selected><?php echo $row_mneus['Products_Sizes'] ?></option>
                                        <?php endif; ?>
                                        <option value="S">S</option>
                                        <option value="M">M</option>
                                        <option value="L">L</option>
                                        <option value="XL">XL</option>
                                        <option value="XXL">XXL</option>
                                        <option value="XXXL">XXXL</option>
                                    </select>
                                    <div class="text-danger mt-1"><?php echo $language[$errors['Products_Sizes']]??"" ?></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="pcs"><?php echo $language['Product Colors'] ?></label>
                                <input type="color" name="Product_Colors" value="<?php echo htmlspecialchars($Product_Colors); ?>" id="pcs" class="form-control">
                                <div class="text-danger mb-0 mt-1"><?php echo $language[$errors['Product_Colors']]??"" ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="pp"><?php echo $language['Product Price'] ?></label>
                                <input type="number" min="0" step="0.00001" id="pp" name="Product_Price" value="<?php echo htmlspecialchars($Product_Price); ?>" class="form-control">
                                <div class="text-danger mb-0 mt-1"><?php echo $language[$errors['Product_Price']]??"" ?></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="di"><?php echo $language['Discount'] ?> ,  <?php echo $language['optional'] ?></label>
                                <input type="number" min="0" max="100" name="discout_prudoct" value="<?php echo htmlspecialchars($discout_prudoct); ?>" id="di" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="dptoa">Delivery Policy Time of Arrived</label>
                                <input type="text" id="dptoa" name="Delivery_Policy_Time" value="<?php echo htmlspecialchars($Delivery_Policy_Time); ?>" class="form-control">
                                <div class="text-danger mb-0 mt-1"><?php echo $errors['Delivery_Policy_Time'] ?></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="rp">Return Policy</label>
                                <input type="text" id="rp" name="Return_Policy" value="<?php echo htmlspecialchars($Return_Policy); ?>" class="form-control">
                                <div class="text-danger mb-0 mt-1"><?php echo $errors['Return_Policy'] ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="dptoaa">وقت وصول سياسة التسليم بالعربي</label>
                                <input type="text" id="dptoaa" name="Delivery_Policy_Time_arbic" value="<?php echo htmlspecialchars($Delivery_Policy_Time_arbic); ?>" class="form-control">
                                <div class="text-danger mb-0 mt-1"><?php echo $errors['Delivery_Policy_Time_arbic'] ?></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="rpa">سياسة العائدات بالعربي</label>
                                <input type="text" id="rpa" name="Return_Policy_arabic" value="<?php echo htmlspecialchars($Return_Policy_arabic); ?>" class="form-control">
                                <div class="text-danger mb-0 mt-1"><?php echo $errors['Return_Policy_arabic'] ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo $language['Products Category'] ?></label>
                                    <div class="mb-3">
                                        <div class="form-check">
                                            <label class="form-check-label text-dark" for="CheakOne">
                                                <input class="form-check-input CheakOne" name="Products_Category[]" <?php if ($Products_Category == 'CLOTHING') echo 'checked="checked"'; ?> type="checkbox" id="CheakOne" value="CLOTHING">
                                                <?php echo $language['CLOTHING'] ?>
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                        <div class="ml-3" id="check_mneu1" style="display:none;">
                                            <div class="form-check">
                                                <label class="form-check-label text-dark" for="CheakOne-one">
                                                    <input class="form-check-input" name="Products_sub_Category[]" <?php if ($Products_sub_Category == 'Female-CLOTHING') echo 'checked="checked"'; ?> type="checkbox" id="CheakOne-one" value="Female-CLOTHING">
                                                    <?php echo $language['Female'] ?>
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label  text-dark" for="CheakOne-tow">
                                                    <input class="form-check-input" name="Products_sub_Category[]" <?php if ($Products_sub_Category == 'Male-CLOTHING') echo 'checked="checked"'; ?> type="checkbox" id="CheakOne-tow" value="Male-CLOTHING">
                                                    <?php echo $language['Male'] ?>
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label  text-dark" for="CheakOne-three">
                                                    <input class="form-check-input" name="Products_sub_Category[]" <?php if ($Products_sub_Category == 'Kids-CLOTHING') echo 'checked="checked"'; ?> type="checkbox" id="CheakOne-three" value="Kids-CLOTHING">
                                                     <?php echo $language['Kids'] ?>
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label  text-dark" for="CheakOne-fhur">
                                                    <input class="form-check-input" name="Products_sub_Category[]" <?php if ($Products_sub_Category == 'All-CLOTHING') echo 'checked="checked"'; ?> type="checkbox" id="CheakOne-fhur" value="All-CLOTHING">
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
                                                <input class="form-check-input CheakTow" name="Products_Category[]" <?php if ($Products_Category == 'SHOES') echo 'checked="checked"'; ?> type="checkbox" id="CheakTow" value="SHOES">
                                                <?php echo $language['SHOES'] ?>
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                        <div class="ml-3" id="check_mneu2" style="display:none;">
                                            <div class="form-check">
                                                <label class="form-check-label text-dark" for="CheakTow-one">  
                                                    <input class="form-check-input" name="Products_sub_Category[]" <?php if ($Products_sub_Category == 'Female-SHOES') echo 'checked="checked"'; ?> type="checkbox" id="CheakTow-one" value="Female-SHOES">
                                                    <?php echo $language['Female'] ?>
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label text-dark" for="CheakTow-tow">
                                                    <input class="form-check-input" name="Products_sub_Category[]" <?php if ($Products_sub_Category == 'Male-SHOES') echo 'checked="checked"'; ?> type="checkbox" id="CheakTow-tow" value="Male-SHOES">
                                                    <?php echo $language['Male'] ?>
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label  text-dark" for="CheakTow-three">
                                                    <input class="form-check-input" name="Products_sub_Category[]" <?php if ($Products_sub_Category == 'Kids-SHOES') echo 'checked="checked"'; ?> type="checkbox" id="CheakTow-three" value="Kids-SHOES">
                                                     <?php echo $language['Kids'] ?>
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label  text-dark" for="CheakTow-fhur">
                                                    <input class="form-check-input" name="Products_sub_Category[]" <?php if ($Products_sub_Category == 'All-SHOES') echo 'checked="checked"'; ?> type="checkbox" id="CheakTow-fhur" value="All-SHOES">
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
                                                <input class="form-check-input CheakThree" name="Products_Category[]" <?php if ($Products_Category == 'BAGS') echo 'checked="checked"'; ?> type="checkbox" id="CheakThree" value="BAGS">
                                                <?php echo $language['BAGS'] ?>
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                        <div class="ml-3" id="check_mneu3" style="display:none;">
                                            <div class="form-check">
                                                <label class="form-check-label text-dark" for="CheakThree-one">
                                                    <input class="form-check-input" name="Products_sub_Category[]" <?php if ($Products_sub_Category == 'Female-BAGS') echo 'checked="checked"'; ?> type="checkbox" id="CheakThree-one" value="Female-BAGS">
                                                    <?php echo $language['Female'] ?>
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label text-dark" for="CheakThree-tow">
                                                    <input class="form-check-input" name="Products_sub_Category[]" <?php if ($Products_sub_Category == 'Male-BAGS') echo 'checked="checked"'; ?> type="checkbox" id="CheakThree-tow" value="Male-BAGS">
                                                    <?php echo $language['Male'] ?>
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label text-dark" for="CheakThree-three">
                                                    <input class="form-check-input" name="Products_sub_Category[]" type="checkbox" <?php if ($Products_sub_Category == 'Kids-BAGS') echo 'checked="checked"'; ?> id="CheakThree-three" value="Kids-BAGS">
                                                     <?php echo $language['Kids'] ?>
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label text-dark" for="CheakThree-fhur">
                                                    <input class="form-check-input" name="Products_sub_Category[]" type="checkbox" <?php if ($Products_sub_Category == 'All-BAGS') echo 'checked="checked"'; ?> id="CheakThree-fhur" value="All-BAGS">
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
                                                <input class="form-check-input CheakFure" name="Products_Category[]" type="checkbox" <?php if ($Products_Category == 'PERFUMES') echo 'checked="checked"'; ?> id="CheakFure" value="PERFUMES">
                                                <?php echo $language['PERFUMES'] ?>
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                        <div class="ml-3" id="check_mneu4" style="display:none;">
                                            <div class="form-check">
                                                <label class="form-check-label text-dark" for="CheakFure-one">
                                                    <input class="form-check-input" name="Products_sub_Category[]" type="checkbox" <?php if ($Products_sub_Category == 'Female-PERFUMES') echo 'checked="checked"'; ?> id="CheakFure-one" value="Female-PERFUMES">
                                                    <?php echo $language['Female'] ?>
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label text-dark" for="CheakFure-tow">
                                                    <input class="form-check-input" name="Products_sub_Category[]" type="checkbox" <?php if ($Products_sub_Category == 'Male-PERFUMES') echo 'checked="checked"'; ?> id="CheakFure-tow" value="Male-PERFUMES">
                                                    <?php echo $language['Male'] ?>
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label text-dark" for="CheakFure-three">
                                                    <input class="form-check-input" name="Products_sub_Category[]" type="checkbox" <?php if ($Products_sub_Category == 'Kids-PERFUMES') echo 'checked="checked"'; ?> id="CheakFure-three" value="Kids-PERFUMES">
                                                     <?php echo $language['Kids'] ?>
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label text-dark" for="CheakFure-fhur">
                                                    <input class="form-check-input" name="Products_sub_Category[]" type="checkbox" <?php if ($Products_sub_Category == 'All-PERFUMES') echo 'checked="checked"'; ?> id="CheakFure-fhur" value="All-PERFUMES">
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
                                                <input class="form-check-input CheakFaif" name="Products_Category[]" type="checkbox" <?php if ($Products_Category == 'ACCESSORIES') echo 'checked="checked"'; ?> id="CheakFaif" value="ACCESSORIES">
                                                <?php echo $language['ACCESSORIES'] ?>
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                        <div class="ml-3" id="check_mneu5" style="display:none;">
                                            <div class="form-check">
                                                <label class="form-check-label  text-dark" for="CheakFaif-one">
                                                    <input class="form-check-input" name="Products_sub_Category[]" type="checkbox" <?php if ($Products_sub_Category == 'Hand Made-ACCESSORIES') echo 'checked="checked"'; ?> id="CheakFaif-one" value="Hand Made-ACCESSORIES">
                                                    <?php echo $language['Hand Made'] ?>
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label  text-dark" for="CheakFaif-tow">
                                                    <input class="form-check-input" name="Products_sub_Category[]" type="checkbox" <?php if ($Products_sub_Category == 'All-ACCESSORIES') echo 'checked="checked"'; ?> id="CheakFaif-tow" value="All-ACCESSORIES">
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
                                                <input class="form-check-input CheakSix" name="Products_Category[]" type="checkbox" <?php if ($Products_Category == 'GAMING') echo 'checked="checked"'; ?> id="CheakSix" value="GAMING">
                                                <?php echo $language['GAMING'] ?>
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                        <div class="ml-3" id="check_mneu6" style="display:none;">
                                            <div class="form-check">
                                                <label class="form-check-label text-dark" for="CheakSix-one">
                                                    <input class="form-check-input" name="Products_sub_Category[]" type="checkbox" <?php if ($Products_sub_Category == 'Gaming Accessories-GAMING') echo 'checked="checked"'; ?> id="CheakSix-one" value="Gaming Accessories-GAMING">
                                                    <?php echo $language['Gaming Accessories'] ?>
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label text-dark" for="CheakSix-tow">
                                                    <input class="form-check-input" name="Products_sub_Category[]" type="checkbox" <?php if ($Products_sub_Category == 'Figurines-GAMING') echo 'checked="checked"'; ?> id="CheakSix-tow" value="Figurines-GAMING">
                                                    <?php echo $language['Figurines'] ?>
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label text-dark" for="CheakSix-three">
                                                    <input class="form-check-input" name="Products_sub_Category[]" type="checkbox" <?php if ($Products_sub_Category == 'All-GAMING') echo 'checked="checked"'; ?> id="CheakSix-three" value="All-GAMING">
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
                                                <input class="form-check-input CheakSeven" name="Products_Category[]" type="checkbox" value="OTHERS" <?php if ($Products_Category == 'OTHERS'){ echo 'checked="checked"';} ?> id="CheakSeven" >
                                                <?php echo $language['OTHERS'] ?>
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                        <div class="ml-3" id="check_mneu7" style="display:none;">
                                            <div class="form-check">
                                                <label class="form-check-label text-dark" for="CheakSeven-one">
                                                    <input class="form-check-input" name="Products_sub_Category[]" <?php if ($Products_sub_Category == 'Makeup-OTHERS') echo 'checked="checked"'; ?> type="checkbox" id="CheakSeven-one" value="Makeup-OTHERS">
                                                    <?php echo $language['Makeup'] ?>
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label text-dark" for="CheakSeven-tow">
                                                    <input class="form-check-input" name="Products_sub_Category[]" type="checkbox" <?php if ($Products_sub_Category == 'Phone Accessories-OTHERS') echo 'checked="checked"'; ?> id="CheakSeven-tow" value="Phone Accessories-OTHERS">
                                                    <?php echo $language['Phone Accessories'] ?>
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label text-dark" for="CheakSeven-three">
                                                    <input class="form-check-input" name="Products_sub_Category[]" type="checkbox" <?php if ($Products_sub_Category == 'Hand Made-OTHERS') echo 'checked="checked"'; ?> id="CheakSeven-three" value="Hand Made-OTHERS">
                                                    <?php echo $language['Hand Made'] ?>
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label text-dark" for="CheakSeven-fhur">
                                                    <input class="form-check-input" name="Products_sub_Category[]" type="checkbox" <?php if ($Products_sub_Category == 'Arts-OTHERS') echo 'checked="checked"'; ?> id="CheakSeven-fhur" value="Arts-OTHERS">
                                                    <?php echo $language['Arts'] ?>
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="text-danger mb-0 mt-1"><?php echo $language[$errors['Products_Category']]??"" ?></div>
                                    <div class="text-danger mb-0 mt-1"><?php echo $language[$errors['Products_sub_Category']]??"" ?></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <?php if($update==true): ?>
                                    <input type="hidden" name="id_update_stock" value="<?php echo $_GET['edit_name_prudoct'] ?>">
                                    <div class="form-group form-group-rights">
                                        <label for="psso"><?php echo $language['Product Status'] ?></label>
                                        <select name="Product_status" class="form-control form-control-sm" id="psso">
                                            <option value=""><?php echo $language['Select Product Status'] ?></option>
                                            <?php 
                                                $sql_mneu="SELECT `status_product_qty` FROM `prudocts` WHERE `id_name_prudoct`='$id_name_prudoct'";
                                                $result=mysqli_query($conn , $sql_mneu);
                                                $row_mneus=mysqli_fetch_assoc($result);
                                            ?>
                                            <option value="0" <?php if ($row_mneus['status_product_qty'] == 0) echo 'selected="selected"'; ?>><?php echo $language['Out of stock'] ?></option>
                                            <option value="1" <?php if ($row_mneus['status_product_qty'] == 1) echo 'selected="selected"'; ?>><?php echo $language['In stock'] ?></option>
                                        </select>
                                        <br>
                                        <button class="btn btn-success btn-round" name="update_status_stock"><?php echo $language['Update Status'] ?></button>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="row justify-content-around">
                            <?php if($update==true): ?>
                                <button name="update_name_prudoct" type="submit" class="btn btn-success btn-round"><?php echo $language['Update'] ?></button>
                            <?php else: ?>
                                <button name="save_name_prudoct" type="submit" class="btn btn-success btn-round"><?php echo $language['Save'] ?></button>
                            <?php endif; ?>
                                <button name="cancel_name_prudoct" type="submit" class="btn btn-success btn-round"><?php echo $language['Cancel'] ?></button>
                        </div>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
<?php include "./incl/footer.php"; ?>