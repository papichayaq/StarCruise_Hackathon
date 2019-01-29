<?php
  if (session_id() == '' || !isset($_SESSION))
    session_start();
  if (isset($_SESSION['Username'])) {
      session_destroy();
      unset($_SESSION['Username']);
      unset($_SESSION['ID']);
  }
  header("Location: index.php");
?>