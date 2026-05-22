<?php
session_start();
include 'db.php';

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}

$error = '';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);

    if(empty($title) || empty($content)){
        $error = "All fields are required!";
    } else {
        $stmt = $conn->prepare("INSERT INTO posts (title, content) VALUES (?, ?)");
        $stmt->bind_param("ss", $title, $content);
        if($stmt->execute()){
            header("Location: index.php");
            exit();
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Create Post - MyBlog</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body { background: #f1f8e9; }
        .navbar { background-color: #2e7d32; }
        .navbar-brand { color: white; font-size: 24px; font-weight: bold; }
        .navbar-brand span { color: #81c784; }
        .card { border: none; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); padding: 40px; }
        .form-control { border-radius: 10px; padding: 12px; margin-bottom: 15px; }
        .btn-green { background-color: #2e7d32; color: white; border: none; border-radius: 10px; padding: 10px 30px; font-size: 16px; }
        .btn-green:hover { background-color: #1b5e20; color: white; }
        h2 { color: #2e7d32; font-weight: bold; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg mb-4">
        <div class="container">
            <a class="navbar-brand" href="index.php">My<span>Blog</span></a>
        </div>
    </nav>
    <div class="container">
        <div class="card">
            <h2 class="mb-4">✍️ Create New Post</h2>
            <?php if($error): ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php endif; ?>
            <form method="POST">
                <input type="text" name="title" class="form-control" placeholder="Post Title" required>
                <textarea name="content" class="form-control" placeholder="Write your content here..." rows="6" required></textarea>
                <button type="submit" class="btn-green">Publish Post</button>
                &nbsp;
                <a href="index.php" class="btn btn-outline-secondary">Cancel</a>
            </form>
        </div>
    </div>
</body>
</html>