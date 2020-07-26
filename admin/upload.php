<?php
    
    $directory = "../uploads/";
    $directory_temp = "uploads/"; //admin upload directory
    $name = $_FILES["file"]["name"]; //name of file
    $file_path_temp = $directory_temp.$name;
    if(move_uploaded_file($_FILES["file"]["tmp_name"], $file_path_temp)){
        echo $file_path_temp;
    }
    
?>