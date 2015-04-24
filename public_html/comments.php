<?php

require_once(realpath(dirname(__FILE__) . "/../resources/config.php"));
require_once(realpath(dirname(__FILE__) . "/../resources/comments.php"));
require_once(RESOURCES_PATH."../app_controls/session.php");
require_once(RESOURCES_PATH . "/validations.php");
require_once(TEMPLATES_PATH . "/head.php");

if(!isset($_SESSION['idComm'])){
	$_SESSION['idComm'] = -1;
}

if (isset($_POST['name'])) {
	$name=processInput($_POST['name']);
}
if (isset($_POST['name'])) {
	$email=processInput($_POST['email']);
}
if (isset($_POST['comment'])) {
	$comments=processInput($_POST['comment']);
}
$submit=isset($_POST['submit']);

$_SESSION['level'] = 1;


$editing = false;

//$publisher = $_SESSION['publisher']; //Must be dynamically set to the current user

$publisher = 'Toto';

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

$articleTitle = 'Article Number Three'; //Must be a dynamically received article title
$articleTitle = 'Article Number Four';

if($submit)

{
	if($name && $comments && $email)
	{
		$insert = "INSERT INTO Comments (Name,Comment,article_title, email) VALUES ('$name', '$comments', '$articleTitle', '$email')";

		$conn->query($insert);

	}
	elseif($name && $comments)
	{
		$insert = "INSERT INTO Comments (Name, Comment, article_title) VALUES ('$name', '$comments', '$articleTitle')";
		$conn->query($insert);;
	}
	else
	{
		echo "please fill out all fields";
	}
}
?>
<div id="wrapper-comm">
	<?php if($userLevel == 'Guest'):?>
	<div>
		<h4>You are not logged in. To write a post you must provide an email or use our form to log in. </h4>
		<form action="commentindex.php" method="POST">
			<label for="name">Your Name:</label> <input type="text" name="name"/>
			<label for="email">Your Email:</label> <input type="text" name="email"/>
			<label for="comment">Comment:</label>
			<textarea name="comment" rows="10" cols="50"></textarea>
			<input type="submit" name="submit" value="Comment">
		</form>
	</div>
<?php elseif ($userLevel == 'User'): ?>
	<div>
		<form action="commentindex.php" method="POST" id="editing">
			<p>Your Name: <?= $publisher ?> </p>
			<label for="comment">Comment:</label>

			<textarea name="comment" rows="10" cols="50"><?php
				if ($editing) {
					echo $placeholder;
				}
			 $placeholder; ?>

			</textarea>
			<input type="submit" name="edit" value="Edit">
		</form>
	</div>
<?php elseif ($userLevel == 'Admin'): ?>
	<div id="wrapper-comments">
		<form action="commentindex.php" method="POST">
			<p>Your Name:  </p>
			<label for="comment">Comment:</label>
			<textarea name="comment" rows="10" cols="50"></textarea>
			<input type="submit" name="edit" value="Comment">
		</form>
	</div>
<?php endif; ?>

<?php

$sql="SELECT id, Name, Comment, published_at FROM Comments WHERE article_title LIKE '$articleTitle'";

$rs=$conn->query($sql);	

$commAsArr = $rs->fetch_all(MYSQLI_ASSOC);

foreach($commAsArr as $row): ?>
<h5>Posted by: <?= $row['Name'] ?></h5>
<p class="date"><?= date("j F Y", strtotime($row['published_at'])) ?></p>
<hr size="1"/>
<?= $row['Comment'] ?> 


<?php if(($userLevel == 'User' || $userLevel == 'Admin') && $row['Name'] == $publisher): ?>
	<?php $editing = true; $_SESSION['idComm'] = $row['id']; $placeholder = $row['Comment'];?>
	<form action="comments_edit.php" method="post">
		<input id="postEdit" type="submit" name="edit" value="Edit">
	</form>
	
<?php endif; ?>
<hr size="5"/>
<?php endforeach; ?>

</div>
</body>
</html>