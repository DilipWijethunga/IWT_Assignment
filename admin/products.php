<?php
require_once "../init.php";
require_once "layout.php";


$products_query = 
"SELECT * ,GROUP_CONCAT(DISTINCT t.prd_typ_name) AS type_names
FROM products AS p 
JOIN product_has_types AS pt ON pt.prd_id = p.prd_id
JOIN product_types AS t ON pt.prd_typ_id = t.prd_typ_id
JOIN product_categories c ON c.prd_cat_id = p.prd_cat_id
";

$message = null;

// If redirect after a deletion
if(isset($_GET['delete'])){
    $message = "You have successfully deleted your record.";
}

// Check form submits
if(isset($_REQUEST['submit'])){
    $prd_name = $_REQUEST['productName'];
    $prd_cat_id = $_REQUEST['productCategory'];
    $prd_price = $_REQUEST['productPrice'];
    $prd_desc = $_REQUEST['productDescription'];
    $prd_types = $_REQUEST['productSize'];
    $prd_chef_spent = $_REQUEST['cheffSpentTime'];

    if(is_string($prd_types))
        $prd_types = [$prd_types];

    // If trying to search something
    if(isset($_GET['submit'])){
        $products_query .= " WHERE ";

        $conditions = [];

        if(!empty($prd_name)){
            $conditions[] = "p.prd_name LIKE '%$prd_name%' ";
        }

        if(!empty($prd_cat_id)){
            $conditions[] = "p.prd_cat_id = $prd_cat_id ";
        }

        if(!empty($prd_price)){
            $conditions[] = "p.prd_price = $prd_price ";
        }

        if(!empty($prd_desc)){
            $conditions[] = "p.prd_desc LIKE '%$prd_desc%' ";
        }

        if(!empty($prd_types)){
            $conditions[] = "t.prd_typ_id IN (".implode(',',$prd_types).') ';
        }

        $products_query .= implode(' AND ',$conditions);
    } else {

        $prd_img = "default_product.jpg";

        if(isset($_FILES['productImage'])){
            $target_dir = '../uploads/';
            $target_file = $target_dir . basename($_FILES["productImage"]["name"]);
            $uploaded = move_uploaded_file($_FILES["productImage"]["tmp_name"],$target_file);
            $prd_img = basename($_FILES["productImage"]["name"]);
        }

        if(!empty($_POST['itemId'])){
            // If trying to update a product
            $prd_id = $_POST['itemId'];

            $db->query(
                "UPDATE products SET
                    prd_name = '$prd_name',
                    prd_img = '$prd_img',
                    prd_cat_id = '$prd_cat_id',
                    prd_price = '$prd_price',
                    prd_desc = '$prd_desc',
                    prd_cheff_spent_time = '$prd_chef_spent'
                WHERE prd_id=$prd_id"
            );

            $message = "You have successfully updated your product";

            $db->query("DELETE FROM product_has_types WHERE prd_id='$prd_id'");

        } else {
            // If trying to create product
            $db->query(
                "INSERT INTO products (
                    prd_name,
                    prd_img,
                    prd_cat_id,
                    prd_price,
                    prd_desc,
                    prd_cheff_spent_time
                ) VALUES (
                    '$prd_name',
                    '$prd_img',
                    '$prd_cat_id',
                    '$prd_price',
                    '$prd_desc',
                    '$prd_chef_spent'
                )"
            );

            $message = "You have successfully inserted your product";
            $prd_id = $db->insert_id;
            
        }


        foreach($prd_types as $prd_typ_id){
            $db->query("INSERT INTO product_has_types (prd_id,prd_typ_id) VALUES ($prd_id,$prd_typ_id)");
        }
    }

}

$products_query.= " GROUP BY p.prd_id";

// Pagination
$searchQuery = [];
$request = $_GET;
$page = 1;
if(isset($_GET['page'])){
    $page = $_GET['page'];
}

$products_query .= " LIMIT 5 OFFSET ".(($page-1)*5);


$request['page'] = $page+1;
$next_page_url = http_build_query($request);

$request['page'] = $page!=1? $page-1:1;
$previous_page_url = http_build_query($request);

$products_count = $db->query("SELECT COUNT(*) AS cnt FROM products;")->fetch_assoc();

$pages = ceil( ($products_count?$products_count['cnt']:1)/5 );
// Pagination end

$products = $db->query($products_query);

$product_categories = $db->query(
    "SELECT * FROM product_categories;"
);

$product_types = $db->query(
    "SELECT * FROM product_types;"
);

print_header($user,$db);
?>
    <!-- Content -->
    <div class="content">
        <div class="paper">
            <h4 class="paper-title">Products</h4>
            <div class="paper-actions">
                <button onclick="showOverlay('Create')" class="button green">
                    <img src="../images/add.svg" />
                    Create
                </button>
                <button onclick="showOverlay('Search')" class="button purple">
                    <img src="../images/search_white.svg" />
                    Search
                </button>
            </div>
            <hr class="divider" />
            <table class="table">
                <tr>
                    <th>Product Name</th>
                    <th>Image</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Cheff Spent Time</th>
                    <th>Available Sizes</th>
                    <th>Action</th>
                </tr>
                <?php
                while ($product = $products->fetch_assoc()) {
                    ?>
                <tr>
                    <td>
                        <?php echo $product['prd_name']; ?>
                    </td>
                    <td style="text-align:center">
                        <img width="120" src="../uploads/<?php echo $product['prd_img']; ?>" alt="Picture of <?php echo $product['prd_name'] ?>" />
                    </td>
                    <td><?php echo $product['prd_cat_name']; ?></td>
                    <td>Rs <?php echo $product['prd_price']; ?></td>
                    <td><?php echo $product['prd_desc'];  ?></td>
                    <td><?php echo $product['prd_cheff_spent_time'];  ?></td>
                    <td><?php echo $product['type_names'];  ?></td>
                    <td>
                        <button onclick="snack('Are you sure you want to delete this record?','confirm','red',<?php echo $product['prd_id']; ?>)"
                            style="width:32px;height:32px" class="button red round">
                            <img width="20" height="20" src="../images/close.svg" />
                        </button>
                        <button onclick="showOverlay('Update',<?php echo $product['prd_id']; ?>)" style="width:32px;height:32px" type="button"
                            class="button green round">
                            <img width="20" height="20" src="../images/pencil.svg" />
                        </button>
                    </td>
                </tr>
                <?php
                }
                ?>
                <tr class="table-pagination">
                    <td class="align-left">
                        <?php if($page!=1) { ?>
                        <a href="products.php?<?php echo $previous_page_url; ?>" ><span class="button round"> < </span></a>
                        <?php } ?>
                    </td> 
                    <td class="align-center" colspan="6">
                                Page <?php echo $page; ?> of <?php echo $pages ?>
                    </td>
                    <td class="align-right">
                        <?php if($page<$pages){ ?>
                        <a href="products.php?<?php echo $next_page_url; ?>"><span class="button round">></span></a>
                        <?php } ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <!-- Popup -->
    <div id="popup" class="overlay hidden">
        <div class="popup">
            <div class="paper">
                <form enctype="multipart/form-data" id="submitForm" onsubmit="submit(event)">
                    <h3 class="paper-title"><span class="mode">Create</span> Products</h3>
                    <hr class="divider" />
                    <div class="form-control">
                        <input required class="form-control-input" type="text" name="productName" id="productName" />
                        <label class="form-control-label" for="productName">
                            Product
                        </label>
                    </div>
                    <div class="form-control form-control-image">
                        <input required class="form-control-input" type="file" name="productImage" id="productImage" />
                        <label class="form-control-label" for="productImage">
                            Image
                        </label>
                    </div>
                    <div class="form-control">
                        <select required class="form-control-input" name="productCategory" id="productCategory">
                            <option value=""></option>
                            <?php
                            while($product_category = $product_categories->fetch_assoc()){
                                ?>
                                <option value="<?php  echo $product_category['prd_cat_id']; ?>">
                                    <?php echo $product_category['prd_cat_name']; ?>
                                </option>
                                <?php
                            }
                            ?>
                        </select>
                        <label class="form-control-label" for="productCategory">
                            Category
                        </label>
                    </div>
                    <div class="form-control">
                        <input step="0.01" required class="form-control-input" type="number" name="productPrice"
                            id="productPrice" />
                        <label class="form-control-label" for="productPrice">
                            Price
                        </label>
                    </div>
                    <div class="form-control form-control-textarea">
                        <textarea required class="form-control-input" name="productDescription"
                            id="productDescription"></textarea>
                        <label class="form-control-label" for="productDescription">
                            Description
                        </label>
                    </div>
                    <div class="form-control">
                        <input required class="form-control-input" type="text" placeholder="HH:MM:SS" name="cheffSpentTime" id="cheffSpentTime" />
                        <label class="form-control-label" for="cheffSpentTime">
                            Cheff Spent Time
                        </label>
                    </div>
                    <div class="form-control form-control-multi-select">
                        <select multiple required class="form-control-input" name="productSize" id="productSize">
                            <?php

                            while($product_type = $product_types->fetch_assoc()){
                                ?>
                                <option value="<?php  echo $product_type['prd_typ_id']; ?>">
                                    <?php echo $product_type['prd_typ_name']; ?>
                                </option>
                                <?php
                            }
                            ?>
                        </select>
                        <label class="form-control-label" for="productSize">
                            Sizes
                        </label>
                    </div>
                    <input type="hidden" id="itemId" name="itemId" />
                    <hr class="divider" />
                    <div class="form-buttons-right">
                        <button onclick="hideOverlay()" class="button red">Cancel</button>
                        <button name="submit" value="submit" id="submitButton" type="submit" class="button green"> <span class="mode">Create</span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php

print_footer($message);