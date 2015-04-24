<?php
require_once(realpath(dirname(__FILE__) . "/../config.php"));



if (isset($_GET['hideArticle'])) {
    $id = intval($_GET['hideArticle']);
    $queryDeactivate = "UPDATE Articles ";
    $queryDeactivate .= "SET status='inactive' ";
    $queryDeactivate .= "WHERE id=$id";
    $result =mysqli_query($conn, $queryDeactivate);
    if ($result) {
        echo "SUCCESS";
    } else {
        echo mysqli_error($conn);
    }

}

if (isset($_GET['showArticle'])) {
    $id = intval($_GET['showArticle']);
    $queryDeactivate = "UPDATE Articles ";
    $queryDeactivate .= "SET status='active' ";
    $queryDeactivate .= "WHERE id=$id";
    $result =mysqli_query($conn, $queryDeactivate);
    if ($result) {
        echo "SUCCESS";
    } else {
        echo mysqli_error($conn);
    }
}


if (isset($_GET['deactivateUser'])) {
    $id = intval($_GET['deactivateUser']);
    $queryDeactivate = "UPDATE Users ";
    $queryDeactivate .= "SET status='inactive' ";
    $queryDeactivate .= "WHERE id=$id";
    $result =mysqli_query($conn, $queryDeactivate);
    if ($result) {
        echo "SUCCESS";
    } else {
        echo mysqli_error($conn);
    }

}

if (isset($_GET['activateUser'])) {
    $id = intval($_GET['activateUser']);
    $queryActivate = "UPDATE Users ";
    $queryActivate .= "SET status='active' ";
    $queryActivate .= "WHERE id=$id";
    $result =mysqli_query($conn, $queryActivate);
    if ($result) {
        echo "SUCCESS";
    } else {
        echo mysqli_error($conn);
    }

}