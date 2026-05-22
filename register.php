<?php
session_start();
include 'db.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    
    if(mysqli_query($conn, $sql)){
        header("Location: login.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register - MyBlog</title>
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
            <p>Create your account!</p>
        </div>
        <form method="POST">
            <input type="text" name="username" class="form-control" placeholder="Username" required>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <button type="submit" class="btn-green">Register</button>
        </form>
        <div class="bottom-link">
            <p>Already have an account? <a href="login.php">Login</a></p>
            <a href="home.php">← Back to Home</a>
        </div>
    </div>
</body>
</html>