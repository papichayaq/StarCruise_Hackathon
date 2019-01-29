<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="css/register.css" rel="stylesheet">
	<script src="js/register.js"></script>
	<link href="css/bootstrap.css" rel="stylesheet">
</head>

<body>
	<div class="container-fluid" style="font-family: 'Open Sans', Helvetica, Arial, sans-serif">

		<div class="container-fluid text-center">
			<div class="row">
				<div class="col-md-12">
					<?php include_once("navbar.php"); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<button class="awesome-circle" style="background-color:#FF708A;border:none;box-shadow:none ;" type="button" onclick="javascript:document.location='register_businessowner.php'">Business Owner</button>
				</div>
				<div class="col-md-6">
					<button class="awesome-circle" style="background-color: #FF708A;border:none;box-shadow:none ;" type="button" onclick="javascript:document.location='register_freelance.php'">Freelancer</button>
				</div>
			</div>
		</div>
	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/scripts.js"></script>
</body>

</html>