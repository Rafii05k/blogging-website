<?php
include 'includes/header.php';
include 'config.php';

// Read existing posts from JSON file
$posts = json_decode(file_get_contents(JSON_POSTS_PATH), true);

// Get the post ID from the URL
$editPostId = $_GET['id'] ?? null;

// Find the post by ID
$editPost = null;
foreach ($posts as $post) {
    if ($post['id'] == $editPostId && $post['author'] == $_SESSION['user']) {
        $editPost = $post;
        break;
    }
}
?>

<h2>Edit Post</h2>
<?php if ($editPost) : ?>
    <form id="editPostForm">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="<?php echo $editPost['title']; ?>" required>

        <label for="content">Content:</label>
        <textarea id="content" name="content" required><?php echo $editPost['content']; ?></textarea>

        <input type="button" value="Update Post" onclick="editPost(<?php echo $editPost['id']; ?>)">
    </form>

    <script src="js/ajax.js"></script>
    <script>
        function editPost(postId) {
            var title = document.getElementById('title').value;
            var content = document.getElementById('content').value;

            var updatedPost = {
                id: postId,
                title: title,
                content: content,
                author: "<?php echo isset($_SESSION['user']) ? $_SESSION['user'] : ''; ?>",
                timestamp: new Date().toISOString()
            };

            ajaxRequest('POST', 'api/edit_post.php', updatedPost, function(response) {
                console.log(response);
                // You can handle the response here (e.g., show a success message)
                // Redirect to the view_post page after editing
                window.location.href = 'view_post.php?id=' + postId;
            });
        }
    </script>
<?php else : ?>
    <p>Post not found or you don't have permission to edit it.</p>
<?php endif; ?>

<?php include 'includes/footer.php'; ?>
