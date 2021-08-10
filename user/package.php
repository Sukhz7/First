<?php

session_start();

if (!isset($_SESSION['user'])){
	header("location: login.php");
}

include "../include/connect.php";

$type_user = $_SESSION['user'];


?>
<html>
	<head>
		<title>Packages</title>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="../css/style.css" rel="stylesheet">
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
		<center><h2>Yokyo Packages</h2></center>
		<center><h4>International Users pay $100 for Tickets and Transport to Accomodation</h4></center>
		<center><h4>Package is Optional to Local Users</h4></center>
		<div class = "row">
			<div class="columns">
				<ul class="price">
					<li class="header">Half-Board Package</li>
					<li class="grey">$ 34.99 / night</li>
					<li>Breakfast and Dinner Included</li>
					<li>Alcohol and Beverages Excluded</li>
					<li>Unlimited Internet Access</li>
					<li>Gym Access</li>
					<li>Library Access</li>
					<li>Double Bed/ 1-2 Room(s)</li>
					<li>Children's Television Networks Included</li>
					<li>Fun Village Access Excluded</li>
				</ul>
			</div>
			<div class="columns">
				<ul class="price">
					<li class="header">Full-Board Package</li>
					<li class="grey">$ 79.99 / night</li>
					<li>Breakfast, Lunch and Dinner Included</li>
					<li>Alcohol and Beverages Included</li>
					<li>Unlimited Internet Access</li>
					<li>24/7 Gym Access</li>
					<li>Library Access</li>
					<li>Double Bed/ 1-2 Room(s)</li>
					<li>Children's Television Networks Included</li>
					<li>Fun Village Access Excluded</li>
				</ul>
			</div>
		</div>
		<div class = "row">
			<div class="columns">
				<ul class="price">
					<li class="header">Fun Village Package</li>
					<li class="grey">$ 99.99 / night</li>
					<li>Breakfast, Lunch and Dinner Buffet</li>
					<li>Alcohol and Beverages Included</li>
					<li>Unlimited Internet Access</li>
					<li>24/7 Gym Access</li>
					<li>Queen Sized Bed/ 1-2 Room(s)</li>
					<li>Hot Stone and Aromatherapy Massage</li>
					<li>24/7 Spa and Sauna</li>
					<li>Fun Village Access</li>
				</ul>
			</div>
			<div class="columns">
				<ul class="price">
					<li class="header">Premium</li>
					<li class="grey">$ 199.99 / night</li>
					<li>Room Service</li>
					<li>All Round Meals</li>
					<li>Private Unlimited Internet Access</li>
					<li>24/7 Gym and Personal Instructor</li>
					<li>Private Massage Sessions</li>
					<li>Ocean View Suites</li>
					<li>King Sized Bed/ 1-3 Room(s)</li>
					<li>All Areas Access</li>
				</ul>
			</div>
		</div>
		<hr>
		<div class = "row">
			<div class = "container">
				<button onclick="window.location.href= 'book.php'" style="width:50%;">Book Now</button>
			</div>
		</div>
	</body>
	<hr>
	<footer>
        <center><small>&copy; Copyright 2020, Yokyo Olympics</small>
	</footer>
</html>
<style>
* {
	box-sizing: border-box;
}

body{
	text-align: center;
	padding: 20px;
}

.columns {
	float: left;
	width: 49%;
	padding: 8px;
}

.price {
	list-style-type: none;
	border: 1px solid #eee;
	margin: 0;
	padding: 0;
	transition: 0.3s;
}

.price:hover {
	box-shadow: 0 8px 12px 0 rgba(0,0,0,0.2)
}

.price .header {
	background-color: #111;
	color: white;
	font-size: 25px;
}

.price li {
	border-bottom: 1px solid #eee;
	padding: 20px;
	text-align: center;
}

.price li:hover {
	 opacity: 0.8;
}

.price li a{
	color: white;
}

.price .grey {
	background-color: #eee;
	font-size: 20px;
}

button {
	background-color: darkblue;
	border: none;
	color: white;
	padding: 10px 25px;
	text-align: center;
	text-decoration: none;
	font-size: 18px;
}

@media only screen and (max-width: 600px) {
  .columns {
    width: 100%;
  }
}

</style>