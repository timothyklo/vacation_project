<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
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
	<nav>
		<div class="container">
			<div class="nav-wrapper">
				<ul id="nav-mobile" class="right">
					<li><a href="/books">Home</a></li>
					<li><a href="/books/add">Add a Book and Review</a></li>
					<li><a href="/welcome/logout">Logout</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<div>
		<table>
			<tbody>
				<tr><td>User Alias: </td><td><?= $userInfo['alias'] ?></td></tr>
				<tr><td>Name: </td><td><?= $userInfo['name'] ?></td></tr>
				<tr><td>Email: </td><td><?= $userInfo['email'] ?></td></tr>
				<tr><td>Total Reviews: </td><td><?= $userInfo['numreviews'] ?></td></tr>
			</tbody>
		</table>
	</div>
	<div>
		<h5>Posted Reviews on the Following Books:</h5>
		<ul>
			<?php foreach ($usersReviews as $title) { ?>
				<li><a href="/books/<?= $title['id'] ?>"><?= $title['title'] ?></a></li>
			<?php } ?>
		</ul>
	</div>
</body>
</html>