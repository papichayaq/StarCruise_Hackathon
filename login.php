<?php
  session_start();
  $auto = isset($_GET['auto']);
  if (isset($_SESSION['Username']))
    header("Location: index.php");
?>
<!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/fb.css" rel="stylesheet">
  </head>

  <body>

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <?php include_once("navbar.php"); ?>
          <div class="jumbotron" style="max-width:40%; margin:auto;">
            <form class="form" role="form" method="post" action="lauth.php" accept-charset="UTF-8" id="login-nav">
              <div class="form-group">
                <label class="sr-only" for="usernamebox">Username</label>
                <input type="text" class="form-control" id="usernamebox" name="username" placeholder="Username" required>
              </div>
              <div class="form-group">
                <label class="sr-only" for="passwordbox">Password</label>
                <input type="password" class="form-control" id="passwordbox" name="password" placeholder="Password" required>
                <!--   <div class="help-block text-right"><a href="#">Forget the password?</a></div> -->
              </div>
              <div class="form-group">
                <label class="sr-only" for="role" class="col-xs-3">Role</label>
                <div class="col-md-6">
                  <label class="radio-inline">
                    <input type="radio" name="role" value="businessowner" checked>Business Owner</label>
                </div>
                <div class="col-md-6">
                  <label class="radio-inline">
                    <input type="radio" name="role" value="freelancer">Freelancer</label>
                </div>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Sign in</button>
              </div>
              <!--<div class="checkbox">
                   <label>
                     <input type="checkbox" name="keeplogin">Keep me logged in
                   </label>
                </div>-->
            </form>

            <div class="entry-social" class="col-md-12">
              <div class="fb">
                <a href="facebook.com" target="_blank">Login with Facebook</a>
              </div>
            </div>
            <div class="entry-social" style="width:'22'">
              <div class="linkedin">
                <a href="linkedin.com" target="_blank">Login with Linkedin</a>
              </div>
            </div>
            <div class="bottom text-center">
              New here?
              <a href="register.php">
                <b>Register</b>
              </a>
            </div>


          </div>
        </div>

      </div>

      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/scripts.js"></script>
  </body>

  </html>