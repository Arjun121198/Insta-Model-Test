<?php
// Include config file
require_once "config.php";
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $user_name = $_POST['user_name'];
    $email_id = $_POST['email_id'];
    $password = $_POST['password'];
    $phone_no = $_POST['phone_no'];
    $sql = "INSERT INTO `users`(`user_name`,`email_id`,`password`,`phone_no`)
    VALUES ('$user_name','$email_id','$password','$phone_no')";
    $sql1=mysqli_query($link, $sql);
    if($sql1)
    {
        header("location: login.php");
    }
    else{
        echo "Error";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/sign-up.php" />

	<title>Sign Up | AdminKit Demo</title>

	<link href="css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">Get started</h1>
							<p class="lead">
								Start creating the best possible user experience for you.
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<form method="post">
										<div class="mb-3">
											<label class="form-label">User Name</label>
											<input class="form-control form-control-lg" type="text" name="user_name" placeholder="Enter your name" />
											<div id="nameHelp" class="form-text">We'll never share your name with anyone else.</div>
										</div>
										<div class="mb-3">
											<label class="form-label">Email Address</label>
											<input class="form-control form-control-lg" type="email" name="email_id" placeholder="Enter your email" />
											<div id="nameHelp" class="form-text">We'll never share your email with anyone else.</div>
										</div>
										<div class="mb-3">
											<label class="form-label">Password</label>
											<input class="form-control form-control-lg" type="password" name="password" placeholder="Enter password" />
										</div>
										<div class="mb-3">
                                            <label for="exampleInputPhno" class="form-label">Phone Number</label>   
                                            <input type="phonenumber" class="form-control" id="exampleInputPhno" name = "phone_no">
                                        </div>
										<div class="text-center mt-3">
											<button type="submit" class="btn btn-lg btn-primary">Sign up</button>
										</div>
									</form>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</main>

	<script src="js/app.js"></script>

</body>

</html>