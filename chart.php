<?php
include 'config.php';
$query1 = "SELECT * FROM posts JOIN users JOIN profiles";
$insert1 = $link->query($query1);
$res = [];
while ($row = mysqli_fetch_assoc($insert1))
 {
  $res[] = $row;
} 
foreach($res as $image)
 { 
$usr = $image['user_name'];
$time = $image['created_at'];
$id = $image['id'];
$likes = "SELECT COUNT(*) as likes_count from likes WHERE post_id=$id";
$insert = $link->query($likes);
$likesCount = mysqli_fetch_row($insert);
$now = time();
$your_date = strtotime($time);
$datediff = $now - $your_date;
$diffDate = round($datediff / (60 * 60 * 24));
 }
?>
<!DOCTYPE html>
<html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<body>

<canvas id="myChart" style="width:500%;max-width:1000px"></canvas>

<script>
new Chart(document.getElementById("myChart"), {
  type: "bar",
  data: {
    labels: ["5th day","10th day","15th day","20th day","25th day","30th day"],
    datasets: [{
      label: "Likes",
      backgroundColor: ["red","blue","green","yellow","black","pink"],
      data: []
    }]
  },
  options: {
    legend: { display: false },
    title:{
      display: true,
      text: 'Likes'
    }
  }
});
</script>

</body>
</html>
