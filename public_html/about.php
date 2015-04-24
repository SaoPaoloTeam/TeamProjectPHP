<?php
// load up your config file
require_once(realpath(dirname(__FILE__) . "/../resources/config.php"));
require_once(RESOURCES_PATH."../app_controls/session.php");
//$config['db'];    
?>

<div class="wrapper">

    <?php
    require_once(TEMPLATES_PATH . "/head.php");
    //require_once(TEMPLATES_PATH . "/header.php");
    if ($_SESSION['level'] == 0) {
        require_once(TEMPLATES_PATH . "/header.php");
    } else if ($_SESSION['level'] == 1) {
        require_once(TEMPLATES_PATH . "/headerLoggedIn.php");
    } else if ($_SESSION['level'] == 2) {
        require_once(TEMPLATES_PATH . "/adminHeader.php");
    }?>
    <main>
        <?php
        if ($_SESSION['level'] == 0) {
            require_once(TEMPLATES_PATH . "/aside-navigation.php");
        } else if ($_SESSION['level'] == 1) {
            require_once(TEMPLATES_PATH . "/aside-navigation.php");
        } else if ($_SESSION['level'] == 2) {
            require_once(TEMPLATES_PATH . "/aside-navigation-admin.php");
        }
        ?>

    <?php require_once(TEMPLATES_PATH . "/rightPanel.php"); ?>

    </main>
    <?php
    require_once(TEMPLATES_PATH . "/footer.php");
    ?>
</div>

<script src="js/user-functions.js"></script>
</body>
</html>