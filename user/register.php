<?php

include "../include/connect.php";

    if (isset($_POST['register'])){
		//echo "test";

		$user_id = $_POST['user_id'];
        $fname = $_POST['user_fname'];
        $lname = $_POST['user_lname'];
        $email = $_POST['user_email'];
        $phone = $_POST['user_no'];
        $pass = md5($_POST ['user_pass']);
		$role = "user";
        $add = "insert into user (user_id,user_fname,user_lname,user_email,user_no,user_pass,user_role) values('$user_id','$fname','$lname','$email','$phone','$pass','$role')";
    if ($conn->query($add) === TRUE){ ?>
        <div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<div class="alert alert-success">
					<?php echo "Registration Successful"; ?>
				</div>
			</div>
			<div class="col-md-3"></div>
		</div>
			<?php
			header('refresh:2, url = ../index.html');
		}else{ ?>
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<div class="alert alert-danger">
					<?php echo "Error The User Already Exists, Contant Yokyo Organizers"; ?>
				</div>
			</div>
			<div class="col-md-3"></div>
		</div>
		<?php
		}
    }
    
?>
<html>
    <head>
        <title>Registration</title>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/font-awesome.min.css" rel="stylesheet">
        <link href="../css/style.css " rel="stylesheet">
		<link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    </head>
	<body>
		<div class = "upper-header">
			<ul>
				<li>
					<a href="../index.html"><i class="fa fa-home">&nbsp;</i>HomePage</a>
				</li>
				<li>
					<a href="login.php"><i class="fa fa-sign-in">&nbsp;</i>Login</a>
				</li>
			</ul>
		</div>
		<hr>
		<div class = "row">
			<div class = "panel panel-body">
				<div class = "col-md-2"></div>
				<div class = "col-md-8">
					<form method = "POST" action="register.php" >
						<div class="panel panel-body">
							<center><h2>Register to Join Yokyo Olympics</h2></center>
						<hr>
							<label for="user_id"><b>Identification Card</b></label>
								<input type="text" placeholder="Enter ID Number" name="user_id" required>
							<label for="user_fname"><b>First Name</b></label>
								<input type="text" placeholder="Enter First Name" name="user_fname" required>
							<label for="user_lname"><b>Last Name</b></label>
								<input type="text" placeholder="Enter Last Name" name="user_lname" required>
							<label for="user_email"><b>Email</b></label>
								<input type="email" placeholder="Enter Email" name="user_email" required>
							<label for="user_no"><b>Phone Number</b></label>
								<input type="text" placeholder="Enter Phone Number" name="user_no" required>
							<label for="user_pass"><b>Password</b></label>
								<input type="password" placeholder="Enter Password" name="user_pass" required>
							<button type="submit" name="register" style="width:100%;">Register</button>
						</div>
						<center><label style = "font-size: 17px;">Have an Account?<a href="login.php">Sign In Here</a></label></center>
					</form>
				</div>
				<div class = "col-md-2"></div>
			</div>
		</div> 
	</body>
	<footer>
        <center><small>&copy; Copyright 2020, Yokyo Olympics</small>
	</footer>
</html>
<style>

input, input[type=password] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
	font-size: 20px;
}

input:focus, input[type=password]:focus {
    background-color: #ddd;
    outline: none;
}

button {
    background-color: darkblue;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width:100%;
}

button:hover {
    opacity: 0.8;
}

form{
	align-items: center;
	justify-content: center;
}
</style>