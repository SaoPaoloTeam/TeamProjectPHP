<?php
require_once('../validations.php');

if (isset($_POST['submit'])) {
    $from = processInput($_POST['yname']);
    $to = 'enevlogiev@abv.bg';
    $message = processInput($_POST['message']);
    $message = wordwrap($message, 60, "\r\n");

    mail($to, $from, $message);
    header("Location: ../../public_html/index.php");
    exit();
}