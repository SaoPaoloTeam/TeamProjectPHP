<?php
include_once('../../public_html/connection.php');
require_once(RESOURCES_PATH . "/validations.php");
require_once(RESOURCES_PATH . "/custom_functions.php");
if (isset($_POST['submit'])) {
    $shortPass = strlen($_POST['password']) <= 6;
    $pass = md5(processInput($_POST['password']));
    $rpass = md5(processInput($_POST['rpassword']));
    $uname = processInput($_POST['username']);
    $email = processInput($_POST['email']);

    $status = 'active';
    $level = 1;
    if (preg_match("/[^0-9a-zA-Z]/", $uname) > 0 || strlen($uname) <= 6) {
        header("Location: ../../public_html/register.php?regfail=namefail");
        exit();
    }

    if (($pass != $rpass) || $shortPass) {
        header("Location: ../../public_html/register.php?regfail=passfail");
        exit();
    }

    $emailPattern = "/[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}/";

    if (preg_match($emailPattern, $email) > 1) {
        header("Location: ../../public_html/register.php?regfail=mailfail");
        exit();
    }


    $arr = escapeAll([$uname, $pass, $rpass, $email, $status, $level], $conn);
    $timestamp = date('Y-m-d G:i:s');

    //check whether a user exists
    $queryUser = "SELECT username FROM Users WHERE username = '$uname';";
    $selected = mysqli_query($conn, $queryUser);

    if ($selected->num_rows) {
        echo "user exists";
    } else {
        //create new user
        $query = "INSERT INTO Users (username, password, email, reg_date, status, level)
                        VALUES ('{$arr[$uname]}','{$arr[$pass]}','{$arr[$email]}','{$timestamp}', '{$arr[$status]}', '{$arr[$level]}')";

        $result = mysqli_query($conn, $query);
        if ($result) {
            session_start();
            $_SESSION['level']=1;
            $_SESSION['user'] = $uname;
            redirect_to('../../public_html/index.php');
        } else {
            echo mysqli_error($conn);
        }
    }
}