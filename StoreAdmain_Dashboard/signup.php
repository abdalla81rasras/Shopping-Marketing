<?php
include "./incl/connection.php";
include "./incl/head_sgin_reg.php";
include "./incl/func_signup.php";
?>
<body class="bg-success">
    <div class="wrapper">
      <div class="container contect-login">
        <div class="card">
          <div class="card-body p-5">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xl-12">
                        <div class="d-flex flex-column align-items-start">
                            <img src="./assets/img/logo-dark.jpg" class="w-20" alt="img-logo">                        
                            <div class="title">
                                <h3><?php echo $language['Signup'] ?></h3>
                            </div>
                            <div class="mt-1 text-danger"><?php echo $language[$errors['exists']]??"" ?></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5 col-sm-5 col-md-5 col-xl-5">
                        <div class="form-group">
                            <p class="text-dark label-p"><?php echo $language['Store Name'] ?> :</p>
                            <input type="text" class="form-control" name="StoreName_info" value="<?php echo htmlspecialchars($StoreName_info); ?>" placeholder="<?php echo $language['Enter Store Name'] ?>">
                            <div class="text-danger mb-0 mt-1"><?php echo $language[$errors['StoreName_info']]??"" ?></div>
                        </div>
                        <div class="form-group">
                            <p class="text-dark label-p"><?php echo $language['Store Logo : size(300 X 312)'] ?></p>
                            <div class="input-group files">
                                <input type="file" class="custom-file-input" accept="Image/*" id="customFile" name="img_store_info">
                                <label class="custom-file-label" for="customFile" style="cursor: pointer;"><?php echo $language['Choose Image'] ?></label>
                            </div>
                            <div class="text-danger mb-0 mt-1"><?php echo $language[$errors['img_store_info']]??"" ?></div>
                        </div>
                        <div class="form-group">
                            <p class="text-dark label-p"><?php echo $language['Email'] ?> :</p>
                            <input type="email" class="form-control" name="email_store_info" value="<?php echo htmlspecialchars($email_store_info); ?>" placeholder="<?php echo $language['plemail'] ?>">
                            <div class="text-danger mb-0 mt-1"><?php echo $language[$errors['email_store_info']]??"" ?></div>
                        </div>
                        <div class="form-group">
                            <p class="text-dark label-p"><?php echo $language['Phone Number'] ?> :</p>
                            <input type="text" class="form-control" name="ph_n_store_info" value="<?php echo htmlspecialchars($ph_n_store_info); ?>" placeholder="<?php echo $language['plphone'] ?>">
                            <div class="text-danger mt-1"><?php echo $language[$errors['ph_n_store_info']]??"" ?></div>
                        </div>
                        <div class="form-group">
                            <p class="text-dark label-p"><?php echo $language['Password'] ?> :</p>
                            <input type="password" class="form-control" value="<?php echo htmlspecialchars($pass_store_info); ?>" name="pass_store_info" placeholder="<?php echo $language['plpass'] ?>">
                            <div class="text-danger mt-1"><?php echo $language[$errors['pass_store_info']]??"" ?></div>
                        </div>
                        <div class="form-group">
                            <p class="text-dark label-p"><?php echo $language['Confirm Password'] ?> :</p>
                            <input type="password" class="form-control" name="cpss_store_info" value="<?php echo htmlspecialchars($cpss_store_info); ?>" placeholder="<?php echo $language['plConfirm Password'] ?>">
                            <div class="text-danger mt-1"><?php echo $language[$errors['cpss_store_info']]??"" ?></div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-sm-5 col-md-5 col-xl-5">
                        <div class="form-group">
                            <p class="text-dark label-p"><?php echo $language['Wallet or Bank IBAN'] ?> :</p>
                            <input type="text" name="wbi_store_info" id="wbi" class="form-control" value="<?php echo htmlspecialchars($wbi_store_info); ?>" placeholder="<?php echo $language['plw_c'] ?>">
                            <div class="text-danger mb-0 mt-1"><?php echo $language[$errors['wbi_store_info']]??"" ?></div>
                        </div>
                        <div class="form-group">
                            <p class="text-dark label-p"><?php echo $language['Card Number'] ?> :</p>
                            <input type="text" class="form-control" name="cardNumber_store_info" value="<?php echo htmlspecialchars($cardNumber_store_info); ?>" placeholder="<?php echo $language['plCard Number'] ?>">
                            <div class="text-danger mb-0 mt-1"><?php echo $language[$errors['cardNumber_store_info']]??"" ?></div>
                        </div>
                        <div class="form-group">
                            <p class="text-dark label-p"><?php echo $language['Card Name'] ?> :</p>
                            <input type="text" class="form-control" name="cardName_store_info" value="<?php echo htmlspecialchars($cardName_store_info); ?>" placeholder="<?php echo $language['plcard Name'] ?>">
                            <div class="text-danger mb-0 mt-1"><?php echo $language[$errors['cardName_store_info']]??"" ?></div>
                        </div>
                        <div class="form-group">
                            <p class="text-dark label-p"><?php echo $language['Expiry date'] ?> :</p>
                            <input type="text" class="form-control" name="Expirydate_store_info" value="<?php echo htmlspecialchars($Expirydate_store_info); ?>" placeholder="<?php echo $language['plExpiry date'] ?>">
                            <div class="text-danger mb-0 mt-1"><?php echo $language[$errors['Expirydate_store_info']]??"" ?></div>
                        </div>
                        <div class="form-group">
                            <p class="text-dark label-p"><?php echo $language['Card Security Code'] ?> :</p>
                            <input type="number" class="form-control" min="1" max="999" name="CardSecurity_store_info" value="<?php echo htmlspecialchars($CardSecurity_store_info); ?>" placeholder="<?php echo $language['plCard Security'] ?>">
                            <div class="text-danger mb-0 mt-1"><?php echo $language[$errors['CardSecurity_store_info']]??"" ?></div>
                        </div> 
                        <div class="form-group">
                            <p class="text-dark label-p"><?php echo $language['Shipping address'] ?> :</p>
                            <input type="text" class="form-control" name="ShippingAddress_store_info" value="<?php echo htmlspecialchars($ShippingAddress_store_info); ?>" placeholder="<?php echo $language['plShipping address'] ?>">
                            <div class="text-danger mb-0 mt-1"><?php echo $language[$errors['ShippingAddress_store_info']]??"" ?></div>
                        </div> 
                    </div>
                    <div class="col-lg-2 col-sm-2 col-md-2 col-xl-2">
                        <div class="form-group">
                            <p class="text-dark label-p"><?php echo $language['Shop Category'] ?> :</p>
                            <div class="mb-3">
                                <div class="form-check">
                                    <label class="form-check-label text-dark" for="CheakOne">
                                        <input class="form-check-input CheakOne" name="Shop_Category_store_info[]" value="CLOTHING" type="checkbox" <?php if ($Shop_Category_store_info == 'CLOTHING') echo 'checked="checked"'; ?> id="CheakOne">
                                            <?php echo $language['CLOTHING'] ?>
                                        <span class="form-check-sign">
                                          <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                                <div class="ml-3" id="check_mneu1" style="display:none;">
                                    <div class="form-check">
                                            <label class="form-check-label text-dark" for="CheakOne-one">
                                                <input class="form-check-input" name="Shop_sub_Category_store_info[]" value="Female-CLOTHING" type="checkbox" <?php if ($Shop_sub_Category_store_info == 'Female-CLOTHING') echo 'checked="checked"'; ?> id="CheakOne-one">
                                                <?php echo $language['Female'] ?>
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label text-dark" for="CheakOne-tow">
                                            <input class="form-check-input" name="Shop_sub_Category_store_info[]" value="Male-CLOTHING" type="checkbox" <?php if ($Shop_sub_Category_store_info == 'Male-CLOTHING') echo 'checked="checked"'; ?> id="CheakOne-tow">
                                            <?php echo $language['Male'] ?>
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label text-dark" for="CheakOne-three">
                                            <input class="form-check-input" name="Shop_sub_Category_store_info[]" value="Kids-CLOTHING" type="checkbox" <?php if ($Shop_sub_Category_store_info == 'Kids-CLOTHING') echo 'checked="checked"'; ?> id="CheakOne-three">
                                             <?php echo $language['Kids'] ?>
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label text-dark" for="CheakOne-fhur">
                                            <input class="form-check-input" name="Shop_sub_Category_store_info[]" value="All-CLOTHING" type="checkbox" <?php if ($Shop_sub_Category_store_info == 'All-CLOTHING') echo 'checked="checked"'; ?> id="CheakOne-fhur">
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
                                        <input class="form-check-input CheakTow" name="Shop_Category_store_info[]" value="SHOES" type="checkbox" <?php if ($Shop_Category_store_info == 'SHOES') echo 'checked="checked"'; ?> id="CheakTow">
                                        <?php echo $language['SHOES'] ?>
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                                <div class="ml-3" id="check_mneu2" style="display:none;">
                                    <div class="form-check">
                                        <label class="form-check-label text-dark" for="CheakTow-one">  
                                            <input class="form-check-input" name="Shop_sub_Category_store_info[]" value="Female-SHOES" type="checkbox" <?php if ($Shop_sub_Category_store_info == 'Female-SHOES') echo 'checked="checked"'; ?> id="CheakTow-one">
                                            <?php echo $language['Female'] ?>
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label text-dark" for="CheakTow-tow">
                                            <input class="form-check-input" name="Shop_sub_Category_store_info[]" value="Male-SHOES" type="checkbox" <?php if ($Shop_sub_Category_store_info == 'Male-SHOES') echo 'checked="checked"'; ?> id="CheakTow-tow">
                                            <?php echo $language['Male'] ?>
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label text-dark" for="CheakTow-three">
                                            <input class="form-check-input" name="Shop_sub_Category_store_info[]" value="Kids-SHOES" type="checkbox" <?php if ($Shop_sub_Category_store_info == 'Kids-SHOES') echo 'checked="checked"'; ?> id="CheakTow-three">
                                             <?php echo $language['Kids'] ?>
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label text-dark" for="CheakTow-fhur">
                                            <input class="form-check-input" name="Shop_sub_Category_store_info[]" value="All-SHOES" type="checkbox" <?php if ($Shop_sub_Category_store_info == 'All-SHOES') echo 'checked="checked"'; ?> id="CheakTow-fhur">
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
                                        <input class="form-check-input CheakThree" name="Shop_Category_store_info[]" value="BAGS" type="checkbox" <?php if ($Shop_Category_store_info == 'BAGS') echo 'checked="checked"'; ?> id="CheakThree">
                                        <?php echo $language['BAGS'] ?>
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                                <div class="ml-3" id="check_mneu3" style="display:none;">
                                    <div class="form-check">
                                        <label class="form-check-label text-dark" for="CheakThree-one">
                                            <input class="form-check-input" name="Shop_sub_Category_store_info[]" value="Female-BAGS" type="checkbox" <?php if ($Shop_sub_Category_store_info == 'Female-BAGS') echo 'checked="checked"'; ?> id="CheakThree-one">
                                            <?php echo $language['Female'] ?>
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label text-dark" for="CheakThree-tow">
                                            <input class="form-check-input" name="Shop_sub_Category_store_info[]" value="Male-BAGS" type="checkbox" <?php if ($Shop_sub_Category_store_info == 'Male-BAGS') echo 'checked="checked"'; ?> id="CheakThree-tow">
                                            <?php echo $language['Male'] ?>
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label text-dark" for="CheakThree-three">
                                            <input class="form-check-input" name="Shop_sub_Category_store_info[]" value="Kids-BAGS" type="checkbox" <?php if ($Shop_sub_Category_store_info == 'Kids-BAGS') echo 'checked="checked"'; ?> id="CheakThree-three">
                                             <?php echo $language['Kids'] ?>
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label text-dark" for="CheakThree-fhur">
                                            <input class="form-check-input" name="Shop_sub_Category_store_info[]" value="All-BAGS" type="checkbox" <?php if ($Shop_sub_Category_store_info == 'All-BAGS') echo 'checked="checked"'; ?> id="CheakThree-fhur">
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
                                        <input class="form-check-input CheakFure" name="Shop_Category_store_info[]" value="PERFUMES" type="checkbox" <?php if ($Shop_Category_store_info == 'PERFUMES') echo 'checked="checked"'; ?> id="CheakFure">
                                        <?php echo $language['PERFUMES'] ?>
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                                <div class="ml-3" id="check_mneu4" style="display:none;">
                                    <div class="form-check">
                                        <label class="form-check-label text-dark" for="CheakFure-one">
                                            <input class="form-check-input" name="Shop_sub_Category_store_info[]" value="Female-PERFUMES" type="checkbox" <?php if ($Shop_sub_Category_store_info == 'Female-PERFUMES') echo 'checked="checked"'; ?> id="CheakFure-one">
                                            <?php echo $language['Female'] ?>
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label text-dark" for="CheakFure-tow">
                                            <input class="form-check-input" name="Shop_sub_Category_store_info[]" value="Male-PERFUMES" type="checkbox" <?php if ($Shop_sub_Category_store_info == 'Male-PERFUMES') echo 'checked="checked"'; ?> id="CheakFure-tow">
                                            <?php echo $language['Male'] ?>
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label text-dark" for="CheakFure-three">
                                            <input class="form-check-input" name="Shop_sub_Category_store_info[]" value="Kids-PERFUMES" type="checkbox" <?php if ($Shop_sub_Category_store_info == 'Kids-PERFUMES') echo 'checked="checked"'; ?> id="CheakFure-three">
                                             <?php echo $language['Kids'] ?>
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label text-dark" for="CheakFure-fhur">
                                            <input class="form-check-input" name="Shop_sub_Category_store_info[]" value="All-PERFUMES" type="checkbox" <?php if ($Shop_sub_Category_store_info == 'All-PERFUMES') echo 'checked="checked"'; ?> id="CheakFure-fhur">
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
                                        <input class="form-check-input CheakFaif" name="Shop_Category_store_info[]" value="ACCESSORIES" type="checkbox" <?php if ($Shop_Category_store_info == 'ACCESSORIES') echo 'checked="checked"'; ?> id="CheakFaif">
                                        <?php echo $language['ACCESSORIES'] ?>
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                                <div class="ml-3" id="check_mneu5" style="display:none;">
                                    <div class="form-check">
                                        <label class="form-check-label text-dark" for="CheakFaif-one">
                                            <input class="form-check-input" name="Shop_sub_Category_store_info[]" value="Hand Made-ACCESSORIES" type="checkbox" <?php if ($Shop_sub_Category_store_info == 'Hand Made-ACCESSORIES') echo 'checked="checked"'; ?> id="CheakFaif-one">
                                            <?php echo $language['Hand Made'] ?>
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label text-dark" for="CheakFaif-tow">
                                            <input class="form-check-input" name="Shop_sub_Category_store_info[]" value="All-ACCESSORIES" type="checkbox" <?php if ($Shop_sub_Category_store_info == 'All-ACCESSORIES') echo 'checked="checked"'; ?> id="CheakFaif-tow">
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
                                        <input class="form-check-input CheakSix" name="Shop_Category_store_info[]" value="GAMING" type="checkbox" <?php if ($Shop_Category_store_info == 'GAMING') echo 'checked="checked"'; ?> id="CheakSix">
                                        <?php echo $language['GAMING'] ?>
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                                <div class="ml-3" id="check_mneu6" style="display:none;">
                                    <div class="form-check">
                                        <label class="form-check-label text-dark" for="CheakSix-one">
                                            <input class="form-check-input" name="Shop_sub_Category_store_info[]" value="Gaming Accessories-GAMING" type="checkbox" <?php if ($Shop_sub_Category_store_info == 'Gaming Accessories-GAMING') echo 'checked="checked"'; ?> id="CheakSix-one">
                                            <?php echo $language['Gaming Accessories'] ?>
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label text-dark" for="CheakSix-tow">
                                            <input class="form-check-input" name="Shop_sub_Category_store_info[]" value="Figurines-GAMING" type="checkbox" <?php if ($Shop_sub_Category_store_info == 'Figurines-GAMING') echo 'checked="checked"'; ?> id="CheakSix-tow">
                                            <?php echo $language['Figurines'] ?>
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label text-dark" for="CheakSix-three">
                                            <input class="form-check-input" name="Shop_sub_Category_store_info[]" value="All-GAMING" type="checkbox" <?php if ($Shop_sub_Category_store_info == 'All-GAMING') echo 'checked="checked"'; ?> id="CheakSix-three">
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
                                        <input class="form-check-input CheakSeven" name="Shop_Category_store_info[]" value="OTHERS" type="checkbox" <?php if ($Shop_Category_store_info == 'OTHERS') echo 'checked="checked"'; ?> id="CheakSeven">
                                        <?php echo $language['OTHERS'] ?>
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                                <div class="ml-3" id="check_mneu7" style="display:none;">
                                    <div class="form-check">
                                        <label class="form-check-label text-dark" for="CheakSeven-one">
                                            <input class="form-check-input" name="Shop_sub_Category_store_info[]" value="Makeup-OTHERS" type="checkbox" <?php if ($Shop_sub_Category_store_info == 'Makeup-OTHERS') echo 'checked="checked"'; ?> id="CheakSeven-one">
                                            <?php echo $language['Makeup'] ?>
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label text-dark" for="CheakSeven-tow">
                                            <input class="form-check-input" name="Shop_sub_Category_store_info[]" value="Phone Accessories-OTHERS" type="checkbox" <?php if ($Shop_sub_Category_store_info == 'Phone Accessories-OTHERS') echo 'checked="checked"'; ?> id="CheakSeven-tow">
                                            <?php echo $language['Phone Accessories'] ?>
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label text-dark" for="CheakSeven-three">
                                            <input class="form-check-input" name="Shop_sub_Category_store_info[]" value="Hand Made-OTHERS" type="checkbox" <?php if ($Shop_sub_Category_store_info == 'Hand Made-OTHERS') echo 'checked="checked"'; ?> id="CheakSeven-three">
                                            <?php echo $language['Hand Made'] ?>
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label text-dark" for="CheakSeven-fhur">
                                            <input class="form-check-input" name="Shop_sub_Category_store_info[]" value="Arts-OTHERS" type="checkbox" <?php if ($Shop_sub_Category_store_info == 'Arts-OTHERS') echo 'checked="checked"'; ?> id="CheakSeven-fhur">
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
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xl-12">
                        <table>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="form-check mt-2">
                                            <label class="form-check-label text-dark" for="ch">
                                                <input class="form-check-input" id="ch" value="agree terms" name="agree_terms" type="checkbox" <?php if ($agree_terms == 'agree terms') echo 'checked="checked"'; ?>>
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="label-p text-dark mr-2 p-0" style="margin-top: 43px;"><?php echo $language['I agree on the terms'] ?>.</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="text-danger mb-0 mt-1"><?php echo $language[$errors['agree_terms']]??"" ?></div>
                        <div class="form-group text-center mt-2">
                            <button type="submit" name="creat_acount" class="btn btn-success"><?php echo $language['Creat Account'] ?></button>
                        </div>
                        <div class="text-center">
                            <a href="./login.php?lang=<?php echo $lang ?>"><?php echo $language['Login'] ?></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xl-12">
                        <div class="d-flex justify-content-between">
                            <small class="text-left font-weight-bold m-0 p-0"><?php echo $language['Store Admin'] ?></small>
                            <ul class="d-flex mb-0 pb-0">
                                <li><p class="text-dark label-p"><?php echo $language['Languages'] ?> :</p></li>
                                <li class="mx-3"><a href="?lang=en"><?php echo $language['en'] ?></a></li>
                                <li><a href="?lang=ar"><?php echo $language['ar'] ?></a></li> 
                            </ul>
                        </div>
                    </div>
                </div>
           </form> 
          </div>
        </div>
      </div>
    </div>
    <!--   Core JS Files   -->
    <script src="./assets/js/core/jquery.min.js"></script>
    <script src="./assets/js/core/popper.min.js"></script>
    <script src="./assets/js/core/bootstrap.min.js"></script>
    <script src="./assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    
    <!--  Notifications Plugin    -->
    <script src="./assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="./assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script>

    <script src="./assets/js/JQ-Others.js"></script>
    <script>
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
    
  </body>

</html>