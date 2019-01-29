<?php
	include_once("dbconnect.php");
	$ID = $_GET['id'];
	$query = $con->query("SELECT * FROM software WHERE Software_ID = ".$ID);
	$result = $query->fetch_assoc();
?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Subscription</title>
		<link href="css/style.css" rel="stylesheet">
		<link href="css/bootstrap.css" rel="stylesheet">
	</head>

	<body>

		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<?php include_once("navbar.php"); ?>
					<div class="jumbotron">

						<h3>
							<b>Software Name:
								<?php echo $result["Software_name"] ?>
							</b>
						</h3>
						<h5>
							<b>Brand:
								<?php echo $result["Software_Brand"] ?>
							</b>
						</h5>
						<h5>
							<b>Price:
								<?php echo $result["Software_price"] ?>
							</b>
						</h5>
						<h5>
							<b>Software Description:</b>
						</h5>
						<p>
							<?php echo $result["Software_description"] ?>
						</p>
						<form>
							<button type="button" class="btn btn-success" value="Select" onclick="javascript:document.location='offshelfdetail.php?id=<?php echo $ID ?>'">Select</button>
						</form>
					</div>
				</div>
			</div>
		</div>

		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/scripts.js"></script>
	</body>

	</html>