<?php
include 'includes/header.php';
include 'config.php';

// Read existing posts from JSON file
$posts = json_decode(file_get_contents(JSON_POSTS_PATH), true);

// Get the post ID from the URL
$viewPostId = $_GET['id'] ?? null;

// Find the post by ID
$viewPost = null;
foreach ($posts as $post) {
    if ($post['id'] == $viewPostId) {
        $viewPost = $post;
        break;
    }
}
?>

<h2>View Post</h2>
<?php if ($viewPost) : ?>
    <h3><?php echo $viewPost['title']; ?></h3>
    <p><?php echo $viewPost['content']; ?></p>
    <p>Author: <?php echo $viewPost['author']; ?></p>
    <p>Timestamp: <?php echo $viewPost['timestamp']; ?></p>
    <?php if (isset($_SESSION['user']) && $_SESSION['user'] === $viewPost['author']) : ?>
        <a href="edit_post.php?id=<?php echo $viewPost['id']; ?>">Edit</a>
        <a href="#" onclick="deletePost(<?php echo $viewPost['id']; ?>)">Delete</a>
    <?php endif; ?>
<?php else : ?>
    <p>Post not found.</p>
<?php endif; ?>

<script src="js/ajax.js"></script>
<script>
    function deletePost(postId) {
        if (confirm("Are you sure you want to delete this post?")) {
            ajaxRequest('POST', 'api/delete_post.php', { id: postId }, function(response) {
                console.log(response);
                // You can handle the response here (e.g., show a success message)
                // Redirect to the all_posts page after deleting
                window.location.href = 'all_posts.php';
            });
        }
    }
</script>

<?php include 'includes/footer.php'; ?>
