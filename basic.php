<?php
require_once "middleware.php";
if (isset($_POST['submit'])) {
    session_destroy();  
    header('location:sign-in.php');
}
include 'config.php';
$statusMsg = '';
$targetDir = "uploads/";
$loggedInUserId = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div class="container"> 
    <img src="logo/logo.jpeg" alt="logo" width="150px" height="100px" style="margin-bottom: -68px;">
    <ul class="nav justify-content-end">
      <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Home</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</button>
        </li>
        <form method="post" action="post.php" enctype="multipart/form-data">
            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal" style="color:DodgerBlue">Posts</button>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div> 
                  <div class="modal-body">
                  <div class="mb-3">
              <label for="formFileMultiple" class="form-label">Input Image</label>
              <input class="form-control" type="file" name="uploadfile" id="formFileMultiple" multiple>
            </div>
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Description</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" name="text" rows="3"></textarea>
            </div>
                </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Post</button>
                  </div>
                </div>
              </div>
            </div>
            </form>
            <li class="nav-item active">
        <a class="nav-link" href="user.php">Users</a>
      </li>
      <form class="form-inline" method="POST">
      <button class="btn" style="color:DodgerBlue" type="submit" name="submit">logout</button>
    </form>
    <br>
    <br>
    <br>
      </ul>
      </ul>
      <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"></div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"></div>
        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"></div>
      </div> 
      <?php
$query1 = "SELECT *, posts.id AS post_id,posts.created_at AS created FROM posts LEFT JOIN users ON posts.user_id = users.id LEFT JOIN profiles ON posts.user_id = profiles.id;";
$insert1 = $link->query($query1);
$res = [];
while ($row = mysqli_fetch_assoc($insert1))
 {
  $res[] = $row;
} 
foreach($res as $image)
 { 
$profile = $image['profile_image'];
$usr = $image['user_name'];
$txt = $image['description'];
$img = $image['image'];
$time = $image['created'];
$id = $image['id'];
$post_id = $image['post_id'];
$likes = "SELECT COUNT(*) as likes_count from likes WHERE post_id=$post_id";
$insert = $link->query($likes);
$likesCount = mysqli_fetch_row($insert);
$userId = $image['user_id'];
$date = date('Y-m-d H:i:s');
$your_date = $time;
$now = time(); // or your date as well
$your_date = strtotime($time);
$datediff = $now - $your_date;
$datediff1=round($datediff / (60 * 60 * 24));
$results_per_page = 2;  
$query = "SELECT * FROM posts";  
$result = mysqli_query($link, $query);  
$number_of_result = mysqli_num_rows($result);  

//determine the total number of pages available  
$number_of_page = ceil ($number_of_result / $results_per_page);  
$pagLink = "";       

//determine which page number visitor is currently on  
if (isset ($_GET['page']) ) {  
    $page = 1;  
} else {  
    $page = $_GET['page'];  
}  

//determine the sql LIMIT starting number for the results on the displaying page  
$page_first_result = ($page-1) * $results_per_page;  

//retrieve the selected results from database   
$query = "SELECT *FROM posts LIMIT " . $page_first_result . ',' . $results_per_page;  
$result = mysqli_query($link, $query);  

if($datediff1 == 0)
{
  echo "<div class='col-md-4' style='margin-left:17%'>
  <div class='card text-center' style='width:40rem;height: 40rem'>
  <div class='card-header' style='text-align:left'><img src='uploads/$profile' style='width:3rem;height:3rem;border-radius: 50%'> $usr</div>
  <div class='card-body'>
  <img src='uploads/$img' class='img-style' style='width:37rem;height: 26rem'>
  <br><br>$txt</div>
  <i class='fa fa-heart' id='demo_$post_id' onclick='Function($post_id,$userId)' style='font-size:24px;color:grey;text-align:left;padding:27px'>$likesCount[0] likes</i>
  <div class='card-footer'>Post at today<br> 
  </div></div></div>";
  echo "<br><br>";
}
else
  { 
echo "<div class='col-md-4' style='margin-left:17%'>
<div class='card text-center' style='width:40rem;height:40rem'>
<div class='card-header' style='text-align:left'><img src='uploads/$profile' style='width:3rem;height:3rem;border-radius: 50%'> $usr</div>
<div class='card-body'>
<img src='uploads/$img' class='img-style' style='width:37rem;height:26rem'><br>
<br>$txt</div>
<i class='fa fa-heart' id='demo_$post_id' onclick='Function($post_id,$userId)'  style='font-size:24px;color:grey;text-align:left;padding:27px'>$likesCount[0] likes</i></span>
<div class='card-footer' style='padding: .5px'>Post at $datediff1 days ago</div></div></div>";
echo "<br><br>";
  }
 }
 if($page>=2) {   
  echo "<a href='index1.php?page=".($page-1)."'>  Prev </a>";   
}       
             
for ($i=1; $i<=$number_of_page; $i++) 
{   
  if ($i == $page) 
  {   
        $pagLink .= "<a class = 'active' href='basic.php?page="  
                                          .$i."'>".$i." </a>";   
    }               
    else  {   
        $pagLink .= "<a href='basic.php?page=".$i."'>   
                                          ".$i." </a>";     
    }   
};     
echo $pagLink;   

if($page<$number_of_page)
{   
    echo "<a href='basic.php?page=".($page+1)."'>  Next </a>";   
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
function Function(postId,userId)
{
 document.getElementById('demo_'+postId).innerHTML = "You likes this post!";
$.ajax({
  url:"likes.php?post_id="+postId+'&to_id='+userId,
  type:"get",
  success:function(saved)
  {
    alert(saved);
  }
});
}
</script>  
</body>
</html> 