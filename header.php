
   <nav id="navbar">


<!--    Logo-->
<a href="#"><img src="images/logo.png" alt="logo" id="logo"> </a>


<a id="cname"><?php echo $config['app']['name'] ?></a>

<!--    Register and Login buttons-->
<?php
    if($user){
        ?>

        <div class="cart_user">
            <a href="cart.php"><img width="30" src="images/cart.svg" alt="cart"></a>
            <a href="user_profile.php"><img width="50" src="images/account.svg" alt="cart"></a>
        </div>
        <?php
    } else {
        ?>

        <div id="reglogin">
            <button id="reg_button" onclick="window.location.href='register.php'">Register</button>
            <button onclick="window.location.href='login.php'" id="login">
                Login</button>
        </div>

        <?php
    }
?>


<!--    Navigation Bar-->
<div class="header-second-bar">
    <div id="navlist">
        <a href="index.php">Home</a>
        <a href="categories.php">Menu</a>
        <a href="about_us.html">About Us</a>
        <a href="contact_us.html">Contact Us</a>
    </div>

    <!-- Search Button-->
    <div class="search">
        <form action="search_results.php">
        <input type="text" name="q" placeholder="Search..." class="searcharea">
        <button type="submit"><img src="images/search.svg" class="searchbtn"> </button>
        </form>
    </div>
</div>
</nav>
