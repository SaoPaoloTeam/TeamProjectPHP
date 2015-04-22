<?php
require_once(realpath(dirname(__FILE__) . "/../resources/config.php"));
require_once(RESOURCES_PATH."../app_controls/session.php");

require_once(RESOURCES_PATH. "/custom_functions.php");

if (isset($_SESSION['user'])) {
    echo "Hello, " . $_SESSION['user'];
} else {
    redirect_to("index.php");
    exit();
}
?>

<a href="../resources/app_controls/logout.php">Logout</a>