<!DOCTYPE html>
<?php $ID = $_GET['id']; ?>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Quotation Review</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="css/hwhite.css" rel="stylesheet">
	<link href="css/divtable.css" rel="stylesheet">
</head>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<?php include_once("navbar-admin.php");?>
			<h2>
				Suggested Team Formation
			</h2>
			<div class="jumbotron">
				<div class="div-table" style="width:100%; margin:auto; border: 0px solid; padding:0px;">
					<div class="div-table-row">
						<?php
						$preview = $con->query("SELECT * FROM freelancer, bidding WHERE freelancer.Freelance_ID = bidding.Freelance_ID AND bidding.Product_ID =  $ID ORDER BY bidding.Bid DESC LIMIT 4;");
						if ($preview->num_rows > 0){
							while($row = $preview->fetch_assoc()) {
								/*echo "<a href='ShowRecipe.php?id=".$row['recipeID']."'>";*/
								echo "<div class='div-table-col' style='border:1px solid; width:25%; padding:5px; margin-right:0%;'>";
								echo "<h5>Name: ".$row['Freelance_FName']." ".$row['Freelance_LName']."</h5>";
								echo "<h6>Price: ".$row['Bid']."</h6>";
								echo "<h5><b>Skills: </b>";
								$select = $con->query("SELECT Skill_Name FROM skill, freelancer, freelancer_skill WHERE freelancer.Freelance_ID = ".$row['Freelance_ID']." AND freelancer.Freelance_ID = freelancer_skill.Freelance_ID AND skill.Skill_ID = freelancer_skill.Skill_ID ;");
								while($skill = $select->fetch_assoc()){
								echo $skill['Skill_Name']." ";
								}            
								echo "</div>";
							}
						}
						?>
					</div>
				</div>
			</div>
			<h2>
				Bidding Freelancers
			</h2>
			<div class="jumbotron">
				<div class="div-table" style="width:100%; margin:auto; border: 0px solid; padding:0px;">
					<div class="div-table-row">
						<?php
						$preview = $con->query("SELECT * FROM freelancer, bidding WHERE freelancer.Freelance_ID = bidding.Freelance_ID AND bidding.Product_ID =  $ID;");
						if ($preview->num_rows > 0){
							while($row = $preview->fetch_assoc()) {
								/*echo "<a href='ShowRecipe.php?id=".$row['recipeID']."'>";*/
								echo "<div class='div-table-col' style='border:1px solid; width:25%; padding:5px; margin-right:0%;'>";
								echo "<h5>Name: ".$row['Freelance_FName']." ".$row['Freelance_LName']."</h5>";
								echo "<h6>Price: ".$row['Bid']."</h6>";
								echo "<h5><b>Skills: </b>";
								$select = $con->query("SELECT Skill_Name FROM skill, freelancer, freelancer_skill WHERE freelancer.Freelance_ID = ".$row['Freelance_ID']." AND freelancer.Freelance_ID = freelancer_skill.Freelance_ID AND skill.Skill_ID = freelancer_skill.Skill_ID ;");
								while($skill = $select->fetch_assoc()){
								echo $skill['Skill_Name']." ";
								}            
								echo "</div>";
							}
						}
						?>

					</div>

				</div>
			</div>
		</div>

		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/scripts.js"></script>
		</body>

</html>