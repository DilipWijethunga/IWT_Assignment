<?php
require_once "init.php";

$conditions = [];

// Storing the page title in variable
$display_name = "";

// when search results filtering by category
if(isset($_GET['category'])){
    $catgeory_id = $_GET['category'];

    // Retrieving the category to get the category name
    $category = $db->query("SELECT * FROM product_categories WHERE prd_cat_id=$catgeory_id")->fetch_assoc();

    // Changing the display name to category
    $display_name = "Search results for \"{$category['prd_cat_name']}\" ";

    // Storing query conditions in an array
    $conditions[] = " prd_cat_id=$catgeory_id ";

}

if(isset($_GET['q'])){
    $keyword = $_GET['q'];

    // Changing the title with the given keyword
    $display_name = "Search results for \"$keyword\".";

    // Storing category filteration in conditions array
    $conditions[] = " ( prd_name LIKE \"%$keyword%\" OR prd_desc LIKE \"%$keyword%\" ) ";
    
}

// Retrieving categories
$categories = $db->query("SELECT * FROM product_categories");

// Retrieving products for given filterations
$products = $db->query("SELECT * FROM products".(!empty($conditions)?" WHERE ":"").implode(" AND ",$conditions));

?>
<!DOCTYPE HTML>
<html>
<head>
	<title><?php  echo $display_name; ?></title>
<link rel="stylesheet" type="text/css" href="css/search_results.css">
	 
</head>

<body>
    <?php require_once "header.php" ;?>
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
                        <button onclick="window.location.href='cart.php?add=<?php echo $product['prd_id'] ?>'" class="buynow-wrapper" input="button">Add to cart</button>
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