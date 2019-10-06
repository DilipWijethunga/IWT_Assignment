<?php
require_once "init.php";

if(!$user){
    header("Location:- login.php");
    die;
}

$error = null;

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $last_password = $_POST['last_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if($email==$user['u_email']){
        if(md5($last_password)==$user['u_password']){

            if($new_password==$confirm_password){
                $password = md5($new_password);
                $db->query("UPDATE users SET u_password='$password'");

                header("Location: logout.php");
                die;
            } else {
                $error = "New passwords not matching";
            }

        } else {
            $error = "Incorrect password supplied for old password field.";
        }
    } else {
        $error = "Entered email is not matching with old email";
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="images/mas2.jpg">

    <link rel="stylesheet" type="text/css" href="css/login.css">

    <script src="js/login.js" type="text/javascript"></script>

    <title>Login Page</title>

    <meta name="viewport" content="width=device-width,initial-scale=1.0">


</head>

<body>

    <!-- Header -->

    <?php require_once "header.php" ;?>


    <!--Login form-->

    <form method="POST" onsubmit="return validateEmail()">
        <div class="box">
            <h1>Change Password</h1><br />

            <?php
            if($error)  {
                ?>
                <p id="emailError" class="error"><?php echo $error; ?></p>
                <?php
            }
            ?>

			 <input type="email" onchange="validateEmail()" class="text-box" name="email" id="email" placeholder="Email Address" required></input>

             <p id="emailError" class="error"></p>

            <input type="password" class="text-box" name="last_password" id="last_password" placeholder="Last Password" required></input></p>
			
			<input type="password" class="text-box" name="new_password" id="new_password" placeholder="New Password" required></input></p>
			
			<input type="password" class="text-box" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required></input></p>
           

            <div class="formatting">
                <input type="checkbox" name="remember" id="remember">Remember Me</a></input>

               
            </div>

            <br /><br />

            <button class="bttn1" name="submit" value="submit" type="submit" onclick="window.location.href='user_profile.html'">Reset Password</button><br /><br /><br />

           

            <br />
            


    </form>
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