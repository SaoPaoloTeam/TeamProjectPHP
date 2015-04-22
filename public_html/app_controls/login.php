<?php
include_once('../connection.php');
require_once(realpath(dirname(__FILE__) . "/../resources/config.php"));

if (isset($_POST['submit'])) {
    $name = validate($_POST['uname']);
    $pass = validate($_POST['pass']);


    $name = mysqli_real_escape_string($conn, $name);
    $pass = md5(mysqli_real_escape_string($conn, $pass));
    $sql = "SELECT id, username FROM Users WHERE username = '$name' AND password = '$pass';";
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) == 1) {
        session_start();
        $_SESSION['user'] = $name;
        header("Location: ../admin.php");
    }
}