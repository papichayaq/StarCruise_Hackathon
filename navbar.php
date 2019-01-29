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
           <?php if (!isset($_SESSION['Username'])) { ?>
             <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
             </li>
           <?php } ?>
		   <?php 
				if (isset($_SESSION['Role']) && $_SESSION['Role'] == "businessowner"){
			?>
					<li class="nav-item">
						<a class="nav-link" href="project.php">Softwares</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="projectrelease.php">Project Release</a>
					</li>
			<?php
				} else if (isset($_SESSION['Role']) && $_SESSION['Role'] == "freelancer"){
			?>
					<li class="nav-item">
						<a class="nav-link" href="jobbroadcast.php">Job Broadcast</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="subscription.php">Subscription</a>
					</li>
			<?php
				}
			?>
           </ul>
           <ul class="nav navbar-nav navbar-right" id="usermenus">
          <?php
            if (isset($_SESSION['Username'])) { ?>
              <li class="nav-item"><a class="nav-link" href=<?php echo $_SESSION['Role'] == "freelancer" ? "profilefl-user.php" : "profilebo-user.php";?>><span>Welcome, <?php echo $_SESSION['Username'] ?> </span><i class="glyphicon glyphicon-user"></i></a></li>
          <?php
          } else { ?>
            <li class="nav-item"><a class="nav-link" href="login.php"><span>Log in</a></li>
          <?php } ?>
      </ul>
         </div>
       </nav> <div  style="padding: 20px"></div>
