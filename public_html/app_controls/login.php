<?php
include_once('../connection.php');

if (isset($_POST['submit'])) {
    $name = htmlspecialchars($_POST['uname']);
    $pass = htmlspecialchars($_POST['pass']);


    $name = mysqli_real_escape_string($conn, $name);
    $pass = md5(mysqli_real_escape_string($conn, $pass));
    $sql = "SELECT id, username FROM Users WHERE username = '$name' AND password = '$pass';";
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) == 1) {
        header("Location: ../admin.php");
    }
}