<?php
require_once "init.php";

?>
<!DOCTYPE html>
<html>
	<head>
		<link rel = "stylesheet" type = "text/css" href = "css/contactUs.css">
		<title>Contact Us</title>
		
	</head>

	<body>
        <?php  require_once "header.php"; ?>


    <!-- Put Your Content -->
 
        <div class ="a">
			<h1>CONTACT US</h1>
			<hr>
			<h3>We'd Love to Help!</h3>
            <p>We like to create things with fun,open minded people.Feel free to say <b>HELLO!</b></p>
		</div>
		<div class="b">
			<div class="form">
			 <form>
				<input required type = "text" name = "name" placeholder = "Name">
				<br><br>
				<input required type = "email" name = "email" placeholder = "E-mail">
				<br><br>
				<textarea required name = "text" placeholder = "Message" rows ="10" cols ="60"></textarea>
				<br><br>
				<button type ="submit">SEND</button>

			</form>
			</div>
		</div>
			<div class ="info">
				<p><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d990.1978324937276!2d79.97177802918281!3d6.915534099687708!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae257be5c7d96fb%3A0x89cc65375feeb922!2sSliit%20Eka%20Langa!5e0!3m2!1sen!2slk!4v1566624493284!5m2!1sen!2slk" width="500" height="150" frameborder="0" style="border:0;" allowfullscreen=""></iframe></p>
			
				<p>Phone: 0712345678/0112345678</p>
				<p>E-mail: info@mealcart.com</p>
				<hr>
					<div class ="socialmedia">
						<ul>
							<li><a href="#"><img src ="images/fb.png" width="35" ></a></li>
							<li><a href="#"><img src ="images/insta.png" width="30" ></a></li>
							<li><a href="#"><img src ="images/twit.png" width="35" ></a></li>
							<li><a href="#"><img src ="images/gplus.png" width="30" ></a></li>
						</ul>
					
					</div>
			</div>
            
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
            <a href="#"><img src="images/socialbtn/001-facebook.svg"></a>
            <a href="#"><img src="images/socialbtn/002-twitter.svg"></a>
            <a href="#"><img src="images/socialbtn/003-instagram.svg"></a>
            <a href="#"><img src="images/socialbtn/004-google-plus.svg"></a>
        </div>
        <div class="copyright"><a>Copyright@mealcart</a></div>

    </footer>
    <!--End of footer-->

	</body>

</html>