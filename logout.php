<?php
/*
 * Jan Salceda 0313887
 * November 15, 2018
 */

require_once('connect.php');

//log user out
//$user->logout();
$user->logout();
header('Location: index.php'); 

?>