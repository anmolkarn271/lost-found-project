<?php
include "config/db.php";

$error = "";

if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass  = $_POST['password'];

    $res = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' LIMIT 1");
    $user = mysqli_fetch_assoc($res);

    if ($user && password_verify($pass, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['name']    = $user['name'];
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid email or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | Oops_Finder</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- BACK TO HOME -->
<div class="top-link">
    <a href="index.php">&#8592; Home</a>
</div>

<!-- MAIN CONTAINER -->
<div class="container"> 
    <video autoplay muted loop id="bg-video">
        <source src="media/bg.mp4" type="video/mp4">
    </video>



    <h2 class="page-title">Login</h2>

    <div class="form">

        <?php if ($error) { ?>
            <p class="error-msg"><?php echo $error; ?></p>
        <?php } ?>

        <form method="post" autocomplete="off">

            <input 
                type="email" 
                name="email" 
                placeholder="Email address" 
                required
            >

            <input 
                type="password" 
                name="password" 
                placeholder="Password" 
                required
            >

            <button type="submit" name="login">Login</button>
        </form>

        <a class="option" href="signup.php">
            Don't have an account? <strong>Signup</strong>
        </a>
    </div>

</div>

</body>
</html>
