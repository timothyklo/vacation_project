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
			<h5 class="brand-logo">Welcome <?= $this->session->alias ?></h5>
				<ul id="nav-mobile" class="right">
					<li><a href="/books/add">Add a Book and Review</a></li>
					<li><a href="/welcome/logout">Logout</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col s6">
				<h3> Recent Book Reviews </h3>
				<?php foreach ($recent as $review) { ?>

				<div class="recentReview">
					<h4><a href="books/<?= $review['id'] ?>"><?= $review['title'] ?></a></h4>
					<p id="rating"> Rating: </p><div class="stars-<?= $review['rating'] ?>"></div>

					<p><em><a href="/users/<?= $review['uid'] ?>"><?= $review['alias'] ?></a> says: <?= $review['comment'] ?></em></p>

					<p><em>Posted on <?= $review['created_at'] ?></em></p>
				</div>
				
				<?php } ?>
			</div>
			<div class="col s6">

				<h3> Other Books with Reviews: </h3>
				<div class="otherReviews">
					<ul>
						<?php foreach ($other as $others) { ?>
							<li><a href="books/<?= $others['id'] ?>"><?= $others['title'] ?></a></li>
							<?php } ?>
					</ul>
				</div>
				
			</div>
		</div>
	</div>



</body>
</html>