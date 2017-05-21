<body>
        <header>
            <div id="header">
                <div id="logincont">
                    <div id="login">
                <?php
                if(!isset($_SESSION['auth_username']))
                {
                ?>
<!--                Login and Registration links-->
                        <a href="index.php?action=login">Login</a> |
                        &nbsp; <a href="index.php?action=register">Register</a>
                <?php
                }
                else
                {
                ?>
<!--                My Account and Logout links-->
                        <a href="index.php?action=myaccount">My Account</a>|
                        &nbsp; <a href="index.php?action=logout">Logout</a>
                    
                <?php    
                }
                ?>    
                    </div>
                </div>
<!--                Logo-->
                <a href="index.php">
                    <img src="images/logo.png" width="252" height="180">
                </a>
            </div>
        </header>
        <nav>
<!--            Nav links-->
            <div id="navlinks" >
                <a class="button" href="index.php">Home</a>
                <a class="button" href="?action=contestants">Contestants</a>
                <a class="button" href="?action=agents">Recording Agents</a>
                <a class="button" href="?action=videos">Videos</a>
                <a class="button" href="?action=blog">Blog</a>
                <a class="button" href="?action=about">About</a>
                <a class="button" href="?action=contact">Contact Us</a>
                <a class="button" href="?action=help">Help</a>
            </div>
        </nav>