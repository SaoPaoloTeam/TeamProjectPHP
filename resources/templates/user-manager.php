
<?php require_once(realpath(dirname(__FILE__) . "/../config.php")); ?>
<div id="2">
    <table>
        <tr>
            <td>Titles</td>
            <td>Actions</td>
        </tr>

        <?php
        $queryUsers = "SELECT username, id FROM Users WHERE level='1';";
        $selected = mysqli_query($conn, $queryUsers);
        ?>
        <?php if ($selected): ?>
            <?php while ($data = mysqli_fetch_assoc($selected)): ?>
                <tr>
                    <td>
                        <?php echo $data['username']; ?>
                    </td>
                    <td>
                        <a href="">deactivate</a>
                    </td>

                </tr>
            <?php endwhile; ?>
        <?php endif; ?>
    </table>
</div>
