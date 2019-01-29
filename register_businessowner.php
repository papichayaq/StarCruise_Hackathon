<?php
  if (session_id() == '' || !isset($_SESSION))
    session_start();
  if (isset($_SESSION['Username']))
    header("Location: index.php");
  include_once("dbconnect.php");

  if (isset( $_POST['username'])) {
    $username = $_POST['username'];
    if ($_POST['password'] == $_POST['cpassword']) {
      $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $capital = $_POST['capital'];
      $phone_num = $_POST['phone_num'];
      $email = $_POST['email'];
	  $since = $_POST['since'];
	  $comname = $_POST['comname'];
	  $industry = $_POST['industry'];
	  $address = $_POST['address'];

      if (!mysqli_query($con, "INSERT INTO business_owner(Owner_Username, Owner_Password, Owner_ContactPersonFirstName, Owner_ContactPersonLastName, Owner_RegisteredCapital, Owner_ContactNumber, Owner_EmailAddress, Owner_ActiveSince, Owner_Name, Owner_Industry, Owner_Address) VALUES ('$username','$password','$fname','$lname',$capital,'$phone_num','$email', '$since', '$comname', '$industry', '$address');")) {
        $errormsg = "Username is already used.";
      }
      else {
        $successmsg = "Successfully Registered. Redirecting to home page.";
        $_SESSION['Username'] = $username;
        header("refresh:3;url=index.php");
      }
    } else
      $errormsg = "Passwords do not match.";
    mysqli_close($con);
  }
?>
	<html>

	<head>
		<link rel="stylesheet" type="text/css" href="assets/css/register.css" />
		<link rel="stylesheet" type="text/css" href="assets/css/checkbox.css" />
		<link href="css/bootstrap.css" rel="stylesheet">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Registration</title>
		<link href="css/style.css" rel="stylesheet">
	</head>

	<body>

		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<?php include_once("navbar.php"); ?>
				</div>
			</div>
			<div class="jumbotron" style="max-width:40%; margin:auto;">
				<div class="row">
					<form role="form" name="input" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
						<div class="col-sm-12">
							<div class="row">
								<div class="col-sm-6 form-group">
									<label>Username</label>
									<input type="text" placeholder="Enter Username Here.." class="form-control" name="username">
								</div>
								<div class="col-sm-6 form-group">
									<label>Password</label>
									<input type="password" placeholder="Enter Password Here.." class="form-control" name="password">
								</div>
								<div class="col-sm-6 form-group">
									<label>Confirm Password</label>
									<input type="password" placeholder="Confirm Password.." class="form-control" name="cpassword">
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6 form-group">
									<label>First Name</label>
									<input type="text" placeholder="Enter First Name Here.." class="form-control" name="fname">
								</div>
								<div class="col-sm-6 form-group">
									<label>Last Name</label>
									<input type="text" placeholder="Enter Last Name Here.." class="form-control" name="lname">
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6 form-group">
									<label>Company Name</label>
									<input type="text" placeholder="Enter Company Name Here.." class="form-control" name="comname">
								</div>
								<div class="col-sm-6 form-group">
									<label>Industry</label>
									<input type="text" placeholder="Enter Industry Here.." class="form-control" name="industry">
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6 form-group">
									<label>Registered Capital</label>
									<input type="number" placeholder="0" class="form-control" name="capital">
								</div>
								<div class="col-sm-6 form-group">
									<label>Company Registered Date</label>
									<input type="date" class="form-control" name="since">
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12 form-group">
									<label>Address</label>
									<input type="text" placeholder="Enter Address Here.." class="form-control" name="address">
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6 form-group">
									<label>Phone Number</label>
									<input type="text" placeholder="0812345678" class="form-control" name="phone_num">
								</div>
							</div>
							<div class="form-group">
								<label>Email Address</label>
								<input type="text" placeholder="Enter Email Address Here.." class="form-control" name="email">
							</div>
							<input type="submit" class="btn btn-success" value="Register">
						</div>
					</form>
				</div>
			</div>
		</div>

	</body>

	</html>