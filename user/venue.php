<?php

session_start();

if (!isset($_SESSION['user'])){
	header("location: login.php");
}

include "../include/connect.php";

$type_user = $_SESSION['user'];

$sql = "SELECT * FROM venue";
$rslt = $conn->query($sql);
?>

<html>
	<head>
		<title>Sports</title>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="../css/style.css" rel="stylesheet">
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/font-awesome.min.css" rel="stylesheet">
		            <link rel="stylesheet" type="text/css" media="screen" href="../css/bootstrap.css" />
            <link rel="stylesheet" type="text/css" media="screen" href="../css/bootstrap-grid.min.css" />
            <link rel="stylesheet" type="text/css" media="screen" href="../css/bootstrap.min.css" />
            <link rel="stylesheet" type="text/css" media="screen" href="../css/all.css" />
            <link rel="stylesheet" type="text/css" media="screen" href="admin.main.css" />
            <link rel="stylesheet" type="text/css" media="screen" href="admin.viewusers.css" />
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
					<a href="package.php"><i class="fa fa-ticket">&nbsp;</i>Packages</a>
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
		<div class = "row">
			<?php
				while($vdetail = mysqli_fetch_array($rslt))
				{
			?>
			<div class = "col-md-6">
				<div class="card">
					<img src="../img/<?= $vdetail['venue_img']; ?>" alt="Avatar" style="width:100%">
					<hr>
					<div class="container">
						<center><h4><b><?= $vdetail['venue_name']; ?></b></h4></center>
						<hr>
						<p style = "font-size: 20px;">Can Hold up To <?= $vdetail['venue_capacity']; ?> people</p>  
					</div>
				</div>
				<hr>
			</div>
			<?php
				}
			?>
		</div>
	</body>
	<hr>
	<footer>
        <center><small>&copy; Copyright 2020, Yokyo Olympics</small>
	</footer>
</html>
<style>
img {
	  width: 100%;
	height: 350px;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.container {
  padding: 2px 16px;
}

</style>
