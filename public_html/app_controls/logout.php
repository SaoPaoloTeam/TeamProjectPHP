<?php
require_once(realpath(dirname(__FILE__) . "/../../resources/config.php"));
require_once(realpath(dirname(__FILE__) . "/../../resources/custom_functions.php"));
session_start();
session_destroy();

redirect_to("../index.php");