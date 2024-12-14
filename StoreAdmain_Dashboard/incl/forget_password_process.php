<?php
include "connection.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require "PHPMilar/vendor/phpmailer/phpmailer/src/PHPMailer.php";
require "PHPMilar/vendor/phpmailer/phpmailer/src/SMTP.php";
require "PHPMilar/vendor/phpmailer/phpmailer/src/Exception.php";

require 'PHPMilar/vendor/autoload.php';

$mail = new PHPMailer(true);

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    if(empty($_POST['email_store_info'])){
        $errors['email_store_info']="Empty Email";
    }else{
        $email_store_info = $_POST['email_store_info'];
        if(!filter_var($email_store_info, FILTER_VALIDATE_EMAIL)){
            $errors['email_store_info'] = 'Email Invalid';
        }
    }
    
    $token = bin2hex(random_bytes(32));

    if(!array_filter($errors)){

        $email_store_info = mysqli_real_escape_string($conn , $_POST['email_store_info']);

        $sql_check_email = "SELECT * FROM `store_information` WHERE `email_store_info` = '$email_store_info'";

        $query_check_email = mysqli_query($conn,$sql_check_email);

        if(mysqli_num_rows($query_check_email) > 0){
        
            $result_check_email = mysqli_fetch_assoc($query_check_email);
            $email_check = $result_check_email['email_store_info'];

            $select_pwd = "INSERT INTO `pwdreset`(`reset_email`, `reset_token`) VALUES('$email_check', '$token')";
    
            if(mysqli_query($conn , $select_pwd)){
                
                $reset_link = "http://localhost/server/proj_back_api/Task%2030/zonan/StoreAdmain_Dashboard/reset_password.php?lang=$lang&&reset_token=$token";
                
                $mail->SMTPDebug = 2;
                $mail->isSMTP();
                $mail->Host= 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'abodfigo81@gmail.com';
                $mail->Password = 'exojvhzghlmfyoai';
                $mail->SMTPSecure = 'ssl';
                $mail->Port = 465;
                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );

                $mail->setFrom('abodfigo81@gmail.com',' Abood Omar ');
                $mail->addAddress($email_check);
                $mail->XMailer = 'PHP/' . PHP_VERSION;
            
                $mail->isHTML(true);
                $mail->Subject = 'Password Reset Verification Code';
                $mail->Body = "Your verification link is: $reset_link";
            
                if ($mail->send()) {

                    header("Location:page_secuss_mail.php?lang=".$lang);
                    exit;

                } else {

                    header("Location:page_failed_mail.php?lang=".$lang);
                    exit;

                }

            }else{

                echo 'query error !' . mysqli_error($conn);

            }

        }else{

            header("Location:page_not_email.php?lang=".$lang);
            exit;
            
        }

    }
        
}

?>
