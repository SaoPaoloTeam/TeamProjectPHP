<?php
require_once("app_controls/session.php");
require_once(realpath(dirname(__FILE__) . "/../resources/config.php"));

if (isset($_SESSION['user'])) {
    echo "Hello, " . $_SESSION['user'];
} else {
    redirect_to("index.php");
    exit();
}
?>

<a href="app_controls/logout.php">Logout</a>