<?php
require_once "middleware.php";
require_once 'config.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    <title>Document</title>
</head>
<body>
<table class="table table-hover" id="table_id">
    <thead>
        <th>ID</th>
        <th>User_name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Phone_no</th>
    </thead>
    <tbody>
    <?php
$query1 = "SELECT * FROM users";
$insert1 = $link->query($query1);
$res = [];
while ($row = mysqli_fetch_assoc($insert1))
 {
  $res[] = $row;
} 
foreach($res as $image)
 { 
$id = $image['id'];
$usr = $image['user_name'];
$email = $image['email_id'];
$pass = $image['password'];
$phno = $image['phone_no'];
echo"<tr>
<td>$id</td>
<td>$usr</td>
<td>$email</td>
<td>$pass</td>
<td>$phno</td>
</tr>";
 }
 ?>
    </tbody>
</table>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
<script type="text/javascript">
    $(document).ready( function () {
    $('#table_id').DataTable()
} );
</script>    
</body>
</html>