<!DOCTYPE html>
<html lang="en-US">
	<head>
		<title>Deja Vu</title>
		<meta charset="UTF-8">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Lora|Ubuntu+Condensed" rel="stylesheet">
		<!-- Our CSS -->
		<link rel="stylesheet" href="css/styles.css">
	</head>     
	<body>
		<div class="container">
			<div class="row">
				<div class="col-lg" id="header">
					<h1>Deja Vu</h1>
					<h2>Account Create</h2>
				</div>
			</div>
			<form id="accountForm" action="cgi-bin/account_create.py" method = "post">
				<div class="row formQuestion">
					<input type="text" name="username" id="user" placeholder = "Username" required>
				</div>
				<div class="row formQuestion">
					<input type="password" name="password" id="pass" placeholder = "Password" required>
				</div>
				<div class="row formQuestion">
					<input type="password" name="passwordConfirm"  id="passConfirm" placeholder = "Confirm Password" required>
				</div>
				<div class="row formQuestion">
					<button type="submit" id="submit"> Create Account </button>
				</div>
				<div class="row formQuestion">
					<h4><a href="login.php">Go back to login</a></h4>
					<h3 id="passMatch"></h3>
				</div>
			</form>
		</div>

		<?php include('inc/scripts.php'); ?>
		<script src="js/passMatch.js"></script>

	</body>
</html>