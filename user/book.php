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

if (!$rslt->num_rows > 0) {
    if (isset($_POST['book'])){
		//echo "test";
		$orgDate = $_POST['check_in'];  
			$checkin = date("Y-m-d", strtotime($orgDate));
		$org1Date = $_POST['check_out'];  
			$checkout = date("Y-m-d", strtotime($org1Date));
		
		$booking_id = '';
        $package = $_POST['package'];
        $checkout = $_POST['check_out'];
        $persons = $_POST['persons'];
$add = "insert into ticket values('$booking_id','$package','$checkin','$checkout','$persons','$user_id')";

    if ($conn->query($add) === TRUE){ ?>
        <div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<div class="alert alert-success">
					<?php echo "You Have Booked a Package"; ?>
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
					<?php echo ""; ?>
				</div>
			</div>
			<div class="col-md-3"></div>
		</div>
		<?php
		}
    }
} else{?>
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<div class="alert alert-danger">
					<?php echo "You Already have a Package"; ?>
				</div>
			</div>
			<div class="col-md-3"></div>
		</div>
	<?php

	}
?>
<html>
    <head>
        <title>Registration</title>
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
		<div class = "row">
			<div class = "col-md-3"></div>
			<div class = "col-md-6">
			<center><h2>Book Your Package</h2></center>
				<div class = "panel panel-body">
					<form method = "POST" action="book.php">
						<div class="panel panel-body">
						<hr>
							<label for="package"><b>Package</b></label>
								<select id="package" name="package" required>
									<option value="">-Pick a Package-</option>
									<option value="Half-Board">Half-Board</option>
									<option value="Full-Board">Full-Board</option>
									<option value="Fun Village">Fun Village</option>
									<option value="Premium">Premium</option>
								</select>
							<label for="check_in"><b>Check In Date</b></label>
								<input type="date" placeholder="Enter Last Name" name="check_in" required>
							<label for="check_out"><b>Check Out Date</b></label>
								<input type="date" placeholder="Enter Email" name="check_out" required>
							<label for="persons"><b>Number of People</b></label>
								<input type="number" placeholder="Enter Total Number of People" name="persons" required>
							<button type="submit" name="book" style="width:100%;">Book Package</button>
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
<script>
function con() {
  confirm("ARE YOU SURE YOU WANT TO DELETE THE PACKAGE?");
}
</script>
</script>