
<header>
    <nav>
        <section class="logo">
            <a href="index.php">A Blog Of Ice And Fire</a>
        </section>
        <section>
        <div class="hello-box">
            <?php echo "Hello, " . $_SESSION['user']; ?>
        </div>
        <a href='../resources/app_controls/logout.php' class="user-logout">LOGOUT</a>
        </section>
    </nav>
    <section class="bg-holder">

    </section>
</header>