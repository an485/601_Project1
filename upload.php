<?php
$target_dir = "uploads/";
$file = basename($_FILES["fileToUpload"]["name"]);
$target_file = $target_dir . $file;

$uploadOk = 1;
$uploadFileType = pathinfo($target_file,PATHINFO_EXTENSION);


// Check if file already exists
if (file_exists($target_file)) {
    $errorMsg =  "Sorry, the file \"" .$file . "\" already exists. Try renaming your file or uploading a new csv file.";
    $uploadOk = 0;	
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    $errorMsg =  "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($uploadFileType != "csv") {
   $errorMsg = "Sorry, We are only learning how to process a csv file right now :) .<br>";
	$uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
	header('Location: https://web.njit.edu/~an485/Project1/index.php?page=homepage&msg=' . $errorMsg); 
}  else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
	     header('Location: https://web.njit.edu/~an485/Project1/index.php?page=htmlTable&filename=' . $file);

    } else {
        
		echo "Sorry, there was an error uploading your file.";
    }
}
?>