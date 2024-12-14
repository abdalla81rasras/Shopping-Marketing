<?php
if(isset($_POST['login'])){

    if(empty($_POST['email_store_info'])){
        $errors['email_store_info']="No Email";
    }else{
        $email_store_info = $_POST['email_store_info'];
        if(!filter_var($email_store_info, FILTER_VALIDATE_EMAIL)){
            $errors['email_store_info'] = 'Email Invalid';
        }
    }

    if(empty($_POST['pass_store_info'])){
        $errors['pass_store_info']="No Password";
    }else{
        $pass_store_info = $_POST['pass_store_info'];
        if(!preg_match('/(?=.*[A-Za-z0-9])(?=.*\d)[A-Za-z\d]{8,}/',$pass_store_info)){
            $errors['pass_store_info']="must be password strong 8 characters (numbers & letters)";
        }
    }

    if(!array_filter($errors)){
        $email_store_info = mysqli_real_escape_string($conn , $_POST['email_store_info']);
        $pass_store_info = mysqli_real_escape_string($conn , $_POST['pass_store_info']);            

        $sql="SELECT * FROM `store_information` WHERE `email_store_info`='$email_store_info' && `pass_store_info`='$pass_store_info'";

        $query= mysqli_query($conn , $sql);

        $num_row = mysqli_num_rows($query);

        if($num_row > 0){ 
            $row= mysqli_fetch_assoc($query);
            $id_store_info = $row['id_store_info'];
            $StoreName_info = $row['StoreName_info'];

            session_start();
            
            $_SESSION['id_store_info'] = $id_store_info;
            $_SESSION['StoreName_info'] = $StoreName_info;

            header("Location:index.php?lang=".$_GET['lang']);
            
        }else{
            $errors['Incorrect']="Email | Password Incorrect";
        }
        
    }
}
?>

<?php include "head_sgin_reg.php"; ?>