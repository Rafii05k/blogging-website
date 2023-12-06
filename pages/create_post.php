<?php include '../includes/header.php'; ?>
    <h2>Add New Post</h2>
    <form id="addPostForm">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>

        <label for="content">Content:</label>
        <textarea id="content" name="content" required></textarea>

        <input type="button" value="Add Post" onclick="addPost()">
    </form>

    <script src="../js/main.js"></script>
<?php include '../includes/footer.php'; ?>
