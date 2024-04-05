<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
try {
// Extract form data
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$contactNo = $_POST['contactNo'];
$message = $_POST['message'];

// File upload handling
if(isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
$file_name = $_FILES['file']['name'];
$file_tmp = $_FILES['file']['tmp_name'];

// Move uploaded file to a permanent location
$upload_dir = "uploads/";
$file_path = $upload_dir . $file_name;
if (!move_uploaded_file($file_tmp, $file_path)) {
throw new Exception("Failed to move uploaded file.");
}
}

// Initialize PHPMailer
$mail = new PHPMailer();

// SMTP configuration
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls'; // Enable TLS encryption
$mail->Port = 587; // TCP port to connect to

// Gmail username and password
$mail->Username = 'datasai006@gmail.com';
$mail->Password = 'ckuf pfxt lmzt tiuo';

// Sender and recipient
$mail->setFrom($email, $firstName . ' ' . $lastName);
$mail->addAddress('datasai006@gmail.com');

// Email content
$mail->isHTML(false); // Set email format to plain text
$mail->Subject = 'Contact Form Submission';
$mail->Body = "First Name: $firstName\nLast Name: $lastName\nEmail: $email\nContact No: $contactNo\nMessage: $message";

// Add attachment if file uploaded
if(isset($file_path)) {
$mail->addAttachment($file_path, $file_name); // Attach uploaded file
}

// Send email
if ($mail->send()) {
echo "Thank you! Your message has been sent.";
} else {
echo "Error: Failed to send email. " . $mail->ErrorInfo;
}
} catch (Exception $e) {
echo "Error: " . $e->getMessage();
}
} else {
echo "Error: Invalid request method.";
}
?>