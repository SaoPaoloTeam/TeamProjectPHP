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


<!--<input class="main-btns" type="button" name="article_manager" value="Article manager"-->
<!--       onclick="$('#container').load('../resources/templates/article-manager.php');$('test1').remove('#content-manager')"/>-->
<!--<input class="main-btns" type="button" name="user_manager" value="User manager"-->
<!--       onclick="$('#container').load('../resources/templates/user-manager.php');$('test').remove('#article-manager')"/>-->



<div class="wrapper">
    <?php
    if ($_SESSION['level'] == 0) {
        require_once(TEMPLATES_PATH . "/header.php");
    } else if ($_SESSION['level'] == 1) {
        require_once(TEMPLATES_PATH . "/headerLoggedIn.php");
    } else if ($_SESSION['level'] == 2) {
        require_once(TEMPLATES_PATH . "/adminHeader.php");
    }
    ?>
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
        <section class="content-holder">

            <section class="btns-holder">
            <input class="main-btns" type="button" name="article_manager" value="Article manager"
                   onclick="showArticleManager(),showMenu('table-articles')"/>
            <input class="main-btns" type="button" name="user_manager" value="User manager"
                   onclick="showUserManager()"/>
            <input class="main-btns" type="button" name="create_new" value="Create new article"
                   onclick="showCreateNewArticle()"/>
            </section>


            <?php require_once(TEMPLATES_PATH . '/article-manager.php'); ?>
            <?php require_once(TEMPLATES_PATH . "/user-manager.php") ?>


            <div id="form-div" style="display: none">
                <form action="../resources/app_controls/add_article.php" method="post">
                    <label for="">Title</label>
                    <input type="text" name="title" placeholder="Topic title.."/>
                    <label for="">Content</label>
                    <textarea name="content" cols="30" rows="10" placeholder="Topic text"></textarea>
                    <select name="tags">
                        <option value="nightwatch">Night's Watch</option>
                        <option value="dorne">Dorne</option>
                        <option value="north">North</option>
                        <option value="freecities">The Free Cities</option>
                        <option value="slaver">Slaver's Bay</option>
                        <option value="iron">The Iron Islands</option>
                    </select>
                    <input type="submit" name="topic-submit" value="Publish"/>
                </form>
            </div>
        </section>

        <?php require_once(TEMPLATES_PATH . '/rightPanel.php'); ?>
    </main>

    <?php require_once(TEMPLATES_PATH . "/footer.php"); ?>
</div>




    </body>
    </html>

