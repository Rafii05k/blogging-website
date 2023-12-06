<?php
include '../config.php';

// Read existing posts from JSON file
$posts = json_decode(file_get_contents(JSON_POSTS_PATH), true);

// Get the updated post data from the AJAX request
$updatedPostData = json_decode(file_get_contents('php://input'), true);

// Find and update the post in the array
foreach ($posts as &$post) {
    if ($post['id'] == $updatedPostData['id'] && $post['author'] == $_SESSION['user']) {
        $post['title'] = $updatedPostData['title'];
        $post['content'] = $updatedPostData['content'];
        $post['timestamp'] = $updatedPostData['timestamp'];
        // Save the updated array back to the JSON file
        file_put_contents(JSON_POSTS_PATH, json_encode($posts));
        // Send a response (optional)
        echo "Post updated successfully!";
        exit;
    }
}

// If the post wasn't found or the user is not the author
http_response_code(404);
echo "Post not found or you don't have permission to edit it.";
?>
