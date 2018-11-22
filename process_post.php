<!-- Validation of posting --> 
<?php 
/* 
 * Jan Salceda 0313887 
 * November 5, 2018 
 */ 
 
    include "lib\ImageResize.php";
    use \Gumlet\ImageResize;
    
    function file_upload_path($original_filename, $upload_subfolder_name = 'uploads') 
    {
       $current_folder = dirname(__FILE__);
       $path_segments = [$current_folder, $upload_subfolder_name, basename($original_filename)];
       return join(DIRECTORY_SEPARATOR, $path_segments);
    }

    function file_is_an_image($temporary_path, $new_path) 
    {
            $allowed_mime_types      = ['image/gif', 'image/jpeg', 'image/png'];

            $allowed_file_extensions = ['gif', 'jpg', 'jpeg', 'png'];

            $actual_file_extension   = pathinfo($new_path, PATHINFO_EXTENSION);
            $actual_mime_type        = getimagesize($temporary_path)['mime'];

            $file_extension_is_valid = in_array($actual_file_extension, $allowed_file_extensions);
            $mime_type_is_valid      = in_array($actual_mime_type, $allowed_mime_types);

            return $file_extension_is_valid && $mime_type_is_valid;
    }

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
                $image = $_FILES['image']['name'];
                $temporary_image_path = $_FILES['image']['tmp_name'];
                
                move_uploaded_file($temporary_image_path, "resize/new_$image.png");
                
                $img = new ImageResize("resize/new_$image.png");
                $img->resizeToHeight(200);
                $img->save("resize/new_$image.png");
                
				$query = "INSERT INTO project (title, content, image, image_text) VALUES (:title, :content, 'new_$image.png', '$image_text')"; 
                

                
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