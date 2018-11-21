<?php 
include_once('server.php'); 
include_once('connect.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL - Create user</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style>
	</style>
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
            <?php if(isset($_SESSION['username'])): ?>
            <li><a href="logout.php">Logout</a></li>
            <?php else: ?>       
            <li><a href="login.php">Login</a></li>
            <?php endif ?>           
            <li><a href="Questions.php?sort=title" title="Questions">Questions</a></li>
            <li><a href="" title="ABOUT US">ABOUT US</a></li>           
            <li><a href="index.php">Home</a></li>       
      </ul>     
        <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
    	<?php endif ?>        
  </div>             
<!-- HEADER ENDS --> 
	<div id="body">             
    <!-- LEFT PANEL -->             
    	<div id="leftPanel">             
<form method="post" action="">
		<div class="input-group">
		    <?php include('errors.php'); ?> 
			<label>Username</label>
			<input type="text" name="username" value="<?php echo $username; ?>">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
			<label>User type</label>
			<select name="roles" id="roles" >
				<option value=""></option>
				<option value="admin">Admin</option>
				<option value="user">User</option>
			</select>
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
			<button type="submit" class="btn" name="reg_user">Create user</button>
		</div>
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
</body>
</html>