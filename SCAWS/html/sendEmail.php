<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $firstName = htmlspecialchars($_POST['first_name']);
    $lastName = htmlspecialchars($_POST['last_name']);
    $email = htmlspecialchars($_POST['email']);
    $telephone = htmlspecialchars($_POST['telephone']);
    $city = htmlspecialchars($_POST['city']);
    $service = htmlspecialchars($_POST['service']);

   
    $subject = "New Service Inquiry from Contact Form";
    $body = "You have received a new message from your contact form.\n\n".
            "Name: $firstName $lastName\n".
            "Email: $email\n".
            "Telephone: $telephone\n".
            "City: $city\n".
            "Service: $service";

    try {
        // Initialize PHPMailer
        $mail = new PHPMailer(true);
        
        // SMTP settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Change this if using another email provider
        $mail->SMTPAuth = true;
        $mail->Username = 'kongwiepercy9@gmail.com'; // Replace with your email address
        $mail->Password = 'qbgz txyr czip spnz';   // Replace with your App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        $mail->setFrom($email, "$firstName $lastName");
        $mail->addAddress('kongwiepercy9@gmail.com'); // Replace with your destination email

        // Email content
        $mail->isHTML(false);
        $mail->Subject = $subject;
        $mail->Body    = $body;

        // Send email
        $mail->send();
        echo "Your message has been sent successfully.";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
