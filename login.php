<?php
session_start();
include 'db.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);
    
    if($user && password_verify($password, $user['password'])){
        $_SESSION['user'] = $user['username'];
        header("Location: index.php");
        exit();
    } else {
        echo "<div class='alert alert-danger'>Invalid username or password!</div>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login - MyBlog</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #e8f5e9, #c8e6c9);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            padding: 40px;
            width: 400px;
        }
        .brand {
            text-align: center;
            margin-bottom: 30px;
        }
        .brand h1 {
            font-size: 36px;
            font-weight: bold;
            color: #2e7d32;
        }
        .brand h1 span {
            color: #81c784;
        }
        .brand p {
            color: #888;
            font-size: 14px;
        }
        .btn-green {
            background-color: #2e7d32;
            color: white;
            border: none;
            width: 100%;
            padding: 12px;
            border-radius: 10px;
            font-size: 16px;
        }
        .btn-green:hover {
            background-color: #1b5e20;
            color: white;
        }
        .form-control {
            border-radius: 10px;
            padding: 12px;
            margin-bottom: 15px;
        }
        .bottom-link {
            text-align: center;
            margin-top: 20px;
            color: #888;
        }
        .bottom-link a {
            color: #2e7d32;
            font-weight: bold;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="brand">
            <h1>My<span>Blog</span></h1>
            <p>Welcome back! Please login.</p>
        </div>
        <form method="POST">
            <input type="text" name="username" class="form-control" placeholder="Username" required>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <button type="submit" class="btn-green">Login</button>
        </form>
        <div class="bottom-link">
            <p>Don't have an account? <a href="register.php">Register</a></p>
            <a href="home.php">← Back to Home</a>
        </div>
    </div>
</body>
</html>