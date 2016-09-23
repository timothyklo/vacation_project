<html>
<head>
	<title>Add Book and Review</title>
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
			background: #EEE;
		}
		
		.reviewsContainer {
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
		
		.authorInfo {
			padding: 10px;
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
			<h3>Add New Book and Review</h3>
			<form action="/books/addBook" method="POST">
				<input type="hidden" name="userID" value="<?= $this->session->userdata('currentUser')['id'] ?>" />
				<label for="title">Title:</label> <input type="text" name="title" size="30" /><br />
				<label for="authorID">Author:</label><br />
				<div class="authorInfo">
					<select name="authorID">
						<option value="0">** Select One **</option>
<?php 
					foreach($authorArray as $author) {
?>
						<option value="<?= $author['id'] ?>"><?= $author['name'] ?></option>
<?php 
					}
?>
					</select>
					<br />
					<input type="text" name="authorName" />
				</div>
				<p>
					<label for="review">Review:</label> <textarea name="review" style="width:200px; height:60px"></textarea>
				</p>
				<label for="rating">Rating:</label>
				<select name="rating">
					<option value="0">0</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
				</select>
				<p>
					<input type="submit" value="Add Book and Review" />
				</p>
			</form>
		</div>
	</div>
</body>
</html>