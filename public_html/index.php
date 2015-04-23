

<?php
// load up your config file
require_once(realpath(dirname(__FILE__) . "/../resources/config.php"));
require_once(RESOURCES_PATH."../app_controls/session.php");
//$config['db'];

require_once(TEMPLATES_PATH . "/head.php");
require_once(TEMPLATES_PATH . "/header.php");


?>

<header class="intro-header" style="background-image: url('img/home-bg.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1>Clean Blog</h1>
                    <hr class="small">
                    <span class="subheading">A Clean Blog Theme by Start Bootstrap</span>
                </div>
            </div>
        </div>
    </div>
</header>
<main>
    <?php require_once(TEMPLATES_PATH . "/content.php"); ?>
    <div id="content">
        <?php if ($_SESSION['level'] == 1): ?>

        <section class="post-article" style="width: 60%; height: 250px;">
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
                <article style="width: 100%">
                    <p style="width: 90%; height: auto">Title: <?php echo $data['title']; ?></p>
                    <p style="width: 90%; height: auto">Content: <?php echo $data['content']; ?></p>
                    <p style="width: 90%; height: auto">Author: <?php echo $data['author']; ?></p>
                </article>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
    <?php require_once(TEMPLATES_PATH . "/rightPanel.php"); ?>

</main>

<!--Loading Footer-->
<?php
require_once(TEMPLATES_PATH . "/footer.php");
?>

<script src="js/user-functions.js"></script>
</body>
</html>
