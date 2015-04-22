

<!--NOT CHANGED SINCE TEMPLATE CREATION-->


<?php
    require_once(realpath(dirname(__FILE__) . "/../resources/config.php"));
    require_once(realpath(dirname(__FILE__) . "/../resources/validations.php"));
    require_once(realpath(dirname(__FILE__) . "/../resources/custom_functions.php"));

    require_once(TEMPLATES_PATH . "/head.php");
    require_once(TEMPLATES_PATH . "/header.php");
?>
<main>
    <div id="content">
        <form action="register.php" method="post">
            Name:
            <input type="text" name="username"/>
            Pass:
            <input type="password" name="password"/>
            Repeat pass:
            <input type="password" name="rpassword"/>
            Email:
            <input type="email" name="email"/>
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
    $email = processInput($_POST['email']);
    if ($pass != $rpass) {
        die("Passwords do not match");
    }
    var_dump($uname);

    $arr = escapeAll([$uname, $pass, $rpass, $email], $conn);
//    $uname = mysqli_real_escape_string($conn, $uname);
//    $pass = mysqli_real_escape_string($conn,$pass);
//    $pass = mysqli_real_escape_string($conn,$rpass);

    $timestamp = date('Y-m-d G:i:s');
    $queryUser = "SELECT username FROM Guests WHERE username = '$uname';";
    $selected = mysqli_query($conn, $queryUser);

    if ($selected->num_rows) {
        echo "user exists";
    } else {

        $query = "INSERT INTO Guests (username, password, email, reg_date)
                        VALUES ('{$arr[$uname]}','{$arr[$pass]}','{$arr[$email]}','{$timestamp}')";

        $result = mysqli_query($conn, $query);
        if ($result) {
            echo "Success";
        } else {
            echo mysqli_error($conn);
        }

    }
}
?>
</body>
</html>



<?php
