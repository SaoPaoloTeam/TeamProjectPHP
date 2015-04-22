<?php
require_once("config.php");

//Redirects to location of choice
function redirect_to($new_location)
{
    header('Location:' . $new_location);
    exit;
}

//Doing mysqli_real_escape_string() to multiple data
//$arr is the array passed to escape and $conn is the default connection from config.php
function escapeAll($arr,$conn){
    $finalArr = [];
    foreach ($arr as $value) {
        $finalArr[$value] = mysqli_real_escape_string($conn,$value);
    }
    return $finalArr;
}
