<?php
// load up your config file
require_once(realpath(dirname(__FILE__) . "/../resources/config.php"));
require_once(RESOURCES_PATH."../app_controls/session.php");
//$config['db'];
<<<<<<< HEAD

require_once(TEMPLATES_PATH . "/head.php");
require_once(TEMPLATES_PATH . "/header.php");
?>
<main class="about-page">
    <h1>About us</h1>
   <p>&ensp;&ensp;Game of Thrones is an American fantasy drama television series created for HBO by showrunners David Benioff and D. B. Weiss. It is an adaptation of A Song of Ice and Fire, George R. R. Martin's series of fantasy novels, the first of which is titled A Game of Thrones. Filmed in a Belfast studio and on location elsewhere in Northern Ireland, Croatia, Iceland, Morocco, Spain, Malta, Scotland, and the United States, it premiered on HBO in the United States on April 17, 2011. Two days after the fourth season premiered in April 2014, HBO renewed Game of Thrones for a fifth and sixth season. The fifth season premiered on April 12, 2015.

       The series, set on the fictional continents of Westeros and Essos at the end of a decade-long summer, interweaves several plot lines with a broad ensemble cast. The first narrative arc follows a civil war among several noble houses for the Iron Throne of the Seven Kingdoms; the second covers the rising threat of the impending winter and the legendary creatures and fierce peoples of the North; the third chronicles the attempts of the exiled last scion of the realm's deposed ruling dynasty to reclaim the throne.</p>
    <p>&ensp;&ensp;Game of Thrones has attracted record numbers of viewers on HBO and obtained an exceptionally broad and active international fan base. It received widespread acclaim by critics, although its frequent use of nudity, violence and sexual violence towards women has attracted criticism. The series has won numerous awards and nominations, including a Primetime Emmy Award nomination for Outstanding Drama Series for its first four seasons, a Golden Globe Award nomination for Best Television Series – Drama, a Hugo Award for Best Dramatic Presentation in both Long Form and Short Form, and a Peabody Award. Among the ensemble cast, Peter Dinklage has won an Emmy and a Golden Globe for his performance as Tyrion Lannister.</p>
</main>
<?php
require_once(TEMPLATES_PATH . "/footer.php");
=======
>>>>>>> a52a9975238ec681490aaf948ff3169ee3500ede
?>

<div class="wrapper">

    <?php
    require_once(TEMPLATES_PATH . "/head.php");
    //require_once(TEMPLATES_PATH . "/header.php");
    if ($_SESSION['level'] == 0) {
        require_once(TEMPLATES_PATH . "/header.php");
    } else if ($_SESSION['level'] == 1) {
        require_once(TEMPLATES_PATH . "/headerLoggedIn.php");
    } else if ($_SESSION['level'] == 2) {
        require_once(TEMPLATES_PATH . "/adminHeader.php");
    }?>
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

    <?php require_once(TEMPLATES_PATH . "/rightPanel.php"); ?>

    </main>
    <?php
    require_once(TEMPLATES_PATH . "/footer.php");
    ?>
</div>

<script src="js/user-functions.js"></script>
</body>
</html>