<?php require_once(realpath(dirname(__FILE__) . "/../config.php")); ?>
<div id="article-manager" style="display: none;">
    <table>
        <tr class="title-table">
            <td>Titles</td>
            <td>Status</td>
            <td colspan="3">Actions</td>
        </tr>

        <?php
        $queryArticles = "SELECT title, author, content, id, status FROM Articles;";
        $selected = mysqli_query($conn, $queryArticles);
        ?>
        <?php if ($selected): ?>
            <?php while ($data = mysqli_fetch_assoc($selected)): ?>
                <tr>
                    <td>
                        <?php echo $data['title']; ?>
                    </td>
                    <td>
                        <?php echo $data['status']; ?>
                    </td>
                    <td>
                        <a href='#'
                           onclick="getContent(<?php echo "'{$data['content']}','{$data['title']}','{$data['id']}'"; ?>),showMenu('edit-article-box')">edit</a>
                    </td>
                    <td>
                        <a href='../resources/app_controls/delete.php?hideArticle=<?php echo "{$data['id']}"; ?>'>hide</a>
                    </td>
                    <td>
                        <a href='../resources/app_controls/delete.php?showArticle=<?php echo "{$data['id']}"; ?>'>show</a>
                    </td>
                </tr>


            <?php endwhile; ?>
    </table>
            <section>
                <div id="edit-article-box" style="display: none;">
                    <form action="../resources/app_controls/edit.php" method="post">
                        <input id="title-edit" type="text" name="title" placeholder="Topic title.."/>
                        <input id="article-id" type="text" name="article-id" style="display: none"/>
                        <textarea id="content-edit" name="content" cols="30" rows="10"
                                  placeholder="Topic text"></textarea>
                        <select name="tags">
                            <option value="nightwatch">Night's Watch</option>
                            <option value="dorne">Dorne</option>
                            <option value="north">North</option>
                            <option value="freecities">The Free Cities</option>
                            <option value="slaver">Slaver's Bay</option>
                            <option value="iron">The Iron Islands</option>
                        </select>
                        <input type="submit" name="topic-submit" value="Submit"/>
                    </form>
                </div>
            </section>


        <?php endif; ?>


</div>