<?php
//include('class.user.php');
//require_once('connect.php');

//log user out
//$user->logout();
session_destroy();
header('Location: index.php'); 

?>