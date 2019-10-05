<?php
$servername="localhost";
$username="root";
$password="";
$database="meal_cart";

//create connection
$conn=new mysqli($servername,$username,$password,$database);

//check connection
if($conn->connect_error)
{
    die("Connection failed : ".$conn->connect_error);
}

   echo"Connect successfully <br/>";


?>
<!DOCTYPE HTML>
<html>

<head>
    <title>Categories List</title>
    <link rel="stylesheet" type="text/css" href="css/categories.css">

</head>

<body>



    <nav id="navbar">


        <!--    Logo-->
        <a href="#"><img src="images/logo.png" alt="logo" id="logo"> </a>


        <a id="cname">Online Meal Cart</a>

        <!--    Register and Login buttons-->
        <div id="reglogin">
            <button id="reg_button" onclick="window.location.href='register.html'">Register</button>
            <button id="login">
                Login</button>
        </div>

        <div class="cart_user">
            <a href="#"><img width="30" src="images/cart.svg" alt="cart"></a>
            <a href="user_profile.html"><img width="50" src="images/account.svg" alt="cart"></a>
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

   <?php
		$sql="SELECT * FROM menu";
		$result = $conn->query($sql);
        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
        echo "<table><tr><td>".$row["Graphics & Design"]."</td>";
		echo "<td>".$row["RICE"]."</td>";
		echo "<td>".$row["Noodles"]."</td>";
		echo "<td>".$row["Pasta"]."</td>";
		echo "<td>".$row["Dessert"]."</td>";
		echo "<td>".$row["salat"]."</td></tr>";
			echo"<br/><br/>";
        }
        } else {
         echo "0 results";
        }
       echo "</table>";
		?>

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
            <a href="#"><img src="images/socialbtn/001-facebook.svg"></a>
            <a href="#"><img src="images/socialbtn/002-twitter.svg"></a>
            <a href="#"><img src="images/socialbtn/003-instagram.svg"></a>
            <a href="#"><img src="images/socialbtn/004-google-plus.svg"></a>
        </div>
        <div class="copyright"><a>Copyright@mealcart</a></div>

    </footer>

</body>

</html>