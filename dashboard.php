<?php

include "config/db.php";

// Check login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Get user name safely
$user_name = $_SESSION['user_name'] ?? 'User';

?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Dashboard</title>

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

<h2>
    Welcome, <?= htmlspecialchars($user_name, ENT_QUOTES, 'UTF-8') ?>
</h2>

<p>What would you like to do?</p>

<a href="report_lost.php">
    Report Lost
</a>

<br><br>

<a href="report_found.php">
    Report Found
</a>

<br><br>

<a href="items.php">
    View Items
</a>

<br><br>

<a href="logout.php">
    Logout
</a>

</body>

</html>