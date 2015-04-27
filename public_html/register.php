<!--NOT CHANGED SINCE TEMPLATE CREATION-->
<?php
require_once(realpath(dirname(__FILE__) . "/../resources/config.php"));
require_once(RESOURCES_PATH . "/validations.php");
require_once(RESOURCES_PATH . "/custom_functions.php");
require_once(TEMPLATES_PATH . "/head.php");
?>

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
        if (isset($_GET['regfail'])):
        $err = $_GET['regfail'];
        if ($err == 'passfail'):
    ?>
        <div id="pass-match"
             style="display: none; background-color: RED; position: absolute; top: 8%; width: 200px; font-size: 25px; padding: 25px">
            PASSWORDS DO NOT MATCH OR TOO SHORT!
        </div>
        <script>$('#pass-match').fadeIn(500).delay(1000).fadeOut(500); </script>
        <?php header("Refresh: 2.5, url=register.php");

    elseif ($err == 'namefail'): ?>
        <div id="name-fail"
             style="display: none; background-color: RED; position: absolute; top: 8%; width: 200px; font-size: 25px; padding: 25px">
            NAME MUST CONTAIN LETTERS AND DIGITS ONLY OR TOO SHORT!
        </div>
        <script>$('#name-fail').fadeIn(500).delay(1000).fadeOut(500); </script>
        <?php header("Refresh: 2.5, url=register.php");

    elseif ($err == 'mailfail'): ?>
        <div id="mail-fail"
             style="display: none; background-color: RED; position: absolute; top: 8%; width: 200px; font-size: 25px; padding: 25px">
            NOT A VALID EMAIL
        </div>
        <script>$('#mail-fail').fadeIn(500).delay(1000).fadeOut(500); </script>
        <?php header("Refresh: 2.5, url=register.php");


        endif;
        endif;
    ?>


    <?php
    if ($_SESSION['level'] == 0) {
        require_once(TEMPLATES_PATH . "/aside-navigation.php");
    } else if ($_SESSION['level'] == 1) {
        require_once(TEMPLATES_PATH . "/aside-navigation.php");
    } else if ($_SESSION['level'] == 2) {
        require_once(TEMPLATES_PATH . "/aside-navigation-admin.php");
    }
    ?>

    <form action="../resources/app_controls/reg-user.php" method="post" class="register-form">
        <div class="reg-input-holder"><input type="text" name="username" placeholder="Name"/></div>
        <div class="reg-input-holder"><input type="password" name="password" placeholder="Password"/></div>
        <div class="reg-input-holder"><input type="password" name="rpassword" placeholder="Repeat password"/></div>
        <div class="reg-input-holder"><input type="email" name="email" placeholder="Email"/></div>
        <div class="reg-input-holder"><input type="submit" name="submit" value="Join the Night's Watch!"/></div>
    </form>

    <?php require_once(TEMPLATES_PATH . "/rightPanel.php"); ?>
</main>
    <?php require_once(TEMPLATES_PATH . "/footer.php"); ?>
</div>

<?php
require_once(TEMPLATES_PATH . "/footer.php");
?>
</body>
</html>








