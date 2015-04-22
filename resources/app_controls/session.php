<?php
require_once(realpath(dirname(__FILE__) . "/../config.php"));
require_once(RESOURCES_PATH . "/custom_functions.php");
session_start();
if (!isset($_SESSION['level'])) {
    $_SESSION['level'] = 0;
}
