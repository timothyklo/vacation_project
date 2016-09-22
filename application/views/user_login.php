<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<title>User Login</title>
	<style type="text/css">
		* {
			margin: 1px;
			padding: 1px;
			border: 1px solid yellow;
		}
		h3 {
			margin: 5px;
			padding: 5px;
		}
		.block {
			width: 400px;
			align: center;
			/*margin: 0 auto;*/
		}
		.sectionleft {
			width: 130px;
			display: inline-block;
			vertical-align: top;
			margin: 5px;
		}
		.sectionright {
			width: 180px;
			display: inline-block;
			vertical-align: top;
			margin: 5px;
		}
		.submissionfield {
			width: 200px;
		}
	</style>
</head>
<body>
	<div class="block">
		<h3>Login:</h3>
		<div class="sectionleft">
			<p>Email:</p>
			<p>Password:</p>
		</div>
		<form class="sectionright" id="login" action="/login/process_login" method="post">
			<p><input class="submissionfield" type="text" name="email"/></p>
			<p><input class="submissionfield" type="password" name="password"/></p>
			<p align="right"><input type="submit" value="Login" /></p>
		</form>
	</div>
	<div class="block">
		<h3>Register:</h3>
		<div class="sectionleft">
			<p>First name:</p>
			<p>Last name:</p>
			<p>Email:</p>
			<p>Password:</p>
			<p>Confirm password:</p>
		</div>
		<form class="sectionright" id="register" action="/login/process_registration" method="post">
			<p><input class="submissionfield" type="text" name="first_name"/></p>
			<p><input class="submissionfield" type="text" name="last_name"/></p>
			<p><input class="submissionfield" type="text" name="email"/></p>
			<p><input class="submissionfield" type="password" name="password"/></p>
			<p><input class="submissionfield" type="password" name="confirm_password"/></p>
			<p align="right"><input type="submit" value="Register" /></p>
		</form>

		<?php if($this->session->flashdata("login_errors"))
		{
			echo $this->session->flashdata("login_errors");
		}
		?>
		<?php if($this->session->flashdata("registration_errors"))
		{
			echo $this->session->flashdata("registration_errors");
		}
		?>
	</div>
</body>
</html>