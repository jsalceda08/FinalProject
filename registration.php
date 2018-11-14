<?php
/*
 * Jan Salceda 0313887
 * October 2, 2018
 * Assignment 4
 */

session_start();
$_SESSION['message'] = '';
//$mysql = new mysqli('localhost', 'root', 'mypass123', 'serverside');
require 'connect.php';

if($_POST['username'] != null && isset($_POST['username'])){
    $query = "SELECT username FROM users WHERE username = {$_POST['username']}";
    
    $statement = $db->prepare($query);
    $statement->execute();
    
    if($statement->rowCount() != 1){
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    }
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    //two passwords are equal to each other
    if($_POST['password'] == $_POST['confirmpassword']){
        
//        $username = $db->real_escape_string($_POST['username']);
//        $email = $db->real_escape_string($_POST['email']);
//        $password = md5($_POST['password']);
//        $avatar_path = $db->real_escape_string('image/'.$_FILES['avatar']['name']);
//        $username = $db->prepare($_POST['username']);
//        $email = $db->prepare($_POST['email']);
//        $password = md5($_POST['password']);
        
    if($_POST['password'] != null && isset($_POST['password'])){
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

//    if($_POST['confirm'] != null && isset($_POST['confirm'])){
//        $confirmPass = filter_input(INPUT_POST, 'confirm', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
//    }
//
//    if($password && $confirmPass){
//        if($password == $confirmPass){
//            $hashPassword = password_hash($password, PASSWORD_DEFAULT);
//        }
//    }
        
        $query = "INSERT INTO users (username, email, password) VALUES (:name, :email, :password); ";
        $statement = $db->prepare($query);
        $statement->bindValue(':username', $username);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':password', $password);
        
        $statement->execute();
        
        if($db->execute($sql) === true) {
            $_SESSION['message'] = "Registration successful! Added $username to the database!";
            header("location: welcome.php");
        }
        else{
            $_SESSION['message'] = "User could not be added to the database!";
        }
//        $sql = "INSERT INTO users (username, email, password) ". "VALUES ('$username', '$email', '$password')";
//        
//        //if the query is successful, redirect to welcome.php page
//         
//        if($db->execute($sql) === true) {
//            $_SESSION['message'] = "Registration successful! Added $username to the database!";
//            header("location: welcome.php");
//        }
//        else {
//            $_SESSION['message'] = "User could not be added to the database!";
//            }
        //$avatar_path = $db->prepare('images/'.$_FILES['avatar']['name']);
        //make sure file type is an image
//        if(preg_match("!image!", $_FILES['avatar']['type'])){
//            //copy image to images/ folder
//            if(copy($_FILES['avatar']['tmp_name'], $avatar_path)){
//                $_SESSION['username'] = $username;
//                $_SESSION['avatar'] = $avatar_path;
//                
//                $sql = "INSERT INTO users (username, email, password, avatar) ". "VALUES ('$username', '$email', '$password', '$avatar_path')";
//                
//                //if the query is successful, redirect to welcome.php page
//                
//                if($mysql->query($sql) === true) {
//                    $_SESSION['message'] = "Registration successful! Added $username to the database!";
//                    header("location: welcome.php");
//                }
//                else {
//                    $_SESSION['message'] = "User could not be added to the database!";
//                }
//            }
//            else {
//                $_SESSION['message'] = "File upload failed!";
//            }
//        }
//        else {
//            $_SESSION['message'] = "Please only upload GIF, JPG, or PNG images!";
//        }
    }
    else {
        $_SESSION['message'] = "Two passwords do not match!";
    }
}

?>

<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>HEALTH PORTAL</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<!-- HEADER STARTS -->
    <div id="header">
        &nbsp;
        <h2 class="punchline">&nbsp;</h2>
        <h2 class="punchline">&nbsp;</h2>
        <h2 class="punchline">&nbsp;</h2>
        <h2 class="punchline">HEALTH PORTAL</h2>            
    	<ul>            
            <li><a href="Questions.php" title="Questions">Questions</a></li>
            <li><a href="" title="ABOUT US">ABOUT US</a></li>           
            <li><a href="index.php">Home</a></li>            
      </ul>            
  </div>             
<!-- HEADER ENDS -->           
<!-- BODY STARTS -->             
	<div id="body">             
    <!-- LEFT PANEL -->             
    	<div id="leftPanel">             
        	<h2>Register Now!</h2>             
            <link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
            <link rel="stylesheet" href="form.css" type="text/css">
            <div class="body-content">
              <div class="module">
                <h1>Create an account</h1>
                <form class="form" action="" method="post" enctype="multipart/form-data" autocomplete="off">
                  <div class="alert alert-error"><?= $_SESSION['message'] ?></div>
                  <input type="text" placeholder="User Name" name="username" required />
                  <input type="email" placeholder="Email" name="email" required />
                  <input type="password" placeholder="Password" name="password" autocomplete="new-password" required />
                  <input type="password" placeholder="Confirm Password" name="confirmpassword" autocomplete="new-password" required />
<!--                  <div class="avatar"><label>Select your avatar: </label><input type="file" name="avatar" accept="image/*" required /></div>-->
                  <input type="submit" value="Register" name="register" class="btn btn-block btn-primary" />
                </form>
              </div>
            </div>           
    </div>             
    <!-- LEFT PANEL -->             
   	  <div id="rightPanel">             
        	<h2>Health Articles&nbsp;</h2>            
            <ul>            
                <li><a href="diet.html" title="Diet">Diet </a></li>
                                   
                <li><a href="organs.html" title="Organs">Organs</a></li>                   
                <li><a href="diseases.html" title="Diseases">Diseases</a></li>            
                                    
            </ul>           
            <a href="#"><img src="images/banner.jpg" alt="Family Doctor" title="Family Doctor" width="143" height="105" /></a>       </div>               
    <br class="spacer" /></div>           
<!-- BODY ENDS -->           
<!-- FOOTER STARTS -->           
	<div id="footer">           
    	<ul>           
        		<li><a href="Questions.php" title="Feedback">Questions</a></li>                              
            <li><a href="about.html" title="ABOUT US">ABOUT US</a></li>          
            <li><a href="index.php" title="HOME">HOME</a></li>           
    </ul>           
        <p>Copyright <br class="spacer" />           
Designed by Jan Salceda</p>           
</div>           
<!-- FOOTER ENDS -->           
</body>           
</html>           
