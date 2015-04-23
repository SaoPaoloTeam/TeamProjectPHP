<!-- Navigation -->
<nav class="navbar navbar-default navbar-custom navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Night's Watch</a>
        </div>

        <!--        <form class="form-control" action="../resources/app_controls/login.php" method="post">-->
        <!--            <input type="text" name="uname" placeholder="Username"/>-->
        <!--            <input type="password" name="pass" placeholder="Password"/>-->
        <!--            <input type="submit" name="submit" value="Login"/>-->
        <!--            <a href="register.php">Register</a>-->
        <!--        </form>-->

        <div class="">
            <form id="signin" class="navbar-form navbar-right form-inline collapse navbar-collapse" role="form" method="post">
                <div class="input-group input-group-sm">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input id="email" type="email" class="form-control input-sm" name="email" value=""
                           placeholder="Email Address">
                </div>

                <div class="input-group input-group-sm">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="password" type="password" class="form-control input-sm" name="password" value=""
                           placeholder="Password">
                </div>

                <button type="submit" class="btn-sm btn-primary">Login</button>
                <button type="submit" class="btn-sm btn-primary">Register</button>
            </form>
        </div>


        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-left">
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li>
                    <a href="about.php">About</a>
                </li>
                <li>
                    <a href="post.php">Sample Post</a>
                </li>
                <li>
                    <a href="contact.php">Contact</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>