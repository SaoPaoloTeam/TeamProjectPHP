<?php
// load up your config file
require_once(realpath(dirname(__FILE__) . "/../resources/config.php"));
require_once(RESOURCES_PATH . "../app_controls/session.php");
//$config['db'];


?>
<div class="wrapper">

    <?php
    require_once(TEMPLATES_PATH . "/head.php");
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
        <div class="contact">


            <div class="contact-info">
                <h1>Contact us</h1>
                <input type="text" placeholder="Your name"/>
                <input type="text" placeholder="Your email"/>
                <textarea name="" id="" cols="30" rows="10"></textarea>
                <input type="submit" value="Submit"/>
            </div>
            <div class="cordinates-info">
                <div class="google-maps">
<!--                    <iframe-->
<!--                        src="https://www.google.com/maps/embed/v1/place?q=%D0%9F%D0%B5%D1%80%D0%BD%D0%B8%D0%BA%2C%20%D0%91%D1%8A%D0%BB%D0%B3%D0%B0%D1%80%D0%B8%D1%8F&amp;key=AIzaSyAaTxuZ2oohv1WB2CWFxt3OzWZJgzrHw0k"></iframe>-->
                </div>

                <div class="coordinates">
                    <h3>Find us:</h3>
                    <ul class="info">
                        <li></li>
                        <li><span>Phone:</span> +359 888 859 859</li>
                        <li><span>Post code:</span>XXX</li>
                        <li><span>Email:</span> GOT@HBO.com</li>
                    </ul>
                </div>
            </div>
        </div>

        <?php require_once(TEMPLATES_PATH . "/rightPanel.php"); ?>


    </main>
    <?php
    require_once(TEMPLATES_PATH . "/footer.php");
    ?>
</div>

<script src="js/user-functions.js"></script>
</body>
</html>