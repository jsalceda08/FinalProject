<!-- The making of a new question. Prompts user for a title and content -->
<?php
/*
 * Jan Salceda 0313887
 * November 2, 2018
 */
    require 'connect.php';
    //require 'authenticate.php';

    $query = "SELECT * FROM project ORDER BY id DESC LIMIT 20;";
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

<!-- Bootstrap -->
<!--
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
-->
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
        	<h2>Questions</h2>             
          <ul id="menu">
    </ul>
    <div id="all_questions">

        <?php if(!isset($statement) || $statement->rowCount() <= 0): ?>
            <p>SORRY! No Questions found!</p>
        <?php else: ?>

        <?php while ($row = $statement->fetch()): ?>

            <div class="question_post">
                <h3><a href="show.php?id=<?= $row['id'] ?>"><?= $row['title'] ?></a></h3>
                <div class="question_content">
                    <?= truncateContent($row['content'], $row['id']) ?>
                </div>
                <p>                 
                  <small>
                    <?= date("M d, Y, h:i A", strtotime($row['date'])) ?> -
                    <a href="edit.php?id=<?= $row['id'] ?>">edit</a>
                  </small>
                </p>
            </div>

        <?php endwhile ?>
        <?php endif ?>
        
    </div> 
   
    <div id="all_questions">
      <form action="getting.php" method="post">
        <fieldset>
          <legend>Ask your question here!</legend>
          <p>
            <label for="title">Title</label>
            <input name="title" id="title">
          </p>
          <p>
            <label for="content">Content</label>
            <textarea name="content" id="content"></textarea>
          </p>
<!--
          <img src="captcha.php" alt="Captcha Image">
          <input type="text" name="captcha">
-->
          <p>
            <input type="submit" name="command" value="Submit">
          </p>
        </fieldset>
      </form>
    </div>
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
