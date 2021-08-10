<?php

session_start();

if (!isset($_SESSION['user'])){
	header("location: ../user/login.php");
}

include "../include/connect.php";

$type_user = $_SESSION['user'];

if (isset($_POST['class'])){
		//echo "test";

		$class_id = '';
        $class_name = $_POST['class_name'];
        $class_start = $_POST['class_start'];
		$class_stop = $_POST['class_stop'];
		$venue_id = $_POST['venue_id'];
		$sport_id = $_POST['sport_id'];
	$add = "insert into class values('$class_id','$class_name','$class_start','$class_stop','$venue_id','$sport_id')";

    if ($conn->query($add) === TRUE){ ?>
        <div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<div class="alert alert-success">
					<?php echo "You Have Added a Class"; ?>
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
					<?php echo "Didn't Add a Class"; ?>
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
		<title>Class</title>
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
			<center><h2>Add a New Class</h2></center>
				<div class = "panel panel-body">
					<form method = "POST" action="class.php">
						<div class="panel panel-body">
						<hr>
							<label for="class_name"><b>New Class Name</b></label>
								<input type="text" placeholder="Enter Name of the Class" name="class_name" required>
							<label for="class_start"><b>Class Starts || Example 2020-04-27 11:00am</b></label>
								<input type="datetime-local" name="class_start" required>
							<label for="class_stop"><b>Class Stops || Example 2020-04-29 1:30pm</b></label>
								<input type="datetime-local" name="class_stop" required>
							<label for="venue_name"><b>Venue Name</b></label>
								<select name = "venue_id">
									<option value="">--Pick a Venue--</option>
									<?php
										$sql = mysqli_query($conn, "SELECT * From venue");
										$vrow = mysqli_num_rows($sql);
										while ($vrow = mysqli_fetch_assoc($sql)){
											$vid = $vrow['venue_id'];
										echo "<option value='". $vrow['venue_id'] ."'>" . $vrow['venue_name'] ."</option>" ;
									}
									?>
								</select>
							<label for="sport_name"><b>Name of Sport</b></label>
								<select  name = "sport_id">
									<option value="">--Pick a Sport--</option>
									<?php
										$sql = mysqli_query($conn, "SELECT * From sport");
										$srow = mysqli_num_rows($sql);
										while ($srow = mysqli_fetch_assoc($sql)){
										echo "<option value=". $srow['sport_id'] .">" .$srow['sport_name'] ."</option>" ;
									}
									?>
								</select>
							<button type="submit" name="class" style="width:100%;">Add Class</button>
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