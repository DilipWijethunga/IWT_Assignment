<?php
require_once "init.php";


// Redirecting to home page if user is already logged in.
if($user){
    header("Location: index.php");
    die;
}

// Inserting to the database after form submit.
if(isset($_POST['submit'])){
    $password = md5($_POST['pwd1']);
    $sql = 
    "INSERT INTO users (
        u_name,
        u_gender,
        u_tel,
        u_age,
        u_email,
        u_password,
        u_address_1,
        u_address_2,
        u_town,
        u_type,
        u_zip,
        u_email_verify_token,
        u_status
    ) VALUES (
        \"{$_POST['firstname']}\",
        \"{$_POST['gender']}\",
        \"{$_POST['tel']}\",
        \"{$_POST['age']}\",
        \"{$_POST['email']}\",
        \"{$password}\",
        \"{$_POST['address1']}\",
        \"{$_POST['address2']}\",
        \"{$_POST['town']}\",
        \"cust\",
        \"{$_POST['postcode']}\",
        NULL,
        \"noconf\"
    ) ;";

    $result = $db->query($sql);

    if($result){
        header("Location: index.php");
        die;
    } else {
        // Handle your error
    }

}

?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="css/register.css">

    <link rel="stylesheet" href="images/mas.jpg">

    <title>Register Page</title>

    <script src="js/register.js"></script>

    <meta name="viewport" content="width=device-width,initial-scale=1.0">
</head>

<body>


    <!-- Header -->

    <?php require_once "header.php" ;?>


    <!-- REGISTER FORM -->

    <form method="POST">
        <div class="box">
            <div class="align-center">
                <!--box Title-->
                <h4 class="box-title">Personal Information</h4><br />

                <!-- Name  -->
                <label for="firstname">
                    Name:</label>
                <input type="text" class="fix-width" name="firstname" id="firstname" placeholder="First name"></input><br /><br />

                <!-- Gender-->
                <label for="gender">
                    Gender:</label>
                <input type="radio" name="gender" id="gender" value="M">Male</input>
                <input type="radio" name="gender" value="F">Female</input><br /><br />

                <!--Telephone-->
                <label for="telno">
                    Telephone:</label>
                <input type="tel" onchange="validateTelephone()" class="fix-width" name="tel" id="telno" placeholder="011XXXXXXX" pattern="[0-9]{10}" required></input>

                <p id="telerror" class="error"></p>

                <!-- Age -->
                <label for="Age">
                    Age:</label>
                <input type="number" min="0" max="124" onchange="validateAge()" class="fix-width" name="age" id="Age"></input>

                <p id="ageError" class="error"></p>

                <!--Email -->
                <label for="email">
                    Email Address:</label>
                <input type="email" onchange="validateEmail()" class="fix-width" name="email" id="email" required></input>

                <p id="emailError" class="error"></p>

                <!-- Password -->
                <label for="pwd1">
                    Password:</label>
                <input type="password" class="fix-width" name="pwd1" placeholder="create a password" id="pwd1"></input><br /><br />

                <!--Confirm Password -->
                <label for="pwd2">
                    Confirm Password:</label>
                <input type="password" onchange="validatepassword()" class="fix-width" name="pwd2" placeholder="type password again" id="pwd2"></input>

                <p id="passwordError" class="error"></p>

                <br /><br />

            </div>
        </div>

        <div class="box">
            <div class="align-center">
                <h4 class="box-title">Address Details</h4><br />

                <!-- Address 1 -->
                <label for="address1">
                    Address line one:</label>
                <input type="text" class="fix-width" name="address1" id="address1"></input><br /><br />
                <label for="address2">
                    Address line two:</label>
                <input type="text" class="fix-width" name="address2" id="address2"></input><br /><br />
                <label for="town">
                    Town / City:</label>
                <input type="text" class="fix-width" name="town" id="town"></input><br /><br />
                <label for="postcode">
                    Zip / Post code:</label>
                <input type="text" class="fix-width" name="postcode" id="postcode"></input><br /><br />


                <button class="bttn1" name="submit" type="submit">Sign Up</button><br />
            </div>
        </div>

        <br />

        <hr />

        <div class="allign-text"><a>
                OR</a>
        </div>

        <br />

        <div class="social-login"><a href="#">
                <img src="images/social/google.svg" alt="google account" /> </a>
            <a href="#">
                <img src="images/social/facebook.svg" alt="facebook account" /></a>
            <a href="#">
                <img src="images/social/twitter.svg" alt="twitter account" />
            </a>

        </div>

    </form>


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