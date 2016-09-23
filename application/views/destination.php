<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Destination</title>
	<link rel="stylesheet" type="text/css" href="/assets/stylesheets/style.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-defafult">
		<div class="container-fluid">
			<div class="col-md-9 col-md-offset-1">
				<div class="navbar-header">
					<a class="navbar-brand" href="/"></a>
					<ul class="nav navbar-nav navbar-left">
						<li><a href="/"></a></li>
					</ul>
				</div>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="/travels">Home</a></li>
					<li><a href="/Users/logout">Log Out</a></li>
				</ul>
			</div>
		</div>
	</nav>	
	<div class="container">
		<div class="col-md-12">
			<h1><?= $trip['destination'] ?></h1>
			<p>Planned By: <?= $trip['name']?></p>
			<p>Description: <?= $trip['description']?></p>
			<p>Travel Date From: <?= $trip['travel_date_from']?></p>
			<p>Travel Date To: <?= $trip['travel_date_to']?></p>
		</div>
		<div class="col-md-12">
			<h2>Other users' joining the trip:</h2> 
			<?php foreach ($others as $people) {?>
			<p><?= $people['name']?></p>
			<?php } ?>
		</div>
	</div>
</body>
</html>