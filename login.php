<?php

include "config/db.php";

// Check login form
if (isset($_POST['login'])) {

    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {

        $error = "Please enter email and password.";

    } else {

        // Find user by email
        $stmt = mysqli_prepare(
            $conn,
            "SELECT id, name, password FROM users WHERE email = ?"
        );

        if (!$stmt) {

            $error = "Database error.";

        } else {

            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);

            mysqli_stmt_store_result($stmt);

            if (mysqli_stmt_num_rows($stmt) === 1) {

                mysqli_stmt_bind_result(
                    $stmt,
                    $user_id,
                    $name,
                    $hashed_password
                );

                mysqli_stmt_fetch($stmt);

                // Verify password
                if (password_verify($password, $hashed_password)) {

                    // Regenerate session ID for security
                    session_regenerate_id(true);

                    $_SESSION['user_id'] = $user_id;
                    $_SESSION['user_name'] = $name;
                    $_SESSION['user_email'] = $email;

                    header("Location: dashboard.php");
                    exit();

                } else {

                    $error = "Invalid email or password.";
                }

            } else {

                $error = "Invalid email or password.";
            }

            mysqli_stmt_close($stmt);
        }
    }
}

?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Login</title>

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

<h2>Login</h2>

<?php if (isset($error)) { ?>

    <p style="color:red;">
        <?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?>
    </p>

<?php } ?>

<form method="post">

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

    <button type="submit" name="login">
        Login
    </button>

</form>

<br>

<p>
    Don't have an account?
    <a href="signup.php">Create Account</a>
</p>

</body>

</html>
