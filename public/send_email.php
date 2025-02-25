<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/../vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'safa.belhoufrte.44@edu.uiz.ac.ma';
        $mail->Password = 'inqp ttds izyw ffgl';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom($email, $name);
        $mail->addAddress('safa.belhoufrte.44@edu.uiz.ac.ma');

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = "
            <p>You have received a new message from your website contact form.</p>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Message:</strong></p>
            <p>$message</p>
        ";

        $mail->send();
        echo "<script>alert('Your message has been sent successfully!');</script>";

    } catch (Exception $e) {
        echo "<script>alert('Error: {$mail->ErrorInfo}');</script>";
}
}
?>
