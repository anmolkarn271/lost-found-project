<?php
include "config/db.php";

// Check login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Insert found item
if (isset($_POST['submit'])) {
    $user_id = $_SESSION['user_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $location = $_POST['location'];
    $contact = $_POST['contact'];

    $query = "INSERT INTO items (user_id, type, name, description, location, contact)
              VALUES ('$user_id', 'Found', '$name', '$description', '$location', '$contact')";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Found item reported successfully');</script>";
    } else {
        echo "<script>alert('Error reporting item');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Report Found Item</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<h2>Report Found Item</h2>

<form method="post">
    <input type="text" name="name" placeholder="Item Name" required>
    <textarea name="description" placeholder="Item Description"></textarea>
    <input type="text" name="location" placeholder="Found Location">
    <input type="text" name="contact" placeholder="Contact Information">
    <button type="submit" name="submit">Submit</button>
</form>

<br>
<a href="dashboard.php">Back to Dashboard</a>

</body>
</html>
