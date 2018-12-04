<!-- Allows a user to edit the post and view the post that has been posted -->
<?php
/*
 * Jan Salceda 0313887
 * October 2, 2018
 * Assignment 4
 */

    $username = "";
	$roles = "";
    $email = "";
	$id = 0;
	$update = false;

    //require 'authenticate.php';
    include('server.php');
    if(isset($_GET['id']) && is_numeric($_GET['id'])) {
      require 'connect.php';
      //include_once ('server.php');
      $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

      $query = "SELECT * FROM users WHERE id = :id;";
      $statement = $db->prepare($query); 
      $bind_values = ['id' => $id];
      $statement->execute($bind_values); 
      
      if($statement->rowCount() <= 0) {
        header("Location: admin_index.php");
        die();
      }
      $row = $statement->fetch();
    }
    else {
      header("Location: admin_index.php");
      die();
    }  

	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM users WHERE id=$id");

		if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$username = $n['username'];
			$roles = $n['roles'];
            $email = $n['email'];
		}
	}
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
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
            <?php if(isset($_SESSION['username'])): ?>
            <li><a href="logout.php">Logout</a></li>
            <?php else: ?>       
            <li><a href="login.php">Login</a></li>
            <?php endif ?>            
            <li><a href="Questions.php" title="Questions">Questions</a></li>
            <li><a href="" title="ABOUT US">ABOUT US</a></li>           
            <li><a href="index.php">Home</a></li>
            <?php if(isset($_SESSION['roles'])): ?>
                <?php if($_SESSION['roles'] == 'admin'): ?>
                
                <li><a href="admin_index.php">Admin Home</a></li>
                <?php endif ?>
            <?php endif ?>              
      </ul>            
  </div>             
<!-- HEADER ENDS -->           
<!-- BODY STARTS -->             
	<div id="body">             
    <!-- LEFT PANEL -->             
        <div id="leftPanel">             
        	<h2>Question</h2>             
        <div id="all_blogs">
          <form action="edit_user.php" method="post">
            <fieldset>
              <legend>Edit User</legend>
              <p>
                <label for="username">Username</label>
                <input name="username" id="username" value='<?= $row["username"] ?>'>
              </p>
              <p>
                <label for="roles">Roles</label>
                <input name="roles" id="roles" value='<?= $row["roles"] ?>'>
              </p>
              <p>
                <label for="email">Email</label>
                <input name="email" id="email" value='<?= $row["email"] ?>'>
              </p>
              <p>
                <input type="hidden" name="id" value='<?= $row["id"] ?>'>
                <?php if ($update == true): ?>
                    <button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
                <?php else: ?>
                    <button class="btn" type="submit" name="update" >Update</button>
                <?php endif ?>
              </p>
            </fieldset>
          </form>
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
    <br class="spacer" />
    </div>           
<!-- BODY ENDS -->           
<!-- FOOTER STARTS -->           
	<div id="footer">           
    	<ul>           
        		<li><a href="Questions.php" title="Feedback">Feedback</a></li>                              
            <li><a href="about.html" title="ABOUT US">ABOUT US</a></li>          
            <li><a href="index.php" title="HOME">HOME</a></li>           
    </ul>           
        <p>Copyright <br class="spacer" />           
Designed by Jan Salceda</p>           
</div>           
<!-- FOOTER ENDS -->           
</body>           
</html>           
