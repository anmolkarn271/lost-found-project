<?php

include "config/db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['submit'])) {

    $uid = $_SESSION['user_id'];

    $name = trim($_POST['name']);
    $desc = trim($_POST['description']);
    $loc = trim($_POST['location']);
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
        $uid,
        $name,
        $desc,
        $loc,
        $contact
    );

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Lost item reported successfully');</script>";
    } else {
        echo "<script>alert('Error reporting item');</script>";
    }

    mysqli_stmt_close($stmt);
}
?>