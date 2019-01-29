<!DOCTYPE html>
<?php
	if (session_id() == '' || !isset($_SESSION))
		session_start();
	if(!isset($_SESSION['ID'])) {
		echo("Login Required!");
		header("Location: login.php");
	}
	include_once("dbconnect.php");
	$ID = $_GET['id'];
	$preview = $con->query("SELECT Prod_ID, Prod_Name, Prod_Type, Prod_Price, Prod_Duration, Prod_Description, Owner_ID FROM products WHERE Prod_ID = ".$ID);
		$profile = $preview->fetch_assoc();
		
		// TODO: Resolve always-true condition
		if (1) {
		
			if (isset( $_POST['bid'])) {
				$bid = $_POST['bid'];
				$comment = $_POST['comment'];
			$freelance_id = $_SESSION['ID'];
				if (!mysqli_query($con, "INSERT INTO bidding VALUES ($freelance_id,$ID,$bid,'$comment');")) {
					$errormsg = "Username is already used.";
				}
				else {
					//Success
				}
			} else
				$errormsg = "Passwords do not match.";
			mysqli_close($con);
		}
?>
	<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Quotation Submission</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<link href="css/bootstrap.css" rel="stylesheet">
	</head>

	<body>

		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<?php include_once("navbar.php");?>
					<h2>
						Project Detail
					</h2>
					<div class="jumbotron">
						<div class="col-sm-12">
							<h3>
								<b>Project Name:
									<?php echo $profile['Prod_Name'] ?>
								</b>
							</h3>
							<h5>
								<b>Owner ID:
									<?php echo $profile['Owner_ID'] ?>
								</b>
							</h5>
							<h5>
								<b>Type:
									<?php echo $profile['Prod_Type'] ?>
								</b>
							</h5>
							<h5>
								<b>Price:
									<?php echo $profile['Prod_Price'] ?>
								</b>
							</h5>
							<h5>
								<b>Duration:
									<?php echo $profile['Prod_Duration'] ?>
								</b>
							</h5>
							<h5>
								<b>Project Description: </b>
							</h5>
							<p>
								<?php echo $profile['Prod_Description'] ?>
							</p>
						</div>
					</div>
					<h2>Bidding</h2>
					<div class="jumbotron">
						<div class="col-sm-12">
							<form role="form" name="input" action="<?php echo $_SERVER['PHP_SELF']." ?id=".$ID; ?>" method="POST">
								<h5>Bid Amount:
									<input type="text" placeholder="0" name="bid">
								</h5>
								</br>
								<h5>Comment: </h5>
								<textarea rows="4" cols="100" name="comment"></textarea>
								</br>
								<input type="submit" class="btn btn-success" value="Bid">
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/scripts.js"></script>
	</body>

	</html>