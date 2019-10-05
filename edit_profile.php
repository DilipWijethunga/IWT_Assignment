<?php
require_once "init.php";

if(!$user){
   header("Location: login.php") ;
   die;
}

if(isset($_POST['submit'])){
    $u_name = $_POST['firstname'];
    $u_gender = $_POST['gender'];
    $u_tel = $_POST['phone'];
    $u_age = $_POST['age'];
    $u_email = $_POST['email'];
    $u_password = md5($_POST['pwd1']);
    $u_password_confirm = md5($_POST['pwd2']);
    $u_address_1 = $_POST['address1'];
    $u_address_2 = $_POST['address2'];
    $u_town = $_POST['town'];
    $u_zip = $_POST['postcode'];

    if($u_password!=$u_password_confirm){
        $error = "Passwords Not Matching.";
    } else {

        $db->query(
            "UPDATE users SET
                u_name = '$u_name',
                u_gender = '$u_gender',
                u_tel = '$u_tel',
                u_age = '$u_age',
                u_email = '$u_email',
                u_password = '$u_password',
                u_address_1 = '$u_address_1',
                u_address_2 = '$u_address_2',
                u_town = '$u_town',
                u_zip = '$u_zip'
            WHERE u_id = '{$user['u_id']}'
            "
        );

        $user['u_name'] = $u_name;
        $user['u_gender'] = $u_gender;
        $user['u_tel'] = $u_tel;
        $user['u_age'] = $u_age;
        $user['u_email'] = $u_email;
        $user['u_password'] = $u_password;
        $user['u_address_1'] = $u_address_1;
        $user['u_address_2'] = $u_address_2;
        $user['u_town'] = $u_town;
        $user['u_zip'] = $u_zip;
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

    <nav id="navbar">


        <!--Logo-->
        <a href="#"><img src="images/logo.png" alt="logo" id="logo"> </a>


        <a id="cname">Online Meal Cart</a>

        <!--    Register and Login buttons-->
        <div id="reglogin">
            <button id="reg_button" onclick="window.location.href='register.html'">Register</button>
            <button id="login" onclick="window.location.href='login.html'">
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


    <!-- REGISTER FORM -->

    <form method="POST">
        <div class="box">
            <div class="align-center">
                <!--box Title-->
                <h4 class="box-title">Personal Information</h4><br />

                <!-- Name  -->
                <label for="firstname">
                    Name:</label>
                <input type="text" class="fix-width" name="firstname" id="firstname" placeholder="First name" value="<?php echo $user['u_name'] ?>" ></input><br /><br />

                <!-- Gender-->
                <label for="gender">
                    Gender:</label>
                <input type="radio" name="gender" <?php echo $user['u_gender']=="M"?"checked=\"checked\" ":"" ?> id="gender" value="M">Male</input>
                <input type="radio" name="gender" <?php echo $user['u_gender']=="F"?"checked=\"checked\" ":"" ?> value="F">Female</input><br /><br />

                <!--Telephone-->
                <label for="telno">
                    Telephone:</label>
                <input type="tel" value="<?php echo $user['u_tel']; ?>" onchange="validateTelephone()" class="fix-width" name="phone" id="telno" placeholder="011XXXXXXX" pattern="[0-9]{10}" required></input>

                <p id="telerror" class="error"></p>

                <!-- Age -->
                <label for="Age">
                    Age:</label>
                <input type="number" value="<?php echo $user['u_age'] ?>" min="0" max="124" onchange="validateAge()" class="fix-width" name="age" id="Age"></input>

                <p id="ageError" class="error"></p>

                <!--Email -->
                <label for="email">
                    Email Address:</label>
                <input type="email" value="<?php echo $user['u_email'] ?>" onchange="validateEmail()" class="fix-width" name="email" id="email" required></input>

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
                <input type="text" value="<?php echo $user['u_address_1']; ?>" class="fix-width" name="address1" id="address1"></input><br /><br />
                <label for="address2">
                    Address line two:</label>
                <input type="text" value="<?php echo $user['u_address_2']; ?>" class="fix-width" name="address2" id="address2"></input><br /><br />
                <label for="town">
                    Town / City:</label>
                <input type="text" value="<?php echo $user['u_town']; ?>" class="fix-width" name="town" id="town"></input><br /><br />
                <label for="postcode">
                    Zip / Post code:</label>
                <input type="text" value="<?php echo $user['u_zip']; ?>" class="fix-width" name="postcode" id="postcode"></input><br /><br />


                <button name="submit" value="submit" class="bttn1" type="submit">Edit Profile</button><br />
            </div>
        </div>

        <br />

        <hr />

       

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