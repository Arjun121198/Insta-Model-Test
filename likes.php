<?php
require_once "middleware.php";
require_once 'config.php';
$postId = $_GET['post_id'];
$fromId = $_SESSION['user_id']; 
$toId = $_GET['to_id'];
$key = "SET FOREIGN_KEY_CHECKS=0";
$link->query($key);
$sql="INSERT INTO `likes` (`post_id`, `from_id`, `to_id`) VALUES ('$postId', '$fromId', '$toId')";
$sql1=mysqli_query($link, $sql);
if ($sql1)
 {
  echo "Liked";
  }
   else 
   {
    echo "Error: " . $query1 . "<br>" . $link->error;
  }
?>                     