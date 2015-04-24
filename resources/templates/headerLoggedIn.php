
<header>
    <nav>
        <ul id="page-navigation">
            <li><a href="index.php">HOME</a></li>
            <li><a href="about.php">ABOUT</a></li>
            <li><a href="contact.php">CONTACT</a></li>
        </ul>
        <?php
        echo "Hello," . $_SESSION['user'];
        echo "<a href='../resources/app_controls/logout.php'>Logout</a>";
        ?>
    </nav>
    <section class="bg-holder">

    </section>
</header>