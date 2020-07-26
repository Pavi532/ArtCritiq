<div class="row">
<nav class="navbar navbar-expand-md navbar-light fixed-top bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo $home_url; ?>"><span>ArtCritiq</span></a>
            <!--Create Navbar Toggler-->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!--List of items within toggler-->
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item ">
                        <a class="nav-link" href="#">Lists</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Freebies</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Comming Soon..</a>
                    </li>
                </ul>
                <?php
                // check if users / customer was logged in
                // if user is logged in, show "Logout","Search Movie" and "Cart" options
                if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['access_level']=='0'){
                    ?>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active" style="cursor: pointer">
                                <a class="nav-link" ><i class="fas fa-user"></i>&nbsp;<?php echo $_SESSION['uname']; ?></a>
                            </li>
                            <li class="nav-item">
                                <a id="logout" class="nav-link" href="<?php echo $home_url; ?>logout">&nbsp;&nbsp;Logout</a>
                            </li>
                        </ul>
                    <?php
                }
                // if user isn't logged in, show the "Login","Register"options
                else{
                    ?>
                    <ul class="navbar-nav ml-auto">
                        <li <?php echo $page_title=="Login" ? "class='nav-item'" : ""; ?>>
                            <a class="nav-link" href="<?php echo $home_url; ?>login">Login</a>
                        </li>
                        <li <?php echo $page_title=="Register" ? "class='nav-item'" : ""; ?>>
                            <a class="nav-link" href="<?php echo $home_url; ?>register">Register</a>
                        </li>
                    </ul>
                    <?php
                    }
                ?>
            </div>
        </div>
    </nav>
</div>