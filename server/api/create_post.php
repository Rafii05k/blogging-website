<?php
include '../config.php';

// Read existing posts from JSON file
$posts = json_decode(file_get_contents(JSON_POSTS_PATH), true);

// Get the new post data from the AJAX request
$newPostData = json_decode(file_get_contents('php://input'), true);

// Add the new post to the array
$posts[] = [
    "id" => count($posts) + 1,
    "title" => $newPostData['title'],
    "content" => $newPostData['content'],
    "author" => $newPostData['author'],
    "timestamp" => $newPostData['timestamp']
];

// Save the updated array back to the JSON file
file_put_contents(JSON_POSTS_PATH, json_encode($posts));

// Send a response (optional)
echo "Post added successfully!";
?>
