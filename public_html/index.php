<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MADA FAKAAA</title>
</head>
<body>

<?php
// load up your config file
require_once(realpath(dirname(__FILE__) . "/../resources/config.php"));
$config['db'];

//Loading Header
require_once(TEMPLATES_PATH . "/header.php");


?>
<div id="container">
    <div id="content">
        <!-- content -->
    </div>
    <?php


    //TEST THE VARIABLES IN CONFIG FILE :)))
    echo "<br><br><p>Test the folders</p>";
    echo $config['paths']['resources'] . '<br>';
    echo $config['paths']['images']['content'];
    echo "<p>Test the folders</p><br><br>";
    //TEST THE VARIABLES IN CONFIG FILE :)))


    require_once(TEMPLATES_PATH . "/rightPanel.php");
    ?>
</div>

<!--Loading Footer-->
<?php
require_once(TEMPLATES_PATH . "/footer.php");
?>


</body>
</html>
