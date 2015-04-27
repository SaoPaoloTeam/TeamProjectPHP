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
            <?php
            if (isset($_GET['title'])) {
                $currTitle = htmlspecialchars($_GET['title']);
                $patt = "/[^a-zA-Z0-9\\s-]/";
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

                $currTag = $data['tag'];

                $tag = "";
                switch ($currTag) {
                    case "nightwatch": $tag = "Night's Watch"; break;
                    case "freecities": $tag = "The Free Cities"; break;
                    case "dorne": $tag = "Dorne"; break;
                    case "iron": $tag = "The Iron Islands"; break;
                    case "north": $tag = "North"; break;
                    case "slaver":
                    default: $tag = "Slaver's Bay"; break;
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
                    <div class="author"><div class="author-black">Author:</div><div class="author-name"> <?php echo $data['author']; ?></div></div>
                    <div class="tag"><?php echo $tag; ?></div>
                    <div class="date"><?php echo $dateAdded ?></div>
                    <div class="read-more">
                        <a href="index.php">Back</a>
                    </div>
                </footer>
            </article>
            <section class="comments-holder">
                <?php
               $_SESSION['currentTitle'] = $data['title'];

                include_once('comments.php');
                ?>
            </section>

        </section>
        <?php require_once(TEMPLATES_PATH . "/rightPanel.php"); ?>

    </main>
    <!--Loading Footer-->
    <?php require_once(TEMPLATES_PATH . "/footer.php"); ?>
</div>
<script src="js/user-functions.js"></script>
</body>
</html>
