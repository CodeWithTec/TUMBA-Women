<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// require 'vendor/autoload.php'; // If using Composer
// OR if using manual PHPMailer download:
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
require '../PHPMailer/src/Exception.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = htmlspecialchars($_POST['name']);
    $email   = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    $mail = new PHPMailer(true);

    try {
        // SMTP settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'tumbawomencooperative@gmail.com'; // Your Gmail
        $mail->Password   = 'kaer njwt mcoh dmoq';   // Gmail App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Sender and recipient
        $mail->setFrom('yourgmail@gmail.com', 'Website Contact Form');
        $mail->addAddress('tumbawomencooperative@gmail.com'); // Recipient email

        // Attach all uploaded files
       if (isset($_FILES['attachment']) && $_FILES['attachment']['error'] == 0) {
    $mail->addAttachment($_FILES['attachment']['tmp_name'], $_FILES['attachment']['name']);
} else {
    echo "⚠️ File not uploaded. Error code: " . $_FILES['attachment']['error'];
}


        // Email content
        $mail->isHTML(true);
        $mail->Subject = "New Contact Form Submission";
        $mail->Body    = "
            <h3>New Message from <br>$name</h3>
            <h3>Subject of the Mail:<br>$subject</h3>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Message:</strong><br>$message</p>
        ";

        // Send email
        $mail->send();
        // Reirect after success 
        header("Location: ../successfully.html");
    } catch (Exception $e) {
        echo "Message could not be sent. Error: {$mail->ErrorInfo}";
    }
}

?>
