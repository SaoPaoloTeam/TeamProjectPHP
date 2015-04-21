

<?php
// load up your config file
require_once(realpath(dirname(__FILE__) . "/../resources/config.php"));
//$config['db'];

require_once(TEMPLATES_PATH . "/head.php");
require_once(TEMPLATES_PATH . "/header.php");


?>
<main>
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
</main>

<!--Loading Footer-->
<?php
require_once(TEMPLATES_PATH . "/footer.php");
?>


</body>
</html>
