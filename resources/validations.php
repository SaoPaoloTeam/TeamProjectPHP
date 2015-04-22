<?php
function processInput($input) {
$input = trim($input);
$input = strip_tags($input);
$input = stripslashes($input);
$input = htmlspecialchars($input);
return $input;
}