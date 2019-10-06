<?php
require_once "init.php";

if(isset($_GET['remove'])){
    $product_id = $_GET['remove'];

    $db->query("DELETE FROM cart WHERE u_id='{$user['u_id']}' AND prd_id=$product_id ");
}

if(isset($_GET['add'])){
    $product_id = $_GET['add'];

    $db->query("INSERT INTO cart (prd_id,u_id) VALUES ($product_id,{$user['u_id']})");
}

$carts = $db->query(
    "SELECT *
    FROM cart AS c
    JOIN products p ON p.prd_id = c.prd_id
    WHERE c.u_id = '{$user['u_id']}'");

?>
<!DOCTYPE html>
<html>
	<head>
		<link rel = "stylesheet" type = "text/css" href = "css/cart.css">
		<title>My Cart</title>

	</head>

	<body>

         <nav id="navbar">


        <!--    Logo-->
        <a href="#"><img src="images/logo.png" alt="logo" id="logo"> </a>


        <a id="cname">Online Meal Cart</a>

        <!--    Register and Login buttons-->
        <div id="reglogin">
            <button id="reg_button" onclick="window.location.href='register.html'">Register</button>
            <button id="login" onclick="window.location.href='login.html'">Login</button>

        </div>

        <div class="cart_user">
            <img width="30" src="images/cart.svg" alt="cart">
            <a href="user_profile.html"><img width="40" src="images/account.svg" alt="cart"></a>
        </div>

        <!--    Navigation Bar-->
        <div class="header-second-bar">
            <div id="navlist">

                <a href="index.html">Home</a>
                <a href="categories.html">Menu</a>
                <a href="about_us.html">About Us</a>
                <a href="contact_us.html">Contact Us</a>

            </div>

            <!-- Search Button-->
             <div class="search">
                <input type="text" placeholder="Search..." class="searcharea">
                <a href="search_results.html"><img src="images/search.svg" class="searchbtn"> </a>
            </div>
        </div>
    </nav>

<table border = "0" width = "100%">
            <?php
            while ($cart = $carts->fetch_assoc()) {
        ?>
        <tr><td width="200px" >
		<div class="cartgallery">
        <a  href=""><img src="uploads/<?php echo $cart['prd_img'] ?>" alt="Food" ></a>
	    <div class="cartdesc"><?php echo $cart['prd_name'] ?></div>
        </div>
            </td>
                <td>
                    <p><?php echo $cart['prd_desc'] ?></p>

        <div class="mt3b" >
		    <button id="b3" disabled >Buy Now</button>
			<button onclick="window.location.href='cart.php?remove=<?php echo $cart['prd_id'] ?>'" >Remove</button>
		</div>
        </td></tr>

            <?php
                }
            ?>
    <tr>
        <td>
            </table>

              <!--Footer-->
    <footer class="footer">
        <table width="100%">
            <tr>
                <td width="33%">
                    <div class="links">
                        <a href="search_results.html">Search And Buy</a><br />
                        <a href="register.html">Register</a><br />
                        <a href="login.html">Login</a><br />
                        <a href="aboutus.html">About Us</a><br />
                    </div>
                    <div class="vertical-line"></div>
                </td>
                <td width="33%">
                    <div class="links">
                        <strong>Contact Us</strong><br />
                        <a href="mailto:info@mealcart.com">Email</a><br />
                        <a href="mealcart.com">Web</a><br />
                        <a href="google.com/news">News</a><br />
                        <b>Visit Us:-</b><br />
                        SLIIT,
                        Malabe
                    </div>
                    <div class="vertical-line"></div>
                </td>
                <td width="33%">
                    <img src="images/certificate.png" width="100" /><br />
                    Organic food certificate. 2007
                </td>
            </tr>
        </table>

        <div class="socialbtn">
            <a href="www.facebook.com"><img src="images/socialbtn/001-facebook.svg"></a>
            <a href="#"><img src="images/socialbtn/002-twitter.svg"></a>
            <a href="#"><img src="images/socialbtn/003-instagram.svg"></a>
            <a href="#"><img src="images/socialbtn/004-google-plus.svg"></a>
        </div>
        <div class="copyright"><a>Copyright@mealcart</a></div>

    </footer>
    <!--End of footer-->
        </td>
    </tr>

    </table>
</body>
</html>