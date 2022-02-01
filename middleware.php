<?php
session_start();

if(!$_SESSION['user_id'])
{
    header('location:sign-in.php');
}
?>