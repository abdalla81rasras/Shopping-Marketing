<?php
include "connection_1.php";

$email = "";
$errors=array("email"=>"");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require "PHPmiler/vendor/phpmailer/phpmailer/src/PHPMailer.php";
require "PHPmiler/vendor/phpmailer/phpmailer/src/SMTP.php";
require "PHPmiler/vendor/phpmailer/phpmailer/src/Exception.php";

require 'PHPmiler/vendor/autoload.php';

$mail = new PHPMailer(true);

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    if(empty($_POST['email'])){
        $errors['email']="Empty Email";
    }else{
        $email = $_POST['email'];
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors['email'] = 'Email Invalid';
        }
    }
    
    $token = bin2hex(random_bytes(32));

    if(!array_filter($errors)){

        $email = mysqli_real_escape_string($conn_main_admin , $_POST['email']);

        $sql_check_email = "SELECT * FROM `users` WHERE `email` = '$email'";

        $query_check_email = mysqli_query($conn_main_admin,$sql_check_email);

        if(mysqli_num_rows($query_check_email) > 0){
    
            $result_check_email = mysqli_fetch_assoc($query_check_email);
            $email_check = $result_check_email['email'];

            $select_pwd = "INSERT INTO `pwdRest`(`email_reset`, `token_reset`) VALUES('$email_check', '$token')";
    
            if(mysqli_query($conn_main_admin , $select_pwd)){
            
                $reset_link = "http:localhost/server/proj_back_api/Task%2030/zonan/reset_password.php?lang=$lang&reset_tokens=$token";
                
                $mail->isSMTP();
                $mail->Host = 'smtp.mail.yahoo.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'abdalla_rasras@yahoo.com';
                $mail->Password = 'dbrcxkflbkzpigex';
                $mail->SMTPSecure = 'ssl';
                $mail->Port = 465;
                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );

                $mail->setFrom('abdalla_rasras@yahoo.com',' Abdalla Omar ');
                $mail->addAddress($email);
                $mail->XMailer = 'PHP/' . PHP_VERSION;
            
                $mail->isHTML(true);
                $mail->Subject = 'Password Reset Verification Code';
                $mail->Body = "Your verification link is:  $reset_link";
            
                if ($mail->send()) {

                    ?>
                        <script>
                            window.location.href='page_mail_secuss.php?lang=<?php echo $lang ?>';
                            exit;
                        </script>
                    <?php

                } else {

                    ?>
                        <script>
                            var message = '<?php echo $language['Email could not be sent'] ?>';
                            alert(message);
                        </script>
                   <?php

                }

            }else{

                echo 'query error !' . mysqli_error($conn_main_admin);

            }

        }else{

            ?>
                <script>
                    window.location.href='page_not_mail.php?lang=<?php echo $lang ?>';
                    exit;
                </script>
            <?php
            
        }

    }
        
}

?>