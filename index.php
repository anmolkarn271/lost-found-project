<?php include "config/db.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Lost & Found</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- HEADER / NAVBAR -->
<header class="navbar">
    <div class="nav-logo">Oops_Finder</div>
    <nav>
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>

            <?php if (!isset($_SESSION['user_id'])) { ?>
                <li><a href="login.php">Login</a></li>
                <li><a href="signup.php">Register</a></li>
            <?php } else { ?>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="logout.php">Logout</a></li>
            <?php } ?>
        </ul>
    </nav>
</header>

<!-- MAIN CONTENT -->
<div class="container">

    <video autoplay muted loop id="bg-video">
        <source src="media/bg.mp4" type="video/mp4">
    </video>

    <h1 class="title">oops_finder</h1>
    <p class="tagline">Your College Lost & Found Assistant</p>

    <div class="buttons">
        <a href="login.php">Get Started</a>
    </div>
</div>

<!-- FOOTER -->
<footer class="footer">
    <p>© 2026 Oops_Finder | Developed by Anmol Karn</p>
</footer>

</body>
</html>
