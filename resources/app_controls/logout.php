<?php
require_once(realpath(dirname(__FILE__) . "/../config.php"));
require_once(RESOURCES_PATH . "/custom_functions.php");
session_start();
session_destroy();

redirect_to("../../public_html/index.php");
