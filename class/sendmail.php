<?php
    session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';


if(isset($_POST['sendemail'])){
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $body = $_POST['body'];
    $email = $_POST['email'];
}

$mail = new PHPMailer(true);

try {

    //Server settings
    $mail->SMTPDebug = 2;                       //Enable verbose debug output SMTP::DEBUG_SERVER
    $mail->isSMTP();                            //Send using SMTP
    $mail->Host       = 'smtp.gfg.com;';        //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                   //Enable SMTP authentication
    $mail->Username   = $_ENV['MAIL_USER'];     //SMTP username
    $mail->Password   = $_ENV['MAIL_PASS'];     //SMTP password
    $mail->SMTPSecure = 'tls';                  //Enable implicit TLS encryption
    $mail->Port       = 587;                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`


   //Recipients
   $mail->setFrom($_ENV['MAIL_USER'], 'Nurudeen Mailer');
   $mail->addAddress('olaitansalaam@outlook.com', 'Nurdudeen User');     //Add a recipient
//    $mail->addAddress('ellen@example.com');               //Name is optional
   $mail->addReplyTo($email, 'Feedback/Response');
   $mail->addCC('cc@example.com');
   $mail->addBCC('bcc@example.com');
	
    //Attachments
    $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = '$subject';
    $mail->Body    = 'From: ' .$name .'<br>' .$body;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

	$mail->send();
	echo "Mail has been sent successfully!";
} catch (Exception $e) {
	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <?php require_once('layout.php') ?>
</head>
<body>
    <?php include('include/navbar.php') ?>
    <div class="container my-5">
        <form method="post" action="operator.php" class="mt-auto me-auto ms-auto w-50">
            <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="mb-3">
                <label class="form-label">Subject</label>
                <input type="text" class="form-control" name="subject">
            </div>
            <div class="mb-3">
                <label class="form-label">Body</label>
                <input type="text" class="form-control" name="body">
            </div>
            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" class="form-control" name="email">
            </div>

            <button class="btn btn-primary" name="sendmail">Submit</button>
            <p>Already have an account? <a href="login.php">Login</a>
            <p>Don't have an account? <a href="register.php">Register</a>
        </form>
    </div>
</body>
</html>