

<?php
// load up your config file
require_once(realpath(dirname(__FILE__) . "/../resources/config.php"));
require_once(RESOURCES_PATH."../app_controls/session.php");
//$config['db'];

require_once(TEMPLATES_PATH . "/head.php"); ?>

<div class="wrapper">
<?php require_once(TEMPLATES_PATH . "/header.php"); ?>

<main>
    <section class="content-holder">
    <?php if ($_SESSION['level'] == 1): ?>
        <section>
            <div>
                <?php
                    echo "Hello," . $_SESSION['user'];
                    echo "<a href='../resources/app_controls/logout.php'>Logout</a>";
                ?>
                <div onclick="showMenu()">Write new</div>
            </div>
            <div id="form-div" style="display: none">
                <form action="../resources/app_controls/add_article.php" method="post">
                    <input type="text" name="title" placeholder="Topic title.."/>
                    <textarea name="content" cols="30" rows="10" placeholder="Topic text"></textarea>
                    <input type="submit" name="topic-submit" value="Submit"/>
                </form>
            </div>
        </section>
        <?php endif; ?>
        <?php
        $queryArticles = "SELECT title, author, content FROM Articles;";
        $selected = mysqli_query($conn, $queryArticles);
        ?>
        <?php if ($selected): ?>
            <?php while($data = mysqli_fetch_assoc($selected)): ?>
                <article class="topic">
                    <header><?php echo $data['title']; ?></header>
                    <p class="topic-content"><?php echo $data['content']; ?></p>
                    <footer>
                        <div class="author">Author: <?php echo $data['author']; ?></div>
                        <div class="read-more">
                            <a href="#">Read More</a>
                        </div>
                    </footer>
                </article>
            <?php endwhile; ?>
        <?php endif; ?>
    </section>
    <?php require_once(TEMPLATES_PATH . "/rightPanel.php"); ?>

</main>

<!--Loading Footer-->
<?php
require_once(TEMPLATES_PATH . "/footer.php");
?>
</div>
<script src="js/user-functions.js"></script>
</body>
</html>
