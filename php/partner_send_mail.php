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
    $contactPerson = htmlspecialchars($_POST['contactPerson']);
    $website = htmlspecialchars($_POST['website']);
    $email   = htmlspecialchars($_POST['email']);
    $location   = htmlspecialchars($_POST['location']);
    $phone   = htmlspecialchars($_POST['phone']);
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
        $fileInfo = "No file uploaded";
       if (isset($_FILES['attachment']) && $_FILES['attachment']['error'] == 0) {
    $mail->addAttachment($_FILES['attachment']['tmp_name'], $_FILES['attachment']['name']);

     // File details
    $filename = $_FILES['attachment']['name'];
    $filesize = round($_FILES['attachment']['size'] / 1024, 2) . " KB";
    $filetype = $_FILES['attachment']['type'];

    $fileInfo = "
        <strong>File Name:</strong> $filename<br>
        <strong>File Size:</strong> $filesize<br>
        <strong>File Type:</strong> $filetype
    ";
} else {
    echo "⚠️ File not uploaded. Error code: " . $_FILES['attachment']['error'];
}

  // ✅ Capture dropdown selection
    $interest = isset($_POST['partnershipType']) ? $_POST['partnershipType'] : 'Not Selected';

        // Email content
        $mail->isHTML(true);
        $mail->Subject = "Partmership Form";
        $mail->Body    = "
           
            <div style='font-family: Arial, sans-serif; color: #333;'>
        <h2 style='background: #4CAF50; color: #fff; padding: 10px;'>
            📩 New Partmership Form Submission
        </h2>
        <table border='1' cellpadding='8' cellspacing='0' width='100%' style='border-collapse: collapse;'>
            <tr>
                <td style='background:#f9f9f9; font-weight:bold;'>Full Name</td>
                <td>$name</td>
            </tr>
             <tr>
                <td style='background:#f9f9f9; font-weight:bold;'>Contact Person</td>
                <td>$contactPerson</td>
            </tr>
            <tr>
                <td style='background:#f9f9f9; font-weight:bold;'>Email</td>
                <td>$email</td>
            </tr>
            <tr>
                <td style='background:#f9f9f9; font-weight:bold;'>Phone</td>
                <td>$phone</td>
            </tr>
            <tr>
                <td style='background:#f9f9f9; font-weight:bold;'>Address</td>
                <td>$location</td>
            </tr>
            <tr>
                <td style='background:#f9f9f9; font-weight:bold;'>Website</td>
                <td>$website</td>
            </tr>
            <tr>
                <td style='background:#f9f9f9; font-weight:bold;'>Message</td>
                <td>$message</td>
            </tr>
            <tr>
                <td style='background:#f9f9f9; font-weight:bold;'>Attachment</td>
                <td>$fileInfo</td>
            </tr>
        </table>
        <p style='margin-top:20px; font-size:12px; color:#777;'>
            This message was sent from your website contact form.
        </p>
    </div>
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
