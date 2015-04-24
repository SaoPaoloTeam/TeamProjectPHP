<!--<script src="../../public_html/js/user-functions.js" ></script>-->
<header>
    <nav>
        <section class="logo">
            A Blog Of Ice And Fire
        </section>
        <section>
            <div class="hello-box">
                <?php echo "Hello," . $_SESSION['user']; ?>
            </div>
            <a href='../resources/app_controls/logout.php' class="user-logout">Logout</a>
        </section>
    </nav>
    <section class="bg-holder">

    </section>
</header>