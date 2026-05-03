<?php
include "config/db.php";
if (!isset($_SESSION['user_id'])) header("Location: login.php");

if (isset($_POST['submit'])) {
    $uid = $_SESSION['user_id'];
    $name = $_POST['name'];
    $desc = $_POST['description'];
    $loc = $_POST['location'];
    $contact = $_POST['contact'];

    mysqli_query($conn,
        "INSERT INTO items (user_id,type,name,description,location,contact)
         VALUES ($uid,'Lost','$name','$desc','$loc','$contact')");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Report Lost Item</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<h2>Report Lost Item</h2>

<form method="post">
    <input name="name" placeholder="Item Name" required>
    <textarea name="description" placeholder="Description"></textarea>
    <input name="location" placeholder="Location">
    <input name="contact" placeholder="Contact">
    <button name="submit">Submit</button>
</form>
<br>
<a href="dashboard.php">Back to Dashboard</a>

</body>
</html>
