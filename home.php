<?php
include 'server/config.php';

// Read existing posts from JSON file
$posts = json_decode(file_get_contents(JSON_POSTS_PATH), true);

include 'includes/header.php';
?>

<h2>Welcome to the Blog!</h2>

<?php
// Check if the user is logged in
if (isset($_SESSION['user'])) {
    echo '<p>Hello, ' . $_SESSION['user'] . '!</p>';
    echo '<p><a href="logout.php">Logout</a></p>';
} else {
    echo '<p><a href="pages/login.php">Login</a> to create and manage your blog posts.</p>';
}

// Display the list of blog posts
if (!empty($posts)) {
    echo '<h3>Latest Blog Posts:</h3>';
    echo '<ul>';
    foreach ($posts as $post) {
        echo '<li>';
        echo '<strong>' . htmlspecialchars($post['title']) . '</strong>';
        echo '<p>By ' . htmlspecialchars($post['author']) . ' on ' . htmlspecialchars($post['timestamp']) . '</p>';
        echo '<p>' . nl2br(htmlspecialchars($post['content'])) . '</p>';
        echo '</li>';
    }
    echo '</ul>';
} else {
    echo '<p>No blog posts available.</p>';
}

include 'includes/footer.php';
?>
            