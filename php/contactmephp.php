<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    if (empty($name) || !preg_match("/^[a-zA-Z ]*$/", $name)) {
        // Invalid name
        // Handle the error, e.g., return an error message to the user
        // this is a basic security measure
    }
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Invalid email address
        // Handle the error, e.g., return an error message to the user
    }
    $message = $_POST["message"];

    $to = "callimations98@gmail.com"; // Replace with your email address
    $subject = "New Contact Form Submission";
    $headers = "From: $email";

    // Mail body
    $body = "Name: $name\nEmail: $email\nMessage:\n$message";

    // Send email
    mail($to, $subject, $body, $headers);
}
?>