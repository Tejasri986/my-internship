<?php
session_start();
include 'db.php';

$result = mysqli_query($conn, "SELECT * FROM posts");
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Blog</title>
</head>
<body>
    <h1>My Blog Posts</h1>
    
    <?php if(isset($_SESSION['user'])): ?>
        <a href="create.php">Add New Post</a> | 
        <a href="logout.php">Logout</a>
    <?php else: ?>
        <a href="login.php">Login</a> | 
        <a href="register.php">Register</a>
    <?php endif; ?>

    <hr>

    <?php while($row = mysqli_fetch_assoc($result)): ?>
        <h2><?php echo $row['title']; ?></h2>
        <p><?php echo $row['content']; ?></p>
        <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a> | 
        <a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
        <hr>
    <?php endwhile; ?>
</body>
</html>