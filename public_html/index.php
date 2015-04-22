

<?php
// load up your config file
require_once(realpath(dirname(__FILE__) . "/../resources/config.php"));
require_once(RESOURCES_PATH."../app_controls/session.php");
//$config['db'];

require_once(TEMPLATES_PATH . "/head.php");
require_once(TEMPLATES_PATH . "/header.php");


?>
<main>
    <div id="content">
        <?php if ($_SESSION['level'] == 1): ?>
        
        <section class="post-article" style="width: 60%; height: 250px;">
            <div>
                <?php
                    echo "Hello," . $_SESSION['user'];
                    echo "<a href='../resources/app_controls/logout.php'>Logout</a>";
                ?>
            </div>
            <form action="../resources/app_controls/add_article.php" method="post">
                <input type="text" name="title" placeholder="Topic title.."/>
                <textarea name="content" cols="30" rows="10" placeholder="Topic text"></textarea>
                <input type="submit" name="topic-submit" value="Submit"/>
            </form>
        </section>
        <?php endif; ?>
    </div>





    <?php require_once(TEMPLATES_PATH . "/rightPanel.php"); ?>
</main>

<!--Loading Footer-->
<?php
require_once(TEMPLATES_PATH . "/footer.php");
?>


</body>
</html>
