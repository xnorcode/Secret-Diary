<?php

  // start session on page load
  session_start();


  /*
  * Check if logout button was clicked
  * and perform logout function.
  */
  if(array_key_exists('logout', $_GET)){
    // logout
    include("functions/logout.php");


    /*
    * Check if a stay logged in cookie
    * exists or a session is opened.
    */
  } else if(array_key_exists('id', $_SESSION) OR array_key_exists('id', $_COOKIE)){
    // redirect to diary page
    exit(header("Location: diary.php"));
  }


  // error message
  $error = "";

  // Perform actions only when POST request was done
  if($_POST){

    // check if email and password
    if($_POST['email'] == "" OR $_POST['password'] == ""){

      // either password or email is missing, alert user
      $error = "Email or Password are invalid.";

    } else {

      // get email
      $email = $_POST['email'];
      // get password
      $password = $_POST['password'];
      // connect to database
      include("functions/dbconnection.php");
      // check if signup or login
      $login = array_key_exists("login", $_POST);


      /*
      * Perform User Login
      */
      if($login){
        // create query: find user by email
        $query = "SELECT `id`, `password` FROM `users` WHERE `email` = '".mysqli_real_escape_string($link, $email)."' LIMIT 1";
        // execute query
        $results = mysqli_query($link, $query);
        // check if user found
        if(mysqli_num_rows($results) > 0) {
          // get user data
          $row = mysqli_fetch_array($results);
          // create user's hashed password with its SQL id
          $pass = md5(md5($row['id']).$password);
          // check password is the same with the one stored in SQL
          if($row['password'] == $pass){
            // get id for login.php
            $id = $row['id'];
            // login
            include("functions/login.php");
          }

          // Error showed when password is not matching
          $error = "Wrong password.";
        } else {
          $error = "User not found.";
        }


      /*
      * New User SignUp process
      */
      } else {
        // create query: find user by email
        $query = "SELECT `id` FROM `users` WHERE `email` = '".mysqli_real_escape_string($link, $email)."' LIMIT 1";
        // execute query
        $results = mysqli_query($link, $query);
        // check if user already exists in database or not
        if(mysqli_num_rows($results) > 0){
          // inform with an error that username already exists in database
          $error = "Username is taken. Try another.";
        } else {
          // create query: insert to database
          $query = "INSERT INTO `users` (`email`, `password`) VALUES ('".mysqli_real_escape_string($link, $email)."', '".mysqli_real_escape_string($link, $password)."')";
          // execute insert query
          if(!mysqli_query($link, $query)) {
            // error if could not insert in database
            $error = "There was a problem signing you up this time. Please try again later.";
          } else {
            // returns the id of the latest inserted query
            $id = mysqli_insert_id($link);
            // create query to update password with hashed password
            $query = "UPDATE `users` SET password = '".md5(md5($id).$password)."' WHERE id = '".$id."' LIMIT 1";
            // execute query
            if(mysqli_query($link, $query)){
              // login
              include("functions/login.php");
            }else {
              $error = "Something went wront, Please try again.";
            }
          }
        }
      }
    }
  }

  // show error message
  if($error != ""){
    $error = '<div class="alert alert-danger" role="alert"><p><strong>'.$error.'</strong></p></div>';
  }

  // render page
  include("header.php");
  include("index-body.php");
  include("footer.php");
?>
