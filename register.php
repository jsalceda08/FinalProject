<?php 
/* 
 * Jan Salceda 0313887 
 * October 2, 2018 
 * Assignment 4 
 */ 
 
    include_once('connect.php'); 
    include_once('server.php'); 
 
 
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
            <li><a href="login.php">Login</a></li>                 
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
              <form method="post" action="register.php"> 
                <?php include('errors.php'); ?> 
                <div class="input-group"> 
                  <label>Username</label> 
                  <input type="text" name="username" value="<?php echo $username; ?>"> 
                </div> 
                <div class="input-group"> 
                  <label>Email</label> 
                  <input type="email" name="email" value="<?php echo $email; ?>"> 
                </div> 
                <div class="input-group"> 
                  <label>Password</label> 
                  <input type="password" name="password_1"> 
                </div> 
                <div class="input-group"> 
                  <label>Confirm password</label> 
                  <input type="password" name="password_2"> 
                </div> 
                <div class="input-group"> 
                  <button type="submit" class="btn" name="reg_user">Register</button> 
                </div> 
                <p> 
                    Already a member? <a href="login.php">Sign in</a> 
                </p> 
              </form> 
         
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
