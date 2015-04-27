<?php
// load up your config file
require_once(realpath(dirname(__FILE__) . "/../resources/config.php"));
require_once(RESOURCES_PATH . "../app_controls/session.php");
//$config['db'];

//session_destroy();
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
            <?php if (isset($_GET['login']) && $_GET['login'] == 0): ?>
                <div id="login-failed"
                     style="display: none; background-color: RED; position: absolute; top: 8%; width: 200px; font-size: 35px; padding: 25px">
                    LOGIN FAILED
                </div>
                <script>$('#login-failed').fadeIn(500).delay(500).fadeOut(500); </script>
                <?php header("Refresh: 1.5, url=index.php"); ?>
            <?php endif; ?>

            <?php
            if (!isset($_SESSION['data'])) {
                $_SESSION['data'] = [];
                $queryArticles = "SELECT title, author, content, tag, published_at, status FROM Articles ORDER BY published_at DESC;";

                $selected = mysqli_query($conn, $queryArticles);
                if ($selected) {
                    while ($data = mysqli_fetch_assoc($selected)) {
                        if ($data['status'] == 'active') {
                            array_push($_SESSION['data'], $data);
                        }
                    }
                } else {
                    echo mysqli_error($conn);
                }

            }
            ?>
            <?php
            $display = 'all';
            $articleArray = [];
            if (isset($_GET['cat'])) {
                $display = $_GET['cat'];
                if ($display != 'all') {
                    $articleArray = sortByTags($display);
                } else {
                    $articleArray = $_SESSION['data'];
                }
            } else {
                $articleArray = $_SESSION['data'];
            }

            $articlesCount = count($articleArray);


            $articlesPerPage = 4;
            $totalPages = (int)ceil($articlesCount / $articlesPerPage);
            $currentPage = 0;
            if (isset($_GET['page'])) {
                $currentPage = htmlspecialchars($_GET['page']);
                $patt = "/\\D+/";
                if (preg_match($patt, $currentPage) > 0) {
                    echo "Don't try shit pls";
                } else {
                    $currentPage = (int)$currentPage;
                }
            }

            if ($currentPage == $totalPages - 1 && $articlesCount % $articlesPerPage != 0) {
                $articlesPerPage = $articlesCount % $articlesPerPage;
            }

            if (count($articleArray) > 0): ?>
                <?php for ($i = 0; $i < $articlesPerPage; $i++): ?>
                    <?php
                    $currIndex = $i + ($currentPage * 4);
                    $data = $articleArray[$currIndex];
                    $title = $data['title'];
                    $title = str_replace(' ', '+', $title);


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
                                <a href="viewArticle.php?title=<?php echo $title ?>">Read More</a>
                            </div>
                        </footer>
                    </article>
                <?php endfor; ?>
            <?php endif; ?>
            <section class="pages">
                <?php for ($p = 0; $p < $totalPages; $p++): ?>
                    <div class="page-div">
                        <a href="index.php?page=<?php echo $p; ?>&cat=<?php echo $display ?>" class="page-link">
                            <?php echo $p + 1; ?>
                        </a>
                    </div>
                <?php endfor; ?>
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
