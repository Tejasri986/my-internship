<?php
session_start();
include 'db.php';

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}

$search = isset($_GET['search']) ? $_GET['search'] : '';
$posts_per_page = 3;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $posts_per_page;

$result = mysqli_query($conn, "SELECT * FROM posts WHERE title LIKE '%$search%' LIMIT $posts_per_page OFFSET $offset");
$total = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM posts WHERE title LIKE '%$search%'"));
$total_pages = ceil($total['total'] / $posts_per_page);
?>
<!DOCTYPE html>
<html>
<head>
    <title>MyBlog</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body { background: #f1f8e9; }
        .navbar { background-color: #2e7d32; }
        .navbar-brand { color: white; font-size: 24px; font-weight: bold; }
        .navbar-brand span { color: #81c784; }
        .nav-link { color: white !important; }
        .btn-green { background-color: #2e7d32; color: white; border: none; border-radius: 10px; padding: 8px 20px; }
        .btn-green:hover { background-color: #1b5e20; color: white; }
        .card { border: none; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.08); margin-bottom: 20px; }
        .card-title { color: #2e7d32; font-weight: bold; }
        .btn-edit { background-color: #ff9800; color: white; border: none; border-radius: 8px; padding: 5px 15px; }
        .btn-delete { background-color: #e53935; color: white; border: none; border-radius: 8px; padding: 5px 15px; }
        .pagination .page-link { color: #2e7d32; }
        .pagination .active .page-link { background-color: #2e7d32; border-color: #2e7d32; color: white; }
        .search-box { border-radius: 10px; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">My<span>Blog</span></a>
            <div class="ms-auto">
                <span class="text-white me-3">👤 <?php echo $_SESSION['user']; ?></span>
                <a href="create.php" class="btn btn-green me-2">+ New Post</a>
                <a href="logout.php" class="btn btn-outline-light">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <form method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control search-box" placeholder="Search posts..." value="<?php echo $search; ?>">
                <button class="btn btn-green" type="submit">Search</button>
            </div>
        </form>

        <?php while($row = mysqli_fetch_assoc($result)): ?>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><?php echo $row['title']; ?></h4>
                <p class="card-text text-muted"><?php echo $row['content']; ?></p>
                <small class="text-muted">📅 <?php echo $row['created_at']; ?></small>
                <br><br>
                <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn-edit">✏️ Edit</a>
                &nbsp;
                <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn-delete">🗑️ Delete</a>
            </div>
        </div>
        <?php endwhile; ?>

        <nav>
            <ul class="pagination justify-content-center">
                <?php for($i=1; $i<=$total_pages; $i++): ?>
                <li class="page-item <?php echo $i==$page ? 'active' : ''; ?>">
                    <a class="page-link" href="?page=<?php echo $i; ?>&search=<?php echo $search; ?>"><?php echo $i; ?></a>
                </li>
                <?php endfor; ?>
            </ul>
        </nav>
    </div>
</body>
</html>