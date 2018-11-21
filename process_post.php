<!-- Validation of posting --> 
<?php 
/* 
 * Jan Salceda 0313887 
 * November 5, 2018 
 */ 
 
	function validate_title_and_content() { 
		$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS); 
		$content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_SPECIAL_CHARS); 
		return strlen($title) > 0 && strlen($content) > 0; 
	} 
 
	if(isset($_POST["command"])) { 
 
  		require 'connect.php'; 
		$id = filter_input(INPUT_POST,"id", FILTER_VALIDATE_INT); 
 
		if(($_POST["command"] == "Create" || $_POST["command"] == "Update") 
			&&  !validate_title_and_content()) { 
			$error = "Both the title and content must be at least one character."; 
		} 
		else { 
			if($_POST["command"] == "Create") { 
				$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS); 
				$content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_SPECIAL_CHARS); 
				$query = "INSERT INTO project (title, content) VALUES (:title, :content);"; 
				$statement = $db->prepare($query);  
				$bind_values = ['title' => $title, 'content' => $content]; 
				$statement->execute($bind_values);  
				header("Location: Questions.php"); 
				die(); 
	  		} 
	  		else if(!$id) { 
	  			$error = "Invalid Post['ID']."; 
		  	} 
		  	else { 
		  		if($_POST["command"] == "Update") { 
					$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS); 
					$content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_SPECIAL_CHARS); 
			  		 
					$query = "UPDATE project SET title = :title, content = :content WHERE id = :id;"; 
					$statement = $db->prepare($query); 
					$bind_values = ['title' => $title, 'content' => $content, 'id' => $id]; 
					$statement->execute($bind_values);  
			  		header("Location: Questions.php"); 
					die(); 
		  		} 
		  		else if($_POST["command"] == "Delete") { 
					$query = "DELETE FROM project WHERE id = :id;"; 
					$statement = $db->prepare($query);  
					$bind_values = ['id' => $id]; 
					$statement->execute($bind_values);  
			  		header("Location: Questions.php"); 
					die(); 
		  		} 
		  		$error = "Invalid POST['command']."; 
		  	} 
		} 
	} 
	else { 
		$error = "POST['command'] missing!"; 
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
            <h1><a href="Questions.php"></a></h1> 
        </div> 
 
		<h1>An error occured while processing your post.</h1> 
		<p><?= $error ?>  <br /> 
		<a href="Questions.php">Return Home</a></p> 
		 
 
        <div id="footer"> 
            Copywrong 2018 - No Rights Reserved 
        </div>  
 
    </div> 
</body> 
</html>