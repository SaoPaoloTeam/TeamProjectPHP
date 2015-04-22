

<!--NOT CHANGED SINCE TEMPLATE CREATION-->


<?php
    require_once(realpath(dirname(__FILE__) . "/../resources/config.php"));
    require_once(TEMPLATES_PATH . "/head.php");
    require_once(TEMPLATES_PATH . "/header.php");
?>
<main>
    <div id="content">
        <form action="register.php" method="post">
            <input type="text" name="username"/>
            <input type="password" name="password"/>
            <input type="password" name="rpassword"/>
            <input type="submit" name="submit"/>
        </form>
    </div>
    <?php require_once(TEMPLATES_PATH . "/rightPanel.php"); ?>
</main>
<?php require_once(TEMPLATES_PATH . "/footer.php"); ?>

<?php
    include_once('connection.php');
if (isset($_POST['submit'])) {
    $pass = md5(validate($_POST['password']));
    $rpass = md5(validate($_POST['rpassword']));
    $uname = validate($_POST['username']);
    if ($pass != $rpass) {
        die("Passwords do not match");
    }
    var_dump($uname);
    $uname = mysqli_real_escape_string($conn, $uname);
    $queryUser = "SELECT username FROM Users WHERE username = '$uname';";
    $selected = mysqli_query($conn, $queryUser);
    if ($selected->num_rows) {
        echo "user exists";
    } else {
        $date = new DateTime();
        $query = sprintf('INSERT INTO Users (username, password, reg_date)
                        VALUES ("%s", "%s", "%s")', mysqli_real_escape_string($conn, $uname),
            mysqli_real_escape_string($conn, $pass),
            mysqli_real_escape_string($conn, $date->getTimestamp()));

        $result = mysqli_query($conn, $query);
        var_dump($result);
    }


}
?>
</body>
</html>



<?php
