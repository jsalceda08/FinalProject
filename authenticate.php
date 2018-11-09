
 <!--This will authenticate any user that tries to edit, delete or post anything new -->
 
 <?php
/*
 * Jan Salceda 0313887
 * November 2, 2018
 */

 	define('ADMIN_LOGIN','janpaulo');

  	define('ADMIN_PASSWORD','Janpaulo08');


	if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])

	      || ($_SERVER['PHP_AUTH_USER'] != ADMIN_LOGIN)

	      || ($_SERVER['PHP_AUTH_PW'] != ADMIN_PASSWORD)) {

	    header('HTTP/1.1 401 Unauthorized');

	    header('WWW-Authenticate: Basic realm="Our Blog"');

	    exit("Access Denied: Username and password required.");

	}
?>