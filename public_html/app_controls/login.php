<?php
include_once('../connection.php');
require_once(realpath(dirname(__FILE__) . "../../../resources/config.php"));
require_once(realpath(dirname(__FILE__) . "../../../resources/validations.php"));

if (isset($_POST['submit'])) {
    $name = processInput($_POST['uname']);
    $pass = processInput($_POST['pass']);


    $name = mysqli_real_escape_string($conn, $name);
    $pass = md5(mysqli_real_escape_string($conn, $pass));
    $sql = "SELECT id, username FROM Users WHERE username = '$name' AND password = '$pass';";
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) == 1) {
        session_start();
        $_SESSION['user'] = $name;
        redirect_to("../admin.php");
    }
    else{
     echo   'NOT A USER';
    }
}