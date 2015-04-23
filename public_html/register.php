<!--NOT CHANGED SINCE TEMPLATE CREATION-->


<?php
require_once(realpath(dirname(__FILE__) . "/../resources/config.php"));
require_once(RESOURCES_PATH . "/validations.php");
require_once(RESOURCES_PATH . "/custom_functions.php");

require_once(TEMPLATES_PATH . "/head.php");
require_once(TEMPLATES_PATH . "/header.php");

?>

<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-image: url('img/home-bg.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1>Clean Blog</h1>
                    <hr class="small">
                    <span class="subheading">A Clean Blog Theme by Start Bootstrap</span>
                </div>
            </div>
        </div>
    </div>
</header>
<main>

    <form action="register.php" method="post" class="form-horizontal" role="form">
        <div class="form-group col-xs-8">
            <label for="" class="control-label col-xs-4">Name</label>

            <div class="col-xs-8"><input type="text" name="username" class="form-control"/></div>

        </div>
        <div class="form-group col-xs-8">
            <label for="" class="control-label col-xs-4">Password</label>

            <div class="col-xs-8"><input type="password" name="password" class="form-control"/></div>
        </div>
        <div class="form-group col-xs-8">
            <label for="" class="control-label col-xs-4">Repeat Password</label>
            <div class="col-xs-8"><input type="password" name="rpassword" class="form-control"/</div>
        </div>
        <div class="form-group col-xs-10">
            <label for="" class="control-label col-xs-4">Email</label>
            <div class="col-xs-8"><input type="email" name="email" class="form-control"/></div>
        </div>

            <div class="col-xs-10"><input type="submit" name="submit" class="btn btn-primary"/></div>

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



<?php
