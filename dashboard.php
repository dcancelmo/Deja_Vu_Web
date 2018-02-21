<!DOCTYPE html>
<html lang="en-US">
<head>
	<title>Deja Vu</title>
	<meta charset="utf-8">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Lora|Ubuntu+Condensed" rel="stylesheet">
	<!-- Our CSS -->
	<link rel="stylesheet" href="css/styles.css">
</head>
<body>

<div class="container">

	<div class="row" id="headerTitle">
		<h1>Deja Vu</h1>
	</div>
	
	<?php include('php/nav_bar.php'); ?>

	<!-- Issue Lookup Form -->
	<div class="row">
		<h2>Search for an Issue</h2>
	</div>
	<form id="lookupForm" action="" method="post">
		<div class="row">
			<label>Search by:</label>
		</div>

		<div class="row">
			<input type="radio" id="radioB1" name="searchFor" value="name">
			<label for="radioB1">Name</label>
		</div>

		<div class="row">
			<input type="radio" id="radioB2" name="searchFor" value="description">
			<label for="radioB2">Description</label>
		</div>

		<div class="row">
			<input type="radio" id="radioB3" name="searchFor" value="solution">
			<label for="radioB3">Solution</label>
		</div>

		<div class="row">
			<input type="radio" id="radioB4" name="searchFor" value="attempts">
			<label for="radioB4">Attempts</label>
		</div>

		<div class="row">
			<input type="radio" id="radioB5" name="searchFor" value="tags">
			<label for="radioB5">Tags</label>
		</div>

		<div class="row">
			<input class="btn btn-info" type="submit" value="Search">
		</div>

	</form>

	<!-- Issue submission form -->
	<div class="row">
		<h2>Submit a New Issue</h2>
	</div>

	<form id="submissionForm" action="cgi-bin/issue_create.py" method="post">
			<div class="row formQuestion">
				<label>Name for issue:</label>
				<input type="text" name="name">
			</div>


			<div class="row formQuestion">
				<label>Description:</label>
				<textarea name="description" rows="2" cols="50"></textarea>
			</div>

			<div class="row formQuestion">
				<label>Solution:</label>
				<textarea name="solution" rows="4" cols="50"></textarea>
			</div>

			<div class="row formQuestion">
				<label>Attempts:</label>
				<textarea name="attempts" rows="4" cols="50"></textarea>
			</div>

			<div class="row formQuestion">
				<label>Tags (separate with comma and space):</label>
				<input type="text" name="tags" size="50">
			</div>

			<div class="row formQuestion">
				<input class="btn btn-success" type="submit" value="Submit">
			</div>

	</form>


</div>

<!-- jQuery & Bootstrap scripts -->
<?php include('php/scripts.php'); ?>

</body>
</html>