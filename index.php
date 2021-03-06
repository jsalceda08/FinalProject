<!-- Creates home page of Questions which shows recent posts -->
<?php
/*
 * Jan Salceda 0313887
 * November 29, 2018
 */

    include_once('connect.php'); 

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
        <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
    	<?php endif ?>
        </div>
<!--        Search prototype -->
        <?php
        if(isset($_GET['search']))
        {
            $title = $_GET['search'];
            $query = "SELECT * FROM project WHERE title LIKE '%".$title. "%'";
            $statement = $db->prepare($query);
            $statement->execute();
            //$column = $tables->fetchAll();

            if($statement -> rowCount() != null)
            {
                while ($row = $statement->fetch()): ?> 
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
                <?php
            }else{ 
                echo "No existing questions.";    
            }
        }
        else{
            ?>


            <!-- HEADER ENDS -->           
            <!-- BODY STARTS -->             
                <div id="body">             
                <!-- LEFT PANEL -->             
                    <div id="leftPanel">             
                        <h2>Welcome to Health Portal</h2>             
                        <p class="topPad"><b>Health is the general condition of a person in all aspects. It is also a level of functional and/or metabolic efficiency of an organism, often implicitly human.<br>             
                        <br>             
                        At the time of the creation of the World Health Organization (WHO), in 1948, health was defined as being "a state of complete physical, mental, and social well-being and not merely the absence of disease or infirmity".<br>             
                        <br>             
                        Only a handful of publications have focused specifically on the definition of health and its evolution in the first 6 decades. Some of them highlight its lack of operational value and the problem created by use of the word "complete." Others declare the definition, which has not been modified since 1948, "simply a bad one."&nbsp;<br>            
                        <br>            
                        In 1986, the WHO, in the Ottawa Charter for Health Promotion, said that health is "a resource for everyday life, not the objective of living. Health is a positive concept emphasizing social and personal resources, as well as physical capacities." Classification systems such as the WHO Family of International Classifications (WHO-FIC), which is composed of the International Classification of Functioning, Disability, and Health (ICF) and the International Classification of Diseases (ICD) also define health.<br>             
                        <br>             
                        Overall health is achieved through a combination of physical, mental, emotional, and social well-being, which, together is commonly referred to as the Health Triangle.</b>              
            </p>             
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
        <?php       
        }        
        ?>
           
</body>           
</html>           
