<?php
include "config/db.php";
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<h2>Welcome, <?= $_SESSION['name'] ?></h2>

<a href="report_lost.php">Report Lost</a>
<a href="report_found.php">Report Found</a>
<a href="items.php">View Items</a>
<a href="logout.php">Logout</a>

</body>
</html>
