<?php

session_start();

if (!isset($_SESSION['user'])){
	header("location: ../user/login.php");
}

include "../include/connect.php";

$type_user = $_SESSION['user'];

if (isset($_POST['venue'])){
		//echo "test";

		$venue_id = '';
        $vname = $_POST['venue_name'];
        $vcap = $_POST['venue_capacity'];
		$vimg = $_POST['venue_img'];
		
	$add = "insert into venue values('$venue_id','$vname','$vcap','$vimg')";

    if ($conn->query($add) === TRUE){ ?>
        <div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<div class="alert alert-success">
					<?php echo "You Have Added a Venue"; ?>
				</div>
			</div>
			<div class="col-md-3"></div>
		</div>
			<?php
			header('refresh:2, url = user_profile.php');
		}else{ ?>
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<div class="alert alert-danger">
					<?php echo "Didn't Add Venue"; ?>
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
		<title>Venue</title>
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
				<li style = "float: left; background-color: grey;">
					<a href="user_profile.php" style = "float:left;"><i class="fa fa-user"></i>&nbsp;<?= $type_user['user_fname'] . " " . $type_user['user_lname']; ?></a> 
				</li>
				<li>
					<a href="logout.php"><i class="fa fa-sign-out">&nbsp;</i>Sign Out</a>
				</li>
				<li>
					<a href="class.php"><i class="fa fa-university ">&nbsp;</i>Class</a>
				</li>
				<li>
					<a href="venue.php"><i class="fa fa-map-marker">&nbsp;</i>Venue</a>
				</li>
				<li>
					<a href="sport.php"><i class="fa fa-futbol-o">&nbsp;</i>Sport</a>
				</li>
				<li>
					<a href="user_manage.php"><i class="fa fa-tasks">&nbsp;</i>Manage</a>
				</li>
			</ul>
		</div>
		<hr>
		<div class = "row">
			<div class = "col-md-3"></div>
			<div class = "col-md-6">
			<center><h2>Add a New Venue Sport</h2></center>
				<div class = "panel panel-body">
					<form method = "POST" action="venue.php">
						<div class="panel panel-body">
						<hr>
							<label for="venue_name"><b>New Venue Name</b></label>
								<input type="text" placeholder="Enter Name of the Venue" name="venue_name" required>
							<label for="venue_img"><b>Image of Sport</b></label>
								<input type="text" placeholder="Example: Image.jpg or Image.png or Image.jfif" name="venue_img" required>
							<label for="venue_capacity"><b>Capacity of Venue</b></label>
								<input type="number" placeholder="Example: 10000" name="venue_capacity" required>
							<button type="submit" name="venue" style="width:100%;">Add Venue</button>
						</div>
					</form>
				</div>
			</div>
			<div class = "col-md-3"></div>
		</div> 
	</body>
	<hr>
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
	font-size: 15px;
	font-weight: 700;
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

b{
	font-weight: 800;
	font-size: 16px;
}

select {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
	font-size: 15px;
	font-weight: 700;
}

</style>