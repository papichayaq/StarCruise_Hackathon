<?php
  if (session_id() == '' || !isset($_SESSION))
    session_start();
	if(!isset($_SESSION['ID'])) {
		echo("Login Required!");
		header("Location: login.php");
	}
  include_once("dbconnect.php");
	
	if(isset($_GET['id'])) {
		$id = $_GET['id'];
		$sw = mysqli_query($con, "SELECT * FROM software WHERE Software_ID=".$id);
		$row = $sw->fetch_assoc();
	}
	
	
  if (1) {
		
    if (isset( $_POST['description'])) {
      $name = $_POST['name'];
      $description = $_POST['description'];
	  $duration = $_POST['duration'];
	  $owner = $_SESSION['ID'];
	  $price = $_POST['price'];
		
		echo $price;
		echo $name;
      if (!mysqli_query($con, "INSERT INTO products(Prod_name, Prod_type, Prod_price, Prod_duration, Prod_description, Owner_ID) VALUES ('".$name."','OTS',".$price.",".$duration.",'".$description."', '".$owner."');")) {
        $errormsg = "Username is already used.";
      }
      else {
        //Success
      }
    } else
      $errormsg = "Passwords do not match.";
    mysqli_close($con);
  }
  if(!isset($_GET['id'])) header("Location: index.php");
?>
	<html>

	<head>
		<link rel="stylesheet" type="text/css" href="assets/css/register.css" />
		<link rel="stylesheet" type="text/css" href="assets/css/checkbox.css" />
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Order Project</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<link href="css/hwhite.css" rel="stylesheet">
		<script src="js/addskills.js"></script>
	</head>

	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<?php include_once("navbar.php"); ?>
				</div>
			</div>
			<div class="col-lg-12 well">
				<div class="row">
					<form role="form" name="input" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
						<div class="col-sm-12">
							<div class="row">
								<div class="col-sm-12 form-group">
									<label>Project Name</label>
									<input type="text" value="<?php echo $row['Software_name'] ?>" class="form-control" name="name">
								</div>
							</div>
							<div class="form-group">
								<label>Description</label>
								<textarea placeholder="Enter Description Here.." rows="3" class="form-control" name="description"></textarea>
							</div>
							<div class="row">
								<div class="col-sm-12 form-group">
									<label>Duration</label>
									<input type="number" placeholder="Number in weeks.." class="form-control" name="duration">
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12 form-group">
									<label>Price</label>
									<input type="hidden" name="price" value=<?php echo $row[ 'Software_price'] ?>>
									<font color='white'>
										<?php echo $row['Software_price'] ?>
									</font>
									</input>
								</div>
							</div>

							<?php include("addskills.html"); ?>

							<input type="submit" class="btn btn-success" value="Register">

					</form>
					</div>
				</div>
			</div>
	</body>

	</html>