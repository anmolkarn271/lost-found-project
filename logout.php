<?php

include "config/db.php";

// Clear all session data
$_SESSION = [];

// Destroy the session
session_destroy();

// Redirect to homepage
header("Location: index.php");
exit();

?>