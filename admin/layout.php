<?php

if(!$user||$user['u_type']!='admin') {
    header("Location: login.php");
    die;
}


function print_header($user,$db)
{

    $notification_count = $db->query(
        "SELECT COUNT(*) AS notify_count FROM notifications WHERE u_id = {$user['u_id']};"
    )->fetch_assoc();

    $latest_notifications_query = $db->query(
    "SELECT * FROM notifications WHERE u_id={$user['u_id']};"
    );


    
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/admin.css">
    <script src="../js/admin.js"></script>
</head>

<body>
    <!-- Header start -->
    <header class="header">
        <a href="index.html">
            <img width="40px" height="40px" class="header-logo" src="../images/logo.jpg" src="Food order system logo" />
        </a>
        <div class="header-right">
            <ul class="header-menu">
                <a class="badge" href="#">
                    <img src="../images/bell.svg" alt="Notifications" />
                    <span class="number"><?php echo $notification_count?$notification_count['notify_count']:0; ?></span>
                </a>
                <div class="menu-items">
                    <li class="notification-main">
                        <b>Notifications</b>
                        <img class="notification-refresh-icon" src="../images/refresh.svg" alt="Refresh icon" />
                        <hr />
                    </li>
                    <?php
                        while ($latest_notification = $latest_notifications_query->fetch_assoc()) {
                            ?>
                            <li>
                                <a href="">
                                    <?php echo $latest_notification['ntfy_content'] ?><br />
                                    <small>Just Now</small>
                                </a>
                                <hr />
                            </li>
                            <?php
                        }
                    ?>
                </div>
            </ul>
            <ul class="header-menu">
                <a href="#">
                    <img width="32" class="header-user" src="../uploads/<?php echo $user['u_img']; ?>" alt="account icon" />
                    <img width="32" class="header-user" src="../images/dropdown.svg" alt="dropdown down icon" />
                </a>
                <div class="menu-items">
                    <li>
                        <a href="../user_profile.html">Profile</a>
                        <hr>
                    </li>
                    <li>
                        <a href="dashboard.php">Dashboard</a>
                        <hr>
                    </li>
                    <li>
                        <a href="../logout.php">Logout</a>
                    </li>
                </div>
            </ul>
        </div>
    </header>
    <!-- Sidebar-->
    <nav class="sidebar">
        <ul class="sidebar-list">
            <li class="sidebar-item">
                <a href="dashboard.php">Dashboard</a>
                <hr />
            </li>
            <li class="sidebar-item">
                <a href="crud_page.html">Categories</a>
                <hr />
            </li>
            <li class="sidebar-item">
                <a href="products.php">Products</a>
                <hr />
            </li>
            <li class="sidebar-item">
                <a href="crud_page.html">Drivers</a>
                <hr />
            </li>
            <li class="sidebar-item">
                <a href="crud_page.html">Cheffs</a>
                <hr />
            </li>
            <li class="sidebar-item">
                <a href="crud_page.html">Customers</a>
                <hr />
            </li>
        </ul>
    </nav>

<?php
}

function print_footer($message=null)
{
    ?>


    <!-- Snacks -->
    <div id="snacks" class="snacks">
        <?php 
        if($message){
            ?>
            <div class="snack green">
                <?php echo $message ?>
                <div class="form-buttons-right">
            
                    <button onclick="hideSnack(event)" class="snack-button green">Cancel</button>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</body>

</html>

<?php
}