<?php
include '../config.php';

// Read existing posts from JSON file
$posts = json_decode(file_get_contents(JSON_POSTS_PATH), true);

// Get the post ID from the AJAX request
$deletePostId = $_POST['id'];

// Find and remove the post from the array
foreach ($posts as $key => $post) {
    if ($post['id'] == $deletePostId && $post['author'] == $_SESSION['user']) {
        unset($posts[$key]);
        // Save the updated array back to the JSON file
        file_put_contents(JSON_POSTS_PATH, json_encode(array_values($posts)));
        // Send a response (optional)
        echo "Post deleted successfully!";
        exit;
    }
}

// If the post wasn't found or the user is not the author
http_response_code(404);
echo "Post not found or you don't have permission to delete it.";
?>
