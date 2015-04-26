<?php
include_once('../../public_html/connection.php');
require_once(realpath(dirname(__FILE__) . "/../config.php"));
require_once(RESOURCES_PATH . "/validations.php");
require_once(RESOURCES_PATH . "/custom_functions.php");

if (isset($_POST['submit'])) {
    $name = processInput($_POST['uname']);
    $pass = processInput($_POST['pass']);


    $name = mysqli_real_escape_string($conn, $name);
    $pass = md5(mysqli_real_escape_string($conn, $pass));
    $sql = "SELECT id, username, level FROM Users WHERE username = '$name' AND password = '$pass';";
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) == 1) {
        //session_start();
        $output = mysqli_fetch_assoc($query);
        $_SESSION['user'] = $output['username'];
        if ($output['level'] == 2) {
            $_SESSION['level'] = 2;
            redirect_to("../../public_html/admin.php");
        } else {
            $_SESSION['level'] = 1;
            redirect_to("../../public_html/index.php");
        }
    }
    else {
        redirect_to("../../public_html/index.php?login=0");

    }
}