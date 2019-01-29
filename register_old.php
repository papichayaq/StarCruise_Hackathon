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
  <?php include("navbar.php"); ?>
  <div class="jumbotron" style="max-width:40%; margin:auto;">
    <form class="form-horizontal" role="form" name="input" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
      <div class="row">
        <div class="form-group">
          <label for="username" class="col-xs-3">Username:</label>
          <div class="col-xs-9">
            <input class="form-control" type="text" name="username" pattern="[A-Za-z0-9]{1,}" title="Letters or numbers only" required>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="form-group">
          <label for="password" class="col-xs-3">Password:</label>
          <div class="col-xs-9">
            <input class="form-control" type="password" name="password" pattern="[A-Za-z0-9]{1,}" title="Letters or numbers only" required>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="form-group">
          <label for="cpassword" class="col-xs-3">Confirm Password:</label>
          <div class="col-xs-9">
            <input class="form-control" type="password" name="cpassword" pattern="[A-Za-z0-9]{1,}" title="Letters or numbers only" required>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="form-group">
          <label for="firstname" class="col-xs-3">First name:</label>
          <div class="col-xs-9">
      		  <input class="form-control" type="text" name="firstname" pattern="[A-Za-z]{1,}" title="Letters only" required>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="form-group">
          <label for="lastname" class="col-xs-3">Last name:</label>
          <div class="col-xs-9">
      		  <input class="form-control" type="text" name="lastname" pattern="[A-Za-z]{1,}" title="Letters only" required>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="form-group">
          <label for="email" class="col-xs-3">Email:</label>
          <div class="col-xs-9">
            <input class="form-control" type="email" name="email" required>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="form-group">
          <label for="foodpref" class="col-xs-3">Food Preferences:</label>
          <div id="foodpref" class="col-xs-9">
            <div class="row">
              <div class="btn-group col-xs-12" data-toggle="buttons">
                <label class="btn btn-success">
                    <input type="checkbox" name="foodprefs[]" value="01"><span id="long">Thai</span><span id="short">&#x1F1F9;&#x1F1ED;</span>
                </label>
                <label class="btn btn-warning">
                    <input type="checkbox" name="foodprefs[]" value="02"><span id="long">Japanese</span><span id="short">&#x1F1EF;&#x1F1F5;</span>
                </label>
                <label class="btn btn-danger">
                    <input type="checkbox" name="foodprefs[]" value="03"><span id="long">Chinese</span><span id="short">&#x1F1E8;&#x1F1F3;</span>
                </label>
                <label class="btn btn-primary">
                    <input type="checkbox" name="foodprefs[]" value="04"><span id="long">European</span><span id="short">&#x1F1EA;&#x1F1FA;</span>
                </label>
              </div>
            </div>
            <div class="row">
              <div class="btn-group col-xs-12" data-toggle="buttons">
                <label class="btn btn-default">
                  <input type="checkbox" name="foodprefs[]" value="11"><span id="long">Single Dish</span><span id="short">&#x1F35A;</span>
                </label>
                <label class="btn btn-default">
                  <input type="checkbox" name="foodprefs[]" value="12"><span id="long">Set Menu</span><span id="short">&#x1F371;</span>
                </label>
                <label class="btn btn-default">
                  <input type="checkbox" name="foodprefs[]" value="13"><span id="long">Buffet</span><span id="short">&#x1F374;</span>
                </label>
              </div>
            </div>
          </div>
        </div>
      </div>
  		<div class="text-center">
  			<input type="submit" class="btn btn-success" value="Register">
        <input type="reset" class="btn btn-danger" value="Clear">
  		</div>
  	</form>
    </div>
    <span>
    <?php
      if (isset($errormsg))
        echo $errormsg;
      else if (isset($successmsg))
        echo $successmsg;
    ?>
    </span>
  </div>
  </div>
</div>
</div>
</body>
</html>
