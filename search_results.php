<?php
require_once "init.php";

$conditions = [];

$display_name = "";
if(isset($_GET['category'])){
    $catgeory_id = $_GET['category'];

    $category = $db->query("SELECT * FROM product_categories WHERE prd_cat_id=$catgeory_id")->fetch_assoc();

    $display_name = "Search results for \"{$category['prd_cat_name']}\" ";

    $conditions[] = " prd_cat_id=$catgeory_id ";

}

if(isset($_GET['q'])){
    $keyword = $_GET['q'];

    $display_name = "Search results for \"$keyword\".";

    $conditions[] = " ( prd_name LIKE \"%$keyword%\" OR prd_desc LIKE \"%$keyword%\" ) ";
    
}


$categories = $db->query("SELECT * FROM product_categories");

$products = $db->query("SELECT * FROM products".(!empty($conditions)?" WHERE ":"").implode(" AND ",$conditions));

?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Search Results</title>
	 
</head>

<link rel="stylesheet" type="text/css" href="css/search_results.css">
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
                <form action="search_results.php">
                <input type="text" name="q" placeholder="Search..." class="searcharea">
                <button type="submit"><img src="images/search.svg" class="searchbtn"> </button>
                </form>
            </div>
        </div>
    </nav>

 
    <div class="prodctable">
    <table class="prodtable">
        
       <tr>
            <td></td>
            <td  colspan="4" height="100px" class="searchrslt"> <b><?php echo $display_name ?></td>
        </tr>
                 
        <tr>
            <td rowspan="5"><div class="categories">    
           <a><b>Categories</b></a><br/><br/>
           <?php
            while($category = $categories->fetch_assoc()){
                ?>
                    <a href="search_results.php?category=<?php echo $category['prd_cat_id'] ?>">+<b> <?php echo $category['prd_cat_name']; ?> </a><br/>
                <?php
            }
           ?>
           <!--Category-->
        
        </tr>
         <?php
            $i = -1;
            while($product = $products->fetch_assoc()){
                $i++;
                if($i%2==0){

                    if($i!=0){
                        ?>
                            </tr>
                            <tr>
                        <?php
                    }
                }


                ?>
                    <td class="product-table">
                        <div class="head"><?php echo $product['prd_name'] ?></div>
                        <a href="products.html"><img class="photo" src="uploads/<?php echo $product['prd_img']; ?>"></a>
                        <br>Rs <?php  echo $product['prd_price'] ?>
                    </td>
                    
                    <td class="product-buy">
                        <button class="buynow-wrapper" input="button">Buy Now</button>
                    </td>
                
                <?php
            }
         ?>
         
 
    
	</table>
	
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