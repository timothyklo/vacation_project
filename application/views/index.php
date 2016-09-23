<html>
<head>
	<title>Welcome</title>
	<style type="text/css">
		body {
			font-family: Helvetica;
		}
		
		td {
			padding: 3px;
			font-size: 11pt;
		}

		.mainContainer {
			padding: 30px;
		}
		
		.tableContainer {
			position: relative;
			width: 772px;
			height: 326px;
		}
		
		.regContainer {
			position: absolute;
			top: 40px;
			left: 30px;
			width: 320px;
			padding: 20px;
		}
		
		.loginContainer {
			position: absolute;
			top: 40px;
			left: 394px;
			width: 320px;
			padding: 20px;
		}
		
		.infoText {
			font-family: Helvetica;
			font-size: 8pt;
			color: #AAA;
		}
		
		.regErrorMessageContainer {
			position: absolute;
			top: 392px;
			color: red;
			font-size: 8pt;
		}
		
		.loginErrorMessageContainer {
			position: absolute;
			top: 215px;
			color: red;
			font-size: 8pt;
		}
		
	</style>
<?php 
	$this->load->view("partials/header.php");
?>
</head>
<body>
	<div class="mainContainer">
		<div class="tableContainer">
			<h3>Welcome!</h3>
			<div class="regContainer">
				<form action="register" method="POST">
					<fieldset>
						<legend>Register</legend>
						<label for="name" class="form-control-label">Name:</label><input type="text" name="name" class="form-control" />
						<label for="alias" class="form-control-label">Alias:</label><input type="text" name="alias" class="form-control" />
					
						<label for="email" class="form-control-label">Email:</label><input type="text" name="email" class="form-control" />
						<label for="email" class="form-control-label">Password:</label><input type="password" name="password" class="form-control" />
						<label for="email" class="form-control-label">Confirm Password:</label><input type="password" name="confirmPassword" class="form-control" />
						<input type="submit" value="REGISTER" class="pull-right" style="margin-top:20px" />
					</fieldset>
				</form>
<?php
			if ($this->session->flashdata('regErrors')) {
?>
				<div class="regErrorMessageContainer">
<?php 
					$errors = $this->session->flashdata('regErrors');
					
					foreach ($errors as $err) {
						echo $err;
					}
?>
				</div>
<?php
			}
?>
			</div>
			<div class="loginContainer">
				<form action="login" method="POST">
					<fieldset>
						<legend>Login</legend>
						<label for="email" class="form-control-label">Email:</label><input type="text" name="email" class="form-control" />
						<label for="password" class="form-control-label">Password:</label><input type="password" name="password" class="form-control" />
						<input type="submit" value="LOGIN" class="pull-right" style="margin-top:20px" />
					</fieldset>
				</form>
<?php
			if ($this->session->flashdata('loginErrors')) {
?>
				<div class="loginErrorMessageContainer">
<?php 
					echo $this->session->flashdata('loginErrors');
?>
				</div>
<?php
			}
?>
			</div>
		</div>
	</div>
</body>
</html>