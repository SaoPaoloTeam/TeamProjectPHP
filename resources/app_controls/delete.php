<?php
require_once(realpath(dirname(__FILE__) . "/../config.php"));


if (isset($_GET['delete'])) {

    $id =intval($conn, $_GET['delete']);
    $query = "DELETE FROM Articles WHERE id=$id; ";
    mysqli_query($conn, $query);



    if ($result) {
        echo "SUCCESS";

    } else {
        echo mysqli_error($conn);
    }

}