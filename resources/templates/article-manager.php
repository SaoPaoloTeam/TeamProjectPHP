
<?php require_once(realpath(dirname(__FILE__) . "/../config.php")); ?>
<div id="article-manager">
    <table>
        <tr>
            <td>Titles</td>
            <td colspan="2">Actions</td>
        </tr>

        <?php
        $queryArticles = "SELECT title, author, content, id FROM Articles;";
        $selected = mysqli_query($conn, $queryArticles);
        ?>
        <?php if ($selected): ?>
            <?php while ($data = mysqli_fetch_assoc($selected)): ?>
                <tr>
                    <td>
                        <?php echo $data['title']; ?>
                    </td>
                    <td>
                        <a href='../resources/app_controls/edit.php?edit=<?php echo "{$data['id']}"; ?>'>edit</a>
                    </td>
                    <td>
                        <a href='../resources/app_controls/delete.php?delete=<?php echo "{$data['id']}"; ?>'>delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php endif; ?>
    </table>
</div>