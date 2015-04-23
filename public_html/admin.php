<?php
require_once(realpath(dirname(__FILE__) . "/../resources/config.php"));
require_once(TEMPLATES_PATH . "/head.php");
require_once(RESOURCES_PATH . "../app_controls/session.php");
require_once(RESOURCES_PATH . "/custom_functions.php");
?>

<?php if ($_SESSION['level'] == 2): ?>
    <?php ;
    require_once(RESOURCES_PATH . "/adminFunctions.php");
    ?>

<?php else: ?>
    <?php
    redirect_to("index.php");
    exit();
    ?>
<?php endif ?>

<?php require_once(TEMPLATES_PATH . "/adminHeader.php"); ?>

<!--<input class="main-btns" type="button" name="article_manager" value="Article manager"-->
<!--       onclick="$('#container').load('../resources/templates/article-manager.php');$('test1').remove('#content-manager')"/>-->
<!--<input class="main-btns" type="button" name="user_manager" value="User manager"-->
<!--       onclick="$('#container').load('../resources/templates/user-manager.php');$('test').remove('#article-manager')"/>-->

<input class="main-btns" type="button" name="article_manager" value="Article manager"
       onclick="showArticleManager()"/>
<input class="main-btns" type="button" name="user_manager" value="User manager"
       onclick="showUserManager()"/>
<input class="main-btns" type="button" name="create_new" value="Create new article"
       onclick="showCreateNewArticle()"/>

<section id="container">
    <?php require_once(TEMPLATES_PATH . '/article-manager.php'); ?>
</section>

    <section>

        <div id="form-div" style="display: none">
            <form action="../resources/app_controls/add_article.php" method="post">
                <input type="text" name="title" placeholder="Topic title.."/>
                <textarea name="content" cols="30" rows="10" placeholder="Topic text"></textarea>
                <select name="tags">
                    <option value="nightwatch">Night's Watch</option>
                    <option value="dorne">Dorne</option>
                    <option value="north">North</option>
                    <option value="freecities">The Free Cities</option>
                    <option value="slaver">Slaver's Bay</option>
                    <option value="iron">The Iron Islands</option>
                </select>
                <input type="submit" name="topic-submit" value="Submit"/>
            </form>
        </div>
    </section>
<?php require_once(TEMPLATES_PATH . "/article-manager.php") ?>
<?php require_once(TEMPLATES_PATH . "/user-manager.php") ?>
<?php require_once(TEMPLATES_PATH . "/adminSidePanel.php"); ?>
<?php require_once(TEMPLATES_PATH . "/adminFooter.php"); ?>

</body>
</html>

