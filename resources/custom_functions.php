<?php
require_once("config.php");


function redirect_to($new_location)
{
    header('Location:' . $new_location);
    exit;
}


function escapeAll($arr,$conn){

    $finalArr = [];
    foreach ($arr as $value) {
        $finalArr[$value] = mysqli_real_escape_string($conn,$value);
    }

    return $finalArr;

}