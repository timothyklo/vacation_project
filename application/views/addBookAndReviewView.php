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
					<li><a href="/welcome/logout">Logout</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container">
		<div>
			<h3>Add a New Book Title and a Review:</h3>
		</div>
		
		<form id="addBookandReview" action="/books/addBook" method="POST">
			<input type="hidden" name="user_Id" value="<?= $this->session->id ?>">
			<div class="input-field">
				<input type="text" id="title" name="title">
				<label for="title">Book Title</label>
			</div>
			<p>Author:</p>
			<div id="chooseAuthor">
				<p>Choose from a list:</p>

				<select class="author" name="authors">
					<option value="">David Foster Wallace</option>
					<option value="">Franz Kafka</option>
					<option value="">Denis Johnson</option>
					<option value="">Flannery O'Connor</option>
				</select>
				<div class="input-field">
					<input type="text" id="author" name="author">
					<label for="author">...or add a new author</label>
				</div>
			</div>
			<div class="input-field">
				<textarea id="textarea1" class="materialize-textarea" name="comment"></textarea>
				<label for="textarea1">Review</label>
			</div>
			<p id="ratinglabel">Rating:</p> 
			<select class="rating" name="rating">
				<option value="5">5</option>
				<option value="4">4</option>
				<option value="3">3</option>
				<option value="2">2</option>
				<option value="1">1</option>
			</select>
			<br>
			<button class="btn waves-effect waves-light center-align" type="submit">Add Book and Review</button>
		</form>
		
	</div>

</body>
</html>