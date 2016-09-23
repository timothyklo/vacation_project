<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Add Plan</title>
	<link rel="stylesheet" type="text/css" href="/assets/stylesheets/style.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			$("#travel_date_from").datepicker();
			$("#travel_date_to").datepicker();
			$("form").on("submit", function() {
				var errors =[];
				var travelFrom = $("#travel_date_from").val();
				var travelTo = $("#travel_date_to").val();
				var destination = $("#destination").val();
				var description = $("#description").val();
				// if(travelFrom == "") {
				// 	errors.push("You must pick a start date!")
				// };
				// if(travelTo == "") {
				// 	errors.push("You must pick an end date!")
				// };
				// if(destination =="") {
				// 	errors.push("You must provide a destination!")
				// };
				// if(description =="") {
				// 	errors.push("You must provide a description!")
				// };
				// if(errors.length > 0) {
				// 	$("#feedback").html("");
				// 	for (var i in errors) {
				// 		$("#feedback").append("<p>" + errors[i] + "</p>");
				// 	}
				// } else {
				// 	$("#feedback").html("");
				// 	alert("OK " + userName + ", you'll be going from " + travelFrom + " to " + travelTo + ".");
				// }
				// return false;
			});
		});
	</script>
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
					<li><a href="/travels">Home</a></li>
					<li><a href="/Users/logout">Log Out</a></li>
				</ul>
			</div>
		</div>
	</nav>	
	<div class="container">
		<h1>Add a Trip!</h1>
		<div class="col-md-12">	
			<form action="/travels/addatrip" method="post">
				<div class="form-group">
					<label>Destination:</label>
					<input type="text" name="destination" placeholder="Destination">
				</div>
				<div class="form-group">
					<label>Description:</label>
					<input type="text" name="description" placeholder="Description">
				</div>
				<div class="form-group">
					<label>Travel Date From:</label>
					<input type="text" name="travel_date_from" placeholder="Travel Date From:" class="datepicker" id="travel_date_from">
				</div>				
				<div class="form-group">
					<label>Travel Date To:</label>
					<input type="text" name="travel_date_to" placeholder="Travel Date To:" class="datepicker" id="travel_date_to">
				</div>
				<div class="form-group">
					<button type="submit" name="submit" class="btn" id="checking">Add Trip</button>
					<div id="feeback"></div>
				</div>
			</form>
		</div>
						<?php 
				if($this->session->flashdata('errors')) {
					foreach($this->session->flashdata('errors') as $value) { 
						?>
						<p><?= $value ?></p>
						<?php
					}	
				} 
				?>
	</div>
</body>
</html>