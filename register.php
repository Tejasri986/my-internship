<?php
session_start();
include 'db.php';

$error = '';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    if(empty($username) || empty($password)){
        $error = "All fields are required!";
    } elseif(strlen($password) < 6){
        $error = "Password must be at least 6 characters!";
    } else {
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, 'editor')");
        $stmt->bind_param("ss", $username, $hashed);
        if($stmt->execute()){
            header("Location: login.php");
            exit();
        }
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
            background: linear-gradient(135deg, #1b5e20, #2e7d32, #388e3c);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
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
        .brand h1 span { color: #81c784; }
        .brand p { color: #888; font-size: 14px; }
        .btn-green {
            background-color: #2e7d32;
            color: white;
            border: none;
            width: 100%;
            padding: 12px;
            border-radius: 10px;
            font-size: 16px;
        }
        .btn-green:hover { background-color: #1b5e20; color: white; }
        .form-control { border-radius: 10px; padding: 12px; margin-bottom: 15px; }
        .bottom-link { text-align: center; margin-top: 20px; color: #888; }
        .bottom-link a { color: #2e7d32; font-weight: bold; text-decoration: none; }
    </style>
</head>
<body>
    <div class="card">
        <div class="brand">
            <h1>My<span>Blog</span></h1>
            <p>Create your account!</p>
        </div>
        <?php if($error): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        <form method="POST">
            <input type="text" name="username" class="form-control" placeholder="Username" required>
            <input type="password" name="password" class="form-control" placeholder="Password (min 6 chars)" required>
            <button type="submit" class="btn-green">Register</button>
        </form>
        <div class="bottom-link">
            <p>Already have an account? <a href="login.php">Login</a></p>
            <a href="home.php">← Back to Home</a>
        </div>
    </div>
</body>
</html>