<html>
<head>
	<title>Books Home</title>
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
		
		textarea {
			width: 221px;
			height: 60px;
		}

		.mainContainer {
			padding: 30px;
		}
		
		.tableContainer {
			position: relative;
			width: 800px;
			height: 326px;
		}
		
		.booksContainer {
			position: absolute;
			top: 40px;
			left: 30px;
			border: 2px solid gray;
			width: 320px;
			padding: 20px;
		}
		
		.otherContainer {
			position: absolute;
			top: 40px;
			left: 430px;
			border: 2px solid gray;
			width: 294px;
			padding: 20px;
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
		
		.bookListContainer {
			height: 120px;
			overflow: scroll;
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
		
		.reviewDateText {
			font-size: 9pt;
			padding-bottom: 30px;
		}
		
		.reviewText {
			font-size: 10pt;
		}
		
	</style>
</head>
<body>
	<div class="mainContainer">
		<div class="header">
			<div class="welcomeMessage">Welcome, <?= $this->session->userdata("currentUser")['name'] ?>!</div>
			<div class="links"><a href="/books/add">Add Book and Review</a> <span class="bookwormAscii">,/\,/\,o</span> <a href="/session/logout">Logout</a></div>
		</div>
		<div class="tableContainer">
			<div class="booksContainer">
				<div class="boxTitle">
					Recent Book Reviews
				</div>
				<table>
<?php
				foreach($recentReviews as $review) {
?>
					<tr>
 						<td colspan="2" class="bookTitleText"><a href="/books/<?= $review['book_id'] ?>"><?= $review['title'] ?></a></td>
					</tr>
					<tr>
						<td></td>
						<td class="reviewText">Rating: <img src="/assets/images/<?= $review['rating'] ?>_stars.png" style="vertical-align:middle; margin-left:10px" height="18px" /></td>
					</tr>
					<tr>
						<td></td>
						<td class="reviewText">
							<a href="/users/<?= $review['user_id'] ?>"><?= $review['reviewer_name'] ?></a> says: <?= $review['review'] ?>
						</td>
					</tr>
					<tr>
						<td></td>
						<td class="reviewDateText">
							<div style="position:relative">
								<div style="position:absolute; left:0px; width:180px">Posted on <?= $review['created_at'] ?></div>
<?php 
							if ($review['user_id'] == $this->session->userdata('currentUser')['id']) {
?>
								<div style="position:absolute; right:0px; width:80px"><a href="/deleteReview/<?= $review['id'] ?>">Delete Review</a></div>
<?php
							}
?>
							</div>
						</td>
					</tr>
<?php
				}	
?>
				</table>
			</div>
			<div class="otherContainer">
				<div class="boxTitle">
					Other Books with Reviews
				</div>
				<div class="bookListContainer">
<?php
				foreach($reviewedBooks as $book) {
?>
					<div class="bookRow"><a href="/books/<?= $book['id'] ?>"><?= $book['title'] ?></a></div>
<?php
				}
?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>