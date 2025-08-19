<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// require 'vendor/autoload.php'; // If using Composer
// OR if using manual PHPMailer download:
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
require '../PHPMailer/src/Exception.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $subscribers    = htmlspecialchars($_POST['subscribe']);
   

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


        // Email content
        $mail->isHTML(true);
        $mail->Subject = "Subscriber Form";
        $mail->Body    = "
           
            <div style='font-family: Arial, sans-serif; color: #333;'>
        <h2 style='background: #4CAF50; color: #fff; padding: 10px;'>
            📩 New Subscribers Form Submission
        </h2>
        <table border='1' cellpadding='8' cellspacing='0' width='100%' style='border-collapse: collapse;'>
            <tr>
                <td style='background:#f9f9f9; font-weight:bold;'>Subscriber</td>
                <td>$subscribers</td>
            </tr>
        </table>
        <p style='margin-top:20px; font-size:12px; color:#777;'>
            This message was sent from your website Subscribers form.
        </p>
    </div>
";
        // Send email
        $mail->send();
        // Reirect after success 
        header("Location: ../subscriber.html");
    } catch (Exception $e) {
        echo "Message could not be sent. Error: {$mail->ErrorInfo}";
    }
}

?>
