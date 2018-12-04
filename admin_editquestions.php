<!-- Allows a user to edit the post and view the post that has been posted -->
<?php
/*
 * Jan Salceda 0313887
 * October 2, 2018
 * Assignment 4
 */

    require 'connect.php';
    include_once('server.php');
    if (!isAdmin()) {
        $_SESSION['msg'] = "You must log in first";
        header('location: index.php');
    }      

    if(isset($_GET['id']) && is_numeric($_GET['id'])) {

      $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

      $query = "SELECT * FROM project WHERE id = :id;";
      $statement = $db->prepare($query); 
      $bind_values = ['id' => $id];
      $statement->execute($bind_values); 
      
      if($statement->rowCount() <= 0) {
        header("Location: admin_questions.php");
        die();
      }
      $row = $statement->fetch();
    }
    else {
      header("Location: admin_questions.php");
      die();
    }    
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>HEALTH PORTAL</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script src='https://devpreview.tiny.cloud/demo/tinymce.min.js'></script>
<script>
  tinymce.init({
    selector: '#mytextarea'
  });
</script>
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
      </ul>            
  </div>             
<!-- HEADER ENDS -->           
<!-- BODY STARTS -->             
	<div id="body">             
    <!-- LEFT PANEL -->             
        <div id="leftPanel">             
        	<h2>Question</h2>             
        <div id="all_blogs">
          <form action="admin_process.php" method="post">
            <fieldset>
              <legend>Edit Questions</legend>
              <p>
                <label for="title">Title</label>
                <input name="title" id="title" value='<?= $row["title"] ?>'>
              </p>
              <p>
                  <label for="image">Image</label>
                  <img src="<?= 'resize/'.$row['image']?>." alt="">
                  <input type="submit" name="deleteImage" value="Delete Image" onclick="return confirm('Are you sure you wish to delete the image?')" />
              </p>
              <p>
                <label for="content">Content</label>
                <textarea name="content" id="mytextarea"><?= $row["content"] ?></textarea>
              </p>
              <p>
                <input type="hidden" name="id" value='<?= $row["id"] ?>'/>
                <input type="submit" name="command2" value="Update">
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
            <a href="#"><img src="images/banner.jpg" alt="Register Now" title="Family Doctor" width="143" height="105" /></a>       </div>               
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
