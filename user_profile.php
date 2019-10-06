<?php
require_once "init.php";

// Redirect user to login page if user is not logged in
if(!$user){
    header("Location: login.php");
    die;
}

?>
<!DOCTYPE html>

<html>

<head>
    <title>My Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/user_profile.css">
    <link rel="stylesheet" type="text/css" href="images/21.png">

</head>

<body>

    <!-- Header -->

    <?php require_once "header.php" ;?>




    <!-- table -->



    <table border="3" width="100%" cellspacing="5" cellpadding="5" class="table-height">

        <colgroup>
            <col width="20%" />
            <col width="40%" />
            <col width="40%" />
        </colgroup>
        <tr>
            <td class="col2border">
                <img class="image" src="images/account.svg"></img>


            </td>
            <td colspan="2" class="col2border">
                <div class="myprofile">
                    <h1>My Profile</h1>
                    <button type="button" class="bttn1" id="bttn1" onclick="window.location.href='edit_profile.html'">Edit</button>
                </div>
            </td>
        </tr>
        <tr>
            <td class="col2border" type="button" href="#">
                <button id="accountLink">Account</button>
            </td>

            <td class="col2border">
                <div class="secondcol"><a>Full Name:</a></div>
            </td>
            <td class="col2border">
                <div class="text-format"><?php echo $user['u_name']; ?></div>

            </td>
        </tr>

        <tr>
            <td class="col2border" type="button" href="#">
                <button id="accountLink">Summary</button>
            </td>

            <td class="col2border">
                <div class="secondcol"><a>Gender:</a></div>
            </td>
            <td class="col2border">
                <div class="text-format"><?php echo $user['u_gender']=="M"?"Male":"Female"; ?></div>

            </td>
        </tr>

        <tr>
            <td class="col2border" type="button" href="#">
                <button id="accountLink">Recently Viewed</button>
            </td>
            <td class="col2border">
                <div class="secondcol"><a>Phone Number:</a></div>
            </td>
            <td class="col2border">
                <div class="text-format"><?php echo $user['u_tel']; ?></div>

            </td>
        </tr>

        <tr>
            <td class="col2border" type="button" href="#">
                <button id="accountLink">Orders</button>
            </td>

            <td class="col2border">
                <div class="secondcol">Age:</a></div>
            </td>

            <td class="col2border">
                <div class="text-format"><?php echo $user['u_age']; ?> years</div>

            </td>
        </tr>

        <tr>
            <td class="col2border" type="button" href="#">
                <button id="accountLink">Favourites</button>
            </td>

            <td class="col2border">
                <div class="secondcol"><a>Email Address:</a></div>
            </td>
            <td class="col2border">
                <div class="text-format"><?php echo $user['u_email']; ?></div>

            </td>
        </tr>

        <tr>
            <td class="col2border" type="button" href="#">
                <button id="accountLink">Watch List</button>
            </td>
            <td class="col2border">
                <div class="secondcol"><a>Address:</a></div>
            </td>
            <td class="col2border">
                <div class="text-format"><?php echo $user['u_address_1'] ?>,<?php echo $user['u_address_2']; ?></div>

            </td>
        </tr>

        <tr>
            <td class="col2border" type="button" href="#">
                <button id="accountLink">Payment Details</button>
            </td>

            <td class="col2border">
                <div class="secondcol"><a>Zip/Post code:</a></div>
            </td>
            <td class="col2border">
                <div class="text-format"><?php echo $user['u_zip']; ?></div>

            </td>
        </tr>
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