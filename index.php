<?php
require_once "init.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Meal Cart</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <script src="js/slideshow.js"></script>
</head>


<body>

    
    <?php require_once "header.php" ;?>

    <div class="slideshow">
        <img src="images/slideshow/01.jpg" alt="slideshow" class="slider left" />
        <img src="images/slideshow/02.jpg" alt="slideshow" class="slider left" />
        <img src="images/slideshow/03.jpg" alt="slideshow" class="slider" />
        <img src="images/slideshow/04.jpg" alt="slideshow" class="slider right" />
        <img src="images/slideshow/05.jpg" alt="slideshow" class="slider right" />
        <span onclick="handleChangeSlider(1,true)" class="button nxt-button">></span>
        <span onclick="handleChangeSlider(-1,true)" class="button prv-button">
            <</span> <div class="numbers">
                <span onclick="handleChangeSlider(1)" class="button slider-number number-1">1</span>
                <span onclick="handleChangeSlider(2)" class="button slider-number number-2">2</span>
                <span onclick="handleChangeSlider(3)" class="button slider-number number-3">3</span>
                <span onclick="handleChangeSlider(4)" class="button slider-number number-4">4</span>
                <span onclick="handleChangeSlider(5)" class="button slider-number number-5">5</span>
    </div>
    </div>

    <a class="header1">Meal by Categories</a>

    <!--Menu Items-->
    <div class="items" onclick="window.location.href = 'products.html'">
        <div class="item">
            <div class="thumbnail" style="background-image:url(images/food_menu/chickenfrice.jpg)"> </div>
            <button> <img src="images/food_menu/add-to-cart.svg" class="addcart">Add to Cart</button>
            <button> <img src="images/food_menu/shopping-cart.svg" class="addcart">Buy Now</button>
        </div>

        <div class="item" onclick="window.location.href = 'products.html'">
            <div class="thumbnail"  style="background-image:url(images/food_menu/bbq.jpg)"> </div>
            <button> <img src="images/food_menu/add-to-cart.svg" class="addcart">Add to Cart</button>
            <button> <img src="images/food_menu/shopping-cart.svg" class="addcart">Buy Now</button>
        </div>

        <div class="item" onclick="window.location.href = 'products.html'">
            <div class="thumbnail" style="background-image:url(images/food_menu/d.jpg)"> </div>
            <button> <img src="images/food_menu/add-to-cart.svg" class="addcart">Add to Cart</button>
            <button> <img src="images/food_menu/shopping-cart.svg" class="addcart">Buy Now</button>
        </div>

        <div class="item" onclick="window.location.href = 'products.html'">
            <div class="thumbnail" style="background-image:url(images/food_menu/image.jpg)"> </div>
            <button> <img src="images/food_menu/add-to-cart.svg" class="addcart">Add to Cart</button>
            <button> <img src="images/food_menu/shopping-cart.svg" class="addcart">Buy Now</button>
        </div>

        <div class="item" onclick="window.location.href = 'products.html'">
            <div class="thumbnail" style="background-image:url(images/food_menu/pizza.jpg)"> </div>
            <button> <img src="images/food_menu/add-to-cart.svg" class="addcart">Add to Cart</button>
            <button> <img src="images/food_menu/shopping-cart.svg" class="addcart">Buy Now</button>
        </div>

        <div class="item" onclick="window.location.href = 'products.html'">
            <div class="thumbnail" style="background-image:url(images/food_menu/indianfood.jpg)"> </div>
            <button> <img src="images/food_menu/add-to-cart.svg" class="addcart">Add to Cart</button>
            <button> <img src="images/food_menu/shopping-cart.svg" class="addcart">Buy Now</button>
        </div>

        <div class="item" onclick="window.location.href = 'products.html'">
            <div class="thumbnail" style="background-image:url(images/food_menu/kg-4.png)"> </div>
            <button> <img src="images/food_menu/add-to-cart.svg" class="addcart">Add to Cart</button>
            <button> <img src="images/food_menu/shopping-cart.svg" class="addcart">Buy Now</button>
        </div>

        <div class="item" onclick="window.location.href = 'products.html'">
            <div class="thumbnail" style="background-image:url(images/food_menu/dessert.jpeg)"> </div>
            <button> <img src="images/food_menu/add-to-cart.svg" class="addcart">Add to Cart</button>
            <button> <img src="images/food_menu/shopping-cart.svg" class="addcart">Buy Now</button>
        </div>

        <div class="item" onclick="window.location.href = 'products.html'">
            <div class="thumbnail" style="background-image:url(images/food_menu/noodles.jpg)"> </div>
            <button> <img src="images/food_menu/add-to-cart.svg" class="addcart">Add to Cart</button>
            <button> <img src="images/food_menu/shopping-cart.svg" class="addcart">Buy Now</button>
        </div>

        <div class="item" onclick="window.location.href = 'products.html'">
            <div class="thumbnail" style="background-image:url(images/food_menu/images.jpeg)"> </div>
            <button> <img src="images/food_menu/add-to-cart.svg" class="addcart">Add to Cart</button>
            <button> <img src="images/food_menu/shopping-cart.svg" class="addcart">Buy Now</button>
        </div>
    </div>
    <!--End of Menu Items section-->
</body>

<!--    Slider -->

</div>

<!--    End of slider-->

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
<script type="text/javascript">
    slider();
</script>
<!--End of footer-->

</html>