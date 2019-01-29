<?php
	include_once("dbconnect.php");
	$ID = $_GET['id'];
	$preview = $con->query("SELECT Freelance_ID, Freelance_Username, Freelance_DateRegistered AS Registration_Date, Freelance_FName AS First_Name, Freelance_LName AS Last_Name, Freelance_JobExperience AS Job_Experience, Freelance_ContactNumber AS Contact_Number, Freelance_Email, Freelance_Approval AS Registration_Status FROM freelancer WHERE Freelance_ID = ".$ID);
    $profile = $preview->fetch_assoc();
?>
	<!DOCTYPE html>
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
					$con->query(" UPDATE freelancer SET Freelance_Approval = 1 WHERE Freelance_ID =".$ID);
					header('Location: verifyfl.php');
				}
				if(isset($_POST['reject'])){
					$con->query(" UPDATE freelancer SET Freelance_Approval = 0 WHERE Freelance_ID = ".$ID);
					header('Location: verifyfl.php');
				}?>

					<div class="jumbotron">
						<h2>
							Freelancer Profile
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

								<form method="post" action="profilefl.php?id=<?php echo $ID ?>">
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