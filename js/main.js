function addPost() {
    var title = document.getElementById('title').value;
    var content = document.getElementById('content').value;

    var newPost = {
        title: title,
        content: content,
        author: "<?php echo isset($_SESSION['user']) ? $_SESSION['user'] : ''; ?>",
        timestamp: new Date().toISOString()
    };

    fetch('../api/add_post.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(newPost)
    })
    .then(response => response.text())
    .then(data => {
        console.log(data);
        // You can handle the response here (e.g., show a success message)
    });
}
