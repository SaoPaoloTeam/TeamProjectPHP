<?php

require_once(realpath(dirname(__FILE__) . "/../resources/config.php"));
require_once(realpath(dirname(__FILE__) . "/../resources/comments.php"));
require_once(RESOURCES_PATH."../app_controls/session.php");
require_once(RESOURCES_PATH . "/custom_functions.php");
require_once(RESOURCES_PATH . "/validations.php");


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

if (isset($_SESSION['user'])) {
   $publisher = $_SESSION['user'];
} else {
    $publisher = 'guest';
}



if (array_search('Edit', $_POST)) {

    $id = (int)array_search('Edit', $_POST);

} elseif (array_search('Delete', $_POST)) {

    $id = (int)array_search('Delete', $_POST);
    $_SESSION['delete-comm'] = 1;

} else {$id = 0;}

if($id > 0){

    $_SESSION['idComm'] = $id;
}

if (isset($_GET['title'])) {

    $currTitle = htmlspecialchars($_GET['title']);
}

$articleTitle = $currTitle; //Must be a dynamically received article title$articleTitle = 'Article Number Four';


if($userLevel == 'Admin' || $userLevel == 'User' ){
    if (isset($_POST['logged-submit']) && !isset($_SESSION['idComm'])) {
        $name = $publisher;
        $comments = processInput($_POST['comment']);
        $arr = escapeAll([$name, $comments, $articleTitle], $conn);
        $title = str_replace(' ', '+', $articleTitle);
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

    } else {
        if (isset($_POST['logged-submit']) && $_POST['comment']) {
            $name = $publisher;
            $comments = processInput($_POST['comment']);
            $arr = escapeAll([$name, $comments, $articleTitle], $conn);
            $title = str_replace(' ', '+', $articleTitle);

            $sql="SELECT Name, article_title FROM Comments WHERE id='{$_SESSION['idComm']}'";
            $rs=$conn->query($sql);
            $commVerification = $rs->fetch_all(MYSQLI_ASSOC);

            if ($commVerification['0']['Name'] == $name && $commVerification['0']['article_title'] == $articleTitle) {
                $insert = "UPDATE Comments SET Comment='{$arr[$comments]}' WHERE id ='{$_SESSION['idComm']}'";
                unset($_SESSION['idComm']);
                $result = mysqli_query($conn, $insert);
                if ($result) {
                    echo "Success";
                    redirect_to("viewArticle.php?title=" . $title);
                } else {
                    echo mysqli_error($conn);
                }
            }
        } elseif (isset($_SESSION['delete-comm'])) {
            $title = str_replace(' ', '+', $articleTitle);
            $insert = "DELETE FROM Comments WHERE id='{$_SESSION['idComm']}'";
            unset($_SESSION['idComm']);
            unset($_SESSION['delete-comm']);
            $result = mysqli_query($conn, $insert);
            if ($result) {
                echo "Success";
                redirect_to("viewArticle.php?title=" . $title);
            } else {
                echo mysqli_error($conn);
            }   
        }
    }
} else {
    if (isset($_POST['logged-submit'])) {
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
    } elseif (isset($_POST['guest-submit'])) {
        $name = processInput($_POST['name']);
        $comments = processInput($_POST['comment']);
        $email = processInput($_POST['email']);
        $arr = escapeAll([$name, $comments, $articleTitle, $email], $conn);

        if($name && $comments && $email) {
            $insert = "INSERT INTO Comments (Name,Comment,article_title, email)
            VALUES ('{$arr[$name]}', '{$arr[$comments]}', '{$arr[$articleTitle]}', '{$arr[$email]}')";
            
            $result = mysqli_query($conn, $insert);
            if (!$result) {
                echo mysqli_error($conn);
            }
        }
    }
}
?>
<div id="wrapper-comm">

    <?php
/*    var_dump($_SESSION['level']);
            //var_dump($_SESSION['idComm']);
            //
    var_dump($publisher);
    var_dump($articleTitle);
    var_dump($userLevel);
    print_r($_POST);
    var_dump($_SERVER["REQUEST_METHOD"]);
            //unset($_SESSION['idComm']);
    print_r($_SESSION['delete-comm']);

    var_dump($_SESSION['idComm']);


                //var_dump($_POST['logged-submit']);
    var_dump($_SESSION['currentTitle']);
    var_dump($id);
*/
    $sql="SELECT id, Name, Comment, published_at FROM Comments WHERE article_title LIKE '$articleTitle'";

    $rs=$conn->query($sql);	

    $commAsArr = $rs->fetch_all(MYSQLI_ASSOC);
    $index = 1;
    foreach($commAsArr as $row): ?>
        <div class="comment-box">
            <div class="comment-header">
            <h5 class="comment-author">Posted by: <?= $row['Name'] ?></h5>
                <div class="comment-num">#<?php echo $index; $index++ ?></div>
            </div>
            <p class="comment-date"><?= date("j F Y, H:i", strtotime($row['published_at'])) ?></p>
            <p class="comment-text"><?= $row['Comment'] ?></p>

            <?php if(($userLevel == 'User' && $row['Name'] == $publisher)): ?>
            <form action="#" method="POST">
                <input id="postEdit" type="submit" name='<?php echo  $row['id'] ?>' value="Edit" class="edit-comm"/>
            </form>
            <?php elseif ($userLevel == 'Admin'): ?>
            <form action="#" method="POST">
                <?php if ($publisher == $row['Name']): ?>
                <input id="postEdit" type="submit" name='<?php echo  $row['id']; ?>' value="Edit" class="edit-comm"/>
                <?php endif; ?>
                <input id="postEdit" type="submit" name='<?php echo  $row['id']; ?>' value="Delete" class="edit-comm" />
            </form>
<?php endif; ?>
            </div>

<?php endforeach; ?>

<?php

if($userLevel == 'Admin' || $userLevel == 'User' ):?>
    <span class="write-comment" onclick="showCommentForm(this)">Post a comment</span>
<div id="comment-editor" style="display: <?php if ($id) echo "block"; else echo "none"; ?>;">
    <form action="#" method="POST" class="guest-post">
        <label for="comment">Comment:</label>
        <?php if ($id && !isset($_SESSION['delete-comm'])) {
            $sql="SELECT Comment FROM Comments WHERE id='{$id}'";
            $rs=$conn->query($sql);
            $commArrTemp = $rs->fetch_all(MYSQLI_ASSOC);
            $editedComment = $commArrTemp['0']['Comment'];
        } else { $editedComment = '';}
        
        ?>
        <textarea name="comment" rows="10" cols="50"><?=$editedComment;?></textarea>


        <input type="submit" name="logged-submit" value="Comment">
    </form>
</div>
<?php else:?>
    <span class="write-comment" onclick="showCommentForm(this)">Post a comment</span>
    <div id="comment-editor" style="display: none">
        <form action="#" method="POST" class="guest-post">

            <input name="name" type="text" placeholder="Name.."/>


            <input name="email" type="text" placeholder="Email.."/>

            <label for="comment">Comment:</label>
            <textarea name="comment" rows="10" cols="50"></textarea>

            <input type="submit" name="guest-submit" value="Comment">
        </form>
    </div>

<?php endif; ?>

</div>
</body>
</html>