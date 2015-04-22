<?php
require_once("app_controls/session.php");

if (isset($_SESSION['user'])) {
    echo "Hello, " . $_SESSION['user'];
} else {
    header("Location: index.php");
    exit();
}
?>

<a href="app_controls/logout.php">Logout</a>