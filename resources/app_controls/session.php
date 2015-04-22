<?php
require_once(realpath(dirname(__FILE__) . "/../config.php"));
require_once(RESOURCES_PATH . "/custom_functions.php");
session_start();
if (!isset($_SESSION['user'])) {
    redirect_to("register.php");
}