<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Your Blog</title>
</head>
<body>
    <header>
        <h1>Your Blog</h1>
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <?php if (isset($_SESSION['user'])) : ?>
                    <li><a href="../add_post.php">Add Post</a></li>
                    <li><a href="../all_posts.php">All Posts</a></li>
                    <li><a href="../logout.php">Logout</a></li>
                <?php else : ?>
                    <li><a href="../register.php">Register</a></li>
                    <li><a href="../login.php">Login</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
    <main>
