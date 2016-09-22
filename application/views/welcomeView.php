<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title></title>
	<!-- Google Icons -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<!-- Jquery Theme -->
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/hot-sneaks/jquery-ui.css">
	<!-- Materialize CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">
	<!-- Personal CSS -->
	<link rel="stylesheet" href="/assets/css/style.css">


	<!-- Less -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.7.1/less.min.js"></script>


	<!-- Jquery --> 
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

	<!-- Materialize JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>

	<script>
		$(document).ready(function() {
			$('select').material_select();
		});
	</script>

</head>
<body>
	<div class="container">
		<h2> Welcome! </h2>
		<form id="register" action="welcome/register" method="POST">
			<h5> Register </h5>
			<div class="input-field">
				<input type="text" id="name" name="name">
				<label for="name">Name</label>
			</div>
			<div class="input-field">
				<input type="text" id="alias" name="alias">
				<label for="alias">Alias</label>
			</div>
			<div class="input-field">
				<input type="text" id="email" name="email">
				<label for="email">Email</label>
			</div>
			<div class="input-field">
				<input type="password" id="password" name="password">
				<label for="password">Passwrod</label>
			</div>
			<div class="input-field">
				<input type="password" id="cpassword" name="cpassword">
				<label for="cpassword">Confirm Password</label>
			</div>
			<button class="btn waves-effect waves-light center-align" type="submit">Register</button>
		</form>
		<form id="login" action="welcome/login" action="welcome/login" method="POST">
			<h5> Login </h5>
			<div class="input-field">
				<input type="text" id="email" name="email">
				<label for="email">Email</label>
			</div>
			<div class="input-field">
				<input type="password" id="password" name="password">
				<label for="password">Password</label>
			</div>
			<button class="btn waves-effect waves-light center-align" type="submit">Login</button>
		</form>

	</div>
</body>
</html>