<?php
session_start();
include 'config.php'; // Database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $formType = $_POST['form_type'];
    
    if ($formType === 'login') {
        // Handle Login
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $result = mysqli_query($conn, $query);
        
        if (mysqli_num_rows($result) > 0) {
            $_SESSION['email'] = $email;
            header('Location: interest.html'); // Redirect to dashboard
        } else {
            echo "Invalid email or password!";
        }
    } elseif ($formType === 'signup') {
        // Handle Signup
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        if ($password !== $confirm_password) {
            echo "Passwords do not match!";
        } else {
            $query = "INSERT INTO users (firstname, lastname, email, password) VALUES ('$firstname', '$lastname', '$email', '$password')";
            if (mysqli_query($conn, $query)) {
                echo "Signup successful!";
                header('Location: login.html');
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($conn);
            }
        }
    }
}
?>
