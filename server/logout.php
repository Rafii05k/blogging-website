<?php
include '../config.php';

// Destroy the user session
session_destroy();

// Send a success response
echo "Logout successful!";
?>
