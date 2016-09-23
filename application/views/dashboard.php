<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Travel Dashboard</title>
	<link rel="stylesheet" type="text/css" href="/assets/stylesheets/style.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="col-md-9 col-md-offset-1">
				<div class="navbar-header">
					<a class="navbar-brand" href="/"></a>
					<ul class="nav navbar-nav navbar-left">
						<li><a href="/"></a></li>
					</ul>
				</div>
				<ul class="nav navbar-nav navbar-right">
					<li><a href=""></a></li>
					<li><a href="/Users/logout">Log Out</a></li>
				</ul>
			</div>
		</div>
	</nav>	
	<div class="container">
		<h1>Welcome, <?= $this->session->userdata['username'] ?>!</h1>
		<div class="col-md-12">
			<h2>Your Trip Schedules</h2> 
			<table style="width:100%">
				<tr>
					<td>Destination</td>
					<td>Travel Start Date</td>
					<td>Travel End Date</td>
					<td>Plan</td>
				</tr>
				<?php foreach ($upcoming as $upcomingTrip) { ?>
				<tr>
					<td><a href="travels/destination/<?= $upcomingTrip['tid'] ?>"><?= $upcomingTrip['destination']?></a></td>
					<td><?= $upcomingTrip['travel_date_from']?></td>
					<td><?= $upcomingTrip['travel_date_to']?></td>
					<td><?= $upcomingTrip['description']?></td>
				</tr>
				<?php } ?>
			</table>
		</div>
		<div class="col-md-12">
			<h2>Other User's Travel Plans</h2> 
			<table style="width:100%">
				<tr>
					<td>Name</td>
					<td>Destination</td>
					<td>Travel Start Date</td>
					<td>Travel End Date</td>
					<td>Do you want to join?</td>
				</tr>
				<?php foreach ($others as $upcomingTrip) { ?>
				<tr>
					<td><?= $upcomingTrip['name']?></td>
					<td><a href="travels/destination/<?= $upcomingTrip['tid'] ?>"><?= $upcomingTrip['destination']?></a></td>
					<td><?= $upcomingTrip['travel_date_from']?></td>
					<td><?= $upcomingTrip['travel_date_to']?></td>
					<td><a href="travels/join/<?= $upcomingTrip['tid'] ?>">Join</a></td>
				</tr>
				<?php } ?>
			</table>
		</div>
		<br>
		<div class="col-md-4 pull-right">
			<h2> </h2>
			<p><a href="travels/add">Add Travel Plan</a></p>
		</div>
	</div>
</body>
</html>