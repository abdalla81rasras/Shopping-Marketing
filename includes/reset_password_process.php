<?php
include "connection_1.php";

$email = $password = $cpassword = "";
$errors=array("email"=>"" , "password"=>"" , "cpassword"=>"");

$token = $_GET['reset_tokens']??"";

$select_get_token = "SELECT * FROM `pwdRest` WHERE `token_reset` = '$token'";
$query_get_token = mysqli_query($conn_main_admin, $select_get_token);

$num_rows = mysqli_num_rows($query_get_token);

$result_get_token = mysqli_fetch_array($query_get_token);
$email_token = $result_get_token['email_reset'] ?? null;


if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $token_post = mysqli_real_escape_string($conn_main_admin , $_POST['token']);

    $email = mysqli_real_escape_string($conn_main_admin , $_POST['email']);

    if(empty($_POST['password'])){
        $errors['password']="No Password";
    }else{
        $password = $_POST['password'];
        if(!preg_match('/(?=.*[A-Za-z0-9])(?=.*\d)[A-Za-z\d]{8,}/',$password)){
            $errors['password']="must be password strong 8 characters";
        }
    }
  
     if(empty($_POST['cpassword'])){
        $errors['cpassword']="No Confirm Password";
    }else{
        $cpassword = $_POST['cpassword'];
        if($cpassword != $password){
            $errors['cpassword']="Not Same Password";
        }
    }
    
    if(!array_filter($errors)){

        $password = mysqli_real_escape_string($conn_main_admin , $_POST['password']);
        $cpassword = mysqli_real_escape_string($conn_main_admin , $_POST['cpassword']);

        $query_update = "UPDATE `users` SET `password` = '$password' , `cpassword` = '$cpassword' WHERE `email` IN (SELECT `email_reset` FROM `pwdRest` WHERE `token_reset` = '$token_post' OR `email_reset`='$email')";
        if(mysqli_query($conn_main_admin, $query_update)){

        }else{
            echo "Error Query !" . mysqli_error($conn_main_admin);
        } 

        $query_delete = "DELETE FROM `pwdRest` WHERE `token_reset` = '$token_post'";
        if(mysqli_query($conn_main_admin, $query_delete)){

        }else{
            echo "Error Query !" . mysqli_error($conn_main_admin);
        }       
        
        ?>
            <script> window.location.href='page_update_mail.php?lang=<?php echo $lang ?>'; </script>
        <?php
    }
            
}

?>