<?php
  // start session
  session_start();
  // text area content
  $diaryContent = "";

  // get user id from the cookie if any
  if(array_key_exists('id', $_COOKIE)){
    $_SESSION['id'] = $_COOKIE['id'];
  }

  /*
  * If session exists start listening to textarea changes
  */
  if(array_key_exists('id', $_SESSION)){
    // get user id from session
    $id = $_SESSION['id'];
    // connect to database
    include("functions/dbconnection.php");
    // create query: get content
    $query = "SELECT content FROM users WHERE id = ".mysqli_real_escape_string($link, $id)." LIMIT 1";
    // execute query
    $row = mysqli_fetch_array(mysqli_query($link, $query));
    // display content (if any) in textarea
    $diaryContent = $row['content'];
  }


  /*
  * if no session or cookie exists
  * redirect back to signup page.
  */
  if($id == ""){
    exit(header("Location: index.php"));
  }


  // render page
  include("header.php");
  include("diary-body.php");
  include("footer.php");
?>
