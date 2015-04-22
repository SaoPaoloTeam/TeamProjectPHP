<?php
require_once(realpath(dirname(__FILE__) . "/../resources/config.php"));
require_once(TEMPLATES_PATH . "/head.php");
require_once(RESOURCES_PATH . "../app_controls/session.php");

require_once(RESOURCES_PATH . "/custom_functions.php");
?>

<?php if ($_SESSION['level'] == 2): ?>
    <?php echo "Hello, " . $_SESSION['user'];
    require_once(RESOURCES_PATH . "/adminFunctions.php");
    ?>

    <form method="post">
        <input class="main-btns" type="button" name="article_manager" value="Article manager" onclick="$('#test').load('../resources/templates/article-manager.php');$('test1').remove('#2')"/>
        <input class="main-btns" type="button" name="user_manager" value="User manager" onclick="$('#test').load('../resources/templates/user-manager.php');$('test').remove('#1')"/>

        <div id="test">
            <?php require_once(TEMPLATES_PATH . '/article-manager.php'); ?>
        </div>
        <script>


        </script>
    </form>





<?php else: ?>
    <?php
        redirect_to("index.php");
        exit();
    ?>

<?php endif ?>

<?php require_once(TEMPLATES_PATH . "/adminHeader.php"); ?>

<?php require_once(TEMPLATES_PATH . "/adminSidePanel.php"); ?>

<?php require_once(TEMPLATES_PATH . "/adminFooter.php"); ?>


<a href="../resources/app_controls/logout.php">Logout</a>

</body>
</html>

