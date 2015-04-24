<!--<script src="../../public_html/js/user-functions.js" ></script>-->
<header>
    <nav>

        <div class="hello-box">
            <?php echo "Hello," . $_SESSION['user']; ?>
        </div>
        <a href='../resources/app_controls/logout.php' class="user-logout">Logout</a>
    </nav>
    <section class="bg-holder">

    </section>
</header>