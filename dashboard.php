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
		<script type="text/javascript" src="js/checkLogin.js"></script>
	</head>
	<body>
		<!-- jQuery & Bootstrap scripts -->
		<?php include('inc/scripts.php'); ?>

		<?php include('inc/nav_bar.php'); ?>
		<script type="text/javascript" src="js/getUser.js"></script>

		<!-- div id="submit-success" class="alert alert-success alert-dismissible fade in">Success! Issues saved to DejaVu.
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			</div> -->

		<div class="container">

			<?php include('inc/header.php'); ?>

			<!-- Issue Lookup Form -->
<!--			<div class="row">-->
<!--				<h2>Search for an Issue</h2>-->
<!--			</div>-->
<!--			<form id="lookupForm" action="" method="post">-->
<!--				<div class="row">-->
<!--					<label>Search by:</label>-->
<!--				</div>-->
<!---->
<!--				<div class="row">-->
<!--					<input type="radio" id="radioB1" name="searchFor" value="name">-->
<!--					<label for="radioB1">Name</label>-->
<!--				</div>-->
<!---->
<!--				<div class="row">-->
<!--					<input type="radio" id="radioB2" name="searchFor" value="description">-->
<!--					<label for="radioB2">Description</label>-->
<!--				</div>-->
<!---->
<!--				<div class="row">-->
<!--					<input type="radio" id="radioB3" name="searchFor" value="solution">-->
<!--					<label for="radioB3">Solution</label>-->
<!--				</div>-->
<!---->
<!--				<div class="row">-->
<!--					<input type="radio" id="radioB4" name="searchFor" value="attempts">-->
<!--					<label for="radioB4">Attempts</label>-->
<!--				</div>-->
<!---->
<!--				<div class="row">-->
<!--					<input type="radio" id="radioB5" name="searchFor" value="tags">-->
<!--					<label for="radioB5">Tags</label>-->
<!--				</div>-->
<!---->
<!--				<div class="row">-->
<!--					<input class="btn btn-info" type="submit" value="Search">-->
<!--				</div>-->
<!---->
<!--			</form>-->

			<!-- Issue submission form -->
			<div class="row">
				<h2>Submit a New Issue</h2>
			</div>

			<form id="submissionForm" action="cgi-bin/issue_create.py" method="post">
					<div class="form-group">
						<label for="name">Name for issue:</label>
						<input type="text" id="name" name="name" class="form-control col-xs-3" required>
					</div>


                    <div class="form-group">
						<label for="description">Description:</label>
						<textarea id="description" name="description" rows="2" cols="50" class="form-control" required></textarea>
					</div>

                    <div class="form-group">
						<label for="solution">Solution:</label>
						<textarea id="solution" name="solution" rows="4" cols="50" class="form-control" required></textarea>
					</div>

                    <div class="form-group">
						<label for="attempts">Attempts:</label>
						<textarea id="attempts" name="attempts" rows="4" cols="50" class="form-control" required></textarea>
					</div>

                    <div class="form-group">
						<label for="tags">Tags (separate with comma and space):</label>
						<input type="text" id="tags" name="tags" size="50" class="form-control col-xs-4" required>
					</div>

                    <input class="btn btn-success" type="submit" value="Submit" id="issue-submit">
			</form>

		</div>

	</body>
</html>