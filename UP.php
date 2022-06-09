<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

include 'database.php';

if(isset($_POST['submit'])){
    // delete previous files
    if($_POST['submit']=='delete'){
        $deleteQuery = "DELETE FROM `images` ";
        mysqli_query($con,$deleteQuery);
    
        // Deleting all the files inside the given folder
        array_map('unlink', array_filter((array) array_merge(glob("assets/*"))));
        
    }
   

    $extensions = array('jpeg','jpg','JPG','JPEG');
    foreach ($_FILES['up']['name'] as $key => $value) {
        $filename = $_FILES['up']['name'][$key];
        $filename_tmp = $_FILES['up']['tmp_name'][$key];
        
        $ext = pathinfo($filename,PATHINFO_EXTENSION);
        if(in_array($ext,$extensions)){
            $finalName = $filename;
            if(!file_exists('assets/'.$filename))
            {
                move_uploaded_file($filename_tmp,'assets/'.$filename);
            }else{
                $filename = str_replace('.','-',basename($filename,$ext)) ;
                $newFileName = $filename.time().".".$ext;
                move_uploaded_file($filename_tmp,'assets/'.$newFileName);
                $finalName = $newFileName;
            }
            // insert
            $insertQuery = "INSERT INTO `images`(`Image_name`) VALUES ('$finalName')";
            mysqli_query($con,$insertQuery);
            // header('Location:index.php');
        
        
        }else{
            echo "error";
        }
    }
    echo "Success";
    mysqli_close($con);
}

?>
</body>
</html>