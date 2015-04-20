<?php

 use Aws\S3\Exception\S3Exception;
 require 'app/start.php';
 
 if(isset($_FILES['file'])) {
    $file = $_FILES['file'];
    
    //file details
    $name = $file['name'];
    $tmp_name = $file['tmp_name'];
    
    $extension = explode('.', $name);
    $extension = strtolower(end($extension));
    
    
    //Temp detail 
    $key = md5(uniqid());
    
    $tmp_file_name = "{$key}.{$extension}";
    $tmp_file_path = "files/{$tmp_file_name}";
    
    move_uploaded_file($tmp_name, $tmp_file_path);
    
    try{
        
        $s3->putObject([
            'Bucket' => $config['s3']['bucket'],
            'Key' => "uploads/{$name}",
            'Body' => fopen($tmp_file_path, 'rb'),
            'ACL' => 'public-read'
        ]);
         
         //Remove the file
         unlink($tmp_file_path);
        
    } catch(S3Exception $e){
    die("There was an error uploading the file.");
    }
 
 }
 

 ?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD HTML 3.2//EN">

<html lang="en">
    <head>
       <meta charset="UTF-8">
       <title>Upload</title>
    </head>

    <body>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="file" name="file">
            <input type="submit" value="Upload">
        </form>
    </body>
</html>
