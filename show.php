<?php
/*
 * Jan Salceda 0313887
 * November 5, 2018
 */

    if(isset($_GET['id']) && is_numeric($_GET['id'])) {
      require 'connect.php';

      $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

      $query = "SELECT * FROM project WHERE id = :id;";
      $statement = $db->prepare($query); 
      $bind_values = ['id' => $id];
      $statement->execute($bind_values);
      
      if($statement->rowCount() <= 0) {
        header("Location: index.php");
        die();
      }
      $row = $statement->fetch();
    }
    else {
      header("Location: index.php");
      die();
    }  

    //require 'connect.php';
    //require 'authenticate.php';

    $query = "SELECT * FROM comments ORDER BY id DESC LIMIT 20;";
    $statement = $db->prepare($query); 
    $statement->execute();


    function truncateContent($question_content, $id) {
      
      if(strlen($question_content) <= 200){
        return $question_content;
      }

      return substr($question_content,0,200)." . . . <a href='show.php?id=$id'>(Show More)</a>";
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
            <div id="all_questions">
                <div class="question_post">
                    <h2><?= $row['title'] ?></h2>
                    <p>
                      <small>
                        <?= date("M d, Y, h:i A", strtotime($row['date'])) ?> -
                        <a href="edit.php?id=<?= $row['id'] ?>">edit</a>
                      </small>
                    </p>
                <div class="question_content">
                  <?= $row['content'] ?>
                </div>
              </div>
          </div> 
        <div id="comments">
          <form action="process_comments.php" method="post">
            <fieldset>
              <legend>Comments</legend>
                  <p>
                    <label for="name">Name</label>
                    <input name="name" id="name">
                  </p>
                  <p>
                    <label for="content">Content</label>
                    <textarea name="content" id="content"></textarea>
                  </p>
                  <p>
                    <input type="submit" name="command" value="Submit">
                  </p>
            </fieldset>
          </form>
        </div>
<!--
        <div id="comments">
            <div class="comments_post">
                <h2><?= $row['name'] ?></h2>
                  <p>
                  <small>
                    <?= date("M d, Y, h:i A", strtotime($row['date'])) ?> -
                    <a href="edit.php?id=<?= $row['id'] ?>">edit</a>
                  </small>
                  </p>
            <div class="question_content">
              <?= $row['content'] ?>
            </div>
          </div>
      </div> 
-->
    </div>             
    <!-- LEFT PANEL --> 
    <!-- RIGHT PANEL -->                
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