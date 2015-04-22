<?php
require_once(realpath(dirname(__FILE__) . "/../resources/config.php"));

if (!$conn) {
    die("error");
}


//echo "success<br>";

//$sql = "CREATE TABLE Users (
//    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//username VARCHAR(30) NOT NULL,
//password VARCHAR(64) NOT NULL,
//reg_date TIMESTAMP
//)";
//
//$query = mysqli_query($conn, $sql);
//
//if ($query) {
//    echo "successfully created";
//} else {
//    echo "failed";
//}

//$date = time();
//$name = "Gosho";
//$pass = md5("pesho");
//
////$query = sprintf('INSERT INTO Users (username, password, reg_date)
////VALUES ("%s", "%s", "%s")', mysqli_real_escape_string($conn, $name),
////    mysqli_real_escape_string($conn, $pass),
////    mysqli_real_escape_string($conn, $date));
////
////$result = mysqli_query($conn, $query);
////
////if ($result) {
////    echo "inserted";
////} else {
////    echo mysqli_error($conn);
//
//
//$query = "SELECT * FROM Users";
//$result = mysqli_query($conn, $query);
//
//
//
//if ($result) {
//    $output = mysqli_fetch_assoc($result);
//    var_dump($result);
//} else {
//    echo mysqli_error($conn);
//}