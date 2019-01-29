<?php
  if (session_id() == '' || !isset($_SESSION))
    session_start();
  if (!isset($_SESSION['Username']))
    header("Location: index.php");
  include_once("dbconnect.php");

  if ($_SESSION['Role'] == "freelancer") {
    $preview = $con->query("SELECT Freelance_ID AS ID, Freelance_Username AS Username, Freelance_FName AS FirstName, Freelance_LName AS LastName, Freelance_JobExperience AS JobExperience, Freelance_ContactNumber AS ContactNumber, Freelance_Email AS Email FROM freelancer WHERE Freelance_ID = ".$_SESSION['ID']);
    $profile = $preview->fetch_assoc();
  } else {
    $preview = $con->query("SELECT Owner_ID AS ID, Owner_Username AS Username, Owner_FName AS FirstName, Owner_LName AS LastName, Owner_Industry AS Industry, Owner_ContactNumber AS ContactNumber, Owner_Email AS Email FROM business_owner WHERE Owner_ID = ".$_SESSION['ID']);
    $profile = $preview->fetch_assoc();
  }
?>

  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Profile</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
  </head>

  <body>

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <?php include_once("navbar.php"); ?>

          <div class="jumbotron">
            <h2>
              User Profile
            </h2>
            <div class="col-sm-12">
              <?php
            foreach ($profile as $key => $value) {
              echo '<div class="row">';
              echo '<div class="col-sm-6 form-group">';
              echo '<label>'.$key.':</label> '.$value;
              echo '</div></div>';
            }
            ?>

            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>

  </html>