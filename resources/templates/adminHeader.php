<!--<script src="../../public_html/js/user-functions.js" ></script>-->
<header>
    <nav>
        <?php
        echo "Hello," . $_SESSION['user'];
        echo "<a href='../resources/app_controls/logout.php'>Logout</a>";
        ?>

            <a href="#" onclick="showMenu()">Write new</a>
    </nav>
    <section class="bg-holder">

    </section>
</header>