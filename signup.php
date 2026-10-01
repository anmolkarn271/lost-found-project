<?php

include "config/db.php";

// Register user
if (isset($_POST['signup'])) {

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Basic validation
    if (empty($name) || empty($email) || empty($password)) {
        $error = "Please fill all fields.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Please enter a valid email address.";
    } elseif (strlen($password) < 6) {
        $error = "Password must be at least 6 characters.";
    } else {

        // Check whether email already exists
        $check = mysqli_prepare(
            $conn,
            "SELECT id FROM users WHERE email = ?"
        );

        mysqli_stmt_bind_param($check, "s", $email);
        mysqli_stmt_execute($check);
        mysqli_stmt_store_result($check);

        if (mysqli_stmt_num_rows($check) > 0) {

            $error = "This email is already registered.";

        } else {

            // Secure password hashing
            $hashed_password = password_hash(
                $password,
                PASSWORD_DEFAULT
            );

            // Insert new user
            $stmt = mysqli_prepare(
                $conn,
                "INSERT INTO users (name, email, password)
                 VALUES (?, ?, ?)"
            );

            if (!$stmt) {
                $error = "Database error.";
            } else {

                mysqli_stmt_bind_param(
                    $stmt,
                    "sss",
                    $name,
                    $email,
                    $hashed_password
                );

                if (mysqli_stmt_execute($stmt)) {

                    echo "<script>
                            alert('Account created successfully!');
                            window.location.href='login.php';
                          </script>";

                    exit();

                } else {

                    $error = "Registration failed. Please try again.";
                }

                mysqli_stmt_close($stmt);
            }
        }

        mysqli_stmt_close($check);
    }
}

?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Create Account</title>

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

<h2>Create Account</h2>

<?php if (isset($error)) { ?>

    <p style="color:red;">
        <?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?>
    </p>

<?php } ?>

<form method="post">

    <input
        type="text"
        name="name"
        placeholder="Your Name"
        required
    >

    <input
        type="email"
        name="email"
        placeholder="Email Address"
        required
    >

    <input
        type="password"
        name="password"
        placeholder="Password"
        required
    >

    <button type="submit" name="signup">
        Sign Up
    </button>

</form>

<br>

<p>
    Already have an account?
    <a href="login.php">Login</a>
</p>

</body>

</html>