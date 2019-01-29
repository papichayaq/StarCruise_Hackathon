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
    	$password = md5(md5($username)."UMIDINGN".md5($password));
      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $nickname = $_POST['nickname'];
      $gender = $_POST['sex'];
      $email = $_POST['email'];
      $foodprefs = "";

      if (!empty($_POST['foodprefs'])) {
          foreach($_POST['foodprefs'] as $pref) {
            $foodprefs .= $pref . ",";
          }
      }

      /*mysqli_query($con, "CREATE TABLE IF NOT EXISTS user (
        UserID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
        Username varchar(255) NOT NULL UNIQUE,
        Password varchar(255) NOT NULL UNIQUE,
        FirstName varchar(255),
        LastName varchar(255),
        Nickname varchar(255),
        Gender character(1),
        Email varchar(255),
        FoodPreferences varchar(255));
      ");
      if (!mysqli_query($con, "INSERT INTO user(Username, Password, FirstName, LastName, Nickname, Gender, Email, FoodPreferences) VALUES ('$username','$password','$firstname','$lastname','$nickname','$gender','$email','$foodprefs');"))
        $errormsg = "Username is already used.";
      else {
        $successmsg = "Successfully Registered. Redirecting to home page.";
        $_SESSION['Username'] = $username;
        header("refresh:3;url=index.php");
      }*/
    } else
      $errormsg = "Passwords do not match.";
    mysqli_close($con);
  }
?>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="assets/css/register.css" />
  <link rel="stylesheet" type="text/css" href="assets/css/checkbox.css" />
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
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
				<form>
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>First Name</label>
								<input type="text" placeholder="Enter First Name Here.." class="form-control">
							</div>
							<div class="col-sm-6 form-group">
								<label>Last Name</label>
								<input type="text" placeholder="Enter Last Name Here.." class="form-control">
							</div>
						</div>					
						<div class="form-group">
							<label>Address</label>
							<textarea placeholder="Enter Address Here.." rows="3" class="form-control"></textarea>
						</div>	
						<div class="row">
							<div class="col-sm-4 form-group">
								<label>City</label>
								<input type="text" placeholder="Enter City Name Here.." class="form-control">
							</div>	
							<div class="col-sm-4 form-group">
								<label>State</label>
								<input type="text" placeholder="Enter State Name Here.." class="form-control">
							</div>	
							<div class="col-sm-4 form-group">
								<label>Zip</label>
								<input type="text" placeholder="Enter Zip Code Here.." class="form-control">
							</div>		
						</div>
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>Title</label>
								<input type="text" placeholder="Enter Designation Here.." class="form-control">
							</div>		
							<div class="col-sm-6 form-group">
								<label>Company</label>
								<input type="text" placeholder="Enter Company Name Here.." class="form-control">
							</div>	
						</div>						
					<div class="form-group">
						<label>Phone Number</label>
						<input type="text" placeholder="Enter Phone Number Here.." class="form-control">
					</div>		
					<div class="form-group">
						<label>Email Address</label>
						<input type="text" placeholder="Enter Email Address Here.." class="form-control">
					</div>	
					<div class="form-group">
						<label>Website</label>
						<input type="text" placeholder="Enter Website Name Here.." class="form-control">
					</div>
					<button type="button" class="btn btn-lg btn-info">Submit</button>					
					</div>
				</form> 
				</div>
	</div>
</div>
</body>
</html>
