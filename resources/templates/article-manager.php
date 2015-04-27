<?php require_once(realpath(dirname(__FILE__) . "/../config.php")); ?>
<div id="article-manager" style="display: none;">
    <table id="table-articles">
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
        <?php while ($dataArticles = mysqli_fetch_assoc($selected)): ?>
            <tr>
                <td>
                    <?php echo $dataArticles['title'];
                    $content = htmlentities($dataArticles['content']);
                    ?>
                </td>
                <td>
                    <?php echo $dataArticles['status'];
                    $title = $dataArticles['title'];
                    $id = $dataArticles['id']; ?>

                </td>
                <td class="actions">
                    <textarea id="area<?php echo $id;?>" cols="30" rows="10" style="display: none"><?php echo $content; ?></textarea>
                    <a href='#'
                       onclick="getContent(<?php echo "'{$title}'" . "," . "'{$id}'"; ?>),showMenu('edit-article-box'),hideMenu('table-articles')">edit</a>
                </td>
                <td class="actions">
                    <a href='../resources/app_controls/delete.php?hideArticle=<?php echo "{$dataArticles['id']}"; ?>'>hide</a>
                </td>
                <td class="actions">
                    <a href='../resources/app_controls/delete.php?showArticle=<?php echo "{$dataArticles['id']}"; ?>'>show</a>
                </td>
            </tr>


        <?php endwhile; ?>
    </table>
    <section id="edit-box">
        <div id="edit-article-box" style="display: none;" class="reg-input-holder">
            <form action="../resources/app_controls/edit.php" method="post">
                <label for="title-edit">Title</label>
                <input id="title-edit" type="text" name="title" placeholder="Topic title.."/>
                <script>function() {
                        var textarea = document.getElementById('article-edit');
                        if (textarea.scrollHeight > textarea.clientHeight) {
                            textarea.style.height = textarea.scrollHeight + "px";
                        }
                    }</script>
                <label for="article-id">Content</label>

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
                <input type="submit" name="topic-submit" value="Submit Change"/>
            </form>
        </div>
    </section>


    <?php endif; ?>


</div>