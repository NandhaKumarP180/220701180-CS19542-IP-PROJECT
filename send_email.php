<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $first_name = htmlspecialchars($_POST['first_name']);
    $last_name = htmlspecialchars($_POST['last_name']);
    $email = htmlspecialchars($_POST['email']);
    $mobile = htmlspecialchars($_POST['mobile']);
    $message = htmlspecialchars($_POST['message']);
    
    // Email details
    $to = "220701180@rajalakshmi.edu.in";  // Replace with your email
    $subject = "New Message from Contact Form";
    $body = "You have received a new message from the contact form:\n\n" .
            "First Name: $first_name\n" .
            "Last Name: $last_name\n" .
            "Email: $email\n" .
            "Mobile: $mobile\n\n" .
            "Message:\n$message";
    
    $headers = "From: $email";
    
    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Failed to send the message.";
    }
}
?>
