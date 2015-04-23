<!--NOT CHANGED SINCE TEMPLATE CREATION-->


<?php
require_once(realpath(dirname(__FILE__) . "/../resources/config.php"));
require_once(RESOURCES_PATH . "/validations.php");
require_once(RESOURCES_PATH . "/custom_functions.php");

require_once(TEMPLATES_PATH . "/head.php");
require_once(TEMPLATES_PATH . "/header.php");

?>

<main>
    <form action="register.php" method="post">
        <input type="text" name="username"/>
        <input type="password" name="password"/>
        <input type="password" name="rpassword"/>
        <input type="email" name="email"/>
        <input type="submit" name="submit"/>
    </form>

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
    $status = 'active';
    $level = 1;
    if ($pass != $rpass) {
        die("Passwords do not match");
    }
    var_dump($uname);

    $arr = escapeAll([$uname, $pass, $rpass, $email, $status, $level], $conn);
    $timestamp = date('Y-m-d G:i:s');

    //check whether a user exists
    $queryUser = "SELECT username FROM Users WHERE username = '$uname';";
    $selected = mysqli_query($conn, $queryUser);

    if ($selected->num_rows) {
        echo "user exists";
    } else {
        //create new user
        $query = "INSERT INTO Users (username, password, email, reg_date, status, level)
                        VALUES ('{$arr[$uname]}','{$arr[$pass]}','{$arr[$email]}','{$timestamp}', '{$arr[$status]}', '{$arr[$level]}')";

        $result = mysqli_query($conn, $query);
        if ($result) {
            echo "Success";
        } else {
            echo mysqli_error($conn);
        }
    }
}
?>

<!--Loading Footer-->
<?php
require_once(TEMPLATES_PATH . "/footer.php");
?>
</body>
</html>




