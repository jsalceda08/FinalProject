<!-- Allows a user to edit the post and view the post that has been posted -->
<?php
/*
 * Jan Salceda 0313887
 * October 2, 2018
 * Assignment 4
 */

    require 'authenticate.php';

    if(isset($_GET['id']) && is_numeric($_GET['id'])) {
      require 'connect.php';

      $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

      $query = "SELECT * FROM project WHERE id = :id;";
      $statement = $db->prepare($query); 
      $bind_values = ['id' => $id];
      $statement->execute($bind_values); 
      
      if($statement->rowCount() <= 0) {
        header("Location: Questions.php");
        die();
      }
      $row = $statement->fetch();
    }
    else {
      header("Location: Questions.php");
      die();
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
          <form action="process_post.php" method="post">
            <fieldset>
              <legend>Edit Blog Post</legend>
              <p>
                <label for="title">Title</label>
                <input name="title" id="title" value='<?= $row["title"] ?>'>
              </p>
              <p>
                <label for="content">Content</label>
                <textarea name="content" id="content"><?= $row["content"] ?></textarea>
              </p>
              <p>
                <input type="hidden" name="id" value='<?= $row["id"] ?>'>
                <input type="submit" name="command" value="Update">
                <input type="submit" name="command" value="Delete" onclick="return confirm('Are you sure you wish to delete this post?')">
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
            <a href="#"><img src="images/banner.jpg" alt="Family Doctor" title="Family Doctor" width="143" height="105" /></a>       </div>               
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
