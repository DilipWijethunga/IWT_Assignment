<?php
require_once "init.php";

// Destroying the session data id temporary login
session_destroy();

// Destroying cookies if persistent login
unset($_COOKIE['remember_token']) ;
setcookie('remember_token',null,-1,'/');

// Redirecting homepage
header("Location: index.php");