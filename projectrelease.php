<?php
  if (session_id() == '' || !isset($_SESSION))
    session_start();
  if (!isset($_SESSION['Username']))
	header("Location: index.php");
?>

	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Home</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<link href="css/hwhite.css" rel="stylesheet">
	</head>

	<body>

		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<?php include_once("navbar.php"); ?>
					<h2>
						Project Status
					</h2>
					<?php 
				$preview = $con->query("SELECT products.Prod_ID, products.Prod_Name, business_owner.Owner_Name, products.Prod_Status FROM products, business_owner WHERE products.Prod_Approval = 1 AND products.Owner_ID = business_owner.Owner_ID AND business_owner.Owner_ID = ".$_SESSION['ID'].";");
				if ($preview->num_rows > 0){
					while($row = $preview->fetch_assoc()) {
						echo "<div class='jumbotron'>";
						echo "<h5><b>Project Name: </b>".$row['Prod_Name']."</h5>";
						echo "<h5><b>Skills: </b>";
						$select = $con->query("SELECT Skill_Name FROM skill, products, product_skill WHERE products.Prod_ID = ".$row['Prod_ID']." AND products.Prod_ID = product_skill.Prod_ID AND skill.Skill_ID = product_skill.Skill_ID ;");
							while($skill = $select->fetch_assoc()){
								echo $skill['Skill_Name']." ";
							}         
						echo "</h5>";
						if($row['Prod_Status'] == 0){
							echo "<h5><b>Status: </b>Bidding</h5>";
							echo "<button type='button' class='btn btn-success' onclick='javascript:document.location=".'"qreview.php?id='.$row['Prod_ID'].'"'."'>View Quotation</button>";
						}
						elseif($row['Prod_Status'] == 1){
							echo "<h5><b>Status: </b>Ongoing</h5>";
						}
						else{
							echo "<h5><b>Status: </b>Completed</h5>";
						}
						
						echo "</div>";
					}
				}
			?>
				</div>
			</div>
		</div>

		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/scripts.js"></script>
	</body>

	</html>