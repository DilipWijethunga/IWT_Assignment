<?php
require_once "../init.php";

// Redirecting if user is already login
if($user){
    if($user['u_type']=="admin"){
        // If user is an admin
        header("Location: dashboard.php");
    } else {
        // Other users can go to home page
        header("Location: ../index.php");
    }

    die;
}


// Login in if your submited the form
$error = null;
if(isset($_POST['submit'])){
    $email = $_POST['username'];
    $password = $_POST['password'];

    $sql= "SELECT * FROM users WHERE u_email = '$email' AND u_type='admin' LIMIT 1;";

    $userQuery = $db->query($sql);
    if($userQuery){
        $user = $userQuery->fetch_assoc();

        if($user['u_password']==md5($password)){
            // Redirecting after a successfull login.
            $_SESSION['user_id']= $user['u_id'];

            header("Location: dashboard.php");
            die;
        } else {
            $error = "Invalid password";
        }
    } else {
        $error="Invalid email.";
    }
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/admin.css">
    <title>Admin Login</title>
</head>

<body>
    <div class="wrapper">
        <div class="login-box">
            <img class="login-logo" width="160" height="160" src="images/logo.jpg" alt="Fast food logo">
            <form method="POST"  class="login-form">
                <?php
                    if($error){
                        ?>
                            <p class="error"><?php echo $error; ?></p>
                        <?php
                    }
                ?>
                <label class="form-label" for="username">
                    <div class="form-control-title">Username:-</div>
                    <input required class="form-control" type="text" name="username" id="username" />
                </label>
                <label class="form-label" for="password">
                    <div class="form-control-title">Password:-</div>
                    <input required class="form-control" type="password" name="password" id="password" />
                </label>
                <label class="form-label" for="submit">
                    <input name="submit" class="form-button" type="submit" value="Login"/>
                </label>
            </form>
        </div>
    </div>
</body>

</html>