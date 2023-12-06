<?php
include '../config.php';

// Check if the login form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get user credentials from the AJAX request
    $loginData = json_decode(file_get_contents('php://input'), true);

    // Simplified validation (replace with actual database lookup and password hashing)
    if ($loginData['username'] === 'demo' && $loginData['password'] === 'password') {
        // Set the user session
        $_SESSION['user'] = $loginData['username'];
        // Send a success response
        echo "Login successful!";
        exit;
    } else {
        // Send an error response
        http_response_code(401);
        echo "Invalid username or password.";
        exit;
    }
}
?>
