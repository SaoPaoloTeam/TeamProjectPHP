<?php

/*
    The important thing to realize is that the config file should be included in every
    page of your project, or at least any page you want access to these settings.
    This allows you to confidently use these settings throughout a project because
    if something changes such as your database credentials, or a path to a specific resource,
    you'll only need to update it here.
*/

$config = array(
    "db" => array(
        "dbname" => "sql374012",
        "username" => "sql374012",
        "password" => "hQ1*kD8%",
        "host" => "sql3.freemysqlhosting.net",
        "port" => "3306"
    ),

    "urls" => array(
        "baseUrl" => "http://example.com"
    ),
    "paths" => array(
        "resources" => $_SERVER["DOCUMENT_ROOT"] . "/resources",
        "images" => array(
            "content" => $_SERVER["DOCUMENT_ROOT"] . "/public_html/img/content",
            "layout" => $_SERVER["DOCUMENT_ROOT"] . "/public_html/img/layout"
        )
    )
);

$conn = mysqli_connect($config['db']['host'], $config['db']['username'], $config['db']['password'], $config['db']['dbname'], $config['db']['port']);


/*
    Creating constants for heavily used paths makes things a lot easier.
    ex. require_once(LIBRARY_PATH . "Paginator.php")
*/
defined("LIBRARY_PATH")
or define("LIBRARY_PATH", realpath(dirname(__FILE__) . '/library'));

defined("TEMPLATES_PATH")
or define("TEMPLATES_PATH", realpath(dirname(__FILE__) . '/templates'));

defined("RESOURCES_PATH")
or define("RESOURCES_PATH", realpath(dirname(__FILE__)));

defined("PUBLIC_PATH")
or define("PUBLIC_PATH", realpath(dirname(__DIR__)));


/*
    Error reporting.
*/
//ini_set("error_reporting", "true");
error_reporting(E_ALL | E_STRICT);



