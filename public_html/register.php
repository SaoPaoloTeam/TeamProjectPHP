

<!--NOT CHANGED SINCE TEMPLATE CREATION-->


<?php
    require_once(realpath(dirname(__FILE__) . "/../resources/config.php"));
    require_once(realpath(dirname(__FILE__) . "/../resources/validations.php"));
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
    $pass = md5(processInput($_POST['password']));
    $rpass = md5(processInput($_POST['rpassword']));
    $uname = processInput($_POST['username']);
    if ($pass != $rpass) {
        die("Passwords do not match");
    }
    var_dump($uname);
    $uname = mysqli_real_escape_string($conn, $uname);
    $timestamp = date('Y-m-d G:i:s');
    $queryUser = "SELECT username FROM Users WHERE username = '$uname';";
    $selected = mysqli_query($conn, $queryUser);

    if ($selected->num_rows) {
        echo "user exists";
    } else {

        $query = "INSERT INTO Users (username, password, reg_date)
                        VALUES ('{$uname}','{$pass}','{$timestamp}')";

        $result = mysqli_query($conn, $query);

    }


}
?>
</body>
</html>



<?php
