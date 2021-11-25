<?php





// Check if the form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if file was uploaded without errors

    if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["photo"]["name"];
        $filetype = $_FILES["photo"]["type"];
        $filesize = $_FILES["photo"]["size"];
        $filetmp  = $_FILES['photo']['tmp_name'];
        $currentDirectory=getcwd();
        //echo getcwd();
        
        if(isset($_POST['submit']))
        {
        	$x=$_POST['prod_id'];
        	$uploadPath = $currentDirectory . "/images/" . basename($x.".jpg"); 
        	echo $uploadPath;
        }
    
        
    
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
    
        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
    
        // Verify MYME type of the file
        if(in_array($filetype, $allowed)){
            // Check whether file exists before uploading it
            if(file_exists($uploadPath.$filename)){
                echo $filename . " is already exists.";
            } else{
                move_uploaded_file($filetmp,$uploadPath);
                echo "Your file was uploaded successfully.";
                echo "<a href='$uploadPath' download> Download File Here...</a>";
            } 
        } else{
            echo "Error: There was a problem uploading your file. Please try again."; 
        }
    } else{
        echo "Error: " . $_FILES["photo"]["error"];
    }
}
?>







<html>
<body>
<form method="POST" action="">
Product id:<input type="text" name="prod_id" value=""> <br> <br>

<labe for="fileSelect"> Upload File:</label>
<input type="file" name="photo" id="fileSelect"><br><br>
<input type="submit" name="submit" value="Add">
<input type="button" name="cancel" value="Cancel">



</fomr>
<body>
</html>