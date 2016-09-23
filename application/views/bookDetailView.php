<html>
<head>
	<title>Book Detail</title>
	<style type="text/css">
		body {
			font-family: Helvetica;
		}
		
		th {
			text-align: left;
		}
		
		td {
			padding: 3px;
			font-size: 11pt;
		}
		
		hr {
			width: 90%;
			margin-top: 30px;
		}
		
		textarea {
			width: 294px;
			height: 80px;
		}

		.mainContainer {
			padding: 30px;
		}
		
		.tableContainer {
			position: relative;
			width: 800px;
			height: 326px;
		}
		
		.reviewsContainer {
			position: absolute;
			top: 100px;
			left: 30px;
			border: 2px solid gray;
			width: 320px;
			max-height: 450px;
			padding: 20px;
			overflow: scroll
		}
		
		.newReviewContainer {
			position: absolute;
			top: 100px;
			left: 430px;
			border: 2px solid gray;
			width: 294px;
			padding: 20px 20px 5px 20px;
		}
		
		.titleText {
			font-weight: bold;
		}
		
		.infoText {
			font-family: Helvetica;
			font-size: 8pt;
			color: #AAA;
		}
		
		.bookwormAscii {
			font-size: 9pt;
			font-family: Times;
		}
		
		.errorMessageContainer {
			position: absolute;
			top: 186px;
			left: 25px;
			width: 200px;
			font-size: 9pt;
			color: red;
		}
		
		.bookRow {
			padding: 4px 16px;
			background-color: white:
		}
		
		.boxTitle {
			position: absolute;
			left: 15px;
			top: -20px;
			height: 20px;
			padding: 10px;
			background-color: white;
			font-weight: bold;
			text-align: center;
		}
		
		.reviewsBoxTitle {
			position: absolute;
			left: 43px;
			top: 82px;
			height: 20px;
			padding: 10px;
			background-color: white;
			font-weight: bold;
			text-align: center;
			z-index: 1;
		}
		
		.header {
			position: relative;
			width: 100%;
			height: 30px;
		}
		
		.welcomeMessage {
			position: absolute;
			top: 0px;
			left: 0px;
			font-size: 14pt;
			font-weight: bold;
		}
		
		.links {
			position: absolute;
			top: 0px;
			right: 0px;
		}
		
		.bookTitleText {
			font-size: 14pt;
		}
		
		.reviewText {
			font-size: 10pt;
		}
		
		.reviewDateText {
			font-size: 9pt;
		}
		
	</style>
</head>
<body>
	<div class="mainContainer">
		<div class="header">
			<div class="welcomeMessage"></div>
			<div class="links"><a href="/books">Home</a> <span class="bookwormAscii">,/\,/\,o</span> <a href="/session/logout">Logout</a></div>
		</div>
		<div class="tableContainer">
			<h3><?= $book['title'] ?></h3>
			<h4>Author: <?= $book['author'] ?></h4>
			<div class="reviewsBoxTitle">
					Reviews
				</div>
			<div class="reviewsContainer">
				<div class="reviewsTableContainer">
<?php 
				foreach($book['reviews'] as $review) {
?>
					<hr>
					Rating: <img src="/assets/images/<?= $review['rating'] ?>_stars.png" style="vertical-align:middle; margin-left:10px" height="18px" />
					<p>
						<a href='/users/<?= $review['user_id'] ?>'><?= $review['reviewer_name'] ?></a> says: <?= $review['review'] ?>
					</p>
					<p class="reviewDateText">
						Posted on <?= $review['created_at'] ?>
					</p>
<?php
				}
?>
				</div>
			</div>
			<div class="newReviewContainer">
				<div class="boxTitle">
					Add a Review
				</div>
				<form action="/addReview" method="POST">
					<input type="hidden" name="bookID" value="<?= $book['id'] ?>" />
					<textarea name="review"></textarea>
					<p>
						<label for="rating">Rating:</label>
						<select name="rating">
							<option value="0">0</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
						</select> 
					</p>
					<input type="submit" value="Submit Review" />
				</form>
			</div>
		</div>
	</div>
</body>
</html>