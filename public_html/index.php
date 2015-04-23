

<?php
// load up your config file
require_once(realpath(dirname(__FILE__) . "/../resources/config.php"));
require_once(RESOURCES_PATH."../app_controls/session.php");
//$config['db'];

require_once(TEMPLATES_PATH . "/head.php"); ?>

<div class="wrapper">
    <?php
    if($_SESSION['level']==0){
        require_once(TEMPLATES_PATH . "/header.php");
    }else if($_SESSION['level']==1) {
        require_once(TEMPLATES_PATH . "/headerLoggedIn.php");
    }
    else if($_SESSION['level']==2){
        require_once(TEMPLATES_PATH . "/adminHeader.php");
    }

    ?>

<main>
    <section class="content-holder">


        <?php
        if (!isset($_SESSION['data'])) {
            $_SESSION['data'] = [];
            $queryArticles = "SELECT title, author, content, tag FROM Articles;";
            $selected = mysqli_query($conn, $queryArticles);
            if($selected) {
                while ($data = mysqli_fetch_assoc($selected)) {
                    array_push($_SESSION['data'], $data);
                }
            } else {
                echo mysqli_error($conn);
            }
        }
        ?>
        <?php
        $articlesCount = count($_SESSION['data']);
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
        if ($currentPage == $totalPages - 1) {
            $articlesPerPage = $articlesCount % $articlesPerPage;
        }

        ?>
        <?php if (count($_SESSION['data']) > 0): ?>
            <?php for($i = 0; $i < $articlesPerPage; $i++): ?>
                <?php
                    $currIndex = $i + ($currentPage * 4);
                    $data = $_SESSION['data'][$currIndex];
                ?>
                <article class="topic">
                    <header><?php echo $data['title']; ?></header>
                    <p class="topic-content"><?php echo $data['content']; ?></p>
                    <footer>
                        <div class="author">Author: <?php echo $data['author']; ?></div>
                        <div class="tag"><?php echo $data['tag']; ?></div>
                        <div class="read-more">
                            <a href="#">Read More</a>
                        </div>
                    </footer>
                </article>
            <?php endfor; ?>
        <?php endif; ?>
        <section class="pages">
            <?php for($p = 0; $p < $totalPages; $p++): ?>
                <div class="page-div">
                    <a href="index.php?page=<?php echo $p; ?>" class="page-link">
                        <?php echo $p + 1;?>
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
