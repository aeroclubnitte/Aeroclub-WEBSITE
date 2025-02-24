<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);

    if (empty($name) || empty($email) || empty($message)) {
        echo "All fields are required.";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

    // Email configuration
    $to = "your-email@example.com"; // Change this to your email
    $subject = "New Contact Form Submission from $name";
    $headers = "From: $email\r\nReply-To: $email\r\nContent-Type: text/plain; charset=UTF-8";

    $email_body = "Name: $name\nEmail: $email\n\nMessage:\n$message";

    // Send email
    if (mail($to, $subject, $email_body, $headers)) {
        echo "Thank you! Your message has been sent.";
    } else {
        echo "Oops! Something went wrong. Try again.";
    }
} else {
    echo "Invalid request.";
}
?>
