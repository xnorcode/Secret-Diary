<!-- Diary Specific CSS -->
<link rel="stylesheet" type="text/css" href="css/diary.css" />
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-fixed-top">

  <a class="navbar-brand" href="#">Secret Diary</a>
  <span id="userLabel"><strong>User: <?php echo $id; ?></strong></span>

  <div>
    <a href="index.php?logout=1"><button id="logout" class="btn btn-success" type="submit">Logout</button></a>
  </div>

</nav>

<div class="container">
  <textarea id="diaryInput" class="form-control"><?php echo $diaryContent; ?></textarea>
</div>
