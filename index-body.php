<link rel="stylesheet" type="text/css" href="css/index.css" />
</head>
<body>
<div class="container">

  <h1 class="display-4">Secret Diary</h1>
  <p><strong>Store your thoughts permanently and securely.</strong></p>

  <?php echo $error; ?>

  <form method="post">

    <div class="row justify-content-center">
      <label for="email">Interested? Sign up now.</label>
      <input id="email" type="email" name="email" class="form-control" placeholder="Your Email">
      <input id="password" type="password" name="password" class="form-control" placeholder="Password">
    </div>

    <div class="form-group">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" name ="stayloggedin" id="stayloggedin">
        <label class="form-check-label" for="stayloggedin"><strong>Stay logged in</strong></label>
      </div>
    </div>

    <div class="row justify-content-center">
      <button id="signup" name="signup" type="submit" class="btn btn-primary">Sign Up!</button>
      <button id="login" name="login" type="submit" class="btn btn-primary">Log in!</button>
    </div>

    <div class="toggle" id="toggle-login">
      Log in
    </div>
    <div class="toggle" id="toggle-signup">
      Sign up
    </div>

  </form>
</div>
