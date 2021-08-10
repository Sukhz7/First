<?php
session_start();

if (!isset($_SESSION['user'])){
	header("location: ../user/login.php");
}

include "../include/connect.php";

$type_user = $_SESSION['user'];

$sql = "SELECT * FROM ((class
INNER JOIN venue ON class.venue_id = venue.venue_id)
INNER JOIN sport ON class.sport_id = sport.sport_id);";
$rslt = $conn->query($sql);

if (isset($_POST['btnc'])){
		//echo "test";
		$user_id = $type_user['user_id'];
		$part_id = '';
		$class_id = $_POST['btnc'];
		
        $add = "insert into participate values('$part_id','$user_id','$class_id')";
    if ($conn->query($add) === TRUE){ ?>
        <div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<div class="alert alert-success">
					<?php echo "Class Booked Successfully"; ?>
				</div>
			</div>
			<div class="col-md-3"></div>
		</div>
			<?php
			header('Refresh:2, url = user_profile.php');
		}
    }
?>

<html>
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Manage Users</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" type="text/css" media="screen" href="../css/bootstrap.css" />
            <link rel="stylesheet" type="text/css" media="screen" href="../css/bootstrap-grid.min.css" />
            <link rel="stylesheet" type="text/css" media="screen" href="../css/bootstrap.min.css" />
            <link rel="stylesheet" type="text/css" media="screen" href="../css/all.css" />
            <link rel="stylesheet" type="text/css" media="screen" href="admin.main.css" />
            <link rel="stylesheet" type="text/css" media="screen" href="admin.viewusers.css" />
            <link href="../css/bootstrap.min.css" rel="stylesheet">
             <link href="../css/font-awesome.min.css" rel="stylesheet">
           <link href="../css/style.css " rel="stylesheet">
            <script src="../menutoggle.js"></script>
            <script src="../js/jquery-2.1.4.min.js"></script>
            <script src="../js/bootstrap.min.js"></script>
            <script src="../js/jquery.form.js"></script>
            <script src="../js/jquery.validate.min.js"></script>
            <script src="../js/csi.js"></script>
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
		<form method="POST" action="class.php" style="margin-top: 75px; margin-left: 100px; margin-right: 100px;">
			<div class="row">
				<div class="table-responsive">
					<table id="myTable" class="table table-bordered table-striped">
						<thead>
							<th>Class Name</th>
							<th>Start Date (Y-M-D) and Time </th>
							<th>Stop Date (Y-M-D) and Time </th>
							<th>Venue</th>
							<th>Sport</th>
							<th>Book Class</th>
						</thead>
						<?php
							while($cdetail = mysqli_fetch_array($rslt))
								{
							?>
							<tr class="tr">
								<td>
									<?= $cdetail['class_name']; ?>
								</td>
								<td>
									<?= $cdetail['class_start']; ?>
								</td>
								<td>
									<?= $cdetail['class_stop']; ?>
								</td>
								<td>
									<?= $cdetail['venue_name']; ?>
								</td>
								<td>
									<?= $cdetail['sport_name']; ?>
								</td>
								<td>
									<button type = "submit" class="btn btn-success" name = "btnc" value = "<?= $cdetail['class_id']; ?>">Book</button>
								</td>
								<?php
								}
								?>
							</tr>
					</table>
				</div>
			</div>	
		</form>

	</body>
	<hr>
	<footer>
        <center><small>&copy; Copyright 2020, Yokyo Olympics</small>
	</footer>
</html>
<style>
button{
	width: 100%;
}

</style>
<script>
function ccl() {
  confirm("Do You Want To Book the Class?");
}
</script>