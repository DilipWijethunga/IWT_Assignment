<?php
require_once "init.php";

// Retrieving all categories from categories
$categories = $db->query("SELECT * FROM product_categories;");
?>
<!DOCTYPE HTML>
<html>

<head>
    <title>Categories List</title>
    <link rel="stylesheet" type="text/css" href="css/categories.css">

</head>

<body>


    <?php require_once "header.php" ;?>
   
	<table class="food-menu" >
   <?php
		$category_wise_products = [];
		
		$categories_count = 0;
		
		echo "<tr>";
		// Looping through categories and add all to an array
		while($category = $categories->fetch_assoc()){
			$category_wise_products[$categories_count] = [];
			
			$products = $db->query("SELECT * FROM products WHERE prd_cat_id={$category['prd_cat_id']};");
			// Printing table headers
			echo "<th>".$category["prd_cat_name"]."</th>";
			while($product = $products->fetch_assoc()){
				array_push($category_wise_products[$categories_count],$product['prd_name']);
			}
			$categories_count++;
		}
		echo "</tr>";
		
		
		// Looping throgh products
		for($i=0;$i<10;$i++){
			echo "<tr>";
			for($j=0;$j<$categories_count;$j++){
				echo "<td>";
				
				echo isset($category_wise_products[$j][$i])?$category_wise_products[$j][$i]:"";
				
				echo "</td>";
			}
			echo "</tr>";
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