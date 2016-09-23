<html>
<head>
	<title>User Reviews</title>
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
		
		.userDataContainer {
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
			background-color: cyan;
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
			background-color: #EEE;
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
		
		.reviewText {
			font-size: 10pt;
		}
		
		.reviewedBookList {
			max-height: 145px;
			overflow: scroll;
			padding: 0px 0px 0px 20px;
		}
		
	</style>
</head>
<body>
	<div class="mainContainer">
		<div class="header">
			<div class="welcomeMessage"></div>
			<div class="links"><a href="/">Home</a> <span class="bookwormAscii">o,/\,/\,</span> <a href="/books/add">Add Book and Review</a> <span class="bookwormAscii">,/\,/\,o</span> <a href="/session/logout">Logout</a></div>
		</div>
		<div class="tableContainer">
			<div class="userDataContainer">
				<h3>User Alias: <?= $user['alias'] ?></h3>
				Name: <?= $user['name'] ?><br/>
				Email: <a href="mailto:<?= $user['email'] ?>"><?= $user['email'] ?></a><br/>
				Total Reviews: <?= count($user['reviewedBooks']) ?>
				<p>
					Posted Reviews on the following books:
					<div class="reviewedBookList">
<?php
					foreach($user['reviewedBooks'] as $book) {
?>
						<a href="/books/<?= $book['id'] ?>"><?= $book['title'] ?></a><p/>
<?php
					}
?>
					</div>
				</p>
			</div>
		</div>
	</div>
</body>
</html>