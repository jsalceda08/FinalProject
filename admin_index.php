<?php 
include ('server.php');
include_once('connect.php');

if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}   

    $query = "SELECT * FROM users ORDER BY id DESC LIMIT 50;"; 
    $statement = $db->prepare($query);  
    $statement->execute(); 

//if (isset($_GET['logout'])) {
//	session_destroy();
//	unset($_SESSION['user']);
//	header("location: ../login.php");
//}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
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
  </div>
  
  	<div id="body">             
    <!-- LEFT PANEL -->             
    	<div id="leftPanel">
    			<!-- notification message -->
    			

		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>
       	    <div>                   
                <small>
				    <?php  if (isset($_SESSION['username'])) : ?>
                    <p>Welcome <strong><?php echo $_SESSION['username']; ?>				       <i  style="color: #888;">(<?php echo ucfirst($_SESSION['users']['roles']); ?>)</i> <br></strong></p>
                    <?php endif ?>
                    <p>Would you like to create a new user:<a href="create_user.php"> Create</a></p> 
				</small>
				<table>
				    <thead>
				        <tr>
				            <th>Username</th>
				            <th>Role</th>
				            <th>Email</th>
				            <th>Actions</th>
				        </tr>
				    </thead>
				    <?php while ($row = $statement->fetch()): ?>
                    <tr>
                        <td><?= $row['username'] ?></td>
                        <td><?= $row['roles'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td><a href="edit_user.php?id=<?= $row['id'] ?>">edit</a></td>
                        <td><a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a></td>
                    </tr>
                <?php endwhile ?>
				</table>
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
</body>
</html>