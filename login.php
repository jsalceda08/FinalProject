<?php   
/*
 * Jan Salceda 0313887
 * November 15, 2018
 */
    include('connect.php'); 
    include('server.php'); 
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
         <h2>Login</h2>                 
          <form method="post" action="login.php">  
            <?php include('errors.php'); ?>  
            <div class="input-group">  
                <label>Username</label>  
                <input type="text" name="username" >  
            </div>  
            <div class="input-group">  
                <label>Password</label>  
                <input type="password" name="password">  
            </div>  
            <div class="input-group">  
                <button type="submit" class="btn" name="login_user">Login</button>  
            </div>  
            <p>  
                Not yet a member? <a href="register.php">Sign up</a>  
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
            <?php if(isset($_SESSION['username'])): ?>
            <?php else:?>           
            <a href="register.php"><img src="images/banner.jpg" alt="Register Now" title="Family Doctor" width="143" height="105" /></a> 
            <?php endif ?>         
            </div>                 
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