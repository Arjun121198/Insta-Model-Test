<?php
require_once "middleware.php";
include 'config.php';
$statusMsg = '';
$targetDir = "uploads/";
$loggedInUserId = $_SESSION['user_id'];
if(!empty($_FILES["uploadfile"]["name"]))   
{
$text= $_POST['text'];  
$fileName = basename($_FILES["uploadfile"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
$allowTypes = array('jpg','png','jpeg','gif','pdf'); 
    if(in_array($fileType, $allowTypes))
    {
        if(move_uploaded_file($_FILES["uploadfile"]["tmp_name"],$targetFilePath))
        { 
          $query = "INSERT INTO posts (user_id, image, description) VALUES ('$loggedInUserId', '$fileName', '$text')";
          $insert = $link->query($query);
          header('location:basic.php'); 
          
           }
           else
           {
            $statusMsg= "Sorry, there was an error uploading your file.";       
           }
           }        
           else           
           {
           $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
           }
           }
           else
          {  
          $statusMsg = 'Please select a file to upload.';
          } 
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
           <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
           <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
           <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
           <title>Document</title>
        </head>
        <body> 
        </body>
        </html>