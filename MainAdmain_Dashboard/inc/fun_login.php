<?php
if(isset($_POST['login'])){

    if(empty($_POST['username_admin'])){
        $errors['username_admin']="No Username !";
    }else{
        $username_admin = $_POST['username_admin'];
        if(!preg_match('/^.{5,}$/' , $username_admin)){
            $errors['username_admin']="username must be at least 5 characters";
        }
    }

    if(empty($_POST['Password_admin'])){
        $errors['Password_admin']="No Password !";
    }else{
        $Password_admin = $_POST['Password_admin'];
        if(!preg_match('/(?=.*[A-Za-z0-9])(?=.*\d)[A-Za-z\d]{8,}/',$Password_admin)){
            $errors['Password_admin']="must be password strong 8 characters ( numbers & letters )";
        }
    }

    if(!array_filter($errors)){
        $username_admin = mysqli_real_escape_string($conn , $_POST['username_admin']);
        $Password_admin = mysqli_real_escape_string($conn , $_POST['Password_admin']);            

        $sql="SELECT * FROM `admins` WHERE `username_admin`='$username_admin' && `Password_admin`='$Password_admin'";

        $query= mysqli_query($conn , $sql);

        $num_row = mysqli_num_rows($query);

        if($num_row > 0){ 
            $row= mysqli_fetch_assoc($query);
            $ID_Admin = $row['ID_Admin'];
            $username_admin = $row['username_admin'];

            session_start();
            $_SESSION['Valid'] = true;
            $_SESSION['ID_Admin'] = $ID_Admin;

            header("Location:index.php");
        }else{
            $errors['log_Incorrect']="Username | Password Incorrect";
        }
        
    }
}
?>
<!doctype html>
<html lang="en">