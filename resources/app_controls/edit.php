<?php
require_once(realpath(dirname(__FILE__) . "/../config.php"));
require_once(RESOURCES_PATH . "../app_controls/session.php");
require_once(RESOURCES_PATH . "/validations.php");
require_once(RESOURCES_PATH . "/custom_functions.php");

//var_dump($_POST);
//var_dump($_SESSION);

if (isset($_POST['topic-submit'])) {
    $author = $_SESSION['user'];
    $title = processInput($_POST['title']);
    $tag = processInput($_POST['tags']);
    $content = processInput($_POST['content']);
    $id = intval($_POST['article-id']);
    $arr = escapeAll([$author, $title, $content, $tag,$id], $conn);
    $timestamp = date('Y-m-d G:i:s');



//    $queryTitle = "SELECT title FROM Articles WHERE title = '$title';";
    $queryUpdate = "UPDATE Articles SET title='$arr[$title]',content='$arr[$content]',updated_at='$timestamp',tag='$arr[$tag]' WHERE id=$id";
    $selected = mysqli_query($conn, $queryUpdate);

    if ($selected) {
        echo "UPDATED";
        unset($_SESSION['data']); //МАЛКО КПК! ЕДО ВИЖ ТАКА ДОБРЕ ЛИ, ЧЕ НЕ ЗНАМ ЗА КАКВО Я ПОЛЗВАШ ТАЗИ ПРОМЕНЛИВА
        redirect_to("../../public_html/admin.php");
        exit();

    } else {
        echo mysqli_error($conn);
    }
}
