<?php
$first_name = $last_name = $user_name = $display_name = $email = $phone_number = $password = $cpassword = $address = "";

$errors=array("first_name"=>"" , "last_name"=>"" , "user_name"=>"" , "display_name"=>"" , "email"=>"" , "phone_number"=>"" , "password"=>"" , "cpassword"=>"" , "address"=>"");

//address billeng
if(isset($_POST['save_edit'])){

    $id_users=$_SESSION['id_users'];

    $first_name = mysqli_real_escape_string($conn_main_admin , $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn_main_admin , $_POST['last_name']);
    $phone_number = mysqli_real_escape_string($conn_main_admin , $_POST['phone_number']);
    $address = mysqli_real_escape_string($conn_main_admin , $_POST['address']);

    $sql="UPDATE `users` SET `first_name`='$first_name' , `last_name`='$last_name' , `phone_number`='$phone_number' , `address`='$address' WHERE `id_users`= '$id_users'";

    if(mysqli_query($conn_main_admin , $sql)){
        ?>
        
            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                <?php echo $language['Billing address has been complemented update'] ?> :) 
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>

        <?php

    }else{
        echo 'query error !' . mysqli_error($conn_main_admin);
    }
}


//acount details
if(isset($_POST['save_Details'])){

    $id_users=$_SESSION['id_users'];

    if(empty($_POST['first_name'])){

       $errors['first_name']="Empty Field";

       ?>
            <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <?php echo $language['Error In Details First Name'] ?> !
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>
        <?php

    }else{
       $first_name = $_POST['first_name'];
    }

    if(empty($_POST['last_name'])){
        
       $errors['last_name']="Empty Field";

       ?>
            <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <?php echo $language['Error In Details Last Name'] ?> !
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>
        <?php

    }else{
       $last_name = $_POST['last_name'];
    }

    if(empty($_POST['display_name'])){

       $errors['display_name']="Empty Field";

       ?>
            <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <?php echo $language['Error In Details Display Name'] ?>  !
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>
        <?php

    }else{
       $display_name = $_POST['display_name'];
    }

    if(empty($_POST['email'])){

       $errors['email']="Empty Field";

       ?>
            <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <?php echo $language['Error In Details Email'] ?> !
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>
        <?php 

    }else{
        
       $email = $_POST['email'];
       if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors['email'] = 'Email Invalid';

            ?>
                <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <?php echo $language['Error In Email'] ?> !
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
            <?php
       }

    }

    if(!array_filter($errors)){
        $first_name = mysqli_real_escape_string($conn_main_admin , $_POST['first_name']);
        $last_name = mysqli_real_escape_string($conn_main_admin , $_POST['last_name']);
        $display_name = mysqli_real_escape_string($conn_main_admin , $_POST['display_name']);
        $email = mysqli_real_escape_string($conn_main_admin , $_POST['email']);

        $sql="UPDATE `users` SET `first_name`='$first_name' ,`last_name`='$last_name' , `display_name`='$display_name' ,`email`='$email' WHERE `id_users`= '$id_users'";

        if(mysqli_query($conn_main_admin , $sql)){
            ?>
                <div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <?php echo $language['Account details has been complemented update'] ?>  :) 
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
            <?php

        }else{
            echo 'query error !' . mysqli_error($conn_main_admin);
        }
    } 
}

if(isset($_POST['save_change'])){

    $id_users=$_SESSION['id_users']; 
    
    if(empty($_POST['password'])){

        $errors['password']="Empty Field";

        ?>
            <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <?php echo $language['Incorrect Password'] ?> !
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>
        <?php

    }else{
        $password = $_POST['password'];
        if(!preg_match('/(?=.*[A-Za-z0-9])(?=.*\d)[A-Za-z\d]{8,}/',$password)){
            $errors['password']="must be password strong 8 characters";

            ?>
                <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <?php echo $language['Incorrect Password'] ?> !
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
            <?php

        }
    }

    if(empty($_POST['cpassword'])){

        $errors['cpassword']="Empty Field";

        ?>
            <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <?php echo $language['Incorrect Confirm Password'] ?> !
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>
        <?php

    }else{

        $cpassword = $_POST['cpassword'];
        if($cpassword != $password){
            $errors['cpassword']="Not Same Password";

            ?>
                <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <?php echo $language['Incorrect Confirm Password'] ?> !
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
            <?php
        }

    }

    if(!array_filter($errors)){
        $password = mysqli_real_escape_string($conn_main_admin , $_POST['password']);
        $cpassword = mysqli_real_escape_string($conn_main_admin , $_POST['cpassword']);

        $check_sql = "SELECT `password` FROM `users` WHERE `password`='$password'";
        $chec_query = mysqli_query($conn_main_admin,$check_sql);
        $check_row = mysqli_fetch_assoc($chec_query);
        $newPass = $check_row['password'] ?? null;

        if($newPass != $password){

            $sql="UPDATE `users` SET `password`='$password' ,`cpassword`='$cpassword' WHERE `id_users`= '$id_users'";

            if(mysqli_query($conn_main_admin , $sql)){
                ?>
                    
                    <script>
                        var message00 = '<?php echo $language['Has been updated Password'] ?>';
                        alert(message00);
                        window.location.href='myaccount.php?lang=<?php echo $lang ?>';
                    </script>

                <?php

            }else{
                echo 'query error !' . mysqli_error($conn_main_admin);
            }     

        }else { 
            $errors['password']="Old password the same new password";
        }
    } 
}
?>