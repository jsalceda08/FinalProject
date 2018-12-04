<?php 
include ('server.php');
include_once('connect.php');

if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}   

    $query = "SELECT * FROM project ORDER BY id DESC LIMIT 50;"; 
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
                <ul id="menu">
                    <li><a href="admin_index.php">Users</a></li>
                    <li><a href="admin_questions.php">Questions</a></li>
                </ul>              
                <div>                   
                <small>
				    <?php  if (isset($_SESSION['username'])) : ?>
                    <p>Welcome <strong><?php echo $_SESSION['username']; ?>				       <i  style="color: #888;">(<?php echo ucfirst($_SESSION['users']['roles']); ?>)</i> <br></strong></p>
                    <?php endif ?>
				</small>
				<table>
				    <thead>
				        <tr>
				            <th>Title</th>
				            <th>Content</th>
				            <th>Image</th>
				            <th>Date</th>
				            <th>Actions</th>
				        </tr>
				    </thead>
				    <?php while ($row = $statement->fetch()): ?>
                    <tr>
                        <td><?= $row['title'] ?></td>
                        <td><?= html_entity_decode($row['content']) ?></td>
                        <td><img src="<?= 'resize/'.$row['image']?>." alt=""></td>
                        <td><?= $row['date'] ?></td>
                        <td><a href="admin_editquestions.php?id=<?= $row['id'] ?>">edit</a></td>
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
</body>
</html>