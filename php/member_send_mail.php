<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// require 'vendor/autoload.php'; // If using Composer
// OR if using manual PHPMailer download:
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
require '../PHPMailer/src/Exception.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName    = htmlspecialchars($_POST['firstName']);
    $lastName    = htmlspecialchars($_POST['lastName']);
    $email   = htmlspecialchars($_POST['email']);
    $phone    = htmlspecialchars($_POST['phone']);
    $location   = htmlspecialchars($_POST['location']);
    $city    = htmlspecialchars($_POST['city']);
    $state    = htmlspecialchars($_POST['state']);
    $zip    = htmlspecialchars($_POST['zip']); 
    $occupation    = htmlspecialchars($_POST['occupation']);
    $message = htmlspecialchars($_POST['message']);
    $tearms = htmlspecialchars($_POST['tearms']);

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
    $membershipType = isset($_POST['membershipType']) ? $_POST['membershipType'] : 'Not Selected';


  // Collect radio value
    $interests = isset($_POST['interests']) ? $_POST['interests'] : 'Not selected';

    
  // Get checkbox value
    $policy = isset($_POST['policy']) ? $_POST['policy'] : 'Not Agreed';

// ✅ Capture dropdown selection
    $howHeard = isset($_POST['howHeard']) ? $_POST['howHeard'] : 'Not Selected';


        // Email content
        $mail->isHTML(true);
        $mail->Subject = "Membership Form";
        $mail->Body    = "
           
            <div style='font-family: Arial, sans-serif; color: #333;'>
        <h2 style='background: #4CAF50; color: #fff; padding: 10px;'>
            📩 New Membershup Form Submission
        </h2>
        <table border='1' cellpadding='8' cellspacing='0' width='100%' style='border-collapse: collapse;'>
            <tr>
                <td style='background:#f9f9f9; font-weight:bold;'>First Name</td>
                <td>$firstName</td>
            </tr>
            <tr>
                <td style='background:#f9f9f9; font-weight:bold;'>Last Name</td>
                <td>$lastName</td>
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
                <td style='background:#f9f9f9; font-weight:bold;'>Location</td>
                <td>$location</td>
            </tr>
             <tr>
                <td style='background:#f9f9f9; font-weight:bold;'>City</td>
                <td>$city</td>
            </tr>
            <tr>
                <td style='background:#f9f9f9; font-weight:bold;'>State</td>
                <td>$state</td>
            </tr>
            <tr>
                <td style='background:#f9f9f9; font-weight:bold;'>Zip</td>
                <td>$zip</td>
            </tr>
             <tr>
                <td style='background:#f9f9f9; font-weight:bold;'>Membership Type</td>
                <td>$membershipType</td>
            </tr>
             <tr>
                <td style='background:#f9f9f9; font-weight:bold;'>Occupation</td>
                <td>$occupation</td>
            </tr>
             <tr>
                <td style='background:#f9f9f9; font-weight:bold;'>Interest</td>
                <td>$interests</td>
            </tr>
            <tr>
                <td style='background:#f9f9f9; font-weight:bold;'>How did you hear about us?</td>
                <td>$howHeard</td>
            </tr>
            <tr>
                <td style='background:#f9f9f9; font-weight:bold;'>Message</td>
                <td>$message</td>
            </tr>
            <tr>
                <td style='background:#f9f9f9; font-weight:bold;'>Agree to Policy</td>
                <td>$policy</td>
            </tr>
            <tr>
                <td style='background:#f9f9f9; font-weight:bold;'>Attachment</td>
                <td>$fileInfo</td>
            </tr>
        </table>
        <p style='margin-top:20px; font-size:12px; color:#777;'>
            This message was sent from your website membership form.
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
