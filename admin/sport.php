<?php

session_start();

if (!isset($_SESSION['user'])){
	header("location: ../user/login.php");
}

include "../include/connect.php";

$type_user = $_SESSION['user'];

if (isset($_POST['sport'])){
		//echo "test";

		$sport_id = '';
        $sname = $_POST['sport_name'];
        $sdesc = $_POST['sport_desc'];
        $simg = $_POST['sport_img'];
	$add = "insert into sport values('$sport_id','$sname','$sdesc','$simg')";

    if ($conn->query($add) === TRUE){ ?>
        <div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<div class="alert alert-success">
					<?php echo "You Have Added a Sport"; ?>
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
					<?php echo "Didn't Add Sport"; ?>
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
		<title>Sport</title>
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
			<center><h2>Add a New Olympic Sport</h2></center>
				<div class = "panel panel-body">
					<form method = "POST" action="sport.php">
						<div class="panel panel-body">
						<hr>
							<label for="sport_name"><b>New Sport</b></label>
								<input type="text" placeholder="Enter Name of the Sport" name="sport_name" required>
							<label for="sport_desc"><b>Description of Sport</b></label>
								<input type="text" placeholder="Example: 5 vs 5 Sport, Competitive..." name="sport_desc" required>
							<label for="sport_img"><b>Image of Sport</b></label>
								<input type="text" placeholder="Example: Image.jpg or Image.png" name="sport_img" required>
							<button type="submit" name="sport" style="width:100%;">Add Sport</button>
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