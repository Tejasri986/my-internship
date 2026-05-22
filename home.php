 <!DOCTYPE html>
<html>
<head>
    <title>MyBlog - Home</title>
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
        .hero {
            text-align: center;
            padding: 50px;
        }
        .hero h1 {
            font-size: 70px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .hero h1 span {
            color: #c8e6c9;
        }
        .hero p {
            font-size: 20px;
            margin-bottom: 40px;
            color: #c8e6c9;
        }
        .btn-login {
            background-color: white;
            color: #2e7d32;
            border: none;
            padding: 12px 40px;
            font-size: 18px;
            border-radius: 30px;
            margin: 10px;
            font-weight: bold;
            text-decoration: none;
        }
        .btn-login:hover {
            background-color: #c8e6c9;
            color: #1b5e20;
        }
        .btn-register {
            background-color: transparent;
            color: white;
            border: 2px solid white;
            padding: 12px 40px;
            font-size: 18px;
            border-radius: 30px;
            margin: 10px;
            font-weight: bold;
            text-decoration: none;
        }
        .btn-register:hover {
            background-color: white;
            color: #2e7d32;
        }
        .features {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 60px;
            flex-wrap: wrap;
        }
        .feature-card {
            background: rgba(255,255,255,0.1);
            border: 1px solid rgba(255,255,255,0.2);
            border-radius: 15px;
            padding: 30px;
            width: 180px;
            text-align: center;
            backdrop-filter: blur(10px);
        }
        .feature-card h3 {
            font-size: 40px;
            margin-bottom: 10px;
        }
        .feature-card p {
            color: #c8e6c9;
            font-size: 14px;
            margin: 0;
        }
        .tagline {
            font-size: 14px;
            color: #a5d6a7;
            margin-top: 40px;
        }
    </style>
</head>
<body>
    <div class="hero">
        <h1>My<span>Blog</span></h1>
        <p>A simple and powerful blogging platform.<br>Share your thoughts with the world.</p>

        <a href="login.php" class="btn-login">Login</a>
        <a href="register.php" class="btn-register">Register</a>

        <div class="features">
            <div class="feature-card">
                <h3>✍️</h3>
                <p>Write & Publish Posts</p>
            </div>
            <div class="feature-card">
                <h3>🔍</h3>
                <p>Search Anything</p>
            </div>
            <div class="feature-card">
                <h3>🔒</h3>
                <p>Secure Login</p>
            </div>
            <div class="feature-card">
                <h3>📄</h3>
                <p>Pagination Support</p>
            </div>
        </div>

        <p class="tagline">Built with PHP & MySQL ❤️</p>
    </div>
</body>
</html>