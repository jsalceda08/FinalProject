<!-- Validation of posting --> 
<?php 
/* 
 * Jan Salceda 0313887 
 * November 5, 2018 
 */ 
 
    //global $db;

	function validate_title_and_content() { 
		$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS); 
		$content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_SPECIAL_CHARS); 
		return strlen($title) > 0 && strlen($content) > 0; 
	} 

require 'connect.php'; 
 
	if(isset($_POST["command2"])) { 
 
  		
		$id = filter_input(INPUT_POST,"id", FILTER_VALIDATE_INT); 
 
		if(($_POST["command2"] == "Create" || $_POST["command2"] == "Update") 
			&&  !validate_title_and_content()) { 
			$error = "Both the title and content must be at least one character."; 
		} 
		else { 
			if($_POST["command2"] == "Create") { 
				$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS); 
				$content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_SPECIAL_CHARS); 
				$query = "INSERT INTO project (title, content) VALUES (:title, :content);"; 
				$statement = $db->prepare($query);  
				$bind_values = ['title' => $title, 'content' => $content]; 
				$statement->execute($bind_values);  
				header("Location: admin_questions.php"); 
				die(); 
	  		} 
	  		else if(!$id) { 
	  			$error = "Invalid Post['ID']."; 
		  	} 
		  	else { 
		  		if($_POST["command2"] == "Update") { 
					$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS); 
					$content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_SPECIAL_CHARS); 
			  		 
					$query = "UPDATE project SET title = :title, content = :content WHERE id = :id;"; 
					$statement = $db->prepare($query); 
					$bind_values = ['title' => $title, 'content' => $content, 'id' => $id]; 
					$statement->execute($bind_values);  
			  		header("Location: admin_questions.php"); 
					die(); 
		  		} 
		  		else if($_POST["command2"] == "Delete") { 
					$query = "DELETE FROM project WHERE id = :id;"; 
					$statement = $db->prepare($query);  
					$bind_values = ['id' => $id]; 
					$statement->execute($bind_values);  
			  		header("Location: admin_questions.php"); 
					die(); 
		  		} 
		  		$error = "Invalid POST['command2']."; 
		  	} 
		} 
	} 
	else { 
		$error = "POST['command2'] missing!"; 
	} 
 
    if(isset($_POST['deleteImage']))
    {
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

        $query = "SELECT * FROM project WHERE id = {$id}";
        $tables = $db->prepare($query);
        $tables -> execute();
        $column = $tables->fetchAll(); 
        
//        $query = "SELECT * FROM project WHERE id = {$id}";
//        $statement = $db->prepare($query); 
//        $bind_values = ['id' => $id];
//        $statement->execute($bind_values);
//        $column = $statement->fetchAll();

        foreach($column as $columnEach)
        {
            //$image = $_FILES['image']['name'];
            $myFile = "resize/" . $columnEach['image'];
            echo $myFile;
            unlink($myFile);
        }
        $image_filename = "none";

        $query = "UPDATE project SET image = :image WHERE id = :id";
        $tables = $db->prepare($query);
        $tables ->bindValue(':id', $id, PDO::PARAM_INT);
        $tables ->bindValue(':image', $image_filename);

        $tables ->execute();

        header("Location: admin_questions.php");
    }

?> 
 
<!DOCTYPE html> 
<html> 
<head> 
    <meta charset="utf-8"> 
    <title>Health Portal</title> 
    <link rel="stylesheet" href="style.css" type="text/css"> 
</head> 
<body> 
    <div id="wrapper"> 
 
        <div id="header"> 
            <h1><a href="admin_questions.php"></a></h1> 
        </div> 
 
		<h1>An error occured while processing your post.</h1> 
		<p><?= $error ?>  <br /> 
		<a href="admin_questions.php">Return Home</a></p> 
		 
 
        <div id="footer"> 
            Copywrong 2018 - No Rights Reserved 
        </div>  
 
    </div> 
</body> 
</html>