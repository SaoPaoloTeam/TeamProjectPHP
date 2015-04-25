<?php

require_once(realpath(dirname(__FILE__) . "/../resources/config.php"));
require_once(realpath(dirname(__FILE__) . "/../resources/comments.php"));
require_once(RESOURCES_PATH."../app_controls/session.php");
require_once(RESOURCES_PATH . "/custom_functions.php");
require_once(RESOURCES_PATH . "/validations.php");




$editing = false;

//$publisher = $_SESSION['publisher']; //Must be dynamically set to the current user

$publisher = $_SESSION['user'];

switch ($_SESSION['level']) {
	case 0:
	$userLevel = 'Guest';
	break;
	case 1:
	$userLevel = 'User';
	break;
	case 2:
	$userLevel = 'Admin';
	break;	
	default:
	$userLevel = 'Guest';
	break;
}

$articleTitle = $_SESSION['currentTitle']; //Must be a dynamically received article title$articleTitle = 'Article Number Four';



if (isset($_POST['comment-submit'])) {
    $name = $publisher;
    $comments = processInput($_POST['comment']);
    $arr = escapeAll([$name, $comments, $articleTitle], $conn);

	if($name && $comments) {
        $insert = "INSERT INTO Comments (Name,Comment,article_title)
                    VALUES ('{$arr[$name]}', '{$arr[$comments]}', '{$arr[$articleTitle]}')";

        $result = mysqli_query($conn, $insert);
        if ($result) {
            echo "Success";
        } else {
            echo mysqli_error($conn);
        }
    }

}
?>
<div id="wrapper-comm">


<?php

$sql="SELECT id, Name, Comment, published_at FROM Comments WHERE article_title LIKE '$articleTitle'";

$rs=$conn->query($sql);	

$commAsArr = $rs->fetch_all(MYSQLI_ASSOC);

foreach($commAsArr as $row): ?>
<h5>Posted by: <?= $row['Name'] ?></h5>
<p class="comment-date"><?= date("j F Y", strtotime($row['published_at'])) ?></p>
<hr size="1"/>
<?= $row['Comment'] ?> 


<?php if(($userLevel == 'User' || $userLevel == 'Admin') && $row['Name'] == $publisher): ?>
	<?php $editing = true; $_SESSION['idComm'] = $row['id']; $placeholder = $row['Comment'];?>
	<form action="comments_edit.php" method="post">
		<input id="postEdit" type="submit" name="edit" value="Edit">
	</form>
	
<?php endif; ?>
<?php endforeach; ?>

<?php
if($userLevel == 'Admin' || $userLevel == 'User' ):?>
    <div>
        <form action="comments_edit.php" method="POST" id="editing">
            <p>Your Name: <?= $publisher ?> </p>
            <label for="comment">Comment:</label>

            <textarea name="comment" rows="10" cols="50"></textarea>
            <input type="submit" name="comment-submit" value="Comment">
        </form>
    </div>
<?php endif; ?>

</div>
</body>
</html>