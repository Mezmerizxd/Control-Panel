<?php
// Classes & Namespaces
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception;

// Included Php Files
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Validate Users Inputs (Makes Sql Query Safer)
function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
 }

// Email Sender
function EmailAuthorizationCode($receiver_email, $receiver_code)
{   
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();                                  
        $mail->Host = "smtp.gmail.com"; 
        $mail->SMTPAuth = true;                             
        $mail->Username = "sender@gmail.com";
        $mail->Password = "sender-password";
        $mail->SMTPSecure = "tls";  
        $mail->Port = 587;    
    
        $mail->setFrom("sender@gmail.com", "sender-name");
        $mail->addAddress($receiver_email, "");  
    
        $mail->Subject = "Control-Panel Authorization Code";
        $mail->Body    = "Code: $receiver_code";
    
        $mail->send();
        echo "Message has been sent";
    } catch (Exception $e) { 
        echo "Message could not be sent. Mailer Error: ", $mail->ErrorInfo;
    }
}
?>
