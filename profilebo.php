<?php
	include_once("dbconnect.php");
	$ID = $_GET['id'];
	$preview = $con->query("SELECT Owner_ID, Owner_Name AS Name, Owner_Industry AS Industry, Owner_Address AS Address, Owner_RegisteredCapital AS Registered_Capital, Owner_ContactPersonFirstName AS ContactPerson_First_Name, Owner_ContactPersonLastName AS ContactPerson_Last_Name, Owner_ContactNumber AS Contact_Number, Owner_EmailAddress AS Email_Address, Owner_Username AS Username, Owner_Approval AS Registration_Status, Owner_DateRegistered AS Registered_Date FROM business_owner WHERE Owner_ID = ".$ID);
	$profile = $preview->fetch_assoc();
?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Owner Profile</title>
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
				$con->query(" UPDATE business_owner SET Owner_Approval = 1 WHERE Owner_ID =".$ID);
				header('Location: verifybo.php');
			}
			if(isset($_POST['reject'])){
				$con->query(" UPDATE business_owner SET Owner_Approval = 0 WHERE Owner_ID = ".$ID);
				header('Location: verifybo.php');
			}?>
					<div class="jumbotron">
						<h2>
							Business Owner Profile
						</h2>
						<div class="col-sm-12">

							<?php
							foreach ($profile as $key => $value) {
							echo '<div class="row">';
							echo '<div class="col-sm-6 form-group">';
							echo '<label>'.$key.':</label> '.$value;
							echo '</div></div>';
							}
						?>

								<form method="post" action="profilebo.php?id=<?php echo $ID ?>">
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