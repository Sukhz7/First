<?php

session_start();

if (!isset($_SESSION['user'])){
	header("location: login.php");
}

include "../include/connect.php";

$type_user = $_SESSION['user'];

$user_id = $type_user['user_id'];

$sql = "SELECT * FROM ticket where user_id = '$user_id'";

$rslt = $conn->query($sql);

if ($rslt->num_rows > 0) {
	$pdetail = mysqli_fetch_assoc($rslt);
} else {
		error_reporting(E_ALL ^ E_NOTICE); 
	}

?>

<html>
	<head>
		<title>User Profile</title>
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
					<a href="book.php"><i class="fa fa-book">&nbsp;</i>Booking</a>
				</li>
				<li>
					<a href="package.php"><i class="fa fa-gift">&nbsp;</i>Packages</a>
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
			</ul>
		</div>
		<hr>
		<div class = "col-md-12">
			<center><h1><?= $type_user['user_fname']?>'s Details</h1></center>
			<div class = "table-responsive">
				<table class="table table-bordered">
					<tr> 
						<td>ID CARD NO.</td>
							<td><?= $type_user['user_id']?></td>
					</tr>
					<tr>
						<td>FIRST NAME</td>
							<td><?= $type_user['user_fname']?> </td>
					</tr>
					<tr>
						<td>LAST NAME</td>
							<td><?= $type_user['user_lname']?></td>
					</tr>
					<tr>
						<td>EMAIL ADDRESS</td>
							<td><?= $type_user['user_email']?></td>
					</tr>
					<tr>
						<td>PHONE NUMBER</td>
							<td><?= $type_user['user_no']?></td>
					</tr>
					<tr>
						<td>PACKAGE</td>
							<td><?= $pdetail['package']?></td>
					</tr>
					<tr>
						<td>CHECK IN (Y-M-D)</td>
							<td><?= $pdetail['check_in']?></td>
					</tr>
					<tr>
						<td>CHECK OUT (Y-M-D)</td>
							<td><?= $pdetail['check_out']?></td>
					</tr>
					<tr>
						<td>PEOPLE</td>
							<td><?= $pdetail['persons']?></td>
					</tr>				
				</table>
			</div>
		</div>	
	</body>
	<hr>
	<footer>
        <center><small>&copy; Copyright 2020, Yokyo Olympics</small>
	</footer>
</html>
<style>
td{
	font-weight:700;
}
</style>