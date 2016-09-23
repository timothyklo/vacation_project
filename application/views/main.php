<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login/Registration</title>
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
					<a class="navbar-brand">Welcome!</a>
					<ul class="nav navbar-nav navbar-left">
						<li><a href="/"></a></li>
					</ul>
				</div>
			</div>
		</div>
	</nav>	
	<div class="container">
		<div class="col-md-5 outlined">
			<div class='errors'>
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
			<h1>Register</h1>
			<form action="Users/register" method="post">
				<div class="form-group">
					<label>Name:</label>
					<input type="text" name="name" class="form-control" placeholder="Name (at least 3 characters)">
				</div>
				<div class="form-group">
					<label>Username:</label>
					<input type="text" name="username" class="form-control" placeholder="Username (at least 3 characters)">
				</div>
				<div class="form-group">
					<label>Password:</label>
					<input type="password" name="password" class="form-control" placeholder="Password (at least 8 characters)">
				</div>
				<div class="form-group">
					<label>Confirm Password:</label>
					<input type="password" name="password_check" class="form-control" placeholder="Confirm password">
				</div>
				<div class="form-group">
					<button type="submit" name="submit" class="btn btn-success pull-right">Register</button>
				</div>
			</form>
		</div>
		<div class="col-md-5 col-md-offset-1 outlined">
			<div class='errors'>
				<?php 
				if($this->session->flashdata('errors2')) {
					foreach($this->session->flashdata('errors2') as $value) { 
						?>
						<p><?= $value ?></p>
						<?php
					}	
				} 
				?>		
			</div>
			<h1>Sign In</h1>
			<form action="Users/login" method="post">
				<div class="form-group">
					<label>Username:</label>
					<input type="username" name="username" class="form-control" placeholder="Username">
				</div>
				<div class="form-group">
					<label>Password:</label>
					<input type="password" name="password" class="form-control" placeholder="Password">
				</div>
				<button type="submit" class="btn btn-success pull-right">Login</button>
			</form>
		</div>
	</div>
</body>
</html>