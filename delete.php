<?php
session_start();
include 'db.php';

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}

if($_SESSION['role'] != 'admin'){
    die("<div class='container mt-4'><div class='alert alert-danger'>❌ Access Denied! Only admins can delete posts.</div><a href='index.php'>Go Back</a></div>");
}

$id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM posts WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: index.php");
exit();
?>