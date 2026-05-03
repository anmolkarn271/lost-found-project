<?php
include "config/db.php";

if (isset($_POST['signup'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    mysqli_query($conn,
        "INSERT INTO users (name,email,password)
         VALUES ('$name','$email','$password')");

    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <a  href="index.php">&#8592; Home</a>

<h2>Create Account</h2>

<div class="form">
<form method="post">
    <input name="name" placeholder="Name" required>
    <input name="email" placeholder="Email" required>
    <input name="password" type="password" placeholder="Password" required>
    <button name="signup">Signup</button>
</form>
<a class="option" href="login.php">Already have an account? Login</a>
</div>
</body>
</html>
