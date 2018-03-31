<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript">

  // toggle Login/SignUp button functionality
  $("#toggle-login").click(function(){
    $("#signup").toggle();
    $("#login").toggle();
    $("#toggle-login").toggle();
    $("#toggle-signup").toggle();
  });

  $("#toggle-signup").click(function(){
    $("#signup").toggle();
    $("#login").toggle();
    $("#toggle-login").toggle();
    $("#toggle-signup").toggle();
  });

  // on user input change save input data into database via the updatedatabase.php file
  $('#diaryInput').on('change paste keyup', function(){
      $.ajax({
        method: "POST",
        url: "functions/updatecontent.php",
        data: { content: $(this).val() }
      });
  });

</script>
</body>
</html>
