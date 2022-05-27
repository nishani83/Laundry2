


<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

// Start the session
session_start();

require '../../vendor/autoload.php';
try {
    $otp = rand(1000, 9999);
    $_SESSION['session_otp '] = $otp;
    $_SESSION['email'] = $_POST['email'];
    $to = $_POST['email'];
    $mail = new PHPMailer();
    $mail->IsSMTP();
    echo $otp;
    $mail->SMTPDebug = 0;
    $mail->SMTPAuth = TRUE;
    $mail->SMTPSecure = "tls";
    $mail->Port = 587;
    // $mail->Host       = "smtp.gmail.com";
    $mail->Host = "smtp.mail.yahoo.com";
    $mail->Username = "helpdesk.canrenwash@yahoo.com";

    $mail->Password = "euxiibijzdjqmibo";

    $mail->IsHTML(true);
    $mail->AddAddress($to, "recipient-name");
    $mail->SetFrom("helpdesk.canrenwash@yahoo.com", "Canren Wash");
    //$mail->AddReplyTo("reply-to-email", "reply-to-name");
    //$mail->AddCC("cc-recipient-email", "cc-recipient-name");
    $mail->Subject = "Canren Wash OTP for Signup";
    $content = nl2br("Dear Sir/ Madam, \n Please use the following OTP " . $otp . " to complete your signup.Do NOT share this number with anyone.");

    $mail->MsgHTML($content);
    if (!$mail->Send()) {
        echo "Sent Failed - Error : ";
        //var_dump($mail);
        return false;
    } else {
        // $status = "success";
        header("Location:register_2.php");
        exit();
        return true;
    }
} catch (Exception $e) {
    echo $mail->ErrorInfo;
}
?>