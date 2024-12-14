<?php
$first_name = $last_name = $user_name = $display_name = $email = $phone_number = $address = $total_cash_delivery =
$first_name_drop_user = $last_name_drop_user = $user_name_drop_user = $phone_number_drop_user = $email_drop_user = $address_drop_user = 
$company_customer = $address_complement_customer = $countries_customer = $postcode_customer = $city_customer = $provinces_customer = $areaname_customer = $streetname_customer = $buildingnumber_customer = $check_out_customer = $p_d_customer = $provinces = $card_number_customer = $card_name_customer = $expiry_date_month_customer = $expiry_date_year_customer = $card_security_code_customer = $promo_code_customer = $discount_promo_customer = "";

$errors=array("first_name"=>"" , "last_name"=>"" , "user_name"=>"" , "display_name"=>"" , "email"=>"" , "phone_number"=>"", "address"=>"" , "Incorrect"=>"");

include "incFun.php";

$error = "";

if(!empty($_SESSION['id_users'])){    

    $id_users=$_SESSION['id_users'];

    $sql_drop_user = "SELECT * FROM `users` WHERE `id_users`='$id_users'";
    $query_drop_user = mysqli_query($conn_main_admin , $sql_drop_user);
    
    while($row_drop_user=mysqli_fetch_array($query_drop_user)){

        $first_name_drop_user = $row_drop_user['first_name'];
        $last_name_drop_user = $row_drop_user['last_name'];
        $user_name_drop_user = $row_drop_user['user_name'];
        $phone_number_drop_user = $row_drop_user['phone_number'];
        $email_drop_user = $row_drop_user['email'];
        $address_drop_user = $row_drop_user['address'];

    }
    
    if(isset($_POST['personal_info'])){

        $id_users=$_SESSION['id_users'];
        $first_name = mysqli_real_escape_string($conn_main_admin , $_POST['first_name']);
        $last_name = mysqli_real_escape_string($conn_main_admin , $_POST['last_name']);
        $user_name = mysqli_real_escape_string($conn_main_admin , $_POST['username']);
        $email = mysqli_real_escape_string($conn_main_admin , $_POST['email']);
        $phone_number = mysqli_real_escape_string($conn_main_admin , $_POST['phone_number']);
        $address = mysqli_real_escape_string($conn_main_admin , $_POST['address']);

        $sql_per_check = "SELECT * FROM `customers` WHERE `id_user`='$id_users'";
        $query_per_check = mysqli_query($conn_main_admin , $sql_per_check);

        if(mysqli_num_rows($query_per_check) > 0){
          
           ?>
                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    <?php echo $language['Exist Data on system, And data in the fields and cannot be modified'] ?> !!
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
            <?php
                        
        } else {

            $sql = "INSERT INTO `customers`(`id_user`,`id_form_personal`,`first_name`,`last_name`,`user_name`,`phone_number`,`email`,`address`) 
                                VALUES('$id_users', 1 ,'$first_name','$last_name','$user_name','$phone_number','$email','$address')";

            if(mysqli_query($conn_main_admin , $sql)){

                ?>
                    <script>
                        var message1 = '<?php echo $language['Data has been filled in personal information, go to Address'] ?>';
                        alert(message1);
                        window.location.href='checkout.php?lang=<?php echo $lang ?>';
                    </script>
                <?php

            }else{
                echo "Error query!" . mysqli_connect_error($conn_main_admin);
            }
        }
    }

    if(isset($_POST['Address_continue'])){

        $id_users=$_SESSION['id_users'];
        $company = mysqli_real_escape_string($conn_main_admin , $_POST['company']);
        $address_complement = mysqli_real_escape_string($conn_main_admin , $_POST['address_complement']);
        $countries = mysqli_real_escape_string($conn_main_admin , $_POST['countries']);
        $postcode = mysqli_real_escape_string($conn_main_admin , $_POST['postcode']);
        $city = mysqli_real_escape_string($conn_main_admin , $_POST['city']);
        $provinces = mysqli_real_escape_string($conn_main_admin , $_POST['provinces']);
        $p_d = mysqli_real_escape_string($conn_main_admin , $_POST['p_d']);
        $areaname = mysqli_real_escape_string($conn_main_admin , $_POST['areaname']);
        $streetname = mysqli_real_escape_string($conn_main_admin , $_POST['streetname']);
        $buildingnumber = mysqli_real_escape_string($conn_main_admin , $_POST['buildingnumber']);
        $check_out = mysqli_real_escape_string($conn_main_admin , $_POST['check_out']);

        $sql_per_check = "SELECT * FROM `customers` WHERE `id_user`='$id_users'";
        $query_per_check = mysqli_query($conn_main_admin , $sql_per_check);

        $fetch_per_check = mysqli_fetch_assoc($query_per_check);
        $id_form_personal = $fetch_per_check['id_form_personal'] ?? null;

        if($id_form_personal == 1){
          
            $sql_update = "UPDATE `customers` SET `id_form_address`=1 , `company`='$company' , `address_complement`='$address_complement' , `countries`='$countries' , `zip/postal_code`='$postcode' , `city`='$city' ,`provinces`='$provinces', `Province With_Price_For_Delivery`='$p_d' , `area_name`='$areaname' , `street_name`='$streetname' , `buliding_number`='$buildingnumber' , `check_out`='$check_out' WHERE `id_user`='$id_users'";
            
            if(mysqli_query($conn_main_admin,$sql_update)){

                ?>
                    <div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <?php echo $language['Data has been Added , or has been updated successfully, go to shipping method'] ?> !!
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>
                <?php

            }else{

                echo "Error query!" . mysqli_connect_error($conn_main_admin);

            }
                        
        } else {

            ?>
                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    <?php echo $language['Must be add data or click next in personal information before enter addresses data'] ?> !!
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
            <?php
        }
    }

    if(isset($_POST['shipping_method'])){

        $id_users = $_SESSION['id_users'];
        $payment_methods =  $_POST['payment_methods'] ?? null;
        $id_order_cash = random_int(100,500);

        if($payment_methods === "cash on delivery"){
            
            $sql_payment_methods = "SELECT * FROM `customers` WHERE `id_user`='$id_users'";
            $query_payment_methods = mysqli_query($conn_main_admin , $sql_payment_methods);

            $fetch_payment_methods = mysqli_fetch_assoc($query_payment_methods);
            $id_form_personal = $fetch_payment_methods['id_form_personal'] ?? null;
            $id_form_address = $fetch_payment_methods['id_form_address'] ?? null;

            if(($id_form_address == 1) && ($id_form_personal == 1)){

                $sql_update_query_payment_methods = "UPDATE `customers` SET `id_form_shipping`=1 , `cash_delivery`='$payment_methods' , `id_order_cash`='$id_order_cash' , `card_number`='' , `name_card`='' , `expiry_date_month`='' , `expiry_date_year`='' , `card_security_code`='' , `promo_code`='' WHERE `id_user`='$id_users'";
                
                if(mysqli_query($conn_main_admin,$sql_update_query_payment_methods)){
                    
                    ?>
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <?php echo $language['Data has been Added , or has been updated successfully, go to payment'] ?> !!
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>
                    <?php

                }else{

                    echo "Error query!" . mysqli_connect_error($conn_main_admin);

                }
                            
            } else {

                ?>
                    <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                        <?php echo $language['Must be add data personal information and adresses before selceted cash on delivery'] ?> !!
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>
                <?php
            }

        }elseif($payment_methods === 'online') {

            if(empty($_POST['Card_Number'])){
                $errors['Card_Number']="Empty Field";
            }else{
                $Card_Number = $_POST['Card_Number'];
                if(!preg_match('/^4[0-9]{6,}$/', $Card_Number)){
                    //visa
                }elseif(!preg_match('/^5[1-5][0-9]{5,}|222[1-9][0-9]{3,}|22[3-9][0-9]{4,}|2[3-6][0-9]{5,}|27[01][0-9]{4,}|2720[0-9]{3,}$/', $Card_Number)){
                    //master card
                }elseif(!preg_match('/^3[47][0-9]{5,}$/', $Card_Number)){
                    //american express
                }elseif(!preg_match('/^3(?:0[0-5]|[68][0-9])[0-9]{4,}$/', $Card_Number)){
                    //diners club
                }elseif(!preg_match('/^6(?:011|5[0-9]{2})[0-9]{3,}$/', $Card_Number)){
                   //discovrer
                }elseif(!preg_match('/^(?:2131|1800|35[0-9]{3})[0-9]{3,}$/', $Card_Number)){
                    //jbc
                }else{
                    $errors['Card_Number'] = 'Card Number Incorrect'; 
                }
            }

            if(empty($_POST['namecard'])){
                $errors['namecard']="Empty Field";
            }else{
                $namecard = $_POST['namecard'];
                if(!preg_match("/^[\p{L}\s.'-]+$/u", $namecard)){
                    $errors['namecard'] = 'Card name Invalid';
                }
            }

            if(empty($_POST['month_expiry'])){
                $errors['month_expiry']="Empty Field";
            }else{
                $month_expiry = $_POST['month_expiry'];
                if(!preg_match('/\b(0[1-9]|1[0-2])\b/', $month_expiry)){
                    $errors['month_expiry'] = 'Card expiry month Invalid';
                }
            }
        
            if(empty($_POST['year_expiry'])){
                $errors['year_expiry']="Empty Field";
            }else{
                $year_expiry = $_POST['year_expiry'];
                if(!preg_match('/\b\d{2}\b/', $year_expiry)){
                    $errors['year_expiry'] = 'Card expiry year Invalid';
                }
            }

            if(empty($_POST['security'])){
                $errors['security']="Empty Field";
            }else{
                $security = $_POST['security'];
                if(!preg_match('/^[0-9]{3,4}$/', $security)){
                    $errors['security'] = 'Card Security Invalid';
                }
            }

            if(empty($_POST['Card_Number']) || empty($_POST['namecard']) || empty($_POST['month_expiry']) || empty($_POST['year_expiry']) || empty($_POST['security'])){
                
                ?>
                    <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <?php echo $language['Error in shipping method'] ?> !
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>
                <?php

            }

            if(!array_filter($errors)){

                $Card_Number = mysqli_real_escape_string($conn_main_admin , $_POST['Card_Number']);
                $namecard = mysqli_real_escape_string($conn_main_admin , $_POST['namecard']);
                $month_expiry = mysqli_real_escape_string($conn_main_admin , $_POST['month_expiry']);
                $year_expiry = mysqli_real_escape_string($conn_main_admin , $_POST['year_expiry']);
                $security = mysqli_real_escape_string($conn_main_admin , $_POST['security']);
                $promo_code = mysqli_real_escape_string($conn_main_admin , $_POST['promo_code']);

                $sql_per_checks = "SELECT * FROM `customers` WHERE `id_user`='$id_users'";
                $query_per_checks = mysqli_query($conn_main_admin , $sql_per_checks);

                $fetch_per_checks = mysqli_fetch_assoc($query_per_checks);
                $id_form_personal = $fetch_per_checks['id_form_personal'] ?? null;
                $id_form_address = $fetch_per_checks['id_form_address'] ?? null;

                if(($id_form_address == 1) && ($id_form_personal == 1)){

                    $sql_update = "UPDATE `customers` SET `id_form_shipping`=1 , `cash_delivery`='$payment_methods' , `card_number`='$Card_Number' , `name_card`='$namecard' , `expiry_date_month`='$month_expiry' , `expiry_date_year`='$year_expiry' , `card_security_code`='$security' , `promo_code`='$promo_code' , `id_order_cash`='$id_order_cash' WHERE `id_user`='$id_users'";
                    
                    if(mysqli_query($conn_main_admin,$sql_update)){

                        ?>
                            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                <?php echo $language['Data has been Added , or has been updated successfully, go to payment'] ?> !!
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                            </div>
                        <?php

                    }else{

                        echo "Error query!" . mysqli_error($conn_main_admin);

                    }
                                
                } else {

                    ?>
                        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                            <?php echo $language['Must be add data personal information and adresses before enter sihpping method data'] ?> !!
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>
                    <?php
                }

            }
        }else{

           ?>
                <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <?php echo $language['Must be select shipping method'] ?> !! 
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
            <?php

        } 
    }

    if(isset($_POST['confirm_online'])){

        $agree = mysqli_real_escape_string($conn_main_admin , $_POST['agree']);

        $sql_confirm_online = "SELECT * FROM `customers` WHERE `id_user`='$id_users'";
        $query_confirm_online = mysqli_query($conn_main_admin , $sql_confirm_online);

        $fetch_confirm_online = mysqli_fetch_assoc($query_confirm_online);
        $id_form_personal = $fetch_confirm_online['id_form_personal'] ?? null;
        $id_form_address = $fetch_confirm_online['id_form_address'] ?? null;
        $id_form_shipping = $fetch_confirm_online['id_form_shipping'] ?? null;

        if(($id_form_shipping == 1) && ($id_form_address == 1) && ($id_form_personal == 1)){

            $sql_update_confirm = "UPDATE `customers` SET `id_form_payment`=1 , `agree`='$agree' WHERE `id_user`='$id_users'";
            
            if(mysqli_query($conn_main_admin,$sql_update_confirm)){

                ?>
                    <div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <?php echo $language['Data has been Added , or has been updated successfully'] ?>.
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>
                <?php
                
            }else{
                echo "Error query!" . mysqli_connect_error($conn_main_admin);
            }
                        
        } else {

            ?>
                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    <?php echo $language['Must be add data or click confirm in payment before enter shipping method data'] ?> !!
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
            <?php
        }

    }

    $sql_drop_customer = "SELECT * FROM `customers` WHERE `id_user`='$id_users'";
    $query_drop_customer = mysqli_query($conn_main_admin , $sql_drop_customer);
    
    while($row_drop_customer=mysqli_fetch_array($query_drop_customer)){

        $company_customer = $row_drop_customer['company'];
        $address_complement_customer = $row_drop_customer['address_complement'];
        $countries_customer = $row_drop_customer['countries'];
        $postcode_customer = $row_drop_customer['zip/postal_code'];
        $city_customer = $row_drop_customer['city'];
        $areaname_customer = $row_drop_customer['area_name'];
        $streetname_customer = $row_drop_customer['street_name'];
        $buildingnumber_customer = $row_drop_customer['buliding_number'];
        $check_out_customer = $row_drop_customer['check_out'];
        $p_d_customer = $row_drop_customer['Province With_Price_For_Delivery'];
        $provinces_customer = $row_drop_customer['provinces'];
        $card_number_customer = $row_drop_customer['card_number'];
        $card_name_customer = $row_drop_customer['name_card'];
        $expiry_date_month_customer = $row_drop_customer['expiry_date_month'];
        $expiry_date_year_customer = $row_drop_customer['expiry_date_year'];
        $card_security_code_customer = $row_drop_customer['card_security_code'];
        $promo_code_customer = $row_drop_customer['promo_code'];
        $id_order_cash_customer = $row_drop_customer['id_order_cash'];

    }
}

?>