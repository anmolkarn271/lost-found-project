<?php

include "config/db.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['submit'])) {

    $user_id = $_SESSION['user_id'];

    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    $location = trim($_POST['location']);
    $contact = trim($_POST['contact']);

    $stmt = mysqli_prepare(
        $conn,
        "INSERT INTO items
        (user_id, type, name, description, location, contact)
        VALUES (?, 'Lost', ?, ?, ?, ?)"
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
                alert('Lost item reported successfully!');
                window.location.href='items.php';
              </script>";

        exit();

    } else {

        echo "Error: " . mysqli_error($conn);

    }

    mysqli_stmt_close($stmt);
}

?>