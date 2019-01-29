<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Project</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="css/project.css" rel="stylesheet">
</head>

<body>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<?php include_once("navbar.php"); ?>

				<div class="row" align="center" id="rectcontainer">
					<div class="col-md-2"></div>

					<div class="col-md-4">
						<div class="jumbotron" style="margin:auto;">
							<figure>
								<img id="rect" src="offshelf1.png" />
							</figure>
							<button type="button" class="btn btn-success" onclick="javascript:document.location='offshelf.php'">
								Off The Shelf
							</button>
						</div>
					</div>
					<div class="col-md-4">
						<div class="jumbotron" style=" margin:auto;">
							<figure>
								<img id="rect" src="maketoorder1.png" />
							</figure>
							<button type="button" class="btn btn-success" onclick="javascript:document.location='toorder.php'">
								Made To Order
							</button>
						</div>
					</div>
					<div class="col-md-2"></div>
				</div>

			</div>
		</div>
	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/scripts.js"></script>
</body>

</html>