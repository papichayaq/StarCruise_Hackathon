<?php
  if (session_id() == '' || !isset($_SESSION))
    session_start();
  include_once("dbconnect.php");
?>

	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Project Assessment</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<link href="css/divtable.css" rel="stylesheet">
	</head>

	<body>

		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<?php include_once("navbar-admin.php"); ?>
					<div class="jumbotron" style="max-width:80%; margin:auto;">

						<form id="form1">
							<div class="div-table" style="max-width:100%; margin:auto;">
								<div class="div-table-row">
									<div class="div-table-col" align="center">Project Name</div>
									<div class="div-table-col">Date Requested</div>
									<div class="div-table-col">Details</div>
								</div>
								</br>
								<?php 
				$preview = $con->query("SELECT Prod_ID, Prod_Name, Prod_DateOrdered FROM products WHERE Prod_Approval = 0;");
				if ($preview->num_rows > 0){
					while($row = $preview->fetch_assoc()) {
						/*echo "<a href='ShowRecipe.php?id=".$row['recipeID']."'>";*/
						echo "<div class='div-table-row'>";
						echo "<div class='div-table-col'>".$row['Prod_Name']."</div>";
						echo "<div class='div-table-col'>".$row['Prod_DateOrdered']."</div>";
						echo "<div class='div-table-col' align='right'><button type='button' class='btn btn-success' onclick='javascript:document.location=".'"projectdetail.php?id='.$row['Prod_ID'].'"'."'>View Details</button></div>";
						echo "</div>";
					}
				}
			?>


							</div>
							</br>
							<div align="right">
								<input type="submit" value="Approve">
							</div>
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