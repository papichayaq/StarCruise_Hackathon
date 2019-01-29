<?php
  if (session_id() == '' || !isset($_SESSION))
    session_start();
	if (!isset($_SESSION['ID'])) {
		echo("Login Required!");
		header("Location: login.php");
	}
  include_once("dbconnect.php");
  if (isset( $_POST['name'])) {
      $name = $_POST['name'];
      $description = $_POST['description'];
	  $duration = $_POST['duration'];
	  $owner = $_SESSION['ID'];
	  
      if (!mysqli_query($con, "INSERT INTO products(Prod_name, Prod_type, Prod_price, Prod_duration, Prod_description, Owner_ID) VALUES ('$name','MTO',0,'$duration','$description', '$owner');")) {
        $errormsg = "Username is already used.";
      }
      else {
        //Success
        $prodid = $con->insert_id;
        foreach ($_POST['skill'] as $key => $value) {
          for ($i = 0; $i < count($_POST['skill']); ++$i) {
            // TODO: may change?
            $result = mysqli_query($con, 'SELECT Skill_ID from skill WHERE Skill_Name = "'.$_POST['skill'][$i] .'"');
            $fetch = $result->fetch_assoc();
            $skillid = $fetch['Skill_ID'];
            mysqli_query($con, "INSERT INTO product_skill(Prod_ID, Skill_ID, job_exp_needed) VALUES (".$prodid.", ".$skillid.", ".$_POST['minexp'][$i].");");
          }
          header("refresh:3;url=index.php");
        }
      }
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
                <div class="col-sm-6 form-group">
                  <label>Project Name</label>
                  <input type="text" placeholder="Enter Name Here.." class="form-control" name="name">
                </div>
              </div>
              <div class="form-group">
                <label>Description</label>
                <textarea placeholder="Enter Description Here.." rows="3" class="form-control" name="description"></textarea>
              </div>
              <div class="row">
                <div class="col-sm-6 form-group">
                  <label>Duration</label>
                  <input type="number" placeholder="Number in Weeks.." class="form-control" name="duration">
                </div>
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