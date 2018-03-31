<?php
  // connect to database
  $link = mysqli_connect("DATABASE-SERVER-ADDRESS", "DB-USERNAME", "DB-PASSWORD", "DB-NAME");
  // stop script when can't connect to database
  if(mysqli_connect_error() != ""){
    die("There was and error connecting to the database.");
  }
?>
