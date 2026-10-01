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

    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    $location = trim($_POST['location']);
    $contact = trim($_POST['contact']);

    // Prepared statement
    $stmt = mysqli_prepare(
        $conn,
        "INSERT INTO items
        (user_id, type, name, description, location, contact)
        VALUES (?, 'Found', ?, ?, ?, ?)"
    );

    mysqli_stmt_bind_param(
        $stmt,
        "issss",
        $user_id,
        $name,
        $description,
        $location,
        $contact
    );

    if (mysqli_stmt_execute($stmt)) {

        echo "<script>
                alert('Found item reported successfully');
                window.location.href='items.php';
              </script>";

        exit();

    } else {

        echo "<script>
                alert('Error reporting item');
              </script>";
    }

    mysqli_stmt_close($stmt);
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Report Found Item</title>

    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<h2>Report Found Item</h2>

<form method="post">

    <input
        type="text"
        name="name"
        placeholder="Item Name"
        required
    >

    <textarea
        name="description"
        placeholder="Item Description"
    ></textarea>

    <input
        type="text"
        name="location"
        placeholder="Found Location"
    >

    <input
        type="text"
        name="contact"
        placeholder="Contact Information"
    >

    <button type="submit" name="submit">
        Submit
    </button>

</form>

<br>

<a href="dashboard.php">
    Back to Dashboard
</a>

</body>

</html>