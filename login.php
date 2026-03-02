<?php
session_start();

if (isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
 
$error = "";
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $username = $_POST['username'];
    $password = $_POST['password'];
 
    if ($username === "admin" && $password === "admin") {
 
        header("Location: index.php");
        exit();
 
    } else {
        $error = "Invalid username or password!";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<div>
    <h2>Welcome to Student Management System</h2>
    
    <form method="POST">
        <label>Username:</label>
        <input type="text" name="username" required>
    
        <label>Password:</label>
        <input type="password" name="password" required>
    
        <button type="submit">Login</button>
    </form>

</div>
    
</body>
</html>