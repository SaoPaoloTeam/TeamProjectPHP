
<?php require_once(realpath(dirname(__FILE__) . "/../config.php")); ?>
<div id="user-manager" style="display: none">
    <table>
        <tr>
            <td>Titles</td>
            <td>Status</td>
            <td>Actions</td>
        </tr>

        <?php
        $queryUsers = "SELECT username, id, status,email FROM Users WHERE level in ('0','1');";
        $selected = mysqli_query($conn, $queryUsers);
        ?>
        <?php if ($selected): ?>
            <?php while ($data = mysqli_fetch_assoc($selected)): ?>
                <tr>
                    <td>
                        <?php echo $data['username']; ?>
                    </td>
                    <td>
                        <?php echo $data['status']; ?>

                    </td>
                    <td>
                    <?php if ($data['status']=='active'): ?>
                        <a href='../resources/app_controls/delete.php?deactivateUser=<?php echo "{$data['id']}"; ?>'>deactivate</a>
                    <?php endif; ?>

                        <?php if ($data['status']=='inactive' | !$data['status']): ?>
                            <a href='../resources/app_controls/delete.php?activateUser=<?php echo "{$data['id']}"; ?>'>activate</a>
                        <?php endif; ?>
                    </td>

                </tr>

            <?php endwhile; ?>
        <?php endif; ?>

    </table>
</div>
