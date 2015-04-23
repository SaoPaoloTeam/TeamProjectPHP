<?php
// load up your config file
require_once(realpath(dirname(__FILE__) . "/../resources/config.php"));
require_once(RESOURCES_PATH."../app_controls/session.php");
//$config['db'];

require_once(TEMPLATES_PATH . "/head.php");
require_once(TEMPLATES_PATH . "/header.php");
?>
<main>h1 Contacts</main>
<?php
require_once(TEMPLATES_PATH . "/footer.php");
?>
<script src="js/user-functions.js"></script>
</body>
</html>