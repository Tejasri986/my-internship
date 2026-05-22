<?php
session_start();
include 'db.php';

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM posts WHERE id=$id");
$post = mysqli_fetch_assoc($result);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $title = $_POST['title'];
    $content = $_POST['content'];
    
    $sql = "UPDATE posts SET title='$title', content='$content' WHERE id=$id";
    
    if(mysqli_query($conn, $sql)){
        header("Location: index.php");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Post</title>
</head>
<body>
    <h1>Edit Post</h1>
    <form method="POST">
        <input type="text" name="title" value="<?php echo $post['title']; ?>" required><br><br>
        <textarea name="content" required><?php echo $post['content']; ?></textarea><br><br>
        <button type="submit">Update Post</button>
    </form>
    <a href="index.php">Back</a>
</body>
</html>