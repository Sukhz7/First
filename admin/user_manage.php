<?php

session_start();

if (!isset($_SESSION['user'])){
	header("location: ../user/login.php");
}

include "../include/connect.php";

$type_user = $_SESSION['user'];

$result = mysqli_query($conn, "SELECT * FROM user");



if (isset($_POST['delete'])){
		//echo "test";
		
	$u_id = $_POST['delete'];

    // sql to delete a record
	$tick = "DELETE FROM ticket where user_id = $u_id";
	$par = "DELETE FROM participate where user_id = $u_id";
    $sql = "DELETE FROM user WHERE user_id = $u_id";
	
    if ($conn->query($tick) === TRUE) {
		if ($conn->query($par) === TRUE) {
			if ($conn->query($sql) === TRUE) {
				?>
        <div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<div class="alert alert-success">
					<?php echo "Deleted User Successfully"; ?>
				</div>
			</div>
			<div class="col-md-3"></div>
		</div>
			<?php
				header("Refresh:2");
			}
		}
	}
}
?>
<html>
	<head>
		<title>Manage</title>
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
		<form method = "POST" action ="user_manage.php">
			<table id="myTable" class="table table-bordered table-striped">
				<thead>
					<th>Identification Number</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Email Address</th>
					<th>Phone Number</th>
					<th>User Role</th>
					<th>Delete?</th>
				</thead>
					<?php
						while($row = mysqli_fetch_array($result))
						{
					?>
					<tr class="tr">
						<td>
							<?= $row['user_id']; ?>
						</td>
						<td>
							<?= $row['user_fname']; ?>
						</td>
						<td>
							<?= $row['user_lname']; ?>
						</td>
						<td>
							<?= $row['user_email']; ?>
						</td>
						<td>
							<?= $row['user_no']; ?>
						</td>
						<td>
							<?= $row['user_role']; ?>
						</td>
						<td>
							<button type = "submit" class="btn btn-danger" name = "delete" value = "<?= $row['user_id']; ?>">Delete</button>
						</td>
							<?php } ?>
					</tr>
			</table>
	</body>
</html>