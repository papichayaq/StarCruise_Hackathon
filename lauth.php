<?php
  session_start();
  $auto = isset($_GET['auto']);
  if (isset($_SESSION['Username']) && !$auto)
    header("Location: index.php");

  include_once("dbconnect.php");

  $free = ($_POST["role"] == "freelancer");
  if ($free) {
    $result = mysqli_query($con, "SELECT * FROM freelancer");
    $dbusername = 'Freelance_Username';
    $dbid = 'Freelance_ID';
    $dbpassword = 'Freelance_Password';
    $dbapproval = 'Freelance_Approval';
  }
  else {
    $result = mysqli_query($con, "SELECT * FROM business_owner");
    $dbusername = 'Owner_Username';
    $dbid = 'Owner_ID';
    $dbpassword = 'Owner_Password';
    $dbapproval = 'Owner_Approval';
  }
  $_SESSION['Role'] = $_POST["role"];

  if ($auto) {
    $username = $_COOKIE['username'];
    $password = $_COOKIE['password'];
  } else {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
  }

  $metusername = false;
  $approval = true;
  while ($row = mysqli_fetch_array($result)) {
    if ($row[$dbusername] == $username)
      $metusername = true;
    #$checkpassword = $auto ? $password : md5(md5($username)."UMIDINGN".md5($password));
		if ($metusername && $row[$dbpassword] == $password) {
      if (!$row[$dbapproval]) {
        $approval = false;
        break;
      }
			$_SESSION['ID'] = $row[$dbid];
      $_SESSION['Username'] = $username;
      $url = "www.starcruise.co.th";
      if (isset($_POST['keeplogin'])) {
          setcookie('username', $username, time()+60*60*24*365, '/account', $url);
          setcookie('password', $password, time()+60*60*24*365, '/account', $url);
      } else {
          setcookie('username', $username, false, '/account', $url);
          setcookie('password', $password, false, '/account', $url);
      }
      header("Location: index.php");
		}
  }
  if ($approval) {
    if ($metusername)
      $_SESSION['inpass'] = "Invalid password";
    else
      $_SESSION['inuser'] = "Your username is not recognized.  Please register to our system.";
  }
  // looking for better feedback of these cases
  header("Location: login.php");
  mysqli_close($con);

?>
