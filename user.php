<?php
require_once "middleware.php";
include 'config.php';
$loggedInUserId = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>

</head>
<body> 
<form method="post">
<?php 
$query = "SELECT * FROM users";
$insert = $link->query($query);
$res = [];
while ($row = mysqli_fetch_assoc($insert))
 {
    $res[] = $row;
 }
 $userId = '';
foreach ($res as $users)
{ 
    $usr=$users['user_name'];
    $userId=$users['id'];
    print_r($usr."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp");
     echo" <a href='user.php?follow_id=$userId'>Follow</a><br><br><br>";        
} 
if(isset($_GET['follow_id']))
{
    $id = $_GET['follow_id'];
    $query1="INSERT INTO friends (from_id, to_id, status) VALUES ('$loggedInUserId', '$id', '1')";     
    $insert1 = $link->query($query1);
    echo "Followed Successfully!";
 }
?>
</form>
</body>
</html>