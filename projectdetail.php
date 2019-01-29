<!DOCTYPE html>
<?php
	include_once("dbconnect.php");
	$ID = $_GET['id'];
	$preview = $con->query("SELECT Prod_ID, Prod_Name, Prod_Type, Prod_Price, Prod_Duration, Prod_Description, Owner_ID FROM products WHERE Prod_ID = ".$ID);
    $profile = $preview->fetch_assoc();
?>
	<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Freelancer Profile</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<link href="css/bootstrap.css" rel="stylesheet">
	</head>

	<body>

		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<?php include_once("navbar-admin.php");
			if(isset($_POST['approve'])){
				$con->query(" UPDATE products SET Prod_Approval = 1 WHERE Prod_ID =".$ID);
				header('Location: assesspj.php');
			}
			if(isset($_POST['reject'])){
				$con->query(" UPDATE products SET Prod_Approval = 0 WHERE Prod_ID = ".$ID);
				header('Location: assespj.php');
			} ?>
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
							<form method="post" action="projectdetail.php?id=<?php echo $ID ?>">
								<button type="submit" name="approve" id="approve" class="btn btn-success" value="approve">Approve</button>
								<button type="submit" name="reject" id="reject" class="btn btn-danger" value="reject">Reject</button>
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