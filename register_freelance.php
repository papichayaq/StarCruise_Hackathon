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
      $job_ex = $_POST['job_ex'];
      $phone_num = $_POST['phone_num'];
      $email = $_POST['email'];
      
      if (!mysqli_query($con, "INSERT INTO freelancer(Freelance_Username, Freelance_Password, Freelance_FName, Freelance_LName, Freelance_JobExperience, Freelance_ContactNumber, Freelance_Email) VALUES ('$username','$password','$fname','$lname','$job_ex','$phone_num','$email');")) {
        $errormsg = "Username is already used.";
      }
      else {
        $flid = $con->insert_id;
        foreach ($_POST['skill'] as $key => $value) {
          for ($i = 0; $i < count($_POST['skill']); ++$i) {
            // TODO: may change?
            $result = mysqli_query($con, 'SELECT Skill_ID from skill WHERE Skill_Name = "'.$_POST['skill'][$i] .'"');
            $fetch = $result->fetch_assoc();
            $skillid = $fetch['Skill_ID'];
            mysqli_query($con, "INSERT INTO freelancer_skill(Freelance_ID, Skill_ID, YearExperience) VALUES (".$flid.", ".$skillid.", ".$_POST['minexp'][$i].");");
          }
        }
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
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="js/addskills.js"></script>
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
								<label>Job Experience (Years)</label>
								<input type="number" placeholder="Enter number Here.." class="form-control" name="job_ex">
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
          
          <?php include("addskills.html"); ?>

					<input type="submit" class="btn btn-success" value="Register">					
					</div>
				</form> 
				</div>
	</div>
</div>
 
</body>
</html>
