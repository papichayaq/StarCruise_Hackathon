<?php
  if (session_id() == '' || !isset($_SESSION))
    session_start();
  include_once("dbconnect.php");
?>

<nav class="navbar navbar-toggleable-md navbar-light bg-faded"> 
         <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
           <span class="navbar-toggler-icon"></span>
         </button><input type="image" src="logo.png" name="image" width="60" height="60"> <a class="navbar-brand" href="index.php">Star Cruise</a>
         
         <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
           <ul class="navbar-nav ml-md-auto">
             <li class="nav-item active">
                <a class="nav-link" href="index-admin.php">Home</a>
             </li>
             <li class="nav-item">
                <a class="nav-link" href="verifybo.php">Verify Business Owner</a>
             </li>
             <li class="nav-item">
                <a class="nav-link" href="verifyfl.php">Verify Freelancer</a>
             </li>
             <li class="nav-item">
                <a class="nav-link" href="assesspj.php">Project Assessment</a>
             </li>
           </ul>
         </div>
       </nav>
