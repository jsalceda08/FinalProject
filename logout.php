<?php
//include('class.user.php');
require_once('connect.php');

//log user out
//$user->logout();
$user->logout();
header('Location: index.php'); 

?>