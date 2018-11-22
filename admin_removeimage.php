<?php 
    if(isset($_GET['id']) && is_numeric($_GET['id'])){
        $id = $_GET['id'];
        $name = "SELECT * FROM project WHERE id=$id" or die(mysql_error());
        $name1=mysql_query($name);
        
        if($stmt = $con->prepare("DELETE FROM project WHERE id = ? LIMIT 1")){
            $stmt->bind_param("i", $id);
            $folder = 'C:\\xampp\\htdocs\\Project\\FinalProject\\web';
            chown($folder, 777);
            
            var_dump($name1);
            unlink($_SERVER['DOCUMENT_ROOT'] . "web/$name1");
            
            $stmt->execute();
            $stmt->close();
        }
        else{
            echo "Error";
        }
        $con->close();
        
        header("Location: admin_questions.php");
    }
    
?>