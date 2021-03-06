<!-- The making of a new question. Prompts user for a title and content --> 
<?php 
/* 
 * Jan Salceda 0313887 
 * November 18, 2018 
 */ 
    require_once 'connect.php'; 

    if(!isset($_GET['sort']))
    {
        $query = "SELECT * FROM project ORDER BY id DESC LIMIT 50;"; 
        $statement = $db->prepare($query);  
        $statement->execute();
    }else{
        if($_GET['sort'] == 'title')
        {
            $query = "SELECT * FROM project ORDER BY title ASC";
            $statement = $db->prepare($query);
            $statement->execute();
        }else if($_GET['sort'] == 'date')
        {
            $query = "SELECT * FROM project ORDER BY date ASC";
            $statement = $db->prepare($query);
            $statement->execute();
        }
    }

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
<script src='https://devpreview.tiny.cloud/demo/tinymce.min.js'></script>
<script>
  tinymce.init({
    selector: '#mytextarea'
  });
</script>
</head> 
 
<body> 
<!-- HEADER STARTS -->
        <form action="" method="get" enctype="multipart/form-data">
            <input type="text" name="search" />
            <input type="submit" value="Search">
        </form> 
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
        	<h2>Questions</h2>
          <ul>
              <li><a href="Questions.php?sort=title">Title</a></li>
              <li><a href="Questions.php?sort=date">Date</a></li>
          </ul>              
    <div id="all_questions"> 
 
        <?php if(!isset($statement) || $statement->rowCount() <= 0): ?> 
            <p>SORRY! No Questions found!</p> 
        <?php else: ?> 
 
        <?php while ($row = $statement->fetch()): ?> 
 
            <div class="question_post"> 
                <h3><a href="show.php?id=<?= $row['id'] ?>"><?= $row['title'] ?></a></h3>
                <img src="<?= 'resize/'.$row['image']?>." alt="" id="image">
                <div class="question_content"> 
                    <?= html_entity_decode($row['content'], $row['id']) ?> 
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
    <?php if(isset($_SESSION['username'])): ?>
    <div id="all_questions"> 
      <form action="process_post.php" method="post" enctype="multipart/form-data"> 
        <fieldset> 
          <legend>Ask your question here!</legend> 
           <p>
            <label for="title">Title</label> 
            <input name="title" id="title"> 
          </p>  
            <label for="content">Content</label> 
            <textarea name="content" id="mytextarea"></textarea> 
          <input type="file" name="image"> 
          <p> 
            <input type="submit" name="command" value="Create"> 
          </p> 
        </fieldset> 
      </form> 
    </div>
    <?php else: ?>
    <h3>Please <a href="login.php">Login</a></h3>
    <?php endif ?> 
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
