<?php
require_once "init.php";

// Redirecting to the main page if user is already logged in
if($user){
    header("Location: index.php");
    die;
}

$error = null;

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $remember = isset($_POST['remember'])&&$_POST['remember']=='on'?true:false;

    // Retrieving the user for the given email address
    $user = $db->query("SELECT * FROM users WHERE u_email='$username' LIMIT 1")->fetch_assoc();

    if($user){
        // Checking the passwords
        if(md5($password)==$user['u_password']){
            // If remember me checked storing user credentials in cookie
            if($remember){
                // Generating the remember token
                $remember_token = md5(time().$password);

                setcookie('remember_token',$remember_token,3600*24*365+time(),'/');
                
                // Updating the remember token with the new token
                $db->query("UPDATE users SET u_remember_token='$remember_token' WHERE u_id={$user['u_id']} ");


            // Otherwise storing in sessions
            } else {
                $_SESSION['user_id'] = $user['u_id'];
            }

            // Redirecting to main page after successfull logged
            header("Location: index.php");
            die;
        } else {
            $error = "Incorrect password. Please try again.";
        }
    } else {
        $error = "We can not find an account associated with your email address. ";
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
            <h1>Login</h1><br />
            <?php
            if($error){
                ?>
                    <p class="error"><?php echo $error;  ?></p>

                <?php
            }
            ?>

            <input type="text" class="text-box" name="username" id="username" placeholder="User name" required></input>
            <p id="userError" class="error"></p>

            <input type="password" class="text-box" name="password" id="password" placeholder="Password" required></input>
            <p id="passwordError" class="error"></p>

            <div class="formatting">
                <input type="checkbox" name="remember" id="remember">Remember Me</a></input>

                <a class="forgot" onclick="window.location.href='change_password.html'">Forgot Password?</a>
            </div>

            <br /><br />

            <button class="bttn1" name="submit" value="Login" type="submit">Login</button><br /><br /><br />

            <div class="allign-text"><a>
                    Or login with</a>
                <br />
                <div class="social-login"><a href="#">
                        <img src="images/social/google.svg" alt="google account" /> </a>
                    <a href="#">
                        <img src="images/social/facebook.svg" alt="facebook account" /></a>
                    <a href="#">
                        <img src="images/social/twitter.svg" alt="twitter account" />
                    </a>

                </div>

            </div>

            <br />
            <hr>
            <div class="formatting">
                Don't have an account? Register Now!</div><br /><br />

            <button class="bttn1" type="button" onclick="window.location.href = 'register.html'">Register</button><br /><br /><br />


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