<?php

require_once(realpath(dirname(__FILE__) . "/../resources/config.php"));
require_once(realpath(dirname(__FILE__) . "/../resources/comments.php"));
require_once(RESOURCES_PATH."../app_controls/session.php");
require_once(RESOURCES_PATH . "/custom_functions.php");
require_once(RESOURCES_PATH . "/validations.php");

var_dump($_POST);




$editing = false;

//$publisher = $_SESSION['publisher']; //Must be dynamically set to the current user

$publisher = $_SESSION['user'];

switch ($_SESSION['level']) {
    case 0:
        $userLevel = 'Guest';
        break;
    case 1:
        $userLevel = 'User';
        break;
    case 2:
        $userLevel = 'Admin';
        break;
    default:
        $userLevel = 'Guest';
        break;
}

$articleTitle = $_SESSION['currentTitle']; //Must be a dynamically received article title$articleTitle = 'Article Number Four';

var_dump($articleTitle);

$title = str_replace(' ', '+', $articleTitle);

if (isset($_POST['comment-submit'])) {
    $name = $publisher;
    $comments = processInput($_POST['comment']);
    $arr = escapeAll([$name, $comments, $articleTitle], $conn);

    if ($name && $comments) {
        $insert = "INSERT INTO Comments (Name,Comment,article_title)
                    VALUES ('{$arr[$name]}', '{$arr[$comments]}', '{$arr[$articleTitle]}')";

        $result = mysqli_query($conn, $insert);
        if ($result) {
            echo "Success";
            redirect_to("viewArticle.php?title=" . $title);
        } else {
            echo mysqli_error($conn);
        }
    }
}
