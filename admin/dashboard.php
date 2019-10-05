<?php
require_once "../init.php";
require_once "layout.php";

$usersCount = $db->query(
    "SELECT 
        SUM(IF(u_type='chef',1,0)) AS chef_count, 
        SUM(IF(u_type='driver',1,0)) AS driver_count,
        SUM(IF(u_type='company',1,0)) AS company_count
    FROM users 
    WHERE 1 
    GROUP BY u_type;"
)->fetch_assoc();

$productsCount = $db->query(
    "SELECT
        COUNT(*) AS product_count
    FROM products;"
)->fetch_assoc();


print_header($user,$db);

?>
    <div class="content">
        <div class="counter red">
            <h6 class="counter-title">
                Cheffs
            </h6>
            <h5 class="counter-count"><?php echo $usersCount?$usersCount['chef_count']:0; ?></h5>
            <img class="counter-image" src="../images/person.svg" />
        </div>
        <div class="counter orange">
            <h6 class="counter-title">
                Products
            </h6>
            <h5 class="counter-count"><?php echo $productsCount?$productsCount['product_count']:0;  ?></h5>
            <img class="counter-image" src="../images/product.svg" />
        </div>
        <div class="counter purple">
            <h6 class="counter-title">
                Drivers
            </h6>
            <h5 class="counter-count"><?php echo $usersCount?$usersCount['driver_count']:0; ?></h5>
            <img class="counter-image" src="../images/vehicle.svg" />
        </div>
        <div class="counter green">
            <h6 class="counter-title">
                Companies
            </h6>
            <h5 class="counter-count"><?php echo $usersCount?$usersCount['company_count']:0; ?></h5>
            <img class="counter-image" src="../images/organization.svg" />
        </div>
        <div class="paper">
            <h6 class="paper-title">Reported Users</h6>
            <hr class="divider" />
            <table class="table">
                <tr>
                    <th>User</th>
                    <th>Type</th>
                    <th>Estimated Time</th>
                    <th>Spent Time</th>
                    <th>Difference</th>
                    <th>Customer Review</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <td>
                        <img class="avatar" width="32" src="../images/avatar.jpg" alt="Ramesh Kithsiri Profile Photo" />
                        Ramesh Kithsiri
                    </td>
                    <td>Driver</td>
                    <td>1 H</td>
                    <td>2 H</td>
                    <td>1 H</td>
                    <td>Too Late.</td>
                    <td>
                        <input type="button" onclick="snack('Are sure you want to bang this user?','confirm','red');"
                            class="button red" value="Bang" />
                        <input type="button" onclick="snack('Successfully ignored.','message','green');"
                            class="button green" value="Ignore" />
                    </td>
                </tr>
                <tr class="table-pagination">
                    <td class="align-left">
                        <span class="button round">
                            <</span> </td> <td class="align-center" colspan="5">
                                1 of 5
                    </td>
                    <td class="align-right">
                        <span class="button round">></span>
                    </td>
                </tr>
            </table>
        </div>
    </div>
<?php print_footer(); ?>