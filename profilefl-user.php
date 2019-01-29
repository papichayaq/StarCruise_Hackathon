<?php
  if (session_id() == '' || !isset($_SESSION))
    session_start();
  if (!isset($_SESSION['Username']))
    header("Location: index.php");
  include_once("dbconnect.php");
	
  if (isset($_POST['firstname'])) {
    $username = $_SESSION['Username'];
	  $id = $_SESSION['ID'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
	  $number = $_POST['number'];
	  $jobexperience = $_POST['jobexperience'];
	  $password = filter_input(INPUT_POST, 'newpassword', FILTER_SANITIZE_SPECIAL_CHARS);

	
    if (!$con->query("UPDATE freelancer SET
                        Freelance_FName='".$firstname."',
                        Freelance_LName='".$lastname."',
                        Freelance_Email='".$email."',
						Freelance_JobExperience=".$jobexperience.",
						Freelance_Password='".$password."',
                        Freelance_ContactNumber='".$number."'
                        WHERE Freelance_ID=".$id)) {
        $_SESSION['msg'] = "Something's wrong";
      }
    else {
      $_SESSION['msg'] = "Changes saved";
    }
  }
?>
  <html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Profile</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/profile-edit.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/checkbox.css" />
  </head>

  <body>
    <?php
    $id = $_SESSION['ID'];
    $user = mysqli_query($con, "SELECT * FROM freelancer WHERE Freelance_ID=".$id);
    $row = $user->fetch_assoc();
    include_once("navbar.php");
  ?>
      <div class="jumbotron" style="max-width:40%; margin:auto;">
        <div id="wrapper" class="container" style="min-width:50%;">
          <h1 class="text-center">Edit Profile</h1>
          <form class="form-horizontal" role="form" name="input" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">


            <div class="form-group">

              <label for="username" class="col-xs-3">Username:</label>
              <?php echo $row['Freelance_Username']; ?>

            </div>


            <div class="row">

              <div class="form-group">
                <label for="email" class="col-xs-3">Account Type:</label>
                <font color="<?php echo $row['Freelance_Premium']== 1 ? " #00FF00 " : "#CC8800 ";?>">
                  <?php echo $row['Freelance_Premium']== 1 ? "Premium" : "Free";?>
                </font>

              </div>

            </div>

            <div class="row">
              <div class="form-group">
                <label for="firstname">First name:</label>
                <input class="form-control" type="text" name="firstname" pattern="[A-Za-z]{1,}" title="Letters only" value="<?php echo $row['Freelance_FName'];?>"
                  required>
              </div>
              <div class="form-group">
                <label for="lastname">Last name:</label>
                <input class="form-control" type="text" name="lastname" pattern="[A-Za-z]{1,}" title="Letters only" value="<?php echo $row['Freelance_LName'];?>"
                  required>
              </div>
            </div>



            <div class="row">
              <div class="form-group">
                <label for="email" class="col-xs-3">Email:</label>
                <div class="col-xs-9">
                  <input class="form-control" type="email" name="email" value="<?php echo $row['Freelance_Email'];?>" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group">
                <label for="jobexperience" class="col-xs-3">Job Experience (Year):</label>
                <div class="col-xs-9">
                  <input class="form-control" type="text" name="jobexperience" value="<?php echo $row['Freelance_JobExperience'];?>" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group">
                <label for="contactnumber" class="col-xs-3">Contact Number:</label>
                <div class="col-xs-9">
                  <input class="form-control" type="text" name="number" value="<?php echo $row['Freelance_ContactNumber'];?>">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="form-group">
                <label for="newpassword" class="col-xs-3">New Password:</label>
                <div class="col-xs-9">
                  <input class="form-control" type="password" name="newpassword" value="">
                </div>
              </div>
            </div>


            <div class="text-center">
              <input type="submit" class="btn btn-default" value="Save changes">
              <a href="logout.php">
                <input type="button" class="btn btn-danger" value="Log out"></input>
              </a>
            </div>

          </form>
        </div>
      </div>

  </body>

  </html>