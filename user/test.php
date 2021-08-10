<?php

session_start();

include "../include/connect.php";

if (isset($_POST['login'])) {
	login();
}

function login(){
	global $conn, $username, $password, $result, $type_user;

	// grap form values
	$username = $_POST['user_email'];
	$password = md5($_POST['user_pass']);

		$query = "SELECT * FROM user WHERE user_email= '$username' AND user_pass ='$password'";
		$result = mysqli_query($conn, $query);

	if (mysqli_num_rows($result) == 1) {
		$type_user = mysqli_fetch_assoc($result);
		if ($type_user['user_role'] == 'admin') {
			$_SESSION['user'] = $type_user;
		?>
        <div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4">
				<div class="alert alert-success">
			<?php echo "Login Successful, Welcome"; ?>&nbsp;<?= $type_user['user_fname']?>
				</div>
				</div>
				<div class="col-md-4"></div>
			</div>
			<?php
			header('refresh:2, url = ../admin/user_profile.php');
			$_SESSION['user'] = $type_user;
		}else{
		
			?>
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4">
				<div class="alert alert-success">
			<?php echo "Login Successful, Welcome"; ?>&nbsp;<?= $type_user['user_fname']?>
				</div>
				</div>
				<div class="col-md-4"></div>
			</div>
			<?php
			$conn -> close();
		header('refresh:2, url = user_profile.php');
		$_SESSION['user'] = $type_user;
				
		}
	}else {?>
		<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<div class="alert alert-danger">
				<?php echo "Invalid Credentials, Check Email And Password"; ?>
			</div>
		</div>
		<div class="col-md-4"></div>
		</div>
		<?php
		}
}
?>
<html>
	<head>
	<title>Yokyo Login</title>
		<meta charset="utf-8" />
		<link href="../css/style.css" rel="stylesheet">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/font-awesome.min.css" rel="stylesheet">
	</head>
	<body>
		<div class =  "upper-header">
			<ul>
				<li>
					<a href="../index.html"><i class="fa fa-home">&nbsp;</i>Homepage</a>
				</li>
				<li>
					<a href="register.php"><i class="fa fa-plus">&nbsp;</i>Register</a>
				</li>
			</ul>
		</div>
	<hr>
		<div class="row">
			<div class = "col-md-4"></div>
			<div class = "col-md-4">
				<form action="login.php" method="post">
					<div class="imgcontainer">
						<img src="../img/user.png" alt="Avatar" class="avatar">
					</div>
					<div class = "panel panel-body">
						<div class = "container">
							<label for="uname"><b>Email</b></label>
							<input type="text" placeholder="Enter Email Address" name="user_email" required>
							<label for="pass"><b>Password</b></label>
							<input type="password" placeholder="Enter Password" name="user_pass" required>
							<button type="submit" name = "login">Login</button>					
						</div>
						<center><label style = "font-size: 17px;">Don't Have an Account, <a href="register.php" style = "font-size: 17px;">  Sign Up Here</a></center>
					</div>
				</form>
			</div>
			<div class = "col-md-4"></div>
		</div>
	</body>
	<hr>
	<footer>
        <center><small>&copy; Copyright 2020, Yokyo Olympics</small>
	</footer>
</html>
<style>

body {
	padding: 20px;
}

form {
	background-image: url("../img/back.png");
	border: 3px solid #f1f1f1;
}
	
input[type=text], input[type=password] {
    width: 100%;
    padding: 15px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 2px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: darkblue;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    width:100%;
}

button:hover {
    opacity: 0.8;
}

.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

img.avatar {
    width: 50%;
    border-radius: 50%;
}

.container {
    padding: 12px;
}

h2{
    color:blue;
    text-align: center;
}

label{
    text-decoration:  black;
}

</style>

