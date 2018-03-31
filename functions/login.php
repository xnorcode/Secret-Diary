<?php
  // create a session for this user
  $_SESSION['id'] = $id;
  // create cookie to stay loggedin if chosen
  if(array_key_exists('stayloggedin', $_POST)){
    // create cookie with 24hours expiry date
    setcookie("id", $id, time() + 60*60*24);
  }
  // redirect to next page
  exit(header("Location: diary.php"));
?>
