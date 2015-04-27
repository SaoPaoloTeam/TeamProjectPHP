<?php
require_once(realpath(dirname(__FILE__) . "/../config.php"));
require_once(RESOURCES_PATH."../app_controls/session.php");
require_once(RESOURCES_PATH . "/validations.php");
require_once(RESOURCES_PATH . "/custom_functions.php");

//var_dump($_POST);
//var_dump($_SESSION);

if (isset($_POST['topic-submit'])) {
    $author = $_SESSION['user'];
    $title = processInput($_POST['title']);
    $tag = processInput($_POST['tags']);
    $content = processInput($_POST['content']);

    $arr = escapeAll([$author, $title, $content, $tag], $conn);
    $timestamp = date('Y-m-d G:i:s');

    $queryTitle = "SELECT title FROM Articles WHERE title = '$title';";
    $selected = mysqli_query($conn, $queryTitle);

    if ($selected->num_rows) {
        echo "Article with the same title already exists";
        redirect_to("../../public_html/index.php");
        exit();
    } else {
        $query = "INSERT INTO Articles (author, title, content, published_at, updated_at, status, tag)
                        VALUES ('{$arr[$author]}','{$arr[$title]}','{$arr[$content]}',
                        '{$timestamp}','{$timestamp}', 'active', '{$arr[$tag]}')";

        $result = mysqli_query($conn, $query);
        if ($result) {
            unset($_SESSION['data']);
            redirect_to("../../public_html/index.php");
            exit();
        } else {
            echo mysqli_error($conn);
        }
    }
}
