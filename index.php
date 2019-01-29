<?php
  if (session_id() == '' || !isset($_SESSION))
    session_start();
  if (isset($_SESSION['Username']))
    header("Location: dashboard.php");
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/font.css" rel="stylesheet">
  </head>

  <body>

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <?php include_once("navbar.php"); ?>


          <div class="jumbotron">
            <h2>
              Welcome to Star Cruise!
            </h2>
            <p>
              Star Cruise is a global company, foreseeing the opportunities in explaining the business thrugh platform economy by leveraging
              the company's strengths in IT solutions and large accessibility to talent pool. The platform aims to provide
              several of IT services & solutions to serve needs of its target customers.
            </p>
            <h4>
              Want to Explore More?
            </h4>
            <p>
              <a class="btn btn-primary btn-large" href="register.php">Sign up</a>
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="footer">Get licenses from our existing software or solutions.
      <strong>Complete with a team of experts to help you set up for immediate use</strong>.</div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>

  </html>