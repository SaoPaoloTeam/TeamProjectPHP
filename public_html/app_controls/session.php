<?php
require_once(realpath(dirname(__FILE__) . "/../../resources/config.php"));
require_once(realpath(dirname(__FILE__) . "/../../resources/custom_functions.php"));
session_start();
if (!isset($_SESSION['user'])) {
    redirect_to("register.php");
}