<?php
$token = $_GET['reset_token']??"";

$select_get_token = "SELECT * FROM `pwdreset` WHERE `reset_token` = '$token'";
$query_get_token = mysqli_query($conn, $select_get_token);

$num_rows = mysqli_num_rows($query_get_token);

$result_get_token = mysqli_fetch_array($query_get_token);
$email_token = $result_get_token['reset_email'] ?? null;


if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $token_post = mysqli_real_escape_string($conn , $_POST['token']);

    $email = mysqli_real_escape_string($conn , $_POST['email']);

    if(empty($_POST['pass_store_info'])){
        $errors['pass_store_info']="No Password";
    }else{
        $pass_store_info = $_POST['pass_store_info'];
        if(!preg_match('/(?=.*[A-Za-z0-9])(?=.*\d)[A-Za-z\d]{8,}/',$pass_store_info)){
            $errors['pass_store_info']="must be password strong 8 characters";
        }
    }
  
     if(empty($_POST['cpss_store_info'])){
        $errors['cpss_store_info']="No Confirm Password";
    }else{
        $cpss_store_info = $_POST['cpss_store_info'];
        if($cpss_store_info != $pass_store_info){
            $errors['cpss_store_info']="Not Same Password";
        }
    }
    
    if(!array_filter($errors)){

        $pass_store_info = mysqli_real_escape_string($conn , $_POST['pass_store_info']);
        $cpss_store_info = mysqli_real_escape_string($conn , $_POST['cpss_store_info']);

        $query_update = "UPDATE `store_information` SET `pass_store_info` = '$pass_store_info' , `cpss_store_info` = '$cpss_store_info' WHERE `email_store_info` IN (SELECT `reset_email` FROM `pwdreset` WHERE `reset_token` = '$token_post' OR `reset_email`='$email')";
        if(mysqli_query($conn, $query_update)){

        }else{
            echo "Error Query" . mysqli_error($conn);
        } 

        $query_delete = "DELETE FROM `pwdreset` WHERE `reset_token` = '$token_post'";
        if(mysqli_query($conn, $query_delete)){

        }else{
            echo "Error Query" . mysqli_error($conn);
        }       
        
        header("Location:page_update_mail.php?lang=".$lang);
        exit;
        
    }
            
}

?>