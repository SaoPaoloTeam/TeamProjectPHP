<?php
require_once(realpath(dirname(__FILE__) . "/../../resources/config.php"));
session_start();
if (!isset($_SESSION['user'])) {
    redirect_to("register.php");
}