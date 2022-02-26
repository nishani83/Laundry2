


<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Start the session
session_start();

require '../../vendor/autoload.php';
try {
    $otp = rand(1000, 9999);
    $_SESSION['session_otp'] = $otp;

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = '587';
    $mail->isHTML();
    $mail->Username = 'helpdesk.canrenwash@gmail.com';
    $mail->Password = 'passwordchanged';
    $mail->SetFrom('helpdesk.canrenwash@gmail.com', 'CanrenWash');
    $mail->Subject = "Canren Wash OTP for Signup";
    $mail->Body = nl2br("Dear Sir/ Madam, \n Please use the following OTP " . $otp . " to complete your signup.Do NOT share this number with anyone.");
    // $to = 'nishani.dilu@gmail.com';
    $to = $_POST['email'];
    echo $to;
    $mail->AddAddress($to);

    $result = $mail->Send();
    if ($result) {
        header("Location:register_2.php");
        exit();
    } else {
        echo "Sent Failed - Error : ";
    }
} catch (Exception $e) {
    echo $mail->ErrorInfo;
}
?>