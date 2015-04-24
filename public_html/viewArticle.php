<?php
// load up your config file
require_once(realpath(dirname(__FILE__) . "/../resources/config.php"));
require_once(RESOURCES_PATH . "../app_controls/session.php");
//$config['db'];

require_once(TEMPLATES_PATH . "/head.php"); ?>

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
        <section class="content-holder">
            <?php
            if (isset($_GET['title'])) {
                $currTitle = htmlspecialchars($_GET['title']);
                $patt = "/[^a-zA-Z0-9\\s]/";
                if (preg_match($patt, $currTitle) > 0) {
                    echo "not a valid article name";
                    header("Refresh: 1.5, url=index.php");
                    exit();
                }
                $data = [];
                foreach ($_SESSION['data'] as $index) {
                    $temp = array_search($currTitle, $index);
                    if ($temp) {
                        $data = $index;
                        break;
                    }
                }
                if (!$data) {
                    echo "no results";
                    header("Refresh: 1.5, url=index.php");
                    exit();
                }
            }
            ?>
            <?php
            $dateAdded = date('jS M, Y', DateTime::createFromFormat('Y-m-d H:i:s', $data['published_at'])->getTimestamp());
            ?>
            <article class="topic">
                <header><?php echo $data['title']; ?></header>
                <p class="topic-content"><?php echo $data['content']; ?></p>
                <footer>
                    <div class="author">Author: <?php echo $data['author']; ?></div>
                    <div class="tag"><?php echo $data['tag']; ?></div>
                    <div class="date"><?php echo $dateAdded ?></div>
                    <div class="read-more">
                        <a href="index.php">Back</a>
                    </div>
                </footer>
            </article>

        </section>
        <?php require_once(TEMPLATES_PATH . "/rightPanel.php"); ?>

    </main>
    <!--Loading Footer-->
    <?php require_once(TEMPLATES_PATH . "/footer.php"); ?>
</div>
<script src="js/user-functions.js"></script>
</body>
</html>
