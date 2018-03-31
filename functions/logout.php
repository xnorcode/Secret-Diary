<?php
  // end session
  unset($_SESSION['id']);
  // remove cookie
  setcookie("id", "", time() - 60*60);
  $COOKIE['id'] = "";
?>
