<?php
  // get user id from session
  session_start();
  // verify if user id exists
  if($_POST AND array_key_exists("content", $_POST)){
    // make connection to db
    include("dbconnection.php");
    // update context query
    $query = "UPDATE `users` SET content = '".mysqli_real_escape_string($link, $_POST['content'])."' WHERE id = '".mysqli_real_escape_string($link, $_SESSION['id'])."' LIMIT 1";
    // execute query
    mysqli_query($link, $query);
  }
?>
