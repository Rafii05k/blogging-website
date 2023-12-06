<?php
include 'header.php';
include 'config.php';

// Check if the user is already logged in
if (isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}

// Check if the login form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get user credentials from the form
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Validate credentials (simplified for demonstration)
    if ($username === 'demo' && $password === 'password') {
        // Set the user session
        $_SESSION['user'] = $username;
        header('Location: index.php');
        exit;
    } else {
        $error = 'Invalid username or password.';
    }
}
?>

<h2>Login</h2>
<form method="POST">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <input type="submit" value="Login">
</form>

<?php
if (isset($error)) {
    echo '<p class="error">' . $error . '</p>';
}
?>

<?php include '..includes/footer.php'; ?>
