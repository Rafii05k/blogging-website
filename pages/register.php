<?php
include 'includes/header.php';
include 'server/config.php';

// Check if the user is already logged in
if (isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}

// Check if the registration form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get user data from the form
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirm_password'] ?? '';

    // Validate user data (simplified for demonstration)
    if ($password !== $confirmPassword) {
        $error = 'Passwords do not match.';
    } else {
        // TODO: Add more validation, check if the username is unique, etc.

        // Simulate storing user data in a JSON file (replace with a database in a real scenario)
        $userData = [
            'username' => $username,
            'password' => $password, // In a real scenario, you would hash the password
        ];

        $users = json_decode(file_get_contents(JSON_USERS_PATH), true);
        $users[] = $userData;
        file_put_contents(JSON_USERS_PATH, json_encode($users));

        // Redirect to the login page after successful registration
        header('Location: login.php');
        exit;
    }
}
?>

<h2>Register</h2>
<form method="POST">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <label for="confirm_password">Confirm Password:</label>
    <input type="password" id="confirm_password" name="confirm_password" required>

    <input type="submit" value="Register">
</form>

<?php
if (isset($error)) {
    echo '<p class="error">' . $error . '</p>';
}
?>

<?php include 'includes/footer.php'; ?>
