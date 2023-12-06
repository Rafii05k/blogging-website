<?php
include '../config.php';

// Check if the registration form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get user data from the AJAX request
    $userData = json_decode(file_get_contents('php://input'), true);

    // Validate user data (simplified for demonstration)
    if ($userData['password'] !== $userData['confirm_password']) {
        // Send an error response
        http_response_code(400);
        echo "Passwords do not match.";
        exit;
    }

    // TODO: Add more validation, check if the username is unique, etc.

    // Simulate storing user data in a JSON file (replace with a database in a real scenario)
    $users = json_decode(file_get_contents(JSON_USERS_PATH), true);
    $users[] = [
        'username' => $userData['username'],
        'password' => $userData['password'], // In a real scenario, you would hash the password
    ];
    file_put_contents(JSON_USERS_PATH, json_encode($users));

    // Send a success response
    echo "Registration successful!";
    exit;
}
?>
