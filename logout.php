<?php
require_once "init.php";

session_destroy();
unset($_COOKIE['remember_token']) ;
setcookie('remember_token',null,-1,'/');

header("Location: index.php");