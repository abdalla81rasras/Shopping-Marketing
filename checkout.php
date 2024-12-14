<?php
session_start();
if(!isset($_SESSION['id_users'])){

}

include "./includes/connection_1.php";
include "./includes/connection_2.php";
include "./includes/header.php";

$total_amount = 0.00;
$count_item = 0;
$shipping = 2.00;
$Taxes = 0.05 ;

?>
<style>
    #detils_card {
        display: none; 
    }
</style>
<!-- breadcrumb-section start -->
<nav class="breadcrumb-section theme1 breadcrumb-bg1">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="breadcrumb-title text-center my-20">
          <h2 class="title text-dark text-capitalize"><?php echo $language["checkout"] ?></h2>
        </div>
      </div>
      <div class="col-12">
        <ol
          class="breadcrumb bg-transparent m-0 p-0 align-items-center justify-content-center"
        >
          <li class="breadcrumb-item"><a href="index.php?lang=<?php echo $lang ?>"><?php echo $language["Home"] ?></a></li>
          <li class="breadcrumb-item active" aria-current="page">
            <?php echo $language["checkout"] ?>
          </li>
        </ol>
      </div>
    </div>
  </div>
</nav>
<!-- breadcrumb-section end -->

<!-- product tab start -->
<section class="check-out-section pb-40">
    <div class="container grid-wraper">
        <div class="row">
            <?php 
                include "./includes/func_checkout.php";
                include "./includes/procced_checkout.php";
            ?>
            <div class="col-lg-8 mb-30">
                <div id="accordion">
                    <form action="" method="POST">
                        <?php
                            if(isset($_SESSION['cart'])){
                                foreach($_SESSION['cart'] as $product_id => $product_details){
                        ?>
                                <input type="hidden" name="products_id[]" value="<?php echo $product_id ?>">
                                <input type="hidden" name="name_product[]" value="<?php echo $product_details['name'] ?>">
                                <input type="hidden" name="store_name[]" value="<?php echo $product_details['store'] ?>">
                                <input type="hidden" name="name_product_ar[]" value="<?php echo $product_details['name_ar'] ?>">
                                <input type="hidden" name="store_name_ar[]" value="<?php echo $product_details['store_ar'] ?>">
                                <input type="hidden" name="logo_store_prudocts[]" value="<?php echo $product_details['logo store'] ?>">
                                <input type="hidden" name="price_product[]" value="<?php echo $product_details['price'] ?>">
                                <input type="hidden" name="category[]" value="<?php echo $product_details['category'] ?>">
                                <input type="hidden" name="sub_category[]" value="<?php echo $product_details['sub category'] ?>">
                                <input type="hidden" name="qtys[]" value="<?php echo $product_details['quantity'] ?>">
                                <input type="hidden" name="colors[]" value="<?php echo $product_details['color'] ?>">
                        <?php
                                }

                                foreach($_SESSION['cart'] as $product_id => $product_details){
                                    
                                    $total_amount += $product_details['quantity'] * $product_details['price'];

                                    $count_item += 1; 
                                    
                                }
                            }
                        ?>
                    </form>
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"
                                    aria-expanded="true" aria-controls="collapseOne">
                                    1 <?php echo $language["Personal Information"] ?>
                                </button>
                            </h5>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                            data-parent="#accordion">
                            <div class="card-body">
                                <form action="" class="personal-information" method="POST">
                                    <?php if(empty($_SESSION['id_users'])): ?>
                                        <div class="order-asguest mt-2 mb-4">
                                            <a href="#"><?php echo $language["Order as a guest"] ?></a> 
                                            <span class="separator"></span>
                                            <a class="gray" href="login.php?lang=<?php echo $lang ?>"><?php echo $language["Sign in"] ?></a>
                                        </div>    
                                    <?php endif; ?>
                                    <div class="form-group row">
                                        <label for="firstname" class="col-md-3 col-form-label"><?php echo $language["First Name"] ?></label>
                                        <div class="col-md-6">
                                            <input type="text" id="firstname" name="first_name" 
                                                value="<?php if(empty($_SESSION['id_users'])){  }else{ echo $first_name_drop_user; }?>" class="form-control" required="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lastname" class="col-md-3 col-form-label"><?php echo $language["Last Name"] ?></label>
                                        <div class="col-md-6">
                                            <input type="text" id="lastname" name="last_name" 
                                                value="<?php if(empty($_SESSION['id_users'])){  }else{ echo $last_name_drop_user; }?>" class="form-control" required="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="username" class="col-md-3 col-form-label"><?php echo $language["Username"] ?></label>
                                        <div class="col-md-6">
                                            <input type="text" id="username" name="username" 
                                                value="<?php if(empty($_SESSION['id_users'])){  }else{ echo $user_name_drop_user; }?>" class="form-control" required="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-md-3 col-form-label"><?php echo $language["Email"] ?></label>
                                        <div class="col-md-6">
                                            <input type="email" id="email" name="email" 
                                                value="<?php if(empty($_SESSION['id_users'])){  }else{ echo $email_drop_user; }?>" class="form-control" required="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="phonenumber" class="col-md-3 col-form-label"><?php echo $language["Phone Number"] ?></label>
                                        <div class="col-md-6">
                                            <input type="text" id="phonenumber" name="phone_number"
                                                value="<?php if(empty($_SESSION['id_users'])){  }else{ echo $phone_number_drop_user; }?>" class="form-control" required="">
                                        </div>
                                    </div> 
                                    <div class="form-group row">
                                        <label for="address" class="col-md-3 col-form-label"><?php echo $language["Address"] ?></label>
                                        <div class="col-md-6">
                                            <input type="text" id="address" name="address"
                                                value="<?php if(empty($_SESSION['id_users'])){  }else{ echo $address_drop_user; }?>" class="form-control" required="">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <div class="sign-btn text-right">
                                                <?php if(!empty($_SESSION['id_users'])){ ?>
                                                    <button type="submit" name="personal_info" class="btn theme-btn--dark1 btn--md"><?php echo $language["Next"] ?></button>
                                                <?php }else{ ?>
                                                    <button onclick="window.location.href='login.php?lang=<?php echo $lang ?>'" class="btn theme-btn--dark1 btn--md"><?php echo $language["Next"] ?></button>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo"
                                    aria-expanded="false" aria-controls="collapseTwo">
                                    2 <?php echo $language["Addresses"] ?>
                                </button>
                            </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                                <div class="checkout-inner border-0">
                                    <div class="checkout-address p-0">
                                        <p>
                                            <?php echo $language["p"] ?>.
                                        </p>
                                    </div>
                                    <div class="check-out-content">
                                        <form id="contact-form" class="p-0" action="" method="post">
                                            <div class="form-group row">
                                                <label class="col-md-3" for="company"><?php echo $language["Company"] ?></label>
                                                <div class="col-md-6">
                                                    <input class="form-control" id="company" name="company"
                                                        value="<?php if(empty($_SESSION['id_users'])){  }else{ echo $company_customer; }?>" type="text">
                                                </div>
                                                <div class="col-md-3">
                                                    <span class="optional">
                                                        <?php echo $language["Optional"] ?>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3" for="address2"><?php echo $language["Address Complement"] ?></label>
                                                <div class="col-md-6">
                                                    <input class="form-control" id="address2" name="address_complement" type="text"
                                                        value="<?php if(empty($_SESSION['id_users'])){  }else{ echo $address_complement_customer; }?>">
                                                </div>
                                                <div class="col-md-3"> <span class="optional">
                                                        <?php echo $language["Optional"] ?>
                                                    </span> 
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3" for="countries"><?php echo $language["Country"] ?></label>
                                                <div class="col-md-6">
                                                    <select class="form-control" id="countries" name="countries" onchange="populateProvinces()" required="">
                                                        <option value="">-- <?php echo $language["please choose"] ?> --</option>
                                                        <?php 
                                                            if(!empty($_SESSION['id_users'])):
                                                                $id_users = $_SESSION['id_users'];
                                                                $sql_Country="SELECT `countries` FROM `customers` WHERE `id_user`='$id_users'";
                                                                $result_Country=mysqli_query($conn_main_admin , $sql_Country);
                                                                $row_Country=mysqli_fetch_assoc($result_Country);
                                                            endif;
                                                        ?>
                                                        <option value="US" <?php if(empty($_SESSION['id_users'])){ }else{ if($countries_customer == 'US') echo 'selected="selected"'; } ?>>United States</option>
                                                        <option value="CA" <?php if(empty($_SESSION['id_users'])){ }else{ if($countries_customer == 'CA') echo 'selected="selected"'; } ?>>Canada</option>
                                                        <option value="UK" <?php if(empty($_SESSION['id_users'])){ }else{ if($countries_customer == 'UK') echo 'selected="selected"'; } ?>>United Kingdom</option>
                                                        <option value="JO" <?php if(empty($_SESSION['id_users'])){ }else{ if($countries_customer == 'JO') echo 'selected="selected"'; } ?>>Jordan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3" for="zip"><?php echo $language["zip"] ?></label>
                                                <div class="col-md-6">
                                                    <input class="form-control" id="zip" name="postcode" type="text"
                                                        value="<?php if(empty($_SESSION['id_users'])){  }else{ echo $postcode_customer; }?>"required="">
                                                    <p id="result"></p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3" for="city"><?php echo $language["City"] ?></label>
                                                <div class="col-md-6">
                                                    <input class="form-control" id="city" name="city" type="text"
                                                        value="<?php if(empty($_SESSION['id_users'])){  }else{ echo $city_customer; }?>" required="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3"><?php echo $language["Province With Price For Delivery"] ?></label>
                                                <?php
                                                    if(!empty($_SESSION['id_users'])):
                                                ?>
                                                    <div class="col-md-2">
                                                        <?php
                                                            $province = $language["province"];
                                                            $Price = $language["Price"];
                                                        ?>
                                                        <p class="text-success"><?php echo (empty($provinces_customer) ? $province : $provinces_customer);?> - <?php echo (empty($p_d_customer) ? $Price : $p_d_customer);?></p>
                                                    </div>
                                                <?php
                                                    endif;
                                                ?>
                                                <div class="<?php if(!empty($_SESSION['id_users'])){ ?> col-md-4 <?php }else{ ?> col-md-6 <?php } ?>">
                                                    <select name="p_d" id="p_d" class="form-control" onchange="displayName()" required="">
                                                        <option value="">-- <?php echo $language["Provinces"] ?> --</option>
                                                    </select>
                                                    <input type="hidden" name="provinces" value="" id="text_province">    
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3" for="areaname"><?php echo $language["Area name"] ?></label>
                                                <div class="col-md-6">
                                                    <input class="form-control" id="areaname" name="areaname" type="text"
                                                        value="<?php if(empty($_SESSION['id_users'])){  }else{ echo $areaname_customer; }?>" required="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3" for="streetname"><?php echo $language["Street name"] ?></label>
                                                <div class="col-md-6">
                                                    <input class="form-control" id="streetname" name="streetname" type="text"
                                                        value="<?php if(empty($_SESSION['id_users'])){  }else{ echo $streetname_customer; }?>" required="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3" for="buildingnumber"><?php echo $language["building number"] ?></label>
                                                <div class="col-md-6">
                                                    <input class="form-control" id="buildingnumber" name="buildingnumber" type="text" 
                                                        value="<?php if(empty($_SESSION['id_users'])){  }else{ echo $buildingnumber_customer; }?>" required="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-9 col-md-offset-3">
                                                    <div class="filter-check-box mb-0">
                                                        <input type="checkbox" style="opacity: 1; display:inline" name="check_out" id="20855"
                                                            value='check out' required="" 
                                                            <?php if(empty($_SESSION['id_users'])){ }else{ if($check_out_customer == 'check out') echo 'checked="checked"'; } ?>>
                                                        <label class="checkout" for="20855"><?php echo $language["check out"] ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-0">
                                                <div class="col-12 text-right">
                                                    <?php if(!empty($_SESSION['id_users'])){ ?>
                                                        <button type="submit" name="Address_continue" class="btn theme-btn--dark1 btn--md"><?php echo $language["Continue"] ?></button>
                                                    <?php }else{ ?>
                                                        <button type="button" onclick="window.location.href='login.php?lang=<?php echo $lang ?>'" class="btn theme-btn--dark1 btn--md"><?php echo $language["Continue"] ?></button>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse"
                                    data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <span>3</span> <?php echo $language["Shipping Method"] ?>
                                </button>
                            </h5>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                            data-parent="#accordion">
                            <div class="card-body">
                                <div class="checkout-inner border-0">
                                    <div class="check-out-content px-0">
                                        <form id="contact-form" class="p-0" action="" method="post">
                                            <div class="form-group row">
                                                <div class="col-md-9 col-md-offset-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" id="cash_on_delivery" value="cash on delivery" name="payment_methods">
                                                        <label class="form-check-label p-0 mb-1 mx-3" style="font-weight: bold;" for="cash_on_delivery">
                                                            <?php echo $language["Cash on delivery"] ?>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-9 col-md-offset-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" id="online" value="online" name="payment_methods">
                                                        <label class="form-check-label p-0 mb-1 mx-3" style="font-weight: bold;" for="online">
                                                            <?php echo $language["Online method"] ?>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mx-3 mb-4" id="detils_card">
                                                <div class="form-group row mb-3">
                                                    <div class="col-md-9 col-md-offset-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="paymentMethod" id="radio_one" value="option1" onclick="showDetails()">
                                                            <label class="form-check-label p-0 mx-3" style="font-weight: bold;" for="radio_one">
                                                                <?php echo $language["By Paypal Payment"] ?>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="details mx-4" id="details_1" style="display: none;">
                                                    <div class="form-grou row">
                                                        <div class="col-md-8">
                                                            <?php 
                                                                if(!empty($_SESSION['id_users'])):
                                                            ?>
                                                                <label style="position:relative ; top:-15px;"><?php echo $language["Payment getway"] ?></label>
                                                                <span class="paypal mx-4" >
                                                                    <div id="paypal-button"></div>
                                                                    <?php
                                                                        $sql_customer = "SELECT * from `customers` WHERE `id_user`='".$_SESSION['id_users']."'";
                                                                        $query_customer = mysqli_query($conn_main_admin , $sql_customer);

                                                                        while ($fetch_customer = mysqli_fetch_assoc($query_customer)) {   
                                                                            $id_form_personal = $fetch_customer['id_form_personal'];
                                                                            $id_form_address = $fetch_customer['id_form_address'];
                                                                        }

                                                                        if(empty($id_form_personal)){
                                                                            $id_form_personal = 0;
                                                                        }else{
                                                                            $id_form_personal;
                                                                        }

                                                                        if(empty($id_form_address)){
                                                                            $id_form_address = 0;
                                                                        }else{
                                                                            $id_form_address;
                                                                        }

                                                                        $totals_final = $total_amount+$shipping+$Taxes;
                                                                        $amount_usd = number_format(($totals_final * 0.71) , 2) ; //jod to usd
                                                                    ?>
                                                                    <input type="hidden" id="amount_total_paypal" value="<?php echo $amount_usd ?>">
                                                                    <input type="hidden" id="count_items" value="<?php echo $count_item ?>">
                                                                    <input type="hidden" id="id_form_personal" value="<?php echo $id_form_personal ?>">
                                                                    <input type="hidden" id="id_form_address" value="<?php echo $id_form_address ?>">
                                                                    <input type="hidden" id="totals_final" value="<?php echo $totals_final ?>">
                                                                    <input type="hidden" id="lang_paypal" value="<?php echo $lang ?>">
                                                                </span>
                                                            <?php 
                                                                elseif(empty($_SESSION['id_users'])):
                                                            ?>
                                                                <div><?php echo $language["You must"] ?> <a href="login.php?lang=<?php echo $lang ?>"><?php echo $language["login"] ?></a> <?php echo $language["or"] ?> <a href="register.php?lang=<?php echo $lang ?>"><?php echo $language["registration"] ?> </a>  :)</div>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="form-group row">
                                                    <div class="col-md-9 col-md-offset-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="paymentMethod" id="radio_two" value="option2" onclick="showDetails()">
                                                            <label class="form-check-label p-0 mb-1 mx-3" style="font-weight: bold;" for="radio_two">
                                                                <?php echo $language["By Card details"] ?>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="details mx-4" id="details_2" style="display: none;">
                                                    <div class="form-group row">
                                                        <label class="col-md-3" for="CardNumber"><?php echo $language["Card Number"] ?></label>
                                                        <div class="col-md-8">
                                                            <input class="form-control" id="CardNumber" name="Card_Number"
                                                                type="number">
                                                            <small><?php echo $language["cn"] ?></small>
                                                            <div class="text-danger"><?php echo $language[$errors['Card_Number']]??""; ?></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3" for="namecard"><?php echo $language["Name on Card"] ?></label>
                                                        <div class="col-md-8">
                                                            <input class="form-control" id="name_card" name="namecard" type="text">
                                                            <div class="text-danger"><?php echo $language[$errors['namecard']]??""; ?></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3"><?php echo $language["Expiry date"] ?></label>
                                                        <span><?php echo $language["For example 10/20"] ?></span>
                                                        <div class="col-md-8">
                                                            <table>
                                                                <tr>
                                                                    <td>
                                                                        <?php echo $language["Month"] ?>
                                                                    </td>
                                                                    <td></td>
                                                                    <td>
                                                                        <?php echo $language["Year"] ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <input type="number" onchange="leadingZeros(this)" class="form-control" name="month_expiry">
                                                                        <div class="text-danger"><?php echo $language[$errors['month_expiry']]??""; ?></div>
                                                                    </td>
                                                                    <td class="px-2">
                                                                        /
                                                                    </td>
                                                                    <td>
                                                                        <input type="number" onchange="leadingZeros(this)" class="form-control" name="year_expiry">
                                                                        <div class="text-danger"><?php echo $language[$errors['year_expiry']]??""; ?></div>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3" for="security"><?php echo $language["Card security code"] ?></label>
                                                        <span><?php echo $language["csc"] ?></span>
                                                        <div class="col-md-6">
                                                            <div class="d-flex">
                                                                <input class="form-control" id="security" name="security"
                                                                    type="number">
                                                                <img src="./assets/Icons and Images/card-details.jpeg" class="mx-2" height="35px">
                                                            </div>
                                                            <div class="text-danger"><?php echo $language[$errors['security']]??""; ?></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3" for="promocode"><?php echo $language["Promo code"] ?></label>
                                                        <div class="col-md-5">
                                                            <input class="form-control" id="promocode" name="promo_code" type="text">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <span class="optional">
                                                                <?php echo $language["Optional"] ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-0">
                                                <div class="col-12 text-right">
                                                    <?php if(!empty($_SESSION['id_users'])){ ?>
                                                        <button type="submit" name="shipping_method" class="btn theme-btn--dark1 btn--md"><?php echo $language["Next"] ?></button>
                                                    <?php }else{ ?>
                                                        <button type="button" onclick="window.location.href='login.php?lang=<?php echo $lang ?>'" class="btn theme-btn--dark1 btn--md"><?php echo $language["Next"] ?></button>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingFour">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse"
                                    data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    <span>4</span> <?php echo $language["Payment"] ?>
                                </button>
                            </h5>
                        </div>
                        <form action="" method="post">
                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                                <div class="card-body pt-0">
                                    <div class="form-group row mb-4">
                                        <label class="col-md-3" for="price"><?php echo $language["Final Price"] ?> : 
                                            <span>
                                                <?php
                                                if(!empty($_SESSION['id_users'])){

                                                    $sql_final_total = "SELECT * FROM `customers` WHERE `id_user`='".$_SESSION['id_users']."'";
                                                    $query_final_total = mysqli_query($conn_main_admin,$sql_final_total);
                                                    $row_final_total = mysqli_fetch_assoc($query_final_total);

                                                    if($row_final_total['cash_delivery'] === "cash on delivery"){

                                                        $total_amount += $p_d_customer;
                                                        echo $total_amount;

                                                    }elseif($row_final_total['cash_delivery'] === 'online'){

                                                        $promo_code = $row_final_total['promo_code'];
                                                        $sql_promo_codes = "SELECT * FROM `promo_codes` WHERE `code`='$promo_code' AND expiration_date >= CURDATE()";
                                                        $query_promo_codes = mysqli_query($conn_main_admin ,$sql_promo_codes);
                                                        
                                                        if(mysqli_num_rows($query_promo_codes) > 0){

                                                            $fetch_promo_codes = mysqli_fetch_assoc($query_promo_codes);

                                                            $total_amount -= $fetch_promo_codes['discount_amount'] ;

                                                            if($total_amount < 0){

                                                                $total_amount = 0; 
                                                                echo $total_amount ;

                                                            }else{

                                                                echo $total_amount ;

                                                            }
                                                            
                                                        }else{

                                                            echo $total_amount;

                                                        }

                                                    }else{

                                                        echo 0;

                                                    }

                                                }else{

                                                    echo 0; 

                                                }
                                                ?>JD
                                            </span>
                                        </label>
                                    </div>
                                    <div class="filter-check-box mb-4">
                                        <input type="checkbox" value="agree" name="agree" style="opacity: 1; display:inline" id="20828" required="">
                                        <label class="checkout" for="20828"><?php echo $language["agree"] ?></label>
                                    </div>
                                    <?php
                                        if(!empty($_SESSION['id_users'])){
                                            $sql_final_cash = "SELECT `cash_delivery` FROM `customers` WHERE `id_user`='".$_SESSION['id_users']."'";
                                            $query_final_cash = mysqli_query($conn_main_admin,$sql_final_cash);
                                            $row_final_cash = mysqli_fetch_assoc($query_final_cash);

                                            if($row_final_cash['cash_delivery'] === "cash on delivery"){
                                    ?>
                                                <span class="d-inline-block btn theme-btn--dark1 btn--md" data-toggle="popover" data-html="true" data-placement="bottom" title="<i><b><?php echo $language["Order ID"] ?> : <?php echo empty($id_order_cash_customer) ? "" : "$id_order_cash_customer" ?></br></i>" data-content="<div><b><?php echo $language["Thank You"] ?> !</b> <br> <?php echo $language["we will contact you soon to deliver your basket"] ?>.</div>">
                                                    <?php echo $language["Confirm"] ?>
                                                </span>
                                    <?php
                                            }elseif($row_final_cash['cash_delivery'] === 'online'){
                                    ?>
                                                <button type="submit" name="confirm_online" class="d-inline-block btn theme-btn--dark1 btn--md">
                                                    <?php echo $language["Confirm"] ?>
                                                </button>
                                    <?php
                                            }else{
                                    ?>
                                                <span class="d-inline-block btn theme-btn--dark1 btn--md">
                                                    <?php echo $language["Confirm"] ?>
                                                </span>
                                    <?php
                                            }
                                        }else{
                                    ?>
                                        <span class="d-inline-block btn theme-btn--dark1 btn--md">
                                            <?php echo $language["Confirm"] ?>
                                        </span>
                                    <?php 
                                        }
                                    ?>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-30">
                <?php
                    if(!empty($_SESSION['id_users'])){
                ?>
                    <form action="" method="post">
                        <ul class="list-group cart-summary rounded-0">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <ul class="items">
                                    <li><?php echo $count_item; ?> <?php echo $language["item"] ?></li>
                                    <li><?php echo $language["Shipping"] ?></li>
                                </ul>
                                <ul class="amount">
                                    <li class="fianl_price"><span><?php echo $total_amount ?></span> JD</li>
                                    <li><span><?php echo $shipping ?></span> JD</li>
                                </ul>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <ul class="items">
                                    <li><?php echo $language["Total (tax excl.)"] ?></li>
                                    <li><?php echo $language["Taxes"] ?></li>
                                </ul>
                                <ul class="amount">
                                    <li>
                                        <?php 
                                            $total_all = $total_amount + $shipping; 
                                            echo $total_all;
                                        ?> JD
                                    </li>
                                    <li><?php echo $Taxes; ?> JD</li>
                                </ul>
                                <input type="hidden" name="total_final_all" value="<?php echo ($total_all + $Taxes)?>">
                            </li>
                            <li class="list-group-item text-center">
                                <?php
                                    $_SESSION['count_item'] = $count_item;
                                ?>
                                <button name="proceed" class="btn theme-btn--dark1 btn--md"><?php echo $language["Proceed to checkout"] ?></button>
                            </li>
                        </ul>
                    </form>
                <?php
                    }else{
                ?>
                    <ul class="list-group cart-summary rounded-0">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <ul class="items">
                                <li>0 <?php echo $language["item"] ?></li>
                                <li><?php echo $language["Shipping"] ?></li>
                            </ul>
                            <ul class="amount">
                                <li class="fianl_price"><span>0</span> JD</li>
                                <li><span>0</span> JD</li>
                            </ul>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <ul class="items">
                                <li><?php echo $language["Total (tax excl.)"] ?></li>
                                <li><?php echo $language["Taxes"] ?></li>
                            </ul>
                            <ul class="amount">
                                <li>0 JD</li>
                                <li>0 JD</li>
                            </ul>
                        </li>
                        <li class="list-group-item text-center">
                            <span class="btn theme-btn--dark1 btn--md"><?php echo $language["Proceed to checkout"] ?></span>
                        </li>
                    </ul>
                <?php
                    }
                ?>
                <div class="delivery-info mt-20">
                    <ul>
                        <li>
                            <img src="assets/img/icon/10.png" alt="icon"> <?php echo $language["sp"] ?>
                        </li>
                        <li>
                            <img src="assets/img/icon/11.png" alt="icon"> <?php echo $language["dp"] ?>
                        </li>
                        <li class="mb-0">
                            <img src="assets/img/icon/12.png" alt="icon"> <?php echo $language["rp"] ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- product tab end -->

<?php
include "./includes/footer.php";
?>

<script>
    const zipCodeInput = document.getElementById('zip');
    const countrySelect = document.getElementById('countries');
    const validationResult = document.getElementById('result');

    zipCodeInput.addEventListener('input', function() {
        const selectedCountry = countrySelect.value;
        let zipCodePattern;
        
        if (selectedCountry === 'US') {
            zipCodePattern = /^\d{5}(?:-\d{4})?$/; // US zip code pattern
        } else if (selectedCountry === 'CA') {
            zipCodePattern = /^[ABCEGHJ-NPRSTVXY]\d[A-Z] \d[A-Z]\d$/; // Canadian postal code pattern
        } else if (selectedCountry === 'UK') {
            zipCodePattern = /^[A-Z]{1,2}\d[A-Z\d]? \d[A-Z]{2}$/;; // UK postal code pattern
        } else if (selectedCountry === 'JO') {
            zipCodePattern = /^\d{5}$/; // Jordanian postal code pattern
        }
        
        if (zipCodePattern.test(zipCodeInput.value)) {
            validationResult.textContent = 'Zip code is valid!';
            validationResult.style.color = 'green';
        } else {
            validationResult.textContent = 'Please enter a valid zip code for the selected country.';
            validationResult.style.color = 'red';
        }
    });
</script>

<script>

    const provincesByCountry = {
        "US": [
            { name: "New York", price: 1.50 },
            { name: "California", price: 1.20 },
            { name: "Texas", price: 1.00 }
        ],
        "CA": [
            { name: "Ontario", price: 0.85 },
            { name: "Quebec", price: 1.00 },
            { name: "British Columbia", price: 0.90 }
        ],
        "UK": [
            { name: "London", price: 1.50 },
            { name: "North East", price: 1.35 },
            { name: "North West", price: 1.60 }
        ],
        "JO": [
            { name: "Amman", price: 1.25 },
            { name: "Irbid", price: 1.10 },
            { name: "Zarqa`a", price: 1.00 },
            { name: "Alkarak" , price:0.75}
        ]
    };

    const countryDropdown = document.getElementById("countries");
    const provinceDropdown = document.getElementById("p_d");
    const text_provinces = document.getElementById("text_province");

    function populateProvinces() {
    const selectedCountry = countryDropdown.value;
    const provinces = provincesByCountry[selectedCountry];
    
    provinceDropdown.innerHTML = '<option value="">-- Provinces --</option>';
    
    provinces.forEach((province) => {
        const option = document.createElement("option");
        option.text = `${province.name} - ${province.price}`;
        option.value = province.price;
        provinceDropdown.add(option);
    });
    }   

    function displayName() {
        const selectedProvince = document.getElementById("p_d");
        const price = selectedProvince.value;
        const provinceName = selectedProvince.options[selectedProvince.selectedIndex].text.split(" -")[0];

        document.getElementById("text_province").value = provinceName;
    }
</script>

<script>
    $(document).ready(function(){
        $('#online').change(function(){
            if(this.selected) {
                $('#detils_card').hide("");
            } else {
                $('#detils_card').show("");
            }
        });

        $('#cash_on_delivery').change(function(){
            if(this.selected) {
                $('#detils_card').show("");
            } else {
                $('#detils_card').hide("");
            }
        });
    });
</script>

<script>
    function showDetails() {
        var selectedValue = $('input[name="paymentMethod"]:checked').val();
        var details_1 = $("#details_1");
        var details_2 = $("#details_2");

        if (selectedValue !== "option1") {
            details_1.hide("");
            details_2.show("");
        } else {
            details_1.show("");
            details_2.hide("");
        }
    }
</script>

<script>
    function leadingZeros(input) {
        if(!isNaN(input.value) && input.value.length === 1) {
            input.value = '0' + input.value;
        }
    }
</script>

<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
    var total = $("#amount_total_paypal").val();
    var totals_final = $("#totals_final").val();
    var lang_paypal = $("#lang_paypal").val();

    paypal.Button.render({
       
        env: 'sandbox',

        client: {
            sandbox: "ARNvpmD1-hqfqgPkWvYlDPOjZ0JBJceC1F9aRVv7XeKUjVaqCO-WWrTGSEf41FE-QdNwvSwhJCSzX50q",
            production: ""
        },

        locale: 'en_US',

        style: {
            size: 'small',
            color: 'gold',
            shape: 'pill',
        },

        commit: true,

        payment: function(data, actions) {

            var id_form_personal = $("#id_form_personal").val();
            var id_form_address = $("#id_form_address").val();
            
            if(id_form_personal == 0){

                var message1 = '<?php echo $language['No data personal information in checkout page.'] ?>';
                window.alert(message1);
                return false;

            }else if(id_form_address == 0){

                var message2 = '<?php echo $language['No data address in checkout page.'] ?>';
                window.alert(message2);
                return false;

            }else{

                var count = $("#count_items").val();

                if(count == 0) {

                    var message3 = '<?php echo $language['No items, must be add items.'] ?>';
                    window.alert(message3);
                    return false; 

                } else {

                return actions.payment.create({

                    transactions: [{

                        amount: {
                            total: total,
                            currency: 'USD'
                        },

                        description: 'The payment transaction description.',

                        custom: '90048630024435',

                        payment_options: {
                            allowed_payment_method: 'INSTANT_FUNDING_SOURCE'
                        },

                        soft_descriptor: 'ECHI5786786'

                    }],

                    application_context: {
                        shipping_preference: 'NO_SHIPPING'
                    },

                    note_to_payer: 'Contact us for any questions on your order.'

                });

                }
            }

        },

        onAuthorize: function(data, actions){

            return actions.payment.execute().then(function(){

                var form = $('<form action="paypal_func.php" method="post">' +
                                '<input type="hidden" name="total_amount_final_paypal" value="' + totals_final +'">' +
                                '<input type="hidden" name="langs_paypal" value="' + lang_paypal +'">' +
                             '</form>');
                $('body').append(form);
                form.submit();

            });

        }  
        
    }, '#paypal-button');
    
</script>